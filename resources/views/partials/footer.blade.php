<footer class="site-footer">
    <div class="container-1600">

        <!-- TOP -->
        <div class="footer-top">

            <!-- LOGO -->
            <div class="footer-col footer-brand">
                <div class="footer-logo">
                    <img src="{{ asset('images/favicon.png') }}" style="width:38px;" alt="">
                    <span>DymSystems</span>
                </div>
                <p class="footer-text">
                    Сучасний інтернет-магазин комплектації димарів.
                </p>
            </div>

            <!-- CONTACTS -->
            <div class="footer-col">
                <h5 class="footer-title">Контакти</h5>

                <div class="footer-item">
                    <i class="bi bi-geo-alt"></i>
                    <span> Україна м. Харків </span>
                </div>

                <div class="footer-item">
                    <i class="bi bi-telephone"></i>
                    <span>+380 XX XXX XX XX</span>
                </div>

                <div class="footer-item">
                    <i class="bi bi-envelope"></i>
                    <span>dymsystems@ukr.net</span>
                </div>
            </div>

            <!-- LINKS -->
            <div class="footer-col">
                <h5 class="footer-title">Навігація</h5>

                <ul class="footer-links">
                    <li><a href="{{route ('main.index')}}">Головна</a></li>
                    <li><a href="{{route ('shop.index') }}">Каталог</a></li>
                    <li><a href="{{route ('contacts.index') }}">Контакти</a></li>
                </ul>
            </div>

            <!-- ACCOUNT -->
            <div class="footer-col">
                <h5 class="footer-title">Мій кабінет</h5>

                <ul class="footer-links">
                    <li>

                        @auth
                            <a href="{{ route('dashboard') }}">
                                <i class="bi bi-person-circle"></i>
                                Особистий кабінет
                            </a>
                        @else
                            <a href="#"
                               data-bs-toggle="modal"
                               data-bs-target="#loginModal">

                                Особистий кабінет
                            </a>
                        @endauth

                    </li>
                    <li><a href="{{ route('profile.orders') }}"><i class="bi bi-box-seam"></i> Історія замовлень</a></li>
                    <li><a href="{{ route('cart.index') }}"> <i class="bi bi-basket2"></i>
                            Кошик</a></li>
                </ul>
            </div>

            <!-- CTA -->
            <div class="footer-col footer-cta">
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
