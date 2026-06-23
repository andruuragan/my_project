<footer class="site-footer">
    <div class="container-1600">

        <!-- TOP -->
        <div class="footer-top">

            <!-- LOGO -->
            <div class="footer-col footer-brand">
                <div class="footer-logo">
                    <img src="<?php echo e(asset('images/favicon.png')); ?>" style="width:38px;" alt="logo_favicon">
                     <strong>DymSystems</strong>
                </div>
                <p class="footer-text">
                    Сучасний інтернет-магазин комплектації димарів.
                </p>
            </div>

            <!-- CONTACTS -->
            <div class="footer-col">
                <h4 class="footer-title">Контакти</h4>

                <div class="footer-item">
                    <i class="bi bi-geo-alt"></i>
                    <span> Україна м. Харків </span>
                </div>

                <div class="footer-item">
                    <i class="bi bi-telephone"></i>
                    <span>+380 XX XXX XX XX</span>
                </div>

                <div class="footer-item">
                    <i class="bi bi-envelope"></i>
                    <span>dymsystems@ukr.net</span>
                </div>
            </div>

            <!-- LINKS -->
            <div class="footer-col">
                <h4 class="footer-title">Навігація</h4>

                <ul class="footer-links">
                    <li><a href="<?php echo e(route ('main.index')); ?>">Головна</a></li>
                    <li><a href="<?php echo e(route ('shop.index')); ?>">Каталог</a></li>
                    <li><a href="<?php echo e(route ('contacts.index')); ?>">Контакти</a></li>
                </ul>
            </div>

            <!-- ACCOUNT -->
            <div class="footer-col">
                <h4 class="footer-title">Мій кабінет</h4>

                <ul class="footer-links">
                    <li>

                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(route('dashboard')); ?>">
                                <i class="bi bi-person-circle"></i>
                                Особистий кабінет
                            </a>
                        <?php else: ?>
                            <a href="#"
                               data-bs-toggle="modal"
                               data-bs-target="#loginModal">

                                Особистий кабінет
                            </a>
                        <?php endif; ?>

                    </li>
                    <li><a href="<?php echo e(route('profile.orders')); ?>"><i class="bi bi-box-seam"></i> Історія замовлень</a></li>
                    <li><a href="<?php echo e(route('cart.index')); ?>"> <i class="bi bi-basket2"></i>
                            Кошик</a></li>
                </ul>
            </div>

            <!-- CTA -->
           <div class="footer-col footer-cta mt-4 pt-3 border-top border-md-0 pt-md-2 mt-md-2">
    <a href="<?php echo e(route ('shop.index')); ?>" class="footer-shop-btn">
        <i class="bi bi-cart3"></i>
        Перейти в магазин
    </a>
</div>

        </div>

        <!-- BOTTOM -->
        <div class="footer-bottom">
            © 2026 DymSystems. Всі права захищені.
        </div>

    </div>
</footer>
<?php /**PATH /var/www/my_project/resources/views/partials/footer.blade.php ENDPATH**/ ?>