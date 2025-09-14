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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->enum('plan_name', ['1','2','3'])->comment('1=Silver, 2=Gold, 3=Platinum');
            $table->enum('joinning_fees', ['1','2'])->comment('1=One time, 2=monthly');
            $table->enum('commision_type', ['1','2','3'])->comment('1=Direct, 2=Binary, 3=Uni Level');
            $table->enum('payout_method', ['1','2','3'])->comment('1=Bank Transfer, 2=Wallet, 3=UPI');
            $table->float('min_withdrawl_limit', 8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
