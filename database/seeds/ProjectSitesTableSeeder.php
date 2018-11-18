<?php

use Illuminate\Database\Seeder;
use App\ProjectSite;

class ProjectSitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      ProjectSite::create([
      // 'siteID' => '1',
      'address' => '1, Changkat Raja Chulan, Bukit Ceylon, 50200 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur',
      'longitude' => '101.705612',
      'latitude' => '3.149661',
      'companyHandled' => 'Malton',
      'projectName' => 'Pavilion Ceylon Hill',
      'purpose' => 'Premium service residence project',
      'status' => 'On-Going',
      'remarks' => '',
]);

ProjectSite::create([
      // 'siteID' => '2',
      'address' => 'Jalan Raja Chulan, Kuala Lumpur City',
      'longitude' => '101.712593',
      'latitude' => '3.150217',
      'companyHandled' => 'Malton',
      'projectName' => 'Menara Khuan Choo',
      'purpose' => 'Prime Office Tower',
      'status' => 'On-Going',
      'remarks' => '',
]);

ProjectSite::create([
      // 'siteID' => '3',
      'address' => 'Lot 15, Jalan SS16/1, Ss 16, 47500 Subang Jaya, Selangor, Malaysia',
      'longitude' => '101.591471',
      'latitude' => '3.083301',
      'companyHandled' => 'Sime Darby',
      'projectName' => 'Lot 15',
      'purpose' => 'Serviced Apartment',
      'status' => 'On-Going',
      'remarks' => '',
]);

ProjectSite::create([
      // 'siteID' => '4',
      'address' => 'PR1MA @ Nusa Damai, Johor, Pasir Gudang, Johor',
      'longitude' => '103.898672',
      'latitude' => '1.497738',
      'companyHandled' => 'Sime Darby',
      'projectName' => 'PR1MA @ Nusa Damai',
      'purpose' => 'Apartment',
      'status' => 'On-Going',
      'remarks' => '',
]);

ProjectSite::create([
      // 'siteID' => '5',
      'address' => 'Nilai Impian, Nilai, Negeri Sembilan',
      'longitude' => '101.796271',
      'latitude' => '2.846106',
      'companyHandled' => 'Sime Darby',
      'projectName' => 'Nilai Impian : Orkid',
      'purpose' => 'Double-storey link homes',
      'status' => 'On-Going',
      'remarks' => '',
]);

ProjectSite::create([
      // 'siteID' => '6',
      'address' => '30200 Lahat, Perak',
      'longitude' => '101.225',
      'latitude' => '4.3234',
      'companyHandled' => 'Excellent Realty Sdn Bhd, Tourism Perak Management Berhad',
      'projectName' => 'Water Front City',
      'purpose' => 'Ipoh City largest integrated residential and commercial development',
      'status' => 'On-Going',
      'remarks' => '',
]);

ProjectSite::create([
      // 'siteID' => '7',
      'address' => '43650, 14-32, Jalan Medan Pb 2a, Seksyen 9, 43650 Bandar Baru Bangi, Selangor',
      'longitude' => '101.7530',
      'latitude' => '2.9618',
      'companyHandled' => 'Sunway Bangi Sdn Bhd',
      'projectName' => 'Sunway Gandaria Bangi',
      'purpose' => 'Impressive Modern Lifestyle Living Residences',
      'status' => 'On-Going',
      'remarks' => '',
]);

ProjectSite::create([
      // 'siteID' => '8',
      'address' => 'Lot 120622, Pesisiran Pantai Tanjung Lumpur Mukim, 26060 Kuantan, Pahang',
      'longitude' => '103.3400',
      'latitude' => '3.7968',
      'companyHandled' => 'Ideal Heights Development Sdn Bhd',
      'projectName' => 'Kuantan Waterfront Resort City',
      'purpose' => 'Integrated Resort, Leisure and Entertainment Destinations within the seafront living enclave',
      'status' => 'On-Going',
      'remarks' => '',
]);

ProjectSite::create([
      // 'siteID' => '9',
      'address' => 'Jalan Pulau Melaka 1, Taman Pulau Melaka, 75000 Melaka',
      'longitude' => '102.2557',
      'latitude' => '2.1790',
      'companyHandled' => 'KAJ Development Sdn Bhd',
      'projectName' => 'Melaka Gateway',
      'purpose' => 'promoting Tourism, Lifestyle, SMART-City initiatives, Commercial & Business developments, Deep Sea Port, and a Maritime Industrial Park',
      'status' => 'On-Going',
      'remarks' => '',
]);

ProjectSite::create([
      // 'siteID' => '10',
      'address' => 'No. 1, Southbay City, Jalan Permatang Damar Laut, 11960 Bayan Lepas, Pulau Pinang',
      'longitude' => '100.2875',
      'latitude' => '5.2843',
      'companyHandled' => 'Vienna View Development Sdn. Bhd.',
      'projectName' => 'M Vista | Live in The Heart of Prosperity',
      'purpose' => 'standard for sustainable-luxury-real-estate',
      'status' => 'On-Going',
      'remarks' => '',
]);
    }
}
