<?php $__env->startSection('content'); ?>
<div class="container-1600">
    
    <section class="about-hero py-5 bg-light">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">
                    Про компанію "Центр Комплектації Димарів"
                </h1>
                <p class="lead text-muted">
                    Провідний виробник та постачальник димохідних систем в Україні.
                </p>
                <p>
                    Ми створюємо сучасні рішення для безпечного та ефективного
                    відведення продуктів згоряння, забезпечуючи комфорт та
                    надійність для наших клієнтів.
                </p>
                <a href="<?php echo e(route('shop.index')); ?>" class="btn btn-dark btn-lg rounded-pill px-4">
                    Перейти до каталогу
                </a>
            </div>
            <div class="col-lg-6">
                <img src="<?php echo e(asset('images/about/hero.webp')); ?>"
                     class="img-fluid rounded-4 shadow"
                     alt="DymSystems">
            </div>
        </div>
    </section>

    
    <section class="py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Хто ми</h2>
            <div class="mx-auto bg-warning" style="width:60px; height:3px;"></div>
        </div>
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <img src="<?php echo e(asset('images/about/company.webp')); ?>"
                     class="img-fluid rounded-4 shadow-sm"
                     alt="Компанія">
            </div>
            <div class="col-lg-6">
                <p>Компанія <strong>"Центр Комплектації Димарів"</strong> заснована у 2012 році та спеціалізується на виробництві й постачанні систем модульних димоходів із нержавіючої сталі.</p>
                <p>Ми пропонуємо комплексні рішення для житлових, комерційних та промислових об'єктів, забезпечуючи високу якість продукції та професійну технічну підтримку.</p>
                
            </div>
        </div>
    </section>

    
    <section class="py-5 bg-light">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Наші переваги</h2>
            <div class="mx-auto bg-warning" style="width:60px; height:3px;"></div>
        </div>
        <div class="row g-4">
            <?php
                $advs = [
                    ['Власне виробництво', 'Контроль якості на кожному етапі.'],
                    ['Якісна сталь', 'Надійні матеріали для довговічної експлуатації.'],
                    ['Технічна підтримка', 'Допомагаємо підібрати оптимальне рішення.'],
                    ['Доставка по Україні', 'Швидке відправлення продукції.']
                ];
            ?>
            <?php $__currentLoopData = $advs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <h5 class="fw-bold"><?php echo e($item[0]); ?></h5>
                        <p class="text-muted mb-0"><?php echo e($item[1]); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    
    <section class="py-5">
        <div class="row text-center g-4">
            <?php $__currentLoopData = [['2012', 'Рік заснування'], ['100+', 'Найменувань продукції'], ['1000+', 'Виконаних замовлень'], ['24/7', 'Консультації клієнтів']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-6 col-lg-3">
                    <h2 class="fw-bold text-warning"><?php echo e($stat[0]); ?></h2>
                    <p><?php echo e($stat[1]); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    
    <section class="py-5 bg-light">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Як ми працюємо</h2>
            <div class="mx-auto bg-warning" style="width:60px; height:3px;"></div>
        </div>
        <div class="row text-center g-4">
            <?php $__currentLoopData = ['Консультація', 'Підбір комплектуючих', 'Виробництво', 'Доставка клієнту']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm p-4">
                        <h3 class="text-warning"><?php echo e($key + 1); ?></h3>
                        <p class="fw-bold"><?php echo e($step); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    
    <section class="py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Наше виробництво</h2>
            <div class="mx-auto bg-warning" style="width:60px; height:3px;"></div>
        </div>
        <div class="row g-4">
            <?php for($i = 1; $i <= 6; $i++): ?>
                <div class="col-md-4">
                    <img src="<?php echo e(asset('images/about/production'.$i.'.webp')); ?>"
                         class="img-fluid rounded-4 shadow-sm"
                         alt="Виробництво">
                </div>
            <?php endfor; ?>
        </div>
    </section>

    
    <section class="py-5 bg-dark text-white text-center rounded-4 mb-5">
        <h2 class="fw-bold mb-4">Потрібна консультація?</h2>
        <p class="lead mb-4">Наші спеціалісти допоможуть підібрати оптимальну димохідну систему.</p>
        <button
    type="button"
    class="btn btn-warning px-4 fw-bold shadow"
    data-bs-toggle="modal"
    data-bs-target="#consultationModal">
    Отримати консультацію
</button>
    </section>
</div>
<div class="modal fade" id="consultationModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Консультація</h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

                <form action="<?php echo e(route('leads.store')); ?>"
                      method="POST"
                      class="needs-validation"
                      novalidate>

                    <?php echo csrf_field(); ?>

                    <input type="hidden"
                           name="device_type"
                           value="Консультація (модалка)">

                    <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Ваше ім'я" autocomplete="name" required>

                   <input 
    type="tel" 
    name="phone" 
    id="phone" 
    class="form-control mb-3" 
    placeholder="+38 (___) ___-__-__" 
    autocomplete="tel" 
    required>

                    <button
                        type="submit"
                        class="btn btn-warning w-100">
                        Відправити
                    </button>

                </form>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/my_project/resources/views/about.blade.php ENDPATH**/ ?>