<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.account_setting'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('app.account_setting'); ?></h1></div>

<form action="<?php echo e(Asset(env('store').'/setting')); ?>" method="POST">
<?php echo csrf_field(); ?>


<?php echo $__env->make('store.form',['data' => Auth::guard('store')->user()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('store_login.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tiffin_go/local/resources/views/store_login/home/setting.blade.php ENDPATH**/ ?>