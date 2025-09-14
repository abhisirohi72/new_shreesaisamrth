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
        Schema::table('user_package_purchases', function (Blueprint $table) {
            $table->dateTime("next_date")->nullable();
            $table->integer("total")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_package_purchases', function (Blueprint $table) {
            $table->dropColumn(['next_date', 'total']);
        });
    }
};
