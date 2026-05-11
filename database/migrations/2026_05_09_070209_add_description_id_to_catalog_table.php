<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('catalog', function (Blueprint $table) {
            $table->foreignId('description_id')
                ->nullable()
                ->constrained('descriptions')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('catalog', function (Blueprint $table) {
            $table->dropConstrainedForeignId('description_id');
        });
    }
};
