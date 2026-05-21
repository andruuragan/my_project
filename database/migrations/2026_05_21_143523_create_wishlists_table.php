<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // Зв'язуємо з твоєю таблицею каталогів (перевір, щоб назва збігалася, зазвичай 'catalogs')
            $table->foreignId('catalog_id')->constrained('catalogs')->cascadeOnDelete();
            $table->timestamps();

            // Захист: один юзер не може лайкнути один товар двічі
            $table->unique(['user_id', 'catalog_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
