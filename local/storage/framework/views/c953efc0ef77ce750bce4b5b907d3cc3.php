<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.add_new'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('app.add_new'); ?> </h1></div>

<section class="section">


<?php echo Form::model($data, ['url' => [Asset('store')],'files' => true]); ?>


<?php echo $__env->make('store.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</form>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store/add.blade.php ENDPATH**/ ?>