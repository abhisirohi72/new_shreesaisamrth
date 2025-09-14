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
        Schema::create('financial_details', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->enum("willing_to_invest", ["yes", "no"])->default("no");
            $table->string("investment_range");
            $table->string("expected_monthly_earning");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_details');
    }
};
