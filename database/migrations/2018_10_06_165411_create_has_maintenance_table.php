<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('has_maintenance', function (Blueprint $table) {
            $table->increments('maintenanceID');
            $table->integer('assetID');
            $table->integer('serviceCompanyID');
            $table->string('serviceDescription');
            $table->dateTime('serviceDateTime');
            $table->date('nextServiceDate')->nullable();
            $table->float('maintenancePeriod');
            $table->timestamps();
        });

        DB::table('has_maintenance')->insert([
            [
              'assetID' => '1',
              'serviceCompanyID' => '2',
              'serviceDescription' => 'Change Battery',
              'serviceDateTime' => '2017-5-10',
              'nextServiceDate' => '2018-5-10',
              'maintenancePeriod' => '1'
            ],

            [
              'assetID' => '2',
              'serviceCompanyID' => '1',
              'serviceDescription' => 'Change Tyre',
              'serviceDateTime' => '2017-5-10',
              'nextServiceDate' => '2018-5-10',
              'maintenancePeriod' => '1'
            ],

            [
              'assetID' => '1',
              'serviceCompanyID' => '2',
              'serviceDescription' => 'Normal Checkup',
              'serviceDateTime' => '2017-11-21',
              'nextServiceDate' => '2018-11-21',
              'maintenancePeriod' => '2'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('has_maintenance');
    }
}
