<?php

use Illuminate\Database\Seeder;
use App\Subcategory;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //1
      Subcategory::create([
        // 'subcategoryID' => '1',
        'categoryID'=> '1',
        'subcategoryName' => 'Excavator'
      ]);

      Subcategory::create([
        // 'subcategoryID' => '2',
        'categoryID'=> '1',
        'subcategoryName' => 'Bulldozer'
      ]);

      Subcategory::create([
        // 'subcategoryID' => '3',
        'categoryID'=> '1',
        'subcategoryName' => 'Wheel Loader'
      ]);

      Subcategory::create([
        // 'subcategoryID' => '4',
        'categoryID'=> '1',
        'subcategoryName' => 'Motor Graders'
      ]);

      Subcategory::create([
        // 'subcategoryID' => '5',
        'categoryID'=> '1',
        'subcategoryName' => 'Trenchers'
      ]);


      //2
      Subcategory::create([
        // 'subcategoryID' => '6',
        'categoryID'=> '2',
        'subcategoryName' => 'Concrete Cutter'
      ]);

      Subcategory::create([
        // 'subcategoryID' => '7',
        'categoryID'=> '2',
        'subcategoryName' => 'Plate Compactors'
      ]);

      Subcategory::create([
        // 'subcategoryID' => '8',
        'categoryID'=> '2',
        'subcategoryName' => 'Mini Digger'
      ]);

      Subcategory::create([
        // 'subcategoryID' => '9',
        'categoryID'=> '2',
        'subcategoryName' => 'Air Compressor'
      ]);

      Subcategory::create([
        // 'subcategoryID' => '10',
        'categoryID'=> '2',
        'subcategoryName' => 'Hydraulic Breakers'
      ]);

      //3
      Subcategory::create([
        // 'subcategoryID' => '11',
        'categoryID'=> '3',
        'subcategoryName' => 'Power Generator'
      ]);

      Subcategory::create([
        // 'subcategoryID' => '12',
        'categoryID'=> '3',
        'subcategoryName' => 'Mixers'
      ]);

      Subcategory::create([
        // 'subcategoryID' => '13',
        'categoryID'=> '1',
        'subcategoryName' => 'Cranes'
      ]);

      Subcategory::create([
        // 'subcategoryID' => '14',
        'categoryID'=> '3',
        'subcategoryName' => 'Dumpers'
      ]);

      Subcategory::create([
        // 'subcategoryID' => '15',
        'categoryID'=> '2',
        'subcategoryName' => 'Fork Lifts'
      ]);

      Subcategory::create([
        // 'subcategoryID' => '16',
        'categoryID'=> '2',
        'subcategoryName' => 'Road Rollers'
      ]);

    }
}
