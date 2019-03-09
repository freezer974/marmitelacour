<?php /* /var/www/html/marmitelacour/resources/views/partials/script-delete.blade.php */ ?>
<script>
    $(() => {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        })
        $('[data-toggle="tooltip"]').tooltip()
        $('a.btn-danger').click((e) => {
            let that = $(e.currentTarget)
            e.preventDefault()
            swal.fire({
                title: '<?php echo e($text); ?>',
                type: 'error',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: '<?php echo app('translator')->getFromJson('Oui'); ?>',
                cancelButtonText: '<?php echo app('translator')->getFromJson('Non'); ?>'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: that.attr('href'),
                        type: 'DELETE'
                    })
                    .done(() => {
                        <?php switch($return):
                            case ('removeTr'): ?>
                                that.parents('tr').remove()
                                <?php break; ?>
                            <?php case ('reload'): ?>
                                location.reload()
                                <?php break; ?>
                        <?php endswitch; ?>
                    })
                    .fail(() => {
                        swal({
                            title: '<?php echo app('translator')->getFromJson('Il semble y avoir une erreur sur le serveur, veuillez réessayer plus tard...'); ?>',
                            type: 'warning'
                        })
                    })
                }
            })
        })
    })
</script>