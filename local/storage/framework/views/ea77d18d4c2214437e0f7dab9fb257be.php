<table class="table">
<tr>
<th><?php echo app('translator')->get('app.sno'); ?></th>
<th><?php echo app('translator')->get('store.user'); ?></th>
<th><?php echo app('translator')->get('app.Phone'); ?></th>
<th><?php echo app('translator')->get('app.address'); ?></th>
<th><?php echo app('translator')->get('app.amount'); ?></th>
<th><?php echo app('translator')->get('app.plan'); ?></th>
<th><?php echo app('translator')->get('store.sdate'); ?></th>
<th><?php echo app('translator')->get('store.valid'); ?></th>
<th><?php echo app('translator')->get('app.Option'); ?></th>
</tr>
<?php ($i = 1); ?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td width="5%"><?php echo e($i++); ?></td>
<td width="10%"><?php echo e($row->user_name); ?></td>
<td width="10%"><?php echo e($row->user_phone); ?></td>
<td width="20%"><?php echo e($row->address); ?> <?php echo e($row->floor); ?> <?php echo e($row->landmark); ?></td>
<td width="10%"><?php echo e($setting->currency.$row->total); ?></td>
<td width="10%"><?php echo e($row->plan); ?></td>
<td width="10%"><?php echo e(date('d-M-Y',strtotime($row->start_date))); ?></td>
<td width="10%"><?php echo e(date('d-M-Y',strtotime($row->end_date))); ?></td>
<td width="10%"><a class="btn btn-primary" href="<?php echo e(Asset(env('store').'/orderView?id='.$row->id)); ?>" target="_blank"><?php echo app('translator')->get('store.view'); ?></a></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/order/table.blade.php ENDPATH**/ ?>