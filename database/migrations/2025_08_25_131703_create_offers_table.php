<?php

use App\Enums\OfferStatusType;
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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('horse_id')->constrained()->onDelete('cascade');
            $table->integer('price');
            $table->foreignId('currency_id')->constrained();
            $table->text('description');
            $table->string('whatsapp')->nullable()->default(null);
            $table->string('viber')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('vk')->nullable()->default(null);
            $table->string('telegram')->nullable()->default(null);
            $table->enum('status', OfferStatusType::cases())
                ->default(OfferStatusType::OPEN);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
