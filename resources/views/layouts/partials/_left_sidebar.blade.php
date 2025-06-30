<div class="left-sidebar show" style="background-color: #f8f9fb;">
    <!-- LOGO -->
    <div class="brand bg-dark">
        <a href="{{ route('admin.dashboard') }}" class="logo">
            <span>
                <img 
                    src="{{ asset('admin-assets/images/logos/gpack_logo.svg') }}" 
                    alt="GPack" 
                    class="logo-md"
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
                    <li class="menu-label mt-0">Main <span>Section</span></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarTeam" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTeam">
                            <i class="ti ti-users menu-icon"></i>
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
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarPublication" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPublication">
                            <i class="ti ti-book menu-icon"></i>
                            <span>Publication</span>
                        </a>
                        <div class="collapse {{ request()->routeIs('admin.publications.index') || request()->routeIs('admin.publications.edit') || request()->routeIs('admin.publications.create') ? 'navbar-collapse show' : '' }}" id="sidebarPublication">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.publications.index') }}" class="nav-link {{ request()->routeIs('admin.publications.index') || request()->routeIs('admin.publications.edit') ? 'active' : '' }}">
                                        Publications
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.publications.create') }}" class="nav-link {{ request()->routeIs('admin.publications.create') ? 'active' : '' }}">
                                        New Publication
                                    </a>
                                </li> 
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarField" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarField">
                            <i class="ti ti-file-check menu-icon"></i>
                            <span>Fields</span>
                        </a>
                        <div class="collapse {{ request()->routeIs('admin.fields.index') || request()->routeIs('admin.fields.create') || request()->routeIs('admin.fields.edit') ? 'navbar-collapse show' : '' }}" id="sidebarField">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.fields.index') }}" class="nav-link {{ request()->routeIs('admin.fields.index') || request()->routeIs('admin.fields.edit') ? 'active' : '' }}">
                                        Fields
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.fields.create') }}" class="nav-link {{ request()->routeIs('admin.fields.create') ? 'active' : '' }}">
                                        New Field
                                    </a>
                                </li> 
                            </ul>
                        </div>
                    </li>

                    <li class="menu-label mt-0">Page <span>Section</span></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarPage" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPage">
                            <i class="ti ti-file menu-icon"></i>
                            <span>Pages</span>
                        </a>
                        <div class="collapse {{ request()->routeIs('admin.pages.why.edit') || request()->routeIs('admin.pages.about.edit') || request()->routeIs('admin.pages.home.edit') || request()->routeIs('admin.pages.team.edit') || request()->routeIs('admin.pages.publication.edit') ? 'navbar-collapse show' : '' }}" id="sidebarPage">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.pages.home.edit') }}" class="nav-link {{ request()->routeIs('admin.pages.home.edit') ? 'active' : '' }}">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.pages.about.edit') }}" class="nav-link {{ request()->routeIs('admin.pages.about.edit') ? 'active' : '' }}">
                                        About Us
                                    </a>
                                </li>                               
                                <li class="nav-item">
                                    <a href="{{ route('admin.pages.why.edit') }}" class="nav-link {{ request()->routeIs('admin.pages.why.edit') ? 'active' : '' }}">
                                        Why Us
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.pages.team.edit') }}" class="nav-link {{ request()->routeIs('admin.pages.team.edit') ? 'active' : '' }}">
                                        Team
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.pages.publication.edit') }}" class="nav-link {{ request()->routeIs('admin.pages.publication.edit') ? 'active' : '' }}">
                                        Publications
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php
                        $unreadMsgs = \App\Models\Message::unread()->count(); 
                    ?>
                    <li class="menu-label mt-0">Customer Support <span>Section</span></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarSupport" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSupport">
                            <i class="ti ti-help menu-icon"></i>
                            <span>Support</span>
                            <span class="badge bg-dark text-light ms-2">{{ $unreadMsgs }}</span>
                        </a>
                        <div class="collapse {{ request()->routeIs('admin.support.index') || request()->routeIs('admin.support.show') || request()->routeIs('admin.support.log') ? 'navbar-collapse show' : '' }}" id="sidebarSupport">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.support.index') }}" class="nav-link {{ request()->routeIs('admin.support.index') || request()->routeIs('admin.support.show') ? 'active' : '' }}">
                                        Unread Messages
                                        <span class="badge bg-dark text-light ms-2">{{ $unreadMsgs }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.support.log') }}" class="nav-link {{ request()->routeIs('admin.support.log') ? 'active' : '' }}">
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
                            class="collapse {{  
                                    request()->routeIs('admin.admins.index') 
                                    || request()->routeIs('admin.admins.edit') 
                                    || request()->routeIs('admin.admins.create') 
                                    ? 'navbar-collapse show' : '' 
                                }}" 
                                id="sidebarSettings"
                            >
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.admins.index') }}" class="nav-link {{ request()->routeIs('admin.admins.index') || request()->routeIs('admin.admins.edit') || request()->routeIs('admin.admins.create') ? 'active' : '' }}">
                                        Admins
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link {{-- request()->routeIs('admin.shipping-methods.index') || request()->routeIs('admin.shipping-methods.edit') || request()->routeIs('admin.shipping-methods.create') ? 'active' : '' --}}">
                                        Social Media
                                    </a>
                                </li> 
                            </ul>
                        </div>
                    </li>
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