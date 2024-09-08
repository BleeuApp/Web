<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('store.tifin'); ?>  <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('store.tifin'); ?> <a class="btn btn-primary" style="float:right" href="<?php echo e(Asset(env('store').'/tifin/add')); ?>"><?php echo app('translator')->get('app.add_new'); ?></a> </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th><?php echo app('translator')->get('app.sno'); ?></th>
<th><?php echo app('translator')->get('app.image'); ?></th>
<th><?php echo app('translator')->get('app.title'); ?></th>
<th><?php echo app('translator')->get('app.desc'); ?></th>
<th><?php echo app('translator')->get('store.price'); ?></th>
<th><?php echo app('translator')->get('app.Status'); ?></th>
<th><?php echo app('translator')->get('app.Option'); ?></th>
</tr>
<?php ($i = 0); ?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php ($i++); ?>
<?php ($admin = App\Models\User::find(1)); ?>
<tr>
<td width="5%"><?php echo e($i); ?></td>
<td width="12%"><?php if($row->img): ?> <img src="<?php echo e(Asset('upload/tifin/'.$row->img)); ?>" height="50px"> <?php endif; ?></td>
<td width="17%"><?php echo e($row->name); ?></td>
<td width="17%"><?php echo e($row->text); ?></td>
<td width="17%"><?php echo e($admin->currency.$row->price); ?></td>
<td width="17%">
<a href="<?php echo e(Asset(env('store').'/tifinStatus?id='.$row->id)); ?>" onclick="return confirm('Are you sure?')">

<?php if($row->status == 0): ?> <span class="badge bg-success"><?php echo app('translator')->get('app.active'); ?></span> <?php else: ?> <span class="badge bg-danger"><?php echo app('translator')->get('app.dis'); ?></span> <?php endif; ?>

</a>
</td>
<td width="15%">
<a class="btn btn-success" href="<?php echo e(Asset(env('store').'/tifin/'.$row->id.'/edit')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('app.Edit Detail'); ?>"><i class="bi bi-pencil-square"></i></a>
<a class="btn btn-danger" onclick="return confirm('<?php echo app('translator')->get('app.sure'); ?>')" href="<?php echo e(Asset(env('store').'/tifin/delete/'.$row->id)); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('app.delete'); ?>"><i class="bi bi-x-octagon-fill"></i></a>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

</div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('store_login.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/tifin/index.blade.php ENDPATH**/ ?>