<?php

namespace App\Services;

use App\Enums\StatusEnum;
use App\Http\External\ConsumeApi;
use App\Models\Category;
use App\Models\Site;

class CategoryBatchService
{
    public function handle(Site $site)
    {
        $response  = ConsumeApi::get("sites/$site->id/categories");

        foreach ($response as $categoryData) {
            $this->saveCategoryRecursive($categoryData, $site->id);
        }

        $site->update(['status' => StatusEnum::FINISH]);
    }

    private function saveCategoryRecursive(
        array $categoryData,
        string $siteId,
        string $fatherId = null
    ) {
        $response = ConsumeApi::get("categories/" . $categoryData['id']);

        $category = Category::query()->updateOrCreate([
            'id' => $response['id'],
            'name' => $response['name'],
            'site_id' => $siteId,
            'category_id' => $fatherId,
            'picture' => $response['picture'] ?? null
        ]);

        $childrens = $response['children_categories'];

        if (env('LIMIT_BY_CATEGORY') > 0) {
            $childrens = array_slice($childrens, 0, env('LIMIT_BY_CATEGORY'));
        }

        foreach ($childrens as $subCategory) {
            $this->saveCategoryRecursive($subCategory, $siteId, $category->id);
        }
    }
}
