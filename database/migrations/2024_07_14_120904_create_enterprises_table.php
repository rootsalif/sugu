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
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id();
            $table->string('name_enterprise');
            $table->string('logo_enterprise')->nullable();
            $table->string('font_path_enterprise')->nullable();
            $table->string('phone_enterprise');
            $table->string('address_enterprise');
            $table->longText('describ_enterprise');
            $table->string('num_Id_enterprise')->nullable();
            $table->text('argument_enterprise');
            $table->string('email_enterprise');
            // $table->string('activity_enterprise');
            $table->date('created_enterprise');
            $table->enum('status_enterprise', [
                'Respecter', 'Active',
            ])->nullable();       
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enterprises');
    }
};
