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
        Schema::create('usines', function (Blueprint $table) {
            $table->id();
            $table->string('label')->default('Fournisseur');
            $table->string('name_usine');
            $table->string('email_usine')->nullable();
            $table->string('phone_usine')->nullable();
            $table->string('adresse_usine')->nullable();            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usines');
    }
};
