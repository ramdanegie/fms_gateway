<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFclCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcl_cargos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("fcl_id")->index();
            $table->unsignedBigInteger("cargo_id")->index()->nullable();
            $table->string("cargo_description", 191)->nullable();
            $table->string("cargo_type")->nullable();
            $table->string("cargo_hs_code", 25)->nullable();
            $table->double("cargo_length")->nullable();
            $table->double("cargo_height")->nullable();
            $table->double("cargo_depth")->nullable();
            $table->double("cargo_weight")->nullable();
            $table->double("cargo_volume")->nullable();
            $table->double("cargo_total_weight")->nullable();
            $table->double("cargo_total_unit")->nullable();
            $table->text("file_msds")->nullable();
            $table->text("file_cargo_image")->nullable();
            $table->string("cargo_package_type")->nullable();
            $table->text("marks_numbers")->nullable();
            $table->integer("is_volume")->default(0);
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
        Schema::dropIfExists('fcl_cargos');
    }
}
