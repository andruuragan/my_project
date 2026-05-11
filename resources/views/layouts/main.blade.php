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

        .navbar {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .logo {
            height: 100px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">

    <div class="container" style="max-width: 1600px;">

        <!-- LOGO -->
        <div class="d-flex flex-column" style="gap: 6px;">
            <a href="{{ route('main.index') }}">
                <img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo">
            </a>

            <div style="
    display: inline-block;
    padding: 6px 14px;
    margin-left: 0px;

    background:
        linear-gradient(
            180deg,
            #5b616b 0%,
            #3b4149 45%,
            #242a31 100%
        );

    border: 1px solid #7a8088;
    border-radius: 9px;

    box-shadow:
        inset 0 1px 2px rgba(255,255,255,0.18),
        inset 0 -1px 2px rgba(0,0,0,0.55),
        0 1px 4px rgba(0,0,0,0.30);

    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2px;
    text-transform: uppercase;

    color: #ff8c00;

    text-shadow:
        0 0 4px rgba(255,140,0,0.25),
        0 1px 1px rgba(0,0,0,0.75);

    font-family: Arial, sans-serif;
">
                Центр комплектування димоходів
            </div>
        </div>



        <!-- TOGGLER (важливо для мобілки) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="navbarNav" style="margin-left: 80px;">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('main.index') ? 'active fw-bold' : '' }}"
                       href="{{ route('main.index') }}">
                        Main
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('shop.index') ? 'active fw-bold' : '' }}"
                       href="{{ route('shop.index') }}">
                        Димарі та комплектуючі
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about.index') ? 'active fw-bold' : '' }}"
                       href="{{ route('about.index') }}">
                        About
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contacts.index') ? 'active fw-bold' : '' }}"
                       href="{{ route('contacts.index') }}">
                        Contacts
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.index') ? 'active fw-bold' : '' }}"
                       href="{{ route('admin.index') }}">
                        Admin
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('catalog.index') ? 'active fw-bold' : '' }}"
                       href="{{ route('catalog.index') }}">
                        Catalog
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('descriptions.index') ? 'active fw-bold' : '' }}"
                       href="{{ route('descriptions.index') }}">
                        Descriptions
                    </a>
                </li>



            </ul>

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
            if (upBtn) {
                upBtn.classList.toggle('show', window.scrollY > 200);
            }

            if (downBtn) {
                const isBottom = window.innerHeight + window.scrollY >= document.body.offsetHeight - 10;
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

</html>

