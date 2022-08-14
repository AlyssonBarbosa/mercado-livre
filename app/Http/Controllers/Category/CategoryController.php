<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Jobs\ProcessCategory;
use App\Models\Site;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $sites = Site::orderBy('name', 'ASC')->get();

        $categories = Category::whereNull('category_id')
            ->filter($request)
            ->orderBy('name', 'ASC')
            ->get();

        return view('categories.index', compact('sites', 'categories'));
    }

    public function getChildrens(Category $category)
    {
        return response()
            ->json(
                $category
                    ->categories()
                    ->orderBy('name', 'ASC')
                    ->with(['categories' => function ($q) {
                        return $q->orderBy('name', 'ASC');
                    }])
                    ->get()
            );
    }

    public function batchCategories(Site $site)
    {
        ProcessCategory::dispatch($site);

        return response()
            ->json();
    }
}
