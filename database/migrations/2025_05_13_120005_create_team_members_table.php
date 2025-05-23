<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 100);
            $table->string('lastname', 100)->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->date('birth_date')->nullable();
            $table->date('hire_date')->nullable();
            $table->string('role', length: 100);
            $table->text('bio')->nullable();
            $table->string('image')->nullable();
            $table->string('phone_number', 25)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('instagram', 255)->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('x', 255)->nullable();
            $table->string('other_social_name', 15)->nullable();
            $table->string('other_social', 255)->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('created_by', 155)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
