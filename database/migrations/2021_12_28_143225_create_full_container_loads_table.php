<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFullContainerLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('full_container_loads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->index();
            $table->string("quote_no", 120)->unique()->nullable();
            $table->string("shipment_no", 120)->index()->unique()->nullable();
            $table->string("trade_type", 12)->nullable();
            $table->string("incoterm", 12)->nullable();
            $table->string("shipment_type", 12)->nullable();
            $table->string("npe_number", 120)->nullable();
            $table->dateTime("date_pickup")->nullable();
            $table->dateTime("date_unloading")->nullable();
            $table->dateTime("date_est_shipment")->nullable();
            $table->unsignedBigInteger("origin_id")->index()->nullable();
            $table->unsignedBigInteger("destination_id")->index()->nullable();
            $table->unsignedBigInteger("depot_id")->index()->nullable();
            $table->dateTime("date_depo_pickup")->nullable();
            $table->dateTime("date_depo_delivery")->nullable();
            $table->unsignedBigInteger("originport_id")->index()->nullable();
            $table->unsignedBigInteger("destiport_id")->index()->nullable();
            $table->dateTime("date_max_delivery")->nullable();
            $table->unsignedBigInteger("truck_id")->index()->nullable();
            $table->integer("qty_unit")->nullable();
            $table->string("vessel")->nullable();
            $table->string("voyage")->nullable();
            $table->text("file_documents")->nullable();
            $table->tinyInteger("is_temp")->default(1);
            $table->tinyInteger("is_custom_clearance")->nullable();
            $table->tinyInteger("is_request_cert_origin")->nullable();
            $table->tinyInteger("is_pickup")->nullable();
            $table->tinyInteger("is_delivery")->nullable();
            $table->tinyInteger("is_lolo_charge")->nullable();
            $table->string("insurance_cur", 12)->nullable();
            $table->double("insurance_amount")->nullable();
            $table->string("cargo_cur", 12)->nullable();
            $table->double("cargo_amount")->nullable();
            $table->string("freight_cur", 12)->nullable();
            $table->double("freight_amount")->nullable();
            $table->dateTime("issued_at")->nullable();
            $table->string("issued_status", 4)->nullable()->comment("null = new/pending; PRO = On Progress; COMP = Complete; REJ = Reject; CNL = Cancel");
            $table->text("issued_reason")->nullable();
            $table->unsignedBigInteger("delivery_id")->index()->nullable();
            $table->unsignedBigInteger("pickup_id")->index()->nullable();
            $table->text("file_performa_invoice")->nullable();
            $table->double("pi_value")->nullable();
            $table->string("pi_currency", 4)->nullable();
            $table->string("pi_status", 4)->default("WR")->comment("WR, OK, RJ");
            $table->timestamp("pi_upload_at")->nullable();
            $table->timestamp("pi_valid_until")->nullable();
            $table->string("quote_type", 12)->nullable();
            $table->timestamp("admin_update")->nullable();
            $table->text("addres_delivery")->nullable();
            $table->string("fleet_category", 112)->nullable();
            $table->string("fleet_type", 112)->nullable();
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
        Schema::dropIfExists('full_container_loads');
    }
}
