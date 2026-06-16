<?php $__env->startSection('content'); ?>
    <div class="container-1600">

        <h2 class="mb-4">Кошик</h2>

        <?php
            $total = 0;
        ?>

        <?php if(empty($cart)): ?>
            <p>Кошик порожній</p>
        <?php else: ?>

            <div class="table-responsive">
                <table class="table align-middle">

                    <thead>
                    <tr>
                        <th>Товар</th>
                        <th class="text-center">Назва</th>
                        <th class="text-center">Кількість</th>
                        <th>Ціна</th>
                        <th>Сума</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php
                            $qty = $item['qty'] ?? 1;
                            $price = $item['price'] ?? 0;
                            $sum = $qty * $price;
                            $total += $sum;
                        ?>

                        <tr data-id="<?php echo e($id); ?>">

                            <!-- IMAGE -->
                            <td style="width:80px">
                                <img src="<?php echo e(asset($item['image'])); ?>"
                                     style="width:60px;height:60px;object-fit:contain;">
                            </td>

                            <!-- NAME -->
                            <td>
                                <strong><?php echo e($item['title']); ?></strong>
                            </td>

                            <!-- QTY -->
                            <td style="width:160px">
                                <div class="quantity-box">
                                    <button type="button" class="qty-btn minus">−</button>

                                    <input type="number"
       name="qty"
       autocomplete="off"
       class="qty-input qty text-center"
       value="<?php echo e($qty); ?>"
       min="1">

                                    <button type="button" class="qty-btn plus">+</button>
                                </div>
                            </td>

                            <!-- PRICE -->
                            <td class="price-cell">
                                <?php echo e(number_format($price, 0, '.', ' ')); ?> грн.
                            </td>

                            <!-- SUM -->
                            <td class="item-sum">
                                <?php echo e(number_format($sum, 0, '.', ' ')); ?> грн.
                            </td>

                            <!-- DELETE -->
                            <td>
                                <button class="btn btn-link text-danger delete-btn"
                                        data-id="<?php echo e($id); ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>

                        </tr>



                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                </table>
            </div>

            <!-- TOTAL -->
            <div class="d-flex justify-content-between align-items-start mt-4">

                <!-- LEFT -->
                <div class="d-flex gap-2">

                    <button id="clearCartBtn" class="btn btn-warning">
                        Очистити кошик
                    </button>

                    <a href="<?php echo e(route('shop.index')); ?>" class="btn btn-success">
                        <i class="bi bi-plus-lg"></i>
                        Додати товар
                    </a>

                </div>

                <!-- RIGHT -->
                <div class="text-end">

                    <h4>
                        Загальна сума:
                        <span id="cartTotal">
                <?php echo e(number_format($total, 0, '.', ' ')); ?>

            </span>
                        грн.
                    </h4>

                    <a href="<?php echo e(route('checkout.index')); ?>"
                       class="checkout-btn mt-3 d-inline-flex align-items-center gap-2">
                        Оформити замовлення
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </div>

        <?php endif; ?>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.refreshCart) {
                window.refreshCart();
            }
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/my_project/resources/views/cart/index.blade.php ENDPATH**/ ?>