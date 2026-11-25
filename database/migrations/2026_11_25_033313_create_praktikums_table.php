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
        Schema::create('praktikum', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id')->constrained('periode')->restrictOnDelete();
            $table->string('kode', 10)->unique();
            $table->string('nama', 100);
            $table->unsignedTinyInteger('semester');
            $table->string('sifat', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('praktikum');
    }
};
