<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.manage_lang'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('app.manage_lang'); ?> <a class="btn btn-primary" style="float:right" href="<?php echo e(Asset('language/add')); ?>"><?php echo app('translator')->get('app.add_new'); ?></a> </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th><?php echo app('translator')->get('app.image'); ?></th>
<th><?php echo app('translator')->get('app.lang'); ?></th>
<th><?php echo app('translator')->get('app.Type'); ?></th>
<th><?php echo app('translator')->get('app.Status'); ?></th>
<th><?php echo app('translator')->get('app.Option'); ?></th>
</tr>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td width="20%"><img src="<?php echo e(Asset('upload/language/'.$row->img)); ?>" height="50px"></td>
<td width="20%"><?php echo e($row->name); ?></td>
<td width="20%"><?php if($row->type == 0): ?> <?php echo app('translator')->get('app.LTR'); ?> <?php else: ?> <?php echo app('translator')->get('app.RTL'); ?> <?php endif; ?></td>
<td width="20%">
<a href="<?php echo e(Asset('languageStatus?id='.$row->id)); ?>" onclick="return confirm('Are you sure?')">

<?php if($row->status == 0): ?> <span class="badge bg-success"><?php echo app('translator')->get('app.active'); ?></span> <?php else: ?> <span class="badge bg-danger"><?php echo app('translator')->get('app.disbale'); ?></span> <?php endif; ?>

</a>
</td>
<td width="20%">
<a class="btn btn-success" href="<?php echo e(Asset('language/'.$row->id.'/edit')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('app.Edit Detail'); ?>"><i class="bi bi-pencil-square"></i></a>
<a class="btn btn-danger" onclick="return confirm('<?php echo app('translator')->get('app.sure'); ?>')" href="<?php echo e(Asset('language/deletes/'.$row->id)); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('app.delete'); ?>"><i class="bi bi-x-octagon-fill"></i></a>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

</div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tiffin_go/local/resources/views/language/index.blade.php ENDPATH**/ ?>