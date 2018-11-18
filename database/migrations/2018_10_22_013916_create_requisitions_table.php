<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->increments('requisitionID');
            $table->string('staffID');
            $table->integer('assetID');
            $table->dateTime('rentalDateTime');
            $table->dateTime('returnDateTime');
            $table->string('requisitionPurpose');
            $table->integer('siteID');
            $table->string('remarks')->nullable();
            $table->string('rentalStatus');
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
        Schema::dropIfExists('requisitions');
    }
}
