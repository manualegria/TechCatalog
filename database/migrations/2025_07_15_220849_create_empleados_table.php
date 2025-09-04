<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('numero_empleado')->nullable();
            $table->string('codigo_interno')->nullable();
            $table->string('lugar_trabajo')->nullable();
            $table->string('nivel_riesgo')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->string('sexo')->nullable();
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('cedula')->nullable();
            $table->string('lugar_nacimiento')->nullable();
            $table->string('lugar_expedicion')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('rh')->nullable();
            $table->string('edad')->nullable();
            $table->string('correo')->nullable();
            $table->string('correo_corporativo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('barrio')->nullable();
            $table->string('celular')->nullable();
            $table->string('cargo')->nullable();
            $table->string('area')->nullable();
            $table->string('tipo_contrato')->nullable();
            $table->string('eps')->nullable();
            $table->string('afp')->nullable();
            $table->string('arl')->nullable();
            $table->string('cesantias')->nullable();
            $table->string('caja_compensacion')->nullable();
            $table->string('nombre_familiar_1')->nullable();
            $table->string('parentesco_1')->nullable();
            $table->string('telefono_familiar_1')->nullable();
            $table->string('nombre_familiar_2')->nullable();
            $table->string('parentesco_2')->nullable();
            $table->string('telefono_familiar_2')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
