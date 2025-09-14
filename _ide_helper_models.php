<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property float $usdt_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AddUsdt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AddUsdt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AddUsdt query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AddUsdt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AddUsdt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AddUsdt whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AddUsdt whereUsdtValue($value)
 */
	class AddUsdt extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $plan_id
 * @property string $level_name
 * @property float $level_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AddViewIncome newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AddViewIncome newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AddViewIncome query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AddViewIncome whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AddViewIncome whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AddViewIncome whereLevelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AddViewIncome whereLevelValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AddViewIncome wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AddViewIncome whereUpdatedAt($value)
 */
	class AddViewIncome extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $user_email
 * @property float $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $users
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminAddFund newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminAddFund newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminAddFund query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminAddFund whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminAddFund whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminAddFund whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminAddFund whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminAddFund whereUserEmail($value)
 */
	class AdminAddFund extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $logo
 * @property string $bank_name
 * @property string $acnt_holder_name
 * @property int $account_num
 * @property string $ifsc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminBankDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminBankDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminBankDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminBankDetail whereAccountNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminBankDetail whereAcntHolderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminBankDetail whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminBankDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminBankDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminBankDetail whereIfsc($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminBankDetail whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminBankDetail whereUpdatedAt($value)
 */
	class AdminBankDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property float|null $admin_charges
 * @property float|null $tds
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminCharges newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminCharges newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminCharges query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminCharges whereAdminCharges($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminCharges whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminCharges whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminCharges whereTds($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminCharges whereUpdatedAt($value)
 */
	class AdminCharges extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $notice
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminNotification query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminNotification whereNotice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminNotification whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminNotification whereUpdatedAt($value)
 */
	class AdminNotification extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $dashboard
 * @property string $all_user_list
 * @property string $add_new_user
 * @property string $user_activation
 * @property string $kyc_management
 * @property string $genealogy
 * @property string $direct_referal
 * @property string $binary_tree_view
 * @property string $rank_progression
 * @property string $earning_payout
 * @property string $commission_report
 * @property string $bonus_structure
 * @property string $withdrawl_request
 * @property string $payout_history
 * @property string $add_plan
 * @property string $view_plan
 * @property string $sales_transaction
 * @property string $product_sales
 * @property string $payment_transactions
 * @property string $subscription_plan
 * @property string $promotion_marketing
 * @property string $referal_links
 * @property string $promotional_offers
 * @property string $training_materials
 * @property string $reports_analytics
 * @property string $performance_reports
 * @property string $sales_reports
 * @property string $user_activity_logs
 * @property string $mlm_plan_config
 * @property string $commission_setting
 * @property string $payment_gateways
 * @property string $tax_settings
 * @property string $user_tickets
 * @property string $faq_knowledge
 * @property string $contact_support
 * @property string $admin_profile
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereAddNewUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereAddPlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereAdminProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereAllUserList($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereBinaryTreeView($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereBonusStructure($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereCommissionReport($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereCommissionSetting($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereContactSupport($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereDashboard($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereDirectReferal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereEarningPayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereFaqKnowledge($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereGenealogy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereKycManagement($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereMlmPlanConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu wherePaymentGateways($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu wherePaymentTransactions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu wherePayoutHistory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu wherePerformanceReports($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereProductSales($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu wherePromotionMarketing($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu wherePromotionalOffers($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereRankProgression($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereReferalLinks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereReportsAnalytics($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereSalesReports($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereSalesTransaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereSubscriptionPlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereTaxSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereTrainingMaterials($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereUserActivation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereUserActivityLogs($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereUserTickets($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereViewPlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminSideMenu whereWithdrawlRequest($value)
 */
	class AdminSideMenu extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string $status 0=In Active, 1=Active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads whereUrl($value)
 */
	class Ads extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $part_time
 * @property string $full_time
 * @property int $daily_commitment
 * @property string $target_based
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability whereDailyCommitment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability whereFullTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability wherePartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability whereTargetBased($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Availability whereUserId($value)
 */
	class Availability extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $holder_name
 * @property string $bank_name
 * @property string $account_number
 * @property string $ifsc
 * @property string|null $google_pe
 * @property string|null $phonepe
 * @property string|null $paytm
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BankDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BankDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BankDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BankDetail whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BankDetail whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BankDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BankDetail whereGooglePe($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BankDetail whereHolderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BankDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BankDetail whereIfsc($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BankDetail wherePaytm($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BankDetail wherePhonepe($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BankDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BankDetail whereUserId($value)
 */
	class BankDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $plan_id
 * @property string $level_name
 * @property float $level_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BusinessVolume newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BusinessVolume newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BusinessVolume query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BusinessVolume whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BusinessVolume whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BusinessVolume whereLevelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BusinessVolume whereLevelValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BusinessVolume wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BusinessVolume whereUpdatedAt($value)
 */
	class BusinessVolume extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $front_header
 * @property string|null $front_footer
 * @property string|null $backend_header
 * @property string|null $backend_sidebar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ColorChange newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ColorChange newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ColorChange query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ColorChange whereBackendHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ColorChange whereBackendSidebar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ColorChange whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ColorChange whereFrontFooter($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ColorChange whereFrontHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ColorChange whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ColorChange whereUpdatedAt($value)
 */
	class ColorChange extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $logo
 * @property string $qr_code
 * @property string $crypto_add
 * @property string $network
 * @property string $status 0=ina ctive, 1=active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Crypto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Crypto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Crypto query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Crypto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Crypto whereCryptoAdd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Crypto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Crypto whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Crypto whereNetwork($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Crypto whereQrCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Crypto whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Crypto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Crypto whereUserId($value)
 */
	class Crypto extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $payment_mode
 * @property float $amount
 * @property string $remark
 * @property string $screenshot
 * @property string $status 0=cancel, 1=approved, 2=pending
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DepositFund newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DepositFund newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DepositFund query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DepositFund whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DepositFund whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DepositFund whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DepositFund wherePaymentMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DepositFund whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DepositFund whereScreenshot($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DepositFund whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DepositFund whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DepositFund whereUserId($value)
 */
	class DepositFund extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $plan_id
 * @property string $level_name
 * @property float $level_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DirectIncome newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DirectIncome newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DirectIncome query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DirectIncome whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DirectIncome whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DirectIncome whereLevelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DirectIncome whereLevelValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DirectIncome wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DirectIncome whereUpdatedAt($value)
 */
	class DirectIncome extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $epin_name
 * @property int $qty
 * @property float $amnt
 * @property string $status 0= Unused, 1= Used, 2= expired
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Epin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Epin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Epin query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Epin whereAmnt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Epin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Epin whereEpinName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Epin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Epin whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Epin whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Epin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Epin whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Epin whereUserId($value)
 */
	class Epin extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $favicon
 * @property string $logo
 * @property string $backend_logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favicon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favicon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favicon query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favicon whereBackendLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favicon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favicon whereFavicon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favicon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favicon whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favicon whereUpdatedAt($value)
 */
	class Favicon extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $willing_to_invest
 * @property string $investment_range
 * @property string $expected_monthly_earning
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FinancialDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FinancialDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FinancialDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FinancialDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FinancialDetail whereExpectedMonthlyEarning($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FinancialDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FinancialDetail whereInvestmentRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FinancialDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FinancialDetail whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FinancialDetail whereWillingToInvest($value)
 */
	class FinancialDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $company_name
 * @property string $fb_url
 * @property string $twitter_url
 * @property string $linkedin_url
 * @property string $gplus_url
 * @property string $insta_url
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $office_open_time
 * @property string $office_close_time
 * @property string $footer_line
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FooterDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FooterDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FooterDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FooterDetail whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FooterDetail whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FooterDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FooterDetail whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FooterDetail whereFbUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FooterDetail whereFooterLine($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FooterDetail whereGplusUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FooterDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FooterDetail whereInstaUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FooterDetail whereLinkedinUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FooterDetail whereOfficeCloseTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FooterDetail whereOfficeOpenTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FooterDetail wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FooterDetail whereTwitterUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FooterDetail whereUpdatedAt($value)
 */
	class FooterDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $package_name
 * @property float $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\UserPackagePurchase|null $userPackagePurchase
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment wherePackageName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment whereUpdatedAt($value)
 */
	class Investment extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $aadhaar_num
 * @property string $pan_card
 * @property string $id_proof
 * @property string $self_image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KycDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KycDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KycDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KycDetail whereAadhaarNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KycDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KycDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KycDetail whereIdProof($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KycDetail wherePanCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KycDetail whereSelfImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KycDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KycDetail whereUserId($value)
 */
	class KycDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $fb
 * @property string $instagram
 * @property string $linkedin
 * @property string $whatsapp
 * @property string $selling
 * @property string $lead_generation
 * @property string $referal_business
 * @property string $public_speaking
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Marketing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Marketing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Marketing query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Marketing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Marketing whereFb($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Marketing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Marketing whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Marketing whereLeadGeneration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Marketing whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Marketing wherePublicSpeaking($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Marketing whereReferalBusiness($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Marketing whereSelling($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Marketing whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Marketing whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Marketing whereWhatsapp($value)
 */
	class Marketing extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $sender_id
 * @property int $receiver_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $receiver
 * @property-read \App\Models\User $sender
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereReceiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereUpdatedAt($value)
 */
	class Message extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PDF newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PDF newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PDF query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PDF whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PDF whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PDF whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PDF whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PDF whereUpdatedAt($value)
 */
	class PDF extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $package_id
 * @property float $hourly
 * @property float $daily
 * @property float $monthly
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageDistribution newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageDistribution newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageDistribution query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageDistribution whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageDistribution whereDaily($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageDistribution whereHourly($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageDistribution whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageDistribution whereMonthly($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageDistribution wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageDistribution whereUpdatedAt($value)
 */
	class PackageDistribution extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $investment_id
 * @property float $amount
 * @property int $level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackagePurchaseHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackagePurchaseHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackagePurchaseHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackagePurchaseHistory whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackagePurchaseHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackagePurchaseHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackagePurchaseHistory whereInvestmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackagePurchaseHistory whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackagePurchaseHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackagePurchaseHistory whereUserId($value)
 */
	class PackagePurchaseHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $t_user_id transfer userid
 * @property int $pckg_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageTransfer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageTransfer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageTransfer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageTransfer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageTransfer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageTransfer wherePckgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageTransfer whereTUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageTransfer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PackageTransfer whereUserId($value)
 */
	class PackageTransfer extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $plan_name 1=Silver, 2=Gold, 3=Platinum
 * @property string $joinning_fees 1=One time, 2=monthly
 * @property string $commision_type 1=Direct, 2=Binary, 3=Uni Level
 * @property string $payout_method 1=Bank Transfer, 2=Wallet, 3=UPI
 * @property float $min_withdrawl_limit
 * @property string $image
 * @property string $status o=in active, 1=active, 2=delete
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AddViewIncome|null $add_view_income
 * @property-read \App\Models\BusinessVolume|null $business_volume
 * @property-read \App\Models\DirectIncome|null $direct_income
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PlanPurchase> $plan_purchase
 * @property-read int|null $plan_purchase_count
 * @property-read \App\Models\PurchaseVolume|null $purchase_volume
 * @property-read \App\Models\ReferalIncome|null $referal_income
 * @property-read \App\Models\RewardsIncome|null $rewards_income
 * @property-read \App\Models\TaskIncome|null $task_income
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan whereCommisionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan whereJoinningFees($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan whereMinWithdrawlLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan wherePayoutMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan wherePlanName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan whereUpdatedAt($value)
 */
	class Plan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $plan_id
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanPurchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanPurchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanPurchase query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanPurchase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanPurchase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanPurchase wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanPurchase wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanPurchase whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanPurchase whereUserId($value)
 */
	class PlanPurchase extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string|null $video_upload
 * @property string|null $video_link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanVideo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanVideo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanVideo query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanVideo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanVideo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanVideo whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanVideo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanVideo whereVideoLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PlanVideo whereVideoUpload($value)
 */
	class PlanVideo extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup query()
 */
	class Popup extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $current_occupation
 * @property string $previous_mlm_exp
 * @property string|null $company_name
 * @property string|null $network_size
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfessionalDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfessionalDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfessionalDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfessionalDetail whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfessionalDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfessionalDetail whereCurrentOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfessionalDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfessionalDetail whereNetworkSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfessionalDetail wherePreviousMlmExp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfessionalDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfessionalDetail whereUserId($value)
 */
	class ProfessionalDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $plan_id
 * @property string $level_name
 * @property float $level_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PurchaseVolume newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PurchaseVolume newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PurchaseVolume query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PurchaseVolume whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PurchaseVolume whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PurchaseVolume whereLevelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PurchaseVolume whereLevelValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PurchaseVolume wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PurchaseVolume whereUpdatedAt($value)
 */
	class PurchaseVolume extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $plan_id
 * @property string $level_name
 * @property float $level_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferalIncome newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferalIncome newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferalIncome query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferalIncome whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferalIncome whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferalIncome whereLevelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferalIncome whereLevelValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferalIncome wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferalIncome whereUpdatedAt($value)
 */
	class ReferalIncome extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $rewards_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RewardCalculation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RewardCalculation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RewardCalculation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RewardCalculation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RewardCalculation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RewardCalculation whereRewardsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RewardCalculation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RewardCalculation whereUserId($value)
 */
	class RewardCalculation extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $plan_id
 * @property float $target
 * @property float $rewards
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RewardsIncome newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RewardsIncome newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RewardsIncome query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RewardsIncome whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RewardsIncome whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RewardsIncome whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RewardsIncome wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RewardsIncome whereRewards($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RewardsIncome whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RewardsIncome whereUpdatedAt($value)
 */
	class RewardsIncome extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $plan_id
 * @property string $level_name
 * @property float $level_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskIncome newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskIncome newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskIncome query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskIncome whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskIncome whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskIncome whereLevelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskIncome whereLevelValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskIncome wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskIncome whereUpdatedAt($value)
 */
	class TaskIncome extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $team_level
 * @property string|null $id_alpha
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamLevel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamLevel whereIdAlpha($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamLevel whereTeamLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamLevel whereUpdatedAt($value)
 */
	class TeamLevel extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property float $previous_wallet
 * @property float $current_wallet
 * @property string $reason
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionHistory whereCurrentWallet($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionHistory wherePreviousWallet($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionHistory whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionHistory whereUserId($value)
 */
	class TransactionHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $sender_id
 * @property int $reciever_id
 * @property int $epin_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferHistory whereEpinId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferHistory whereRecieverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferHistory whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferHistory whereUpdatedAt($value)
 */
	class TransferHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $unique_id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property int $sponsor_id
 * @property string $user_type 1=Admin,2=User, 3=Developer
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zipcode
 * @property string $status 0=Inactive, 1=active, 2=block, 3=delete
 * @property float $wallet
 * @property string $kyc_status 0=Un Verified, 1= Verified, 2=Pending
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $last_login
 * @property string|null $main_pass
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AdminAddFund> $adminaddfunds
 * @property-read int|null $adminaddfunds_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BankDetail> $bankDetails
 * @property-read int|null $bank_details_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DepositFund> $depositFunds
 * @property-read int|null $deposit_funds_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $downlines
 * @property-read int|null $downlines_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\KycDetail> $kycDetails
 * @property-read int|null $kyc_details_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read User|null $sponsor
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserWithdrawl> $userWithdrawl
 * @property-read int|null $user_withdrawl_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereKycStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereMainPass($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereSponsorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUniqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUserType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereWallet($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereZipcode($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $user_email
 * @property string $transfer_email
 * @property float $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserFundTransfer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserFundTransfer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserFundTransfer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserFundTransfer whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserFundTransfer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserFundTransfer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserFundTransfer whereTransferEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserFundTransfer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserFundTransfer whereUserEmail($value)
 */
	class UserFundTransfer extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $package_id
 * @property int $user_id
 * @property string|null $next_date
 * @property int $total max distribution -14
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Investment|null $investment
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPackagePurchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPackagePurchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPackagePurchase query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPackagePurchase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPackagePurchase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPackagePurchase whereNextDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPackagePurchase wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPackagePurchase whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPackagePurchase whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPackagePurchase whereUserId($value)
 */
	class UserPackagePurchase extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $user_dashboard
 * @property string $user_wallet_details
 * @property string $user_payout_request
 * @property string $user_approved_payout
 * @property string $user_wallet_income
 * @property string $user_income_details
 * @property string $user_professional_details
 * @property string $user_financial_details
 * @property string $user_marketing_details
 * @property string $user_availability_details
 * @property string $user_personal_info
 * @property string $user_bank_details
 * @property string $user_kyc_details
 * @property string $user_change_password
 * @property string $user_plan_video
 * @property string $user_plan_pdf
 * @property string $user_plan_view
 * @property string $user_mail_support
 * @property string $user_online_support
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserApprovedPayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserAvailabilityDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserBankDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserChangePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserDashboard($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserFinancialDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserIncomeDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserKycDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserMailSupport($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserMarketingDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserOnlineSupport($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserPayoutRequest($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserPersonalInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserPlanPdf($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserPlanVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserPlanView($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserProfessionalDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserWalletDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSideMenu whereUserWalletIncome($value)
 */
	class UserSideMenu extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property float $amount
 * @property float $admin_charge
 * @property float $tds
 * @property float $f_amount
 * @property string $status 0=pending, 1=active, 2=delete
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserWithdrawl newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserWithdrawl newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserWithdrawl query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserWithdrawl whereAdminCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserWithdrawl whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserWithdrawl whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserWithdrawl whereFAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserWithdrawl whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserWithdrawl whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserWithdrawl whereTds($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserWithdrawl whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserWithdrawl whereUserId($value)
 */
	class UserWithdrawl extends \Eloquent {}
}

