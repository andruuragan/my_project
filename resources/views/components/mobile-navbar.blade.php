{{-- MOBILE NAVBAR --}}
<nav class="mobile-navbar d-lg-none">

    <div class="mobile-navbar-inner">

        <!-- BURGER -->
        <button class="mobile-burger" type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#mobileMenu"
                aria-controls="mobileMenu"
                 aria-label="Відкрити меню">

            <i class="bi bi-list"></i>
        </button>

        <!-- LOGO -->
        <a href="{{ route('main.index') }}" class="mobile-logo">
    <img src="{{ asset('images/logo.png') }}"
         width="120"
         height="40"
         alt="Logo">
</a>

        <!-- RIGHT SIDE -->
        <div class="mobile-right">

            <!-- CART -->
          @php
    $cart = session('cart', []);
    $cartCount = 0;
    $cartTotal = 0;
    foreach ($cart as $item) {
        $cartCount += $item['qty'] ?? 1;
        $cartTotal += ($item['price'] ?? 0) * ($item['qty'] ?? 1);
    }
@endphp
<a href="{{ route('cart.index') }}" class="mobile-cart mobile-cart-icon">
    <div class="cart-icon-wrapper">
        <i class="bi bi-cart3"></i>
        <span class="cart-badge" id="cartBadgeMobile" style="{{ $cartCount == 0 ? 'display:none;' : '' }}">
            <span id="cartCountMobile">{{ $cartCount }}</span>
        </span>
    </div>
    <span class="cart-total-text" id="cartTotalMobile">
        {{ number_format($cartTotal, 0, '.', ' ') }}
    </span>
</a>
            <!-- USER -->
           @auth

    <!-- WISHLIST -->
    <a href="{{ route('profile.wishlist') }}" class="mobile-user mobile-wishlist">
        <i class="bi bi-heart"></i>
    </a>

    <!-- USER -->
    <a href="{{ route('dashboard') }}" class="mobile-user">
        <i class="bi bi-person-circle"></i>
    </a>

@else

    <button class="mobile-user"
            data-bs-toggle="modal"
            data-bs-target="#loginModal"
               aria-label="Увійти в акаунт">
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
     role="dialog" 
     aria-labelledby="mobileMenuLabel">

    <div class="offcanvas-header">

        <div class="offcanvas-title-block">
    <img src="{{ asset('images/logo.png') }}"
         width="126"
         height="42"
         alt="Logo">
  <div class="subtitle">{{ __('messagesmob.subtitle') }}</div>
</div>

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
<!-- =============================== -->
    <div class="mobile-language-switcher">
    <a href="{{ route('locale.switch', 'uk') }}"
       class="{{ app()->getLocale() === 'uk' ? 'active' : '' }}"
       title="Українська">
        🇺🇦
    </a>

    <span class="language-divider">|</span>

    <a href="{{ route('locale.switch', 'ru') }}"
       class="{{ app()->getLocale() === 'ru' ? 'active' : '' }}"
       title="Русский">
        🇷🇺
    </a>
</div>
<!-- =============================== -->
    <div class="offcanvas-body">

        <div class="mobile-menu">

           <a href="{{ route('main.index') }}"
   class="{{ request()->routeIs('main.index') ? 'active' : '' }}">
    <i class="bi bi-house-door"></i>
    {{ __('messagesmob.home') }}
</a>

<a href="{{ route('shop.index') }}"
   class="{{ request()->routeIs('shop.index') ? 'active' : '' }}">
    <i class="bi bi-grid"></i>
    {{ __('messagesmob.catalog') }}
</a>

<a href="{{ route('categories.index') }}"
   class="{{ request()->routeIs('categories.index') ? 'active' : '' }}">
    <i class="bi bi-boxes"></i>
    {{ __('messagesmob.categories') }}
</a>

<a href="{{ route('about.index') }}"
   class="{{ request()->routeIs('about.index') ? 'active' : '' }}">
    <i class="bi bi-info-circle"></i>
    {{ __('messagesmob.about') }}
</a>

<a href="{{ route('contacts.index') }}"
   class="{{ request()->routeIs('contacts.index') ? 'active' : '' }}">
    <i class="bi bi-telephone"></i>
    {{ __('messagesmob.contacts') }}
</a>

            @auth

                <hr>

               <a href="{{ route('dashboard') }}">
    <i class="bi bi-speedometer2"></i>
    {{ __('messagesmob.account') }}
</a>

<a href="{{ route('cart.index') }}">
    <i class="bi bi-cart3"></i>
    {{ __('messagesmob.cart') }}
</a>

                @if(auth()->user()->isAdmin())
                   <a href="{{ route('admin.index') }}">
    <i class="bi bi-shield-lock"></i>
    {{ __('messagesmob.admin_panel') }}
</a>
                @endif

                <hr>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                   <button class="mobile-logout">
    <i class="bi bi-box-arrow-right"></i>
    {{ __('messagesmob.logout') }}
</button>
                </form>

            @else

                <hr>
<button class="mobile-auth"
        data-bs-toggle="modal"
        data-bs-target="#loginModal">
    {{ __('messagesmob.login') }}
</button>

<button class="mobile-auth secondary"
        data-bs-toggle="modal"
        data-bs-target="#registerModal">
    {{ __('messagesmob.register') }}
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

    // Кнопки входа и регистрации
    const authButtons = mobileMenu.querySelectorAll(
        '[data-bs-target="#loginModal"], [data-bs-target="#registerModal"]'
    );

    authButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Закрываем мобильное меню
            offcanvasInstance.hide();
        });
    });

    // Убираем фокус ДО того, как Bootstrap добавит aria-hidden
    document.addEventListener('hide.bs.modal', function (event) {

        const modal = event.target;

        if (modal.contains(document.activeElement)) {
            document.activeElement.blur();
        }

    });

});
</script>