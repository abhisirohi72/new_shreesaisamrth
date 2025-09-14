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
        Schema::create('package_distributions', function (Blueprint $table) {
            $table->id();
            $table->integer("package_id");
            $table->float("hourly", 8,2);
            $table->float("daily", 8,2);
            $table->float("monthly", 8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_distributions');
    }
};
