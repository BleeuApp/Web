<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.Edit Detail'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('app.Edit Detail'); ?> </h1></div>

<section class="section">


<?php echo Form::model($data, ['url' => [Asset('banner/'.$data->id)],'files' => true,'method' => 'PATCH']); ?>


<?php echo $__env->make('banner.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</form>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/banner/edit.blade.php ENDPATH**/ ?>