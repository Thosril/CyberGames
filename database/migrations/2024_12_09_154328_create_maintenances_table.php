<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom de la maintenance
            $table->text('description'); // Description détaillée de la maintenance
            $table->timestamp('start_date'); // Date de début de la maintenance
            $table->timestamp('end_date'); // Date de fin de la maintenance
            $table->enum('status', ['pending', 'completed', 'in_progress']); // Statut de la maintenance
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
