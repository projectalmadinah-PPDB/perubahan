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
            $table->foreignId('notify_id')->nullable();
            $table->foreignId('generasi_id')->nullable();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('nomor')->nullable()->unique();
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('password');
            $table->string('status')->default('Belum');
            $table->enum('role',['user','admin'])->default('user');
            $table->integer('token')->nullable();
            $table->boolean('active')->default(0);
            $table->rememberToken();
            $table->softDeletes();
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
