<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Catalog</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
    <style>
        .btn-icon {
            transition: all 0.2s ease;
        }

        .btn-icon:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        /* трохи чистоти зверху */
        body {
            margin: 0;
        }



        .logo {
            height: 100px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container" style="max-width: 1600px;">

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
        <div class="collapse navbar-collapse show" id="navbarNav" style="margin-left: 80px;">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('main.index') ? 'active' : '' }}"
                       href="{{ route('main.index') }}">
                        Main
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('shop.index') ? 'active' : '' }}"
                       href="{{ route('shop.index') }}">
                        Димоходи та комплектуючі
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about.index') ? 'active' : '' }}"
                       href="{{ route('about.index') }}">
                        About
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contacts.index') ? 'active' : '' }}"
                       href="{{ route('contacts.index') }}">
                        Contacts
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}"
                       href="{{ route('admin.index') }}">
                        Admin
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('catalog.index') ? 'active' : '' }}"
                       href="{{ route('catalog.index') }}">
                        Catalog
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('descriptions.index') ? 'active' : '' }}"
                       href="{{ route('descriptions.index') }}">
                        Опис елементів
                    </a>
                </li>

            </ul>
        </div>

        <!-- CONTACT BLOCK -->
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
</nav>

<!-- CONTENT -->
<div class="container" style="max-width: 1600px;">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('.rich-text').forEach((el) => {

            if (el.classList.contains('ck-editor-init')) return;

            ClassicEditor
                .create(el)
                .then(editor => {
                    el.classList.add('ck-editor-init');
                })
                .catch(error => {
                    console.error(error);
                });
        });

        // ================= scroll buttons =================
        const upBtn = document.querySelector('.scroll-top');
        const downBtn = document.querySelector('.scroll-down');

        window.addEventListener('scroll', function () {

            const scrollY = window.scrollY;
            const windowHeight = window.innerHeight;
            const fullHeight = document.documentElement.scrollHeight;

            // ===== UP BUTTON =====
            if (upBtn) {
                upBtn.classList.toggle('show', scrollY > 200);
            }

            // ===== DOWN BUTTON =====
            if (downBtn) {
                const isBottom = scrollY + windowHeight >= fullHeight - 5;

                downBtn.classList.toggle('hide', isBottom);
            }
        });

        // ================= delete modal =================
        const setupDeleteModal = (modalId, formId, urlPattern) => {
            const modalEl = document.getElementById(modalId);
            if (!modalEl) return;

            modalEl.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const id = button?.getAttribute('data-id');
                const form = document.getElementById(formId);

                if (form && id) {
                    form.action = urlPattern.replace(':id', id);
                }
            });
        };

        setupDeleteModal('deleteModal', 'deleteForm', '/catalog/:id');
        setupDeleteModal('deleteImageModal', 'deleteImageForm', '/catalog/:id/image');

        // ================= choices =================
        document.querySelectorAll('.js-choice').forEach(function (el) {
            new Choices(el, {
                searchEnabled: true,
                shouldSort: false,
                itemSelectText: '',
            });
        });

    });
</script>
</body>
<footer class="site-footer">

    <div class="container" style="max-width: 1600px;">

        <div class="row gy-2">

            <!-- CONTACTS -->
            <div class="col-lg-4">
                <h5 class="footer-title">Контакти</h5>

                <div class="footer-item">
                    <i class="bi bi-telephone"></i>
                    +38 (099) 123-45-67
                </div>

                <div class="footer-item">
                    <i class="bi bi-envelope"></i>
                    info@gmail.com
                </div>

                <div class="footer-item">
                    <i class="bi bi-geo-alt"></i>
                    м. Харків, Україна
                </div>

                <div class="footer-item">
                    <i class="bi bi-clock"></i>
                    Пн–Пт: 09:00–18:00
                </div>
            </div>

            <!-- INFO -->
            <div class="col-lg-4">
                <h5 class="footer-title">Інформація</h5>

                <ul class="footer-links">
                    <li><a href="#">Про компанію</a></li>
                    <li><a href="#">Доставка і оплата</a></li>
                    <li><a href="#">Гарантія</a></li>
                    <li><a href="#">Контакти</a></li>
                </ul>
            </div>

            <!-- ACCOUNT -->
            <div class="col-lg-4">
                <h5 class="footer-title">Мій кабінет</h5>

                <ul class="footer-links">
                    <li><a href="#">Особистий кабінет</a></li>
                    <li><a href="#">Історія замовлень</a></li>
                    <li><a href="#">Обране</a></li>
                    <li><a href="#">Кошик</a></li>
                </ul>
            </div>

        </div>

        <!-- BOTTOM -->
        <div class="footer-bottom">
            © 2026 DymSystems. Всі права захищені.
        </div>

    </div>

</footer>
</html>

