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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_libro');
            $table->date('fecha_prestamo');
            $table->date('fecha_vencimiento');
            $table->date('fecha_devolucion')->nullable(); // puede contener null como valor
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_libro')->references('id')->on('libros');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
