<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('store.view_title'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('store.view_title'); ?></h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th><?php echo app('translator')->get('store.user'); ?></th>
<th><?php echo app('translator')->get('app.Phone'); ?></th>
<th><?php echo app('translator')->get('app.address'); ?></th>
<th><?php echo app('translator')->get('app.amount'); ?></th>
<th><?php echo app('translator')->get('store.discount'); ?></th>
<th><?php echo app('translator')->get('store.total'); ?></th>
<th><?php echo app('translator')->get('app.plan'); ?></th>
<th><?php echo app('translator')->get('store.sdate'); ?></th>
<th><?php echo app('translator')->get('store.valid'); ?></th>
</tr>
<tr>
<td width="10%"><?php echo e($data->user_name); ?></td>
<td width="10%"><?php echo e($data->user_phone); ?></td>
<td width="20%"><?php echo e($data->address); ?> <?php echo e($data->floor); ?> <?php echo e($data->landmark); ?></td>
<td width="10%"><?php echo e($setting->currency.$data->total + $data->discount); ?></td>
<td width="10%"><?php if($data->discount): ?> <?php echo e($setting->currency.$data->discount); ?> <?php else: ?> 0 <?php endif; ?></td>
<td width="10%"><?php echo e($setting->currency.$data->total); ?></td>
<td width="10%"><?php echo e($data->plan); ?></td>
<td width="10%"><?php echo e(date('d-M-Y',strtotime($data->start_date))); ?></td>
<td width="10%"><?php echo e(date('d-M-Y',strtotime($data->end_date))); ?></td>
</tr>
</table>

</div>
</div>
</section>

<div class="pagetitle"><h1><?php echo app('translator')->get('store.item'); ?></h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th><?php echo app('translator')->get('store.item'); ?></th>
<th><?php echo app('translator')->get('app.desc'); ?></th>
<th><?php echo app('translator')->get('app.Type'); ?></th>
<th><?php echo app('translator')->get('store.price'); ?></th>
<th><?php echo app('translator')->get('app.days'); ?></th>
<th><?php echo app('translator')->get('store.total'); ?></th>
</tr>
<?php $__currentLoopData = $data->getItem($data->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td width="10%"><?php echo e($item->name); ?></td>
<td width="25%"><?php echo e($item->description); ?></td>
<td width="10%"><?php echo e($item->type); ?></td>
<td width="10%"><?php echo e($setting->currency.$item->price); ?></td>
<td width="35%"><?php $__currentLoopData = explode(',',$item->days); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <span class="badge bg-info"><?php echo e($day); ?></span> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
<td width="10%"><?php echo e($setting->currency.$item->price_total); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

</div>
</div>
</section>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('store_login.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/order/view.blade.php ENDPATH**/ ?>