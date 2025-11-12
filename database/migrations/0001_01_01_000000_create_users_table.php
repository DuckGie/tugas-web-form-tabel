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
        Schema::create('students', function(Blueprint $table) {
        $table -> id();
        $table -> string('nim', 20)->unique();
        $table -> string('name', 100);
        $table -> enum('gender', ['L','P']);
        $table -> string('domisili', 100);
        $table -> year('angkatan');
        $table -> string('prodi', 100);
        $table -> string('fakultas', 100);
        $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
