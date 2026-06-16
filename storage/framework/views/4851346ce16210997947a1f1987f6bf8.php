<?php $__env->startSection('content'); ?>
<div class="container-1600">
    <div class="card p-3 mb-4 shadow-sm">
        <h5>Створити товар</h5>

        <form action="<?php echo e(route('catalog.store')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label w-100">
                        <span class="d-block mb-2">Назва</span>
                        <input type="text" 
                               id="element_name" 
                               name="name" 
                               value="<?php echo e(old('name')); ?>" 
                               class="form-control" 
                               placeholder="Назва"
                               autocomplete="off">
                    </label>
                </div>

                <div class="col-md-6">
    <label class="form-label w-100" for="element_type">
        <span class="d-block mb-2">Тип</span>
        <select id="element_type" name="type" class="form-select" autocomplete="off">
            <option value="">Все</option>
            <?php
                $types = [
                    'Труба', 'Труба овальна','Коліно 45°', 'Коліно 90°', 'Трійник 90°', 'Трійник 45°',
                    'Волпер', 'Грибок', 'Іскрогасник', 'Регулятор тяги(Кагла)', 'Лійка',
                    'Окапник', 'Закінчення димоходу', 'Перехід', 'Радіатор', 'Ревізія',
                    'Розета', 'Сітка', 'Скоба', 'Криза', 'Кронштейн',
                    'Розвантажувальна підставка', 'Обжимний хомут', 'Хомут під розтяжки',
                    'Стіновий хомут', 'Монтажний хомут', 'Конус', 'Термоґрибок',
                    'Дека', 'Заглушка', 'Старт-сендвіч', 'Труба-подовжувач', 'Прохід', 'Відображувач'
                ];
            ?>
            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($type); ?>" <?php if(old('type') == $type): echo 'selected'; endif; ?>><?php echo e($type); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </label>
</div>

                <div class="col-md-6">
    <label class="form-label w-100" for="element_thickness">
        <span class="d-block mb-2">Товщина нерж.</span>
        <select id="element_thickness" name="thickness" class="form-select" autocomplete="off">
            <option value="">Оберіть товщину</option>
            <?php
                // Убрали лишний пробел у '0.5' для чистоты данных
                $thicknesses = ['0.5', '0.8', '1', '2'];
            ?>
            <?php $__currentLoopData = $thicknesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    // Создаем готовую строку, например: "1 мм"
                    $fullValue = trim($t) . ' мм';
                ?>
                <option value="<?php echo e($fullValue); ?>" <?php if(old('thickness') == $fullValue): echo 'selected'; endif; ?>>
                    <?php echo e($fullValue); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </label>
</div>

               <div class="col-md-6">
    <label class="form-label w-100" for="element_grade">
        <span class="d-block mb-2">Марка нерж.</span>
        <select id="element_grade" name="grade" class="form-select" autocomplete="off">
            <option value="">Оберіть марку стали</option>
            <?php
                $grades = ['304', '321', '201', '430'];
            ?>
            <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($g); ?>" <?php if(old('grade') == $g): echo 'selected'; endif; ?>><?php echo e($g); ?> AISI</option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </label>
</div>

                <div class="col-md-6">
    <label class="form-label w-100" for="element_diameter">
        <span class="d-block mb-2">Діаметр(розмір)</span>
        <select id="element_diameter" name="diameter" class="form-select" autocomplete="off">
            <option value="">Оберіть діаметр(розмір)</option>
            <?php
                $diameters = ['0','100', '110', '120', '125', '130', '140', '150', '160', '170', '180',
                                '190', '200', '210', '220', '230', '240', '250', '260', '270', '280',
                                '290', '300', '310', '320', '330', '350', '360', '370', '380', '400',
                                '420', '450', '460', '500', '520', '860',
                                '100/160', '110/180', '120/180', '130/200', '140/200',
                                '150/220', '160/220', '180/250', '200/260', '220/280',
                                '230/300', '250/320', '300/360', '350/420', '400/460',
                                '500/560', '100/200', '120/220', '130/230', '140/240',
                                '150/250', '160/260', '180/280', '200/300', '100х200',
                                 '110х220', '110х230', '110х240', '120х220', '120х230', '120х240'];
            ?>
            <?php $__currentLoopData = $diameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($d); ?>" <?php if(old('diameter') == $d): echo 'selected'; endif; ?>><?php echo e($d); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </label>
</div>

               <div class="col-md-6">
    <label class="form-label w-100" for="element_chimneyType">
        <span class="d-block mb-2">Тип димохода</span>
        <select id="element_chimneyType" name="chimneyType" class="form-select" autocomplete="off">
            <option value="">Оберіть тип димохода</option>
            <?php
                $chimneyTypes = [
                    'Одностінний' => 'Одностінний',
                    'Термо' => 'Термо'
                ];
            ?>
            <?php $__currentLoopData = $chimneyTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($value); ?>" <?php if(old('chimneyType') == $value): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </label>
</div>

                <div class="col-md-6">
    <label class="form-label w-100" for="element_casing">
        <span class="d-block mb-2">Кожух</span>
        <select id="element_casing" name="casing" class="form-select" autocomplete="off">
            <option value="">Оберіть кожух</option>
            <?php
                $casings = [
                    'н/н' => 'Нержавійка',
                    'н/оц' => 'Оцинковка',
                    '-' => 'Немає (одностінний)'
                ];
            ?>
            <?php $__currentLoopData = $casings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($value); ?>" <?php if(old('casing') == $value): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </label>
</div>

                <div class="col-md-6">
                    <label class="form-label w-100">
                        <span class="d-block mb-2">Ціна</span>
                        <input type="number" 
                               id="element_price" 
                               name="price" 
                               value="<?php echo e(old('price')); ?>"
                               step="0.01"
                               class="form-control" 
                               placeholder="Ціна"
                               autocomplete="off">
                    </label>
                </div>

                <div class="col-md-12">
                    <label class="form-label w-100">
                        <span class="d-block mb-2">Картинка</span>
                        <input type="file" id="element_image" name="image" class="form-control">
                    </label>
                </div>

                <div class="col-md-12">
                    <label class="form-label w-100">
                        <span class="d-block mb-2">Опис</span>
                        <select id="element_description" name="description_id" class="form-control">
                            <option value="">Без опису</option>
                            <?php $__currentLoopData = $descriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($description->id); ?>" <?php if(old('description_id') == $description->id): echo 'selected'; endif; ?>>
                                    <?php echo e($description->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </label>
                </div>

            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="<?php echo e(route('catalog.index')); ?>" class="btn btn-secondary">Back</a>
            </div>

        </form>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/my_project/resources/views/catalog/create.blade.php ENDPATH**/ ?>