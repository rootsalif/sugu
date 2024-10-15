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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name_admin');
            $table->string('profession_admin');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_admin');
            $table->string('address_admin')->nullable();
            $table->string('path_admin')->nullable();
            $table->string('pass_id_admin')->nullable();
            $table->enum('status_admin', ['Pending','desable', 'Active'])->default('Pending');
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
};
