<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForfaitUserTable extends Migration
{
    public function up()
    {
        Schema::create('forfaits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->decimal('prix', 8, 2);  // Prix du forfait
            $table->text('description')->nullable();  // Description du forfait
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('forfaits');
    }

}
