<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google" content="notranslate">
    <meta name="description"
      content="Виготовлення та продаж димоходів з нержавіючої сталі. Сендвіч-димоходи, труби, комплектуючі, обичайки та фасонні елементи власного виробництва.">

<meta name="keywords"
      content="димоходи, димоходи з нержавіючої сталі, сендвіч димоходи, труби для димоходу, комплектуючі для димоходів, виробництво димоходів, AISI 304, AISI 321, AISI 430">
    <meta property="og:title" content="DymSystems — Димоходи з нержавіючої сталі">
<meta property="og:description" content="Виробництво та продаж димоходів і комплектуючих з нержавіючої сталі.">
<meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
    <title>DymSystems — Виробництво димоходів з нержавіючої сталі</title>

    

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">

    <script>
        window.MathJax = {
            tex: {
                inlineMath: [['$', '$'], ['\\(', '\\)']],
                displayMath: [['$$', '$$'], ['\\[', '\\]']],
                processEscapes: true
            },
            options: {
                skipHtmlTags: ['script', 'noscript', 'style', 'textarea', 'pre', 'code']
            }
        };
    </script>
    <script src="https://unpkg.com/imask"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="{{ asset('css/custom-styles.css') }}">
<link rel="stylesheet" href="{{ asset('css/mainpage-styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
    <link rel="stylesheet" href="{{ asset('css/mobile-navbar.css') }}">
    
   @stack('styles')
</head>

<body class="site-body">

{{-- Выносим мобильный хедер за пределы page-wrapper --}}
    @include('components.mobile-navbar')

    <div class="page-wrapper">
        @include('partials.navbar')

    
    

    {{-- Повідомлення про помилку доступу (403) --}}
    @if(session('error_alert'))
        <div class="container mt-3">
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error_alert') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    {{-- Стандартні повідомлення каталогу --}}
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

<div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Реєстрація</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="registerForm" method="POST" action="{{ route('register') }}" autocomplete="off">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    @if ($errors->register->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->register->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="register_name">Ім’я</label>
                        <input id="register_name" name="name" type="text" class="form-control" autocomplete="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="register_email">Email</label>
                        <input id="register_email" name="email" type="email" class="form-control" autocomplete="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="register_phone">Телефон</label>
                        <input id="register_phone" name="phone" type="tel" class="form-control"  placeholder="+38 (___) ___-__-__"  autocomplete="tel" inputmode="numeric" pattern="[0-9+() -]+" maxlength="20">
                    </div>

                    <div class="mb-3">
                        <label for="register_password">Пароль</label>
                        <input id="register_password" type="password" name="password" class="form-control" autocomplete="new-password" required>
                    </div>

                    <div class="mb-3">
                        <label for="register_password_confirmation">Підтвердження пароля</label>
                        <input id="register_password_confirmation" type="password" name="password_confirmation" class="form-control" autocomplete="new-password" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-warning">Зареєструватись</button>
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
            const registerModal = new bootstrap.Modal(document.getElementById('registerModal'));
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
                const alertBox = registerModalEl.querySelector('.alert-danger');
                if (alertBox) alertBox.remove();
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

        // ===== УМНЫЙ И БЕЗОПАСНЫЙ CKEDITOR =====
        document.querySelectorAll('.rich-text').forEach((el) => {
            if (el.classList.contains('ck-editor-init')) return;
            ClassicEditor
                .create(el)
                .then(editor => {
                    el.classList.add('ck-editor-init');
                    
                    // Работаем с accessibility напрямую через созданный инстанс
                    const editorWrapper = editor.ui.view.element;
                    if (editorWrapper) {
                        const voiceLabel = editorWrapper.querySelector('.ck-voice-label');
                        const editable = editorWrapper.querySelector('.ck-editor__editable');
                        
                        if (voiceLabel && editable) {
                            if (!editable.hasAttribute('aria-label')) {
                                editable.setAttribute('aria-label', voiceLabel.textContent);
                            }
                            // Скрываем лейбл стилями, чтобы НЕ ломать DOM и JS самого CKEditor
                            voiceLabel.style.display = 'none';
                        }
                    }
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
                const isBottom = scrollY + windowHeight >= fullHeight - 5;
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

    // ===== УПРАВЛІННЯ УВЕДОМЛЕННЯМИ =====
    function hideAlerts() {
        document.querySelectorAll('.custom-alert').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(-10px)';
            setTimeout(() => {
                if (el) el.remove();
            }, 300);
        });
    }
    setTimeout(hideAlerts, 4500);

    // Захист від кнопки "Назад" в браузере (уничтожаем bfcache)
    window.addEventListener('pageshow', function (event) {
        const performanceEntries = performance.getEntriesByType('navigation');
        const isBackForward = performanceEntries.length > 0 && performanceEntries[0].type === 'back_forward';

        if (event.persisted || isBackForward) {
            window.location.reload();
        }
    });
    document.getElementById('registerForm').addEventListener('submit', function (e) {
    const mask = window.regPhoneMaskInstance;
    
    // Перевірка: якщо маска ініціалізована і не заповнена до кінця
    if (mask && !mask.masked.isComplete) {
        e.preventDefault(); // Зупиняємо відправку
        alert('Будь ласка, введіть повний номер телефону (у форматі +38 (0XX) XXX-XX-XX).');
        return false;
    }
});

</script>

</body>
</html>