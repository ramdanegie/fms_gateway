<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFclDraftDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcl_draft_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("fcl_id")->index();
            $table->tinyInteger("is_final")->default(0);
            $table->string("si_number", 121)->nullable();
            $table->string("bl_number", 121)->nullable();
            $table->string("airway_bill_number", 121)->nullable();
            $table->string("airway_bill_no", 121)->nullable();
            $table->string("draft_type", 25);

            $table->string("doc_at")->nullable();
            $table->string("doc_place")->nullable();
            $table->string("handling_information")->nullable();
            $table->string("first_carrier")->nullable();
            $table->timestamp("flight_date")->nullable();

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
        Schema::dropIfExists('fcl_draft_documents');
    }
}
