<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_company', function (Blueprint $table) {
            $table->id();
            //$table->bigInteger('client_id')->unsigned();
            //$table->bigInteger('company_id')->unsigned();
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreignId('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('client_company');
    }
}
