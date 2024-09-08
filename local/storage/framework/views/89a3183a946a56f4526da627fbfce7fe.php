<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.plan_title'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('app.plan_title'); ?> <a class="btn btn-primary" style="float:right" href="<?php echo e(Asset('plan/add')); ?>"><?php echo app('translator')->get('app.add_new'); ?></a> </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th><?php echo app('translator')->get('app.plan'); ?></th>
<th><?php echo app('translator')->get('app.time'); ?></th>
<th><?php echo app('translator')->get('app.rec'); ?></th>
<th><?php echo app('translator')->get('app.Status'); ?></th>
<th><?php echo app('translator')->get('app.Option'); ?></th>
</tr>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td width="20%"><?php echo e($row->title); ?></td>
<td width="20%">
<?php if($row->type == 1): ?>
<?php echo e($row->value); ?> <?php echo app('translator')->get('app.month'); ?>
<?php elseif($row->type == 2): ?>
<?php echo e($row->value); ?> <?php echo app('translator')->get('app.week'); ?>
<?php else: ?>
<?php echo e($row->value); ?> <?php echo app('translator')->get('app.days'); ?>
<?php endif; ?>
</td>
<td width="20%"><?php if($row->rec_payment == 0): ?> <?php echo app('translator')->get('app.yes'); ?> <?php else: ?> <?php echo app('translator')->get('app.no'); ?> <?php endif; ?></td>
<td width="20%">
<a href="<?php echo e(Asset('planStatus?id='.$row->id)); ?>" onclick="return confirm('<?php echo app('translator')->get('app.sure'); ?>')">

<?php if($row->status == 0): ?> <span class="badge bg-success"><?php echo app('translator')->get('app.active'); ?></span> <?php else: ?> <span class="badge bg-danger"><?php echo app('translator')->get('app.dis'); ?></span> <?php endif; ?>

</a>
</td>
<td width="20%">
<a class="btn btn-success" href="<?php echo e(Asset('plan/'.$row->id.'/edit')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('app.Edit Detail'); ?>"><i class="bi bi-pencil-square"></i></a>
<a class="btn btn-danger" onclick="return confirm('<?php echo app('translator')->get('app.sure'); ?>')" href="<?php echo e(Asset('plan/delete/'.$row->id)); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('app.delete'); ?>"><i class="bi bi-x-octagon-fill"></i></a>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

</div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/plan/index.blade.php ENDPATH**/ ?>