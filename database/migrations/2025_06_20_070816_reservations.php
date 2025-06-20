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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
           
            $table->foreignId('passagers_id')->constrained()->onDelete('cascade');
            $table->foreignId('trajets_id')->constrained()->onDelete('cascade');
            $table->foreignId('vehicules_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('chauffeurs_id')->nullable()->constrained()->onDelete('set null');
            $table->dateTime('date_reservation'); 
            $table->enum('statut', ['en_attente', 'confirmée', 'terminée', 'annulée'])->default('en_attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};