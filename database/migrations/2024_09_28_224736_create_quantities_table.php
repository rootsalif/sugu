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
        Schema::create('quantities', function (Blueprint $table) {
            $table->id();
            $table->string('label')->default('Article');

            $table->unsignedBigInteger('price_article');
            $table->unsignedBigInteger('price_vent_article');
            $table->unsignedInteger('qte_article');
            $table->enum('status_article', ['Vent','Retourné', 'Promotion', 'Attente'])->default('Attente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quantities');
    }
};
