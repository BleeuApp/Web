<form method="POST" action="<?php echo e(Asset(env('store').'/assign')); ?>" onsubmit="return confirm('<?php echo app('translator')->get('app.sure'); ?>')">
<?php echo csrf_field(); ?>


<div class="row">
<div class="col-lg-3">
<select name="delivery_id" class="form-control" required>
<option value=""><?php echo app('translator')->get('store.select_person'); ?></option>
<?php $__currentLoopData = $delivery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($d->id); ?>"><?php echo e($d->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
<div class="col-lg-3"><button type="submit" class="btn btn-primary"><?php echo app('translator')->get('store.assign'); ?></button></div>
</div>
<br>
<table class="table">
<thead class="table-light">
<tr>
<th><?php echo app('translator')->get('app.sno'); ?></th>
<th><?php echo app('translator')->get('store.user'); ?></th>
<th><?php echo app('translator')->get('app.Phone'); ?></th>
<th><?php echo app('translator')->get('app.address'); ?></th>
<th><?php echo app('translator')->get('store.item'); ?></th>
<th><?php echo app('translator')->get('app.desc'); ?></th>
</tr>
</thead>
<?php ($i = 1); ?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td width="5%"><?php echo e($i++); ?> <?php if(!$row->delivery_id): ?> <input type="checkbox" name="chk[]" value="<?php echo e($row->date_id); ?>"><?php endif; ?></td>
<td width="10%"><?php echo e($row->user_name); ?></td>
<td width="10%"><?php echo e($row->user_phone); ?></td>
<td width="20%"><?php echo e($row->address); ?> <?php echo e($row->floor); ?> <?php echo e($row->landmark); ?> <a href="http://maps.google.com/?q=<?php echo e($row->lat); ?>,<?php echo e($row->lng); ?>" target="_blank"><?php echo app('translator')->get('store.view_loc'); ?></a>

<?php if($row->notes): ?> <small style="display: block;color:red"><?php echo app('translator')->get('app.notes'); ?> : <?php echo e($row->notes); ?></small> <?php endif; ?>

</td>
<td width="20%"><?php echo e($row->name); ?><br><small><?php echo e($row->description); ?></small></td>
<td width="10%"><?php echo e(number_format($row->distance,2)); ?><?php echo app('translator')->get('store.km'); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
</form>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/order/delivery_detail.blade.php ENDPATH**/ ?>