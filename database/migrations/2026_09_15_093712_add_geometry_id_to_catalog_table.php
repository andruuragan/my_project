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
        Schema::table('catalog', function (Blueprint $table) {
        $table->foreignId('geometry_id')
            ->nullable()
            ->after('description_id')
            ->constrained('catalog_geometries')
            ->nullOnDelete();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('catalog', function (Blueprint $table) {
        $table->dropForeign(['geometry_id']);
        $table->dropColumn('geometry_id');
    });
    }
};
