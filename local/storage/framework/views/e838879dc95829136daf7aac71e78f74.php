<?php $__env->startSection('title'); ?> <?php echo e(Auth::guard('store')->user()->name); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<style>
.total
{
    border-left: 10px solid #03a9f4;
}

.current
{
    border-left: 10px solid #009688;
}

.last
{
    border-left: 10px solid #ff9800;
}
</style>

<div class="pagetitle"><h1><?php echo app('translator')->get('app.welcome'); ?>, <?php echo e(Auth::guard('store')->user()->name); ?></h1></div>

<section class="section">
<br>
<?php echo $__env->make('store_login.home.overview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<br>

<?php echo $__env->make('store_login.home.latest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('store_login.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tiffin_go/local/resources/views/store_login/home/home.blade.php ENDPATH**/ ?>