<?php /* /var/www/html/marmitelacour/resources/views/components/button.blade.php */ ?>
<button type="submit" class="btn <?php if(isset($color)): ?><?php echo e(' btn-' . $color); ?><?php else: ?> btn-primary <?php endif; ?> float-right">
    <?php echo e($slot); ?>

</button>