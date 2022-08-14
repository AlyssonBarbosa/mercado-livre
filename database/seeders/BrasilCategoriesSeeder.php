<?php

namespace Database\Seeders;

use App\Enums\StatusEnum;
use App\Models\Site;
use App\Services\CategoryBatchService;
use Illuminate\Database\Seeder;

class BrasilCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = new CategoryBatchService;
        $site = Site::find('MLB');
        $site->update(['status' => StatusEnum::START]);
        $service->handle($site);
    }
}
