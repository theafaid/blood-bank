<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_requests', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('patient_name', 55);
            $table->string('patient_age', 2);
            $table->unsignedTinyInteger('blood_type_id');
            $table->string('bags_count', 2);
            $table->string('hospital_name', 55);
            $table->decimal('lat', 8,6);
            $table->decimal('lng', 9,6);
            $table->unsignedMediumInteger('city_id');
            $table->string('phone_number');
            $table->text('note');
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
        Schema::dropIfExists('donation_requests');
    }
}
