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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            // $table->foreignId('generation_id');
            $table->string('birthplace'); // tempat lahir
            $table->string('nik'); //nomor induk kependudukan
            $table->string('nisn'); //nomor induk siswa nasional
            $table->text('hobby'); //hoby
            $table->text('ambition'); //cita2
            $table->string('last_graduate');
            $table->string('old_school');
            $table->text('organization_exp');
            $table->text('address');
            $table->string('status')->default('tidak');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
