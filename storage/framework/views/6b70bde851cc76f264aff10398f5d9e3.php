<?php $__env->startSection('content'); ?>
    <div class="container-1600">
    <h3>Элемент</h3>

    <table class="table table-bordered table-striped table-hover" style="table-layout: fixed; font-size: 12px;">
        <tr>
            <th>ID</th>
            <td><?php echo e($catalog->id); ?></td>
        </tr>

        <tr>
            <th>Название</th>
            <td><?php echo e($catalog->name); ?></td>
        </tr>

        <tr>
            <th>Тип</th>
            <td><?php echo e($catalog->type); ?></td>
        </tr>

        <tr>
            <th>Толщина</th>
            <td><?php echo e($catalog->thickness); ?></td>
        </tr>

        <tr>
            <th>Марка нерж.(AISI)</th>
            <td><?php echo e($catalog->grade); ?></td>
        </tr>

        <tr>
            <th>Диаметр</th>
            <td><?php echo e($catalog->diameter); ?></td>
        </tr>


        <tr>
            <th>Тип дымохода</th>
            <td><?php echo e($catalog->chimneyType); ?></td>
        </tr>
        <tr>
            <th>Кожух</th>
            <td> <?php echo e($catalog->casing == 'н' ? '-' : $catalog->casing); ?></td>
        </tr>

        <tr>
            <th>Цена</th>
            <td><?php echo e($catalog->price); ?></td>
        </tr>

        <?php if($catalog->description): ?>

            <tr>
                <th>Описание</th>
                <td>

                    <div class="fw-bold mb-2">
                        <?php echo e($catalog->description->name); ?>

                    </div>

                    <div class="text small">
                        <?php echo $catalog->description->overview; ?>

                    </div>

                </td>
            </tr>

        <?php endif; ?>

        <tr>
            <th>Картинка</th>
            <td>  <?php if($catalog->image): ?>
                    <img src="<?php echo e(asset($catalog->image)); ?>"
                         style="max-width:200px; height:auto;">
                <?php else: ?>
                    Нет изображения
                <?php endif; ?></td>
        </tr>
    </table>

    <div class="d-flex align-items-center gap-2 mt-3">

        <a href="<?php echo e(route('catalog.edit', $catalog->id)); ?>"
           class="btn btn-outline-warning btn-sm btn-icon"
           title="Редактировать">
            <i class="bi bi-pencil"></i>
        </a>

        <button type="button"
                class="btn btn-outline-danger btn-sm btn-icon"
                title="Удалить"
                data-bs-toggle="modal"
                data-bs-target="#deleteModal"
                data-id="<?php echo e($catalog->id); ?>">
            <i class="bi bi-trash"></i>
        </button>

        <a href="<?php echo e(url()->previous()); ?>"
           class="btn btn-outline-secondary btn-icon btn-sm ms-auto">
            <i class="bi bi-arrow-left"></i> Back
        </a>

    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Подтверждение</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    Ты точно хочешь удалить товар?
                </div>

                <div class="modal-footer">

                    <form id="deleteForm" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" class="btn btn-danger">
                            Удалить
                        </button>
                    </form>

                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                        Отмена
                    </button>

                </div>

            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/my_project/resources/views/catalog/show.blade.php ENDPATH**/ ?>