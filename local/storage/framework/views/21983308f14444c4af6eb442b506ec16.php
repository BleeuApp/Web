<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('store.sub'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('store.sub'); ?></h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>

<?php echo $__env->make('store_login.order.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('store_login.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/order/index.blade.php ENDPATH**/ ?>