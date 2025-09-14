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
        Schema::create('color_changes', function (Blueprint $table) {
            $table->id();
            $table->string("front_header")->nullable();
            $table->string("front_footer")->nullable();
            $table->string("backend_header")->nullable();
            $table->string("backend_sidebar")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_changes');
    }
};
