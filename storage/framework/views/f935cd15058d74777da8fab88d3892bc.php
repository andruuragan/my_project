<?php $__env->startSection('content'); ?>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <div class="container-1600">

        <h2 class="mb-4">Оформлення замовлення</h2>

        <?php if(empty($cart)): ?>
            <p>Кошик порожній</p>
        <?php else: ?>

            <div class="mb-3">
                <strong>Товарів:</strong> <?php echo e($cartCount); ?>

            </div>

            <div class="mb-3">
                <strong>Сума:</strong> <?php echo e(number_format($cartTotal, 0, '.', ' ')); ?> ₴
            </div>

            <form method="POST" action="<?php echo e(route('checkout.store')); ?>"
                  onsubmit="this.querySelector('button').disabled = true;">
                <?php echo csrf_field(); ?>

                <button type="submit" class="checkout-btn">
                    Підтвердити замовлення
                    <i class="bi bi-arrow-right ms-2"></i>
                </button>

            </form>

        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/my_project/resources/views/checkout/index.blade.php ENDPATH**/ ?>