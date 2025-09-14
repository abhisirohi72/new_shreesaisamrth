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
        Schema::create('marketings', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->enum("fb", ["yes", "no"])->default("no");
            $table->enum("instagram", ["yes", "no"])->default("no");
            $table->enum("linkedin", ["yes", "no"])->default("no");
            $table->enum("whatsapp", ["yes", "no"])->default("no");
            $table->enum("selling", ["yes", "no"])->default("no");
            $table->enum("lead_generation", ["yes", "no"])->default("no");
            $table->enum("referal_business", ["yes", "no"])->default("no");
            $table->enum("public_speaking", ["yes", "no"])->default("no");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketings');
    }
};
