<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Location::create([
			'requisitionID'=> '1',
			'longitude' => '101.705610',
			'latitude' => '3.149660',
      'requisitionStatus' =>'On-Going'
		]);
		Location::create([
			'requisitionID'=> '3',
			'longitude' => '103.898671',
			'latitude' => '1.497736',
      'requisitionStatus' =>'On-Going'
		]);
		Location::create([
			'requisitionID'=> '2',
			'longitude' => '101.591469',
			'latitude' => '3.083300',
      'requisitionStatus' =>'On-Going'
		]);
    Location::create([
			'requisitionID'=> '4',
			'longitude' => '101.705609',
			'latitude' => '3.149659',
      'requisitionStatus' =>'On-Going'
		]);
    Location::create([
			'requisitionID'=> '5',
			'longitude' => '101.712590',
			'latitude' => '3.150213',
      'requisitionStatus' =>'On-Going'
		]);
    Location::create([
			'requisitionID'=> '6',
			'longitude' => '101.591445',
			'latitude' => '3.083330',
      'requisitionStatus' =>'On-Going'
		]);
    }
}
