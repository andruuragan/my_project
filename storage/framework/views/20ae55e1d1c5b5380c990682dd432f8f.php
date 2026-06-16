<?php $__env->startSection('content'); ?>
    <div class="container-1600 py-4">

        <!-- Заголовок адмінки -->
        <div class="mb-4 border-bottom pb-3">
            <h2 class="fw-bold text-dark m-0">Панель адміністратора</h2>
            <small class="text-muted">Керування магазином димоходів</small>
        </div>

        <!-- Сітка з картками керування -->
        <div class="row g-4">

            <!-- Картка: Замовлення -->
            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm border-0 bg-white p-4 rounded-3 text-center">
                    <h4 class="fw-bold text-dark mb-2">Замовлення</h4>
                    <p class="text-muted small mb-4">Перегляд нових замовлений, зміна статусів, генерація звітів в Excel.</p>
                    <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-dark w-100 py-2 rounded-3 fw-semibold">
                        Перейти до замовлень
                    </a>
                </div>
            </div>

            <!-- Картка: Каталог товарів -->
            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm border-0 bg-white p-4 rounded-3 text-center">
                    <h4 class="fw-bold text-dark mb-2">Каталог товарів</h4>
                    <p class="text-muted small mb-4">Додавання нових елементів димохода, редагування цін, діаметрів та наявності.</p>
                    <a href="<?php echo e(route('catalog.index')); ?>" class="btn btn-warning w-100 py-2 rounded-3 fw-semibold text-dark">
                        Керувати каталогом
                    </a>
                </div>
            </div>

            <!-- Картка: Тексти та Описи -->
            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm border-0 bg-white p-4 rounded-3 text-center">
                    <h4 class="fw-bold text-dark mb-2">Описи товарів</h4>
                    <p class="text-muted small mb-4">Редагування SEO-текстів, переваг, інструкцій із застосування в табах.</p>
                    <a href="<?php echo e(route('descriptions.index')); ?>" class="btn btn-primary w-100 py-2 rounded-3 fw-semibold">
                        Редагувати описи
                    </a>
                </div>
            </div>

        </div>
        <div class="mt-5 bg-white p-4 rounded-3 shadow-sm border border-secondary-subtle">
            <h4 class="fw-bold text-dark mb-3">🔥 Що найбільше лайкають (Інтерес покупців)</h4>

            <?php if($popularProducts->isEmpty()): ?>
                <p class="text-muted m-0">Поки що жоден товар не отримав лайків.</p>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table align-middle m-0">
                        <thead>
                        <tr>
                            <th>Товар</th>
                            <th>Характеристики</th>
                            <th class="text-center">Кількість лайків</th>
                            <th class="text-end">Дія</th> <!-- Новий стовпчик -->
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $popularProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="product-row-<?php echo e($product->id); ?>">
                                <td><strong><?php echo e($product->name); ?></strong></td>
                                <td><span class="badge bg-light text-dark">Ø<?php echo e($product->diameter); ?> • AISI <?php echo e($product->grade); ?></span></td>
                                <td class="text-center">
                            <span class="badge bg-light text-dark border rounded-pill px-3 py-2 fw-bold">
                                <i class="bi bi-heart-fill text-danger me-1"></i> <?php echo e($product->liked_by_users_count); ?>

                            </span>
                                </td>
                                <td class="text-end">
                                    <!-- Кнопка скидання лайків -->
                                    <button type="button"
                                            class="btn btn-sm btn-outline-danger rounded-pill px-3 reset-likes-btn"
                                            data-id="<?php echo e($product->id); ?>"
                                            title="Онулити лайки для цього товару">
                                        <i class="bi bi-trash3 me-1"></i> Скинути
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.body.addEventListener('click', function (e) {
                    const btn = e.target.closest('.reset-likes-btn');
                    if (!btn) return;

                    e.preventDefault();

                    if (!confirm('Ви впевнені, що хочете онулити лайки для цього товару? Він зникне зі списку.')) {
                        return;
                    }

                    const productId = btn.dataset.id;

                    // Laravel сам підставить правильний URL сайту замість цього рядка
                    let url = "<?php echo e(route('admin.products.reset-likes', ':id')); ?>";
                    url = url.replace(':id', productId);

                    fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const row = document.getElementById(`product-row-${productId}`);
                                if (row) {
                                    row.style.transition = 'all 0.3s ease';
                                    row.style.opacity = '0';
                                    setTimeout(() => {
                                        row.remove();
                                        if (document.querySelectorAll('tbody tr').length === 0) {
                                            location.reload();
                                        }
                                    }, 300);
                                }
                            } else {
                                alert('Помилка: ' + data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Помилка:', error);
                        });
                });
            });
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/my_project/resources/views/admin.blade.php ENDPATH**/ ?>