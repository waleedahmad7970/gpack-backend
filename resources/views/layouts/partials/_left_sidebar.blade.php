<div class="left-sidebar show" style="background-color: #f8f9fb;">
    <!-- LOGO -->
    <div class="brand">
        <a href="{{ route('admin.dashboard') }}" class="logo">
            <span>
                <img 
                    src="{{ asset('admin-assets/images/logos/logo-black.svg') }}" 
                    alt="J1 Door" 
                    class="logo-sm"
                />
            </span>
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <div class="menu-body navbar-vertical tab-content">
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="menu-label mt-0">D<span>ashboard</span></li>
                    <li class="nav-item">
                        <a class="nav-link active"  href="{{ route('admin.dashboard') }}">
                            <i class="ti ti-home menu-icon"></i><span>Dashboard</span>
                        </a>
                    </li>
                    <li class="menu-label mt-0">Team <span>Section</span></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarTeam" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTeam">
                            <i class="ti ti-shopping-cart menu-icon"></i>
                            <span>Team</span>
                        </a>
                        <div class="collapse {{ request()->routeIs('admin.teams.index') || request()->routeIs('admin.teams.create') || request()->routeIs('admin.teams.edit') ? 'navbar-collapse show' : '' }}" id="sidebarTeam">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.teams.index') }}" class="nav-link {{ request()->routeIs('admin.teams.index') || request()->routeIs('admin.teams.edit') ? 'active' : '' }}">
                                        Team Members
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.teams.create') }}" class="nav-link {{ request()->routeIs('admin.teams.create') ? 'active' : '' }}">
                                        New Team Member
                                    </a>
                                </li> 
                            </ul>
                        </div>
                    </li>

                    <li class="menu-label mt-0">Product <span>Section</span></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarProduct" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProduct">
                            <i class="ti ti-briefcase menu-icon"></i>
                            <span>Products</span>
                        </a>
                        <div class="collapse {{-- request()->routeIs('admin.products.index') || request()->routeIs('admin.products.create') || request()->routeIs('admin.products.edit') || request()->routeIs('admin.products.show') ? 'navbar-collapse show' : '' --}}" id="sidebarProduct">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link {{-- request()->routeIs('admin.products.index') || request()->routeIs('admin.products.edit') || request()->routeIs('admin.products.show') ? 'active' : '' --}}">
                                        Products List
                                    </a>
                                </li>                               
                                <li class="nav-item">
                                    <a href="#" class="nav-link {{-- request()->routeIs('admin.products.create') ? 'active' : '' --}}">
                                        New Product
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                    <li class="menu-label mt-0">Customer Support <span>Section</span></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarSupport" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSupport">
                            <i class="ti ti-help menu-icon"></i>
                            <span>Support</span>
                            <span class="badge bg-dark text-light ms-2">0</span>
                        </a>
                        <div class="collapse {{-- request()->routeIs('admin.support.index') || request()->routeIs('admin.support.show') || request()->routeIs('admin.support.log') ? 'navbar-collapse show' : '' --}}" id="sidebarSupport">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link {{-- request()->routeIs('admin.support.index') || request()->routeIs('admin.support.show') ? 'active' : '' --}}">
                                        Unread Messages
                                        <span class="badge bg-dark text-light ms-2">0</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link {{-- request()->routeIs('admin.support.log') ? 'active' : '' --}}">
                                        Messages Log
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>                   
                    
                    <li class="menu-label mt-0">Settings <span>Section</span></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarSettings" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSettings">
                            <i class="ti ti-settings menu-icon"></i>
                            <span>Settings</span>
                        </a>
                        <div 
                            class="collapse {{-- 
                                    request()->routeIs('admin.categories.index') 
                                    || request()->routeIs('admin.categories.create') 
                                    || request()->routeIs('admin.categories.edit') 
                                    || request()->routeIs('admin.admins.index') 
                                    || request()->routeIs('admin.admins.edit') 
                                    || request()->routeIs('admin.admins.create') 
                                    || request()->routeIs('admin.shipping-methods.index')
                                    || request()->routeIs('admin.shipping-methods.create')
                                    || request()->routeIs('admin.shipping-methods.edit')
                                    || request()->routeIs('admin.tax-rates.index')
                                    || request()->routeIs('admin.tax-rates.create')
                                    || request()->routeIs('admin.tax-rates.edit')
                                    ? 'navbar-collapse show' : '' 
                                --}}" 
                                id="sidebarSettings"
                            >
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link {{-- request()->routeIs('admin.categories.index') || request()->routeIs('admin.categories.create') || request()->routeIs('admin.categories.edit') ? 'active' : '' --}}">
                                        Categories
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link {{-- request()->routeIs('admin.admins.index') || request()->routeIs('admin.admins.edit') || request()->routeIs('admin.admins.create') ? 'active' : '' --}}">
                                        Admins
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link {{-- request()->routeIs('admin.shipping-methods.index') || request()->routeIs('admin.shipping-methods.edit') || request()->routeIs('admin.shipping-methods.create') ? 'active' : '' --}}">
                                        Shipping Methods
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link {{-- request()->routeIs('admin.tax-rates.index') || request()->routeIs('admin.tax-rates.create') || request()->routeIs('admin.tax-rates.edit') ? 'active' : '' --}}">
                                        Tax Rates
                                    </a>
                                </li> 
                            </ul>
                        </div>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarAdmin" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAdmin">
                            <i class="ti ti-user-check menu-icon"></i>
                            <span>Admins</span>
                        </a>
                        <div class="collapse {{-- request()->routeIs('admins.index') || request()->routeIs('admins.create') || request()->routeIs('admins.edit') || request()->routeIs('admins.show') ? 'navbar-collapse show' : '' --}}" id="sidebarAdmin">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="{{-- route('admins.index') --}}" class="nav-link {{-- request()->routeIs('admins.index') || request()->routeIs('admins.edit') || request()->routeIs('admins.show') ? 'active' : '' --}}">
                                        Admins List
                                    </a>
                                </li>                                
                                <li class="nav-item">
                                    <a href="{{-- route('admins.create') --}}" class="nav-link {{-- request()->routeIs('admins.create') ? 'active' : '' --}}">
                                        New Admin
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                    <li class="menu-label mt-0">L<span>ogout</span></li>
                    <li class="nav-item">
                        <form id="logout-form-admin-sidebar" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <a 
                            class="nav-link" 
                            href="javascript:;"
                            onClick="event.preventDefault(); document.getElementById('logout-form-admin-sidebar').submit();"
                        >
                            <i class="ti ti-logout menu-icon"></i><span>Logout</span>
                        </a>
                    </li>
                </ul><!--end navbar-nav--->
            </div><!--end sidebarCollapse-->
        </div>
    </div>    
</div>
<!-- end left-sidenav-->