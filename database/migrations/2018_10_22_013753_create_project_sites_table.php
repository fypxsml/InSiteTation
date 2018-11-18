<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_sites', function (Blueprint $table) {
            $table->increments('siteID');
            $table->string('address');
            $table->float('longitude');
            $table->float('latitude');
            $table->string('companyHandled');
            $table->string('projectName');
            $table->string('purpose');
            $table->string('status');
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
        Schema::dropIfExists('project_sites');
    }
}
