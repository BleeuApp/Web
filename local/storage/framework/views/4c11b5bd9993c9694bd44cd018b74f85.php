<?php $__env->startSection('title'); ?> <?php echo e(__('app.App Pages Content')); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo e(__('app.App Pages Content')); ?></h1></div>

<section class="section">

<?php echo Form::open(['url' => [Asset('page')],'files' => true]); ?>



<div class="card">
<div class="card-body">
<?php echo $__env->make('language.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<br>
    
    <div class="tab-content pt-2" id="myTabContent">
    <?php $__currentLoopData = DB::table('language')->where('status',0)->orderBy('sort_no','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="tab-pane fade show" id="l<?php echo e($l->id); ?>" role="tabpanel" aria-labelledby="home-<?php echo e($l->id); ?>">
    
    <input type="hidden" name="lid[]" value="<?php echo e($l->id); ?>">
    <div class="row">
    <div class="col-lg-12">
    <label for="inputNanme4" class="form-label"><?php echo e(__('app.About Us')); ?></label>
    <?php echo Form::textarea('l_about_us[]',$data->getSData($data->s_data,$l->id,0),['id' => 'code','class' => 'form-control']); ?>

    </div>
    </div>
    <br>
    <div class="row">
    <div class="col-lg-12">
    <label for="inputNanme4" class="form-label"><?php echo e(__("FAQ's")); ?></label>
    <?php echo Form::textarea('l_faq[]',$data->getSData($data->s_data,$l->id,1),['id' => 'code','class' => 'form-control']); ?>

    </div>
    </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    
    <div class="row">
    <div class="col-lg-6">
    <label for="inputNanme4" class="form-label"><?php echo e(__('app.About Us Image')); ?></label>
    <input type="file" class="form-control" name="about_img">

    <?php if($data->about_img): ?><br><img src="<?php echo e(Asset('upload/page/'.$data->about_img)); ?>" height="100"> <?php endif; ?>

    </div>

    <div class="col-lg-6">
    <label for="inputNanme4" class="form-label"><?php echo e(__("FAQ's Image")); ?></label>
    <input type="file" class="form-control" name="faq_img">
    <?php if($data->faq_img): ?><br><img src="<?php echo e(Asset('upload/page/'.$data->faq_img)); ?>" height="100"> <?php endif; ?>
    </div>
    </div>
    <br><br>
    <div class="row">
    <div class="col-lg-12">
    <label for="inputNanme4" class="form-label"><?php echo e(__('app.About Us Text')); ?></label>
    <textarea name="about_us" class="form-control" rows="8"><?php echo e($data->about_us); ?></textarea>
    </div>
    </div>

    <br><br>
    <div class="row">
    <div class="col-lg-12">
    <label for="inputNanme4" class="form-label"><?php echo e(__("FAQ's Text")); ?></label>
    <textarea name="faq" class="form-control" rows="8"><?php echo e($data->faq); ?></textarea>
    </div>
    </div>

    </div>
    </div>
    
    <br>
    <input type="submit" class="btn btn-primary" value="<?php echo e(__('app.Submit')); ?>">
    </div>
    </div>    

</form>

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/home/page.blade.php ENDPATH**/ ?>