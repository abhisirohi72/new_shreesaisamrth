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
        Schema::table('rewards_incomes', function (Blueprint $table) {
            $table->unique(['plan_id', 'target']); // Composite unique key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rewards_incomes', function (Blueprint $table) {
            $table->dropUnique(['plan_id', 'target']); // Remove unique key on rollback
        });
    }
};
