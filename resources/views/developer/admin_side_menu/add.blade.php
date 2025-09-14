@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('developer.dashboard') }}">Dashboard</a></li>
                    {{-- <li class="breadcrumb-item">Custom Branding</li> --}}
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Information</h5>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- Vertical Form -->
                            <form class="row g-3" method="POST" action="{{ route('add.admin.side.menu') }}">
                                @csrf
                                <h4>Admin's Sidebar</h4>
                                <hr>
                                <div class="col-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="dashboard" @if(filled($details) && ($details->dashboard=="1")) checked @endif name="dashboard" >
                                        <label class="form-check-label" for="dashboard">Dashboard</label>
                                    </div>
                                    <hr>
                                    <h4>User Management</h4>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="all_user_list" name="all_user_list" @if(filled($details) && ($details->all_user_list=="1")) checked @endif>
                                        <label class="form-check-label" for="all_user_list">All User List</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="add_new_user" @if(filled($details) && ($details->add_new_user=="1")) checked @endif name="add_new_user">
                                        <label class="form-check-label" for="add_new_user">Add New User</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_activation" @if(filled($details) && ($details->user_activation=="1")) checked @endif  name="user_activation">
                                        <label class="form-check-label" for="user_activation">User Activation</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="kyc_management" @if(filled($details) && ($details->kyc_management=="1")) checked @endif  name="kyc_management">
                                        <label class="form-check-label" for="kyc_management">KYC Management</label>
                                    </div>
                                    <hr>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="genealogy" @if(filled($details) && ($details->genealogy=="1")) checked @endif  name="genealogy">
                                        <label class="form-check-label" for="genealogy">Genealogy</label>
                                    </div>
                                    <hr>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="direct_referal" @if(filled($details) && ($details->direct_referal=="1")) checked @endif  name="direct_referal">
                                        <label class="form-check-label" for="direct_referal">Direct Referal</label>
                                    </div>
                                    <hr>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="binary_tree_view" @if(filled($details) && ($details->binary_tree_view=="1")) checked @endif name="binary_tree_view">
                                        <label class="form-check-label" for="binary_tree_view">Binary/Unilevel Tree View</label>
                                    </div>
                                    <hr>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="rank_progression" @if(filled($details) && ($details->rank_progression=="1")) checked @endif  name="rank_progression">
                                        <label class="form-check-label" for="rank_progression">Rank Progression</label>
                                    </div>
                                    <hr>
                                    <h4>Wallet Management</h4>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="earning_payout" @if(filled($details) && ($details->earning_payout=="1")) checked @endif  name="earning_payout">
                                        <label class="form-check-label" for="earning_payout">Earning & Payouts</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="commission_report" @if(filled($details) && ($details->commission_report=="1")) checked @endif name="commission_report">
                                        <label class="form-check-label" for="commission_report">Commission Report</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="bonus_structure" @if(filled($details) && ($details->bonus_structure=="1")) checked @endif name="bonus_structure">
                                        <label class="form-check-label" for="bonus_structure">Bonus Structure</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="withdrawl_request" @if(filled($details) && ($details->withdrawl_request=="1")) checked @endif  name="withdrawl_request">
                                        <label class="form-check-label" for="withdrawl_request">Withdrawl Request</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="payout_history" @if(filled($details) && ($details->payout_history=="1")) checked @endif  name="payout_history">
                                        <label class="form-check-label" for="payout_history">Payout History</label>
                                    </div>
                                    <hr>
                                    <h4>Plan Management</h4>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="add_plan" @if(filled($details) && ($details->add_plan=="1")) checked @endif name="add_plan">
                                        <label class="form-check-label" for="add_plan">Add Plan</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="view_plan" @if(filled($details) && ($details->view_plan=="1")) checked @endif name="view_plan">
                                        <label class="form-check-label" for="view_plan">View Plan</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="sales_transaction" @if(filled($details) && ($details->sales_transaction=="1")) checked @endif name="sales_transaction">
                                        <label class="form-check-label" for="sales_transaction">Sales & Transaction</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="product_sales" @if(filled($details) && ($details->product_sales=="1")) checked @endif name="product_sales">
                                        <label class="form-check-label" for="product_sales">Product Sales</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="payment_transactions" @if(filled($details) && ($details->payment_transactions=="1")) checked @endif name="payment_transactions">
                                        <label class="form-check-label" for="payment_transactions">Payment Transactions</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="subscription_plan" @if(filled($details) && ($details->subscription_plan=="1")) checked @endif name="subscription_plan">
                                        <label class="form-check-label" for="subscription_plan">Subscription Plan</label>
                                    </div>
                                    <hr>
                                    <h4>Marketing Manager</h4>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="promotion_marketing" @if(filled($details) && ($details->promotion_marketing=="1")) checked @endif name="promotion_marketing">
                                        <label class="form-check-label" for="promotion_marketing">Promotion & Marketing</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="referal_links" @if(filled($details) && ($details->referal_links=="1")) checked @endif name="referal_links">
                                        <label class="form-check-label" for="referal_links">Referal Links & Banners</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="promotional_offers" @if(filled($details) && ($details->promotional_offers=="1")) checked @endif name="promotional_offers">
                                        <label class="form-check-label" for="promotional_offers">Promotional Offers</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="training_materials" @if(filled($details) && ($details->training_materials=="1")) checked @endif name="training_materials">
                                        <label class="form-check-label" for="training_materials">Training Materials</label>
                                    </div>
                                    <hr>
                                    <h4>Reports Manager</h4>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="reports_analytics" @if(filled($details) && ($details->reports_analytics=="1")) checked @endif name="reports_analytics">
                                            <label class="form-check-label" for="reports_analytics">Reports & Analytics</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="performance_reports" @if(filled($details) && ($details->performance_reports=="1")) checked @endif name="performance_reports">
                                            <label class="form-check-label" for="performance_reports">Performance Reports</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="sales_reports" @if(filled($details) && ($details->sales_reports=="1")) checked @endif name="sales_reports">
                                            <label class="form-check-label" for="sales_reports">Sales & Revenue Reports</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="user_activity_logs" @if(filled($details) && ($details->user_activity_logs=="1")) checked @endif name="user_activity_logs">
                                            <label class="form-check-label" for="user_activity_logs">User Activity Logs</label>
                                        </div>
                                    <hr>
                                    <h4>Settings</h4>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="mlm_plan_config" @if(filled($details) && ($details->mlm_plan_config=="1")) checked @endif name="mlm_plan_config">
                                            <label class="form-check-label" for="mlm_plan_config">MLM Plan Configuration (Binary, Unilevel, Matrix etc)</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="commission_setting" @if(filled($details) && ($details->commission_setting=="1")) checked @endif name="commission_setting">
                                            <label class="form-check-label" for="commission_setting">Commission & Bonus Setting</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="payment_gateways" @if(filled($details) && ($details->payment_gateways=="1")) checked @endif name="payment_gateways">
                                            <label class="form-check-label" for="payment_gateways">Payment Gateways Integeration</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="tax_settings" @if(filled($details) && ($details->tax_settings=="1")) checked @endif name="tax_settings">
                                            <label class="form-check-label" for="tax_settings">Tax & Compliance Settings</label>
                                        </div>
                                    <hr>
                                    <h4>Support & Help</h4>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="user_tickets" @if(filled($details) && ($details->user_tickets=="1")) checked @endif name="user_tickets">
                                            <label class="form-check-label" for="user_tickets">User Tickets</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="faq_knowledge" @if(filled($details) && ($details->faq_knowledge=="1")) checked @endif name="faq_knowledge">
                                            <label class="form-check-label" for="faq_knowledge">FAQ & Knowledge Base</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="contact_support" @if(filled($details) && ($details->contact_support=="1")) checked @endif name="contact_support">
                                            <label class="form-check-label" for="contact_support">Contact Support</label>
                                        </div>
                                        <hr>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="admin_profile" @if(filled($details) && ($details->admin_profile=="1")) checked @endif name="admin_profile">
                                            <label class="form-check-label" for="admin_profile">Admin Profile</label>
                                        </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- Vertical Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
