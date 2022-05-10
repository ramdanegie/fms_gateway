<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFclShippingInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcl_shipping_instructions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("fcl_id")->index();
            $table->string("si_number", 121)->nullable();

            // Freight and Remark
            $table->string("freight", 25)->nullable();
            $table->string("freight_bl_type", 25)->nullable();
            $table->text("freight_remark")->nullable();

            // Transhipment origin
            $table->string("origin_printed_as")->nullable();

            // Transhipment destination
            $table->string("destination_printed_as")->nullable();

            // Transhipment Port
            $table->unsignedBigInteger("port_id")->index()->nullable();
            $table->string("port_printed_as")->nullable();

            //Contacts
            $table->unsignedBigInteger("shipper_id")->index();
            $table->unsignedBigInteger("consignee_id")->index();
            $table->unsignedBigInteger("notifi_id")->index()->nullable();

            // Documents
            $table->text("attachments")->nullable();
            $table->text("goods_description")->nullable();

            $table->smallInteger("is_admin_approve")->default(0);
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
        Schema::dropIfExists('fcl_shipping_instructions');
    }
}
