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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('age');
            $table->enum('gender', ['male', 'female']);
            $table->string('employee_id');
            $table->string('email')->unique();
            $table->string('mobile_number')->unique();
            $table->string('alternate_mobile_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('qualification')->nullable();
            $table->string('designation')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('address')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('adhar_card_front_side')->nullable();
            $table->string('adhar_card_back_side')->nullable();
            $table->text('bio')->nullable();
            $table->string('usertype')->nullable();
            $table->string('company_name')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('password');
            $table->string('status');
            $table->string('remember_token');
            $table->timestamps();
            
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
