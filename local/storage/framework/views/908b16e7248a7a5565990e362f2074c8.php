<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.welcome_slider'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('app.welcome_slider'); ?> <a class="btn btn-primary" style="float:right" href="<?php echo e(Asset('slider/add')); ?>"><?php echo app('translator')->get('app.add_new'); ?></a> </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th><?php echo app('translator')->get('app.image'); ?></th>
<th><?php echo app('translator')->get('app.Sort No'); ?></th>
<th><?php echo app('translator')->get('app.Option'); ?></th>
</tr>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td width="40%"><img src="<?php echo e(Asset('upload/slider/'.$row->img)); ?>" height="60px"></td>
<td width="20%"><?php echo e($row->sort_no); ?></td>
<td width="20%">
<a class="btn btn-success" href="<?php echo e(Asset('slider/'.$row->id.'/edit')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('app.Edit Detail'); ?>"><i class="bi bi-pencil-square"></i></a>
<a class="btn btn-danger" onclick="return confirm('<?php echo app('translator')->get('app.sure'); ?>')" href="<?php echo e(Asset('slider/delete/'.$row->id)); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('app.delete'); ?>"><i class="bi bi-x-octagon-fill"></i></a>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

</div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/slider/index.blade.php ENDPATH**/ ?>