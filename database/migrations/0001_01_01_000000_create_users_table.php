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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // Data umum
            $table->string('universitas');
            $table->enum('jalur_program', ['KIP', 'Non-KIP']);
            $table->string('no_kip', 6)->unique();
            $table->string('file_kip');

            // Data pribadi
            $table->string('nama_lengkap');
            $table->string('nisn', 10)->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nama_ibu_kandung');
            $table->string('kewarganegaraan');
            $table->string('nik', 16)->unique();

            // Upload dokumen
            $table->string('file_ijazah');
            $table->string('no_ijazah');
            $table->string('file_transkrip');
            $table->string('file_foto');

            // Akademik
            $table->string('fakultas');
            $table->string('program_studi');

            // Kontak
            $table->string('no_hp', 20);
            $table->string('email')->unique();

            // Keamanan
            $table->string('password');
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
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