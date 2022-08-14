<?php

namespace App\Http\Controllers\Category;

use App\Enums\StatusEnum;
use App\Exceptions\BatchDownloadIsNotAvailable;
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

        if (!$request->site_id) {
            $request->merge(['site_id' => 'MLB']);
        }

        $actualSite = Site::find($request->site_id);


        $categories = Category::whereNull('category_id')
            ->filter($request)
            ->orderBy('name', 'ASC')
            ->get();

        return view('categories.index', compact('sites', 'actualSite', 'categories'));
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
        try {
            if ($site->status != StatusEnum::NONE) {
                throw new BatchDownloadIsNotAvailable('Este país não esta disponivel para download em lote!');
            }
            $site->update(['status' => StatusEnum::START]);
            ProcessCategory::dispatch($site);

            return redirect()->back()->with('success', 'Iniciando download de categorias!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}
