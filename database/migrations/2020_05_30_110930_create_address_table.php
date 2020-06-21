<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('LastName');
            $table->string('Country');
            $table->string('Address');
            $table->string('City');
            $table->string('State');
            $table->string('PostCode');
            $table->string('PhoneNo');
            $table->timestamps();
        });
        Schema::table('address', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
        
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
