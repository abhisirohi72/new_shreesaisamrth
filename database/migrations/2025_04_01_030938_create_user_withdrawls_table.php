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
        Schema::create('user_withdrawls', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->float("amount", 8,2);
            $table->float("admin_charge");
            $table->float("tds");
            $table->float("f_amount", 8,2);
            $table->enum("status", [0,1,2])->default(0)->comment("0=pending, 1=active, 2=delete");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_withdrawls');
    }
};
