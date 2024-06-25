<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * El usuario tendra:
 * Nombre, apellidos, correo, dni o nie, genero, rol (profesor, admin, alumn), direccion, num tel, fecha
 */

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('avatar');
            $table->string('name');
            $table->string('surname1');
            $table->string('surname2');
            $table->string('email');
            $table->string('dni')->unique();
            $table->date('birthdate');
            $table->string('gender');
            $table->string('rol');
            $table->string('adress');
            $table->string('phone');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
