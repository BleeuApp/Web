<?php ($i = 0); ?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div style="border: 1px solid gray;padding: 10px 10px;border-radius: 10px;margin-top: 20px;">
<table width="100%" style="text-align: center;">

<tr>
<td width="80%">
<b>Delivered On : <?php echo e(date('l, M d, Y',strtotime($row->delivery_date))); ?></b>

<h2><?php echo e(Auth::guard('store')->user()->name); ?></h2>
</td>
<td width="20%" style="text-align: left !important;">&nbsp;</td>
</tr>

<tr>
<td width="80%"><h1><?php echo e($row->name); ?><span style="display: block;font-weight: 100;font-size: 15;"><?php echo e($row->address); ?></span></h1></td>
<td width="20%">&nbsp;</td>
</tr>

<tr>
<td width="80%"><b><?php echo e($row->description); ?></b></td>
<td width="20%">&nbsp;</td>
</tr>

<tr>
<td width="80%"><b>Notes : </b> <?php echo e($row->notes); ?></td>
<td width="20%">&nbsp;</td>
</tr>

</table>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/order/print.blade.php ENDPATH**/ ?>