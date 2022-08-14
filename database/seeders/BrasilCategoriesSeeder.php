<?php

namespace Database\Seeders;

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
        $service->handle('MLB');
    }
}
