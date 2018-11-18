<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasInsuranceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('has_insurance', function (Blueprint $table) {
          $table->increments('insuranceID');
          $table->integer('assetID');
          $table->integer('insuranceCompanyID');
          $table->date('previousExpDate');
          $table->date('currentExpDate');
      });

      DB::table('has_insurance')->insert([
          [
            'assetID' => '1',
            'insuranceCompanyID' => '2',
            'previousExpDate' => '2016-5-10',
            'currentExpDate' => '2017-5-10',
          ],

          [
            'assetID' => '2',
            'insuranceCompanyID' => '1',
            'previousExpDate' => '2016-12-10',
            'currentExpDate' => '2017-12-10',
          ],

          [
            'assetID' => '2',
            'insuranceCompanyID' => '1',
            'previousExpDate' => '2017-12-10',
            'currentExpDate' => '2018-12-10',
          ],

          [
            'assetID' => '1',
            'insuranceCompanyID' => '2',
            'previousExpDate' => '2017-5-10',
            'currentExpDate' => '2018-5-10',
          ],

          [
            'assetID' => '1',
            'insuranceCompanyID' => '2',
            'previousExpDate' => '2018-5-10',
            'currentExpDate' => '2019-5-10',
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
        Schema::dropIfExists('has_insurance');
    }
}
