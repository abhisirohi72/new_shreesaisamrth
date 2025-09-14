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
        Schema::create('admin_side_menus', function (Blueprint $table) {
            $table->id();
            $table->enum("dashboard", ['0','1'])->default('0');
            $table->enum("all_user_list", ['0','1'])->default('0');
            $table->enum("add_new_user", ['0','1'])->default('0');
            $table->enum("user_activation", ['0','1'])->default('0');
            $table->enum("kyc_management", ['0','1'])->default('0');
            $table->enum("genealogy", ['0','1'])->default('0');
            $table->enum("direct_referal", ['0','1'])->default('0');
            $table->enum("binary_tree_view", ['0','1'])->default('0');
            $table->enum("rank_progression", ['0','1'])->default('0');
            $table->enum("earning_payout", ['0','1'])->default('0');
            $table->enum("commission_report", ['0','1'])->default('0');
            $table->enum("bonus_structure", ['0','1'])->default('0');
            $table->enum("withdrawl_request", ['0','1'])->default('0');
            $table->enum("payout_history", ['0','1'])->default('0');
            $table->enum("add_plan", ['0','1'])->default('0');
            $table->enum("view_plan", ['0','1'])->default('0');
            $table->enum("sales_transaction", ['0','1'])->default('0');
            $table->enum("product_sales", ['0','1'])->default('0');
            $table->enum("payment_transactions", ['0','1'])->default('0');
            $table->enum("subscription_plan", ['0','1'])->default('0');
            $table->enum("promotion_marketing", ['0','1'])->default('0');
            $table->enum("referal_links", ['0','1'])->default('0');
            $table->enum("promotional_offers", ['0','1'])->default('0');
            $table->enum("training_materials", ['0','1'])->default('0');
            $table->enum("reports_analytics", ['0','1'])->default('0');
            $table->enum("performance_reports", ['0','1'])->default('0');
            $table->enum("sales_reports", ['0','1'])->default('0');
            $table->enum("user_activity_logs", ['0','1'])->default('0');
            $table->enum("mlm_plan_config", ['0','1'])->default('0');
            $table->enum("commission_setting", ['0','1'])->default('0');
            $table->enum("payment_gateways", ['0','1'])->default('0');
            $table->enum("tax_settings", ['0','1'])->default('0');
            $table->enum("user_tickets", ['0','1'])->default('0');
            $table->enum("faq_knowledge", ['0','1'])->default('0');
            $table->enum("contact_support", ['0','1'])->default('0');
            $table->enum("admin_profile", ['0','1'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_side_menus');
    }
};
