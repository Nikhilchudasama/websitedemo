<header class="header">
    <div id="header-sticky" class="header-main">
        <div class="header-main-inner text-center">
            <div class="logo">
                <a href="{{ route('front_home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Yumsenghub" width="150">
                </a>
            </div>

            <div class="header-rightside-nav">
                <div class="d-inline-block customer-support-container">
                    <div class="customer-support">
                        <div class="d-inline-block mr-2">
                            <i class="fas fa-phone left" data-fa-transform="flip-h"></i>
                        </div>

                        <div class="d-inline-block">
                            Call Us : <br>
                            <b>
                                1234 567 890
                            </b>
                        </div>
                    </div>

                    <div class="customer-support">
                        <div class="d-inline-block mr-2">
                            <i class="fas fa-clock"></i>
                        </div>

                        <div class="d-inline-block">
                            Timings : <br>
                            <b>
                                9:30 to 21:00
                            </b>
                        </div>
                    </div>

                    <div class="customer-support">
                        <div class="header-label">
                            <i class="fas fa-clock"></i>

                            OPEN <br> 7 DAYS A WEEK
                        </div>
                    </div>
                </div>

                <div class="sidebar-icon-nav right-side-menu">
                    <ul class="list-none-ib">
                        @if (isset($isHomePage) || ! Auth::guard('customer')->check())
                            <li>
                                <a href="{{ route('front_my_account') }}">
                                    <i class="far fa-user-circle left" aria-hidden="true"></i>
                                    <span class="hidden-sm-down">
                                        My Account
                                    </span>
                                </a>
                            </li>
                        @else
                            <li class="dropdown-nav">
                                <a>
                                    <i class="far fa-user-circle left" aria-hidden="true"></i>

                                    <span class="hidden-sm-down">
                                        My Account
                                    </span>

                                    <i class="far fa-caret-square-down right" aria-hidden="true"></i>
                                </a>

                                <div class="dropdown-menu">
                                    <ul>
                                        <li>
                                            <a href="{{ route('front_profile_page') }}">
                                                Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('front_my_orders') }}">
                                                My Orders
                                            </a>
                                        </li>
                                    </ul>

                                    <span class="divider"></span>

                                    <ul>
                                        <li>
                                            <a href="{{ route('front_logout') }}">
                                                <i class="far fa-user left" aria-hidden="true"></i>
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                    </ul>

                    @if (isset($displaySideCart))
                        <ul class="list-none-ib">
                            <li>
                                <a id="sidebar_toggle_btn">
                                    <div class="cart-icon">
                                        <i aria-hidden="true" class="fas fa-shopping-cart"></i>
                                    </div>

                                    <div class="cart-title">
                                        <span class="cart-count">
                                            0
                                        </span>
                                        /
                                        <span class="cart-total strong">
                                            RM0.00
                                        </span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

<div class="clearfix"></div>
