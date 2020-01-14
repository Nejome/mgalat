<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('country_id')->unsigned();
            $table->bigInteger('specialty_id')->unsigned();

            $table->string('name');
            $table->string('phone')->unique();
            $table->text('description')->nullable();

            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->unique()->nullable();

            $table->integer('status')->default(0); /* 0=offline , 1=online*/
            $table->integer('active')->default(0); /* 0=pending , 1=active , 3=disabled */

            $table->integer('is_special')->default(0);
            $table->date('special_until')->nullable();

            $table->string('image');

            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('specialty_id')->references('id')->on('specialties');

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
        Schema::dropIfExists('providers');
    }
}
