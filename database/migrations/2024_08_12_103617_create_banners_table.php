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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('banner_title',200)->nullable();
            $table->string('banner_url',255)->nullable();
            $table->string('banner_image',200)->nullable();
            $table->string('page_type',200)->nullable();
            $table->string('banner_type',200)->nullable();
            $table->string('banner_content',255)->nullable();
            $table->string('sort_order',200)->nullable();
            $table->string('banner_status',200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
