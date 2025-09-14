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
        Schema::create('user_side_menus', function (Blueprint $table) {
            $table->id();
            $table->enum("user_dashboard", ['0','1'])->default('0');
            $table->enum("user_wallet_details", ['0','1'])->default('0');
            $table->enum("user_payout_request", ['0','1'])->default('0');
            $table->enum("user_approved_payout", ['0','1'])->default('0');
            $table->enum("user_wallet_income", ['0','1'])->default('0');
            $table->enum("user_income_details", ['0','1'])->default('0');
            $table->enum("user_professional_details", ['0','1'])->default('0');
            $table->enum("user_financial_details", ['0','1'])->default('0');
            $table->enum("user_marketing_details", ['0','1'])->default('0');
            $table->enum("user_availability_details", ['0','1'])->default('0');
            $table->enum("user_personal_info", ['0','1'])->default('0');
            $table->enum("user_bank_details", ['0','1'])->default('0');
            $table->enum("user_kyc_details", ['0','1'])->default('0');
            $table->enum("user_change_password", ['0','1'])->default('0');
            $table->enum("user_plan_video", ['0','1'])->default('0');
            $table->enum("user_plan_pdf", ['0','1'])->default('0');
            $table->enum("user_plan_view", ['0','1'])->default('0');
            $table->enum("user_mail_support", ['0','1'])->default('0');
            $table->enum("user_online_support", ['0','1'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_side_menus');
    }
};
