@extends('layouts.main')

@section('content')

{{-- 1. Hero Секція --}}
<section class="container-1600 my-5">
    <div class="hero-production p-4 p-md-5 shadow-lg"
         style="background: linear-gradient(90deg, rgba(15, 23, 42, 0.9) 0%, rgba(15, 23, 42, 0.4) 60%, rgba(15, 23, 42, 0.1) 100%), url('{{ asset('images/chimney/headbanner.webp') }}') center/cover no-repeat;">

        <div class="row w-100 align-items-center">

            <div class="col-lg-7">

                <span class="badge production-badge px-3 py-2 rounded-pill mb-3">
                    <i class="bi bi-shield-check text-warning me-1"></i>
                    {{ __('home.hero_badge') }}
                </span>

                <h1 class="display-3 fw-bold mb-4">
                    {{ __('home.hero_title') }}<br>
                    <span class="text-warning">
                        {{ __('home.hero_title_accent') }}
                    </span>
                </h1>

                <p class="fs-5 text-white-50 mb-4">
                    {{ __('home.hero_description') }}
                </p>

                <div class="d-flex gap-3">

                    <a href="{{ route('shop.index') }}"
                       class="btn btn-warning btn-lg fw-bold px-4">
                        {{ __('home.hero_buy') }}
                    </a>

                    <a href="{{ route('useful.index') }}"
                       class="btn btn-outline-light btn-lg px-4">
                        {{ __('home.hero_useful') }}
                    </a>

                </div>

            </div>

            <div class="col-lg-5">

                <div class="hero-stats-overlay">

                    <div class="stat-item">
                        ✓ {{ __('home.hero_own_production') }}
                    </div>

                    <div class="stat-item">
                        ✓ {{ __('home.hero_steel') }}
                    </div>

                    <div class="stat-item">
                        ✓ {{ __('home.hero_warranty') }}
                    </div>

                    <div class="stat-item">
                        ✓ {{ __('home.hero_delivery') }}
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

<section class="container-1600 py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold display-6 mb-3">
            {{ __('home.technical_solutions') }}
        </h2>

        <div class="mx-auto bg-warning" style="width: 60px; height: 3px;"></div>
    </div>

    <div class="row g-4">

        @foreach([
            [
                'cat' => 'single',
                'img' => 'single-wall-banner1.webp',
            ],
            [
                'cat' => 'sandwich',
                'img' => 'sandwich-banner.webp',
            ],
            [
                'cat' => 'fittings',
                'img' => 'fittings-banner.webp',
            ],
            [
                'cat' => 'oval-chimney',
                'img' => 'oval-banner.webp',
            ]
        ] as $item)

            <div class="col-12 col-md-6">

                <div class="card h-100 border-0 shadow-sm custom-product-card solution-card">

                    <a href="{{
                        $item['cat'] === 'single'
                            ? route('single-wall-system')
                            : ($item['cat'] === 'sandwich'
                                ? route('sandwich-system')
                                : ($item['cat'] === 'oval-chimney'
                                    ? route('oval-chimney-system')
                                    : ($item['cat'] === 'fittings'
                                        ? route('fittings-system')
                                        : route('shop.index', ['category' => $item['cat']]))
                            ))
                    }}"
                    class="img-container">

                        <img src="{{ asset('images/chimney/' . $item['img']) }}"
                             width="500"
                             height="500"
                             alt="{{ __('home.solutions.' . $item['cat'] . '.title') }}"
                             class="product-img"
                             loading="lazy"
                             decoding="async">

                    </a>

                    <div class="card-body p-4 text-center">

                        @if(isset(__('home.solutions.' . $item['cat'])['badge']))
                            <span class="badge bg-warning text-dark mb-3 px-3 py-2">
                                {{ __('home.solutions.' . $item['cat'] . '.badge') }}
                            </span>
                        @endif

                        <h3 class="h4 fw-bold mb-3">
                            {{ __('home.solutions.' . $item['cat'] . '.title') }}
                        </h3>

                        <p class="text-muted mb-4">
                            {{ __('home.solutions.' . $item['cat'] . '.desc') }}
                        </p>

                        <a href="{{
                            $item['cat'] === 'single'
                                ? route('single-wall-system')
                                : ($item['cat'] === 'sandwich'
                                    ? route('sandwich-system')
                                    : ($item['cat'] === 'oval-chimney'
                                        ? route('oval-chimney-system')
                                        : ($item['cat'] === 'fittings'
                                            ? route('fittings-system')
                                            : route('shop.index', ['category' => $item['cat']]))
                                ))
                        }}"
                        class="btn btn-outline-dark rounded-pill px-4">

                            {{ __('home.choose_system') }}

                            <i class="bi bi-arrow-right-circle ms-2"></i>

                        </a>

                    </div>
                </div>
            </div>

        @endforeach

    </div>
</section>

<section class="container-1600 py-5">
    <div class="text-center mb-5">

        <h2 class="fw-bold display-6 mb-3">
            {{ __('home.production_technologies.title') }}
        </h2>

        <div class="mx-auto bg-warning" style="width: 60px; height: 3px;"></div>

        <p class="text-muted mt-3">
            {{ __('home.production_technologies.subtitle') }}
        </p>

    </div>

    <div class="row g-4">

        @foreach([
            ['img' => 'tech-cutting.webp', 'key' => 'cutting'],
            ['img' => 'tech-rolling.webp', 'key' => 'rolling'],
            ['img' => 'tech-welding.webp', 'key' => 'welding'],
            ['img' => 'tech-welding-orbital.webp', 'key' => 'orbital_welding'],
            ['img' => 'tech-bending.webp', 'key' => 'bending'],
            ['img' => 'tech-expansion.webp', 'key' => 'expansion'],
            ['img' => 'tech-3d-cutting.webp', 'key' => '3d_cutting'],
            ['img' => 'tech-quality.webp', 'key' => 'quality'],
        ] as $item)

            <div class="col-lg-3 col-md-6">

                <div class="card border-0 shadow-sm h-100 technology-card">

                    <img src="{{ asset('images/chimney/' . $item['img']) }}"
                         width="1200"
                         height="800"
                         class="card-img-top"
                         alt="{{ __('home.production_technologies.items.' . $item['key'] . '.alt') }}"
                         loading="lazy"
                         decoding="async">

                    <div class="card-body text-center p-4">

                        <h3 class="h5 fw-bold mb-3">
                            {{ __('home.production_technologies.items.' . $item['key'] . '.title') }}
                        </h3>

                        <p class="text-muted mb-0">
                            {{ __('home.production_technologies.items.' . $item['key'] . '.desc') }}
                        </p>

                    </div>

                </div>

            </div>

        @endforeach

    </div>
</section>

<section class="container-1600 py-5">
    <div class="cta-block">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <h2 class="fw-bold mb-3">
                    {{ __('home.configurator.title') }}
                </h2>

                <p class="mb-0 cta-text">
                    {{ __('home.configurator.description') }}
                </p>

                <div class="d-flex flex-wrap gap-3 small fw-semibold text-success mt-3">

                    <span>
                        <i class="bi bi-check-circle-fill me-1"></i>
                        {{ __('home.configurator.free') }}
                    </span>

                    <span>
                        <i class="bi bi-check-circle-fill me-1"></i>
                        {{ __('home.configurator.time') }}
                    </span>

                    <span>
                        <i class="bi bi-check-circle-fill me-1"></i>
                        {{ __('home.configurator.no_registration') }}
                    </span>

                    <span>
                        <i class="bi bi-check-circle-fill me-1"></i>
                        {{ __('home.configurator.parameters') }}
                    </span>

                </div>

            </div>

            <div class="col-lg-4 text-center text-lg-end mt-4 mt-lg-0">

                <a href="{{ route('categories.index') }}#configurator1"
                   class="btn btn-warning btn-lg fw-bold px-4">

                    <i class="bi bi-arrow-right-circle me-2"></i>
                    {{ __('home.configurator.button') }}

                </a>

            </div>

        </div>

    </div>
</section>

<section class="container-1600 py-5 section-gray">
    <div class="trust-block text-center">

        <h2 class="fw-bold mb-5">
            {{ __('home.trust.title') }}
        </h2>

        <div class="row g-4">

            <div class="col-md-3 col-6">
                <div class="trust-item">

                    <div class="trust-number counter" data-target="12">
                        12+
                    </div>

                    <div class="trust-label">
                        {{ __('home.trust.experience') }}
                    </div>

                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="trust-item">

                    <div class="trust-number counter" data-target="5000">
                        5000+
                    </div>

                    <div class="trust-label">
                        {{ __('home.trust.orders') }}
                    </div>

                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="trust-item">

                    <div class="trust-number counter" data-target="1000">
                        1000+
                    </div>

                    <div class="trust-label">
                        {{ __('home.trust.objects') }}
                    </div>

                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="trust-item">

                    <div class="trust-number counter" data-target="98">
                        98%
                    </div>

                    <div class="trust-label">
                        {{ __('home.trust.satisfied') }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

{{-- 3. Блок швидких посилань (Замість великих карток) --}}
<section class="container-1600 py-5">
    <div class="row g-4 align-items-center">

        <div class="col-md-6">

            <h2 class="fw-bold border-start border-4 border-primary ps-3 lh-sm">
                {{ __('home.help_choice.title') }}
            </h2>

            <p class="text-muted mt-3">
                {{ __('home.help_choice.description') }}
            </p>

        </div>

        <div class="col-md-6 text-md-end">

            <a href="{{ route('useful.index') }}"
               class="btn btn-dark btn-lg px-5 py-3 fw-semibold">

                {{ __('home.help_choice.button') }}

                <i class="bi bi-arrow-right-circle ms-2"></i>

            </a>

        </div>

    </div>
</section>

<section class="container-1600 py-5">
    <div class="seo-content">

        <h2 class="fw-bold mb-4">
            {{ __('home.seo.title') }}
        </h2>

        <p>
            {{ __('home.seo.paragraph_1') }}
        </p>

        <p>
            {{ __('home.seo.paragraph_2') }}
        </p>

        <p>
            {{ __('home.seo.paragraph_3') }}
        </p>

        <p>
            {{ __('home.seo.paragraph_4') }}
        </p>

    </div>
</section>

<section class="container-1600 py-5">
    <div class="cta-block">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <h2 class="fw-bold mb-3">
                    {{ __('home.calculation.title') }}
                </h2>

                <p class="mb-0 cta-text">
                    {{ __('home.calculation.description') }}
                </p>

            </div>

            <div class="col-lg-4 text-center text-lg-end mt-4 mt-lg-0">

                <a href="{{ route('chimney.installation-rules') }}#form"
                   class="btn btn-warning btn-lg fw-bold px-4">

                    <i class="bi bi-telephone-fill me-2"></i>
                    {{ __('home.calculation.button') }}

                </a>

            </div>

        </div>

    </div>
</section>

<section class="container-1600 py-5">

    <div class="text-center mb-5">

        <h2 class="fw-bold display-6 mb-3">
            {{ __('home.projects.title') }}
        </h2>

        <div class="mx-auto bg-warning" style="width: 60px; height: 3px;"></div>

        <p class="text-muted mt-3">
            {{ __('home.projects.subtitle') }}
        </p>

    </div>

    <div class="row g-4">

        @foreach([
            ['img' => 'house-project.webp', 'key' => 'house'],
            ['img' => 'commercial-project.webp', 'key' => 'commercial'],
            ['img' => 'industrial-project.webp', 'key' => 'industrial'],
        ] as $item)

        <div class="col-lg-4">

            <div class="card h-100 border-0 shadow-sm custom-product-card project-card overflow-hidden">

                <div class="img-container">

                    <img src="{{ asset('images/chimney/' . $item['img']) }}"
                         width="600"
                         height="400"
                         alt="{{ __('home.projects.items.' . $item['key'] . '.title') }}"
                         class="product-img">

                </div>

                <div class="card-body p-4">

                    <h3 class="h5 fw-bold mb-3 text-center">
                        {{ __('home.projects.items.' . $item['key'] . '.title') }}
                    </h3>

                    <p class="text-muted small mb-3">
                        {{ __('home.projects.items.' . $item['key'] . '.text') }}
                    </p>

                    <div class="case-meta border-top pt-3 mt-2">

                        @foreach(__('home.projects.items.' . $item['key'] . '.meta') as $m)

                            <div class="small text-dark mb-1">
                                <i class="bi bi-check2-circle text-warning me-2"></i>
                                {{ $m }}
                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</section>

<section class="py-5">
    <div class="container">

        <div class="text-center mb-4">

            <h2 class="fw-bold">
                {{ __('home.articles.title') }}
            </h2>

            <p class="text-muted mx-auto" style="max-width: 760px;">
                {{ __('home.articles.subtitle') }}
            </p>

        </div>

        <div class="row g-4">

            {{-- Статья о марках стали --}}
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow rounded-4">
                    <div class="card-body">

                        <div style="height:220px; overflow:hidden;">
                           <img src="{{ asset('images/chimney/' . (app()->getLocale() === 'ru' ? 'grade1ru.webp' : 'grade1.webp')) }}"
     alt="{{ __('home.articles.steel.alt') }}"
     class="w-100 h-100"
     style="object-fit:cover;">
                        </div>

                        <h3 class="h5 fw-bold mt-3">
                            {{ __('home.articles.steel.title') }}
                        </h3>

                        <p class="text-muted small mb-4">
                            {{ __('home.articles.steel.description') }}
                        </p>

                        <a href="{{ route('blog.steel-grades') }}"
                           class="btn btn-outline-orange mt-4">
                            {{ __('home.articles.read') }}
                        </a>

                    </div>
                </div>
            </div>

            {{-- Статья о саже --}}
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow rounded-4">
                    <div class="card-body">

                        <div style="height:220px; overflow:hidden;">
                            <img src="{{ asset('images/chimney/soot.webp') }}"
                                 alt="{{ __('home.articles.soot.alt') }}"
                                 class="w-100 h-100"
                                 style="object-fit:cover;">
                        </div>

                        <h3 class="h5 fw-bold mt-3">
                            {{ __('home.articles.soot.title') }}
                        </h3>

                        <p class="text-muted small mb-4">
                            {{ __('home.articles.soot.description') }}
                        </p>

                        <a href="{{ route('blog.soot') }}"
                           class="btn btn-outline-orange">
                            {{ __('home.articles.read') }}
                        </a>

                    </div>
                </div>
            </div>

            {{-- Статья о базальтовой вате --}}
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow rounded-4">
                    <div class="card-body">

                        <div style="height:220px; overflow:hidden;">
                            <img src="{{ asset('images/chimney/basalt.webp') }}"
                                 alt="{{ __('home.articles.basalt.alt') }}"
                                 class="w-100 h-100"
                                 style="object-fit:cover;">
                        </div>

                        <h3 class="h5 fw-bold mt-3">
                            {{ __('home.articles.basalt.title') }}
                        </h3>

                        <p class="text-muted small mb-4">
                            {{ __('home.articles.basalt.description') }}
                        </p>

                        <a href="{{ route('blog.basalt-wool') }}"
                           class="btn btn-outline-orange mt-4">
                            {{ __('home.articles.read') }}
                        </a>

                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<section class="container-1600 py-5">

    <div class="text-center mb-5">

        <h2 class="fw-bold display-6 mb-3">
            {{ __('home.faq.title') }}
        </h2>

        <div class="mx-auto bg-warning" style="width: 60px; height: 3px;"></div>

    </div>

    <div class="accordion" id="faqAccordion">

        @foreach(__('home.faq.items') as $index => $item)

            <div class="accordion-item">

                <h3 class="accordion-header">

                    <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }} fw-bold"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq{{ $index + 1 }}">

                        {{ $item['question'] }}

                    </button>

                </h3>

                <div id="faq{{ $index + 1 }}"
                     class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                     data-bs-parent="#faqAccordion">

                    <div class="accordion-body">
                        {{ $item['answer'] }}
                    </div>

                </div>

            </div>

        @endforeach

    </div>

</section>
{{-- 4. Переваги (Короткий блок для довіри) --}}

<section class="py-5 border-top bg-white">
    <div class="container-1600">

        <div class="text-center mb-5">
            <h2 class="fw-bold">{{ __('home.why_choose') }}</h2>
            <p class="text-muted">
                {{ __('home.own_production_stainless') }}
            </p>
        </div>

        <div class="row g-4 text-center">

            <div class="col-lg-2 col-md-4 col-6">
                <i class="bi bi-shield-check fs-1 text-warning"></i>
                <h3 class="mt-3 fw-bold fs-6">{{ __('home.aisi') }}</h3>
                <small class="text-muted">
                    {{ __('home.corrosion_resistance') }}
                </small>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <i class="bi bi-gear-wide-connected fs-1 text-warning"></i>
                <h3 class="mt-3 fw-bold fs-6">{{ __('home.own_production') }}</h3>
                <small class="text-muted">
                    {{ __('home.quality_control') }}
                </small>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <i class="bi bi-calendar-check fs-1 text-warning"></i>
                <h3 class="mt-3 fw-bold fs-6">{{ __('home.experience') }}</h3>
                <small class="text-muted">
                    {{ __('home.production_installation_experience') }}
                </small>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <i class="bi bi-award fs-1 text-warning"></i>
                <h3 class="mt-3 fw-bold fs-6">{{ __('home.quality_guarantee') }}</h3>
                <small class="text-muted">
                    {{ __('home.technical_requirements') }}
                </small>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <i class="bi bi-truck fs-1 text-warning"></i>
                <h3 class="mt-3 fw-bold fs-6">{{ __('home.fast_delivery') }}</h3>
                <small class="text-muted">
                    {{ __('home.delivery_ukraine') }}
                </small>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <i class="bi bi-person-workspace fs-1 text-warning"></i>
                <h3 class="mt-3 fw-bold fs-6">{{ __('home.engineer_consultation') }}</h3>
                <small class="text-muted">
                    {{ __('home.system_calculation_help') }}
                </small>
            </div>

        </div>

    </div>
</section>

<script>
   
document.addEventListener('DOMContentLoaded', function () {
    const params = new URLSearchParams(window.location.search);

    if (params.get('modal') === 'login') {
        const loginModal = document.getElementById('loginModal');

        if (loginModal) {
            new bootstrap.Modal(loginModal).show();
        }
    }

    if (params.get('modal') === 'register') {
        const registerModal = document.getElementById('registerModal');

        if (registerModal) {
            new bootstrap.Modal(registerModal).show();
        }
    }
     const counters = document.querySelectorAll('.counter');

    const observer = new IntersectionObserver((entries) => {

        entries.forEach(entry => {

            if (!entry.isIntersecting) return;

            const counter = entry.target;
            const target = Number(counter.dataset.target);

            let start = 0;
            const duration = 1800;
            const startTime = performance.now();

            const suffix = counter.textContent.includes('%')
                ? '%'
                : counter.textContent.includes('+')
                    ? '+'
                    : '';

            function update(currentTime) {

                const progress = Math.min((currentTime - startTime) / duration, 1);

                const value = Math.floor(progress * target);

                counter.textContent = value + suffix;

                if (progress < 1) {
                    requestAnimationFrame(update);
                } else {
                    counter.textContent = target + suffix;
                }
            }

            requestAnimationFrame(update);

            observer.unobserve(counter);

        });

    }, {
        threshold: 0.5
    });

    counters.forEach(counter => observer.observe(counter));
});
</script>
@endsection

@push('schema-json-ld')
<script type="application/ld+json">
{!! json_encode([
    '@' . 'context' => 'https://schema.org',
    '@type' => 'WebSite',
    '@id' => url('/') . '#website',
    'url' => url('/'),
    'name' => 'DymSystems',
    'inLanguage' => 'uk-UA',
    'potentialAction' => [
        '@type' => 'SearchAction',
        'target' => url('/shop') . '?search={search_term_string}',
        'query-input' => 'required name=search_term_string'
    ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush
@push('schema-breadcrumbs')
<script type="application/ld+json">
{!! json_encode([
  '@' . 'context' => 'https://schema.org',
  '@type' => 'BreadcrumbList',
  'itemListElement' => [
    [
      '@type' => 'ListItem',
      'position' => 1,
      'name' => 'Головна',
      'item' => url('/')
    ]
  ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush
@push('schema-FAQ')
<script type="application/ld+json">
{!! json_encode([
    '@' . 'context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        [
            '@type' => 'Question',
            'name' => 'Яку нержавіючу сталь краще обрати для димоходу?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Для більшості побутових систем використовуються марки AISI 201, AISI 304 та AISI 321. Вони стійкі до корозії, конденсату та високих температур.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Який діаметр димоходу потрібен для котла?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Діаметр підбирається відповідно до потужності обладнання та рекомендацій виробника котла. Неправильний підбір може погіршити тягу.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Чим відрізняється сендвіч-димохід від одностінного?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Сендвіч-система має шар теплоізоляції між двома трубами, що зменшує утворення конденсату та покращує стабільність тяги.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Яка товщина сталі оптимальна для димоходу?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Найчастіше використовується сталь товщиною від 0,5 до 1 мм. Вибір залежить від типу палива та температурного режиму роботи.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Чи можна встановлювати димохід зовні будинку?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Так, для зовнішнього монтажу рекомендується використовувати утеплені сендвіч-димоходи, які забезпечують стабільну тягу в холодну пору року.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Як часто потрібно чистити димохід?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Рекомендується проводити профілактичний огляд та очищення не рідше одного разу на рік або частіше при інтенсивній експлуатації.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Чи виготовляєте ви димоходи за індивідуальними розмірами?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Так, ми виготовляємо нестандартні елементи та димохідні системи відповідно до технічного завдання замовника.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Яка гарантія на продукцію?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Термін гарантії залежить від типу виробу та марки сталі. Детальну інформацію можна отримати під час консультації.'
            ]
        ]
    ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush
@push('schema-webpage')
<script type="application/ld+json">
{!! json_encode([
    '@' . 'context' => 'https://schema.org',
    '@type' => 'WebPage',

    '@id' => url()->current() . '#webpage',
    'url' => url()->current(),

    'name' => trim($__env->yieldContent('title')),
    'description' => trim($__env->yieldContent('description')),

    'inLanguage' => 'uk-UA',

    'isPartOf' => [
        '@type' => 'WebSite',
        '@id' => url('/') . '#website',
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush