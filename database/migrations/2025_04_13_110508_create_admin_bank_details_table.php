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
        Schema::create('admin_bank_details', function (Blueprint $table) {
            $table->id();
            $table->string("logo")->nullable();
            $table->string("bank_name");
            $table->string("acnt_holder_name");
            $table->bigInteger("account_num");
            $table->string("ifsc");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_bank_details');
    }
};
