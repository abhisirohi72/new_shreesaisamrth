<div class="side-menu" id="sideMenu">
    <div class="side-menu-close" id="sideMenuClose"><i class="ri-close-line"></i></div>
    <ul class="side-menu-list">
        @if ($userSidebarPermissions->user_dashboard == '1')
            <li><a href="{{ route('user.dashboard') }}"><i class="ri-dashboard-line icon"></i> Dashboard</a></li>
        @endif
        <li><a href="#"><i class="ri-group-line icon"></i> My Team</a></li>
        <li><a href="#"><i class="ri-flow-chart-line icon"></i> Genealogy Tree</a></li>
        <li><a href="#"><i class="ri-wallet-line icon"></i> Wallet</a></li>
        <li><a href="#"><i class="ri-history-line icon"></i> Withdrawal History</a></li>
        <li><a href="#"><i class="ri-share-line icon"></i> Refer & Earn</a></li>
        <li><a href="#"><i class="ri-service-line icon"></i> Customer Support</a></li>
        <li><a href="#"><i class="ri-settings-3-line icon"></i> Settings</a></li>
        <li><a href="{{ route('user.logout') }}"><i class="ri-logout-circle-line icon"></i> Logout</a></li>
    </ul>
</div>
