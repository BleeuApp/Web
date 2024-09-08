<div class="card">
<div class="card-body">
<br>
<div class="row">
<div class="col-lg-6">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.image'); ?> <?php if(!$data->id): ?><span class="req">*</span><?php endif; ?></label>
<input type="file" class="form-control" <?php if(!$data->id): ?> required <?php endif; ?> name="img">
</div>

<div class="col-lg-3">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.link_to'); ?></label>
<select name="link_to" class="form-control">
<option value="0" <?php if($data->link_to == 0): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.none'); ?></option>
<option value="1" <?php if($data->link_to == 1): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.store'); ?></option>
<option value="2" <?php if($data->link_to == 2): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.custom_link'); ?></option>
</select>
</div>

<div class="col-lg-3">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.link'); ?></label>
<input type="text" class="form-control" id="inputNanme4" name="link" value="<?php echo e($data->link); ?>" placeholder="<?php echo app('translator')->get('app.store_link'); ?>">
</div>
</div>
<br>
<div class="row">
<div class="col-lg-6">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Sort No'); ?></label>
<input type="number" class="form-control" id="inputNanme4" name="sort_no" required value="<?php echo e($data->sort_no); ?>">
</div>
</div>


<br>
<input type="submit" class="btn btn-primary" value="<?php echo app('translator')->get('app.Submit'); ?>">
</div>
</div>

<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/banner/form.blade.php ENDPATH**/ ?>