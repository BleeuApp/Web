<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('store.paid_history'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('store.paid_history'); ?> </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th><?php echo app('translator')->get('app.date_added'); ?></th>
<th><?php echo app('translator')->get('app.amount'); ?></th>
<th><?php echo app('translator')->get('app.notes'); ?></th>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>
<td width="33%"><?php echo e(date('d-M-Y',strtotime($row->date_added))); ?></td>
<td width="33%"><?php echo e($c.$row->amount); ?></td>
<td width="33%"><?php echo e($row->notes); ?></td>
</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tr>
</table>

</div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('store_login.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/home/paid.blade.php ENDPATH**/ ?>