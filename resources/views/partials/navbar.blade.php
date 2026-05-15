<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-1600 d-flex align-items-center justify-content-between">

        <!-- LOGO -->
        <div class="d-flex flex-column" style="gap: 6px;">
            <a href="{{ route('main.index') }}">
                <img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo">
            </a>

            <div class="subtitle-badge">
                Центр комплектування димоходів
            </div>
        </div>

        <!-- MENU -->
        <div class="navbar-nav-wrapper">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('main.index') ? 'active' : '' }}"
                       href="{{ route('main.index') }}">
                        Головна
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('shop.index') ? 'active' : '' }}"
                       href="{{ route('shop.index') }}">
                        Каталог товарів
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about.index') ? 'active' : '' }}"
                       href="{{ route('about.index') }}">
                        Про компанію
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contacts.index') ? 'active' : '' }}"
                       href="{{ route('contacts.index') }}">
                        Контакти
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}"
                       href="{{ route('admin.index') }}">
                        Адмін
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('catalog.index') ? 'active' : '' }}"
                       href="{{ route('catalog.index') }}">
                        Catalog(admin)
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('descriptions.index') ? 'active' : '' }}"
                       href="{{ route('descriptions.index') }}">
                        Опис елементів(admin)
                    </a>
                </li>

            </ul>
        </div>
        <div class="header-right">

            <!-- TOP INFO (контакты) -->
            <div class="header-info">

                <div class="header-contact-block">

                    <div class="contact-row">
                        <i class="bi bi-clock"></i>
                        <div class="contact-content">
                            <div class="contact-value">Пн–Пт: 09:00–18:00</div>
                        </div>
                    </div>

                    <div class="contact-row">
                        <i class="bi bi-telephone"></i>
                        <div class="contact-content">
                            <div class="contact-value">+38 (099) 123-45-67</div>
                        </div>
                    </div>

                    <div class="contact-row">
                        <i class="bi bi-envelope"></i>
                        <div class="contact-content">
                            <div class="contact-value">dymsystems@ukr.net</div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- BOTTOM ACTIONS (auth / middleware-ready) -->
            <div class="header-actions">

                @auth
                    <a href="#" class="login-btn">Профіль</a>
                    <a href="#" class="register-btn">Вихід</a>
                @else
                    <a href="#" class="login-btn">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Вхід
                    </a>

                    <a href="#" class="register-btn">
                        <i class="bi bi-person-plus"></i>
                        Реєстрація
                    </a>
                @endauth

            </div>

        </div>

        </div>




</nav>
