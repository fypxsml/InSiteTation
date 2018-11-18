<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
          // 'categoryID' => '1',
          'categoryName'=> 'Heavy Machine',
          'categoryDescription' => 'Heavy-Duty Vehicles'
        ]);

        Category::create([
          // 'categoryID' => '2',
          'categoryName'=> 'Light Machine',
          'categoryDescription' => 'Items Used At Construction Sites And Industrial Maintenance Work'
        ]);

        Category::create([
          // 'categoryID' => '3',
          'categoryName'=> 'Construction Equipment',
          'categoryDescription' => 'Tools Used In Construction'
        ]);
    }
}
