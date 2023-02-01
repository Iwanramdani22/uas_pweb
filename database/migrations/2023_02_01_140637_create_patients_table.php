<?php

use App\Polyclinics;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('registration_code')->unique();
            $table->string('name');
            $table->date('birth_date');
            $table->string('gender');
            $table->unsignedBigInteger('polyclinics_id');
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('polyclinics_id')->references('id')->on('polyclinics')->onDelete('cascade');
            $table->foreign('doctors_id')->references('id')->on('doctors')->onDelete('cascade');
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
        Schema::dropIfExists('patients');
    }
}