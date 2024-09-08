<div class="modal fade" id="largeModal<?php echo e($row->id); ?>" tabindex="-1">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title"><?php echo app('translator')->get('app.Assign Categories'); ?></h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<form action="<?php echo e(Asset('storeCate')); ?>" method="post">

<?php echo csrf_field(); ?>


<input type="hidden" name="id" value="<?php echo e($row->id); ?>">

<div class="row">
<?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-lg-2"><input type="checkbox" name="chk[]" value="<?php echo e($cate->id); ?>" <?php if(in_array($cate->id,$row->getCate($row->id))): ?> checked <?php endif; ?>> <?php echo e($cate->name); ?></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo app('translator')->get('app.Close'); ?></button>
<button type="submit" class="btn btn-primary"><?php echo app('translator')->get('app.Save Changes'); ?></button>
</form>
</div>
</div>
</div>
</div><!-- End Large Modal--><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store/cate.blade.php ENDPATH**/ ?>