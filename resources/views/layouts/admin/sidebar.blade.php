<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        @if($adminSidebarPermissions->dashboard=="1")
        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='dashboard')) collapsed @endif" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @endif

        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='withdrawl_setting') && (request()->segment(2)!='admin_show_withdrawl') && (request()->segment(2)!='admin_add_crypto')) collapsed @endif" data-bs-target="#components-withdrawl" data-bs-toggle="collapse" href="#">
                <i class="ri-file-user-line"></i><span>Withdrawl Management</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-withdrawl" class="nav-content collapse @if((request()->segment(2)=='withdrawl_setting') || (request()->segment(2)=='admin_show_withdrawl') || (request()->segment(2)=='admin_add_crypto')) show @endif" data-bs-parent="#sidebar-nav">
                {{-- @if($adminSidebarPermissions->all_user_list=="1") --}}
                <li>
                    <a href="{{ route('admin.withdrawl.request') }}" @if(request()->segment(2)=="withdrawl_setting") class="active" @endif>
                        <i class="bi bi-circle"></i><span>Withdrawl Request</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.withdrawl.show') }}" @if(request()->segment(2)=="admin_show_withdrawl") class="active" @endif>
                        <i class="bi bi-circle"></i><span>Show Withdrawl</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.withdrawl.crypto') }}" @if(request()->segment(2)=="admin_add_crypto") class="active" @endif>
                        <i class="bi bi-circle"></i><span>Crypto Payment</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.bank_details.add') }}" @if(request()->segment(2)=="admin_bank_detail") class="active" @endif>
                        <i class="bi bi-circle"></i><span>Bank Details</span>
                    </a>
                </li>
                {{-- @endif --}}
            </ul>
        </li>

        @if(($adminSidebarPermissions->all_user_list=="1") || ($adminSidebarPermissions->add_new_user=="1") || ($adminSidebarPermissions->user_activation=="1") || ($adminSidebarPermissions->kyc_management=="1"))
        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='user_list') && (request()->segment(2)!='add_user') && (request()->segment(2)!='user_activation') && (request()->segment(2)!='admin_show_user_kyc') && (request()->segment(2)!='active_user_list') && (request()->segment(2)!='non_active_user_list')) collapsed @endif" data-bs-target="#components-user" data-bs-toggle="collapse" href="#">
                <i class="ri-file-user-line"></i><span>User Management</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-user" class="nav-content collapse @if((request()->segment(2)=='user_list') || (request()->segment(2)=='add_user') || (request()->segment(2)=='user_activation') || (request()->segment(2)=='admin_show_user_kyc') || (request()->segment(2)=='active_user_list') || (request()->segment(2)=='non_active_user_list')) show @endif" data-bs-parent="#sidebar-nav">
                @if($adminSidebarPermissions->all_user_list=="1")
                <li>
                    <a href="{{ route('admin.user.list') }}" @if(request()->segment(2)=="user_list") class="active" @endif>
                        <i class="bi bi-circle"></i><span>All Users List</span>
                    </a>
                </li>
                @endif

                <li>
                    <a href="{{ route('admin.user.list.active') }}" @if(request()->segment(2)=="active_user_list") class="active" @endif>
                        <i class="bi bi-circle"></i><span>Active Users List</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.user.list.nonactive') }}" @if(request()->segment(2)=="non_active_user_list") class="active" @endif>
                        <i class="bi bi-circle"></i><span>Non Active Users List</span>
                    </a>
                </li>

                @if($adminSidebarPermissions->add_new_user=="1")
                <li>
                    <a href="{{ route('admin.user.add') }}" @if(request()->segment(2)=="add_user") class="active" @endif>
                        <i class="bi bi-circle"></i><span>Add New User</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->user_activation=="1")
                <li>
                    <a href="{{ route('admin.user.activation') }}" @if(request()->segment(2)=="user_activation") class="active" @endif>
                        <i class="bi bi-circle"></i><span>User Activation & Verification</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->kyc_management=="1")
                <li>
                    <a href="{{ route('admin.user.show.kyc') }}" @if(request()->segment(2)=="admin_show_user_kyc") class="active" @endif>
                        <i class="bi bi-circle"></i><span>KYC Management</span>
                    </a>
                </li>
                @endif

                <li>
                    <a href="{{ route('add.admin.notification') }}" @if(request()->segment(2)=="admin_add_notifications") class="active" @endif>
                        <i class="bi bi-circle"></i><span>Notification</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('add.admin.team.level') }}" @if(request()->segment(2)=="add_admin_team_level") class="active" @endif>
                        <i class="bi bi-circle"></i><span>Add Team Level</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('subscription.user') }}" @if(request()->segment(2)=="subscription_user") class='active' @endif>
                        <i class="bi bi-circle"></i><span>Subscription User</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        {{-- @if($adminSidebarPermissions->genealogy=="1")
        <li class="nav-item">
            <a class="nav-link @if(request()->segment(2)!="genealogy") collapsed @endif" href="{{ route('admin.genealogy.show') }}" >
                <i class=" ri-organization-chart"></i>
                <span>Genealogy (Network Tree)</span>
            </a>
        </li>
        @endif --}}

        {{-- @if($adminSidebarPermissions->direct_referal=="1")
        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
                <i class="ri-node-tree"></i>
                <span>Direct Referrals</span>
            </a>
        </li>
        @endif --}}

        {{-- @if($adminSidebarPermissions->binary_tree_view=="1")
        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
                <i class="ri-plant-line"></i>
                <span>Binary/Unilevel Tree View</span>
            </a>
        </li>
        @endif

        @if($adminSidebarPermissions->rank_progression=="1")
        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
                <i class="ri-progress-2-line"></i>
                <span>Rank Progression</span>
            </a>
        </li>
        @endif --}}

        {{-- @if(($adminSidebarPermissions->earning_payout=="1") || ($adminSidebarPermissions->commission_report=="1") || ($adminSidebarPermissions->bonus_structure=="1") || ($adminSidebarPermissions->withdrawl_request=="1") || ($adminSidebarPermissions->payout_history=="1"))
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-wallet" data-bs-toggle="collapse" href="#">
                <i class="ri-wallet-line"></i><span>Wallet Management</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-wallet" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @if($adminSidebarPermissions->earning_payout=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Earnings & Payouts</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->commission_report=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Commission Report</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->bonus_structure=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Bonus Structure</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->withdrawl_request=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Withdrawal Requests</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->payout_history=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Payout History</span>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif --}}

        @if(($adminSidebarPermissions->add_plan=="1") || ($adminSidebarPermissions->view_plan=="1") || ($adminSidebarPermissions->sales_transaction=="1") || ($adminSidebarPermissions->product_sales=="1") || ($adminSidebarPermissions->payment_transactions=="1") || ($adminSidebarPermissions->subscription_plan=="1"))
        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!="adding_admin_plan") && (request()->segment(2)!="view_admin_plan") && (request()->segment(2)!="edit_admin_plan") && (request()->segment(2)!="adding_admin_plan_video") && (request()->segment(2)!="add_admin_plan_add_ads") && (request()->segment(2)!="add_admin_plan_pdf") && (request()->segment(2)!="adding_admin_plan_video") && (request()->segment(2)!="investment_plan") && (request()->segment(2)!="view_investment_plan") && (request()->segment(2)!="investment_distribution")) collapsed @endif" data-bs-target="#components-plan" data-bs-toggle="collapse" href="#">
                <i class="ri-building-3-line"></i><span>Plan Management</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-plan" class="nav-content collapse @if((request()->segment(2)=='adding_admin_plan') || (request()->segment(2)=='view_admin_plan') || (request()->segment(2)=='edit_admin_plan') || (request()->segment(2)=='adding_admin_plan_video') || (request()->segment(2)=='add_admin_plan_add_ads') || (request()->segment(2)=='add_admin_plan_pdf') || (request()->segment(2)=='adding_admin_plan_video') || (request()->segment(2)=='investment_plan') || (request()->segment(2)=='view_investment_plan') || (request()->segment(2)=='investment_distribution')) show @endif" data-bs-parent="#sidebar-nav">
                {{-- @if($adminSidebarPermissions->add_plan=="1")
                <li>
                    <a href="{{ route('add.admin.plan') }}" @if(request()->segment(2)=="adding_admin_plan") class="active" @endif>
                        <i class="bi bi-circle"></i><span>Add Plan</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->view_plan=="1")
                <li>
                    <a href="{{ route('view.admin.plan') }}" @if(request()->segment(2)=="view_admin_plan") class="active" @endif>
                        <i class="bi bi-circle"></i><span>View Plan</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->sales_transaction=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Sales & Transactions</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->product_sales=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Product Sales</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->payment_transactions=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Payment Transactions</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->subscription_plan=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Subscription Plans</span>
                    </a>
                </li>
                @endif --}}
                <li>
                    <a href="{{ route('add.admin.plan') }}" @if(request()->segment(2)=="adding_admin_plan_video") class="active" @endif>
                        <i class="bi bi-circle"></i><span>Add Plan Video</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('add.admin.plan.pdf') }}" @if(request()->segment(2)=="add_admin_plan_pdf") class="active" @endif>
                        <i class="bi bi-circle"></i><span>Add Plan PDF</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('add.admin.plan.ads') }}" @if(request()->segment(2)=="add_admin_plan_add_ads") class="active" @endif>
                        <i class="bi bi-circle"></i><span>Add ADS</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('admin.investment.plan') }}" @if(request()->segment(2)=="investment_plan") class="active" @endif>
                        <i class="bi bi-circle"></i><span>Investment Plan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.investment.view') }}" @if((request()->segment(2)=="view_investment_plan") || request()->segment(2)=="investment_distribution") class="active" @endif>
                        <i class="bi bi-circle"></i><span>Show Investment</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        {{-- @if(($adminSidebarPermissions->promotion_marketing=="1") || ($adminSidebarPermissions->referal_links=="1") || ($adminSidebarPermissions->promotional_offers=="1") || ($adminSidebarPermissions->training_materials=="1"))
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-marketing" data-bs-toggle="collapse"
                href="#">
                <i class="ri-store-line"></i><span>Marketing Manager</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-marketing" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @if($adminSidebarPermissions->promotion_marketing=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Promotions & Marketing</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->referal_links=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Referral Links & Banners</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->promotional_offers=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Promotional Offers</span>
                    </a>
                </li>
                @endif
                @if($adminSidebarPermissions->training_materials=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Training Materials</span>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif --}}

        {{-- @if(($adminSidebarPermissions->reports_analytics=="1") || ($adminSidebarPermissions->performance_reports=="1") || ($adminSidebarPermissions->sales_reports=="1") || ($adminSidebarPermissions->user_activity_logs=="1"))
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-report" data-bs-toggle="collapse"
                href="#">
                <i class="ri-file-chart-line"></i><span>Reports Manager</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-report" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @if($adminSidebarPermissions->reports_analytics=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Reports & Analytics</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->performance_reports=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Performance Reports</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->sales_reports=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Sales & Revenue Reports</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->user_activity_logs=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>User Activity Logs</span>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif --}}

        {{-- @if(($adminSidebarPermissions->mlm_plan_config=="1") || ($adminSidebarPermissions->commission_setting=="1") || ($adminSidebarPermissions->payment_gateways=="1") || ($adminSidebarPermissions->tax_settings=="1"))
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-setting" data-bs-toggle="collapse"
                href="#">
                <i class="ri-settings-line"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-setting" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @if($adminSidebarPermissions->mlm_plan_config=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>MLM Plan Configuration (Binary, Unilevel, Matrix,
                            etc.)</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->commission_setting=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Commission & Bonus Settings</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->payment_gateways=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Payment Gateway Integration</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->tax_settings=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Tax & Compliance Settings</span>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif --}}

        @if(($adminSidebarPermissions->user_tickets=="1") || ($adminSidebarPermissions->faq_knowledge=="1") || ($adminSidebarPermissions->contact_support=="1"))
        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!="show_user_chat")) collapsed @endif" data-bs-target="#components-support" data-bs-toggle="collapse"
                href="#">
                <i class="ri-question-line"></i><span>Support & Help</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-support" class="nav-content collapse @if((request()->segment(2)=='show_user_chat')) show @endif" data-bs-parent="#sidebar-nav">
                {{-- @if($adminSidebarPermissions->user_tickets=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>User Tickets</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->faq_knowledge=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>FAQs & Knowledge Base</span>
                    </a>
                </li>
                @endif

                @if($adminSidebarPermissions->contact_support=="1")
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Contact Support</span>
                    </a>
                </li>
                @endif --}}
                <li>
                    <a href="{{ route('chat.view') }}" @if(request()->segment(2)=="show_user_chat") class="active" @endif>
                        <i class="bi bi-circle"></i><span>User Chat</span>
                    </a>
                </li>
                
            </ul>
        </li>
        @endif

        {{-- @if($adminSidebarPermissions->admin_profile=="1")
        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
                <i class="ri-profile-line"></i>
                <span>Admin Profile</span>
            </a>
        </li>
        @endif --}}
        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='admin_deposit_fund_view')) collapsed @endif" href="{{ route('admin.deposit_fund.view') }}">
                <i class="bi bi-grid"></i>
                <span>User Deposit Fund</span>
            </a>
        </li><!-- End User deposit fund Nav -->

        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='admin_fund_add')) collapsed @endif" href="{{ route('admin.fund.add') }}">
                <i class="bi bi-grid"></i>
                <span>Add Fund</span>
            </a>
        </li><!-- End User deposit fund Nav -->

        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='pop_up')) collapsed @endif" href="{{ route('admin.popup') }}">
                <i class="bi bi-grid"></i>
                <span>Pop Up</span>
            </a>
        </li><!-- End User Pop Up Nav -->

        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='admin_pckg_transfer')) collapsed @endif" href="{{ route('admin.package.transfer') }}">
                <i class="bi bi-grid"></i>
                <span>User Id Activation</span>
            </a>
        </li><!-- End User Pop Up Nav -->

        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='distribution_user')) collapsed @endif" href="{{ route('admin.distribution.user') }}">
                <i class="bi bi-grid"></i>
                <span>Distribution Details</span>
            </a>
        </li><!-- End User Pop Up Nav -->
        
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.logout') }}">
                <i class="ri-logout-circle-line"></i>
                <span>Logout</span>
            </a>
        </li>
        
    </ul>

</aside><!-- End Sidebar-->
