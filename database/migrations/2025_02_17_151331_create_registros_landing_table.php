<?php

use App\Models\RegistroL;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosLandingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_landing', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email');
            $table->string('ciudad')->nullable();
            // $table->string('pais');
            $table->string('phone');
            $table->string('rrss')->nullable();
            $table->string('speciality')->nullable();
            $table->string('address')->nullable();
            $table->string('terminos');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('dondeSeEntero');
            $table->string('image')->nullable();
            
            $table->enum('status', [RegistroL::APPROVED, RegistroL::PENDING, 
            RegistroL::REJECTED, RegistroL::TESTING,
            RegistroL::FREETIME
            ])->default(RegistroL::PENDING);
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
        Schema::dropIfExists('registros_landing');
    }
}
