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
        Schema::create('catalog_geometries', function (Blueprint $table) {
            $table->id();

            // Название геометрии
            $table->string('name');

            // Параметры геометрии
            $table->json('parameters')->nullable();

            // Хеш изображения
            $table->string('image_hash')->nullable()->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog_geometries');
    }
};