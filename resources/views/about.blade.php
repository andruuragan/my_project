@extends('layouts.main')
@section('title', __('about.title'))

@section('description', __('about.description'))
@section('content')
<div class="container-1600">
    {{-- Hero Section --}}
    <section class="about-hero py-5 bg-light">
         {{-- Навігаційні крихти (Breadcrumbs) --}}
                
     <nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0">

        <li class="breadcrumb-item">
            <a href="{{ route('main.index') }}"
               class="text-decoration-none text-black-50 hover-orange">
                {{ __('about.breadcrumb_home') }}
            </a>
        </li>

        <li class="breadcrumb-item active text-black" aria-current="page">
            <span style="color: #f97316; font-weight: 500;">
                {{ __('about.breadcrumb_title') }}
            </span>
        </li>

    </ol>
</nav>
        <div class="row align-items-center g-5">
            
          <div class="col-lg-6">

    <h1 class="display-4 fw-bold mb-4">
        {{ __('about.company_title') }}
    </h1>

    <p class="lead text-muted">
        {{ __('about.company_lead') }}
    </p>

    <p>
        {{ __('about.company_text') }}
    </p>

    <a href="{{ route('shop.index') }}"
       class="btn btn-dark btn-lg rounded-pill px-4">
        {{ __('about.company_catalog_button') }}
    </a>

</div>
            <div class="col-lg-6">
    <img src="{{ asset('images/about/hero.webp') }}"
         width="1600"
         height="535"
         class="img-fluid rounded-4 shadow"
         alt="DymSystems"
         loading="lazy">
</div>
        </div>
    </section>

  {{-- About Us Section --}}
<section class="py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">
            {{ __('about.who_we_are_title') }}
        </h2>

        <div class="mx-auto bg-warning" style="width:60px; height:3px;"></div>
    </div>

    <div class="row g-5 align-items-center">

        <div class="col-lg-6">
            <img src="{{ asset('images/about/company2.webp') }}"
                 width="1600"
                 height="500"
                 class="img-fluid rounded-4 shadow-sm"
                 alt="{{ __('about.who_we_are_image_alt') }}"
                 loading="lazy"
                 decoding="async">
        </div>

        <div class="col-lg-6">

            <p>
                {!! __('about.who_we_are_text_1') !!}
            </p>

            <p>
                {{ __('about.who_we_are_text_2') }}
            </p>

        </div>

    </div>
</section>

   {{-- Advantages Section --}}
<section class="py-5 bg-light">
    <div class="text-center mb-5">
        <h2 class="fw-bold">
            {{ __('about.advantages_title') }}
        </h2>

        <div class="mx-auto bg-warning" style="width:60px; height:3px;"></div>
    </div>

    <div class="row g-4">

        @foreach(__('about.advantages') as $item)
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm text-center p-4">

                    <h5 class="fw-bold">
                        {{ $item['title'] }}
                    </h5>

                    <p class="text-muted mb-0">
                        {{ $item['text'] }}
                    </p>

                </div>
            </div>
        @endforeach

    </div>
</section>

   {{-- Stats Section --}}
<section class="py-5">
    <div class="row text-center g-4">

        @foreach(__('about.stats') as $stat)

            <div class="col-6 col-lg-3">

                <h2 class="fw-bold text-warning counter"
                    data-target="{{ $stat['value'] }}">
                    {{ $stat['value'] }}{{ $stat['suffix'] }}
                </h2>

                <p>{{ $stat['label'] }}</p>

            </div>

        @endforeach

    </div>
</section>

 {{-- Production Gallery --}}
    <section class="py-5">
        <div class="text-center mb-5">
         <h2 class="fw-bold">{{ __('about.production_title') }}</h2>
            <div class="mx-auto bg-warning" style="width:60px; height:3px;"></div>
        </div>
        <div class="row g-4">
            @for($i = 1; $i <= 6; $i++)
                <div class="col-md-4 gallery-item">
                    <img src="{{ asset('images/about/production'.$i.'.webp') }}"
                         width="1200"
         height="799"
         class="img-fluid rounded-4 shadow-sm"
         alt="Виробництво"
         loading="lazy"
         decoding="async">
                         
                </div>
            @endfor
        </div>
    </section>

    

 {{-- Workflow Section --}}
<section class="py-5 bg-light">
    <div class="text-center mb-5">

        <h2 class="fw-bold">
            {{ __('about.workflow_title') }}
        </h2>

        <div class="mx-auto bg-warning" style="width:60px; height:3px;"></div>
    </div>

    <div class="row text-center g-4">

        @foreach(__('about.workflow_steps') as $key => $step)

            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-4 h-100 workfup-card">

                    <div class="mb-3 text-warning fs-1">
                        <i class="bi {{ $step['icon'] }}"></i>
                    </div>

                    <h3 class="fw-bold text-warning mb-2">
                        {{ $key + 1 }}
                    </h3>

                    <p class="fw-bold mb-0">
                        {{ $step['title'] }}
                    </p>

                </div>
            </div>

        @endforeach

    </div>
</section>


<section class="py-5 bg-light">
    <div class="container-1600">

        <div class="text-center mb-5">
            <h2 class="fw-bold">
                {{ __('about.values_title') }}
            </h2>

            <div class="mx-auto bg-warning" style="width:60px; height:3px;"></div>
        </div>

        <div class="row g-4">

            @foreach(__('about.values') as $item)
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm p-4 h-100 value-card text-center">

                        <div class="value-icon mb-3 text-warning">
                            <i class="bi {{ $item['icon'] }}"></i>
                        </div>

                        <h5 class="fw-bold mb-3">
                            {{ $item['title'] }}
                        </h5>

                        <p class="text-muted mb-0">
                            {{ $item['text'] }}
                        </p>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

<section class="py-5">
    <div class="container-1600">

        <div class="text-center mb-5">
            <h2 class="fw-bold">
                {{ __('about.technical_standards_title') }}
            </h2>

            <div class="mx-auto bg-warning" style="width:60px; height:3px;"></div>
        </div>

        <div class="row g-4 text-center">

            @foreach(__('about.technical_standards') as $item)
                <div class="col-lg-4">
                    <div class="p-4 border rounded shadow-sm h-100">

                        <h5 class="fw-bold">
                            {{ $item['title'] }}
                        </h5>

                        <p class="text-muted">
                            {{ $item['text'] }}
                        </p>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>


<section class="py-5 bg-light">
    <div class="container-1600">

        <div class="text-center mb-5">
            <h2 class="fw-bold">
                {{ __('about.faq_title') }}
            </h2>

            <div class="mx-auto bg-warning" style="width:60px; height:3px;"></div>
        </div>

        <div class="accordion" id="aboutFaq">

            @foreach(__('about.faq') as $key => $item)

                @php
                    $faqId = 'q' . ($key + 1);
                @endphp

                <div class="accordion-item">

                    <h2 class="accordion-header">
                        <button
                            class="accordion-button {{ $key !== 0 ? 'collapsed' : '' }}"
                            data-bs-toggle="collapse"
                            data-bs-target="#{{ $faqId }}">
                            {{ $item['question'] }}
                        </button>
                    </h2>

                    <div
                        id="{{ $faqId }}"
                        class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}"
                        data-bs-parent="#aboutFaq">

                        <div class="accordion-body">
                            {{ $item['answer'] }}
                        </div>

                    </div>

                </div>

            @endforeach

        </div>
    </div>
</section>

   

   {{-- CTA Section --}}
<section class="py-5 bg-dark text-white text-center rounded-4 mb-5">

    <h2 class="fw-bold mb-4">
        {{ __('about.cta_title') }}
    </h2>

    <p class="lead mb-4">
        {{ __('about.cta_text') }}
    </p>

    <button
        type="button"
        class="btn btn-warning px-4 fw-bold shadow"
        data-bs-toggle="modal"
        data-bs-target="#consultationModal">
        {{ __('about.cta_button') }}
    </button>

</section>


</div>
<div class="modal fade" id="consultationModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Консультація</h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

                <form action="{{ route('leads.store') }}"
                      method="POST"
                      class="needs-validation"
                      novalidate>

                    @csrf

                    <input type="hidden"
                           name="device_type"
                           value="Консультація (модалка)">

                    <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Ваше ім'я" autocomplete="name" required>

                   <input 
    type="tel" 
    name="phone" 
    id="phone" 
    class="form-control mb-3" 
    placeholder="+38 (___) ___-__-__" 
    autocomplete="tel" 
    required>

                    <button
                        type="submit"
                        class="btn btn-warning w-100">
                        Відправити
                    </button>

                </form>

            </div>
        </div>
    </div>
</div>
<style>
   .hover-orange {
    transition: color .2s ease;
}

.hover-orange:hover {
    color: #f97316 !important;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', () => {

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
        : counter.textContent.includes('/7')
            ? '/7'
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
@push('schema-about')
<script type="application/ld+json">
{!! json_encode([
    '@' . 'context' => 'https://schema.org',
    '@type' => 'AboutPage',
    '@id' => url()->current() . '#about',
    'url' => url()->current(),
    'name' => 'Про компанію DymSystems',
    'description' => trim($__env->yieldContent('description')),
    'inLanguage' => 'uk-UA',

    'mainEntity' => [
        '@type' => 'Organization',
        '@id' => url('/') . '#organization',
        'name' => 'DymSystems',
        'url' => url('/'),
        'logo' => asset('images/logo.webp'),
        'description' => 'Виробництво та продаж димоходів з нержавіючої сталі'
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

@push('schema-breadcrumb')
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
        ],
        [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => 'Про нас',
            'item' => url()->current()
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
            'name' => 'Чи виготовляєте ви нестандартні елементи?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Так, ми маємо власне виробництво і можемо виготовити перехідники, короби або коліна за вашими індивідуальними кресленнями.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Яку гарантію ви надаєте?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Завдяки використанню стійкої нержавіючої сталі, термін експлуатації наших систем становить понад 10 років за умови правильного монтажу.'
            ]
        ]
    ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush