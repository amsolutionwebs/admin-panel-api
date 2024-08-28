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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('post_title',200);
            $table->string('post_title_seo_url',200);
            $table->string('post_content',200)->nullable();
            $table->string('post_type',200)->nullable();
            $table->string('seo_title',200);
            $table->string('meta_keywords',200);
            $table->string('meta_description',200);
            $table->string('post_status',200);
            $table->string('post_image',200)->nullable();
            $table->string('sort_order',55)->default(0); 
            $table->string('post_id',55)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
