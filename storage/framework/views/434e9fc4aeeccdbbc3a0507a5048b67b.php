<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="google" content="notranslate">
    <meta name="google-site-verification" content="N942Zh6nwZN18JZqda_Okf7Uu2pqBrRgBR6mPBAYcuk" />

    
    <title><?php echo $__env->yieldContent('title', 'DymSystems — Виробництво димоходів з нержавіючої сталі'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'Виготовлення та продаж димоходів з нержавіючої сталі. Сендвіч-димоходи, труби, комплектуючі, обичайки та фасонні елементи власного виробництва.'); ?>">
    <meta name="keywords" content="димоходи, димоходи з нержавіючої сталі, сендвіч димоходи, труби для димоходу, комплектуючі для димоходів, виробництво димоходів, AISI 304, AISI 321, AISI 430">
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">

    
    <meta property="og:title" content="<?php echo $__env->yieldContent('title', 'DymSystems — Виробництво димоходів'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('description', 'Виробництво та продаж димоходів і комплектуючих з нержавіючої сталі.'); ?>">
    <meta property="og:image" content="<?php echo e(asset('images/og-image.jpg')); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">

    
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
    
    
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
   <script defer src="https://unpkg.com/imask"></script>
<script defer src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
   <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WM93Q7JJ');</script>
<!-- End Google Tag Manager -->
<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

<link rel="stylesheet" href="<?php echo e(asset('css/mainpage-styles.css')); ?>">
<link
    rel="preload"
    as="image"
    href="<?php echo e(asset('images/chimney/headbanner.webp')); ?>"
    fetchpriority="high">
   <?php if(request()->routeIs('chimney.installation-rules')): ?>

<?php endif; ?>
<link rel="stylesheet" href="<?php echo e(asset('css/custom-styles.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/mobile-navbar.css')); ?>">
    
   <?php echo $__env->yieldPushContent('styles'); ?>
   
 <?php echo $__env->yieldPushContent('schema-FAQ'); ?>
   <?php echo $__env->yieldPushContent('schema-itemlist'); ?>
<?php echo $__env->yieldPushContent('schema-product'); ?>
<?php echo $__env->yieldPushContent('schema-json-ld'); ?>
<?php echo $__env->yieldPushContent('schema-webpage'); ?>
<?php echo $__env->yieldPushContent('schema-contact'); ?>
<?php echo $__env->yieldPushContent('schema-about'); ?>
<?php echo $__env->yieldPushContent('schema-breadcrumbs'); ?>
<?php echo $__env->yieldPushContent('schema-useful'); ?>
<?php echo $__env->yieldPushContent('schema-useful-item1'); ?>
<?php echo $__env->yieldPushContent('schema-useful-item2'); ?>
<?php echo $__env->yieldPushContent('schema-useful-item3'); ?>
<?php echo $__env->yieldPushContent('schema-article'); ?>



<script type="application/ld+json">
<?php echo json_encode([
  '<?php $__contextArgs = [];
if (context()->has($__contextArgs[0])) :
if (isset($value)) { $__contextPrevious[] = $value; }
$value = context()->get($__contextArgs[0]); ?>' => 'https://schema.org',
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
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>

</script>

<script type="application/ld+json">
<?php echo json_encode([
    '<?php $__contextArgs = [];
if (context()->has($__contextArgs[0])) :
if (isset($value)) { $__contextPrevious[] = $value; }
$value = context()->get($__contextArgs[0]); ?>' => 'https://schema.org',
    '@type' => 'WebSite',
    '@id' => url('/') . '#website',

    'url' => url('/'),
    'name' => 'DymSystems',

    'publisher' => [
        '@id' => url('/') . '#organization',
    ],

    'inLanguage' => 'uk-UA',

    'potentialAction' => [
        '@type' => 'SearchAction',
        'target' => url('/dymohody-ta-komplektuyuchi') . '?name={search_term_string}',
        'query-input' => 'required name=search_term_string',
    ],

], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>

</script>

</head>

<body class="site-body">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WM93Q7JJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


    <?php echo $__env->make('components.mobile-navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="page-wrapper">
        <?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    

    
    <?php if(session('error_alert')): ?>
        <div class="container mt-3">
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?php echo e(session('error_alert')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>

    
    <?php if(session('success')): ?>
        <div class="custom-alert success-alert">
            <i class="bi bi-check-circle-fill"></i>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="custom-alert error-alert">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <main class="page-content">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

 <?php echo $__env->make('partials.auth-modals', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 



    <script
        src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"
        >
    </script>


<?php if(isset($errors) && $errors->hasBag('register') && $errors->register->any()): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const registerModal = new bootstrap.Modal(document.getElementById('registerModal'));
            registerModal.show();
        });
    </script>
<?php endif; ?>

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
</html><?php /**PATH /var/www/my_project/resources/views/layouts/main.blade.php ENDPATH**/ ?>