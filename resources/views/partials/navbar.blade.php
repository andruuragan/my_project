<nav class="navbar navbar-expand-lg custom-navbar d-none d-lg-flex">
    <div class="container-1600 header-inner">

        <!-- LOGO -->
        <div class="header-left">
        <div class="d-flex flex-column" style="gap: 6px;">
            <a href="{{ route('main.index') }}">
                <img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo">
            </a>

            <a href="{{ route('contacts.index') }}" class="subtitle-link">
    <div class="subtitle-badge">
        Центр комплектації димарів
    </div>
</a>
        </div>
        </div>

        <!-- MENU -->
        <div class="navbar-nav-wrapper">
            <ul class="navbar-nav">

                {{-- ===== PUBLIC (ВСІ БАЧАТЬ) ===== --}}
                <li class="nav-item">
                    <a class="nav-link d-inline-flex align-items-center gap-2 {{ request()->routeIs('main.index') ? 'active' : '' }}"
                       href="{{ route('main.index') }}">
                        <!-- SVG іконка будинку, яка наслідує колір тексту (currentColor) -->
                        <svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                        </svg>
                        <span>Головна</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-inline-flex align-items-center {{ request()->routeIs('shop.index') ? 'active' : '' }}" href="{{ route('shop.index') }}">
                        <i class="bi bi-grid-fill me-2"></i> Каталог товарів
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-inline-flex align-items-center gap-2 {{ request()->routeIs('about.index') ? 'active' : '' }}"
                       href="{{ route('about.index') }}">
                        <!-- Іконка інформації -->
                        <svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>
                        <span>Про нас</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-inline-flex align-items-center gap-2 {{ request()->routeIs('contacts.index') ? 'active' : '' }}"
                       href="{{ route('contacts.index') }}">
                        <!-- Іконка телефону -->
                        <svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-.58-.196l-1.458.224c-.44.067-.757.425-.757.87 0 6.125 4.906 11.03 11.035 11.03.448 0 .805-.317.872-.758l.224-1.457a.677.677 0 0 0-.196-.58L11.16 10.63a.676.676 0 0 0-.74-.103l-.385.198a.524.524 0 0 1-.401.043A11.542 11.542 0 0 1 5.466 7.524a.524.524 0 0 1 .043-.401l.197-.385a.676.676 0 0 0-.102-.741L3.654 1.328zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        <span>Контакти</span>
                    </a>
                </li>

                {{-- ===== ADMIN ONLY ===== --}}
                @auth
                    @if(auth()->user()->isAdmin())


                        <li class="nav-item">
                            <a class="nav-link d-inline-flex align-items-center gap-2 {{ request()->routeIs('admin.*') ? 'active' : '' }}"
                               href="{{ route('admin.index') }}">
                                <!-- Іконка щита з замком -->
                                <svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
                                    <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .34 0c.074-.23.172-.268.293-.117.241-.113.546-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                                    <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415V9a.5.5 0 0 1-1 0V7.915A1.5 1.5 0 1 1 9.5 6.5z"/>
                                </svg>
                                <span>Admin</span>
                            </a>
                        </li>



                      {{--  <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('catalog.*') ? 'active' : '' }}"
                               href="{{ route('catalog.index') }}">
                                Catalog
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('descriptions.*') ? 'active' : '' }}"
                               href="{{ route('descriptions.index') }}">
                                Опис
                            </a>
                        </li>--}}

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

                @auth

                    {{-- ADMIN --}}
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('users.index') }}" class="login-btn admin-btn">
                            <i class="bi bi-people"></i>
                            Користувачі
                        </a>
                    @endif

                    {{-- CART --}}
                    @php
                        $cart = session('cart', []);
                        $cartCount = 0;
                        $cartTotal = 0;

                        foreach ($cart as $item) {
                            $qty = $item['qty'] ?? 1;
                            $price = $item['price'] ?? 0;

                            $cartCount += $qty;
                            $cartTotal += $price * $qty;
                        }
                    @endphp

                   <a href="{{ route('cart.index') }}" class="cart-btn" title="Кошик">
    <i class="bi bi-cart3"></i>

    <span class="cart-count" id="cartCountDesktop">
        {{ $cartCount }}
    </span>

    <span id="cartTotalDesktop">
        {{ number_format($cartTotal, 0, '.', ' ') }}
    </span>
</a>
                    {{-- USER DROPDOWN (ВОТ ТУТ ВЕРНУЛИ КАК НУЖНО) --}}
                    <div class="dropdown ms-2">

                        <button class="login-btn dropdown-toggle d-flex align-items-center gap-2"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">

                            <i class="bi bi-person-circle"></i>

                            <span>
                    {{ auth()->user()->name }}
                </span>

                        </button>

                        <ul class="dropdown-menu dropdown-menu-end custom-dropdown">

                            <li>
                                <a class="dropdown-item {{ request()->routeIs('dashboard') ? 'active-item' : '' }}"
                                   href="{{ route('dashboard') }}">
                                    <i class="bi bi-speedometer2 me-2"></i>
                                    Особистий кабінет
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item {{ request()->routeIs('profile.*') ? 'active-item' : '' }}"
                                   href="{{ route('profile.edit') }}">
                                    <i class="bi bi-person me-2"></i>
                                    Профіль
                                </a>
                            </li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Вийти
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </div>

                @else

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
                <div class="text-center mb-3">
    <img src="{{ asset('images/logo.png') }}"
         alt="Логотип DymSystems"
         width="80">

    

    <div class="text-muted fw-bold fs-6 mt-3">
        Вхід в акаунт
    </div>
</div>

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
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">



                    <!-- EMAIL -->
                    <div class="mb-3">
                        <!-- Добавляем for="..." -->
                        <label class="form-label" for="email">Email</label>

                        <!-- Добавляем точно такой же id="..." -->
                        <input type="email" id="email" name="email"
                               class="form-control"
                               autocomplete="username"
                               required>
                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-3">
                        <!-- Добавляем for="password" -->
                        <label class="form-label" for="password">Пароль</label>

                        <!-- Добавляем id="password" в сам инпут пароля -->
                        <input type="password" id="password" name="password"
                               class="form-control"
                               autocomplete="current-password"
                               required>
                               <div class="mt-2 text-end">
        <a href="{{ route('password.request') }}" class="text-decoration-none text-muted" style="font-size: 0.85rem;">
            Забули пароль?
        </a>
    </div>
                    </div>

                    

                    <!-- REMEMBER -->
                    <div class="form-check mb-3">
                        

                        <!-- Добавляем id="remember_me" к инпуту -->
                        <input type="checkbox" id="remember_me" name="remember" class="form-check-input"
       {{ old('remember') ? 'checked' : '' }}>

                        <!-- Добавляем for="remember_me" к лейблу -->
                        <label class="form-check-label" for="remember_me">
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
