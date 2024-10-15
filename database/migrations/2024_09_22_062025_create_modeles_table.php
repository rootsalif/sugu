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
        Schema::create('modeles', function (Blueprint $table) {
            $table->id();
            $table->string('label')->default('Modele');
            $table->string('label_modele');
            $table->text('describ_modele')->nullable();
            $table->string('path_modele')->nullable();

            $table->unsignedBigInteger('marque_id')->nullable();
            $table->foreign('marque_id')->references('id')->on('marques')->onDelete('cascade');
            $table->unsignedBigInteger('sub_categorie_id')->nullable();
            $table->foreign('sub_categorie_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modeles');
    }
};
