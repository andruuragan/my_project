<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google" content="notranslate">

    {{-- Заголовок та мета-описи (динамічні) --}}
    <title>@yield('title', 'DymSystems — Виробництво димоходів з нержавіючої сталі')</title>
    <meta name="description" content="@yield('description', 'Виготовлення та продаж димоходів з нержавіючої сталі. Сендвіч-димоходи, труби, комплектуючі, обичайки та фасонні елементи власного виробництва.')">
    <meta name="keywords" content="димоходи, димоходи з нержавіючої сталі, сендвіч димоходи, труби для димоходу, комплектуючі для димоходів, виробництво димоходів, AISI 304, AISI 321, AISI 430">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph (для соцмереж) --}}
    <meta property="og:title" content="@yield('title', 'DymSystems — Виробництво димоходів')">
    <meta property="og:description" content="@yield('description', 'Виробництво та продаж димоходів і комплектуючих з нержавіючої сталі.')">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    {{-- Шрифти --}}
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
   
 @stack('schema-FAQ')
   @stack('schema-itemlist')
@stack('schema-product')
@stack('schema-json-ld')
@stack('schema-contact')
@stack('schema-about')
@stack('schema-breadcrumbs')
@stack('schema-useful')
@stack('schema-useful-item1')
@stack('schema-useful-item2')
@stack('schema-useful-item3')
@stack('schema-article')


{{-- SEO Schema Organization --}}
<script type="application/ld+json">
{!! json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'Organization',
  '@id' => 'https://www.dymsystems.pp.ua/#organization',

  'name' => 'DymSystems',
  'url' => 'https://www.dymsystems.pp.ua',
  'logo' => 'https://www.dymsystems.pp.ua/images/logo.png',

  'contactPoint' => [
    [
      '@type' => 'ContactPoint',
      'telephone' => '+380661089841',
      'contactType' => 'customer service',
      'areaServed' => 'UA',
      'availableLanguage' => 'Ukrainian',
    ]
  ],

  'email' => 'dymsystems@ukr.net',
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
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

 @include('partials.auth-modals') 

<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

@if (isset($errors) && $errors->hasBag('register') && $errors->register->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const registerModal = new bootstrap.Modal(document.getElementById('registerModal'));
            registerModal.show();
        });
    </script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // ===== REGISTER FORM VALIDATION =====
        const registerForm = document.getElementById('registerForm');
        if (registerForm) {
            registerForm.addEventListener('submit', function (e) {
                const mask = window.regPhoneMaskInstance;
                if (mask && !mask.masked.isComplete) {
                    e.preventDefault();
                    alert('Введіть повний номер телефону');
                }
            });
        }

        // ===== REGISTER MODAL RESET =====
        const registerModalEl = document.getElementById('registerModal');
        if (registerModalEl) {
            registerModalEl.addEventListener('hidden.bs.modal', function () {
                const alertBox = registerModalEl.querySelector('.alert-danger');
                if (alertBox) alertBox.remove();
                const pass1 = document.getElementById('register_password');
                const pass2 = document.getElementById('register_password_confirmation');
                if (pass1) pass1.value = '';
                if (pass2) pass2.value = '';
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
            ClassicEditor.create(el).then(editor => {
                el.classList.add('ck-editor-init');
            }).catch(error => console.error(error));
        });

        // ===== SCROLL BUTTONS =====
        const upBtn = document.querySelector('.scroll-top');
        const downBtn = document.querySelector('.scroll-down');
        window.addEventListener('scroll', function () {
            if (upBtn) upBtn.classList.toggle('show', window.scrollY > 200);
            if (downBtn) {
                const isBottom = window.scrollY + window.innerHeight >= document.documentElement.scrollHeight - 5;
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
                if (form && id) form.action = urlPattern.replace(':id', id);
            });
        };
        setupDeleteModal('deleteModal', 'deleteForm', '/catalog/:id');
        setupDeleteModal('deleteImageModal', 'deleteImageForm', '/catalog/:id/image');

        // ===== CHOICES =====
        document.querySelectorAll('.js-choice').forEach(function (el) {
            new Choices(el, { searchEnabled: true, shouldSort: false, itemSelectText: '' });
        });
    }); // Це закриття DOMContentLoaded

    // ===== ЗА МЕЖАМИ DOMContentLoaded =====
    function hideAlerts() {
        document.querySelectorAll('.custom-alert').forEach(el => {
            el.style.opacity = '0';
            setTimeout(() => { if (el) el.remove(); }, 300);
        });
    }
    setTimeout(hideAlerts, 4500);

    window.addEventListener('pageshow', function (event) {
        if (event.persisted || (performance.getEntriesByType('navigation')[0]?.type === 'back_forward')) {
            window.location.reload();
        }
    });
</script>


</body>
</html>