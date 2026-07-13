
<div id="productsWrapper">
 <div class="shop-toolbar d-flex justify-content-between align-items-center mb-3">
<div class="text-muted">
    Знайдено: <span id="productsTotal">{{ $catalogs->total() }}</span>
</div>

         <div class="sort-box">
            <select name="sort"
                    form="mainFilterForm"
                    class="js-choice"
                    onchange="window.sendFilterAjax(document.getElementById('mainFilterForm'))">

                <option value="">Всі товари</option>
                <option value="price_asc" @selected(request('sort') == 'price_asc')>Від дешевих</option>
                <option value="price_desc" @selected(request('sort') == 'price_desc')>Від дорогих</option>
                <option value="name_asc" @selected(request('sort') == 'name_asc')>За назвою</option>

            </select>
        </div>

    </div>
    <div class="row">

        @forelse($catalogs as $catalog)
         @include('partials.product-card', ['catalog' => $catalog])
           @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Товари не знайдені</p>
            </div>
        @endforelse

       


@push('schema-itemlist')
<script type="application/ld+json">
@php
$schema = [
    '@' . 'context' => 'https://schema.org',
    '@type' => 'ItemList',
    'itemListElement' => $catalogs->getCollection()->map(function ($c, $i) {
        return [
            '@type' => 'ListItem',
            'position' => $i + 1,
            'name' => $c->name,
            'url' => route('catalog.public.show', $c->id),
        ];
    })->values()->toArray(),
];
@endphp

{!! json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $catalogs->links() }}
    </div>
   
</div>

{{-- СТИЛІ КАРТКИ --}}
<style>
.product-card {
    border: 1px solid transparent !important;
    transition:
        transform 0.28s cubic-bezier(0.4, 0, 0.2, 1),
        box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1),
        border-color 0.28s ease;
        border: 1px solid rgba(0,0,0,0.05) !important;
}
.badge {
    
    font-weight: 500;
    letter-spacing: 0.01em;
}

.product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 26px rgba(0,0,0,0.08) !important;
    border-color: rgba(217,119,6,0.15);
}

.product-card:hover .product-image {
    transform: scale(1.06);
}

.product-title-link {
    color: #1f2937;
    transition: color 0.2s ease;
}

.product-title-link:hover {
    color: #d97706;
}

.product-image-wrapper {
    border-bottom: 1px solid rgba(0,0,0,0.04);
    
}

.product-image-wrapper .product-image {
    width: 100% !important;
    height: 100% !important;
}

.product-specs {
    gap: 2px;
    padding: 4px 2px;
    background: rgba(0,0,0,0.02);
    border-radius: 12px;
}

.product-specs .badge {
    font-size: 11px;
    font-weight: 500;
}

.price-badge {
    background-color: rgba(31, 25, 19, 0.1);
    color: #111827;
    border: 1px solid rgba(217, 119, 6, 0.12);
    backdrop-filter: blur(6px);
    box-shadow:
        inset 0 1px 0 rgba(255,255,255,0.5),
        0 2px 6px rgba(0,0,0,0.03);
}


.item-price {
     font-size: 1.5rem;
    font-weight: 800;
    letter-spacing: -0.02em;
    color: #111827;
}
.product-icons, 
.right-icons {
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card:hover .product-icons,
.product-card:hover .right-icons {
    opacity: 1;
}

.currency-label {
    color: #d97706;
    font-size: 1.05rem;
}

.text-muted-dark {
    color: #4b5563;
}

.btn-cart-circle {
    background: #d97706;
    color: #ffffff;
    border: none;
    width: 44px;
    height: 44px;
    border-radius: 14px;
    transition:
        background 0.2s ease,
        transform 0.2s ease,
        box-shadow 0.2s ease;
        box-shadow: 0 4px 12px rgba(217, 119, 6, 0.3) !important;
}

.btn-cart-circle:hover {
    background: #b45309;
    transform: scale(1.08);
    box-shadow: 0 8px 18px rgba(217,119,6,0.25);
}

.btn-cart-circle:active {
    transform: scale(0.95);
}

.custom-qty-group .qty-btn {
    color: #4b5563;
    background-color: transparent;
    border: none;
    box-shadow: none !important;
    transition:
        background-color 0.15s ease,
        color 0.15s ease;
}

.custom-qty-group .qty-btn:hover {
    background-color: #1f2937 !important;
    color: #ffffff !important;
}

.icon-btn {
    background: rgba(255,255,255,0.92) !important;
    backdrop-filter: blur(6px);
    border: 1px solid rgba(0,0,0,0.06) !important;
    box-shadow: 0 6px 14px rgba(0,0,0,0.08) !important;
}

.icon-btn:hover {
    transform: translateY(-2px) scale(1.05) !important;
    background: #f9fafb !important; /* Легке сіре при наведенні */
    box-shadow: 0 6px 14px rgba(0,0,0,0.2) !important;
}

/* Колір іконки всередині */
.icon-btn i {
    font-size: 1rem;
    color: #374151 !important;
}

.icon-btn:hover i {
    color: #d97706 !important;
}

.icon-btn:hover i.bi-heart-fill {
    color: #dc3545 !important;
}

.custom-orange-tooltip .tooltip-inner {
    background-color: #d97706 !important;
    color: #ffffff !important;
    font-weight: 500;
    font-size: 0.78rem;
    padding: 5px 10px;
    border-radius: 20px;
}

.custom-orange-tooltip .tooltip-arrow::before {
    border-top-color: #d97706 !important;
}

.qty-input::-webkit-outer-spin-button,
.qty-input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

    /* Переопределяем цвет для всех элементов с классом bg-warning */
    .bg-warning {
        background-color: #d97706 !important; /* Насыщенный оранжевый */
        color: #ffffff !important;           /* Белый текст для контраста */
    }
    .price-badge {
    background: linear-gradient(135deg, rgba(217,119,6,0.15), rgba(0,0,0,0.03));
    border: 1px solid rgba(217,119,6,0.25);
}


.shop-toolbar {
    background: #fff;
    padding: 12px 16px;
    border-radius: 12px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
}

.sort-box {
   width: 170px;
}
.sort-box .choices {
    width: 100% !important;
}
.icon-btn svg {
    width: 18px;
    height: 18px;
    color: #374151;
    stroke: currentColor;
    transition: color .2s ease;
}

.icon-btn:hover svg {
    color: #d97706;
}

.compare-btn.active svg {
    color: #198754; /* зеленый, если товар уже в сравнении */
}
</style>


{{-- ФУНКЦІОНАЛ (JS) --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    // ===== ADD TO CART ANIMATION =====
    document.addEventListener('click', function (e) {
        const button = e.target.closest('.add-cart-btn');
        if (!button) return;

        const icon = button.querySelector('i');
        if (!icon) return;

        const originalClass = icon.className;

        icon.classList.remove('bi-cart3');
        icon.classList.add('bi-check2');

        button.style.backgroundColor = '#10b981';

        setTimeout(() => {
            icon.className = originalClass;
            button.style.backgroundColor = '#d97706';
        }, 1500);
    });

    // ===== TOOLTIP (SAFE INIT) =====
    document.body.addEventListener('mouseover', function (event) {
        const target = event.target.closest('[data-bs-toggle="tooltip"]');

        if (!target || typeof bootstrap === 'undefined') return;

        if (!bootstrap.Tooltip.getInstance(target)) {
            new bootstrap.Tooltip(target, {
                trigger: 'hover'
            });
        }
    });

});

</script>