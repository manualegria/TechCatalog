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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('serial', 50);
            $table->string('model', 50);
            $table->string('brand', 50);
            $table->string('type', 50);
            $table->string('specifications', 50);
            $table->string('owner', 50);
            $table->string('serial_peripheral', 50);
            $table->string('brand_peripheral', 50);
            $table->string('type_peripheral', 50);
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('campuses_id');
            $table->decimal('price', 10, 2);
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('campuses_id')->references('id')->on('campuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
