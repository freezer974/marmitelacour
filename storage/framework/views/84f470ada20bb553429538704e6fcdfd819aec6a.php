<?php /* /var/www/html/marmitelacour/resources/views/roles/index.blade.php */ ?>
<?php $__env->startSection('card'); ?>
    <?php $__env->startComponent('components.card'); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->getFromJson('Gestion des roles'); ?>
        <?php $__env->endSlot(); ?>
        <table class="table table-dark text-white">
            <tbody>
            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($role->label); ?></td>
                    <td>
                        <a role="button" href="<?php echo e(route('role.edit', $role->id)); ?>" class="btn btn-warning btn-sm pull-right mr-2 invisible" data-toggle="tooltip" title="<?php echo app('translator')->getFromJson('Modifier le rôle'); ?> <?php echo e($role->label); ?>">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                        <a role="button" href="<?php echo e(route('role.destroy', $role->id)); ?>" class="btn btn-danger btn-sm pull-right invisible" data-toggle="tooltip" title="<?php echo app('translator')->getFromJson('Supprimer le rôle'); ?> <?php echo e($role->label); ?>">
                           <i class="fas fa-trash fa-lg"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(() => {
            $('a').removeClass('invisible')
        })
    </script>
    <?php echo $__env->make('partials.script-delete', ['text' => __('Vraiment supprimer ce rôle ?'), 'return' => 'removeTr'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>