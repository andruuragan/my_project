@extends('layouts.main')
@section('title', 'Контакти DymSystems: телефон, адреса, графік роботи | DymSystems')
@section('description',
    'Контакти DymSystems: телефони для замовлення димоходів, адреса, графік роботи та форма зворотного зв\'язку. Зв\'яжіться з нами!'
)
@section('content')

    <div class="container-1600 py-5">
    {{-- Заголовок --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold display-5">Контакти DymSystems: телефон, адреса, графік роботи</h1>
        <div class="mx-auto bg-warning rounded mt-3" style="width:80px;height:5px;"></div>
    </div>

    {{-- Основний рядок: Інформація та Форма --}}
    <div class="row g-5">
        {{-- Блок 1: Наша інформація --}}
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm p-4 h-100">
                <h3 class="mb-4 fw-bold">Наша інформація</h3>
                @php
                    $contacts = [
                        ['icon' => 'building-fill', 'title' => 'Компанія', 'text' => 'Центр Комплектації Димарів'],
                        ['icon' => 'geo-alt-fill', 'title' => 'Адреса', 'text' => 'м. Харків, вул. Прикладна, 1'],
                        ['icon' => 'telephone-fill', 'title' => 'Телефон', 'text' => '+38 (012) 123-45-67', 'href' => 'tel:+380121234567'],
                        ['icon' => 'globe2', 'title' => 'Сайт', 'text' => 'www.dymsystems.pp.ua', 'href' => url('/')],
                        ['icon' => 'envelope-fill', 'title' => 'Email', 'text' => 'dymsystems@ukr.net', 'href' => 'mailto:dymsystems@ukr.net'],
                        ['icon' => 'clock-fill', 'title' => 'Графік роботи', 'text' => 'Пн–Пт: 09:00–18:00<br>Сб–Нд: вихідний']
                    ];
                @endphp
                @foreach($contacts as $item)
                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center me-3" style="width:45px;height:45px;flex-shrink:0;">
                            <i class="bi bi-{{ $item['icon'] }} fs-5"></i>
                        </div>
                        <div>
                            <div class="text-muted small text-uppercase fw-bold">{{ $item['title'] }}</div>
                            @if(isset($item['href']))
                                <a href="{{ $item['href'] }}" class="text-dark fw-bold text-decoration-none">{{ $item['text'] }}</a>
                            @else
                                <span class="fw-bold d-block">{!! $item['text'] !!}</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Блок 2: Форма --}}
        <div class="col-lg-7">
           <div class="card border-0 shadow-sm p-4 p-lg-5 h-100 contact-form-card">
                <h3 class="mb-4 fw-bold">Зв'яжіться з нами</h3>
                <p class="text-muted mb-4">
    Заповніть форму, і наш менеджер зв'яжеться з вами найближчим робочим часом.
</p>
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Ваше ім'я" autocomplete="name" required>
                        <label for="name">Ваше ім'я</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" autocomplete="email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" name="phone" id="phone" class="form-control phone-mask" placeholder="+38 (___) ___-__-__" autocomplete="tel" required>
                        <label for="phone">Телефон</label>
                    </div>
                    <div class="form-floating mb-4">
                        <textarea name="message" class="form-control" id="message" style="height: 120px" placeholder="Ваше повідомлення"></textarea>
                        <label for="message">Ваше повідомлення</label>
                    </div>
                    <button type="submit" class="btn btn-warning btn-lg w-100 fw-bold py-3 btn-shadow-hover">Відправити повідомлення</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Блок 3: FAQ --}}
    <div class="mt-5">
        <div class="card border-0 shadow-sm p-4">
            <h4 class="fw-bold mb-3">Відповіді на найпоширеніші запитання наших клієнтів.</h4>
            <div class="accordion" id="faqAccordion">
                @foreach([['q' => 'Як швидко ви відповідаєте?', 'a' => 'Протягом робочого дня.'], ['q' => 'Чи допомагаєте з підбором?', 'a' => 'Так, повний розрахунок.'], ['q' => 'Доставка по Україні?', 'a' => 'Так, Новою Поштою.']] as $index => $item)
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header"><button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }} fw-bold shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $index }}">{{ $item['q'] }}</button></h2>
                        <div id="faq{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">{{ $item['a'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Блок 4: Про DymSystems --}}
    <div class="mt-4">
        <div class="card border-0 shadow-sm p-4">
            <h4 class="h5 fw-bold mb-3">Про DymSystems</h4>
            <p class="text-muted fw-bold">
            DymSystems — експертне виробництво димоходів в Україні з 2012 року.
        </p>
           <p class="text-muted">
            Ми спеціалізуємося на виготовленні та продажу димохідних систем із нержавіючої сталі 
            для приватних будинків, камінів, печей, твердопаливних, газових і пелетних котлів.
        </p>

        <p class="text-muted">
            Ми допомагаємо підібрати діаметр димоходу, комплектуючі, консультуємо щодо монтажу, 
            доставки та оформлення замовлення по всій Україні.
        </p>

        <p class="text-muted mb-0">
            Залиште заявку через форму або зв'яжіться з нами телефоном чи електронною поштою — 
            менеджер DymSystems відповість на ваші запитання та допоможе з вибором.
        </p>
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