<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="javascript: void(0);" class=" waves-effect">
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>


                <li class="menu-title" key="t-apps">Inventory(Cars)</li>

                <li>
                    <a href="{{ route('inventory.create') }}" class=" waves-effect">
                        <i class="bx bx-plus"></i>
                        <span key="t-layouts">Add new</span>
                    </a>

                </li>
                <li>
                    <a href="{{ route('inventory.index') }}" class=" waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span key="t-layouts">All </span>
                    </a>

                </li>
                <li>
                    <a href="{{ route('inventory.index', ['category' => 'internal']) }}" class=" waves-effect">
                        <i class="bx bx-list-plus"></i>
                        <span key="t-layouts">Our Inventory </span>
                    </a>

                </li>

                <li>
                    <a href="{{ route('inventory.index', ['category' => 'foreign']) }}" class=" waves-effect">
                        <i class="bx bx-list-ol"></i>
                        <span key="t-layouts">Marketplace</span>
                    </a>

                </li>

                <li class="menu-title" key="t-apps">Communications</li>
                <li>
                    <a href="{{ route('enquiries') }}" class=" waves-effect">
                        <i class="bx bx-notification"></i>
                        <span key="t-layouts">Vehicle enquiries</span>
                    </a>

                </li>
                <li>
                    <a href="{{ route('contactus') }}" class=" waves-effect">
                        <i class="bx bx-message"></i>
                        <span key="t-layouts">Contact us</span>
                    </a>

                </li>
                <li class="menu-title" key="t-apps">My profile</li>
                <li>
                    <a href="{{ route('profile') }}" class=" waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-layouts">Profile</span>
                    </a>

                </li>
                {{-- <li>
                    <a href="javascript: void(0);" class=" waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">Settings</span>
                    </a>

                </li> --}}
                <li class="menu-title" key="t-apps">User management</li>
                <li>
                    <a href="{{ route('users.index') }}" class=" waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">User list</span>
                    </a>

                </li>
                <li>
                    <a href="{{ route('users.create') }}" class=" waves-effect">
                        <i class="bx bx-user-plus"></i>
                        <span key="t-layouts">Add User</span>
                    </a>

                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
