<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-dark bg-dark" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('logos/scs logo.png') }}" style="width: 50px;" class="mt--3 navbar-brand-img" alt="SCS Logo">
            <span class="text-white display-3">SCS</span>
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3"> 
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Modules</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.index') }}">
                        <i class="ni ni-hat-3 text-primary"></i> Students
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('personnel.index') }}">
                        <i class="ni ni-circle-08 text-primary"></i> Personnels
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('class.index') }}">
                    <i class="ni ni-shop text-primary"></i>Classes
                    </a>
                </li>
            </ul>

            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">References</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="#references" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="references">
                        <i class="ni ni-hat-3 text-primary"></i>
                        <span class="nav-link-text">{{ __('Student References') }}</span>
                    </a>

                    <div class="collapse" id="references">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ranks.index') }}">
                                    {{ __('Ranks') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('type.index') }}">
                                    {{ __('Enlistment Type') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('bloodType.index') }}">
                                    {{ __('Blood Type') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('religion.index') }}">
                                    {{ __('Religion') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ethnicGroup.index') }}">
                                    {{ __('Ethnic Group') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('unit.index') }}">
                                    {{ __('Unit') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('vaccineName.index') }}">
                                    {{ __('Vaccine Names') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('demeritReport.index') }}">
                                    {{ __('Demerit Report Type') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="#personnelReferences" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="references">
                        <i class="ni ni-circle-08 text-primary"></i>
                        <span class="nav-link-text">{{ __('Personnel References') }}</span>
                    </a>

                    <div class="collapse" id="personnelReferences">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('personnelCategory.index') }}">
                                    {{ __('Personnel Categories') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('personnelType.index') }}">
                                    {{ __('Personnel Types') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('module.index') }}">
                        <i class="ni ni-hat-3 text-primary"></i> Academic
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('activity.index') }}">
                        <i class="ni ni-circle-08 text-primary"></i> Non Academic
                    </a>
                </li>
            </ul>

            {{-- <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('class.index') }}">
                        <i class="ni ni-circle-08"></i> Class
                    </a>
                </li>
            </ul> --}}
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Administration</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="#administration" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="administration">
                        <i class="ni ni-circle-08 text-primary"></i>
                        <span class="nav-link-text">{{ __('User Management') }}</span>
                    </a>

                    <div class="collapse" id="administration">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('List of Users') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.deactivated') }}">
                                    {{ __('Deactivated Users') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('role.index') }}">
                        <i class="ni ni-palette text-primary"></i> Roles and Permissions
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>