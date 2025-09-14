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
        Schema::create('footer_details', function (Blueprint $table) {
            $table->id();
            $table->string("fb_url");
            $table->string("twitter_url");
            $table->string("linkedin_url");
            $table->string("gplus_url");
            $table->string("insta_url");
            $table->string("email");
            $table->string("phone");
            $table->longText("address");
            $table->string("office_open_time");
            $table->string("office_close_time");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_details');
    }
};
