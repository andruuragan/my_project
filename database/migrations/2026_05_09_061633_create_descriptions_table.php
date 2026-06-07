<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('descriptions', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->longText('overview')->nullable();

            $table->longText('advantages')->nullable();

            $table->longText('usage')->nullable();

            $table->longText('why_choose_us')->nullable();

            $table->longText('additional_info')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('descriptions');
    }
};
