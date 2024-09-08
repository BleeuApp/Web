<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('app.vc'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('app.vc'); ?> </h1></div><br>

<section class="section">
<div class="card">
<div class="card-body">
<br>
<table class="table">
<tr>
<th><?php echo app('translator')->get('app.store'); ?></th>
<th><?php echo app('translator')->get('app.Total Earning'); ?></th>
<th><?php echo app('translator')->get('app.Total Commission'); ?></th>
<th><?php echo app('translator')->get('app.Payable Balance'); ?></th>
<th><?php echo app('translator')->get('app.Last Paid'); ?></th>
<th><?php echo app('translator')->get('app.option'); ?></th>
</tr>
<?php ($i = 0); ?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php ($balance = $row->balance($row->id)); ?>
<?php ($last = $row->lastPaid($row->id)); ?>
<?php ($i++); ?>
<tr>
<td width="18%"><?php echo e($row->name); ?></td>
<td width="18%"><?php echo e($currency.$row->totalEarning($row->id)); ?></td>
<td width="18%"><?php echo e($currency.$row->getCom($row->id)); ?></td>
<td width="18%"><?php echo e($currency.$balance); ?></td>
<td width="18%"><?php if($last): ?> <?php echo e($currency.$last); ?> <?php endif; ?></td>
<td width="10%"><?php if($balance > 0): ?> <a class="btn btn-success" href="<?php echo e(Asset('paid?id='.$row->id)); ?>"><?php echo app('translator')->get('app.update'); ?></a> <?php endif; ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

</div>
</div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store/com.blade.php ENDPATH**/ ?>