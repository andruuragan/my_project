@extends('layouts.main')
@section('title', __('contacts.title'))

@section('description', __('contacts.description'))
@section('content')

    <div class="container-1600 py-5">
         {{-- Навігаційні крихти (Breadcrumbs) --}}
                
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0">

        <li class="breadcrumb-item">
            <a href="{{ route('main.index') }}"
               class="text-decoration-none text-black-50 hover-orange">
                {{ __('contacts.breadcrumb_home') }}
            </a>
        </li>

        <li class="breadcrumb-item active text-black" aria-current="page">
            <span style="color: #f97316; font-weight: 500;">
                {{ __('contacts.breadcrumb_title') }}
            </span>
        </li>

    </ol>
</nav>
    {{-- Заголовок --}}
   <div class="text-center mb-5">
    <h1 class="fw-bold display-5">
        {{ __('contacts.page_title') }}
    </h1>

    <div class="mx-auto bg-warning rounded mt-3"
         style="width:80px;height:5px;"></div>
</div>
    {{-- Основний рядок: Інформація та Форма --}}
    <div class="row g-5">
        {{-- Блок 1: Наша інформація --}}
<div class="col-lg-5">
    <div class="card border-0 shadow-sm p-4 h-100">

        <h3 class="mb-4 fw-bold">
            {{ __('contacts.information_title') }}
        </h3>

        @foreach(__('contacts.contacts') as $item)

            <div class="d-flex align-items-start mb-4">

                <div class="bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center me-3"
                     style="width:45px;height:45px;flex-shrink:0;">
                    <i class="bi bi-{{ $item['icon'] }} fs-5"></i>
                </div>

                <div>

                    <div class="text-muted small text-uppercase fw-bold">
                        {{ $item['title'] }}
                    </div>

                    @if(isset($item['href']))

                        @if($item['href'] === 'url')

                            <a href="{{ url('/') }}"
                               class="text-dark fw-bold text-decoration-none">
                                {{ $item['text'] }}
                            </a>

                        @else

                            <a href="{{ $item['href'] }}"
                               class="text-dark fw-bold text-decoration-none">
                                {{ $item['text'] }}
                            </a>

                        @endif

                    @else

                        <span class="fw-bold d-block">
                            {!! $item['text'] !!}
                        </span>

                    @endif

                </div>

            </div>

        @endforeach

    </div>
</div>

        {{-- Блок 2: Форма --}}
<div class="col-lg-7">
    <div id="contactForm1"
         class="card border-0 shadow-sm p-4 p-lg-5 h-100 contact-form-card">

        <h3 class="mb-4 fw-bold">
            {{ __('contacts.form_title') }}
        </h3>

        <p class="text-muted mb-4">
            {{ __('contacts.form_description') }}
        </p>

        <form action="{{ route('contact.send') }}" method="POST">
            @csrf

            <div class="form-floating mb-3">
                <input type="text"
                       name="name"
                       id="name"
                       class="form-control"
                       placeholder="{{ __('contacts.form_name_placeholder') }}"
                       autocomplete="name"
                       required>

                <label for="name">
                    {{ __('contacts.form_name_label') }}
                </label>
            </div>

            <div class="form-floating mb-3">
                <input type="email"
                       name="email"
                       id="email"
                       class="form-control"
                       placeholder="{{ __('contacts.form_email_placeholder') }}"
                       autocomplete="email"
                       required>

                <label for="email">
                    {{ __('contacts.form_email_label') }}
                </label>
            </div>

            <div class="form-floating mb-3">
                <input type="tel"
                       name="phone"
                       id="phone"
                       class="form-control phone-mask"
                       placeholder="{{ __('contacts.form_phone_placeholder') }}"
                       autocomplete="tel"
                       required>

                <label for="phone">
                    {{ __('contacts.form_phone_label') }}
                </label>
            </div>

            <div class="form-floating mb-4">
                <textarea name="message"
                          class="form-control"
                          id="message"
                          style="height: 120px"
                          placeholder="{{ __('contacts.form_message_placeholder') }}"></textarea>

                <label for="message">
                    {{ __('contacts.form_message_label') }}
                </label>
            </div>

            <button type="submit"
                    class="btn btn-warning btn-lg w-100 fw-bold py-3 btn-shadow-hover">
                {{ __('contacts.form_submit') }}
            </button>

        </form>
    </div>
</div>
    </div>

 {{-- Блок 3: FAQ --}}
<div class="mt-5">
    <div class="card border-0 shadow-sm p-4">

        <h4 class="fw-bold mb-3">
            {{ __('contacts.faq_title') }}
        </h4>

        <div class="accordion" id="faqAccordion">

            @foreach(__('contacts.faq') as $index => $item)

                <div class="accordion-item border-0 border-bottom">

                    <h2 class="accordion-header">

                        <button
                            class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }} fw-bold shadow-none"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq{{ $index }}">

                            {{ $item['q'] }}

                        </button>

                    </h2>

                    <div
                        id="faq{{ $index }}"
                        class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                        data-bs-parent="#faqAccordion">

                        <div class="accordion-body text-muted">
                            {{ $item['a'] }}
                        </div>

                    </div>

                </div>

            @endforeach

        </div>
    </div>
</div>

  {{-- Блок 4: Про DymSystems --}}
<div class="mt-4">
    <div class="card border-0 shadow-sm p-4">

        <h4 class="h5 fw-bold mb-3">
            {{ __('contacts.about_title') }}
        </h4>

        <p class="text-muted fw-bold">
            {{ __('contacts.about_lead') }}
        </p>

        <p class="text-muted">
            {{ __('contacts.about_text_1') }}
        </p>

        <p class="text-muted">
            {{ __('contacts.about_text_2') }}
        </p>

        <p class="text-muted mb-0">
            {{ __('contacts.about_text_3') }}
        </p>

        <div class="mt-4 text-center">
            <a href="#contactForm1"
               class="btn btn-warning btn-lg rounded-pill px-4">
                <i class="bi bi-send me-2"></i>
                {{ __('contacts.about_button') }}
            </a>
        </div>

    </div>
</div>
</div>
<style>
    /* Додайте це у ваш main.css */
.btn-shadow-hover {
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.btn-shadow-hover:hover {
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    transform: translateY(-2px); /* кнопка трохи "підстрибує" */
}
.contact-form-card{
    max-width:720px;
    margin-inline:auto;
}
.hover-orange {
    transition: color .2s ease;
}

.hover-orange:hover {
    color: #f97316 !important;
}
#contactForm1{
    scroll-margin-top: 120px; /* подберите значение под высоту navbar */
}
</style>
@endsection

@push('schema-contact')
<script type="application/ld+json">
{!! json_encode([
  '@' . 'context' => 'https://schema.org',
  '@type' => 'ContactPage',

    'name' => 'Контакти DymSystems',
    'url' => url()->current(),

    'mainEntity' => [
        '@type' => 'Organization',
        '@id' => url('/') . '#organization',

        'name' => 'DymSystems',
        'url' => url('/'),

        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Харків',
            'streetAddress' => 'вул. Прикладна, 1',
            'addressCountry' => 'UA'
        ],

        'telephone' => '+380121234567',
        'email' => 'dymsystems@ukr.net',

        'contactPoint' => [
            '@type' => 'ContactPoint',
            'telephone' => '+380121234567',
            'email' => 'dymsystems@ukr.net',
            'contactType' => 'customer support',
            'availableLanguage' => ['uk', 'ru']
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