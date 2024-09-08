<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('store.d_staff'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('store.d_staff'); ?> <a class="btn btn-primary" style="float:right" href="<?php echo e(Asset(env('store').'/delivery/add')); ?>"><?php echo app('translator')->get('app.add_new'); ?></a> </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th><?php echo app('translator')->get('app.sno'); ?></th>
<th><?php echo app('translator')->get('app.Name'); ?></th>
<th><?php echo app('translator')->get('app.Phone'); ?></th>
<th><?php echo app('translator')->get('app.Status'); ?></th>
<th><?php echo app('translator')->get('store.online'); ?></th>
<th><?php echo app('translator')->get('app.Option'); ?></th>
</tr>
<?php ($i = 0); ?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php ($i++); ?>
<tr>
<td width="10%"><?php echo e($i); ?></td>
<td width="15%"><?php echo e($row->name); ?></td>
<td width="15%"><?php echo e($row->phone); ?></td>
<td width="15%">
<a href="<?php echo e(Asset(env('store').'/deliveryStatus?id='.$row->id)); ?>" onclick="return confirm('Are you sure?')">

<?php if($row->status == 0): ?> <span class="badge bg-success"><?php echo app('translator')->get('app.active'); ?></span> <?php else: ?> <span class="badge bg-danger"><?php echo app('translator')->get('app.dis'); ?></span> <?php endif; ?>

</a>
</td>

<td width="15%">
<a href="<?php echo e(Asset(env('store').'/onlineStatus?id='.$row->id)); ?>" onclick="return confirm('Are you sure?')">

<?php if($row->online == 1): ?> <span class="badge bg-success"><?php echo app('translator')->get('store.online'); ?></span> <?php else: ?> <span class="badge bg-danger"><?php echo app('translator')->get('store.offline'); ?></span> <?php endif; ?>

</a>
</td>

<td width="15%">
<a class="btn btn-success" href="<?php echo e(Asset(env('store').'/delivery/'.$row->id.'/edit')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('app.Edit Detail'); ?>"><i class="bi bi-pencil-square"></i></a>
<a class="btn btn-danger" onclick="return confirm('<?php echo app('translator')->get('app.sure'); ?>')" href="<?php echo e(Asset(env('store').'/delivery/delete/'.$row->id)); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('app.delete'); ?>"><i class="bi bi-x-octagon-fill"></i></a>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

</div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('store_login.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/delivery/index.blade.php ENDPATH**/ ?>