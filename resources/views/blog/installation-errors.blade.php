@extends('layouts.main')
@section('title', '5 критичних помилок при монтажі димоходу | DymSystems')

@section('description',
'Дізнайтеся про 5 найпоширеніших помилок при монтажі димоходу. Причини виникнення зворотної тяги, перегріву конструкцій та пожежонебезпечних ситуацій. Практичні поради від DymSystems.')

@section('content')
<main class="py-5 bg-white">
    <div class="container" style="max-width: 1200px;">
        {{-- Навігація --}}
        <nav class="mb-4 breadcrumb-nav">
    <a href="{{ route('main.index') }}" class="text-decoration-none text-muted small">Головна</a> / 
    <a href="{{ route('useful.index') }}" class="text-decoration-none text-muted small">Корисна інформація</a> /
    <a href="{{ route('chimney.installation-rules') }}" class="text-decoration-none text-muted small">Монтаж</a> / 
    <a href="{{ route('blog.installation-errors') }}" 
   class="text-decoration-none small {{ request()->routeIs('blog.installation-errors') ? 'active text-warning' : 'text-muted' }}">
   Блог
</a>
</nav>

        <h1 class="display-5 fw-bold mb-4">5 критичних помилок при монтажі димоходу</h1>
        <p class="lead text-muted mb-5">Експертний розбір основних ризиків, що можуть призвести до пожежі у вашому домі.</p>

       <img src="{{ asset('images/chimney/article-main.webp') }}"
     width="1679"
     height="937"
     class="img-fluid rounded-4 mb-5 shadow"
     alt="Помилки монтажу"
     loading="lazy"
     decoding="async">

        <article class="fs-5 text-secondary lh-lg">
            <p class="mb-4">Димохід — це «легені» вашого опалювального приладу. Від якості монтажу димохідної системи залежить не лише ефективність опалення, а й безпека вашого дому.</p>
            
            <p class="mb-5">Розглянемо 5 найнебезпечніших помилок, які ми виправляємо найчастіше.</p>

            {{-- Помилка 1 --}}
            <h2 class="fw-bold text-dark mt-5 mb-3">Помилка №1: Економія на матеріалах</h2>
            <p>Багато хто вважає, що будь-яка блискуча металева труба підійде для димоходу. Це критична помилка. Більшість дешевих труб, які продаються на ринках, виготовлені з технічної нержавіючої сталі (низьколегованих марок), яка не розрахована на постійний контакт з кислотним конденсатом та високими температурами.</p>
            <p>Чому це небезпечно:</p>
            <ul class="list-unstyled">
                <li class="mb-2"><i class="bi bi-x-circle-fill text-danger me-2"></i><strong>Корозія:</strong> Вже через 1–2 опалювальні сезони в такій трубі можуть з'явитися мікротріщини або наскрізні отвори.</li>
                <li class="mb-2"><i class="bi bi-x-circle-fill text-danger me-2"></i><strong>Прорив газів:</strong> Через ці отвори чадний газ та іскри можуть потрапити в конструкції перекриття, що стає прямою причиною загоряння дерев’яних елементів даху чи стін.</li>
                <li class="mb-2"><i class="bi bi-x-circle-fill text-danger me-2"></i><strong>Марка сталі:</strong> Для димоходів повинні використовуватися лише спеціальні «кислотостійкі» марки нержавіючої сталі (наприклад, AISI 321, 304 або 310S для високих температур).</li>
            </ul>
            <div class="p-4 bg-light rounded-4 my-4 border-start border-4 border-warning">
                <strong>Порада інженера:</strong> Завжди вимагайте у продавця сертифікат на марку сталі. Якщо вам пропонують "просто якісну нержавійку" без документального підтвердження марки — це привід відмовитися від покупки.
            </div>
            {{-- Помилка 2 --}}
            <h2 class="fw-bold text-dark mt-5 mb-3">Помилка №2: Ігнорування протипожежних відступів</h2>
            <p>Через явище піролізу дерево, що тривалий час нагрівається, стає легкозаймистим навіть при низьких температурах.</p>
            <p>Чому це небезпечно:</p>
            <ul class="list-unstyled">
                <li class="mb-2"><i class="bi bi-x-circle-fill text-danger me-2"></i><strong>Піроліз деревини:</strong> Дерево, що тривалий час знаходиться під впливом високої температури (навіть якщо воно не торкається труби безпосередньо), поступово втрачає вологу і стає легкозаймистим. Це називається піролізом. З часом температура займання такої деревини падає до 100-150°C.</li>
                <li class="mb-2"><i class="bi bi-x-circle-fill text-danger me-2"></i><strong>Відсутність термоізоляції:</strong> Використання мінеральної вати, яка не призначена для високих температур (наприклад, звичайної фальгованої вати для утеплення стін, а не спеціальної вермикулітової плити або базальтової вати з високою щільністю), призводить до того, що ізоляція просто "вигорає" або руйнується.</li>
            </ul>
            <div class="p-4 bg-light rounded-4 my-4 border-start border-4 border-warning">
                <strong>Порада інженера:</strong> Використовуйте тільки спеціалізовані прохідні вузли (короби) з обов’язковим заповненням негорючими матеріалами (суперізол, базальтовий мат). Між трубою та дерев’яною конструкцією має бути повітряний проміжок згідно з нормами ДБН (Державних будівельних норм).
            </div>

            {{-- Помилка 3 --}}
            <h2 class="fw-bold text-dark mt-5 mb-3">Помилка №3: Відсутність ревізії та неправильне чищення</h2>
            <p>Чимало замовників відмовляються від встановлення ревізійного трійника, мотивуючи це тим, що «так естетичніше» або «так дешевше». Це фатальна помилка, яка перетворює ваш димохід на «порохову бочку».</p>
            <p>Чому це небезпечно:</p>
            <ul class="list-unstyled">
                <li class="mb-2"><i class="bi bi-x-circle-fill text-danger me-2"></i><strong>Накопичення сажі:</strong> Сажа — це не просто бруд. При загорянні в каміні чи котлі іскри потрапляють у димохід, і якщо там є шар сажі, вона миттєво спалахує. Температура горіння сажі досягає 1000°C. Жодна сталева труба (навіть нержавійка) не витримає такого температурного удару без деформації.</li>
                <li class="mb-2"><i class="bi bi-x-circle-fill text-danger me-2"></i><strong>Неможливість обслуговування:</strong> Якщо у вас немає ревізійного лючка внизу системи, ви не зможете ефективно видалити сажу та продукти згоряння. З часом прохідний переріз звужується, що призводить до зворотної тяги (дим і чадний газ ідуть у кімнату).</li>
            </ul>
            <div class="p-4 bg-light rounded-4 my-4 border-start border-4 border-warning">
                <strong>Порада інженера:</strong> Ревізія — це не опція, це обов’язковий елемент. Вона має бути розташована в легкодоступному місці, щоб ви або фахівець могли легко перевірити стан димоходу перед початком кожного опалювального сезону.
            </div>
            {{-- Помилка 4 --}}
            <h2 class="fw-bold text-dark mt-5 mb-3">Помилка №4: Неправильний вибір діаметра та висоти димоходу</h2>
            <p>Часто трапляється ситуація, коли власник встановлює котел з виходом димоходу 180 мм, а підключає його до існуючого каналу 120 мм, або навпаки — робить димохід занадто широким і високим.</p>
            <p>Чому це небезпечно:</p>
            <ul class="list-unstyled">
                <li class="mb-2"><i class="bi bi-x-circle-fill text-danger me-2"></i><strong>Втрата тяги (звуження):</strong> Якщо діаметр димоходу менший за вихідний отвір котла, димові гази не встигають виходити назовні. Це призводить до задимлення приміщення та швидкого виходу котла з ладу через перегрів.</li>
                <li class="mb-2"><i class="bi bi-x-circle-fill text-danger me-2"></i><strong>Надмірне охолодження (надмірний діаметр):</strong> Якщо димохід занадто широкий, гази піднімаються повільно, встигаючи охолонути. Як результат — тяга падає, дим починає «зависати», а ви отримуєте масу конденсату всередині труби.</li>
                <li class="mb-2"><i class="bi bi-x-circle-fill text-danger me-2"></i><strong>Недостатня висота:</strong> Мінімальна висота димоходу (зазвичай від 5 метрів) потрібна для створення достатньої різниці тисків. Якщо димохід нижче рівня даху або сусідніх будівель, виникає «вітровий підпір», і дим буде задувати назад у дім.</li>
            </ul>
            <div class="p-4 bg-light rounded-4 my-4 border-start border-4 border-warning">
                <strong>Порада інженера:</strong> Розрахунок діаметра та висоти димоходу має проводитися індивідуально під паспортні характеристики вашого опалювального приладу. Не намагайтеся "вгадати" ці розміри — використовуйте спеціальні програми-калькулятори або звертайтеся до фахівців.
            </div>

            {{-- Помилка 5 --}}
            <h2 class="fw-bold text-dark mt-5 mb-3">Помилка №5: Монтаж "проти шерсті" (потоку конденсату)</h2>
            <p>Це класична помилка новачків. Всі елементи димоходу (труби, трійники) повинні збиратися «по конденсату», а не «по диму».</p>
             <p>Чому це небезпечно:</p>
            <ul class="list-unstyled">
                <li class="mb-2"><i class="bi bi-x-circle-fill text-danger me-2"></i><strong>Протікання:</strong> Конденсат (який є агресивною кислотною сумішшю) стікає всередині труби. Якщо труби з’єднані неправильно («по диму»), конденсат буде виходити через стики назовні..</li>
                <li class="mb-2"><i class="bi bi-x-circle-fill text-danger me-2"></i><strong>Руйнування системи:</strong> Рідина, що витікає назовні, роз'їдає утеплювач, фарбу, стіни будинку і зрештою руйнує сам димохід зсередини, викликаючи корозію металу. Це не тільки естетична проблема, а й пряма загроза цілісності всієї конструкції.</li>
                
            </ul>
            <div class="p-4 bg-light rounded-4 my-4 border-start border-4 border-warning">
                <strong>Порада інженера:</strong> Правильна збірка виглядає так: верхня труба вставляється всередину розтруба нижньої труби. Уважно перевіряйте кожен стик при монтажі!
</div>
            <hr class="my-5">

           <h3 class="fw-bold text-dark mb-4">Чек-лист безпечного димоходу:</h3>
            
            <div class="row align-items-center">
                {{-- Ліва колонка з чек-листом --}}
                <div class="col-md-8">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Використано кислотостійку сталь (AISI 321/304).</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Всі стики зібрані «по конденсату».</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Виконано правильну ізоляцію проходів.</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Передбачено ревізійний лючок.</li>
                    </ul>
                </div>
                
                {{-- Права колонка з кнопкою --}}
                <div class="col-md-4 text-md-end mt-4 mt-md-0">
                    <a href="{{ route('shop.index') }}" 
   class="btn px-4 py-3 fw-bold shadow-sm" 
   style="background-color: #d97706; border-color: #d97706; color: white;">
    <i class="bi bi-cart-fill me-2"></i> Купити надійний димохід
</a>
                </div>
            </div>
        </article>

        {{-- CTA блок --}}
        <div class="p-5 mt-5 bg-dark text-white rounded-4 text-center">
            <h3 class="fw-bold">Потрібна допомога фахівця?</h3>
            <p>Проконсультуйтеся з нашим інженером перед початком робіт.</p>
            <a href="{{ route('chimney.installation-rules') }}#form" class="btn btn-warning px-4 py-2">Отримати консультацію</a>
        </div>
    </div>
</main>
<style>
    /* Ефект наведення для всіх посилань, крім активного */
.breadcrumb-nav a:hover:not(.active) {
    color: #d97706 !important; /* Оранжевий колір при наведенні */
    text-decoration: underline !important;
}

/* Стиль для активної сторінки */
.breadcrumb-nav a.active {
    color: #d97706 !important; /* Оранжевий колір для тексту */
    font-weight: bold;        /* Жирний шрифт для акценту */
    pointer-events: none;      /* Вимикає клікабельність активної сторінки */
}

</style>
@endsection
@push('schema-article')
<script type="application/ld+json">
{!! json_encode([
  '@' . 'context' => 'https://schema.org',
  '@type' => 'Article',

  '@id' => url('/blog/pomylky-montazhu#article'),
  'headline' => '5 критичних помилок при монтажі димоходу',
  'url' => url('/blog/pomylky-montazhu'),

  'publisher' => [
    '@type' => 'Organization',
    '@id' => 'https://www.dymsystems.pp.ua/#organization'
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
    ],
    [
      '@type' => 'ListItem',
      'position' => 2,
      'name' => 'Корисна інформація',
      'item' => url('/useful-info')
    ],
    [
      '@type' => 'ListItem',
      'position' => 3,
      'name' => 'Монтаж димоходу: правила та вимоги',
      'item' => url('/montazh-dymohodu-pravyla')
    ],
    [
      '@type' => 'ListItem',
      'position' => 4,
      'name' => '5 критичних помилок при монтажі димоходу',
     'item' => [
        '@id' => url('/blog/pomylky-montazhu'),
        'name' => '5 критичних помилок при монтажі димоходу'
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