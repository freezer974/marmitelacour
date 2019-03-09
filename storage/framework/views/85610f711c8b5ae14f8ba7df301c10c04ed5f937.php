<?php /* /var/www/html/marmitelacour/resources/views/roles/create.blade.php */ ?>
<?php $__env->startSection('card'); ?>

    <?php $__env->startComponent('components.card'); ?>

        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->getFromJson('Ajouter un rôle'); ?>
        <?php $__env->endSlot(); ?>

        <form method="POST" action="<?php echo e(route('role.store')); ?>">
            <?php echo e(csrf_field()); ?>


            <?php echo $__env->make('partials.form-group', [
                'title' => __('Nom'),
                'type' => 'text',
                'name' => 'label',
                'required' => true,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php $__env->startComponent('components.button'); ?>
                <?php echo app('translator')->getFromJson('Envoyer'); ?>
            <?php echo $__env->renderComponent(); ?>

        </form>

    <?php echo $__env->renderComponent(); ?>            

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>