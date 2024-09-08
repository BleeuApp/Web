<?php $__env->startSection('title'); ?> <?php echo e($title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo e($title); ?>


<a class="btn btn-primary" href="<?php echo e($nextLink); ?>" style="float: right;"><?php echo app('translator')->get('store.next_date'); ?></a>

<a href="<?php echo e(Asset(env('store').'/print?date='.$date)); ?>" class="btn btn-warning" style="float:right;margin-right: 20px;" target="_blank"><?php echo app('translator')->get('store.print'); ?></a>

<a href="<?php echo e(Asset(env('store').'/itemChart?date='.$date)); ?>" class="btn btn-dark" style="float:right;margin-right: 20px;" target="_blank"><?php echo app('translator')->get('store.item_chart'); ?></a>

</h1></div><br>
<div class="card">
<div class="card-body">
<ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
<li class="nav-item flex-fill" role="presentation">
<button class="nav-link w-100 active" id="breakfast-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">Breakfast (<?php echo e(count($breakfast)); ?>)</button>
</li>
<li class="nav-item flex-fill" role="presentation">
<button class="nav-link w-100" id="lunch-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Lunch (<?php echo e(count($lunch)); ?>)</button>
</li>
<li class="nav-item flex-fill" role="presentation">
<button class="nav-link w-100" id="dinner-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Dinner (<?php echo e(count($dinner)); ?>)</button>
</li>
<li class="nav-item flex-fill" role="presentation">
<button class="nav-link w-100" id="item-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-item" type="button" role="tab" aria-controls="contact" aria-selected="false">View Item Count</button>
</li>
</ul>
<div class="tab-content pt-2" id="borderedTabJustifiedContent">

<div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="breakfast-tab">
<br><?php echo $__env->make('store_login.order.delivery_detail',['data' => $breakfast], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="lunch-tab">
<br><?php echo $__env->make('store_login.order.delivery_detail',['data' => $lunch], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>

<div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="dinner-tab">
    <br><?php echo $__env->make('store_login.order.delivery_detail',['data' => $dinner], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="tab-pane fade" id="bordered-justified-item" role="tabpanel" aria-labelledby="item-tab">
    <br><?php echo $__env->make('store_login.order.item_detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

</div>

</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('store_login.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/order/today.blade.php ENDPATH**/ ?>