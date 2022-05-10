<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellingPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selling_prices', function (Blueprint $table) {
            $table->id();
            $table->string("quote_no", 120);
            $table->string("code");
            $table->string("itemSevice");
            $table->double("qty");
            $table->double("unitPrice");
            $table->double("price");
            $table->string("condition");
            $table->string("itemType");
            $table->longText("payload");
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
        Schema::dropIfExists('selling_prices');
    }
}
