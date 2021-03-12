<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <!-- <a href="#"> <img alt="image" src="{{ asset('assets/img/image0.png') }}" class="header-logo" /> -->
            <span class="logo-name" style="font-weight: 600; font-size:21px;">CarterBiggs Logistics</span>
            </a>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-picture">
                <img alt="image" src="{{ asset('assets/img/avat.png') }}">
            </div>
            <div class="sidebar-user-details">
                <div class="user-name">{{ Auth::user()->fullname }}</div>
                <div class="user-role">{{ Auth::user()->role->admin }}</div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="active">
                <a href="/user-dashboard" class="menu-toggle nav-link"><i
                        data-feather="airplay"></i><span>Dashboard</span></a>
            </li>
            @can('isLabAdmin')
                <li>
                    <a href="/my-lab" class="menu-toggle nav-link"><i class="fa fa-vial"></i><span>Lab</span></a>
                </li>
            @endcan
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="menu"></i><span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><span>Sample
                                Pickup Request</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="/create-order">Request Sample</a></li>
                            <li><a class="nav-link" href="/all-orders">All Samples Pickup Requests</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><span>Care Pack
                                Request</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="/pack-request">Request Care Pack</a></li>
                            <li><a class="nav-link" href="/all-care-packs">All Care Packs Requests</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            @can('isSuperAdmin')
                {{-- Flights --}}
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file-plus"></i><span>MMIA
                            info</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/create-flight">Enter Flight info</a></li>
                        <li><a class="nav-link" href="/all-flights">Manage information</a></li>
                        <li><a class="nav-link" href="#">Generate Reports</a></li>
                    </ul>
                </li>
                {{-- Inventory --}}
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="briefcase"></i><span>Inventory</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/inventory-category">Create New</a></li>
                        <li><a class="nav-link" href="/inventory-activity">Inventory Activity</a></li>
                        <li><a class="nav-link" href="#">Care Pack Activity</a></li>
                        {{-- <li><a class="nav-link" href="/manage-packs">View Inventory
                                Items</a></li> --}}
                        <li><a class="nav-link" href="#">Inventory Reports</a></li>
                    </ul>
                </li>
                {{-- Share route --}}
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fa fa-vials"></i><span>Sharing
                        </span></a>
                    <ul class="dropdown-menu">
                        @can('isSuperAdmin')
                            <li><a class="nav-link" href="/share-requests">Share Requests</a></li>
                        @endcan
                        <li><a class="nav-link" href="/all-share-requests">Open Shares</a></li>
                        <li><a class="nav-link" href="/all-delivered-samples">All Delivered</a></li>
                    </ul>
                </li>

                {{-- Users routes for super admin --}}
                <li class="menu-header">Users</li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="user-check"></i><span>Lab</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/create-lab">Create lab</a></li>
                        <li><a class="nav-link" href="/manage-lab">Manage lab</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="user-check"></i><span>Warehouse</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/manage-warehouse">Manage warehouse</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span>Admin
                            Users</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/create-admin">Register admin</a></li>
                        <li><a class="nav-link" href="/manage-admin">Manage admin users</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user"></i><span>Riders</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/create-rider">Register Riders</a></li>
                        <li><a class="nav-link" href="/manage-rider">Manage Riders</a></li>
                    </ul>
                </li>
            @endcan
            {{-- Supervisor --}}
            @can('isSupervisor')
                <li class="menu-header">Users</li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="user-check"></i><span>Profilers</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/manage-profilers">Manage profilers</a></li>
                    </ul>
                </li>
            @endcan
            @can('isSuperAdmin')
                <li class="menu-header">Financials</li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="briefcase"></i><span>Transactions</span></a>
                    <ul class="dropdown-menu">
                        {{-- <li><a class="nav-link" href="/generate-transaction">Generate
                                Transaction</a></li> --}}
                        <li><a class="nav-link" href="/all-transactions">All Transactions</a></li>
                        {{-- <li><a class="nav-link" href="#">Transaction Report</a></li>
                        --}}
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file"></i><span>Receipts &
                            Invoices</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/view-receipts">View Receipts</a></li>
                        {{-- <li><a class="nav-link" href="/generate-receipt">Generate
                                Receipts</a></li> --}}
                        {{-- <li><a class="nav-link" href="#">Generate Quote</a></li>
                        --}}
                    </ul>
                </li>
            @endcan
            <li class="menu-header">Account</li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>User
                        settings</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/user-profile">My profile</a></li>
                    <li><a class="nav-link" href="/auth-password-reset/{{ Auth::user()->uuid }}">Change Password</a>
                    </li>
                </ul>
            </li>

        </ul>
    </aside>
</div>
