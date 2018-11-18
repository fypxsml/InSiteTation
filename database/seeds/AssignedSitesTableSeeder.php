<?php

use Illuminate\Database\Seeder;
use App\AssignedSite;

class AssignedSitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      AssignedSite::create([
        'staffID' => '34567',
        'siteID' => '1',
        'startDate' => '2017-10-10',
        'endDate' => '2019-11-11',
        'jobDescription' => 'Pavilion Ceylon Hill',
        'jobStatus' => 'Active',
        'remarks' => '',
      ]);

      AssignedSite::create([
        'staffID' => '34567',
        'siteID' => '2',
        'startDate' => '2017-01-10',
        'endDate' => '2019-02-11',
        'jobDescription' => 'Menara Khuan Choo',
        'jobStatus' => 'Active',
        'remarks' => '',
      ]);

      AssignedSite::create([
        'staffID' => '34567',
        'siteID' => '3',
        'startDate' => '2017-01-10',
        'endDate' => '2019-02-11',
        'jobDescription' => 'Lot 15',
        'jobStatus' => 'Active',
        'remarks' => '',
      ]);

      AssignedSite::create([
        'staffID' => '45678',
        'siteID' => '3',
        'startDate' => '2018-01-10',
        'endDate' => '2020-02-11',
        'jobDescription' => 'Lot 15',
        'jobStatus' => 'Active',
        'remarks' => '',
      ]);

      AssignedSite::create([
        'staffID' => '45678',
        'siteID' => '4',
        'startDate' => '2018-01-10',
        'endDate' => '2020-02-11',
        'jobDescription' => 'PR1MA @ Nusa Damai',
        'jobStatus' => 'Active',
        'remarks' => '',
      ]);

      AssignedSite::create([
        'staffID' => '45678',
        'siteID' => '5',
        'startDate' => '2018-01-10',
        'endDate' => '2020-02-11',
        'jobDescription' => 'Nilai Impian : Orkid',
        'jobStatus' => 'Active',
        'remarks' => '',
      ]);

      AssignedSite::create([
        'staffID' => '56789',
        'siteID' => '2',
        'startDate' => '2017-01-10',
        'endDate' => '2020-02-11',
        'jobDescription' => 'Menara Khuan Choo',
        'jobStatus' => 'Active',
        'remarks' => '',
      ]);

      AssignedSite::create([
        'staffID' => '56789',
        'siteID' => '6',
        'startDate' => '2017-05-10',
        'endDate' => '2021-01-11',
        'jobDescription' => 'Water Front City',
        'jobStatus' => 'Active',
        'remarks' => '',
      ]);
    }
}
