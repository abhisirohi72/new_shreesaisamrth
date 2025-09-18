<div class="side-menu" id="sideMenu">
    <div class="side-menu-close" id="sideMenuClose"><i class="ri-close-line"></i></div>
    <div class="company-info">
        <div class="company-logo">CB</div>
        <div class="company-name">ChargingBD</div>
    </div>
    <ul class="side-menu-list">
        @if ($userSidebarPermissions->user_dashboard == '1')
            <li><a href="{{ route('user.dashboard') }}"><i class="ri-dashboard-line icon"></i> Dashboard</a></li>
        @endif

        @if (
            $userSidebarPermissions->user_income_details == '1' ||
                $userSidebarPermissions->user_professional_details == '1' ||
                $userSidebarPermissions->user_financial_details == '1' ||
                $userSidebarPermissions->user_marketing_details == '1' ||
                $userSidebarPermissions->user_availability_details == '1')
            <li class="has-submenu @if (request()->segment(2) != 'add_professional_details' ||
                    request()->segment(2) != 'add_financial_details' ||
                    request()->segment(2) != 'add_marketing_skill' ||
                    request()->segment(2) != 'add_availability') collapsed active @endif">
                <a class="dropdown-toggle" data-target="#team-submenu">
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <i class="ri-group-line icon"></i> Details
                    </div>
                    <i class="ri-arrow-right-s-line arrow"></i>
                </a>
                <ul class="submenu @if (request()->segment(2) == 'add_professional_details' ||
                        request()->segment(2) == 'add_financial_details' ||
                        request()->segment(2) == 'add_marketing_skill' ||
                        request()->segment(2) == 'add_availability') show open @endif" id="team-submenu">
                    @if ($userSidebarPermissions->user_professional_details == '1')
                        <li @if (request()->segment(2) == 'add_professional_details') class='active' @endif>
                            <a href="{{ route('add.professional.details') }}">
                                <i class="ri-bar-chart-2-line"></i>
                                Professional Details
                            </a>
                        </li>
                    @endif

                    @if ($userSidebarPermissions->user_financial_details == '1')
                        <li @if (request()->segment(2) == 'add_financial_details') class='active' @endif>
                            <a href="{{ route('add.financial.details') }}">
                                <i class="ri-bar-chart-2-line"></i>
                                Financial & Investment Details
                            </a>
                        </li>
                    @endif

                    @if ($userSidebarPermissions->user_marketing_details == '1')
                        <li @if (request()->segment(2) == 'add_marketing_skill') class='active' @endif>
                            <a href="{{ route('add.marketing.skill') }}">
                                <i class="ri-bar-chart-2-line"></i>
                                Marketing & Sales Skills
                            </a>
                        </li>
                    @endif

                    @if ($userSidebarPermissions->user_availability_details == '1')
                        <li @if (request()->segment(2) == 'add_availability') class='active' @endif>
                            <a href="{{ route('add.availability') }}">
                                <i class="ri-bar-chart-2-line"></i>
                                Availability & Commitment
                            </a>
                        </li>
                    @endif

                    {{-- <li><a href="#"><i class="ri-flow-chart-line"></i> Genealogy Tree</a></li> --}}
                </ul>
            </li>
        @endif

        @if (
            $userSidebarPermissions->user_personal_info == '1' ||
                $userSidebarPermissions->user_bank_details == '1' ||
                $userSidebarPermissions->user_kyc_details == '1' ||
                $userSidebarPermissions->user_change_password == '1')
            <li class="has-submenu @if (request()->segment(2) != 'add_personal_info' &&
                    request()->segment(2) != 'add_kyc' &&
                    request()->segment(2) != 'add_bank_details' &&
                    request()->segment(2) != 'change_password' &&
                    request()->segment(2) != 'user_add_crypto') collapsed active @endif">
                <a class="dropdown-toggle" data-target="#profile-submenu">
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <i class="ri-group-line icon"></i> Profile Management
                    </div>
                    <i class="ri-arrow-right-s-line arrow"></i>
                </a>
                <ul class="submenu @if (request()->segment(2) == 'add_personal_info' ||
                        request()->segment(2) == 'add_kyc' ||
                        request()->segment(2) == 'add_bank_details' ||
                        request()->segment(2) == 'change_password' ||
                        request()->segment(2) == 'user_add_crypto') show open @endif" id="profile-submenu">
                    @if ($userSidebarPermissions->user_personal_info == '1')
                        <li @if (request()->segment(2) == 'add_personal_info') class='active' @endif>
                            <a href="{{ route('add.personal.info') }}">
                                <i class="ri-bar-chart-2-line"></i>
                                Personal Information
                            </a>
                        </li>
                    @endif

                    @if ($userSidebarPermissions->user_bank_details == '1')
                        <li @if (request()->segment(2) == 'add_bank_details') class='active' @endif>
                            <a href="{{ route('add.bank.details') }}">
                                <i class="ri-bar-chart-2-line"></i>
                                Bank Details
                            </a>
                        </li>
                    @endif

                    <li @if (request()->segment(2) == 'user_add_crypto') class='active' @endif>
                        <a href="{{ route('user.withdrawl.crypto') }}">
                            <i class="ri-bar-chart-2-line"></i>
                            Crypto Payment
                        </a>
                    </li>

                    @if ($userSidebarPermissions->user_kyc_details == '1')
                        <li @if (request()->segment(2) == 'add_kyc') class='active' @endif>
                            <a href="{{ route('add.kyc') }}">
                                <i class="ri-bar-chart-2-line"></i>
                                KYC Details
                            </a>
                        </li>
                    @endif

                    @if ($userSidebarPermissions->user_change_password == '1')
                        <li @if (request()->segment(2) == 'change_password') class='active' @endif>
                            <a href="{{ route('change.password') }}">
                                <i class="ri-bar-chart-2-line"></i>
                                Change Password
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        <li class="has-submenu @if((request()->segment(2)!='deposit_fund') && (request()->segment(2)!='view_deposit_fund') && (request()->segment(2)!='fund_history') && (request()->segment(2)!='fund_transfer')) collapsed active @endif">
            <a class="dropdown-toggle" data-target="#topup-submenu">
                <div style="display: flex; align-items: center; gap: 15px;">
                    <i class="ri-group-line icon"></i> Top Up
                </div>
                <i class="ri-arrow-right-s-line arrow"></i>
            </a>
            <ul class="submenu @if((request()->segment(2)=='deposit_fund') || (request()->segment(2)=='view_deposit_fund') || (request()->segment(2)=='fund_history') || (request()->segment(2)=='fund_transfer')) show open @endif" id="topup-submenu">
                <li @if (request()->segment(2) == 'deposit_fund') class='active' @endif>
                    <a href="{{ route('user.deposit.fund') }}">
                        <i class="ri-bar-chart-2-line"></i>
                        Add Deposit Fund
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

        <li class="has-submenu @if((request()->segment(2)!='welcome_letter') && (request()->segment(2)!='identity_card')) collapsed active @endif">
            <a class="dropdown-toggle" data-target="#official-submenu">
                <div style="display: flex; align-items: center; gap: 15px;">
                    <i class="ri-group-line icon"></i> Official
                </div>
                <i class="ri-arrow-right-s-line arrow"></i>
            </a>
            <ul class="submenu @if((request()->segment(2)=='welcome_letter') || (request()->segment(2)=='identity_card')) show open @endif" id="official-submenu">
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
        <li class="has-submenu @if((request()->segment(2)!='view_plan_video') && (request()->segment(2)!='view_plan_pdf') && (request()->segment(2)!='user_plan_view') && (request()->segment(2)!='user_plan_ads_view')) collapsed active @endif">
            <a class="dropdown-toggle" data-target="#plan_details-submenu">
                <div style="display: flex; align-items: center; gap: 15px;">
                    <i class="ri-group-line icon"></i> Plan Details
                </div>
                <i class="ri-arrow-right-s-line arrow"></i>
            </a>
            <ul class="submenu @if((request()->segment(2)=='view_plan_video') || (request()->segment(2)=='view_plan_pdf') || (request()->segment(2)=='user_plan_view') || (request()->segment(2)=='user_plan_ads_view')) show open @endif" id="plan_details-submenu">
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

                @if($userSidebarPermissions->user_plan_view=="1")
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
                </li>
            </ul>
        </li>
        @endif

        @if(($userSidebarPermissions->user_wallet_details=="1") || ($userSidebarPermissions->user_payout_request=="1") || ($userSidebarPermissions->user_approved_payout=="1") || ($userSidebarPermissions->user_wallet_income=="1"))
        <li class="has-submenu @if((request()->segment(2)!='add_user_withdrawl') && (request()->segment(2)!='add_user_withdrawl') && (request()->segment(2)!='show_user_withdrawl')) collapsed active @endif">
            <a class="dropdown-toggle" data-target="#with-submenu">
                <div style="display: flex; align-items: center; gap: 15px;">
                    <i class="ri-group-line icon"></i> Withdrawl
                </div>
                <i class="ri-arrow-right-s-line arrow"></i>
            </a>
            <ul class="submenu @if((request()->segment(2)=='add_user_withdrawl') || (request()->segment(2)=='show_user_withdrawl') ) show open @endif" id="with-submenu">
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
        <li class="has-submenu @if((request()->segment(2)!='mail_support') && (request()->segment(2)!='online_support')) collapsed active @endif">
            <a class="dropdown-toggle" data-target="#support-submenu">
                <div style="display: flex; align-items: center; gap: 15px;">
                    <i class="ri-group-line icon"></i> Support Ticket System
                </div>
                <i class="ri-arrow-right-s-line arrow"></i>
            </a>
            <ul class="submenu @if((request()->segment(2)=='mail_support') || (request()->segment(2)=='chat')) show open @endif" id="support-submenu">
                @if($userSidebarPermissions->user_mail_support=="1")
                <li>
                    <a href="{{ route('mail.support') }}" @if(request()->segment(2)=="mail_support") class='active' @endif>
                        <i class="bi bi-circle"></i><span>Mail Support</span>
                    </a>
                </li>
                @endif

                @if($userSidebarPermissions->user_online_support=="1")
                <li>
                    <a href="{{ route('online.support') }}" @if (request()->segment(2)=="chat")
                        class="active"
                    @endif>
                        <i class="bi bi-circle"></i><span>Online Support</span>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif

        <li class="has-submenu @if((request()->segment(2)!='my_level_list') && (request()->segment(2)!="user_level_list") && (request()->segment(2)!="my_direct_level_list")) collapsed active @endif">
            <a class="dropdown-toggle" data-target="#team_details-submenu">
                <div style="display: flex; align-items: center; gap: 15px;">
                    <i class="ri-group-line icon"></i>Team Details
                </div>
                <i class="ri-arrow-right-s-line arrow"></i>
            </a>
            <ul class="submenu @if((request()->segment(2)=='my_level_list') || (request()->segment(2)=="user_level_list") || (request()->segment(2)=="my_direct_level_list")) show open @endif" id="team_details-submenu">
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
            </ul>
        </li>

        <li class="has-submenu @if((request()->segment(2)!='payout_withdrawl_list') && (request()->segment(2)!="payout_approval_list") && (request()->segment(2)!="payout_pending_list") && (request()->segment(2)!="payout_rejected_list")) collapsed active @endif">
            <a class="dropdown-toggle" data-target="#payout-submenu">
                <div style="display: flex; align-items: center; gap: 15px;">
                    <i class="ri-group-line icon"></i>Payout
                </div>
                <i class="ri-arrow-right-s-line arrow"></i>
            </a>
            <ul class="submenu @if((request()->segment(2)=='payout_withdrawl_list') || (request()->segment(2)=='payout_approval_list') || (request()->segment(2)=='payout_pending_list') || (request()->segment(2)=='payout_rejected_list')) show open @endif" id="payout-submenu">
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
            </ul>
        </li>

        <li class="has-submenu @if((request()->segment(2)!='create_epin') && (request()->segment(2)!='view_epin')) collapsed active @endif">
            <a class="dropdown-toggle" data-target="#epin-submenu">
                <div style="display: flex; align-items: center; gap: 15px;">
                    <i class="ri-group-line icon"></i>Epin Management
                </div>
                <i class="ri-arrow-right-s-line arrow"></i>
            </a>
            <ul class="submenu @if((request()->segment(2)=='create_epin') || (request()->segment(2)=='view_epin')) show open @endif" id="epin-submenu">
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
            </ul>
        </li>

        <li class="has-submenu @if((request()->segment(2)!='user_show_package') && (request()->segment(2)!='user_investment_history') && (request()->segment(2)!='user_package_transfer')) collapsed active @endif">
            <a class="dropdown-toggle" data-target="#Id_Activation-submenu">
                <div style="display: flex; align-items: center; gap: 15px;">
                    <i class="ri-group-line icon"></i>Id Activation
                </div>
                <i class="ri-arrow-right-s-line arrow"></i>
            </a>
            <ul class="submenu @if((request()->segment(2)=='user_show_package') || (request()->segment(2)=='user_investment_history') || (request()->segment(2)=='user_package_transfer')) show open @endif" id="Id_Activation-submenu">
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
        <li><a href="{{ route('user.logout') }}"><i class="ri-logout-circle-line icon"></i> Logout</a></li>
    </ul>
</div>
