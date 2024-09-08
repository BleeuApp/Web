<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.Edit Detail'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('app.Edit Detail'); ?> </h1></div>

<section class="section">


<?php echo Form::model($data, ['url' => [Asset(env('store').'/delivery/'.$data->id)],'files' => true,'method' => 'PATCH']); ?>


<?php echo $__env->make('store_login.delivery.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</form>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('store_login.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tiffin_go/local/resources/views/store_login/delivery/edit.blade.php ENDPATH**/ ?>