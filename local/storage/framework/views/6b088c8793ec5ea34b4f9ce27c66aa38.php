<h4 style="font-size: 19px;color:black"><?php echo app('translator')->get('store.latest'); ?></h4>
<div class="row">
<div class="col-lg-9">
<div class="card">
<div class="card-body">
<br>
<?php echo $__env->make('store_login.order.table',['data' => $orders,'dash' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<a href="<?php echo e(Asset(env('store').'/order')); ?>" class="btn btn-primary" style="float:right;margin-right: 70px;">View All</a>
</div>
</div>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tiffin_go/local/resources/views/store_login/home/latest.blade.php ENDPATH**/ ?>