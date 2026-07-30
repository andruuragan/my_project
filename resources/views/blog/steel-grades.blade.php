@extends('layouts.main')

@section('title', 'Марки сталі для димоходів | DymSystems')
@section('description', 'Марки сталі для димоходів AISI 201, 304, 316 та 321. Порівняння властивостей, жаростійкості, корозійної стійкості та рекомендації щодо вибору для газових, твердопаливних котлів, печей і камінів.')
@section('content')

<div class="container py-5">
      {{-- Навігаційні крихти (Breadcrumbs) --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
    <a href="{{ route('main.index') }}" class="text-decoration-none text-muted">Головна</a>
</li>
<li class="breadcrumb-item">
    <a href="{{ route('useful.index') }}" class="text-decoration-none text-muted">Корисна інформація</a>
</li>
            <li class="breadcrumb-item active" aria-current="page" style="color: #ea580c;">Марки сталі для димоходів</li>
        </ol>
    </nav>

    {{-- Заголовок --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold display-5">
            Марки сталі для димоходів
        </h1>
        <p class="text-muted small">
    Актуально станом на 2026 рік
</p>

        <p class="lead text-muted mx-auto" style="max-width:850px;">
            Порівняння нержавіючих сталей AISI 201, AISI 304, AISI 316 та AISI 321.
            Дізнайтеся, яка марка найкраще підходить для газового котла,
            твердопаливного котла, каміна чи банної печі.
        </p>
    </div>

    {{-- Місце під банер --}}
    <div class="mb-5">

        {{-- Потім вставиш сюди картинку --}}
        <div class="rounded-4 border overflow-hidden shadow-sm">

            <img src="{{ asset('images/chimney/grade.webp') }}"
                 alt="Марки сталі для димоходів"
                 class="img-fluid w-100">

        </div>

    </div>

    {{-- Швидкий зміст --}}
    <div class="card border-0 shadow-sm rounded-4 mb-5">

        <div class="card-body p-4">

            <h3 class="mb-3">
                <i class="bi bi-list-check text-warning me-2"></i>
                У статті
            </h3>

            <div class="row">

                <div class="col-md-6">

                    <ul class="mb-0">
                        <li>AISI 201</li>
                        <li>AISI 304</li>
                        <li>AISI 316</li>
                        <li>AISI 321</li>
                    </ul>

                </div>

                <div class="col-md-6">

                    <ul class="mb-0">
                        <li>Порівняння марок сталі</li>
                        <li>Яку сталь обрати</li>
                        <li>Типові помилки</li>
                        <li>FAQ</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>

    {{-- Початок статті --}}
    <section class="mb-5">

        <h2 class="fw-bold mb-4">
            Чому марка сталі має значення?
        </h2>

        <p class="fs-5">
            Правильно підібрана марка нержавіючої сталі безпосередньо впливає
            на довговічність, безпечність та ефективність роботи димохідної
            системи. Від неї залежить стійкість до високих температур,
            конденсату, кислотного середовища та корозії.
        </p>

        <p>
            Для газових котлів, твердопаливного обладнання, камінів і банних
            печей вимоги до матеріалу відрізняються, тому універсального
            рішення не існує.
        </p>

    </section>

    <div class="row g-4 mb-5">

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow rounded-4">
            <div class="card-body text-center">
                
                <h3 class="text-warning">AISI 201</h3>
                <p class="small text-muted">
                    Економічне рішення для газових систем.
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow rounded-4">
            <div class="card-body text-center">
                <h3 class="text-warning">AISI 304</h3>
                <p class="small text-muted">
                    Універсальна сталь з гарною корозійною стійкістю.
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow rounded-4">
            <div class="card-body text-center">
                <h3 class="text-warning">AISI 316</h3>
                <p class="small text-muted">
                    Для агресивного конденсату та складних умов.
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow rounded-4">
            <div class="card-body text-center">
                <h3 class="text-warning">AISI 321</h3>
                <p class="small text-muted">
                    Для печей, камінів і твердопаливних котлів.
                </p>
            </div>
        </div>
    </div>

</div>


{{-- Порівняння марок сталі --}}
<section class="mb-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">Порівняння марок сталі</h2>
        <p class="text-muted">
            Коротке порівняння найпоширеніших марок нержавіючої сталі для димоходів.
        </p>
    </div>

    <div class="table-responsive">

        <table class="table table-bordered table-hover align-middle shadow-sm">

            <thead class="table-warning">

                <tr>
                    <th>Марка сталі</th>
                    <th>Корозійна стійкість</th>
                    <th>Жаростійкість</th>
                    <th>Рекомендоване застосування</th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <td><strong>AISI 201</strong></td>
                    <td>★★★☆☆</td>
                    <td>★★☆☆☆</td>
                    <td>Газові котли, колонки, зовнішній кожух сендвіч-димоходу</td>
                </tr>

                <tr>
                    <td><strong>AISI 304</strong></td>
                    <td>★★★★☆</td>
                    <td>★★★☆☆</td>
                    <td>Газові котли, універсальні побутові системи</td>
                </tr>

                <tr>
                    <td><strong>AISI 316</strong></td>
                    <td>★★★★★</td>
                    <td>★★★☆☆</td>
                    <td>Конденсаційні котли, агресивне середовище</td>
                </tr>

                <tr>
                    <td><strong>AISI 321</strong></td>
                    <td>★★★★☆</td>
                    <td>★★★★★</td>
                    <td>Твердопаливні котли, каміни, печі, банні печі</td>
                </tr>

            </tbody>

        </table>

    </div>

</section>
<hr class="my-5">
<section class="mb-5">

    <h2 class="fw-bold mb-4">
        AISI 201
    </h2>

    <p>
        <strong>AISI 201</strong> — доступна марка нержавіючої сталі, яка
        застосовується переважно в побутових димохідних системах із
        невисокими температурними навантаженнями. Найчастіше її
        використовують для газових котлів, колонок та зовнішнього кожуха
        сендвіч-димоходів.
    </p>

    <div class="row g-4 mt-2">

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-success">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        Переваги
                    </h4>

                    <ul class="mb-0">
                        <li>Доступна ціна.</li>
                        <li>Стійкість до побутових умов експлуатації.</li>
                        <li>Добре підходить для газового обладнання.</li>
                    </ul>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-primary">
                        <i class="bi bi-tools me-2"></i>
                        Де застосовується
                    </h4>

                    <ul class="mb-0">
                        <li>Газові котли.</li>
                        <li>Газові колонки.</li>
                        <li>Зовнішній кожух сендвіч-димоходу.</li>
                        <li>Системи з невисокою температурою димових газів.</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">

{{-- AISI 304 --}}
<section class="mb-5">

    <h2 class="fw-bold mb-4">
        AISI 304
    </h2>

    <p>
        <strong>AISI 304</strong> — одна з найпопулярніших марок нержавіючої сталі
        для димохідних систем. Вона має високу стійкість до корозії, добре
        переносить вплив вологи та конденсату і вважається універсальним
        рішенням для більшості побутових газових котлів.
    </p>

    <div class="row g-4 mt-2">

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-success">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        Переваги
                    </h4>

                    <ul class="mb-0">
                        <li>Висока корозійна стійкість.</li>
                        <li>Добре переносить утворення конденсату.</li>
                        <li>Тривалий термін служби.</li>
                        <li>Універсальне рішення для більшості газових систем.</li>
                    </ul>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-primary">
                        <i class="bi bi-tools me-2"></i>
                        Де застосовується
                    </h4>

                    <ul class="mb-0">
                        <li>Газові котли.</li>
                        <li>Турбовані котли.</li>
                        <li>Внутрішні труби сендвіч-димоходів.</li>
                        <li>Системи з підвищеною вологістю.</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- AISI 316 --}}
<section class="mb-5">

    <h2 class="fw-bold mb-4">
        AISI 316
    </h2>

    <p>
        <strong>AISI 316</strong> — високоякісна нержавіюча сталь із додаванням
        молібдену, що забезпечує підвищену стійкість до корозії та кислотного
        конденсату. Саме тому її часто використовують у димохідних системах,
        які працюють в умовах підвищеної вологості та агресивного середовища.
    </p>

    <p>
        Хоча AISI 316 коштує дорожче за AISI 304, вона має значно більший
        ресурс у складних умовах експлуатації. Це один із найкращих варіантів
        для сучасних конденсаційних газових котлів.
    </p>

    <div class="row g-4 mt-2">

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-success">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        Переваги
                    </h4>

                    <ul class="mb-0">
                        <li>Максимальна стійкість до кислотного конденсату.</li>
                        <li>Дуже висока корозійна стійкість.</li>
                        <li>Тривалий термін служби навіть у складних умовах.</li>
                        <li>Оптимальний вибір для конденсаційних котлів.</li>
                    </ul>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-primary">
                        <i class="bi bi-tools me-2"></i>
                        Де застосовується
                    </h4>

                    <ul class="mb-0">
                        <li>Конденсаційні газові котли.</li>
                        <li>Системи з активним утворенням конденсату.</li>
                        <li>Димоходи, що працюють в агресивному середовищі.</li>
                        <li>Об'єкти з підвищеними вимогами до довговічності.</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">
{{-- AISI 321 --}}
<section class="mb-5">

    <h2 class="fw-bold mb-4">
        AISI 321
    </h2>

    <p>
        <strong>AISI 321</strong> — жаростійка нержавіюча сталь, легована титаном,
        яка спеціально призначена для роботи при високих температурах. Вона
        зберігає міцність під час тривалого нагрівання та добре витримує
        значні теплові навантаження, що робить її одним із найкращих матеріалів
        для високотемпературних димохідних систем.
    </p>

    <p>
        AISI 321 широко застосовується для твердопаливних котлів, камінів,
        печей і банних печей. У таких системах температура димових газів може
        бути значно вищою, ніж у газових котлах, тому важливо використовувати
        сталь, яка розрахована на роботу в подібних умовах.
    </p>

    <div class="row g-4 mt-2">

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-success">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        Переваги
                    </h4>

                    <ul class="mb-0">
                        <li>Висока жаростійкість.</li>
                        <li>Добре переносить тривале нагрівання.</li>
                        <li>Підходить для інтенсивної експлуатації.</li>
                        <li>Тривалий термін служби при високих температурах.</li>
                    </ul>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 bg-light h-100">

                <div class="card-body">

                    <h4 class="text-primary">
                        <i class="bi bi-tools me-2"></i>
                        Де застосовується
                    </h4>

                    <ul class="mb-0">
                        <li>Твердопаливні котли.</li>
                        <li>Каміни.</li>
                        <li>Опалювальні печі.</li>
                        <li>Банні печі.</li>
                        <li>Ділянки димоходу з високими температурними навантаженнями.</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>
<hr class="my-5">









{{-- Яку сталь обрати --}}
<section class="my-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold">
            Яку марку сталі обрати?
        </h2>

        <p class="text-muted">
            Вибір залежить від типу опалювального обладнання та умов експлуатації.
        </p>
    </div>

    <div class="row g-4">

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow rounded-4">
                <div class="card-body text-center">

                    <div class="display-5 text-warning mb-3">
                        <i class="bi bi-fire"></i>
                    </div>

                    <h4>Газовий котел</h4>

                    <p class="text-muted">
                        Найчастіше рекомендують
                        <strong>AISI 304</strong>.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow rounded-4">
                <div class="card-body text-center">

                    <div class="display-5 text-primary mb-3">
                        <i class="bi bi-droplet-half"></i>
                    </div>

                    <h4>Конденсаційний котел</h4>

                    <p class="text-muted">
                        Найкращий вибір —
                        <strong>AISI 316</strong>.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow rounded-4">
                <div class="card-body text-center">

                    <div class="display-5 text-danger mb-3">
                        <i class="bi bi-thermometer-sun"></i>
                    </div>

                    <h4>Твердопаливний котел</h4>

                    <p class="text-muted">
                        Оптимально —
                        <strong>AISI 321</strong>.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow rounded-4">
                <div class="card-body text-center">

                    <div class="display-5 text-success mb-3">
                        <i class="bi bi-house-heart"></i>
                    </div>

                    <h4>Камін або банна піч</h4>

                    <p class="text-muted">
                        Рекомендується
                        <strong>AISI 321</strong>.
                    </p>

                </div>
            </div>
        </div>

    </div>

</section>

<section class="my-5">

    <div class="alert alert-warning rounded-4 shadow-sm">

        <h2 class="h4 mb-3">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            Типові помилки при виборі димоходу
        </h2>

        <ul class="mb-0">

            <li>Орієнтуватися лише на найнижчу ціну.</li>

            <li>Враховувати тільки товщину металу, ігноруючи марку сталі.</li>

            <li>Використовувати AISI 201 для високотемпературних печей.</li>

            <li>Не враховувати утворення конденсату.</li>

            <li>Ігнорувати рекомендації виробника котла або печі.</li>

            <li>Неправильно підбирати діаметр димоходу.</li>

        </ul>

    </div>

</section>

<section class="container-1600 py-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold display-6 mb-3">
            Часті питання про марки сталі для димоходів
        </h2>
        <div class="mx-auto bg-warning" style="width:60px;height:3px;"></div>
    </div>

    <div class="accordion" id="faqSteelAccordion">

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#steelFaq1">
                    Яка марка сталі найкраще підходить для димоходу?
                </button>
            </h3>

            <div id="steelFaq1"
                 class="accordion-collapse collapse show"
                 data-bs-parent="#faqSteelAccordion">

                <div class="accordion-body">
                    Універсальної марки сталі не існує. Вибір залежить від типу
                    опалювального обладнання, температури димових газів,
                    утворення конденсату та рекомендацій виробника.
                </div>

            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#steelFaq2">
                    Чим AISI 304 відрізняється від AISI 201?
                </button>
            </h3>

            <div id="steelFaq2"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqSteelAccordion">

                <div class="accordion-body">
                    AISI 304 має вищу стійкість до корозії та краще переносить
                    вплив вологи й конденсату. AISI 201 є більш доступною за
                    ціною та зазвичай використовується в менш навантажених
                    умовах.
                </div>

            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#steelFaq3">
                    Коли варто використовувати AISI 316?
                </button>
            </h3>

            <div id="steelFaq3"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqSteelAccordion">

                <div class="accordion-body">
                    AISI 316 рекомендують для систем із підвищеним утворенням
                    кислотного конденсату, зокрема для багатьох
                    конденсаційних газових котлів та інших агресивних умов
                    експлуатації.
                </div>

            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#steelFaq4">
                    Чому AISI 321 рекомендують для твердопаливних котлів?
                </button>
            </h3>

            <div id="steelFaq4"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqSteelAccordion">

                <div class="accordion-body">
                    AISI 321 є жаростійкою нержавіючою сталлю, яка добре
                    витримує тривалу роботу при високих температурах. Саме
                    тому її часто використовують для твердопаливних котлів,
                    печей, камінів і банних печей.
                </div>

            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#steelFaq5">
                    Чи достатньо обирати димохід тільки за товщиною металу?
                </button>
            </h3>

            <div id="steelFaq5"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqSteelAccordion">

                <div class="accordion-body">
                    Ні. Важливо враховувати не лише товщину металу, а й марку
                    сталі, температуру димових газів, тип палива та умови
                    експлуатації. Лише правильне поєднання цих параметрів
                    забезпечує довговічність димоходу.
                </div>

            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#steelFaq6">
                    Яка сталь підходить для банної печі?
                </button>
            </h3>

            <div id="steelFaq6"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqSteelAccordion">

                <div class="accordion-body">
                    Для банних печей найчастіше використовують жаростійку
                    нержавіючу сталь AISI 321. Вона краще переносить високі
                    температурні навантаження, характерні для такого
                    обладнання.
                </div>

            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#steelFaq7">
                    Чи впливає марка сталі на термін служби димоходу?
                </button>
            </h3>

            <div id="steelFaq7"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqSteelAccordion">

                <div class="accordion-body">
                    Так. Правильно підібрана марка нержавіючої сталі допомагає
                    краще протистояти корозії, високим температурам і
                    конденсату, що безпосередньо впливає на ресурс
                    димохідної системи.
                </div>

            </div>
        </div>

        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed fw-bold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#steelFaq8">
                    Чи можна використовувати AISI 201 для твердопаливного котла?
                </button>
            </h3>

            <div id="steelFaq8"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqSteelAccordion">

                <div class="accordion-body">
                    Для більшості твердопаливних котлів, печей і камінів
                    зазвичай рекомендують жаростійкі марки сталі, наприклад
                    AISI 321. Остаточний вибір слід робити з урахуванням
                    рекомендацій виробника обладнання.
                </div>

            </div>
        </div>

    </div>

</section>
{{-- Заклик до дії --}}
<section class="py-5 bg-light border-top">

    <div class="container-1600">

        <div class="text-center">

            <h2 class="fw-bold mb-3">
                Не впевнені, яку сталь обрати?
            </h2>

            <p class="text-muted fs-5 mx-auto mb-4" style="max-width: 800px;">
                Допоможемо підібрати димохід з урахуванням типу котла, температурного
                режиму та умов експлуатації. Наші спеціалісти підкажуть оптимальне
                рішення саме для вашого обладнання.
            </p>

            <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">

                <a href="{{ route('shop.index') }}"
                   class="btn btn-warning btn-lg px-5">
                    <i class="bi bi-grid me-2"></i>
                    Перейти до каталогу
                </a>

                <a href="{{ route('contacts.index') }}"
                   class="btn btn-outline-dark btn-lg px-5">
                    <i class="bi bi-chat-dots me-2"></i>
                    Отримати консультацію
                </a>

            </div>

        </div>

    </div>

</section>


{{-- Читайте також --}}
<section class="py-5">

    <div class="container-1600">

        <div class="text-center mb-5">
            <h2 class="fw-bold">
                Читайте також
            </h2>

            <p class="text-muted">
                Корисні статті, які допоможуть краще розібратися в особливостях
                димохідних систем.
            </p>
        </div>

      <div class="row g-4">

    {{-- Стаття 1 --}}
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow rounded-4">

           <div style="height:220px; overflow:hidden;">
    <img src="{{ asset('images/chimney/basalt.webp') }}"
         alt="Базальтова вата"
         class="w-100 h-100"
         style="object-fit:cover;">
</div>

            <div class="card-body">

                <h3 class="h4">
                    Базальтова вата для сендвіч-димоходів
                </h3>

                <p class="text-muted">
                    Чому саме базальтова ізоляція використовується
                    в сендвіч-димоходах, яку температуру вона
                    витримує та як впливає на безпеку системи.
                </p>

                <a href="{{ route('blog.basalt-wool') }}"
                   class="btn btn-outline-orange">
                    Читати статтю
                </a>

            </div>

        </div>
    </div>

    {{-- Стаття 2 --}}
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow rounded-4">

            <div style="height:220px; overflow:hidden;">
    <img src="{{ asset('images/chimney/soot.webp') }}"
         alt="Сажа в димоході"
         class="w-100 h-100"
         style="object-fit:cover;">
</div>

            <div class="card-body">

                <h3 class="h4">
                    Сажа в димоході: причини та способи очищення
                </h3>

                <p class="text-muted">
                    Чому утворюється сажа, чим вона небезпечна,
                    як часто потрібно чистити димохід та як
                    зменшити її накопичення.
                </p>

               <a href="{{ route('blog.soot') }}"
   class="btn btn-outline-orange">
    Читати статтю
</a>

            </div>

        </div>
    </div>

    {{-- Калькулятор --}}
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow rounded-4">

           <div style="height:220px; overflow:hidden;">
    <img src="{{ asset('images/chimney/calculator.webp') }}"
         alt="Онлайн-калькулятор димоходу"
         class="w-100 h-100"
         style="object-fit:cover;">
</div>

            <div class="card-body">

                <h3 class="h4">
                    Онлайн-калькулятор димоходу
                </h3>

                <p class="text-muted">
                    Вкажіть тип обладнання, діаметр і параметри димоходу —
                    калькулятор автоматично сформує рекомендований комплект.
                </p>

                <a href="{{ route('chimney.calculator') }}"
                   class="btn btn-outline-orange">
                    Перейти до розрахунку
                </a>

            </div>

        </div>
    </div>

</div>

    </div>

</section>
</div>

<style>
    .btn-outline-orange {
    color: #ff7a00;
    border-color: #ff7a00;
}

.btn-outline-orange:hover {
    color: #fff;
    background-color: #ff7a00;
    border-color: #ff7a00;
}
 /* Ефект наведення для хлібних кришок */
.breadcrumb-item a {
    transition: color 0.2s ease-in-out;
}

.breadcrumb-item a:hover {
    color: #ea580c !important; /* Ваш фірмовий помаранчевий колір */
    text-decoration: underline !important; /* Підкреслення для кращого акценту */
}
</style>
@endsection
@push('schema-article')
<script type="application/ld+json">
{!! json_encode([
  '@' . 'context' => 'https://schema.org',
  '@type' => 'Article',

  '@id' => url('/blog/marky-stali-dlya-dymohodiv'),
  'headline' => 'Марки сталі для димоходів',
  'url' => url('/blog/marky-stali-dlya-dymohodiv'),

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
      'item' => [
        '@id' => url('/blog/marky-stali-dlya-dymohodiv'),
        'name' => 'Марки сталі для димоходів'
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