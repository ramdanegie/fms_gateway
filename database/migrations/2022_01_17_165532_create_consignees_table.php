<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsigneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consignees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->index();
            $table->string("consignee_name")->nullable();
            $table->string("country")->nullable();
            $table->string("city")->nullable();
            $table->string("address")->nullable();
            $table->string("pic_name")->nullable();
            $table->string("pic_phone")->nullable();
            $table->string("email")->nullable();
            $table->string("remark")->nullable();

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
        Schema::dropIfExists('consignees');
    }
}
