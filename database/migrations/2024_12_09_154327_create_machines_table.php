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
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->string('processeur');
            $table->integer('memoire');
            $table->string('systeme_exploitation');
            $table->date('purchase_date');
            $table->text('install_games')->nullable();
            $table->enum('status', ['disponible', 'en maintenance', 'reservé']);
            $table->dateTime('last_maintenance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machines');
    }
};
