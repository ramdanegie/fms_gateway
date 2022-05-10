<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFclInvoicingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcl_invoicings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("fcl_id")->index();
            $table->string("invrule_type")->default("C")->comment("P, T, C");
            $table->string("status_flag", 15)->nullable();
            $table->text("file_attachments")->nullable();
            $table->text("remark")->nullable();
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
        Schema::dropIfExists('fcl_invoicings');
    }
}
