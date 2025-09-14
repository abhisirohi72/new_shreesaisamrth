<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        @if($userSidebarPermissions->user_dashboard=="1")
        <li class="nav-item">
            <a class="nav-link " href="{{ route('user.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @endif

        @if(($userSidebarPermissions->user_income_details=="1") || ($userSidebarPermissions->user_professional_details=="1") || ($userSidebarPermissions->user_financial_details=="1") || ($userSidebarPermissions->user_marketing_details=="1") || ($userSidebarPermissions->user_availability_details=="1"))
        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='add_professional_details') || (request()->segment(2)!='add_financial_details') || (request()->segment(2)!='add_marketing_skill') || (request()->segment(2)!='add_availability')) collapsed @endif" data-bs-target="#components-inc" data-bs-toggle="collapse" href="#">
                <i class="bx bxs-comment-detail"></i><span>Details</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-inc" class="nav-content collapse @if((request()->segment(2)=='add_professional_details') || (request()->segment(2)=='add_financial_details') || (request()->segment(2)=='add_marketing_skill') || (request()->segment(2)=='add_availability')) show @endif" data-bs-parent="#sidebar-nav">
                {{-- @if($userSidebarPermissions->user_income_details=="1")
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Income Details</span>
                    </a>
                </li>
                @endif --}}

                @if($userSidebarPermissions->user_professional_details=="1")
                <li>
                    <a href="{{ route('add.professional.details') }}" @if(request()->segment(2)=='add_professional_details') class='active' @endif>
                        <i class="bi bi-circle"></i><span>Professional Details</span>
                    </a>
                </li>
                @endif

                @if($userSidebarPermissions->user_financial_details=="1")
                <li>
                    <a href="{{ route('add.financial.details') }}" @if(request()->segment(2)=='add_financial_details') class='active' @endif>
                        <i class="bi bi-circle"></i><span>Financial & Investment Details</span>
                    </a>
                </li>
                @endif

                @if($userSidebarPermissions->user_marketing_details=="1")
                <li>
                    <a href="{{ route('add.marketing.skill') }}" @if(request()->segment(2)=='add_marketing_skill') class='active' @endif>
                        <i class="bi bi-circle"></i><span>Marketing & Sales Skills</span>
                    </a>
                </li>
                @endif

                @if($userSidebarPermissions->user_availability_details=="1")
                <li>
                    <a href="{{ route('add.availability') }}" @if(request()->segment(2)=='add_availability') class='active' @endif>
                        <i class="bi bi-circle"></i><span>Availability & Commitment</span>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif

        @if(($userSidebarPermissions->user_personal_info=="1") || ($userSidebarPermissions->user_bank_details=="1") || ($userSidebarPermissions->user_kyc_details=="1") || ($userSidebarPermissions->user_change_password=="1"))
        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='add_personal_info') && (request()->segment(2)!='add_kyc') && (request()->segment(2)!='add_bank_details') && (request()->segment(2)!='change_password') && (request()->segment(2)!='user_add_crypto')) collapsed @endif" data-bs-target="#components-profile" data-bs-toggle="collapse" href="#">
                <i class="bx bxs-user"></i><span>Profile Management</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-profile" class="nav-content collapse @if((request()->segment(2)=='add_personal_info') || (request()->segment(2)=='add_kyc') || (request()->segment(2)=='add_bank_details') || (request()->segment(2)=='change_password') || (request()->segment(2)=='user_add_crypto')) show @endif" data-bs-parent="#sidebar-nav">
                @if($userSidebarPermissions->user_personal_info=="1")
                <li>
                    <a href="{{ route('add.personal.info') }}" @if(request()->segment(2)=='add_personal_info') class='active' @endif>
                        <i class="bi bi-circle"></i><span>Personal Information</span>
                    </a>
                </li>
                @endif

                @if($userSidebarPermissions->user_bank_details=="1")
                <li>
                    <a href="{{ route('add.bank.details') }}" @if(request()->segment(2)=='add_bank_details') class='active' @endif>
                        <i class="bi bi-circle"></i><span>Bank Details</span>
                    </a>
                </li>
                @endif

                <li>
                    <a href="{{ route('user.withdrawl.crypto') }}" @if(request()->segment(2)=="user_add_crypto") class="active" @endif>
                        <i class="bi bi-circle"></i><span>Crypto Payment</span>
                    </a>
                </li>

                @if($userSidebarPermissions->user_kyc_details=="1")
                <li>
                    <a href="{{ route('add.kyc') }}" @if(request()->segment(2)=='add_kyc') class='active' @endif>
                        <i class="bi bi-circle"></i><span>KYC Details</span>
                    </a>
                </li>
                @endif

                @if($userSidebarPermissions->user_change_password=="1")
                <li>
                    <a href="{{ route('change.password') }}" @if(request()->segment(2)=="change_password") class='active' @endif>
                        <i class="bi bi-circle"></i><span>Change Password</span>
                    </a>
                </li>
                @endif

                {{-- @if($userSidebarPermissions->user_change_password=="1") --}}
                
                {{-- @endif --}}
            </ul>
        </li>
        @endif

        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='deposit_fund') && (request()->segment(2)!='view_deposit_fund') && (request()->segment(2)!='fund_history')) collapsed @endif" data-bs-target="#components-deposit_fund" data-bs-toggle="collapse" href="#">
                <i class="bi bi-currency-rupee"></i><span>Top Up</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-deposit_fund" class="nav-content collapse @if((request()->segment(2)=='deposit_fund') || (request()->segment(2)=='view_deposit_fund') || (request()->segment(2)=='fund_history')) show @endif" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('user.deposit.fund') }}" @if(request()->segment(2)=="deposit_fund") class='active' @endif>
                        <i class="ri-capsule-line"></i><span>Add Deposit Fund</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.view.deposit.fund') }}" @if(request()->segment(2)=="view_deposit_fund") class='active' @endif>
                        <i class="ri-capsule-line"></i><span>View Deposit Fund</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('fund.transfer') }}" @if(request()->segment(2)=="fund_transfer") class='active' @endif>
                        <i class="ri-capsule-line"></i><span>Fund Transfer</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('fund.history') }}" @if(request()->segment(2)=="fund_history") class='active' @endif>
                        <i class="ri-capsule-line"></i><span>History</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='welcome_letter') && (request()->segment(2)!='identity_card')) collapsed @endif" data-bs-target="#components-welcome_letter" data-bs-toggle="collapse" href="#">
                <i class="bi bi-building-fill"></i><span>Official</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-welcome_letter" class="nav-content collapse @if((request()->segment(2)=='welcome_letter') || (request()->segment(2)=='identity_card')) show @endif" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('welcome.letter') }}" @if(request()->segment(2)=="welcome_letter") class='active' @endif>
                        <i class="ri-capsule-line"></i><span>Welcome Letter</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('identity.card') }}" @if(request()->segment(2)=="identity_card") class='active' @endif>
                        <i class="ri-capsule-line"></i><span>Identity Card</span>
                    </a>
                </li>
            </ul>
        </li>

        @if(($userSidebarPermissions->user_plan_video=="1") || ($userSidebarPermissions->user_plan_pdf=="1") || ($userSidebarPermissions->user_plan_view=="1"))
        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='view_plan_video') && (request()->segment(2)!='view_plan_pdf') && (request()->segment(2)!='user_plan_view') && (request()->segment(2)!='user_plan_ads_view')) collapsed @endif" data-bs-target="#components-plan" data-bs-toggle="collapse" href="#">
                <i class="bi bi-award-fill"></i><span>Plan Details</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-plan" class="nav-content collapse @if((request()->segment(2)=='view_plan_video') || (request()->segment(2)=='view_plan_pdf') || (request()->segment(2)=='user_plan_view') || (request()->segment(2)=='user_plan_ads_view')) show @endif" data-bs-parent="#sidebar-nav">
                @if($userSidebarPermissions->user_plan_video=="1")
                <li>
                    <a href="{{ route('view.plan.video') }}" @if(request()->segment(2)=="view_plan_video") class='active' @endif>
                        <i class="bi bi-circle"></i><span>Plan Video</span>
                    </a>
                </li>
                @endif

                @if($userSidebarPermissions->user_plan_pdf=="1")
                <li>
                    <a href="{{ route('view.plan.pdf') }}" @if(request()->segment(2)=="view_plan_pdf") class='active' @endif>
                        <i class="bi bi-circle"></i><span>Plan PDF</span>
                    </a>
                </li>
                @endif

                {{-- @if($userSidebarPermissions->user_plan_view=="1")
                <li>
                    <a href="{{ route('user.plan.view') }}" @if(request()->segment(2)=="user_plan_view") class='active' @endif>
                        <i class="bi bi-circle"></i><span>Plan View</span>
                    </a>
                </li>
                @endif

                <li>
                    <a href="{{ route('user.plan.ads.view') }}" @if(request()->segment(2)=="user_plan_ads_view") class='active' @endif>
                        <i class="bi bi-circle"></i><span>ADS View</span>
                    </a>
                </li> --}}
            </ul>
        </li>
        @endif

        @if(($userSidebarPermissions->user_wallet_details=="1") || ($userSidebarPermissions->user_payout_request=="1") || ($userSidebarPermissions->user_approved_payout=="1") || ($userSidebarPermissions->user_wallet_income=="1"))
        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='add_user_withdrawl') && (request()->segment(2)!='add_user_withdrawl') && (request()->segment(2)!='show_user_withdrawl')) collapsed @endif" data-bs-target="#components-wallet" data-bs-toggle="collapse" href="#">
                <i class="bi bi-wallet-fill"></i><span>Withdrawl</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-wallet" class="nav-content collapse @if((request()->segment(2)=='add_user_withdrawl') || (request()->segment(2)=='show_user_withdrawl') ) show @endif" data-bs-parent="#sidebar-nav">

                {{-- @if($userSidebarPermissions->user_approved_payout=="1")
                <li>
                    <a href="{{ route("approved.payout") }}">
                        <i class="bi bi-circle"></i><span>Approved Payout</span>
                    </a>
                </li>
                @endif

                @if($userSidebarPermissions->user_wallet_income=="1")
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Wallet Income</span>
                    </a>
                </li>
                @endif --}}
                @if((date("d")=="01") || (date("d")=="02") || (date("d")=="11") || (date("d")=="12") || (date("d")=="21") || (date("d")=="22"))
                <li>
                    <a href="{{ route('user.withdrawl.add') }}" @if (request()->segment(2)=="add_user_withdrawl")
                        class="active"
                    @endif>
                        <i class="bi bi-circle"></i><span>Withdrawl Request</span>
                    </a>
                </li>
                @endif

                <li>
                    <a href="{{ route('user.withdrawl.show') }}" @if (request()->segment(2)=="show_user_withdrawl")
                        class="active"
                    @endif>
                        <i class="bi bi-circle"></i><span>Show Withdrawl Request</span>
                    </a>
                </li>
                
            </ul>
        </li>
        @endif

        @if(($userSidebarPermissions->user_mail_support=="1") || ($userSidebarPermissions->user_online_support=="1"))
        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='mail_support') && (request()->segment(2)!='online_support')) collapsed @endif" data-bs-target="#components-support" data-bs-toggle="collapse" href="#">
                <i class="bx bx-support"></i><span>Support Ticket System</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-support" class="nav-content collapse @if((request()->segment(2)=='mail_support') || (request()->segment(2)=='online_support')) show @endif" data-bs-parent="#sidebar-nav">
                @if($userSidebarPermissions->user_mail_support=="1")
                <li>
                    <a href="{{ route('mail.support') }}" @if(request()->segment(2)=="mail_support") class='active' @endif>
                        <i class="bi bi-circle"></i><span>Mail Support</span>
                    </a>
                </li>
                @endif

                @if($userSidebarPermissions->user_online_support=="1")
                <li>
                    <a href="{{ route('online.support') }}" @if (request()->segment(2)=="online_support")
                        class="active"
                    @endif>
                        <i class="bi bi-circle"></i><span>Online Support</span>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif

        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='my_level_list') && (request()->segment(2)!="user_level_list")) collapsed @endif" data-bs-target="#components-team" data-bs-toggle="collapse" href="#">
                <i class="bi bi-microsoft-teams"></i><span>Team Details</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-team" class="nav-content collapse @if((request()->segment(2)=='my_level_list') || (request()->segment(2)=="user_level_list")) show @endif" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('user.level.list.show') }}" @if((request()->segment(2)=="my_level_list") || (request()->segment(2)=="user_level_list")) class='active' @endif>
                        <i class="bi bi-circle"></i><span>My Level List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.direct.level.list.show') }}" @if((request()->segment(2)=="my_direct_level_list") || (request()->segment(2)=="user_direct_level_list")) class='active' @endif>
                        <i class="bi bi-circle"></i><span>My Direct Level List</span>
                    </a>
                </li>
                {{-- 
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Online Support</span>
                    </a>
                </li> --}}
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='payout_withdrawl_list') && (request()->segment(2)!="payout_approval_list") && (request()->segment(2)!="payout_pending_list") && (request()->segment(2)!="payout_rejected_list")) collapsed @endif" data-bs-target="#components-payout" data-bs-toggle="collapse" href="#">
                <i class="bi bi-microsoft-teams"></i><span>Payout</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-payout" class="nav-content collapse @if((request()->segment(2)=='payout_withdrawl_list') || (request()->segment(2)=='payout_approval_list') || (request()->segment(2)=='payout_pending_list') || (request()->segment(2)=='payout_rejected_list')) show @endif" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('payout.withdrawl.list') }}" @if((request()->segment(2)=="payout_withdrawl_list")) class='active' @endif>
                        <i class="bi bi-circle"></i><span>Withdrawl List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('payout.approval.list') }}" @if((request()->segment(2)=="payout_approval_list")) class='active' @endif>
                        <i class="bi bi-circle"></i><span>Approval List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('payout.pending.list') }}" @if((request()->segment(2)=="payout_pending_list")) class='active' @endif>
                        <i class="bi bi-circle"></i><span>Pending List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('payout.rejected.list') }}" @if((request()->segment(2)=="payout_rejected_list")) class='active' @endif>
                        <i class="bi bi-circle"></i><span>Rejected List</span>
                    </a>
                </li>
                {{-- 
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Online Support</span>
                    </a>
                </li> --}}
            </ul>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='create_epin') && (request()->segment(2)!='view_epin')) collapsed @endif" data-bs-target="#components-epin" data-bs-toggle="collapse" href="#">
                <i class="bx bx-support"></i><span>Epin Management</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-epin" class="nav-content collapse @if((request()->segment(2)=='create_epin') || (request()->segment(2)=='view_epin')) show @endif" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('create.epin') }}" @if(request()->segment(2)=="create_epin") class='active' @endif>
                        <i class="ri-capsule-line"></i><span>Create Epin</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('view.epin') }}" @if(request()->segment(2)=="view_epin") class='active' @endif>
                        <i class="ri-capsule-line"></i><span>Epin View</span>
                    </a>
                </li>
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Online Support</span>
                    </a>
                </li>
            </ul>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='user_show_package') && (request()->segment(2)!='user_investment_history') && (request()->segment(2)!='user_package_transfer')) collapsed @endif" data-bs-target="#components-package" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-check"></i><span>Id Activation</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-package" class="nav-content collapse @if((request()->segment(2)=='user_show_package') || (request()->segment(2)=='user_investment_history') || (request()->segment(2)=='user_package_transfer')) show @endif" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('user.show.package') }}" @if(request()->segment(2)=="user_show_package") class='active' @endif>
                        <i class="ri-capsule-line"></i><span>Activation Packages</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.investment.history') }}" @if(request()->segment(2)=="user_investment_history") class='active' @endif>
                        <i class="ri-capsule-line"></i><span>Activation History</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.package.transfer') }}" @if(request()->segment(2)=="user_package_transfer") class='active' @endif>
                        <i class="ri-capsule-line"></i><span>User Id Activation</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('user.logout') }}" >
                <i class="ri-logout-circle-line"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->
