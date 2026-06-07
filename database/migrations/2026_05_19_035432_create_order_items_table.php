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
        Schema::create('order_items', function (Blueprint $table) {

            $table->id();

            // К какому заказу относится
            $table->foreignId('order_id')
                ->constrained()
                ->onDelete('cascade');

            // ID товара
            $table->unsignedBigInteger('product_id')
                ->nullable();

            // Данные товара
            $table->string('product_name');

            $table->string('product_image')
                ->nullable();

            // Количество
            $table->integer('quantity');

            // Цена за 1 товар
            $table->decimal('price', 10, 2);

            // Общая сумма позиции
            $table->decimal('total', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
