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
        Schema::table('epins', function (Blueprint $table) {
            $table->enum("status", ["0", "1", "2"])->default("0")->comment("0= Unused, 1= Used, 2= expired");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('epins', function (Blueprint $table) {
            $table->dropColumn("status");
        });
    }
};
