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
        Schema::create('deposit_funds', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("payment_mode");
            $table->float("amount")->default(0);
            $table->text("remark");
            $table->text("screenshot");
            $table->enum("status", [0, 1, 2])->default(2)->comment("0=cancel, 1=approved, 2=pending");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposit_funds');
    }
};
