<title><?php echo app('translator')->get('store.item_chart'); ?> - <?php echo e(date('d-M-Y',strtotime($_GET['date']))); ?></title>

<div style="width:100%">
<h1 align="center"><?php echo app('translator')->get('store.item_chart'); ?> - <?php echo e(date('d-M-Y',strtotime($_GET['date']))); ?></h1>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div style="width:33%;float:left">
<h3><?php echo e($row['tiffin']); ?></h3>

<style>
td
{
    padding:10px 10px
}
</style>

<table width="90%" border="1" cellpadding="0" cellspacing="0" style="float:left">
<tr style="background-color: #607d8b;color:white">
<td width="60%"><b><?php echo app('translator')->get('store.item'); ?></b></td>
<td width="40%"><b><?php echo app('translator')->get('store.qty'); ?></b></td>
</tr>
<?php $__currentLoopData = $row['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td width="60%"><b><?php echo e($item['name']); ?></b></td>
<td width="40%"><b><?php echo e($item['sum']); ?></b></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/order/chart.blade.php ENDPATH**/ ?>