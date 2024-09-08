<?php $__env->startSection('title'); ?> <?php echo e(__('app.App Users')); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo e(__('app.App Users')); ?></h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th><?php echo e(__('app.sno')); ?></th>
<th><?php echo e(__('app.Name')); ?></th>
<th><?php echo e(__('app.Email')); ?></th>
<th><?php echo e(__('app.Phone')); ?></th>
<th><?php echo e(__('app.Status')); ?></th>
<th><?php echo e(__('app.Wallet')); ?></th>
<th><?php echo e(__('app.Reg. Date')); ?></th>
<th><?php echo e(__('app.Option')); ?></th>
</tr>
<?php ($i = 0); ?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php ($i++); ?>
<tr>
<td width="10%"><?php echo e($i); ?></td>
<td width="12%"><?php echo e($row->name); ?></td>
<td width="15%"><?php echo e($row->email); ?></td>
<td width="12%"><?php echo e($row->phone); ?></td>
<td width="10%">
<a href="<?php echo e(Asset('appuserStatus?id='.$row->id)); ?>" onclick="return confirm('Are you sure?')">

<?php if($row->status == 1): ?> <span class="badge bg-success"><?php echo e(__('app.Active')); ?></span> <?php else: ?> <span class="badge bg-danger"><?php echo e(__('app.Disabled')); ?></span> <?php endif; ?>

</a>
</td>
<td width="12%"><?php echo e($row->wallet); ?></td>
<td width="12%"><?php echo e(date('d-M-Y',strtotime($row->created_at))); ?></td>
<td width="12%"><a class="btn btn-success" href="<?php echo e(Asset('userEdit?id='.$row->id)); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('app.Edit Detail')); ?>"><i class="bi bi-pencil-square"></i></a>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

</div>
</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tiffin_go/local/resources/views/home/appuser.blade.php ENDPATH**/ ?>