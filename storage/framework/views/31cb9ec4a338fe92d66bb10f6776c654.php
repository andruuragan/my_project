<?php $__env->startSection('content'); ?>

    <div class="container mt-4">
        <div class="table-wrapper">

            <h1>Каталог</h1>
            <a href="#bottom" class="scroll-down">
                <span class="arrow">▼</span>
                <span class="text">Вниз</span>
            </a>
            <?php echo e($items->links()); ?>

            <a href="<?php echo e(route('catalog.create')); ?>" class="btn btn-success mb-3 btn-icon">
                <i class="bi bi-cart-plus"></i> Добавить товар
            </a>

            <a href="<?php echo e(route('catalog.search')); ?>" class="btn btn-info mb-3 btn-icon">
                <i class="bi bi-search"></i> Найти товар
            </a>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th style="width: 300px;">Название</th>
                    <th style="width: 110px;">Тип элемента</th>
                    <th style="width: 70px;">Thickness</th>
                    <th style="width: 80px;">Марка нерж.</th>
                    <th style="width: 80px;">Диаметр</th>
                    <th style="width: 120px;">Тип дымохода</th>
                    <th style="width: 60px;">Кожух</th>
                    <th style="width: 80px;">Цена (грн.)</th>
                    <th style="width: 120px;">Картинка</th>

                    
                    <th style="width: 80px;">Описание</th>

                    <th style="width: 150px;">Действия</th>
                </tr>
                </thead>

                <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->id); ?></td>
                        <td><a href="<?php echo e(route('admin.catalog.show',$item->id)); ?>"><?php echo e($item->name); ?></a></td>

                        <td style="width: 80px;">
                            <?php echo e($item->type); ?>

                        </td>

                        <td><?php echo e($item->thickness); ?></td>
                        <td><?php echo e($item->grade); ?></td>
                        <td><?php echo e($item->diameter); ?></td>
                        <td><?php echo e($item->chimneyType); ?></td>
                        <td><?php echo e($item->casing == 'н' ? '-' : $item->casing); ?></td>
                        <td><?php echo e($item->price); ?></td>
                        <td><?php if($item->image): ?>
                                <img src="<?php echo e(asset($item->image)); ?>"
                                     style="width: 60px; height: 60px; object-fit: cover;">
                            <?php else: ?>
                                -
                            <?php endif; ?></td>

                        
                        <td class="text-center">
                            <?php if($item->description): ?>
                                <i class="bi bi-check-circle-fill text-success" style="font-size: 24px;"></i>
                            <?php else: ?>
                                <i class="bi bi-x-circle-fill text-danger" style="font-size: 24px;"></i>
                            <?php endif; ?>
                        </td>


                        <td>
                            <a href="<?php echo e(route('admin.catalog.show', $item->id)); ?>"
                               class="btn btn-sm btn-outline-info btn-icon me-2">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="<?php echo e(route('catalog.edit', $item->id)); ?>"
                               class="btn btn-outline-warning btn-sm btn-icon me-2"
                               title="Редактировать">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <button type="button"
                                    class="btn btn-outline-danger btn-sm btn-icon"
                                    title="Удалить"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-id="<?php echo e($item->id); ?>">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <?php echo e($items->links()); ?>

            <div id="bottom"></div>

            <a href="#top" class="scroll-top">
                <span class="arrow">▲</span>
                <span class="text">Вверх</span>
            </a>

        </div>
    </div>

    
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Подтверждение удаления</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    Ты точно хочешь удалить товар?
                </div>

                <div class="modal-footer">
                    <form id="deleteForm" method="POST" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" class="btn btn-danger">
                            Удалить
                        </button>
                    </form>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Отмена
                    </button>
                </div>

            </div>
        </div>
    </div>

    
   
<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Находим все кнопки удаления в таблице
    const deleteButtons = document.querySelectorAll('[data-bs-target="#deleteModal"]');
    const deleteModalElement = document.getElementById('deleteModal');
    
    if (deleteModalElement && deleteButtons.length > 0) {
        // Инициализируем модальное окно Bootstrap вручную
        const bsModal = new bootstrap.Modal(deleteModalElement);

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault(); // На всякий случай предотвращаем дефолтное поведение

                const itemId = this.getAttribute('data-id');
                const deleteForm = document.getElementById('deleteForm');
                
                if (deleteForm && itemId) {
                    // Явно прописываем роут админки
                    deleteForm.action = `/admin/catalog/${itemId}`;
                    
                    // Принудительно показываем модалку на экран
                    bsModal.show();
                }
            });
        });
    }
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/my_project/resources/views/catalog/index.blade.php ENDPATH**/ ?>