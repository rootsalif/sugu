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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('label')->default('Categorie');

            $table->string('label_categorie')->unique();
            $table->text('describ_categorie');
            $table->string('path_categorie')->nullable();

            $table->unsignedBigInteger('familie_id');
            $table->foreign('familie_id')->references('id')->on('families')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
