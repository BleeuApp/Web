<table class="table">
<thead class="table-primary">
<tr>
<th><?php echo app('translator')->get('app.image'); ?></th>
<th><?php echo app('translator')->get('app.Name'); ?></th>
<th><?php echo app('translator')->get('store.breakfast'); ?></th>
<th><?php echo app('translator')->get('store.lunch'); ?></th>
<th><?php echo app('translator')->get('store.dinner'); ?></th>
</tr>
</thead>
<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td width="20%"><img src="<?php echo e($row['img']); ?>" style="width:100px"></td>
<td width="20%"><?php echo e($row['name']); ?></td>
<td width="20%"><?php echo e($row['breakfast']); ?></td>
<td width="20%"><?php echo e($row['lunch']); ?></td>
<td width="20%"><?php echo e($row['dinner']); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/order/item_detail.blade.php ENDPATH**/ ?>