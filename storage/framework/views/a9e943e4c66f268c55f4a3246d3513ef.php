
<div id="productsWrapper">
 <div class="shop-toolbar d-flex justify-content-between align-items-center mb-3">
<div class="text-muted">
    Знайдено: <span id="productsTotal"><?php echo e($catalogs->total()); ?></span>
</div>

         <div class="sort-box">
            <select name="sort"
                    form="mainFilterForm"
                    class="js-choice"
                    onchange="window.sendFilterAjax(document.getElementById('mainFilterForm'))">

                <option value="">Всі товари</option>
                <option value="price_asc" <?php if(request('sort') == 'price_asc'): echo 'selected'; endif; ?>>Від дешевих</option>
                <option value="price_desc" <?php if(request('sort') == 'price_desc'): echo 'selected'; endif; ?>>Від дорогих</option>
                <option value="name_asc" <?php if(request('sort') == 'name_asc'): echo 'selected'; endif; ?>>За назвою</option>

            </select>
        </div>

    </div>
    <div class="row">

        <?php $__empty_1 = true; $__currentLoopData = $catalogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catalog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="card product-card shadow-sm h-100 border-0 rounded-4 overflow-hidden position-relative bg-white">

                    
                    <div class="position-relative product-image-wrapper bg-light d-flex align-items-center justify-content-center" style="height: 220px; overflow: hidden;">
                        
                        
                        <img src="<?php echo e($catalog->image ? asset($catalog->image) : asset('images/no-image.svg')); ?>"
     width="600"
     height="600"
     class="product-image"
     alt="<?php echo e($catalog->name); ?>"
     loading="lazy"
     decoding="async"
     style="max-height: 100%; object-fit: contain; transition: transform 0.3s ease;">

                        <div class="product-icons p-3 d-flex justify-content-between w-100 position-absolute top-0 start-0">
                          <div class="left-icons d-flex flex-column gap-2">

    
    <?php if(auth()->guard()->check()): ?>
        <button type="button"
                class="icon-btn wishlist-btn rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center bg-white"
                data-id="<?php echo e($catalog->id); ?>">
            <?php if(Auth::user()->wishlists->contains($catalog->id)): ?>
                <i class="bi bi-heart-fill text-danger"></i>
            <?php else: ?>
                <i class="bi bi-heart text-muted"></i>
            <?php endif; ?>
        </button>
    <?php else: ?>
        <button type="button"
                class="icon-btn guest-wishlist-btn rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center bg-white"
                data-bs-toggle="modal"
                data-bs-target="#loginModal">
            <i class="bi bi-heart text-muted"></i>
        </button>
    <?php endif; ?>


    
   <button type="button"
    class="icon-btn compare-btn rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center bg-white"
    data-id="<?php echo e($catalog->id); ?>"
    data-bs-toggle="tooltip"
    data-bs-placement="right"
    data-bs-custom-class="custom-orange-tooltip"
    data-bs-title="Порівняти"
    style="width:36px;height:36px;">

    <svg xmlns="http://www.w3.org/2000/svg"
         width="18"
         height="18"
         viewBox="0 0 24 24"
         fill="none"
         stroke="currentColor"
         stroke-width="2"
         stroke-linecap="round"
         stroke-linejoin="round">
      <path d="m16 16 3-8 3 8c0 1.7-1.3 3-3 3s-3-1.3-3-3Z"/>
      <path d="m2 16 3-8 3 8c0 1.7-1.3 3-3 3s-3-1.3-3-3Z"/>
      <path d="M7 21h10"/>
      <path d="M12 3v18"/>
      <path d="M3 7h18"/>
      <path d="M16 7a4 4 0 0 0-8 0"/>
    </svg>

</button>

</div>
                            

                           
<div class="right-icons d-flex flex-column gap-2">
    
    
    <a href="<?php echo e(route('catalog.public.show', $catalog->id)); ?>"
       class="icon-btn rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center bg-white"
       data-bs-toggle="tooltip"
       data-bs-placement="left"
       data-bs-custom-class="custom-orange-tooltip"
       data-bs-title="Детальніше про товар"
       style="width: 36px; height: 36px;">
        <i class="bi bi-box-arrow-up-right text-muted"></i>
    </a>

    
    <button type="button"
            class="icon-btn open-image rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center bg-white"
            data-bs-toggle="tooltip"
            data-bs-placement="left"
            data-bs-custom-class="custom-orange-tooltip"
            data-bs-title="Збільшити фото"
            style="width: 36px; height: 36px;"
            data-image="<?php echo e($catalog->image ? asset($catalog->image) : asset('images/no-image.svg')); ?>">
        <i class="bi bi-search text-muted"></i>
    </button>
</div>
                        </div>
                    </div>

                    
                    <div class="card-body d-flex flex-column p-3">
                        <h6 class="mb-2 line-clamp-2" style="height: 40px; overflow: hidden; line-height: 1.3;">
                            <a href="<?php echo e(route('catalog.public.show', $catalog->id)); ?>" class="product-title-link fw-semibold text-decoration-none">
                                <?php echo e($catalog->name); ?>

                            </a>
                        </h6>

                        <div class="my-1" style="height: 1px; background: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.08) 20%, rgba(0,0,0,0.08) 80%, rgba(0,0,0,0));"></div>

                        <div class="product-specs d-flex flex-wrap gap-2 mt-2 mb-3">
      <?php if(!empty($catalog->diameter) && $catalog->diameter != 0): ?>
    <span class="badge bg-light text-dark border border-secondary-subtle rounded-pill">
        <?php if($catalog->type !== 'Труба овальна'): ?>
            Ø
        <?php endif; ?>
        <?php echo e($catalog->diameter); ?>

    </span>
<?php endif; ?>
        <span class="badge bg-light text-dark border border-secondary-subtle rounded-pill"><?php echo e($catalog->thickness); ?></span>
        <span class="badge bg-warning text-white border-0 rounded-pill">AISI <?php echo e($catalog->grade); ?></span>
    </div>
                        
                        <div class="mt-auto pt-2">
                            <div class="d-flex align-items-center mb-1">
                                <div class="price-badge px-3 py-1 rounded-3 d-inline-flex align-items-baseline">
                                    <span class="fs-4 fw-bold item-price" data-price="<?php echo e($catalog->price); ?>">
                                        <?php echo e(number_format($catalog->price, 0, '.', ' ')); ?>

                                    </span>
                                    <span class="currency-label fw-bold ms-1">₴</span>
                                </div>
                            </div>

                            <div class="total-price-box mb-2" style="font-size: 0.82rem; height: 18px; opacity: 0; transition: opacity 0.2s ease;">
                                <span class="text-muted">Разом:</span>
                                <strong class="total-sum text-muted-dark"><?php echo e(number_format($catalog->price, 0, '.', ' ')); ?></strong>
                                <span class="fw-medium text-muted-dark">₴</span>
                            </div>
                        </div>

                        
                        <form class="add-to-cart-form" action="<?php echo e(route('cart.add', $catalog->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="d-flex align-items-center justify-content-between gap-2 mt-1">
                                <div class="input-group rounded-pill border border-secondary-subtle overflow-hidden bg-light custom-qty-group" style="width: 105px; height: 40px;">
                                    <button type="button" class="btn p-0 fw-bold qty-btn minus" style="width: 34px;">−</button>
                                    <input type="number"
                                           name="qty"
                                           value="1"
                                           min="1"
                                           class="form-control border-0 text-center p-0 fw-bold qty-input qty-value bg-transparent"
                                           style="pointer-events: none; font-size: 0.95rem; -moz-appearance: textfield;">
                                    <button type="button" class="btn p-0 fw-bold qty-btn plus" style="width: 34px;">+</button>
                                </div>

                                <?php if(auth()->guard()->check()): ?>
                                    <button type="submit" 
                                            class="btn-cart-circle add-cart-btn shadow-sm d-flex align-items-center justify-content-center" 
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            data-bs-custom-class="custom-orange-tooltip"
                                            data-bs-title="Додати у кошик">
                                        <i class="bi bi-cart3 fs-5"></i>
                                    </button>
                                <?php else: ?>
                                    <div data-bs-toggle="tooltip"
                                         data-bs-placement="top"
                                         data-bs-custom-class="custom-orange-tooltip"
                                         data-bs-title="Авторизуйтесь для додавання товару"
                                         style="width: 44px; height: 44px;">
                                        <button type="button" 
                                                class="btn-cart-circle add-cart-btn shadow-sm d-flex align-items-center justify-content-center" 
                                                data-bs-toggle="modal"
                                                data-bs-target="#loginModal">
                                            <i class="bi bi-cart3 fs-5"></i>
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted">Товари не знайдені</p>
            </div>
        <?php endif; ?>
<?php $__env->startPush('schema-itemlist'); ?>
<script type="application/ld+json">
<?php
$schema = [
    '@context' => 'https://schema.org',
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
?>

<?php echo json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>

</script>
<?php $__env->stopPush(); ?>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <?php echo e($catalogs->links()); ?>

    </div>
   
</div>


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
    gap: 6px;
    padding: 4px 2px;
    background: rgba(0,0,0,0.02);
    border-radius: 12px;
}

.product-specs .badge {
    font-size: 0.7rem;
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
</script><?php /**PATH /var/www/my_project/resources/views/partials/products.blade.php ENDPATH**/ ?>