<div class="card">
<div class="card-body">
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Language Name'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required value="<?php echo e($data->name); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.image'); ?> <?php if(!$data->id): ?><span class="req">*</span><?php endif; ?></label>
<input type="file" class="form-control" <?php if(!$data->id): ?> required <?php endif; ?> name="img">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Type'); ?> <span class="req">*</span></label>
<select name="type" class="form-control">
<option value="0" <?php if($data->type == 0): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.LTR'); ?></option>
<option value="1" <?php if($data->type == 1): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.RTL'); ?></option>
</select>
</div>
</div>
<br>
<div class="row">
<div class="col-lg-2">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Sort No'); ?> <span class="req">*</span></label>
<input type="number" class="form-control" id="inputNanme4" name="sort_no" required value="<?php echo e($data->sort_no); ?>">
</div>

<div class="col-lg-10">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Translation File Name'); ?> <small style="margin-left: 30px;"><?php echo app('translator')->get('app.file_desc'); ?></small></label>
<input type="text" class="form-control" id="inputNanme4" name="file_name" required value="<?php echo e($data->file_name); ?>">
</div>
</div>


<br>
<input type="submit" class="btn btn-primary" value="<?php echo app('translator')->get('app.Submit'); ?>">
</div>
</div>

<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/language/form.blade.php ENDPATH**/ ?>