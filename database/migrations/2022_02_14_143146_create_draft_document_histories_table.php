<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDraftDocumentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draft_document_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("fcl_id")->index();
            $table->unsignedBigInteger("user_id")->index();
            $table->tinyInteger("is_admin")->default(0);
            $table->tinyInteger("is_update")->default(0);
            $table->text("detail");
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
        Schema::dropIfExists('draft_document_histories');
    }
}
