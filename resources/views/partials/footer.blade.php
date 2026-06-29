<footer class="site-footer">
    <div class="container-1600">

        <!-- TOP -->
        <div class="footer-top">

            <!-- LOGO -->
            <div class="footer-col footer-brand">
                <div class="footer-logo">
                    <img src="{{ asset('images/favicon.png') }}"
     width="48"
     height="38"
     style="width:38px;"
     alt="logo_favicon"
     loading="lazy"
     decoding="async">
                     <strong>DymSystems</strong>
                </div>
                <p class="footer-text">
                    Сучасний інтернет-магазин комплектації димарів.
                </p>
            </div>

          <!-- CONTACTS -->
<div class="footer-col">
    <div class="footer-title">Контакти</div>
    <address class="footer-contact-info">
        <div class="footer-item">
            <i class="bi bi-geo-alt"></i>
            <span>Харків, Україна</span>
        </div>
        <div class="footer-item">
            <i class="bi bi-telephone"></i>
            <a href="tel:+380XXXXXXXXX" class="text-white">+380 12 345 67 89</a>
        </div>
        <div class="footer-item">
            <i class="bi bi-envelope"></i>
            <a href="mailto:dymsystems@ukr.net" class="text-white">dymsystems@ukr.net</a>
        </div>
        <div class="footer-item">
            <i class="bi bi-envelope"></i>
            <a href="mailto:dymsystems.shop@gmail.com" class="text-white">dymsystems.shop@gmail.com</a>
        </div>
    </address>
</div>
            <!-- LINKS -->
            <div class="footer-col">
                <div class="footer-title">Навігація</div>

                <ul class="footer-links">
                    <li><a href="{{route ('main.index')}}">Головна</a></li>
                    <li><a href="{{route ('shop.index') }}">Каталог</a></li>
                    <li><a href="{{route ('contacts.index') }}">Контакти</a></li>
                </ul>
            </div>

            <!-- ACCOUNT -->
            <div class="footer-col">
                <div class="footer-title">Мій кабінет</div>

                <ul class="footer-links">
                    <li>

                        @auth
                            <a href="{{ route('dashboard') }}">
                                <i class="bi bi-person-circle"></i>
                                Особистий кабінет
                            </a>
                        @else
                        <button
    type="button"
    class="footer-link-btn"
    data-bs-toggle="modal"
    data-bs-target="#loginModal">
    <i class="bi bi-person-circle"></i>
    Особистий кабінет
</button>
                           

                               
                        @endauth

                    </li>
                    <li><a href="{{ route('profile.orders') }}"><i class="bi bi-box-seam"></i> Історія замовлень</a></li>
                    <li><a href="{{ route('cart.index') }}"> <i class="bi bi-basket2"></i>
                            Кошик</a></li>
                </ul>
            </div>

            <!-- CTA -->
           <div class="footer-col footer-cta mt-4 pt-3 border-top border-md-0 pt-md-2 mt-md-2">
    <a href="{{route ('shop.index') }}" class="footer-shop-btn">
        <i class="bi bi-cart3"></i>
        Перейти в магазин
    </a>
</div>

        </div>

        <!-- BOTTOM -->
        <div class="footer-bottom">
            © 2026 DymSystems. Всі права захищені.
        </div>

    </div>
</footer>
