<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFclContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcl_containers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("fcl_id")->index();
            $table->string("size", 4)->nullable();
            $table->string("type", 5)->nullable();
            $table->integer("qty")->nullable();
            $table->text("containers")->nullable();
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
        Schema::dropIfExists('fcl_containers');
    }
}
