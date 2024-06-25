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
        Schema::create('subjects_student', function (Blueprint $table) {
            $table->id();
            $table->integer("id_teacher");
            $table->integer("asignatura_1");
            $table->integer("asignatura_2");
            $table->boolean("studying_1");
            $table->boolean("studying_2");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects_student');
    }
};
