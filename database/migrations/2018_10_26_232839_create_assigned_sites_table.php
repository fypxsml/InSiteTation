<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignedSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('staffID');
            $table->integer('siteID');
            $table->date('startDate');
            $table->date('endDate');
            $table->string('jobDescription');
            $table->string('jobStatus');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('assigned_sites');
    }
}
