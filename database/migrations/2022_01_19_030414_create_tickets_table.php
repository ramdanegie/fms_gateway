<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string("ticketable_type")->nullable();
            $table->unsignedBigInteger("ticketable_id")->nullable();
            $table->unsignedBigInteger("user_id")->comment("usr who create ticket");
            $table->string("subject")->nullable();
            $table->text("message")->nullable();
            $table->string("dept")->nullable();
            $table->string("attachment")->nullable();
            $table->tinyInteger("is_publish")->default(0);
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
        Schema::dropIfExists('tickets');
    }
}
