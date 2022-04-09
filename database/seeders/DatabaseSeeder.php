<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\ProductType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        ProductType::factory(1)->create();
        CarBrand::factory(1)->create();
        CarModel::factory(1)->create();
    }
}
