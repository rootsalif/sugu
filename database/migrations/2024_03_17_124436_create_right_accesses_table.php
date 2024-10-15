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
        Schema::create('right_accesses', function (Blueprint $table) {
            $table->id();
            $table->string('label_right_accesse');

            $table->unsignedBigInteger('superadmin_id')->nullable();
            $table->foreign('superadmin_id')->references('id')->on('superadmins')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('right_accesses');
    }
};
