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
        Schema::create('sociallinks', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('logo')->nullable();
            $table->string('phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('secondary_email')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('google_map')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->integer('twitter')->nullable();
            $table->integer('linkdin')->nullable();
            $table->string('main_address')->nullable();
            $table->string('branch_address')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sociallinks');
    }
};
