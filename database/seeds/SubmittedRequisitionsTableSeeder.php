<?php

use Illuminate\Database\Seeder;
use App\SubmittedRequisition;

class SubmittedRequisitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		SubmittedRequisition::create([
			'staffID'=> '34567',
			'assetID' => '1',
			'rentalDateTime' => '2018-11-02 01:00:00',
			'returnDateTime' => '2018-11-10 01:00:00',
			'requisitionPurpose' => 'To be used in equipment for site',
			'siteID'=> '1',
			'status'=> 'Approved',
			'requisitionID'=> '1',
		]);
		SubmittedRequisition::create([
			'staffID'=> '45678',
			'assetID' => '5',
			'rentalDateTime' => '2018-11-12 13:00:00',
			'returnDateTime' => '2018-12-10 18:00:00',
			'requisitionPurpose' => 'To be used in site',
			'siteID'=> '3',
			'status'=> 'Approved',
			'requisitionID'=> '2',
		]);
		SubmittedRequisition::create([
			'staffID'=> '45678',
			'assetID' => '4',
			'rentalDateTime' => '2018-11-05 09:00:00',
			'returnDateTime' => '2018-11-28 20:00:00',
			'requisitionPurpose' => 'To dig the ground',
			'siteID'=> '5',
			'status'=> 'Approved',
			'requisitionID'=> '3',
		]);
    SubmittedRequisition::create([
			'staffID'=> '34567',
			'assetID' => '7',
			'rentalDateTime' => '2018-11-18 09:00:00',
			'returnDateTime' => '2018-11-23 20:00:00',
			'requisitionPurpose' => 'Excavation and demolition for building',
			'siteID'=> '2',
			'status'=> 'Pending',

		]);
    SubmittedRequisition::create([
			'staffID'=> '34567',
			'assetID' => '8',
			'rentalDateTime' => '2018-11-19 09:30:00',
			'returnDateTime' => '2018-11-21 20:00:00',
			'requisitionPurpose' => 'Digging of trenches, holes, foundations',
			'siteID'=> '1',
			'status'=> 'Approved',
      'requisitionID'=> '4'
		]);
    SubmittedRequisition::create([
			'staffID'=> '34567',
			'assetID' => '9',
			'rentalDateTime' => '2018-11-19 09:30:00',
			'returnDateTime' => '2018-11-21 20:00:00',
			'requisitionPurpose' => 'Demolition with hydraulic claw, cutter and breaker attachments',
			'siteID'=> '2',
			'status'=> 'Approved',
      'requisitionID'=> '5'
		]);
    SubmittedRequisition::create([
			'staffID'=> '34567',
			'assetID' => '10',
			'rentalDateTime' => '2018-11-21 09:30:00',
			'returnDateTime' => '2018-11-23 20:00:00',
			'requisitionPurpose' => 'Digging of trenches, holes, foundations',
			'siteID'=> '3',
			'status'=> 'Approved',
      'requisitionID'=> '6'
		]);
    }
}
