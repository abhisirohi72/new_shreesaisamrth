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
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->enum("part_time", ["yes", "no"])->default("no");
            $table->enum("full_time", ["yes", "no"])->default("no");
            $table->integer("daily_commitment");
            $table->enum("target_based", ["yes", "no"])->default("no");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availabilities');
    }
};
