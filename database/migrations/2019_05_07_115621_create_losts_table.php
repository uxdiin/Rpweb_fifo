<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('losts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_item');  
            $table->foreign('id_user')->references('id') 
            ->on('users')->onDelete('cascade');          
            $table->foreign('id_item')->references('id') 
            ->on('items')->onDelete('cascade'); 
            $table->date('lost_date')->nullable();
            $table->date('found_date')->nullable();
            $table->enum('status',['LOST','FOUND'])->nullable();  
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
        Schema::dropIfExists('losts');
    }
}
