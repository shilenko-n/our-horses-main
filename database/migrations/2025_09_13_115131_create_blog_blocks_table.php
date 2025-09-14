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
        Schema::create('blog_blocks', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['text', 'video', 'image', 'gallery']);
            $table->text('content')->nullable()->default(null);
            $table->string('title')->nullable()->default(null);
            $table->foreignId('blog_id')->constrained();
            $table->unsignedInteger('position')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_blocks');
    }
};
