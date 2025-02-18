<?php

use App\Models\Doctor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email');
            $table->string('ciudad');
            $table->string('phone');
            $table->string('speciality');
            $table->string('address');
            $table->string('terminos');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('dondeSeEntero');
            $table->string('image')->nullable();
            
            $table->enum('status', [Doctor::APPROVED, Doctor::PENDING, Doctor::REJECTED])->default(Doctor::PENDING);
            // Provider IDs
            $table->unsignedBigInteger('type_id')->nullable();
            $table->unsignedBigInteger('pais_id')->nullable();

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
        Schema::dropIfExists('doctors');
    }
}
