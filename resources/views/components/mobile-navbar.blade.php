{{-- MOBILE NAVBAR --}}
<nav class="mobile-navbar d-lg-none">

    <div class="mobile-navbar-inner">

        <!-- BURGER -->
        <button class="mobile-burger" type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#mobileMenu"
                aria-controls="mobileMenu">

            <i class="bi bi-list"></i>
        </button>

        <!-- LOGO -->
        <a href="{{ route('main.index') }}" class="mobile-logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </a>

        <!-- RIGHT SIDE -->
        <div class="mobile-right">

            <!-- CART -->
            @php
                $cart = session('cart', []);
                $cartCount = 0;

                foreach ($cart as $item) {
                    $cartCount += $item['qty'] ?? 1;
                }
            @endphp

            <a href="{{ route('cart.index') }}" class="mobile-cart">
                <i class="bi bi-cart3"></i>

                @if($cartCount > 0)
                    <span class="cart-badge">{{ $cartCount }}</span>
                @endif
            </a>

            <!-- USER -->
            @auth
                <a href="{{ route('dashboard') }}" class="mobile-user">
                    <i class="bi bi-person-circle"></i>
                </a>
            @else
                <button class="mobile-user"
                        data-bs-toggle="modal"
                        data-bs-target="#loginModal">
                    <i class="bi bi-person-circle"></i>
                </button>
            @endauth

        </div>

    </div>
</nav>


<!-- OFFCANVAS MENU -->
<div class="offcanvas offcanvas-start mobile-offcanvas"
     tabindex="-1"
     id="mobileMenu"
     aria-labelledby="mobileMenuLabel">

    <div class="offcanvas-header">

        <div class="offcanvas-title-block">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <div class="subtitle">Центр Комплектації Димарів</div>
        </div>

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">

        <div class="mobile-menu">

            <a href="{{ route('main.index') }}"
               class="{{ request()->routeIs('main.index') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i>
                Головна
            </a>

            <a href="{{ route('shop.index') }}"
               class="{{ request()->routeIs('shop.index') ? 'active' : '' }}">
                <i class="bi bi-grid"></i>
                Каталог товарів
            </a>

            <a href="{{ route('about.index') }}"
               class="{{ request()->routeIs('about.index') ? 'active' : '' }}">
                <i class="bi bi-info-circle"></i>
                Про нас
            </a>

            <a href="{{ route('contacts.index') }}"
               class="{{ request()->routeIs('contacts.index') ? 'active' : '' }}">
                <i class="bi bi-telephone"></i>
                Контакти
            </a>

            @auth

                <hr>

                <a href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i>
                    Кабінет
                </a>

                <a href="{{ route('cart.index') }}">
                    <i class="bi bi-cart3"></i>
                    Кошик
                </a>

                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.index') }}">
                        <i class="bi bi-shield-lock"></i>
                        Адмін панель
                    </a>
                @endif

                <hr>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="mobile-logout">
                        <i class="bi bi-box-arrow-right"></i>
                        Вийти
                    </button>
                </form>

            @else

                <hr>
 <button class="mobile-auth"
                        data-bs-toggle="modal"
                        data-bs-target="#loginModal">
                    Вхід
                </button>

                <button class="mobile-auth secondary"
                        data-bs-toggle="modal"
                        data-bs-target="#registerModal">
                    Реєстрація
                </button>

            @endauth

        </div>

        <div class="mobile-footer">
            <div>Пн–Пт: 09:00–18:00</div>
            <div>+38 (099) 123-45-67</div>
            <div>dymsystems@ukr.net</div>
        </div>

    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const mobileMenu = document.getElementById('mobileMenu');
    if (!mobileMenu) return;

    // Инициализируем экземпляр Offcanvas
    const offcanvasInstance = new bootstrap.Offcanvas(mobileMenu);

    // Находим все кнопки в меню, которые открывают модальные окна
    const authButtons = mobileMenu.querySelectorAll('[data-bs-target="#loginModal"], [data-bs-target="#registerModal"]');

    authButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Закрываем меню
            offcanvasInstance.hide();
        });
    });
});
    </script>