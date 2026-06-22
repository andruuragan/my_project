<?php $__env->startSection('content'); ?>
<div class="container-1600 py-4">

    <div class="mb-4 border-bottom pb-3">
        <h2 class="fw-bold text-dark m-0">Панель адміністратора</h2>
        <small class="text-muted">Керування магазином димоходів</small>
    </div>

    <div class="row g-4">
       <div class="col-12 col-md-6 col-xl-3">
            <div class="card h-100 shadow-sm border-0 bg-white p-4 rounded-3 text-center">
                <h4 class="fw-bold text-dark mb-2">Замовлення</h4>
                <p class="text-muted small mb-4">Перегляд нових замовлень, зміна статусів.</p>
                <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-dark w-100 py-2 rounded-3 fw-semibold">Перейти до замовлень</a>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="card h-100 shadow-sm border-0 bg-white p-4 rounded-3 text-center">
                <h4 class="fw-bold text-dark mb-2">Каталог товарів</h4>
                <p class="text-muted small mb-4">Редагування цін, діаметрів та наявності.</p>
                <a href="<?php echo e(route('catalog.index')); ?>" class="btn btn-warning w-100 py-2 rounded-3 fw-semibold text-dark">Керувати каталогом</a>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="card h-100 shadow-sm border-0 bg-white p-4 rounded-3 text-center">
                <h4 class="fw-bold text-dark mb-2">Описи товарів</h4>
                <p class="text-muted small mb-4">Редагування SEO-текстів та переваг.</p>
                <a href="<?php echo e(route('descriptions.index')); ?>" class="btn btn-primary w-100 py-2 rounded-3 fw-semibold">Редагувати описи</a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
    <div class="card h-100 shadow-sm border-0 bg-white p-4 rounded-3 text-center">
        <h4 class="fw-bold text-dark mb-2">Користувачі</h4>
        <p class="text-muted small mb-4">
            Перегляд та керування користувачами.
        </p>
        <a href="<?php echo e(route('users.index')); ?>"
           class="btn btn-success w-100 py-2 rounded-3 fw-semibold">
            Керувати користувачами
        </a>
    </div>
</div>
    </div> <div class="mt-5 bg-white p-4 rounded-3 shadow-sm border border-secondary-subtle">
        <h4 class="fw-bold text-dark mb-3">🔥 Що найбільше лайкають</h4>

        <?php if($popularProducts->isEmpty()): ?>
            <p class="text-muted m-0">Поки що жоден товар не отримав лайків.</p>
        <?php else: ?>
            <div class="table-responsive d-none d-md-block">
                <table class="table align-middle m-0">
                    <thead>
                        <tr>
                            <th>Товар</th>
                            <th>Опис</th>
                            <th class="text-center">Лайки</th>
                            <th class="text-end">Дія</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $popularProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="row-<?php echo e($product->id); ?>">
                                <td><strong><?php echo e($product->name); ?></strong></td>
                                <td><span class="badge bg-light text-dark">Ø<?php echo e($product->diameter); ?> • AISI <?php echo e($product->grade); ?></span></td>
                                <td class="text-center">
                                    <span class="badge bg-light text-dark border rounded-pill px-3 py-2 fw-bold">
                                        <i class="bi bi-heart-fill text-danger me-1"></i> <?php echo e($product->liked_by_users_count); ?>

                                    </span>
                                </td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-3 reset-likes-btn" data-id="<?php echo e($product->id); ?>">
                                        <i class="bi bi-trash3 me-1"></i> Скинути
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="d-md-none">
                <?php $__currentLoopData = $popularProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card mb-3 border-secondary-subtle" id="row-mobile-<?php echo e($product->id); ?>">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="mb-0 fw-bold"><?php echo e($product->name); ?></h6>
                                <span class="badge bg-danger rounded-pill"><i class="bi bi-heart-fill me-1"></i> <?php echo e($product->liked_by_users_count); ?></span>
                            </div>
                            <div class="mb-3"><span class="badge bg-light text-dark border">Ø<?php echo e($product->diameter); ?> • AISI <?php echo e($product->grade); ?></span></div>
                            <button type="button" class="btn btn-sm btn-outline-danger w-100 reset-likes-btn" data-id="<?php echo e($product->id); ?>">
                                <i class="bi bi-trash3 me-1"></i> Скинути лайки
                            </button>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.body.addEventListener('click', function (e) {
            const btn = e.target.closest('.reset-likes-btn');
            if (!btn) return;
            const productId = btn.dataset.id;

            if (!confirm('Видалити лайки?')) return;

            fetch("<?php echo e(route('admin.products.reset-likes', ':id')); ?>".replace(':id', productId), {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // Видаляємо обидва варіанти (табличний рядок та мобільну картку)
                    const elements = [document.getElementById(`row-${productId}`), document.getElementById(`row-mobile-${productId}`)];
                    elements.forEach(el => {
                        if (el) {
                            el.style.opacity = '0';
                            setTimeout(() => el.remove(), 300);
                        }
                    });
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/my_project/resources/views/admin.blade.php ENDPATH**/ ?>