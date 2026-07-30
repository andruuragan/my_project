@extends('layouts.main')

@section('title', 'Базальтова вата для сендвіч-димоходів | DymSystems')
@section('description', 'Дізнайтеся, навіщо потрібна базальтова вата в сендвіч-димоходах, як вона впливає на тягу, утворення конденсату, пожежну безпеку та довговічність димохідної системи.')

@section('content')

<div class="container py-5">

    {{-- Навігаційні крихти --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('main.index') }}"
                   class="text-decoration-none text-muted">
                    Головна
                </a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{ route('useful.index') }}"
                   class="text-decoration-none text-muted">
                    Корисна інформація
                </a>
            </li>

            <li class="breadcrumb-item active"
                aria-current="page"
                style="color:#ea580c;">
                Базальтова вата
            </li>
        </ol>
    </nav>

    {{-- Заголовок --}}
    <div class="text-center mb-5">

        <h1 class="fw-bold display-5">
            Базальтова вата в сендвіч-димоході
        </h1>

        <p class="lead text-muted mx-auto" style="max-width:900px;">
            Пояснюємо, навіщо потрібна базальтова вата в сендвіч-димоходах,
            як вона допомагає зменшити охолодження димових газів,
            впливає на тягу, утворення конденсату та безпечну роботу
            димохідної системи.
        </p>

    </div>

    {{-- Банер --}}
    <div class="mb-5">

        <div class="rounded-4 border overflow-hidden shadow-sm">

            <img src="{{ asset('images/chimney/basalt-wool.webp') }}"
     alt="Базальтова вата для сендвіч-димоходів"
     class="img-fluid w-100"
    >

        </div>

    </div>

    {{-- Швидкий зміст --}}
<div class="card border-0 shadow-sm rounded-4 mb-5">

    <div class="card-body p-4">

        <h2 class="h3 mb-3">
            <i class="bi bi-list-check text-warning me-2"></i>
            У статті
        </h2>

        <div class="row">

            <div class="col-md-6">

                <ul class="mb-0">
                    <li>Що таке базальтова вата</li>
                    <li>Навіщо потрібне утеплення</li>
                    <li>Вплив на тягу</li>
                    <li>Конденсат</li>
                    <li>Одностінна труба чи сендвіч</li>
                </ul>

            </div>

            <div class="col-md-6">

                <ul class="mb-0">
                    <li>Де використовується</li>
                    <li>Товщина утеплювача</li>
                    <li>Якість базальтової вати</li>
                    <li>Типові помилки</li>
                    <li>FAQ</li>
                </ul>

            </div>

        </div>

    </div>


</div>
{{-- Що таке базальтова вата --}}
<section class="mb-5">

    <div class="text-center mb-4">

        <h2 class="fw-bold">
            Що таке базальтова вата?
        </h2>

        <p class="text-muted">
            Основний теплоізоляційний матеріал, який використовується
            в сучасних сендвіч-димоходах.
        </p>

    </div>

    <div class="row align-items-center g-5">

        {{-- Текст --}}
        <div class="col-lg-7">

            <p class="fs-5">
                <strong>Базальтова вата</strong> — це мінеральний
                теплоізоляційний матеріал, який виготовляють із
                природних базальтових порід. Завдяки високій
                термостійкості, довговічності та негорючості вона
                широко застосовується як утеплювач у
                сендвіч-димоходах.
            </p>

            <p>
                У конструкції сендвіч-димоходу базальтова вата
                розташовується між внутрішньою трубою, по якій
                відводяться димові гази, та зовнішнім кожухом.
                Вона допомагає зменшити втрати тепла, підтримує
                стабільнішу температуру димових газів і знижує
                ризик активного утворення конденсату.
            </p>

            <p class="mb-0">
                Саме тому утеплені сендвіч-димоходи рекомендують
                для зовнішнього монтажу, проходу через холодні
                горища, фасади та покрівлю.
            </p>

        </div>

        {{-- Місце під ілюстрацію --}}
        <div class="col-lg-5">

            <div class="rounded-4 border overflow-hidden shadow-sm">

                <img src="{{ asset('images/chimney/basalt-structure.webp') }}"
                     alt="Будова сендвіч-димоходу"
                     class="img-fluid w-100">

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
<section class="mb-5">

    <div class="text-center mb-4">

        <h2 class="fw-bold">
            Яку температуру витримує базальтова вата?
        </h2>

        <p class="text-muted">
            Чому саме базальтова вата використовується як теплоізоляція
            у сучасних сендвіч-димоходах.
        </p>

    </div>

    <div class="row align-items-center g-5">

        {{-- Текст --}}
        <div class="col-lg-7">

            <p class="fs-5">
                Для утеплення сендвіч-димоходів використовується
                спеціальна кам'яна (базальтова) вата, яка зберігає свої
                теплоізоляційні властивості навіть при дуже високих
                температурах.
            </p>

            <p>
                У димоходах DymSystems застосовується базальтова вата
                <strong>PAROC</strong>, яка розрахована на
                <strong>робочу температуру до 750&nbsp;°C</strong>.
                Температура плавлення волокон перевищує
                <strong>1000&nbsp;°C</strong>, що забезпечує високий
                рівень пожежної безпеки конструкції.
            </p>

            <p>
                Саме тому утеплені сендвіч-димоходи підходять для
                твердопаливних котлів, камінів, печей та інших
                опалювальних приладів за умови правильного підбору
                системи та дотримання вимог виробника.
            </p>

            <div class="alert alert-success rounded-4 mt-4">

                <strong>
                    <i class="bi bi-shield-check me-2"></i>
                    Переваги базальтової вати PAROC
                </strong>

                <ul class="mb-0 mt-3">

                    <li>Робоча температура — <strong>до 750 °C</strong></li>

                    <li>Температура плавлення волокон — <strong>понад 1000 °C</strong></li>

                    <li>Негорючий матеріал (клас реакції на вогонь A1)</li>

                    <li>Стабільні теплоізоляційні властивості</li>

                    <li>Довговічність та стійкість до високих температур</li>

                </ul>

            </div>

        </div>

        {{-- Ілюстрація --}}
        <div class="col-lg-5">

            <div class="rounded-4 border overflow-hidden shadow-sm">

                <img src="{{ asset('images/chimney/paroc-temperature.webp') }}"
                     alt="Температура базальтової вати PAROC"
                     class="img-fluid w-100">

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- Навіщо потрібне утеплення --}}
<section class="my-5">

    <div class="text-center mb-5">

        <h2 class="fw-bold">
            Навіщо потрібне утеплення в сендвіч-димоході?
        </h2>

        <p class="text-muted mx-auto" style="max-width:900px;">
            Основне завдання базальтової вати — зменшити охолодження
            димових газів та забезпечити стабільнішу роботу димохідної
            системи навіть у холодну пору року.
        </p>

    </div>

    <div class="row g-4">

        {{-- Температура --}}
        <div class="col-md-6 col-lg-3">

            <div class="card h-100 border-0 shadow rounded-4">

                <div class="card-body text-center">

                    <div class="display-5 text-danger mb-3">
                        <i class="bi bi-thermometer-half"></i>
                    </div>

                    <h3 class="h5 fw-bold">
                        Менше охолодження
                    </h3>

                    <p class="text-muted mb-0">
                        Базальтова вата допомагає довше
                        зберігати температуру димових
                        газів усередині труби.
                    </p>

                </div>

            </div>

        </div>

        {{-- Конденсат --}}
        <div class="col-md-6 col-lg-3">

            <div class="card h-100 border-0 shadow rounded-4">

                <div class="card-body text-center">

                    <div class="display-5 text-primary mb-3">
                        <i class="bi bi-droplet-half"></i>
                    </div>

                    <h3 class="h5 fw-bold">
                        Менше конденсату
                    </h3>

                    <p class="text-muted mb-0">
                        Тепліша внутрішня труба допомагає
                        знизити інтенсивність утворення
                        конденсату.
                    </p>

                </div>

            </div>

        </div>

        {{-- Тяга --}}
        <div class="col-md-6 col-lg-3">

            <div class="card h-100 border-0 shadow rounded-4">

                <div class="card-body text-center">

                    <div class="display-5 text-warning mb-3">
                        <i class="bi bi-wind"></i>
                    </div>

                    <h3 class="h5 fw-bold">
                        Стабільніша тяга
                    </h3>

                    <p class="text-muted mb-0">
                        Зменшення втрати температури
                        сприяє стабільнішій роботі
                        димоходу.
                    </p>

                </div>

            </div>

        </div>

        {{-- Безпека --}}
        <div class="col-md-6 col-lg-3">

            <div class="card h-100 border-0 shadow rounded-4">

                <div class="card-body text-center">

                    <div class="display-5 text-success mb-3">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <h3 class="h5 fw-bold">
                        Додаткова безпека
                    </h3>

                    <p class="text-muted mb-0">
                        Базальтова вата не підтримує
                        горіння та використовується
                        як теплоізоляційний шар.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- Як базальтова вата впливає на тягу --}}
<section class="mb-5">

    <div class="text-center mb-4">

        <h2 class="fw-bold">
            Як базальтова вата впливає на тягу?
        </h2>

        <p class="text-muted">
            Теплоізоляція допомагає підтримувати стабільнішу роботу
            димохідної системи, особливо в холодну пору року.
        </p>

    </div>

    <div class="row align-items-center g-5">

        {{-- Текст --}}
        <div class="col-lg-7">

            <p class="fs-5">
                Тяга виникає завдяки різниці температур між гарячими
                димовими газами всередині труби та зовнішнім повітрям.
                Якщо труба швидко охолоджується, димові гази втрачають
                температуру, що може негативно впливати на стабільність
                роботи димоходу.
            </p>

            <p>
                Базальтова вата зменшує тепловтрати через стінки
                сендвіч-димоходу. Завдяки цьому внутрішня труба довше
                залишається теплою, а димові гази повільніше
                охолоджуються.
            </p>

            <div class="alert alert-warning rounded-4 mt-4">

                <strong>
                    <i class="bi bi-lightbulb-fill me-2"></i>
                    Важливо
                </strong>

                <p class="mb-0 mt-2">
                    Утеплення саме по собі не створює тягу.
                    Воно лише допомагає зменшити охолодження
                    димових газів. На ефективність роботи також
                    впливають висота димоходу, його діаметр,
                    конструкція системи та правильний монтаж.
                </p>

            </div>

        </div>

        {{-- Ілюстрація --}}
        <div class="col-lg-5">

            <div class="rounded-4 border overflow-hidden shadow-sm">

                <img src="{{ asset('images/chimney/draft.webp') }}"
                     alt="Вплив утеплення на тягу"
                     class="img-fluid w-100">

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- Базальтова вата і конденсат --}}
<section class="mb-5">

    <div class="text-center mb-4">

        <h2 class="fw-bold">
            Базальтова вата і конденсат
        </h2>

        <p class="text-muted">
            Як утеплення допомагає зменшити утворення конденсату
            в димохідній системі.
        </p>

    </div>

    <div class="row align-items-center g-5">

        {{-- Текст --}}
        <div class="col-lg-7">

            <p class="fs-5">
                Конденсат утворюється тоді, коли гарячі димові гази
                охолоджуються нижче температури точки роси, а водяна
                пара осідає на внутрішніх стінках димоходу.
            </p>

            <p>
                Якщо димохід проходить по фасаду будинку, через холодне
                горище або знаходиться на відкритому повітрі,
                внутрішня труба швидше втрачає тепло.
                У таких умовах кількість конденсату може збільшуватися.
            </p>

            <p>
                Базальтова вата допомагає довше зберігати температуру
                внутрішньої труби. Завдяки цьому димові гази
                повільніше охолоджуються, а ризик активного
                утворення конденсату зменшується.
            </p>

            <div class="alert alert-info rounded-4 mt-4">

                <strong>
                    <i class="bi bi-info-circle-fill me-2"></i>
                    Варто знати
                </strong>

                <p class="mb-0 mt-2">
                    Утеплення не усуває конденсат повністю.
                    Його кількість також залежить від типу котла,
                    температури димових газів, висоти димоходу,
                    погодних умов та правильності монтажу.
                </p>

            </div>

        </div>

        {{-- Місце під інфографіку --}}
        <div class="col-lg-5">

            <div class="rounded-4 border overflow-hidden shadow-sm">

                <img src="{{ asset('images/chimney/condensate.webp') }}"
                     alt="Конденсат у сендвіч-димоході"
                     class="img-fluid w-100">

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- Одностінна труба чи сендвіч-димохід --}}
<section class="my-5">

    <div class="text-center mb-5">

        <h2 class="fw-bold">
            Чому одностінна труба не підходить для холодних ділянок?
        </h2>

        <p class="text-muted mx-auto" style="max-width:900px;">
            Якщо димохід проходить зовні будинку або через холодне горище,
            утеплений сендвіч-димохід має суттєві переваги перед
            одностінною трубою.
        </p>

    </div>

    <div class="row g-4">

        {{-- Одностінна --}}
        <div class="col-lg-6">

            <div class="card border-danger shadow rounded-4 h-100">

                <div class="card-body">

                    <div class="text-center mb-3">
                        <i class="bi bi-x-circle-fill text-danger display-5"></i>
                    </div>

                    <h3 class="text-center text-danger">
                        Одностінна труба
                    </h3>

                    <ul class="mt-4 mb-0">
                        <li>Швидко охолоджується на вулиці.</li>
                        <li>Інтенсивніше утворюється конденсат.</li>
                        <li>Може погіршуватися тяга.</li>
                        <li>Більший ризик накопичення сажі.</li>
                        <li>Підходить переважно для теплих приміщень.</li>
                    </ul>

                </div>

            </div>

        </div>

        {{-- Сендвіч --}}
        <div class="col-lg-6">

            <div class="card border-success shadow rounded-4 h-100">

                <div class="card-body">

                    <div class="text-center mb-3">
                        <i class="bi bi-check-circle-fill text-success display-5"></i>
                    </div>

                    <h3 class="text-center text-success">
                        Сендвіч-димохід
                    </h3>

                    <ul class="mt-4 mb-0">
                        <li>Має шар базальтової теплоізоляції.</li>
                        <li>Повільніше охолоджується.</li>
                        <li>Допомагає підтримувати стабільнішу тягу.</li>
                        <li>Зменшує ризик активного утворення конденсату.</li>
                        <li>Рекомендується для зовнішнього монтажу.</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- Де використовується сендвіч-димохід --}}
<section class="my-5">

    <div class="text-center mb-5">

        <h2 class="fw-bold">
            Де використовується сендвіч-димохід з базальтовою ватою?
        </h2>

        <p class="text-muted mx-auto" style="max-width:900px;">
            Утеплені сендвіч-димоходи рекомендують використовувати там,
            де труба контактує з холодним повітрям або проходить через
            конструкції будинку. Теплоізоляція допомагає підтримувати
            стабільнішу роботу системи та зменшує тепловтрати.
        </p>

    </div>

    <div class="row g-4">

        {{-- Фасад --}}
        <div class="col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow rounded-4">

                <div class="card-body text-center">

                    <div class="display-5 text-warning mb-3">
                        <i class="bi bi-house"></i>
                    </div>

                    <h3 class="h5 fw-bold">
                        Зовнішній монтаж
                    </h3>

                    <p class="text-muted mb-0">
                        Для встановлення димоходу
                        по фасаду будинку.
                    </p>

                </div>

            </div>

        </div>

        {{-- Через стіну --}}
        <div class="col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow rounded-4">

                <div class="card-body text-center">

                    <div class="display-5 text-primary mb-3">
                        <i class="bi bi-box-arrow-right"></i>
                    </div>

                    <h3 class="h5 fw-bold">
                        Прохід через стіну
                    </h3>

                    <p class="text-muted mb-0">
                        Для безпечного виведення
                        димоходу назовні.
                    </p>

                </div>

            </div>

        </div>

        {{-- Горище --}}
        <div class="col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow rounded-4">

                <div class="card-body text-center">

                    <div class="display-5 text-info mb-3">
                        <i class="bi bi-house-up"></i>
                    </div>

                    <h3 class="h5 fw-bold">
                        Холодне горище
                    </h3>

                    <p class="text-muted mb-0">
                        Для проходу через
                        неопалювані приміщення.
                    </p>

                </div>

            </div>

        </div>

        {{-- Покрівля --}}
        <div class="col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow rounded-4">

                <div class="card-body text-center">

                    <div class="display-5 text-success mb-3">
                        <i class="bi bi-building"></i>
                    </div>

                    <h3 class="h5 fw-bold">
                        Прохід через покрівлю
                    </h3>

                    <p class="text-muted mb-0">
                        Для ділянок, що
                        знаходяться над дахом.
                    </p>

                </div>

            </div>

        </div>

        {{-- Камін --}}
        <div class="col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow rounded-4">

                <div class="card-body text-center">

                    <div class="display-5 text-danger mb-3">
                        <i class="bi bi-fire"></i>
                    </div>

                    <h3 class="h5 fw-bold">
                        Каміни та печі
                    </h3>

                    <p class="text-muted mb-0">
                        Для обладнання
                        з високою температурою
                        димових газів.
                    </p>

                </div>

            </div>

        </div>

        {{-- Котли --}}
        <div class="col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow rounded-4">

                <div class="card-body text-center">

                    <div class="display-5 text-secondary mb-3">
                        <i class="bi bi-gear-wide-connected"></i>
                    </div>

                    <h3 class="h5 fw-bold">
                        Котельні системи
                    </h3>

                    <p class="text-muted mb-0">
                        Газові, твердопаливні
                        та пелетні котли.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- Товщина базальтової вати --}}
<section class="my-5">

    <div class="text-center mb-5">

        <h2 class="fw-bold">
            Товщина базальтової вати
        </h2>

        <p class="text-muted mx-auto" style="max-width:900px;">
            Теплоізоляційні властивості сендвіч-димоходу залежать не лише
            від товщини утеплювача, а й від його щільності, матеріалу
            внутрішньої труби та умов експлуатації.
        </p>

    </div>

    <div class="row g-4">

        {{-- 30 мм --}}
        <div class="col-md-4">

            <div class="card h-100 border-0 shadow rounded-4">

                <div class="card-body text-center">

                    <div class="display-4 fw-bold text-warning mb-3">
                        30 мм
                    </div>

                    <h3 class="h5">
                        Стандартне утеплення
                    </h3>

                    <p class="text-muted mb-0">
                        Підходить для більшості побутових
                        димохідних систем за умови правильного
                        підбору всієї конструкції.
                    </p>

                </div>

            </div>

        </div>

        {{-- 50 мм --}}
        <div class="col-md-4">

            <div class="card h-100 border-0 shadow rounded-4 border-warning">

                <div class="card-body text-center">

                    <div class="display-4 fw-bold text-warning mb-3">
                        50 мм
                    </div>

                    <h3 class="h5">
                        Покращена теплоізоляція
                    </h3>

                    <p class="text-muted mb-0">
                        Краще зберігає температуру димових
                        газів при роботі в холодних умовах
                        або при зовнішньому монтажі.
                    </p>

                </div>

            </div>

        </div>

        {{-- Важливо --}}
        <div class="col-md-4">

            <div class="card h-100 border-0 shadow rounded-4">

                <div class="card-body text-center">

                    <div class="display-5 text-success mb-3">
                        <i class="bi bi-check2-circle"></i>
                    </div>

                    <h3 class="h5">
                        Не лише товщина
                    </h3>

                    <p class="text-muted mb-0">
                        Важливими є також щільність
                        базальтової вати, якість
                        складання сендвіч-труби та
                        правильний монтаж.
                    </p>

                </div>

            </div>

        </div>

    </div>

    <div class="alert alert-warning rounded-4 mt-5">

        <h3 class="h5">
            <i class="bi bi-lightbulb-fill me-2"></i>
            Важливо знати
        </h3>

        <p class="mb-0">
            Товстіший шар утеплювача сам по собі не гарантує кращу роботу
            димоходу. Не менш важливими є марка сталі внутрішньої труби,
            товщина металу, щільність базальтової вати, правильний діаметр
            димоходу та дотримання вимог монтажу.
        </p>

    </div>

</section>
<hr class="my-5">
{{-- Якість базальтової вати --}}
<section class="mb-5">

    <h2 class="fw-bold mb-4">
        Якість базальтової вати
    </h2>

    <p>
        У сендвіч-димоході важлива не лише наявність утеплювача, а й його
        якість. Якщо базальтова вата має низьку щільність або з часом
        просідає, між внутрішньою трубою та зовнішнім кожухом можуть
        утворюватися порожнини, що погіршує теплоізоляційні властивості
        конструкції.
    </p>

    <p>
        Якісний утеплювач рівномірно заповнює простір між трубами, добре
        зберігає форму та допомагає підтримувати стабільну температуру
        внутрішньої труби протягом тривалого часу.
    </p>

    <div class="row g-4 mt-2">

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-success">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        Ознаки якісної базальтової вати
                    </h4>

                    <ul class="mb-0">
                        <li>Висока щільність матеріалу.</li>
                        <li>Стійкість до високих температур.</li>
                        <li>Не підтримує горіння.</li>
                        <li>Не просідає під час експлуатації.</li>
                        <li>Рівномірно заповнює простір у сендвіч-трубі.</li>
                    </ul>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-primary">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        Чому це важливо
                    </h4>

                    <ul class="mb-0">
                        <li>Зменшується охолодження димових газів.</li>
                        <li>Стабільніше працює тяга.</li>
                        <li>Менше утворюється конденсату.</li>
                        <li>Знижується нагрів зовнішнього кожуха.</li>
                        <li>Підвищується довговічність димоходу.</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- Базальтова вата для твердопаливного котла --}}
<section class="mb-5">

    <h2 class="fw-bold mb-4">
        Базальтова вата для твердопаливного котла
    </h2>

    <p>
        У твердопаливних котлах температура димових газів зазвичай значно
        вища, ніж у газових системах. Саме тому утеплення димоходу відіграє
        важливу роль — воно допомагає довше зберігати температуру димових
        газів і підтримувати стабільну роботу димохідної системи.
    </p>

    <p>
        Водночас якісна базальтова вата не може компенсувати неправильний
        вибір матеріалу внутрішньої труби. Для таких систем важливо
        використовувати жаростійку нержавіючу сталь, правильно підібраний
        діаметр димоходу та дотримуватися рекомендацій щодо монтажу.
    </p>

    <div class="row g-4 mt-2">

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-success">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        Переваги утеплення
                    </h4>

                    <ul class="mb-0">
                        <li>Менше охолодження димових газів.</li>
                        <li>Стабільніша природна тяга.</li>
                        <li>Зниження ризику надмірного утворення конденсату.</li>
                        <li>Ефективніша робота димоходу взимку.</li>
                    </ul>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-primary">
                        <i class="bi bi-tools me-2"></i>
                        Що ще необхідно врахувати
                    </h4>

                    <ul class="mb-0">
                        <li>Марку нержавіючої сталі внутрішньої труби.</li>
                        <li>Товщину металу.</li>
                        <li>Правильний діаметр димоходу.</li>
                        <li>Висоту димохідної системи.</li>
                        <li>Наявність ревізії для очищення.</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- Базальтова вата для каміна або печі --}}
<section class="mb-5">

    <h2 class="fw-bold mb-4">
        Базальтова вата для каміна або печі
    </h2>

    <p>
        Для камінів, опалювальних і банних печей характерні високі температури
        димових газів, тому до димохідної системи висуваються підвищені вимоги.
        Базальтова вата допомагає зменшити тепловтрати та підтримувати більш
        стабільну температуру всередині сендвіч-димоходу.
    </p>

    <p>
        Проте ефективність утеплення залежить не лише від теплоізоляції.
        Для таких систем також важливо правильно підібрати марку нержавіючої
        сталі, товщину металу, діаметр димоходу та виконати монтаж відповідно
        до вимог виробника обладнання.
    </p>

    <div class="row g-4 mt-2">

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-success">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        Переваги утеплення
                    </h4>

                    <ul class="mb-0">
                        <li>Зменшується охолодження димових газів.</li>
                        <li>Поліпшується стабільність тяги.</li>
                        <li>Знижується ризик утворення конденсату.</li>
                        <li>Менше нагрівається зовнішній кожух димоходу.</li>
                        <li>Підвищується ефективність роботи системи.</li>
                    </ul>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-primary">
                        <i class="bi bi-fire me-2"></i>
                        Особливості використання
                    </h4>

                    <ul class="mb-0">
                        <li>Підходить для камінів.</li>
                        <li>Використовується для опалювальних печей.</li>
                        <li>Рекомендується для банних печей.</li>
                        <li>Особливо ефективна при зовнішньому монтажі димоходу.</li>
                        <li>Допомагає підтримувати стабільну роботу системи взимку.</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- Типові помилки --}}
<section class="my-5">

    <div class="alert alert-warning rounded-4 shadow-sm">

        <h2 class="h4 mb-3">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            Типові помилки при виборі сендвіч-димоходу
        </h2>

        <ul class="mb-0">

            <li>Вибір димоходу лише за найнижчою ціною.</li>

            <li>Ігнорування марки сталі внутрішньої труби.</li>

            <li>Використання неякісної або занадто щільної теплоізоляції без урахування її характеристик.</li>

            <li>Вибір сендвіч-труби без урахування типу опалювального обладнання.</li>

            <li>Використання одностінної труби на зовнішніх або холодних ділянках.</li>

            <li>Неправильний підбір товщини металу та утеплювача.</li>

            <li>Монтаж без ревізії для подальшого очищення димоходу.</li>

            <li>Недотримання вимог пожежної безпеки під час проходу через перекриття та покрівлю.</li>

        </ul>

    </div>

</section>
<hr class="my-5">
{{-- Пожежна безпека --}}
<section class="mb-5">

    <div class="text-center mb-5">

        <h2 class="fw-bold">
            Базальтова вата і пожежна безпека
        </h2>

        <p class="text-muted">
            Базальтова теплоізоляція підвищує безпеку сендвіч-димоходу, але
            не замінює правильний монтаж і дотримання будівельних норм.
        </p>

    </div>

    <div class="row g-4">

        <div class="col-lg-6">

            <div class="card border-0 shadow rounded-4 h-100">

                <div class="card-body">

                    <div class="display-5 text-warning mb-3">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <h3 class="h4 mb-3">
                        Що забезпечує базальтова вата
                    </h3>

                    <ul class="mb-0">

                        <li>Не підтримує горіння.</li>

                        <li>Витримує дуже високі температури.</li>

                        <li>Зменшує передачу тепла до зовнішнього кожуха.</li>

                        <li>Допомагає знизити нагрівання прилеглих конструкцій.</li>

                        <li>Підвищує безпечність експлуатації сендвіч-димоходу.</li>

                    </ul>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 shadow rounded-4 h-100">

                <div class="card-body">

                    <div class="display-5 text-danger mb-3">
                        <i class="bi bi-exclamation-octagon"></i>
                    </div>

                    <h3 class="h4 mb-3">
                        Що залишається обов'язковим
                    </h3>

                    <ul class="mb-0">

                        <li>Дотримуватися рекомендованих відстаней до горючих матеріалів.</li>

                        <li>Використовувати прохідні вузли для стін і перекриттів.</li>

                        <li>Правильно закріплювати зовнішній димохід.</li>

                        <li>Регулярно очищати систему від сажі.</li>

                        <li>Монтувати димохід відповідно до вимог виробника обладнання.</li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- FAQ --}}
<section class="container-1600 py-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold display-6 mb-3">
            Часті питання про базальтову вату для димоходів
        </h2>
        <div class="mx-auto bg-warning" style="width:60px;height:3px;"></div>
    </div>

    <div class="accordion" id="faqBasaltAccordion">

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#basaltFaq1">
                    Для чого потрібна базальтова вата в сендвіч-димоході?
                </button>
            </h3>

            <div id="basaltFaq1"
                 class="accordion-collapse collapse show"
                 data-bs-parent="#faqBasaltAccordion">

                <div class="accordion-body">
                    Базальтова вата виконує роль теплоізоляційного шару між
                    внутрішньою трубою та зовнішнім кожухом. Вона допомагає
                    зменшити охолодження димових газів, підтримати стабільну
                    тягу та знизити утворення конденсату.
                </div>

            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#basaltFaq2">
                    Чи горить базальтова вата?
                </button>
            </h3>

            <div id="basaltFaq2"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqBasaltAccordion">

                <div class="accordion-body">
                    Базальтова вата належить до негорючих теплоізоляційних
                    матеріалів, тому широко використовується в сендвіч-димоходах
                    та інших конструкціях, де важлива пожежна безпека.
                </div>

            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#basaltFaq3">
                    Чи впливає утеплення на тягу?
                </button>
            </h3>

            <div id="basaltFaq3"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqBasaltAccordion">

                <div class="accordion-body">
                    Так. Базальтова вата допомагає довше зберігати температуру
                    димових газів, що сприяє стабільнішій роботі димоходу,
                    особливо в холодну пору року.
                </div>

            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#basaltFaq4">
                    Чи можна використовувати одностінну трубу на вулиці?
                </button>
            </h3>

            <div id="basaltFaq4"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqBasaltAccordion">

                <div class="accordion-body">
                    Для зовнішнього монтажу зазвичай рекомендують утеплений
                    сендвіч-димохід, оскільки він краще зберігає температуру
                    димових газів і зменшує ризик утворення конденсату.
                </div>

            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#basaltFaq5">
                    Яка товщина утеплювача краща?
                </button>
            </h3>

            <div id="basaltFaq5"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqBasaltAccordion">

                <div class="accordion-body">
                    Вибір залежить від типу обладнання, місця встановлення та
                    умов експлуатації. Важливо враховувати не лише товщину,
                    а й якість базальтової вати та конструкцію димоходу.
                </div>

            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#basaltFaq6">
                    Чи достатньо тільки якісної базальтової вати?
                </button>
            </h3>

            <div id="basaltFaq6"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqBasaltAccordion">

                <div class="accordion-body">
                    Ні. Для надійної роботи важливо також правильно підібрати
                    марку сталі, товщину металу, діаметр димоходу та виконати
                    монтаж відповідно до рекомендацій виробника.
                </div>

            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#basaltFaq7">
                    Для яких систем використовують сендвіч-димоходи?
                </button>
            </h3>

            <div id="basaltFaq7"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqBasaltAccordion">

                <div class="accordion-body">
                    Сендвіч-димоходи використовують для газових,
                    твердопаливних і пелетних котлів, камінів,
                    опалювальних та банних печей, особливо якщо
                    димохід проходить зовні будівлі.
                </div>

            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#basaltFaq8">
                    Чи потрібно обслуговувати утеплений димохід?
                </button>
            </h3>

            <div id="basaltFaq8"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqBasaltAccordion">

                <div class="accordion-body">
                    Так. Будь-який димохід потребує періодичного огляду,
                    перевірки герметичності та очищення від сажі відповідно
                    до інтенсивності використання.
                </div>

            </div>
        </div>

    </div>

</section>
<section class="my-5">
    <div class="p-4 p-md-5 rounded-4 text-center shadow-sm" 
         style="background: linear-gradient(135deg, #f97316, #fb923c);">
        
        <h2 class="text-white fw-bold mb-3">
            Потрібен якісний димохід?
        </h2>

        <p class="text-white mb-4 fs-5">
            Підберемо комплект димоходу під ваш котел, камін або піч.
            Допоможемо розрахувати діаметр, матеріал і необхідні елементи.
        </p>

        <div class="d-flex flex-column flex-md-row justify-content-center gap-3">

            <a href="{{ route('shop.index') }}" 
               class="btn btn-light btn-lg px-4 fw-semibold">
                <i class="bi bi-grid me-2"></i>
                Перейти до каталогу
            </a>

           <a href="{{ route('contacts.index') }}"
               class="btn btn-outline-light btn-lg px-4 fw-semibold">
                <i class="bi bi-chat-dots me-2"></i>
                Отримати консультацію
            </a>

        </div>

    </div>
</section>
<section class="my-5">

    <h2 class="fw-bold mb-4">
        Читайте також
    </h2>


    <div class="row g-4">

        <div class="col-md-4">
            <a href="{{ route('blog.steel-grades') }}"
               class="text-decoration-none">

                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body">

                        <div style="height:220px; overflow:hidden;">
    <img src="{{ asset('images/chimney/grade1.webp') }}"
         alt="Сажа в димоході"
         class="w-100 h-100"
         style="object-fit:cover;">
</div>

                        <h3 class="h5 text-dark fw-bold mt-2">
                            Марки сталі для димоходів
                        </h3>

                        <p class="text-muted mb-0">
                            Чим відрізняється AISI 304, 321 та інші марки сталі.
                            Яку сталь вибрати для вашого опалення.
                        </p>
                         <a href="{{ route('blog.steel-grades') }}"
   class="btn btn-outline-orange mt-4">
    Читати статтю
</a>

                    </div>
                </div>

            </a>
        </div>


        <div class="col-md-4">
             <a href="{{ route('blog.soot') }}"
               class="text-decoration-none">

                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body">

                       <div style="height:220px; overflow:hidden;">
    <img src="{{ asset('images/chimney/soot.webp') }}"
         alt="Сажа в димоході"
         class="w-100 h-100"
         style="object-fit:cover;">
</div>

                        <h3 class="h5 text-dark fw-bold mt-2">
                            Сажа в димоході: причини та рішення
                        </h3>

                        <p class="text-muted mb-0">
                            Чому накопичується сажа, як уникнути займання
                            та правильно обслуговувати систему.
                        </p>
                         <a href="{{ route('blog.soot') }}"
   class="btn btn-outline-orange mt-4">
    Читати статтю
</a>

                    </div>
                </div>

            </a>
        </div>


        <div class="col-md-4">
            <a href="{{ route('chimney.installation-rules') }}" 
               class="text-decoration-none">

                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body">

                        <div style="height:220px; overflow:hidden;">
    <img src="{{ asset('images/chimney/montage.webp') }}"
         alt="Монтаж димоходу"
         class="w-100 h-100"
         style="object-fit:cover;">
</div>

                        <h3 class="h5 text-dark fw-bold mt-2">
                            Монтаж димоходу
                        </h3>

                        <p class="text-muted mb-0">
                        Основні правила безпечного встановлення димоходної системи.
                        </p>
 <a href="{{ route('chimney.installation-rules') }}"
                   class="btn btn-outline-orange mt-4">
                    Детальніше
                </a>
                    </div>
                </div>

            </a>
        </div>


    </div>

</section>
<style>
/* Ефект наведення для хлібних кришок */
.breadcrumb-item a {
    transition: color 0.2s ease-in-out;
}

.breadcrumb-item a:hover {
    color: #ea580c !important; /* Ваш фірмовий помаранчевий колір */
    text-decoration: underline !important; /* Підкреслення для кращого акценту */
}
  .btn-outline-orange {
    color: #ff7a00;
    border-color: #ff7a00;
}

.btn-outline-orange:hover {
    color: #fff;
    background-color: #ff7a00;
    border-color: #ff7a00;
}
</style>
@endsection
@push('schema-article')
<script type="application/ld+json">
{!! json_encode([
  '@' . 'context' => 'https://schema.org',
  '@type' => 'Article',

  '@id' => url('/blog/bazaltova-vata-dlya-dimohodiv#article'),
  'headline' => 'Базальтова вата для сендвіч-димоходів',
  'url' => url('/blog/bazaltova-vata-dlya-dimohodiv'),

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
      'name' => 'Марки сталі для димоходів',
      'item' => url('/blog/marky-stali-dlya-dymohodiv')
    ],
    [
      '@type' => 'ListItem',
      'position' => 4,
      'name' => 'Базальтова вата для сендвіч-димоходів',
     'item' => [
        '@id' => url('/blog/bazaltova-vata-dlya-dimohodiv'),
        'name' => 'Базальтова вата для сендвіч-димоходів'
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