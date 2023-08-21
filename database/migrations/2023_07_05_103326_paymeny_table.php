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
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('username');
            $table->string('payed_for');
            $table->foreignId('blog_id')->nullable();
            $table->foreignId('note_id')->nullable();
            $table->integer('amount');
            $table->longText('esewa_status')->default('unverified');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_details');
        
    }
};
