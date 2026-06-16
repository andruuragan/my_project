<?php $__env->startSection('content'); ?>
    <div class="container-1600">
        <div class="text-center mb-5">
            <h1 class="fw-bold">Контакти</h1>
            <div class="mx-auto bg-warning rounded" style="width:70px;height:4px;"></div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

            <div class="card-body p-4 p-lg-5">

                <div class="row gy-4 align-items-start">

                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-building-fill text-warning fs-4 me-3"></i>
                            <span class="fw-semibold">Назва компанії</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        Центр Комплектації Димарів
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-person-fill text-warning fs-4 me-3"></i>
                            <span class="fw-semibold">Контактна особа</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        Ваше ім'я
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-geo-alt-fill text-warning fs-4 me-3"></i>
                            <span class="fw-semibold">Адреса</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        м. Харків, вул. Прикладна, 1
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-telephone-fill text-warning fs-4 me-3"></i>
                            <span class="fw-semibold">Телефон</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <a href="tel:+380XXXXXXXXX" class="text-decoration-none">
                            +38 (0XX) XXX-XX-XX
                        </a>
                        <br>
                        <a href="tel:+380XXXXXXXXX" class="text-decoration-none">
                            +38 (0XX) XXX-XX-XX
                        </a>
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-envelope-fill text-warning fs-4 me-3"></i>
                            <span class="fw-semibold">Email</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <a href="mailto:info@example.com" class="text-decoration-none">
                           dymsystems@ukr.net
                        </a>
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-globe2 text-warning fs-4 me-3"></i>
                            <span class="fw-semibold">Сайт</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <a href="/" class="text-decoration-none">
                            www.dymsystems.pp.ua
                        </a>
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-clock-fill text-warning fs-4 me-3"></i>
                            <span class="fw-semibold">Графік роботи</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        Пн–Пт: 09:00 – 18:00<br>
                        Сб: вихідний<br>
                        Нд: вихідний
                    </div>

                </div>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/my_project/resources/views/contacts.blade.php ENDPATH**/ ?>