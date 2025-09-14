<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='dashboard')) collapsed @endif" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link @if((request()->segment(2)!='favicon_upload') && (request()->segment(2)!='view_favicon') && (request()->segment(2)!='edit_favicon') && (request()->segment(2)!='admin_show_user_kyc')) collapsed @endif" data-bs-target="#components-user" data-bs-toggle="collapse" href="#">
                <i class="ri-file-user-line"></i><span>Custom Branding</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-user" class="nav-content collapse @if((request()->segment(2)=='favicon_upload') || (request()->segment(2)=='view_favicon') || (request()->segment(2)=='edit_favicon') || (request()->segment(2)=='admin_show_user_kyc')) show @endif" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('favicon.upload') }}" @if(request()->segment(2)=="favicon_upload") class="active" @endif>
                        <i class="bi bi-circle"></i><span>Favicon & Logo Upload</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('view.favicon') }}" @if(request()->segment(2)=="view_favicon") class="active" @endif>
                        <i class="bi bi-circle"></i><span>View Favicon & Logo Upload</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(request()->segment(2)!="add_footer_details") collapsed @endif" href="{{ route('add.footer.details') }}" >
                <i class=" ri-organization-chart"></i>
                <span>Footer Details</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(request()->segment(2)!="change_color") collapsed @endif" href="{{ route('change.color') }}">
                <i class="ri-node-tree"></i>
                <span>Change Color</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(request()->segment(2)!="side_menu") collapsed @endif" href="{{ route('side.menu') }}">
                <i class="ri-plant-line"></i>
                <span>User Side Menu & Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(request()->segment(2)!="admin_side_menu") collapsed @endif" href="{{ route('admin.side.menu') }}">
                <i class="ri-plant-line"></i>
                <span>Admin Side Menu & Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
                <i class="ri-progress-2-line"></i>
                <span>Social Link</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->
