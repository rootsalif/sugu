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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('functional_id')->nullable();
            $table->foreign('functional_id')->references('id')->on('functionals')->onDelete('cascade');

            $table->unsignedBigInteger('right_accesse_id')->nullable();
            $table->foreign('right_accesse_id')->references('id')->on('right_accesses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
