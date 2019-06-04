<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_penerima');
            $table->unsignedInteger('id_pengirim');
            $table->unsignedInteger('id_item');
            $table->string('isi')->nullable();
            $table->foreign('id_penerima')->references('id') 
            ->on('users')->onDelete('cascade');
            $table->foreign('id_pengirim')->references('id') 
            ->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('notifications');
    }
}
