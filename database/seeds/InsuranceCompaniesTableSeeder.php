<?php

use Illuminate\Database\Seeder;
use App\InsuranceCompany;
class InsuranceCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      InsuranceCompany::create([
        // 'insuranceCompanyID' => '1',
        'insuranceCompanyName'=> 'Allianz General Insurance Company (M) Sdn. Bhd.',
        'companyContact' => '03-2264 1188',
        'companyAddress' => 'Suite 3A-15, Level 15, Block 3A, Plaza Sentral, Jalan Stesen Sentral 5, Kuala Lumpur Sentral, WP Kuala Lumpur, 50470 Kuala Lumpur',
        'insuranceAgent'=> 'Alex Tan',
        'insuranceAgentContact' => '012-8469525'
      ]);

      InsuranceCompany::create([
        // 'insuranceCompanyID' => '2',
        'insuranceCompanyName'=> 'AIG Malaysia Insurance Berhad',
        'companyContact' => '1-800-88-8811',
        'companyAddress' => 'A-13-P1 & A-13-1, Block A,, Jaya One 72A,, Jalan Universiti,, 46200 Petaling Jaya, Selangor',
        'insuranceAgent'=> 'Ben Lee',
        'insuranceAgentContact' => '012-6482597'
      ]);
    }
}
