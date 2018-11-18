<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assetID');
            $table->float('purchasedValue')->nullable();
            $table->float('netWorthValue')->nullable();
            $table->float('roadTaxValue')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('colour')->nullable();
            $table->string('carPlate')->nullable();
            $table->string('supplier')->nullable();
            $table->date('datePurchased')->nullable();
            $table->string('currentStatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asset_details');
    }
}
