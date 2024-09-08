<div class="card">
<div class="card-body">
<br>
<div class="row">
<div class="col-lg-6">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.image'); ?> <?php if(!$data->id): ?><span class="req">*</span><?php endif; ?></label>
<input type="file" class="form-control" <?php if(!$data->id): ?> required <?php endif; ?> name="img">
</div>

<div class="col-lg-6">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Sort No'); ?></label>
<input type="number" class="form-control" id="inputNanme4" name="sort_no" required value="<?php echo e($data->sort_no); ?>">
</div>
</div>


<br>
<input type="submit" class="btn btn-primary" value="<?php echo app('translator')->get('app.Submit'); ?>">
</div>
</div>

<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/slider/form.blade.php ENDPATH**/ ?>