<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.up'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('app.up'); ?> </h1></div>

<section class="section">

<?php echo Form::open(['url' => [Asset('paid')],'files' => true]); ?>

<div class="card">
<div class="card-body"><br>

<input type="hidden" name="id" value="<?php echo e($_GET['id']); ?>">

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.paid_amount'); ?></label>
<input type="number" class="form-control" id="inputNanme4" name="amount" required>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.date_added'); ?></label>
<input type="text" class="form-control" id="datepicker" name="date_added" required value="<?php echo e(date("Y-m-d")); ?>" autocomplete="off">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.any_notes'); ?></label>
<input type="text" class="form-control" name="notes">
</div>
</div>
<br>
<input type="submit" class="btn btn-primary" value="<?php echo app('translator')->get('app.update'); ?>">
</div>
</div>

<div class="card">
<div class="card-body">
<br><h4><?php echo app('translator')->get('app.paid_history'); ?></h4><br>
<table class="table">
<tr>
<th><?php echo app('translator')->get('app.date_added'); ?></th>
<th><?php echo app('translator')->get('app.amount'); ?></th>
<th><?php echo app('translator')->get('app.notes'); ?></th>
<th><?php echo app('translator')->get('app.Option'); ?></th>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>
<td width="25%"><?php echo e(date('d-M-Y',strtotime($row->date_added))); ?></td>
<td width="25%"><?php echo e($c.$row->amount); ?></td>
<td width="25%"><?php echo e($row->notes); ?></td>
<td width="25%"><a class="btn btn-danger" onclick="return confirm('<?php echo app('translator')->get('app.sure'); ?>')" href="<?php echo e(Asset('paidDelete?id='.$row->id)); ?>"><?php echo app('translator')->get('app.delete'); ?></a></td>
</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tr>
</table>
</div>
</div>


</form>
</section>
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
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store/paid.blade.php ENDPATH**/ ?>