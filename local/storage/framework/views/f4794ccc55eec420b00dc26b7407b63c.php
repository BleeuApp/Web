<ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
<li class="nav-item" role="presentation">
<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><img src="<?php echo e(Asset('upload/language/en.png')); ?>" style="width: 25px"> <?php echo app('translator')->get('app.english'); ?></button>
</li>

<?php $__currentLoopData = DB::table('language')->where('status',0)->orderBy('sort_no','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<li class="nav-item" role="presentation">
<button class="nav-link" id="home-<?php echo e($l->id); ?>" data-bs-toggle="tab" data-bs-target="#l<?php echo e($l->id); ?>" type="button" role="tab" aria-controls="home" aria-selected="true"><img src="<?php echo e(Asset('upload/language/'.$l->img)); ?>" style="width: 25px"> <?php echo e($l->name); ?></button>
</li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</ul><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tiffin_go/local/resources/views/language/header.blade.php ENDPATH**/ ?>