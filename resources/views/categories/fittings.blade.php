@extends('layouts.main')

@section('title', __('fittings.title'))

@section('description', __('fittings.description'))
@section('content')

<div class="container-1600 py-5">

    {{-- Breadcrumbs --}}
  <nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{ route('main.index') }}"
               class="text-decoration-none text-black-50 hover-orange">
                {{ __('fittings.breadcrumb_home') }}
            </a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('categories.index') }}"
               class="text-decoration-none text-black-50 hover-orange">
                {{ __('fittings.breadcrumb_categories') }}
            </a>
        </li>

        <li class="breadcrumb-item active" aria-current="page">
            <span style="color:#f97316;font-weight:500;">
                {{ __('fittings.breadcrumb_title') }}
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
    {{ __('fittings.hero_title') }}
</h1>

<p class="lead text-muted mx-auto" style="max-width:850px;">
    {{ __('fittings.hero_description') }}
</p>

        <div class="d-flex justify-content-center flex-wrap gap-2 mt-4">

    <span class="badge bg-light text-dark border px-3 py-2">
        <i class="bi bi-check-circle-fill text-success me-1"></i>
        {{ __('fittings.badge_brackets') }}
    </span>

    <span class="badge bg-light text-dark border px-3 py-2">
        <i class="bi bi-check-circle-fill text-success me-1"></i>
        {{ __('fittings.badge_clamps') }}
    </span>

    <span class="badge bg-light text-dark border px-3 py-2">
        <i class="bi bi-check-circle-fill text-success me-1"></i>
        {{ __('fittings.badge_passage') }}
    </span>

    <span class="badge bg-light text-dark border px-3 py-2">
        <i class="bi bi-check-circle-fill text-success me-1"></i>
        {{ __('fittings.badge_components') }}
    </span>

</div>

    </div>

    {{-- КАРТОЧКИ --}}
 <section id="selection">

    <div class="text-center mb-5">

       <span class="badge bg-warning text-dark mb-3">
    {{ __('fittings.category_badge') }}
</span>

<h2 class="fw-bold">
    {{ __('fittings.category_title') }}
</h2>

<p class="text-muted">
    {{ __('fittings.category_description') }}
</p>

    </div>


    <div class="row g-4">

@foreach([
    [
        'key' => 'Кронштейн',
        'name' => __('fittings.product_bracket'),
        'img'  => '86d27faa44533c26c486b4c165461af66455b904.webp',
        'description' => __('fittings.product_bracket_description')
    ],
    [
        'key' => 'Розвант. підставка',
        'name' => __('fittings.product_unloading_stand'),
        'img'  => '6c6786f2e63db2cc3abd5b287d9dc0f250f4cac1.webp',
        'description' => __('fittings.product_unloading_stand_description')
    ],
    [
        'key' => 'Обжимний хомут',
        'name' => __('fittings.product_clamp'),
        'img'  => '50817907640bd467b51a06152782d9c1633c39c1.webp',
        'description' => __('fittings.product_clamp_description')
    ],
    [
        'key' => 'Хомут під розтяжки',
        'name' => __('fittings.product_stretch_clamp'),
        'img'  => '7a923d0ebf494627edbedb11da6ecf26f1d2e739.webp',
        'description' => __('fittings.product_stretch_clamp_description')
    ],
    [
        'key' => 'Стіновий хомут',
        'name' => __('fittings.product_wall_clamp'),
        'img'  => '7c724e0af75f91731229019244efae9cb5d5b77b.webp',
        'description' => __('fittings.product_wall_clamp_description')
    ],
    [
        'key' => 'Монтажний хомут',
        'name' => __('fittings.product_mounting_clamp'),
        'img'  => '2a028b8820ce315c5c15fcbb2d423fe823c15946.webp',
        'description' => __('fittings.product_mounting_clamp_description')
    ],
    [
        'key' => 'Скоба',
        'name' => __('fittings.product_brace'),
        'img'  => '2a9fd38e010c2bad45e05612b24ace6d7efdfe63.webp',
        'description' => __('fittings.product_brace_description')
    ],
    [
        'key' => 'Дека',
        'name' => __('fittings.product_deka'),
        'img'  => 'ca88966ad49888492f5f78dc4ca394d8fe1f775b.webp',
        'description' => __('fittings.product_deka_description')
    ],
    [
        'key' => 'Криза',
        'name' => __('fittings.product_criza'),
        'img'  => 'e5cb3a0e461cd2f1c716b651b97e5a851f707b3d.webp',
        'description' => __('fittings.product_criza_description')
    ],
    [
        'key' => 'Прохід',
        'name' => __('fittings.product_passage'),
        'img'  => 'fa4508f8310bb8ce985355a408967b3509577cf2.webp',
        'description' => __('fittings.product_passage_description')
    ],
    [
        'key' => 'Окапник',
        'name' => __('fittings.product_drip'),
        'img'  => 'c50692a896069ce5c20e71fe37119af64ab99845.webp',
        'description' => __('fittings.product_drip_description')
    ],
    [
        'key' => 'Розета',
        'name' => __('fittings.product_rosette'),
        'img'  => 'b1d16c291c9d33ee26085e297703c90efef1239e.webp',
        'description' => __('fittings.product_rosette_description')
    ],
    [
        'key' => 'Лійка',
        'name' => __('fittings.product_funnel'),
        'img'  => '80731c12dd76219b0954f38d138107e784d693ac.webp',
        'description' => __('fittings.product_funnel_description')
    ],
    [
        'key' => 'Заглушка',
        'name' => __('fittings.product_plug'),
        'img'  => '70f9709ad093575e0fd014ac3fb5b565c6cc5d7e.webp',
        'description' => __('fittings.product_plug_description')
    ],
    [
        'key' => 'Закінчення димоходу',
        'name' => __('fittings.product_chimney_top'),
        'img'  => 'b8621901edf97997d2fdbc0402944ed1507259f5.webp',
        'description' => __('fittings.product_chimney_top_description')
    ],
    [
        'key' => 'Конус',
        'name' => __('fittings.product_cone'),
        'img'  => '497df0f94590eb6627e84cf787904225b8498530.webp',
        'description' => __('fittings.product_cone_description')
    ],
    [
        'key' => 'Грибок',
        'name' => __('fittings.product_cap'),
        'img'  => 'ae60c4c7157b3a2c8b6856c55f9004e3b7a1b6e3.webp',
        'description' => __('fittings.product_cap_description')
    ],
    [
        'key' => 'Термоґрибок',
        'name' => __('fittings.product_thermo_cap'),
        'img'  => '1d855c94e9a8b7971f6470c818282c3177472122.webp',
        'description' => __('fittings.product_thermo_cap_description')
    ],
    [
        'key' => 'Волпер',
        'name' => __('fittings.product_volper'),
        'img'  => '7372de8d9cc1d6bafd52e03939d198ac9f2f7749.webp',
        'description' => __('fittings.product_volper_description')
    ],
    [
        'key' => 'Іскрогасник',
        'name' => __('fittings.product_spark_arrester'),
        'img'  => '2b418f4fd415ddc6b5e4b4a1bf88942031a82f3c.webp',
        'description' => __('fittings.product_spark_arrester_description')
    ],
    [
        'key' => 'Відображувач',
        'name' => __('fittings.product_reflector'),
        'img'  => '374f27f32989de18def1ba62797a9734f820a44d.webp',
        'description' => __('fittings.product_reflector_description')
    ],
    [
        'key' => 'Старт-сендвіч',
        'name' => __('fittings.product_start_sandwich'),
        'img'  => '3a5834a31a698234418276d0333da7134679ccf4.webp',
        'description' => __('fittings.product_start_sandwich_description')
    ],
] as $item)

 <div class="col-6 col-md-4 col-lg-2">

            <button
                class="card h-100 border-0 shadow-sm custom-product-card solution-card fitting-card w-100"
              data-name="{{ $item['key'] }}">

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
    {{ __('fittings.select_button') }}
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
    {{ __('fittings.step_2') }}
</span>

<h2 class="fw-bold">
    {{ __('fittings.diameter_title') }}
</h2>

    <p class="text-muted">
    {{ __('fittings.diameter_description_before') }}
    <span id="selectedName" class="fw-semibold text-decoration-underline"></span>
    {{ __('fittings.diameter_description_after') }}
</p>

    </div>

    <div id="diameters" class="row g-3 justify-content-center">

    </div>

</div>

<section class="mt-5 pt-5">

    <div class="text-center mb-5">

      <span class="badge bg-warning text-dark mb-3">
    {{ __('fittings.scheme_badge') }}
</span>

<h2 class="fw-bold">
    {{ __('fittings.scheme_title') }}
</h2>

<p class="text-muted">
    {{ __('fittings.scheme_description') }}
</p>

    </div>

    <div class="text-center">

    <img 
    src="{{ asset(app()->getLocale() === 'ru'
        ? 'images/chimney/fittings-schemeru.webp'
        : 'images/chimney/fittings-scheme.webp') }}" 
    class="img-fluid rounded-4 shadow-sm" 
    alt="{{ __('fittings.scheme_image_alt') }}" 
    style="cursor:pointer;" 
    data-bs-toggle="modal" 
    data-bs-target="#schemeModal">

</div>

</section>

<section class="mt-5 pt-5">

    <div class="text-center mb-5">

        <span class="badge bg-warning text-dark mb-3">
            {{ __('fittings.tips_badge') }}
        </span>

        <h2 class="fw-bold">
            {{ __('fittings.tips_title') }}
        </h2>

    </div>

    <div class="row g-4">

        <div class="col-md-6 col-xl-3">

            <div class="card h-100 border-0 shadow-sm workfup-card">

                <div class="card-body">

                    <div class="display-6 text-warning mb-3">
                        <i class="bi bi-tools"></i>
                    </div>

                    <h5 class="fw-bold">
                        {{ __('fittings.tip_bracket_title') }}
                    </h5>

                    <p class="text-muted small">
                        {{ __('fittings.tip_bracket_description') }}
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="card h-100 border-0 shadow-sm workfup-card">

                <div class="card-body">

                    <div class="display-6 text-warning mb-3">
                        <i class="bi bi-link-45deg"></i>
                    </div>

                    <h5 class="fw-bold">
                        {{ __('fittings.tip_clamp_title') }}
                    </h5>

                    <p class="text-muted small">
                        {{ __('fittings.tip_clamp_description') }}
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="card h-100 border-0 shadow-sm workfup-card">

                <div class="card-body">

                    <div class="display-6 text-warning mb-3">
                        <i class="bi bi-house"></i>
                    </div>

                    <h5 class="fw-bold">
                        {{ __('fittings.tip_roof_title') }}
                    </h5>

                    <p class="text-muted small">
                        {{ __('fittings.tip_roof_description') }}
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="card h-100 border-0 shadow-sm workfup-card">

                <div class="card-body">

                    <div class="display-6 text-warning mb-3">
                        <i class="bi bi-arrows-angle-expand"></i>
                    </div>

                    <h5 class="fw-bold">
                        {{ __('fittings.tip_stretch_title') }}
                    </h5>

                    <p class="text-muted small">
                        {{ __('fittings.tip_stretch_description') }}
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
            {{ __('fittings.faq_title') }}
        </h2>

    </div>

    <div class="accordion" id="faqAccordion">

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button fw-bold" type="button"
                        data-bs-toggle="collapse" data-bs-target="#faq1">

                    {{ __('fittings.faq1_question') }}

                </button>

            </h2>

            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    {{ __('fittings.faq1_answer') }}

                </div>

            </div>

        </div>


        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed fw-bold" type="button"
                        data-bs-toggle="collapse" data-bs-target="#faq2">

                    {{ __('fittings.faq2_question') }}

                </button>

            </h2>

            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    {{ __('fittings.faq2_answer') }}

                </div>

            </div>

        </div>


        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed fw-bold" type="button"
                        data-bs-toggle="collapse" data-bs-target="#faq3">

                    {{ __('fittings.faq3_question') }}

                </button>

            </h2>

            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    {{ __('fittings.faq3_answer') }}

                </div>

            </div>

        </div>


        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed fw-bold" type="button"
                        data-bs-toggle="collapse" data-bs-target="#faq4">

                    {{ __('fittings.faq4_question') }}

                </button>

            </h2>

            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    {{ __('fittings.faq4_answer') }}

                </div>

            </div>

        </div>


        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed fw-bold" type="button"
                        data-bs-toggle="collapse" data-bs-target="#faq5">

                    {{ __('fittings.faq5_question') }}

                </button>

            </h2>

            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    {{ __('fittings.faq5_answer') }}

                </div>

            </div>

        </div>


        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed fw-bold" type="button"
                        data-bs-toggle="collapse" data-bs-target="#faq6">

                    {{ __('fittings.faq6_question') }}

                </button>

            </h2>

            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    {{ __('fittings.faq6_answer') }}

                </div>

            </div>

        </div>

    </div>

</section>


</div>
<div class="modal fade" id="schemeModal" tabindex="-1">

    <div class="modal-dialog modal-xl modal-dialog-centered">

        <div class="modal-content border-0 bg-transparent">

            <button
                type="button"
                class="btn-close btn-close-white ms-auto mb-2"
                data-bs-dismiss="modal">
            </button>

            <img
                src="{{ asset('images/chimney/fittings-scheme.webp') }}"
                class="img-fluid rounded-3 shadow-lg"
                alt="Схема">

        </div>

    </div>

</div>
<script>

document.addEventListener('DOMContentLoaded', () => {

   let selectedName = null;
let selectedDisplayName = null;
    const products = {

    'Кронштейн': {
        hasDiameter: false
    },

    'Розвант. підставка': {
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
        diameters:  ['100/160','110/180','120/180','130/200','140/200','150/220','160/220','180/250','200/260','220/280','230/300','250/320','300/360','350/420','400/460','450/520', '500/560','100/200','120/220','130/230','140/240','150/250','160/260','180/280','200/300']
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

        // Внутреннее название для JS и каталога
        selectedName = card.dataset.name;

        // Переведённое название для отображения пользователю
        selectedDisplayName =
            card.querySelector('h5').textContent.trim();

        const product = products[selectedName];

        if (!product) {
            console.error('Не знайдено конфігурацію:', selectedName);
            return;
        }

        if (product.hasDiameter) {

            document.getElementById('selectedName').textContent =
                selectedDisplayName;

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
#schemeModal .modal-content{
    background:transparent;
    box-shadow:none;
}

#schemeModal img{
    max-height:90vh;
    object-fit:contain;
}
</style>
@endpush
@push('schema-categories-item3')
<script type="application/ld+json">
{!! json_encode([
  '@' . 'context' => 'https://schema.org',
  '@type' => 'WebApplication',
  '@id' => url('/systema-kriplen-homutiv-ta-komplektuyuchih#page'),

  'name' => 'Система кріплень, хомутів, прохідних та завершувальних елементів',
  'url' => url('/systema-kriplen-homutiv-ta-komplektuyuchih'),

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
      'name' => 'Категорії димарів',
      'item' => url('/categories')
    ],
    [
      '@type' => 'ListItem',
      'position' => 3,
      'name' => 'Система кріплень, хомутів, прохідних та завершувальних елементів',
      'item' => url('/systema-kriplen-homutiv-ta-komplektuyuchih')
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