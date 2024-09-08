<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('store.up_d'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('store.up_d'); ?> </h1></div><br>

<div class="card">
<div class="card-body">
<br>
<form action="<?php echo e(Asset(env('store').'/next')); ?>">
<div class="row">
<div class="col-lg-3"><input type="text" class="form-control" placeholder="<?php echo app('translator')->get('store.from_date'); ?>" id="datepicker" name="from" autocomplete="off" value="<?php echo e($from); ?>" required></div>
<div class="col-lg-3"><input type="text" class="form-control" placeholder="<?php echo app('translator')->get('store.to_date'); ?>" id="datepicker2" name="to" autocomplete="off" value="<?php echo e($to); ?>" required></div>
<div class="col-lg-3"><button class="btn btn-primary" type="submit"><?php echo app('translator')->get('store.get_data'); ?></button></div>
</div>
</form>
</div>
</div>

<?php if(isset($_GET['from'])): ?>
<div class="card">
<div class="card-body">
<br>
<table class="table">
<thead class="table-light">
<tr>
<th><?php echo app('translator')->get('app.sno'); ?></th>
<th><?php echo app('translator')->get('store.date'); ?></th>
<th><?php echo app('translator')->get('store.breakfast'); ?></th>
<th><?php echo app('translator')->get('store.lunch'); ?></th>
<th><?php echo app('translator')->get('store.dinner'); ?></th>
<th>View</th>
</tr>
</thead>
<?php ($i=1); ?>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td width="10%"><?php echo e($i++); ?></td>
<td width="15%"><?php echo e(date('d-M-Y',strtotime($row['date']))); ?></td>
<td width="15%"><?php echo e($row['breakfast']); ?></td>
<td width="15%"><?php echo e($row['lunch']); ?></td>
<td width="15%"><?php echo e($row['dinner']); ?></td>
<td width="15%"><a class="btn btn-primary" href="<?php echo e(Asset(env('store').'/today?date='.$row['date'])); ?>" target="_blank"><?php echo app('translator')->get('store.view_detail'); ?></a></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table>

</div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
    $( "#datepicker2" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
});

  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('store_login.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/order/next.blade.php ENDPATH**/ ?>