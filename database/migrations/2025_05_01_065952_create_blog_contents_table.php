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
        Schema::create('blog_contents', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('blog_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('blog_id')->index();
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
            $table->string('type'); // "heading", "text", "quote", "image"
            $table->text('content')->nullable();
            $table->string('image_path')->nullable(); 
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_contents');
    }
};
