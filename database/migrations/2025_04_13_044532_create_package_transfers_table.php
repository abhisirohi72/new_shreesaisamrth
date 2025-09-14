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
        Schema::create('package_transfers', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("t_user_id")->comment("transfer userid");
            $table->integer("pckg_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_transfers');
    }
};
