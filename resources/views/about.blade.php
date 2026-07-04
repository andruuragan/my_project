@extends('layouts.main')
@section('title', 'Про нас DymSystems - виробництво димоходів з нержавійки | DymSystems')
@section('description',
'Про нас | DymSystems - провідний виробник димоходів з нержавіючої сталі. Дізнайтеся історію компанії, наші технології та контроль якості продукції.')
@section('content')
<div class="container-1600">
    {{-- Hero Section --}}
    <section class="about-hero py-5 bg-light">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">
                    Про компанію "Центр Комплектації Димарів"
                </h1>
                <p class="lead text-muted">
                    Провідний виробник та постачальник димохідних систем в Україні.
                </p>
                <p>
                    Ми створюємо сучасні рішення для безпечного та ефективного
                    відведення продуктів згоряння, забезпечуючи комфорт та
                    надійність для наших клієнтів.
                </p>
                <a href="{{ route('shop.index') }}" class="btn btn-dark btn-lg rounded-pill px-4">
                    Перейти до каталогу
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
            <h2 class="fw-bold">Хто ми</h2>
            <div class="mx-auto bg-warning" style="width:60px; height:3px;"></div>
        </div>
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
    <img src="{{ asset('images/about/company2.webp') }}"
         width="1600"
         height="500"
         class="img-fluid rounded-4 shadow-sm"
         alt="Компанія"
         loading="lazy"
         decoding="async">
</div>
            <div class="col-lg-6">
                <p>Компанія <strong>"Центр Комплектації Димарів"</strong> заснована у 2012 році та спеціалізується на виробництві й постачанні систем модульних димоходів із нержавіючої сталі.</p>
                <p>Ми пропонуємо комплексні рішення для житлових, комерційних та промислових об'єктів, забезпечуючи високу якість продукції та професійну технічну підтримку.</p>
                
            </div>
        </div>
    </section>

    {{-- Advantages Section --}}
    <section class="py-5 bg-light">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Наші переваги</h2>
            <div class="mx-auto bg-warning" style="width:60px; height:3px;"></div>
        </div>
        <div class="row g-4">
            @php
                $advs = [
                    ['Власне виробництво', 'Контроль якості на кожному етапі.'],
                    ['Якісна сталь', 'Надійні матеріали для довговічної експлуатації.'],
                    ['Технічна підтримка', 'Допомагаємо підібрати оптимальне рішення.'],
                    ['Доставка по Україні', 'Швидке відправлення продукції.']
                ];
            @endphp
            @foreach($advs as $item)
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <h5 class="fw-bold">{{ $item[0] }}</h5>
                        <p class="text-muted mb-0">{{ $item[1] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-5">
        <div class="row text-center g-4">
            @foreach([['2012', 'Рік заснування'], ['100+', 'Найменувань продукції'], ['1000+', 'Виконаних замовлень'], ['24/7', 'Консультації клієнтів']] as $stat)
                <div class="col-6 col-lg-3">
                    <h2 class="fw-bold text-warning">{{ $stat[0] }}</h2>
                    <p>{{ $stat[1] }}</p>
                </div>
            @endforeach
        </div>
    </section>

   {{-- Workflow Section --}}
<section class="py-5 bg-light">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Як ми працюємо</h2>
        <div class="mx-auto bg-warning" style="width:60px; height:3px;"></div>
    </div>

    <div class="row text-center g-4">

        @php
            $steps = [
                ['icon' => 'bi-chat-dots', 'title' => 'Консультація'],
                ['icon' => 'bi-diagram-3', 'title' => 'Підбір комплектуючих'],
                ['icon' => 'bi-gear', 'title' => 'Виробництво'],
                ['icon' => 'bi-truck', 'title' => 'Доставка клієнту'],
            ];
        @endphp

        @foreach($steps as $key => $step)
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-4 h-100 workfup-card">

                    <div class="mb-3 text-warning fs-1">
                        <i class="bi {{ $step['icon'] }}"></i>
                    </div>

                    <h3 class="fw-bold text-warning mb-2">{{ $key + 1 }}</h3>
                    <p class="fw-bold mb-0">{{ $step['title'] }}</p>

                </div>
            </div>
        @endforeach

    </div>
</section>
<section class="py-5 bg-light">
    <div class="container-1600">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Наші цінності</h2>
            <div class="mx-auto bg-warning" style="width:60px; height:3px;"></div>
        </div>

        <div class="row g-4">

            @php
                $values = [
                    [
                        'icon' => 'bi-people',
                        'title' => 'Бездоганний досвід клієнта',
                        'text' => ' Якісний димохід — це той, який не створює проблем. Ми супроводжуємо клієнта на всіх етапах:
                        від підбору конфігурації до вирішення технічних питань після монтажу.'
                    ],
                    [
                        'icon' => 'bi-cpu',
                        'title' => 'Технологічне лідерство',
                        'text' => 'Використовуємо сучасне обладнання європейського рівня, що дозволяє забезпечувати стабільну якість
                        та виконання замовлень у визначені терміни.'
                    ],
                    [
                        'icon' => 'bi-check2-circle',
                        'title' => 'Контроль якості',
                        'text' => ' Кожен виріб проходить перевірку відповідності стандартам. Це гарантує надійність монтажу
                        та довговічність системи димоходу.'
                    ],
                    [
                        'icon' => 'bi-award',
                        'title' => 'Естетика та дизайн',
                        'text' => ' Ми створюємо не лише функціональні, а й візуально привабливі димоходи.
                        Використовуємо дзеркальну нержавіючу сталь і лазерне зварювання для ідеального вигляду.'
                    ],
                ];
            @endphp

            @foreach($values as $item)
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm p-4 h-100 value-card text-center">

                        <div class="value-icon mb-3 text-warning">
                            <i class="bi {{ $item['icon'] }}"></i>
                        </div>

                        <h5 class="fw-bold mb-3">{{ $item['title'] }}</h5>
                        <p class="text-muted mb-0">{{ $item['text'] }}</p>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

<section class="py-5">
    <div class="container-1600">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Наші технічні стандарти</h2>
            <div class="mx-auto bg-warning" style="width:60px; height:3px;"></div>
        </div>
        <div class="row g-4 text-center">
            <div class="col-lg-4">
                <div class="p-4 border rounded shadow-sm h-100">
                    <h5 class="fw-bold">Якісні матеріали</h5>
                    <p class="text-muted">Використовуємо сертифіковану нержавіючу сталь марок AISI 304 та AISI 321, що забезпечує стійкість до агресивного конденсату та високих температур.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 border rounded shadow-sm h-100">
                    <h5 class="fw-bold">Плазмове зварювання</h5>
                    <p class="text-muted">Застосовуємо технологію зварювання в середовищі інертних газів (TIG). Це гарантує ідеальну герметичність швів, що критично важливо для безпеки димоходу.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 border rounded shadow-sm h-100">
                    <h5 class="fw-bold">Відповідність ДСТУ</h5>
                    <p class="text-muted">Вся продукція DymSystems проходить суворий контроль якості та відповідає актуальним пожежним нормам і стандартам безпеки України.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container-1600">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Часті запитання</h2>
            <div class="mx-auto bg-warning" style="width:60px; height:3px;"></div>
        </div>
        <div class="accordion" id="aboutFaq">
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#q1">Чи виготовляєте ви нестандартні елементи?</button></h2>
                <div id="q1" class="accordion-collapse collapse show" data-bs-parent="#aboutFaq"><div class="accordion-body">Так, ми маємо власне виробництво і можемо виготовити перехідники, короби або коліна за вашими індивідуальними кресленнями.</div></div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#q2">Яку гарантію ви надаєте?</button></h2>
                <div id="q2" class="accordion-collapse collapse" data-bs-parent="#aboutFaq"><div class="accordion-body">Завдяки використанню стійкої нержавіючої сталі, термін експлуатації наших систем становить понад 10 років за умови правильного монтажу.</div></div>
            </div>
        </div>
    </div>
</section>

    {{-- Production Gallery --}}
    <section class="py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Наше виробництво</h2>
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

    {{-- CTA Section --}}
    <section class="py-5 bg-dark text-white text-center rounded-4 mb-5">
        <h2 class="fw-bold mb-4">Потрібна консультація?</h2>
        <p class="lead mb-4">Наші спеціалісти допоможуть підібрати оптимальну димохідну систему.</p>
        <button
    type="button"
    class="btn btn-warning px-4 fw-bold shadow"
    data-bs-toggle="modal"
    data-bs-target="#consultationModal">
    Отримати консультацію
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