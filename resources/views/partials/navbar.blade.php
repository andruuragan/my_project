<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-1600 header-inner">

        <!-- LOGO -->
        <div class="header-left">
        <div class="d-flex flex-column" style="gap: 6px;">
            <a href="{{ route('main.index') }}">
                <img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo">
            </a>

            <div class="subtitle-badge">
                Центр комплектування димоходів
            </div>
        </div>
        </div>

        <!-- MENU -->
        <div class="navbar-nav-wrapper">
            <ul class="navbar-nav">

                {{-- ===== PUBLIC (ВСІ БАЧАТЬ) ===== --}}
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

                {{-- ===== ADMIN ONLY ===== --}}
                @auth
                    @if(auth()->user()->isAdmin())



                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('catalog.index') ? 'active' : '' }}"
                               href="{{ route('catalog.index') }}">
                                Catalog (admin)
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('descriptions.index') ? 'active' : '' }}"
                               href="{{ route('descriptions.index') }}">
                                Опис (admin)
                            </a>
                        </li>

                    @endif
                @endauth

            </ul>
        </div>
        <div class="header-right">

            <!-- INFO BLOCK (ЗАВЖДИ Є) -->
            <div class="header-contact-block">

                <div class="contact-row">
                    <i class="bi bi-clock"></i>
                    <div class="contact-value">Пн–Пт: 09:00–18:00</div>
                </div>

                <div class="contact-row">
                    <i class="bi bi-telephone"></i>
                    <div class="contact-value">+38 (099) 123-45-67</div>
                </div>

                <div class="contact-row">
                    <i class="bi bi-envelope"></i>
                    <div class="contact-value">dymsystems@ukr.net</div>
                </div>

            </div>

            <!-- AUTH BLOCK (ЛОГІКА ТУТ, НЕ ВЕРСТКА) -->
            <div class="header-auth-buttons">
                @if(auth()->check() && auth()->user()->isAdmin())
                    <a href="{{ route('users.index') }}" class="login-btn admin-btn">
                        <i class="bi bi-people"></i>
                        Користувачі
                    </a>
                @endif

                @auth

                    <div class="dropdown">

                        <button class="login-btn dropdown-toggle"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">

                            <i class="bi bi-person-circle"></i>
                            {{ auth()->user()->name }}

                        </button>

                        <ul class="dropdown-menu dropdown-menu-end custom-dropdown shadow">

                            <li>
                                <a class="dropdown-item {{ request()->routeIs('dashboard') ? 'active-item' : '' }}"
                                   href="{{ route('dashboard') }}">
                                    <i class="bi bi-speedometer2"></i>
                                    Dashboard
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item {{ request()->routeIs('profile.*') ? 'active-item' : '' }}"
                                   href="{{ route('profile.edit') }}">
                                    <i class="bi bi-gear"></i>
                                    Профиль
                                </a>
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-danger">
                                        Вихід
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </div>

                @else

                    <div class="header-auth-buttons">

                        <button class="login-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#loginModal">
                            Вхід
                        </button>

                        <button class="register-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#registerModal">
                            Реєстрація
                        </button>

                    </div>

                @endauth

            </div>

        </div>


    </div>


</nav>
<!-- LOGIN MODAL -->
<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">

            <div class="modal-header">
                <h5 class="modal-title">Вхід в акаунт</h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

                @if ($errors->login->any())
                    <div class="alert alert-danger">

                        <ul class="mb-0 ps-3">
                            @foreach ($errors->login->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf



                    <!-- EMAIL -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               autocomplete="off"
                               required>
                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-3">
                        <label class="form-label">Пароль</label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               autocomplete="new-password"
                               required>
                    </div>

                    <!-- REMEMBER -->
                    <div class="form-check mb-3">
                        <input type="checkbox"
                               name="remember"
                               class="form-check-input">

                        <label class="form-check-label">
                            Запам'ятати мене
                        </label>
                    </div>

                    <button type="submit"
                            class="register-btn w-100 justify-content-center">

                        Увійти
                    </button>

                </form>

            </div>

        </div>
    </div>
</div>

@if ($errors->login->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            let loginModal = new bootstrap.Modal(
                document.getElementById('loginModal')
            );

            loginModal.show();

        });
    </script>
@endif
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const loginModalEl = document.getElementById('loginModal');

        loginModalEl.addEventListener('hidden.bs.modal', function () {

            // удаляем все ошибки внутри модалки
            loginModalEl.querySelectorAll('.alert-danger').forEach(el => {
                el.remove();
            });

        });

    });
</script>
