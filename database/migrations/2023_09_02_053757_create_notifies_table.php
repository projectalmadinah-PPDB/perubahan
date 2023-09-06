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
            $table->text('notif_gagal_otp')->nullable();
            $table->text('notif_pembayaran')->nullable();
            $table->text('notif_lolos')->nullable();
            $table->text('notif_gagal')->nullable();
            $table->text('notif_info')->nullable();
            $table->text('notif_wawancara')->nullable();
            $table->text('notif_verify')->nullable();
            $table->text('notif_belum_verify')->nullable();
            $table->text('notif_tidak_sah')->nullable();
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
