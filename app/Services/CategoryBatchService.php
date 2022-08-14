<?php

namespace App\Services;

use App\Http\External\ConsumeApi;
use App\Models\Category;

class CategoryBatchService
{
    public function handle(string $siteId)
    {

        $response  = ConsumeApi::get("sites/$siteId/categories");

        foreach ($response as $categoryData) {
            $this->saveCategoryRecursive($categoryData, $siteId);
        }
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

        foreach ($childrens as $subCategory) {
            $this->saveCategoryRecursive($subCategory, $siteId, $category->id);
        }
    }
}
