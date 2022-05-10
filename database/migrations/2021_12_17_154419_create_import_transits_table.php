<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportTransitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_transits', function (Blueprint $table) {
            $table->id();
            $table->string("destination");
            $table->string("vessel");
            $table->string("voyage");
            $table->date("stf_cls")->nullable();
            $table->date("etd_origin")->nullable();
            $table->string("ves_connecting")->nullable();
            $table->string("voy_connecting")->nullable();
            $table->date("eta_destination")->nullable();
            $table->string("city_connecting")->nullable();
            $table->date("etd_destination")->nullable();
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
        Schema::dropIfExists('import_transits');
    }
}
