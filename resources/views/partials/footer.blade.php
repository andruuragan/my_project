
<footer class="site-footer">

    <div class="container-1600">

        {{-- TOP --}}
        <div class="footer-top">

            {{-- LOGO --}}
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
                    {{ __('footer.description') }}
                </p>

            </div>


            {{-- CONTACTS --}}
            <div class="footer-col">

                <div class="footer-title">
                    {{ __('footer.contacts') }}
                </div>

                <address class="footer-contact-info">

                    <div class="footer-item">
                        <i class="bi bi-geo-alt"></i>
                        <span>{{ __('footer.location') }}</span>
                    </div>

                    <div class="footer-item">
                        <i class="bi bi-telephone"></i>
                        <a href="tel:+380123456789" class="text-white">
                            +380 12 345 67 89
                        </a>
                    </div>

                    <div class="footer-item">
                        <i class="bi bi-envelope"></i>
                        <a href="mailto:dymsystems@ukr.net" class="text-white">
                            dymsystems@ukr.net
                        </a>
                    </div>

                </address>

            </div>


            {{-- LINKS --}}
            <div class="footer-col">

                <div class="footer-title">
                    {{ __('footer.navigation') }}
                </div>

                <ul class="footer-links">

                    <li>
                        <a href="{{ route('main.index') }}">
                            {{ __('footer.home') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('shop.index') }}">
                            {{ __('footer.catalog') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('categories.index') }}">
                            {{ __('footer.categories') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('about.index') }}">
                            {{ __('footer.about') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contacts.index') }}">
                            {{ __('footer.contacts_link') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('useful.index') }}">
                            {{ __('footer.useful_info') }}
                        </a>
                    </li>

                </ul>

            </div>


            {{-- ACCOUNT --}}
            <div class="footer-col">

                <div class="footer-title">
                    {{ __('footer.account') }}
                </div>

                <ul class="footer-links">

                    <li>

                        @auth

                            <a href="{{ route('dashboard') }}">
                                <i class="bi bi-person-circle"></i>
                                {{ __('footer.personal_account') }}
                            </a>

                        @else

                            <button
                                type="button"
                                class="footer-link-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#loginModal">

                                <i class="bi bi-person-circle"></i>
                                {{ __('footer.personal_account') }}

                            </button>

                        @endauth

                    </li>

                    <li>
                        <a href="{{ route('profile.orders') }}">
                            <i class="bi bi-box-seam"></i>
                            {{ __('footer.order_history') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('cart.index') }}">
                            <i class="bi bi-basket2"></i>
                            {{ __('footer.cart') }}
                        </a>
                    </li>

                </ul>

            </div>


            {{-- CTA --}}
            <div class="footer-col footer-cta mt-4 pt-3 border-top border-md-0 pt-md-2 mt-md-2">

                <a href="{{ route('shop.index') }}" class="footer-shop-btn">

                    <i class="bi bi-cart3"></i>

                    {{ __('footer.go_to_shop') }}

                </a>

            </div>

        </div>


        {{-- BOTTOM --}}
        <div class="footer-bottom">
            {{ __('footer.copyright') }}
        </div>

    </div>

</footer>


