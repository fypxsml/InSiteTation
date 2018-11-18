<?php

use Illuminate\Database\Seeder;
use App\Requisition;

class RequisitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Requisition::create([
			// 'requisitionID'=> '1',
			'staffID'=> '34567',
			'assetID'=> '1',
			'rentalDateTime' => '2018-11-02 01:00:00',
			'returnDateTime' => '2018-11-10 01:00:00',
			'requisitionPurpose' => 'To be used in equipment for site',
			'siteID' => '1',
			'rentalStatus' => 'On Loan',
		]);
		Requisition::create([
			// 'requisitionID'=> '2',
			'staffID'=> '45678',
			'assetID'=> '5',
			'rentalDateTime' => '2018-11-12 13:00:00',
			'returnDateTime' => '2018-12-10 18:00:00',
			'requisitionPurpose' => 'To be used in site',
			'siteID' => '3',
			'rentalStatus' => 'On Loan',
		]);
		Requisition::create([
			// 'requisitionID'=> '3',
			'staffID'=> '56789',
			'assetID'=> '4',
			'rentalDateTime' => '2018-11-05 09:00:00',
			'returnDateTime' => '2018-11-28 20:00:00',
			'requisitionPurpose' => 'To dig the ground',
			'siteID' => '4',
			'rentalStatus' => 'On Loan',
		]);
    Requisition::create([
			// 'requisitionID'=> '4',
			'staffID'=> '34567',
			'assetID'=> '8',
      'rentalDateTime' => '2018-11-19 09:30:00',
			'returnDateTime' => '2018-11-21 20:00:00',
      'requisitionPurpose' => 'Digging of trenches, holes, foundations',
			'siteID'=> '1',
			'rentalStatus' => 'On Loan',
		]);
    Requisition::create([
			// 'requisitionID'=> '5',
			'staffID'=> '34567',
			'assetID'=> '9',
      'rentalDateTime' => '2018-11-19 09:30:00',
			'returnDateTime' => '2018-11-21 20:00:00',
      'requisitionPurpose' => 'Demolition with hydraulic claw, cutter and breaker attachments',
			'siteID'=> '2',
			'rentalStatus' => 'On Loan',
		]);
    Requisition::create([
			// 'requisitionID'=> '6',
			'staffID'=> '34567',
			'assetID'=> '10',
      'rentalDateTime' => '2018-11-19 09:30:00',
			'returnDateTime' => '2018-11-21 20:00:00',
      'requisitionPurpose' => 'Digging of trenches, holes, foundations',
			'siteID'=> '3',
			'rentalStatus' => 'On Loan',
		]);
    }
}
