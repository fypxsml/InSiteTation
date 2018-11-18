<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Asset;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

            $this->call('PermissionsTableSeeder');
            $this->call('RolesTableSeeder');
            $this->call('ConnectRelationshipsSeeder');
            $this->call('RoleUsersSeeder');
            //$this->call('UsersTableSeeder');

            $this->call('CategoriesTableSeeder');
            $this->call('SubcategoriesTableSeeder');
            $this->call('InsuranceCompaniesTableSeeder');
            $this->call('ServiceCompaniesTableSeeder');
            $this->call('AssetsTableSeeder');
            $this->call('AssetDetailsTableSeeder');

            $this->call('PendingUsersTableSeeder');

            $this->call('LocationsTableSeeder');
            $this->call('SubmittedRequisitionsTableSeeder');
            $this->call('RequisitionsTableSeeder');

            $this->call('ProjectSitesTableSeeder');
            $this->call('AssignedSitesTableSeeder');

        Model::reguard();
    }
}
