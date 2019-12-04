<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 55);
            $table->string('email', 55);
            $table->date('dob');
            $table->date('last_donation_date');
            $table->string('phone_number');
            $table->string('password');
            $table->unsignedTinyInteger('blood_type_id');
            $table->unsignedSmallInteger('city_id');
            $table->timestamps();

            $table->foreign('blood_type_id')
                ->references('id')
                ->on('blood_types')
                ->onDelete('restrict');

            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
