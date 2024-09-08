<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.Manage Vendors'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('app.Manage Vendors'); ?> <a class="btn btn-primary" style="float:right" href="<?php echo e(Asset('store/add')); ?>"><?php echo app('translator')->get('app.add_new'); ?></a> </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th><?php echo app('translator')->get('app.sno'); ?></th>
<th><?php echo app('translator')->get('app.image'); ?></th>
<th><?php echo app('translator')->get('app.name'); ?></th>
<th><?php echo app('translator')->get('app.address'); ?></th>
<th><?php echo app('translator')->get('app.Status'); ?></th>
<th><?php echo app('translator')->get('app.Option'); ?></th>
</tr>
<?php ($i = 0); ?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php ($i++); ?>
<tr>
<td width="5%"><?php echo e($i); ?></td>
<td width="15%"><?php if($row->img): ?> <img src="<?php echo e(Asset('upload/store/'.$row->img)); ?>" height="60px"> <?php endif; ?>

<?php if(!$row->password): ?> <small style="color:red">Self Registered</small> <?php endif; ?>

</td>
<td width="20%"><?php echo e($row->name); ?></td>
<td width="20%"><?php echo e($row->address); ?></td>
<td width="15%">
    <a href="<?php echo e(Asset('storeStatus?id='.$row->id)); ?>" onclick="return confirm('Are you sure?')">
    
    <?php if($row->status == 0): ?> <span class="badge bg-success"><?php echo app('translator')->get('app.active'); ?></span> <?php else: ?> <span class="badge bg-danger"><?php echo app('translator')->get('app.disbale'); ?></span> <?php endif; ?>
    
    </a>
    </td>
<td width="25%">
<a class="btn btn-primary" href="javascript::void()" data-bs-toggle="modal" data-bs-target="#largeModal<?php echo e($row->id); ?>"><i class="bi bi-link-45deg"></i></a>

<a class="btn btn-dark" href="<?php echo e(Asset('createQr?id='.$row->id)); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('app.create_qr'); ?>" target="_blank"><i class="bi bi-qr-code"></i></a>


<a class="btn <?php if($row->trend == 1): ?> btn-success <?php else: ?> btn-warning <?php endif; ?>" href="<?php echo e(Asset('trend?id='.$row->id)); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('app.trend'); ?>" onclick="return confirm('Are you sure?')"><i class="bi bi-rocket-takeoff"></i></a>
<a class="btn btn-info" href="<?php echo e(Asset('loginAsStore?id='.$row->id)); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('app.login_as'); ?>" target="_blank"><i class="bi bi-box-arrow-in-right"></i></i></a>
<a class="btn btn-success" href="<?php echo e(Asset('store/'.$row->id.'/edit')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('app.Edit Detail'); ?>"><i class="bi bi-pencil-square"></i></a>
<a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="<?php echo e(Asset('store/delete/'.$row->id)); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('app.delete'); ?>"><i class="bi bi-x-octagon-fill"></i></a>
</td>
</tr>

<?php echo $__env->make('store.cate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

</div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store/index.blade.php ENDPATH**/ ?>