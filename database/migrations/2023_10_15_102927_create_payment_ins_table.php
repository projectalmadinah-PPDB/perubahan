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
        Schema::create('payment_ins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            // $table->string('reference_id');
            $table->string('type_pembayaran');
            $table->string('status');
            $table->string('no_invoice');
            $table->string('amount');
            $table->text('link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_ins');
    }
};
