<?php $__env->startSection('content'); ?>
    <div class="container-1600">
    <h5>Редактировать</h5>

    <div class="card p-3 mb-4 shadow-sm">
        <form action="<?php echo e(route('catalog.update', $catalog->id)); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('patch'); ?>

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Название</label>
                    <input type="text" name="name" class="form-control" value="<?php echo e($catalog->name); ?>">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Тип</label>
                    <input type="text" name="type" class="form-control" value="<?php echo e($catalog->type); ?>">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Толщина</label>
                    <input type="text" name="thickness" class="form-control" value="<?php echo e($catalog->thickness); ?>">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Марка</label>
                    <input type="number" name="grade" class="form-control" value="<?php echo e($catalog->grade); ?>">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Диаметр</label>
                    <input type="text" name="diameter" class="form-control" value="<?php echo e($catalog->diameter); ?>">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Тип дымохода</label>
                    <input type="text" name="chimneyType" class="form-control" value="<?php echo e($catalog->chimneyType); ?>">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Кожух</label>
                    <input type="text" name="casing" class="form-control" value="<?php echo e($catalog->casing == 'н' ? '-' : $catalog->casing); ?>">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Цена</label>
                    <input type="number" name="price" class="form-control" value="<?php echo e($catalog->price); ?>">
                </div>

                <div class="col-md-12">

                    <label class="form-label">Опис</label>

                    <select name="description_id" class="form-control">

                        <option value="">Без опису</option>

                        <?php $__currentLoopData = $descriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($description->id); ?>"
                                <?php echo e($catalog->description_id == $description->id ? 'selected' : ''); ?>>

                                <?php echo e($description->name); ?>


                            </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                </div>

                <!-- Картинка (занимает всю ширину справа/снизу) -->
                <div class="col-md-12">
                    <label class="form-label">Картинка</label>

                    <?php if($catalog->image): ?>
                        <div class="mb-2">
                            <img src="<?php echo e(asset($catalog->image)); ?>"
                                 style="max-width: 150px;">
                        </div>




                        <button type="button"
                                class="btn btn-outline-danger btn-sm btn-icon"
                                title="Удалить картинку"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteImageModal"
                                data-id="<?php echo e($catalog->id); ?>">
                            <i class="bi bi-trash"></i>
                        </button>

                    <?php endif; ?>

                    <input type="file" name="image" class="form-control">
                </div>

            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success btn-icon">
                    <i class="bi bi-save"></i> Сохранить
                </button>
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-outline-secondary btn-icon">
                    <i class="bi bi-arrow-left"></i>Back</a>
            </div>

        </form>
    </div>
    <div class="modal fade" id="deleteImageModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Удаление изображения</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    Ты точно хочешь удалить изображение?
                </div>

                <div class="modal-footer">

                    <form method="POST" action="<?php echo e(route('catalog.image.remove', $catalog->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" class="btn btn-danger ">Удалить картинку</button>
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

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/my_project/resources/views/catalog/edit.blade.php ENDPATH**/ ?>