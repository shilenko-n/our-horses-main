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
        Schema::create('horses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->foreignId('city_id')->constrained('cities');
            $table->integer('views')->default(0);
            $table->string('chip_number');
            $table->date('birthday');
            $table->date('deathday')->nullable()->default(null);
            $table->string('birth_place');
            $table->foreignId('father_id')->nullable()->constrained('horses');
            $table->foreignId('mother_id')->nullable()->constrained('horses');
            $table->date('purchase_date')->nullable();
            $table->integer('height_withers')->nullable();
            $table->string('gender');
            $table->foreignId('horse_breed_id')->constrained('horse_breeds');
            $table->foreignId('horse_color_id')->constrained('horse_colors');
            $table->foreignId('horse_specialization_id')->constrained('horse_specializations');
            $table->boolean('moderating')->default(true);
            $table->boolean('draft')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horses');
    }
};
