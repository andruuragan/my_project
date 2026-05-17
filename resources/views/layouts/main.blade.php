<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

<body class="site-body">

<div class="page-wrapper">

<!-- CONTENT -->


@include('partials.navbar')
@if(session('success'))

    <div class="custom-alert success-alert">

        <i class="bi bi-check-circle-fill"></i>

        {{ session('success') }}

    </div>

@endif

@if(session('error'))

    <div class="custom-alert error-alert">

        <i class="bi bi-exclamation-triangle-fill"></i>

        {{ session('error') }}

    </div>

@endif
<main class="page-content">
    @yield('content')
</main>

@include('partials.footer')
</div>
<!-- REGISTER MODAL -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Реєстрація</h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <form id="registerForm"
                  method="POST"
                  action="{{ route('register') }}"
                  autocomplete="off">

                @csrf

                <div class="modal-body">

                    {{-- ERRORS --}}
                    @if ($errors->register->any())
                        <div class="alert alert-danger">

                            <ul class="mb-0 ps-3">
                                @foreach ($errors->register->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>
                    @endif

                    {{-- NAME --}}
                    <div class="mb-3">
                        <label for="register_name">Ім’я</label>

                        <input id="register_name"
                               name="name"
                               type="text"
                               class="form-control"
                               autocomplete="off"
                               required>
                    </div>

                    {{-- EMAIL --}}
                    <div class="mb-3">
                        <label for="register_email">Email</label>

                        <input id="register_email"
                               name="email"
                               type="email"
                               class="form-control"
                               autocomplete="off"
                               required>
                    </div>

                    {{-- PHONE --}}
                    <div class="mb-3">
                        <label for="register_phone">Телефон</label>

                        <input id="register_phone"
                               name="phone"
                               type="tel"
                               class="form-control"
                               autocomplete="off"
                               inputmode="numeric"
                               pattern="[0-9+() -]+"
                               maxlength="20">
                    </div>

                    {{-- PASSWORD --}}
                    <div class="mb-3">
                        <label for="register_password">Пароль</label>

                        <input id="register_password"
                               type="password"
                               name="password"
                               class="form-control"
                               autocomplete="new-password"
                               required>
                    </div>

                    {{-- PASSWORD CONFIRM --}}
                    <div class="mb-3">
                        <label for="register_password_confirmation">
                            Підтвердження пароля
                        </label>

                        <input id="register_password_confirmation"
                               type="password"
                               name="password_confirmation"
                               class="form-control"
                               autocomplete="new-password"
                               required>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                        Закрити
                    </button>

                    <button type="submit"
                            class="btn btn-warning">

                        Зареєструватись
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

@if ($errors->register->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const registerModal = new bootstrap.Modal(
                document.getElementById('registerModal')
            );

            registerModal.show();

        });
    </script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {

        // ===== REGISTER MODAL RESET =====
        const registerModalEl = document.getElementById('registerModal');

        if (registerModalEl) {

            registerModalEl.addEventListener('hidden.bs.modal', function () {

                // очищаем alert ошибки
                const alertBox = registerModalEl.querySelector('.alert-danger');

                if (alertBox) {
                    alertBox.remove();
                }

                // очищаем пароли
                document.getElementById('register_password').value = '';
                document.getElementById('register_password_confirmation').value = '';

            });

        }
        const phone = document.getElementById('register_phone');

        if (phone) {
            phone.addEventListener('input', function () {
                this.value = this.value.replace(/[^0-9+() -]/g, '');
            });
        }

        // ===== CKEDITOR =====
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

        // ===== SCROLL BUTTONS =====
        const upBtn = document.querySelector('.scroll-top');
        const downBtn = document.querySelector('.scroll-down');

        window.addEventListener('scroll', function () {

            const scrollY = window.scrollY;
            const windowHeight = window.innerHeight;
            const fullHeight = document.documentElement.scrollHeight;

            if (upBtn) {
                upBtn.classList.toggle('show', scrollY > 200);
            }

            if (downBtn) {

                const isBottom =
                    scrollY + windowHeight >= fullHeight - 5;

                downBtn.classList.toggle('hide', isBottom);

            }

        });

        // ===== DELETE MODALS =====
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

        // ===== CHOICES =====
        document.querySelectorAll('.js-choice').forEach(function (el) {

            new Choices(el, {
                searchEnabled: true,
                shouldSort: false,
                itemSelectText: '',
            });

        });

    });

    setTimeout(() => {

        document.querySelectorAll('.custom-alert')
            .forEach(el => {

                el.style.opacity = '0';
                el.style.transform = 'translateY(-10px)';

                setTimeout(() => {
                    if (el) {
                        el.remove();
                    }
                }, 300);

            });

    }, 4500);
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof refreshCart === 'function') {
            refreshCart();
        }
    });
</script>
</body>

</html>

