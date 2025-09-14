<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\PayoutRequestController;
use App\Http\Controllers\User\ApprovedPayoutController;
use App\Http\Controllers\User\PersonalInfoController;
use App\Http\Controllers\User\ProfessionalDetailController;
use App\Http\Controllers\User\FinancialDetailsController;
use App\Http\Controllers\User\MarketingSkillsController;
use App\Http\Controllers\User\AvailabilityController;
use App\Http\Controllers\User\BankDetailsController;
use App\Http\Controllers\User\KycController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\User\GenealogyController;
use App\Http\Controllers\Admin\AdminGenealogyController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Developer\DashboardController as DeveloperDashboardController;
use App\Http\Controllers\Developer\FaviconController;
use App\Http\Controllers\Developer\FooterController;
use App\Http\Controllers\Developer\ChangeColorController;
use App\Http\Controllers\Developer\SideMenuController;
use App\Http\Controllers\User\PlanVideoController;
use App\Http\Controllers\User\SupportController;
// use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\User\EpinController;
use App\Http\Controllers\Admin\WithdrawlController;
use App\Http\Controllers\User\WithdrawlController as UserWithdrawlController;
use App\Http\Controllers\User\DepositFundController;
use App\Http\Controllers\Admin\DepositFundController as AdminFund;
use App\Http\Controllers\Admin\PackageController as AdminPackageController;
use App\Http\Controllers\User\PackageController;
use App\Http\Controllers\User\TeamController;
use App\Http\Controllers\User\CronController;
use App\Http\Controllers\User\OfficialController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\User\PayoutController;

Route::get('/create-storage-link', function () {
    // echo "abhishek"; exit;
    Artisan::call('storage:link');
    return "Storage link created successfully!";
});
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    
    return "Cache cleared successfully!";
});

Route::get('/session-test', function () {
    session(['test_key' => 'test_value']);
    return 'Session set';
});

Route::get('/session-check', function () {
    // dd(session()->all());
    return session('test_key', 'not found');
});

Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');


Route::get('/user_login', [LoginController::class, 'index'])->name("login");
// Route::get('/forgot_pass', [LoginController::class, 'forgotPass'])->name("forgot.pass");
// Route::post('/send_forgot_mail', [LoginController::class, 'sendForgotMail'])->name("send.forgot.mail");
// Route::get('/change_forgot_pass/{email}', [LoginController::class, 'forgotPass'])->name("change.forgot.pass");
Route::get('/register/{reference?}', [LoginController::class, 'register'])->name("user.register");
Route::post('/get_sponsor', [LoginController::class, 'getSponsor'])->name("user.get_sponsor");
Route::post('/save_register', [LoginController::class, 'saveRegister'])->name("user.save.register");
Route::post('/login', [LoginController::class, 'loginUser'])->name('user.login');
Route::get('/logout', [LoginController::class, 'logout'])->name("user.logout");
Route::get('/details/{id}/{pass}', [LoginController::class, 'userDetails'])->name("user.details");

Route::get('/monthly_wise_package_distribution', [CronController::class, 'monthlyWisePackageDistribution']);

Route::middleware(['auth:sanctum'])->prefix('developer')->group(function () {
    // *****User Menu******* //
    Route::get('/dashboard', [DeveloperDashboardController::class, 'index'])->name('developer.dashboard');

    // *****Favicon******* //
    Route::get('/favicon_upload', [FaviconController::class, 'index'])->name('favicon.upload');
    Route::post('/save_favicon_data', [FaviconController::class, 'addFavicon'])->name('favicon.save');
    Route::get('/view_favicon', [FaviconController::class, 'viewFavicon'])->name('view.favicon');
    Route::get('/edit_favicon', [FaviconController::class, 'editFavicon'])->name('developer.favicon.edit');

    // *****Footer Detials******* //
    Route::get('/add_footer_details', [FooterController::class, 'addFooterDetails'])->name('add.footer.details');
    Route::post('/save_footer_details', [FooterController::class, 'saveFooterDetails'])->name('footer.details.save');

    // *****Change Color******* //
    Route::get('/change_color', [ChangeColorController::class, 'changeColor'])->name('change.color');
    Route::get('/add_change_color', [ChangeColorController::class, 'addChangeColor'])->name('add.change.color');

    // *****Side Menu******* //
    Route::get('/side_menu', [SideMenuController::class, 'sideMenu'])->name('side.menu');
    Route::post('/add_permission_side_menu', [SideMenuController::class, 'addPermissionSideMenu'])->name('add.user.side.menu');

    // *****Admin Side Menu******* //
    Route::get('/admin_side_menu', [SideMenuController::class, 'adminSideMenu'])->name('admin.side.menu');
    Route::post('/add_permission_admin_side_menu', [SideMenuController::class, 'addPermissionAdminSideMenu'])->name('add.admin.side.menu');

});
// **User Routes**
Route::middleware(['auth:sanctum'])->prefix('user')->group(function () {
    
    // *****User Menu******* //
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/wallet', [DashboardController::class, 'index'])->name('wallet');
    Route::get('/payout_request', [PayoutRequestController::class, 'index'])->name('payout.request');
    Route::get('/approved_payout', [ApprovedPayoutController::class, 'index'])->name('approved.payout');

    /* Wallet Details */
    Route::get('/add_user_withdrawl', [UserWithdrawlController::class, 'addUserWithdrawl'])->name('user.withdrawl.add');
    Route::post('/save_user_withdrawl', [UserWithdrawlController::class, 'saveUserWithdrawl'])->name('save.user.withdrawl');
    Route::get('/show_user_withdrawl', [UserWithdrawlController::class, 'showUserWithdrawl'])->name('user.withdrawl.show');
    Route::get('/delete_withdrawl/{id}', [UserWithdrawlController::class, 'deleteWithdrawl'])->name('withdrawl.delete');
    Route::get('/user_add_crypto', [UserWithdrawlController::class, 'userAddCrypto'])->name("user.withdrawl.crypto");
    Route::post('/save_crypto', [UserWithdrawlController::class, 'saveCrypto'])->name("user.withdrawl.save.crypto");

    // *****Profile Management******* //
    Route::get('/add_personal_info', [PersonalInfoController::class, 'addPersonalInfo'])->name('add.personal.info');
    Route::post('/save_info', [PersonalInfoController::class, 'saveInfo'])->name('save.info');

    Route::get('/add_bank_details', [BankDetailsController::class, 'addBankDetails'])->name('add.bank.details');
    Route::post('/save_bank_details', [BankDetailsController::class, 'saveBankDetails'])->name('save.bank.details');

    Route::get('/add_kyc', [KycController::class, 'addKYC'])->name('add.kyc');
    Route::post('/save_kyc_details', [KycController::class, 'saveKycDetails'])->name('save.kyc.details');

    Route::get('/change_password', [PersonalInfoController::class, 'changePassword'])->name('change.password');
    Route::post('/update_password', [PersonalInfoController::class, 'updatePassword'])->name('user.pass.change');

    // *****Plan Details******* //
    Route::get('/view_plan_video', [PlanVideoController::class, 'viewPlanVideo'])->name('view.plan.video');

    Route::get('/view_plan_pdf', [PlanVideoController::class, 'viewPlanPDF'])->name('view.plan.pdf');
    Route::get('/download-pdf/{filename}', [PlanVideoController::class, 'downloadPDF'])->name("download.pdf");
    Route::get('/user_plan_view', [PlanVideoController::class, 'userPlanView'])->name('user.plan.view');
    Route::post('/plan_details', [PlanVideoController::class, 'planDetails'])->name('user.plan.details');
    Route::post('/plan_purchasing', [PlanVideoController::class, 'planPurchasing'])->name('plan.purchasing');
    Route::get('/user_plan_ads_view', [PlanVideoController::class, 'userPlanADSView'])->name('user.plan.ads.view');

    /* Investement */
    Route::get('/user_show_package', [PackageController::class, 'userShowPackage'])->name('user.show.package');
    Route::get('/user_investment_history', [PackageController::class, 'userInvestmentHistory'])->name('user.investment.history');
    Route::post("get_month_details", [PackageController::class, 'getMonthDetails'])->name("get.month.details");
    Route::get('/user_package_purchase/{package_id}', [PackageController::class, 'userPackagePurchase'])->name('user.package.purchase');
    Route::get('/user_package_transfer', [PackageController::class, 'userPackageTransfer'])->name('user.package.transfer');
    Route::post('/add_user_package_transfer', [PackageController::class, 'addUserPackageTransfer'])->name('add.user.package.transfer');


    // *****Support******* //
    Route::get('/mail_support', [SupportController::class, 'mailSupport'])->name("mail.support");
    Route::post('/send_mail_support', [SupportController::class, 'sendMailSupport'])->name("save.mail.support");
    // Route::get('/online_support', [SupportController::class, 'onlineSupport'])->name("online.support");
    // // Route::get('/messages/{userId}', [SupportController::class, 'fetchMessages'])->name('messages.fetch');8286 3374 4925
    // Route::post('/messages/send', [SupportController::class, 'sendMessage'])->name('messages.send');
    Route::get('/chat', [ChatController::class, 'userChat'])->name("online.support");
    Route::get('/messages', [ChatController::class, 'fetchMessages']);
    Route::post('/messages', [ChatController::class, 'sendMessage']);
    
    // *****Epin Management******* //
    Route::get('/create_epin', [EpinController::class, 'addEpin'])->name('create.epin');
    Route::post("/save_epin", [EpinController::class, 'createEpin'])->name("save.epin");
    Route::get('/qr_code/{id}', [EpinController::class, "transferEpin"])->name("qr.code");
    Route::get('/view_epin', [EpinController::class, "viewEpin"])->name("view.epin");
    Route::get('/delete_epin/{id}', [EpinController::class, "deleteEpin"])->name("epin.delete");


    // *****Details******* //
    Route::get('/add_professional_details', [ProfessionalDetailController::class, 'addProfessionalDetails'])->name('add.professional.details');
    Route::post('/save_info', [ProfessionalDetailController::class, 'saveInfo'])->name('save.info');

    Route::get('/add_financial_details', [FinancialDetailsController::class, 'addFinancialDetails'])->name('add.financial.details');
    Route::post('/save_financial_details', [FinancialDetailsController::class, 'saveFinancialDetails'])->name('save.financial.details');

    Route::get('/add_marketing_skill', [MarketingSkillsController::class, 'addMarketingSkill'])->name('add.marketing.skill');
    Route::post('/save_marketing_skill', [MarketingSkillsController::class, 'saveMarketingSkill'])->name('save.marketing.skill');

    Route::get('/add_availability', [AvailabilityController::class, 'addAvailability'])->name('add.availability');
    Route::post('/save_availability', [AvailabilityController::class, 'saveAvailability'])->name('save.availability');

    Route::get('/genealogy', [GenealogyController::class, 'index'])->name("admin.genealogy.show");
    Route::get('/mlm-tree/{id}', [GenealogyController::class, 'showMLMTree']);

    /* Deposit Fund */
    Route::get('/deposit_fund', [DepositFundController::class, 'depositFund'])->name("user.deposit.fund");
    Route::post('/get_crypto_detials', [DepositFundController::class, 'getCryptoDetials'])->name("crypto.details");
    Route::post('/deposit_fund_add', [DepositFundController::class, 'addDepositFund'])->name("deposit.fund.add");
    Route::get('/view_deposit_fund', [DepositFundController::class, 'viewDepositFund'])->name("user.view.deposit.fund");
    Route::get('/fund_transfer', [DepositFundController::class, 'fundTransfer'])->name("fund.transfer");
    Route::post('/get_user_details', [DepositFundController::class, 'getUserDetails'])->name("get.user.details");
    Route::post('/user_fund_transfer', [DepositFundController::class, 'userFundTransfer'])->name("user.fund.transfer");
    Route::get("/fund_history", [DepositFundController::class, 'fundHistory'])->name("fund.history");

    /* Team Details */
    Route::get('my_level_list', [TeamController::class, 'myLevelList'])->name("user.level.list.show");
    // Route::get('user_level_list', [TeamController::class, 'userLevelList'])->name("user.level.list");
    Route::get('user_level_list/{level?}/{user_ids?}', [TeamController::class, 'userLevelList'])->name("user.level.list");
    Route::get('my_direct_level_list', [TeamController::class, 'myDirectLevelList'])->name("user.direct.level.list.show");

    /*WELCOME LETTER */
    Route::get('welcome_letter', [OfficialController::class, 'welcomeLetter'])->name("welcome.letter");
    Route::get('identity_card', [OfficialController::class, 'identityCard'])->name("identity.card");

    /*Payout */
    Route::get("/self_payout", [PayoutController::class, 'selfPayout'])->name('self.payout');
    Route::get("/team_payout", [PayoutController::class, 'teamPayout'])->name('team.payout');
    Route::get("/payout_withdrawl_list", [PayoutController::class, 'payoutWithdrawlList'])->name('payout.withdrawl.list');
    Route::get("/payout_approval_list", [PayoutController::class, 'payoutApprovalList'])->name('payout.approval.list');
    Route::get("/payout_pending_list", [PayoutController::class, 'payoutPendingList'])->name('payout.pending.list');
    Route::get("/payout_rejected_list", [PayoutController::class, 'payoutRejectedList'])->name('payout.rejected.list');
});

Route::get('/admin_login', [AdminLoginController::class, 'index'])->name("admin.login");
Route::post('/save_admin_login', [AdminLoginController::class, 'checkAdminLogin'])->name("save.admin.login");
Route::get('/admin_logout', [AdminLoginController::class, 'logout'])->name("admin.logout");

// **Admin Routes** (Using Middleware Directly)
Route::middleware(['auth:sanctum', EnsureUserIsAdmin::class])->prefix('admin')->group(function () {
    /*Payout Distribution */
    Route::post("/payout_distribution", [PayoutController::class, 'sendDistribution'])->name("payout.distribution");
    Route::get("/distribution_user", [PayoutController::class, 'distributionUser'])->name("admin.distribution.user");

    /**Admin Dashboard */
    Route::get('/admin_dashboard', [AdminDashboardController::class, 'index'])->name("admin.dashboard");

    /* Withdrawl request */
    Route::get('/withdrawl_setting', [WithdrawlController::class, 'withdrawlSetting'])->name("admin.withdrawl.request");
    Route::post('/save_withdrawl', [WithdrawlController::class, 'saveWithdrawl'])->name("admin.withdrawl.save");
    Route::get('/admin_show_withdrawl', [WithdrawlController::class, 'adminShowWithdrawl'])->name("admin.withdrawl.show");
    
    Route::get('/admin_withdrawl_change_status/{id}/{status}', [WithdrawlController::class, 'adminWithdrawlChangeStatus'])->name("admin.withdrawl.change.status");
    Route::get('/admin_add_crypto', [WithdrawlController::class, 'adminAddCrypto'])->name("admin.withdrawl.crypto");
    Route::post('/save_crypto', [WithdrawlController::class, 'saveCrypto'])->name("admin.withdrawl.save.crypto");
    Route::get('/admin_bank_detail', [WithdrawlController::class, 'adminBankDetail'])->name("admin.bank_details.add");
    Route::post('/add_admin_bank_detail', [WithdrawlController::class, 'addAdminBankDetail'])->name("save.admin.bank_details");
    Route::post("/show_user_acnt", [WithdrawlController::class, 'showUserAcnt'])->name("show.user.acnt");


    /**Admin User Details */
    Route::get('/user_list', [AdminUserController::class, 'showUserList'])->name("admin.user.list");
    Route::get('/active_user_list', [AdminUserController::class, 'activeUserList'])->name("admin.user.list.active");
    Route::get('/non_active_user_list', [AdminUserController::class, 'nonActiveUserList'])->name("admin.user.list.nonactive");
    Route::get('/add_user', [AdminUserController::class, 'addUser'])->name("admin.user.add");
    Route::get('/edit_user/{id}', [AdminUserController::class, 'editUser'])->name("admin.user.edit");
    Route::get('/edit_user_banking/{id}', [AdminUserController::class, 'editUserBanking'])->name("admin.user.banking.edit");
    Route::post("/admin_user_save_banking", [AdminUserController::class, 'adminUserSaveBanking'])->name("admin.user.save.banking");

    Route::get('/user_status_change/{id}/{status}', [AdminUserController::class, 'userStatusChange'])->name("admin.user.status.change");
    
    Route::post('/admin_save_user', [AdminUserController::class, 'adminSaveUser'])->name("admin.user.save");
    
    // Route::post('/admin_update_user', [AdminUserController::class, 'adminSaveUser'])->name("admin.user.save");
    
    Route::get('/user_activation', [AdminUserController::class, 'userActivation'])->name("admin.user.activation");

    Route::get('/subscription_user', [AdminUserController::class, 'subscriptionUser'])->name("subscription.user");

    Route::get('/add_user_team_level', [AdminUserController::class, 'addUserTeamLevel'])->name("add.admin.team.level");

    Route::post('/add_user_save_team_level', [AdminUserController::class, 'addUserSaveTeamLevel'])->name("admin.user.save.team_level");

    Route::get('/admin_show_user_kyc', [AdminUserController::class, 'adminShowUserKyc'])->name("admin.user.show.kyc");
    
    Route::get('/admin_add_notification', [AdminUserController::class, 'adminAddNotification'])->name("add.admin.notification");
    
    Route::post("/admin_save_notification", [AdminUserController::class, 'adminSaveNotification'])->name('save.admin.notification');

    Route::get('/selfie/{encryptedSelfieFileName}', [AdminUserController::class, 'downloadSelfie']);
    
    Route::get('/user_kyc_change/{id}/{status}', [AdminUserController::class, 'userKYCChange'])->name("admin.user.kyc.change");

    /* Admin Genealogy */
    Route::get('/admin_genealogy', [AdminGenealogyController::class, 'index'])->name("admin.genealogy.show");
    Route::get('/admin_mlm-tree/{id}', [AdminGenealogyController::class, 'showMLMTree']);

    /* Plan MAnagement */
    Route::get('/adding_admin_plan', [PlanController::class, 'addEditAdminPlan'])->name("add.admin.plan");
    Route::get('/edit_admin_plan/{edit_id?}', [PlanController::class, 'addEditAdminPlan'])->name("edit.admin.plan");
    Route::post('/save_admin_plan', [PlanController::class, 'saveAdminPlan'])->name("save.admin.plan");

    Route::get('/view_admin_plan', [PlanController::class, 'viewAdminPlan'])->name("view.admin.plan");
    Route::get('/admin_plan_change_status/{id}/{status}', [PlanController::class, 'adminPlanChangeStatus'])->name("admin.plan.status_change");
    Route::get('/admin_plan_referal/{plan_id}', [PlanController::class, 'adminPlanReferal'])->name("admin.plan.referal");
    Route::get('/adding_admin_plan_video', [PlanController::class, 'addEditAdminPlanVideo'])->name("add.admin.plan");
    Route::get('/add_admin_plan_pdf', [PlanController::class, 'addEditAdminPlanPDF'])->name("add.admin.plan.pdf");
    Route::get('/add_admin_plan_add_ads', [PlanController::class, 'addAdminPlanADS'])->name("add.admin.plan.ads");
    Route::get('/investment_plan', [PlanController::class, 'investmentPlan'])->name("admin.investment.plan");
    Route::post('/save_investment', [PlanController::class, 'saveInvestment'])->name("save.investment");
    Route::get('/view_investment_plan', [PlanController::class, 'viewInvestmentPlan'])->name("admin.investment.view");
    Route::get('/investment_distribution/{id}', [PlanController::class, 'investmentDistribution'])->name("admin.plan.investment.distribution");
    


    Route::post("/save_direct_income", [PlanController::class, 'saveDirectIncome'])->name('save.direct.income');
    Route::post("/save_referal_income", [PlanController::class, 'saveReferalIncome'])->name('save.referal.income');
    Route::post("/save_rewards_income", [PlanController::class, 'saveRewardsIncome'])->name('save.rewards.income');
    Route::post("/save_view_income", [PlanController::class, 'saveViewIncome'])->name('save.view.income');
    Route::post("/save_task_income", [PlanController::class, 'saveTaskIncome'])->name('save.task.income');
    Route::post("/save_business_income", [PlanController::class, 'saveBusinessIncome'])->name('save.business.income');
    Route::post("/save_purchase_income", [PlanController::class, 'savePurchaseIncome'])->name('save.purchase.income');
    Route::post('/save_plan_video', [PlanController::class, 'savePlanVideo'])->name("save.plan.video");
    Route::post('/save_plan_pdf', [PlanController::class, 'savePlanPDF'])->name("save.plan.pdf");
    Route::post('/save_plan_ads', [PlanController::class, 'savePlanADS'])->name("save.plan.ads");
    Route::post('/add_investment_distribution', [PlanController::class, 'addInvestmentDistribution'])->name("add.investment.distribution");

    /* Support & Help */
    Route::get('/chat', [ChatController::class, 'adminChat'])->name("chat.view");
    Route::get('/messages', [ChatController::class, 'fetchMessages']);
    Route::get('/show_messages/{user_id}', [ChatController::class, 'showMessages']);
    Route::post('/messages', [ChatController::class, 'sendMessage']);

    /* user deposit fund */
    Route::get('/admin_deposit_fund_view', [AdminFund::class, 'viewDepositFund'])->name("admin.deposit_fund.view");
    Route::get('/deposit_fund_change_status/{fund_id}/{status}', [AdminFund::class, 'depositFundChangeStatus'])->name("admin.deposit_fund.change.status");
    Route::post('/save_admin_usdt_value', [AdminFund::class, 'saveUsdt'])->name("save.admin.usdt.value");
    
    /* Add Fund */
    Route::get('/admin_fund_add', [AdminFund::class, 'adminFundAdd'])->name("admin.fund.add");
    Route::post('/save_admin_add_fund', [AdminFund::class, 'saveAdminAddFund'])->name("save.admin.add_fund");
    Route::post('/get_user_name', [AdminFund::class, 'getUserName'])->name("admin.get.user.name");

    /*Change Password */
    Route::get('/admin_change_pass', [AdminLoginController::class, 'changePassword'])->name('admin.change.password');

    /* Magic Link */
    Route::get("/magic_link/{url}", [AdminLoginController::class, "magicLink"])->name('magic.link');

    /* Pop Up */
    Route::get("/pop_up", [AdminLoginController::class, "adminPopUp"])->name("admin.popup");
    Route::post("/add_pop_up", [AdminLoginController::class, "addPopUp"])->name("admin.add.popup");

    /*Package Transfer */
    Route::get("/admin_pckg_transfer", [AdminPackageController::class,'pckgTransfer'])->name("admin.package.transfer");
    Route::post("/add_package_transfer", [AdminPackageController::class, 'addPackageTransfer'])->name("add.admin.package.transfer");
});

Route::get('/test-session', function () {
    session()->flash('success', 'Session Test Passed!');
    return redirect('/');
});

// ** For FrontEnd **
Route::get("/", [HomeController::class, 'index'])->name('home');
Route::get("/about", [AboutController::class, 'index'])->name('about');
Route::get("/service", [ServiceController::class, 'index'])->name('service');
Route::get("/contact", [ContactController::class, 'index'])->name('contact.us');