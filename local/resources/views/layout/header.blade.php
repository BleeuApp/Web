<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ Asset('home') }}" class="logo d-flex align-items-center">
            <img src="{{ Asset('assets/img/logo.png') }}" alt="">
            <span class="d-none d-lg-block">&nbsp;&nbsp;{{ __('app.admin') }}</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">

    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">





            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-translate"></i>

                    @if (Session::has('locale'))

                        @if (Session::get('locale') == 'en')
                            {{ __('app.english') }}
                        @elseif(Session::get('locale') == 'ar')
                            {{ __('app.arabic') }}
                        @elseif(Session::get('locale') == 'sp')
                            {{ __('app.spanish') }}
                        @elseif(Session::get('locale') == 'fr')
                            {{ __('app.french') }}
                        @elseif(Session::get('locale') == 'mala')
                            {{ __('app.malayalam') }}
                        @elseif(Session::get('locale') == 'por')
                            {{ __('app.por') }}
                        @endif
                    @else
                        {{ __('app.english') }}
                    @endif


                </a><!-- End Messages Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ Asset('setLang?lang=en') }}">
                            <i class="bi bi-check-circle"></i>
                            <span>{{ __('app.english') }}</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    {{-- New Update --}}
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ Asset('setLang?lang=mala') }}">
                            <i class="bi bi-check-circle"></i>
                            <span>{{ __('app.malayalam') }}</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    {{--  --}}

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ Asset('setLang?lang=ar') }}">
                            <i class="bi bi-check-circle"></i>
                            <span>{{ __('app.arabic') }}</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ Asset('setLang?lang=sp') }}">
                            <i class="bi bi-check-circle"></i>
                            <span>{{ __('app.spanish') }}</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ Asset('setLang?lang=fr') }}">
                            <i class="bi bi-check-circle"></i>
                            <span>{{ __('app.french') }}</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ Asset('setLang?lang=por') }}">
                            <i class="bi bi-check-circle"></i>
                            <span>{{ __('app.por') }}</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                </ul><!-- End Messages Dropdown Items -->

            </li><!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ Asset('assets/admin.png') }}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">


                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ Asset('setting') }}">
                            <i class="bi bi-gear"></i>
                            <span>{{ __('app.account_setting') }}</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>



                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ Asset('admin/logout') }}">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>{{ __('app.logout') }}</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
