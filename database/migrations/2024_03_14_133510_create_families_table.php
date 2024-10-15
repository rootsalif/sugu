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
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('label')->default('Famille');

            $table->string('label_family')->unique();
            $table->text('describ_family');
            $table->string('path_family');
            $table->timestamps();
            $table->unsignedBigInteger('superadmin_id');
            $table->foreign('superadmin_id')->references('id')->on('superadmins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
