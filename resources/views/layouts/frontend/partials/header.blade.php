    <!-- ============= Header ================ -->
    <header class="header">
        <div class="container">
            <div class="header-wrapper">
                <a href="/" class="header-logo">
                    <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="" />
                </a>
                <div class="header-content">
                    <div class="header-menu">
                        <img src="{{ asset('assets/frontend/images/menu.png') }}" alt="" />
                    </div>
                    <ul class="header-nav-lists">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <div class="header-dropdown">
                                <a href="/service.html" aria-haspopup="true" aria-expanded="false">Our Services</a>
                            </div>
                        </li>
                        <li>
                            <a href="/strategic-advisor.html" aria-haspopup="true" aria-expanded="false">Our Impact
                                Advisors</a>
                        </li>
                        <li>
                            <a href="#" aria-haspopup="true" aria-expanded="false">Resources</a>
                        </li>

                        <li>
                            <div class="header-dropdown">
                                <div class="header-dropdown-item d-flex align-items-center gap-3">
                                    <a href="/about.html" aria-haspopup="true" aria-expanded="false">About Us</a>
                                    <span><i class="fas fa-chevron-down"></i></span>
                                </div>
                                <ul class="header-dropdown-list-item">
                                    <li>
                                        <a href="/about.html#team">leadership team</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <a href="/#contact" class="custom-btn get-qucte-btn">
                        <div class="get-arrow-icon"><i class="fas fa-arrow-up"></i></div>
                        <p>Let’s Connect!</p>
                    </a>
                    <div class="header-close">
                        <img src="{{ asset('assets/frontend/images/close.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </header>
