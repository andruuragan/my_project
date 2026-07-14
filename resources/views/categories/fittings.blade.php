@extends('layouts.main')

@section('title', 'Система кріплень та комплектуючих | DymSystems')
@section('description', 'Кронштейни, хомути, прохідні елементи, деки, конуси, грибки та інші комплектуючі для монтажу димохідних систем.')

@section('content')

<div class="container-1600 py-5">

    {{-- Breadcrumbs --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="{{ route('main.index') }}"
                   class="text-decoration-none text-black-50 hover-orange">
                    Головна
                </a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{ route('categories.index') }}"
                   class="text-decoration-none text-black-50 hover-orange">
                    Категорії димарів
                </a>
            </li>

            <li class="breadcrumb-item active" aria-current="page">
                <span style="color:#f97316;font-weight:500;">
                    Система кріплень та комплектуючих
                </span>
            </li>
        </ol>
    </nav>

    {{-- HERO --}}
    <div class="hero-banner rounded-4 p-5 text-center border mb-5">

        <div class="display-3 text-warning mb-3">
            <i class="bi bi-tools"></i>
        </div>

        <h1 class="display-5 fw-bold mb-3">
            Система кріплень, хомутів, прохідних елементів та комплектуючих
        </h1>

        <p class="lead text-muted mx-auto" style="max-width:850px;">
            Оберіть необхідний тип комплектуючих для монтажу димохідної системи.
            Для окремих елементів ми допоможемо швидко визначити потрібний діаметр,
            після чого автоматично відкриємо відповідний каталог.
        </p>

        <div class="d-flex justify-content-center flex-wrap gap-2 mt-4">

            <span class="badge bg-light text-dark border px-3 py-2">
                <i class="bi bi-check-circle-fill text-success me-1"></i>
                Кронштейни
            </span>

            <span class="badge bg-light text-dark border px-3 py-2">
                <i class="bi bi-check-circle-fill text-success me-1"></i>
                Хомути
            </span>

            <span class="badge bg-light text-dark border px-3 py-2">
                <i class="bi bi-check-circle-fill text-success me-1"></i>
                Прохідні елементи
            </span>

            <span class="badge bg-light text-dark border px-3 py-2">
                <i class="bi bi-check-circle-fill text-success me-1"></i>
                Комплектуючі
            </span>

        </div>

    </div>

    {{-- КАРТОЧКИ --}}
 <section id="selection">

    <div class="text-center mb-5">

        <span class="badge bg-warning text-dark mb-3">
            Оберіть категорію
        </span>

        <h2 class="fw-bold">
            Що вам потрібно?
        </h2>

        <p class="text-muted">
            Натисніть на потрібний елемент, після чого ми допоможемо швидко
            перейти до відповідного каталогу.
        </p>

    </div>


    <div class="row g-4">

@foreach([

    [
        'name' => 'Кронштейн',
        
        'img'  => '86d27faa44533c26c486b4c165461af66455b904.webp',
        'description' => 'Для надійного кріплення димоходу до стіни.'
    ],

    [
        'name' => 'Розвантажувальна підставка',        
        'img'  => '6c6786f2e63db2cc3abd5b287d9dc0f250f4cac1.webp',
        'description' => 'Підставка для розвантаження дімаря.'
    ],

    [
        'name' => 'Обжимний хомут',        
        'img'  => '50817907640bd467b51a06152782d9c1633c39c1.webp',
        'description' => 'Для надійної фіксації труб та інш. елементів між собою.'
    ],
     [
        'name' => 'Хомут під розтяжки',        
        'img'  => '7a923d0ebf494627edbedb11da6ecf26f1d2e739.webp',
        'description' => 'Для надійної фіксації димохідної труби від сили вітру.'
    ],
     [
        'name' => 'Стіновий хомут',        
        'img'  => '7c724e0af75f91731229019244efae9cb5d5b77b.webp',
        'description' => 'Для надійного кріплення димоходу до стіни.'
    ],
     [
        'name' => 'Монтажний хомут',        
        'img'  => '2a028b8820ce315c5c15fcbb2d423fe823c15946.webp',
        'description' => 'Для центрування труби всередині цегляного каналу (шахти) під час гільзування димоходу.'
    ],
    [
        'name' => 'Скоба',        
        'img'  => '2a9fd38e010c2bad45e05612b24ace6d7efdfe63.webp',
        'description' => 'Для кріплення димоходу до стіни.'
    ],
    [
        'name' => 'Дека',        
        'img'  => 'ca88966ad49888492f5f78dc4ca394d8fe1f775b.webp',
        'description' => 'Для прикриття або захисту утеплювача в сендвіч-елементах димоходу.'
    ],
    [
        'name' => 'Криза',        
        'img'  => 'e5cb3a0e461cd2f1c716b651b97e5a851f707b3d.webp',
        'description' => 'Для герметизації місця проходження труби крізь покрівлю.'
    ],
    [
        'name' => 'Прохід',        
        'img'  => 'fa4508f8310bb8ce985355a408967b3509577cf2.webp',
        'description' => 'Це спеціальний монтажний вузол (пожежна безпека, герметичність, теплоізоляція).'
    ],
    [
        'name' => 'Окапник',        
        'img'  => 'c50692a896069ce5c20e71fe37119af64ab99845.webp',
        'description' => 'Для захисту від вологи та декорування проходу труби.'
    ],
     [
        'name' => 'Розета',        
        'img'  => 'b1d16c291c9d33ee26085e297703c90efef1239e.webp',
        'description' => 'Для декорування проходу труби.'
    ],
     [
        'name' => 'Лійка',        
        'img'  => '80731c12dd76219b0954f38d138107e784d693ac.webp',
        'description' => 'Призначена для відведення конденсату.'
    ],
     [
        'name' => 'Заглушка',        
        'img'  => '70f9709ad093575e0fd014ac3fb5b565c6cc5d7e.webp',
        'description' => 'Монтується на глухі ділянки димоходу.'
    ],
    [
        'name' => 'Закінчення димоходу',        
        'img'  => 'b8621901edf97997d2fdbc0402944ed1507259f5.webp',
        'description' => 'Для захисту від опадів та декорування верхньої частини димоходу.'
    ],
     [
        'name' => 'Конус',        
        'img'  => '497df0f94590eb6627e84cf787904225b8498530.webp',
        'description' => 'Для захисту від опадів та декорування верхньої частини димоходу.'
    ],
     [
        'name' => 'Грибок',        
        'img'  => 'ae60c4c7157b3a2c8b6856c55f9004e3b7a1b6e3.webp',
        'description' => 'Для захисту від опадів.'
    ],
    [
        'name' => 'Термоґрибок',        
        'img'  => '1d855c94e9a8b7971f6470c818282c3177472122.webp',
        'description' => 'Для захисту від опадів.'
    ],
    [
        'name' => 'Волпер',        
        'img'  => '7372de8d9cc1d6bafd52e03939d198ac9f2f7749.webp',
        'description' => 'Для захисту від опадів та підсилення тяги.'
    ],
     [
        'name' => 'Іскрогасник',        
        'img'  => '2b418f4fd415ddc6b5e4b4a1bf88942031a82f3c.webp',
        'description' => 'Для захисту від опадів та затримки іскр.'
    ],
    [
        'name' => 'Відображувач',        
        'img'  => '374f27f32989de18def1ba62797a9734f820a44d.webp',
        'description' => 'Для екранування та захисту стін або стелі від жорсткого інфрачервоного випромінювання та перегріву.'
    ],
     
     [
        'name' => 'Старт-сендвіч',        
        'img'  => '3a5834a31a698234418276d0333da7134679ccf4.webp',
        'description' => 'Для початку монтажу сендвіч-труби.'
    ],



    

] as $item)

 <div class="col-6 col-md-4 col-lg-2">

            <button
                class="card h-100 border-0 shadow-sm custom-product-card solution-card fitting-card w-100"
                data-name="{{ $item['name'] }}">

                <img src="{{ asset('images/' . $item['img']) }}"
                     class="img-fluid p-3"
                     alt="{{ $item['name'] }}">

                <div class="card-body d-flex flex-column">

                    <h5 class="fw-bold text-center mb-3">
                        {{ $item['name'] }}
                    </h5>

                    <p class="text-muted small flex-grow-1 text-center">
                        {{ $item['description'] }}
                    </p>

                   <span class="btn btn-warning w-100 mt-3">
                        Обрати
                    </span>

                </div>

            </button>

        </div>

        @endforeach

    </div>

</section>

<div id="step2" class="mt-5" style="display:none;">

    <div class="text-center mb-4">

        <span class="badge bg-warning text-dark mb-3">
            Крок 2
        </span>

        <h2 class="fw-bold">
            Оберіть діаметр
        </h2>

        <p class="text-muted">
            Для <span id="selectedName" class="fw-semibold text-decoration-underline"></span>
            необхідно вибрати діаметр.
        </p>

    </div>

    <div id="diameters" class="row g-3 justify-content-center">

    </div>

</div>

<section class="mt-5 pt-5">

    <div class="text-center mb-5">

        <span class="badge bg-warning text-dark mb-3">
            Схема
        </span>

        <h2 class="fw-bold">
            Основні кріплення димохідної системи
        </h2>

        <p class="text-muted">
            На схемі показані основні комплектуючі, які використовуються
            під час монтажу димоходу.
        </p>

    </div>

    <div class="text-center">

        <img
            src="{{ asset('images/chimney/fittings-scheme.webp') }}"
            class="img-fluid rounded-4 shadow-sm"
            alt="Схема кріплень димохідної системи">

    </div>

</section>

<section class="mt-5 pt-5">

<div class="text-center mb-5">

    <span class="badge bg-warning text-dark mb-3">
        Корисні поради
    </span>

    <h2 class="fw-bold">
        Що потрібно знати перед монтажем
    </h2>

</div>

<div class="row g-4">

<div class="col-md-6 col-xl-3">

<div class="card h-100 border-0 shadow-sm">

<div class="card-body">

<div class="display-6 text-warning mb-3">
<i class="bi bi-tools"></i>
</div>

<h5 class="fw-bold">
Як правильно встановити кронштейн
</h5>

<p class="text-muted small">
Кронштейни встановлюють через певну відстань для рівномірного
розподілу навантаження на димохід.
</p>

</div>

</div>

</div>

<div class="col-md-6 col-xl-3">

<div class="card h-100 border-0 shadow-sm">

<div class="card-body">

<div class="display-6 text-warning mb-3">
<i class="bi bi-link-45deg"></i>
</div>

<h5 class="fw-bold">
Як вибрати хомут
</h5>

<p class="text-muted small">
Діаметр хомута повинен повністю відповідати зовнішньому діаметру
димохідної труби.
</p>

</div>

</div>

</div>

<div class="col-md-6 col-xl-3">

<div class="card h-100 border-0 shadow-sm">

<div class="card-body">

<div class="display-6 text-warning mb-3">
<i class="bi bi-house"></i>
</div>

<h5 class="fw-bold">
Для чого потрібна криза
</h5>

<p class="text-muted small">
Криза забезпечує герметичний прохід димоходу через покрівлю та
захищає від протікань.
</p>

</div>

</div>

</div>

<div class="col-md-6 col-xl-3">

<div class="card h-100 border-0 shadow-sm">

<div class="card-body">

<div class="display-6 text-warning mb-3">
<i class="bi bi-arrows-angle-expand"></i>
</div>

<h5 class="fw-bold">
Коли використовують розтяжки
</h5>

<p class="text-muted small">
Розтяжки рекомендуються для високих димохідних труб, що виступають
над покрівлею.
</p>

</div>

</div>

</div>

</div>

</section>

<section class="mt-5 pt-5">

<div class="text-center mb-5">

<span class="badge bg-warning text-dark mb-3">
FAQ
</span>

<h2 class="fw-bold">
Поширені питання
</h2>

</div>

<div class="accordion" id="faqAccordion">
    
<div class="accordion-item">

<h2 class="accordion-header">

<button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">

Як часто потрібно встановлювати кронштейни?

</button>

</h2>

 <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">

<div class="accordion-body">

Рекомендована відстань між кронштейнами залежить від конструкції
димоходу, але зазвичай становить приблизно 2 метри.

</div>

</div>

</div>

<div class="accordion-item">

<h2 class="accordion-header">

 <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">

Чим відрізняються обжимний і стіновий хомути?

</button>

</h2>

<div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

<div class="accordion-body">

Обжимний хомут служить для щільного з'єднання окремих елементів димоходу між собою. Він підвищує міцність стику та запобігає зміщенню деталей під час експлуатації.

Стіновий хомут призначений для кріплення димоходу до стіни за допомогою кронштейна або шпильки. Він не з'єднує елементи між собою, а забезпечує надійну фіксацію всієї конструкції та знижує навантаження на димохід.

</div>

</div>

</div>

<div class="accordion-item">

<h2 class="accordion-header">

 <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">

Для чого потрібна дека?

</button>

</h2>

<div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

<div class="accordion-body">

Дека використовується для герметичного проходу димоходу через покрівлю. Вона закриває отвір навколо труби, захищає місце проходу від потрапляння дощу, снігу та вологи, а також надає вузлу монтажу акуратного зовнішнього вигляду. Деку підбирають відповідно до діаметра димоходу та кута нахилу покрівлі.

</div>

</div>

</div>

<div class="accordion-item">

<h2 class="accordion-header">

 <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">

Який діаметр комплектуючих потрібно вибрати?

</button>

</h2>

<div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

<div class="accordion-body">

Діаметр комплектуючих повинен повністю відповідати діаметру димохідної системи. Для термо (сендвіч) елементів також необхідно враховувати зовнішній діаметр утепленої труби (наприклад, Ø120/180 або Ø200/260). Якщо ви не впевнені у виборі, скористайтеся нашим конфігуратором — він автоматично покаже лише сумісні комплектуючі.

</div>

</div>

</div>

<div class="accordion-item">

<h2 class="accordion-header">

 <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">

Чи можна використовувати комплектуючі різних виробників?

</button>

</h2>

<div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

<div class="accordion-body">

Так, але лише за умови, що вони мають однаковий посадковий діаметр і сумісну конструкцію з'єднання. Навіть за однакового номінального діаметра елементи різних виробників можуть відрізнятися геометрією, довжиною посадкової частини або способом стикування. Тому для надійного та герметичного монтажу рекомендується використовувати комплектуючі одного виробника або попередньо перевіряти їхню сумісність.

</div>

</div>

</div>

<div class="accordion-item">

<h2 class="accordion-header">

 <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">

Коли використовують розтяжки?

</button>

</h2>

<div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

<div class="accordion-body">

Розтяжки застосовують для додаткової фіксації високих ділянок димоходу, які виступають над покрівлею або не мають достатньої кількості точок кріплення. Вони підвищують стійкість конструкції до сильного вітру та зменшують навантаження на основні кронштейни.

Зазвичай розтяжки рекомендують встановлювати, якщо верхня частина димоходу виступає над дахом більш ніж на 1,5–2 метри. Точна необхідність визначається висотою димоходу, місцем монтажу та вітровими навантаженнями.

</div>

</div>

</div>
</section>


</div>
<script>

document.addEventListener('DOMContentLoaded', () => {

    let selectedName = null;

    const products = {

    'Кронштейн': {
        hasDiameter: false
    },

    'Розвантажувальна підставка': {
        hasDiameter: true,
        diameters: ['100/160','110/180','120/180','130/200','140/200','150/220','160/220','180/250','200/260','220/280','230/300','250/320','300/360']
    },

    'Обжимний хомут': {
         hasDiameter: true,
        diameters: ['160','180','200','220','250','260','280','300','320','360','420','460','520']
    },

    'Хомут під розтяжки': {
        hasDiameter: true,
        diameters: ['160','180','200','220','250','260','280','300','320','360','420','460','520']
    },

    'Стіновий хомут': {
        hasDiameter: true,
        diameters: ['160','180','200','220','250','260','280','300','320','360','420','460','520']
    },

     'Монтажний хомут': {
        hasDiameter: true,
        diameters: ['100','110','120','130','140','150','160','180','200','220','230','250','300']
    },
     'Скоба': {
        hasDiameter: true,
        diameters: ['100','110','120','130','140','150','160','180','200','220','230','250','260','280','300','320','360']
    },
    'Дека': {
        hasDiameter: true,
        diameters:  ['100/160','110/180','120/180','130/200','140/200','150/220','160/220','180/250','200/260','220/280','230/300','250/320','300/360','350/420','400/460','450/520','500/560','100/200','120/220','130/230','140/240','150/250','160/260','180/280','200/300']
    },
     'Криза': {
        hasDiameter: true,
        diameters: ['130','140','150','160','170','190','210','230','240','260','270','290','310','330','360','370']
    },
     'Прохід': {
        hasDiameter: true,
        diameters: ['140','150','160','170','190','210','230','260','270','290','310','330','370']
    },
    'Окапник': {
        hasDiameter: true,
        diameters: ['100','110','120','125','130','140','150','160','180','200','220','230','250','260','280','300','320','350','360','400','450','500']
    },
    'Розета': {
        hasDiameter: true,
        diameters: ['100','110','120','125','130','140','150','160','180','200','220','230','250','260','280','300','320','350','360','400','450','500']
    },
    'Лійка': {
        hasDiameter: true,
        diameters: ['100','110','120','130','140','150','160','180','200','220','230','250','260','280','300','320','350','360']
    },
    'Заглушка': {
        hasDiameter: true,
        diameters: ['100','110','120','130','140','150','160','180','200','220','230','250','260','280','300','320','350','360']
    },
    'Закінчення димоходу': {
        hasDiameter: true,
        diameters: ['100','110','120','130','140','150','160','180','200','220','230','250','260','280','300']
    },
    'Конус': {
        hasDiameter: true,
        diameters: ['100/160','110/180','120/180','130/200','140/200','150/220','160/220','180/250','200/260','220/280','230/300','250/320','300/360','350/420','400/460','450/520','500/560','100/200','120/220','130/230','140/240','150/250','160/260','180/280','200/300']
    },
     'Грибок': {
        hasDiameter: true,
        diameters: ['100','110','120','130','140','150','160','180','200','220','230','250','260','280','300']
    },
    'Термоґрибок': {
        hasDiameter: true,
        diameters: ['100/160','110/180','120/180','130/200','140/200','150/220','160/220','180/250','200/260','220/280','230/300','250/320','300/360','350/420','400/460','450/520','500/560','100/200','120/220','130/230','140/240','150/250','160/260','180/280','200/300']
    },
    'Волпер': {
        hasDiameter: true,
        diameters: ['100','110','120','125','130','140','150','160','180','200','220','230','250','260','280','300','350','400','500']
    },
    'Іскрогасник': {
        hasDiameter: true,
        diameters: ['100','110','120','130','140','150','160','180','200','220','230','250','260','280','300']
    },
    'Відображувач': {
        hasDiameter: false
        },
    'Старт-сендвіч': {
        hasDiameter: true,
        diameters: ['100/160','110/180','120/180','130/200','140/200','150/220','160/220','180/250','200/260','220/280','230/300','250/320','300/360','350/420','400/460','450/520','500/560','100/200','120/220','130/230','140/240','150/250','160/260','180/280','200/300']
    }
    

};

   document.querySelectorAll('.fitting-card').forEach(card => {

    card.addEventListener('click', () => {

        selectedName = card.dataset.name;

       const product = products[selectedName];

if (!product) {
    console.error('Не знайдено конфігурацію:', selectedName);
    return;
}

if (product.hasDiameter) {
     document.getElementById('selectedName').textContent = selectedName;

    showDiameters(product.diameters);

} else {

    window.location.href =
    `/dymohody-ta-komplektuyuchi?name=${encodeURIComponent(selectedName)}`;

}

    

});

           

    });

function showDiameters(diameters){

    const container = document.getElementById('diameters');

    container.innerHTML = '';

    diameters.forEach(diameter => {

        container.innerHTML += `
            <div class="col-6 col-md-3 col-lg-2">
                <button
                    class="btn btn-outline-warning w-100 diameter-btn"
                    data-diameter="${diameter}">
                    Ø ${diameter}
                </button>
            </div>
        `;

    });

    document.getElementById('step2').style.display = 'block';

    document.getElementById('step2').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
    

}


document.addEventListener('click', function (e) {

    if (!e.target.classList.contains('diameter-btn')) {
        return;
    }

    const diameter = e.target.dataset.diameter;

   window.location.href =
    `/dymohody-ta-komplektuyuchi?name=${encodeURIComponent(selectedName)}&diameter=${encodeURIComponent(diameter)}`;

});
});

       

       

</script>
@endsection

@push('styles')
<style>

.hero-banner{
    position:relative;
    overflow:hidden;
    background:linear-gradient(135deg,#fff8e8 0%,#ffffff 100%);
}

.hero-banner::before{
    content:"";
    position:absolute;
    inset:0;
    opacity:.25;
    background:url('{{ asset("images/chimney/fittings-banner.webp") }}')
        center/cover no-repeat;
}

.hero-banner>*{
    position:relative;
    z-index:2;
}

.hover-orange{
    transition:.25s;
}

.hover-orange:hover{
    color:#f97316!important;
}
.fitting-card img{
    height: 150px;
    object-fit: contain;
    padding: 1rem;
}
.diameter-btn{
    border: 2px solid #d97706;
    color: #92400e;
    font-weight: 600;
    transition: .25s;
}

.diameter-btn:hover{
    background: #f59e0b;
    border-color: #b45309;
    color: #fff;
}
#step2{
    scroll-margin-top: 120px;
}
</style>
@endpush