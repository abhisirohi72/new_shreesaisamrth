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
        Schema::table('purchase_volumes', function (Blueprint $table) {
            $table->unique(['plan_id', 'level_name']); // Composite unique key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_volumes', function (Blueprint $table) {
            $table->dropUnique(['plan_id', 'level_name']); // Remove unique key on rollback
        });
    }
};
