<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdfListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdf_list', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('service');
            $table->string('service_type');
            $table->string('service_pdf');
            $table->string('pdf_link');
            $table->text('json');
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
        Schema::dropIfExists('pdf_list');
    }
}
