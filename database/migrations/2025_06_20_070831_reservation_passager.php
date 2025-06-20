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
        Schema::create('reservation_passager', function (Blueprint $table) {
            $table->foreignId('reservations_id')->constrained()->onDelete('cascade');
            $table->foreignId('passagers_id')->constrained()->onDelete('cascade');
            $table->primary(['reservations_id', 'passagers_id']); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_passager');
    }
};