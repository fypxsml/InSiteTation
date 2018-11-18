<?php

use Illuminate\Database\Seeder;
use App\ServiceCompany;

class ServiceCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      ServiceCompany::create([
        // 'serviceCompanyID' => '1',
        'serviceCompanyName'=> 'System Builders Maintenance Services Sdn. Bhd',
        'companyContact' => '03-6250989',
        'companyAddress' => '17, Jalan Metro Perdana Barat 8, Seri Edaran Light Industrial Park, 52100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia'
      ]);

      ServiceCompany::create([
        // 'serviceCompanyID' => '2',
        'serviceCompanyName'=> 'Service Master (M) Sdn. Bhd.',
        'companyContact' => '03-55107722',
        'companyAddress' => 'Shah Alam, Malaysia, 42, Jalan Bola Tampar 13/14, Seksyen 13, 40100 Shah Alam, Selangor'
      ]);
    }
}
