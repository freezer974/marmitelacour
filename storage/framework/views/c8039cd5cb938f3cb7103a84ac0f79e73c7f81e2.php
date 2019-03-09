<?php /* /var/www/html/marmitelacour/resources/views/ateliers/create.blade.php */ ?>
<?php $__env->startSection('card'); ?>
    <?php $__env->startComponent('components.card'); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->getFromJson('Ajouter un atelier'); ?>
        <?php $__env->endSlot(); ?>
        <form method="POST" action="<?php echo e(route('atelier.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group<?php echo e($errors->has('atelier') ? ' is-invalid' : ''); ?>">
                <div class="custom-file">
                    <input type="file" id="atelier" name="atelier"
                           class="<?php echo e($errors->has('atelier') ? ' is-invalid ' : ''); ?>custom-file-input" required>
                    <label class="custom-file-label" for="atelier"></label>
                    <?php if($errors->has('atelier')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('atelier')); ?>

                        </div>
                    <?php endif; ?>
                </div>
                <br>
            </div>
            <div class="form-group">
                <img id="preview" class="img-fluid" src="#" alt="">
            </div>
            <?php echo $__env->make('partials.form-group', [
                'title' => __('Description (optionnelle)'),
                'type' => 'text',
                'name' => 'description',
                'required' => false,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="adult" name="adult">
                    <label class="custom-control-label" for="adult"> <?php echo app('translator')->getFromJson('Contenu adulte'); ?></label>
                </div>
            </div>
            <?php $__env->startComponent('components.button'); ?>
                <?php echo app('translator')->getFromJson('Envoyer'); ?>
            <?php echo $__env->renderComponent(); ?>
        </form>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(() => {
            $('input[type="file"]').on('change', (e) => {
                let that = e.currentTarget
                if (that.files && that.files[0]) {
                    $(that).next('.custom-file-label').html(that.files[0].name)
                    let reader = new FileReader()
                    reader.onload = (e) => {
                        $('#preview').attr('src', e.target.result)
                    }
                    reader.readAsDataURL(that.files[0])
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>