<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('store.wr'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('store.wr'); ?> </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th><?php echo app('translator')->get('app.sno'); ?></th>
<th><?php echo app('translator')->get('store.d_person'); ?></th>
<th><?php echo app('translator')->get('app.amount'); ?></th>
<th><?php echo app('translator')->get('store.req_date'); ?></th>
<th><?php echo app('translator')->get('app.Status'); ?></th>
<th><?php echo app('translator')->get('app.Option'); ?></th>
</tr>
<?php ($i = 0); ?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php ($i++); ?>
<tr>
<td width="10%"><?php echo e($i); ?></td>
<td width="15%"><?php echo e($row->name); ?></td>
<td width="15%">Rs.<?php echo e($row->amount); ?></td>
<td width="15%"><?php echo e(date('d-M-Y',strtotime($row->created_at))); ?></td>
<td width="15%">
<?php if($row->status == 0): ?>
<span class="badge bg-warning"><?php echo app('translator')->get('store.pending'); ?></span>
<?php elseif($row->status == 1): ?>
<span class="badge bg-success"><?php echo app('translator')->get('store.approved'); ?></span>
<?php else: ?>
<span class="badge bg-danger"><?php echo app('translator')->get('store.rejected'); ?></span>
<?php endif; ?>
</td>

<td width="15%">
<?php if($row->status == 0): ?>
<a class="btn btn-success" onclick="return confirm('<?php echo app('translator')->get('app.sure'); ?>')" href="<?php echo e(Asset(env('store').'/withdrawStatus?status=1&id='.$row->id)); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('store.approv'); ?>"><i class="bi bi-check-lg"></i></a>

<a class="btn btn-danger" onclick="return confirm('<?php echo app('translator')->get('app.sure'); ?>')" href="<?php echo e(Asset(env('store').'/withdrawStatus?status=2&id='.$row->id)); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('store.rejct'); ?>"><i class="bi bi-x-lg"></i></a>
<?php endif; ?>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

</div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('store_login.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/delivery/withdraw.blade.php ENDPATH**/ ?>