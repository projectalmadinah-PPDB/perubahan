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
        Schema::create('notifies', function (Blueprint $table) {
            $table->id();
            $table->text('notif_otp')->nullable();
            $table->text('notif_pembayaran')->nullable();
            $table->text('notif_info')->nullable();//pengumuman
            $table->text('notif_wawancara')->nullable();//pengumuman
            $table->text('notif_lolos')->nullable();//pengumuman
            $table->text('notif_gagal')->nullable();//pengumuman
            $table->text('notif_login')->nullable();
            $table->text('notif_mengisi_pribadi')->nullable();
            $table->text('notif_melengkapi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifies');
    }
};
