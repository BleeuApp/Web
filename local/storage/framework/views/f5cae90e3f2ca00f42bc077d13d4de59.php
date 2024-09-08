<div class="card">
<div class="card-body">
<br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.name'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required value="<?php echo e($data->name); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Phone'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="phone" required value="<?php echo e($data->phone); ?>">
</div>

<div class="col-lg-4">
<?php if($data->id): ?>
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Change Password')); ?></label>
<input type="password" class="form-control" id="inputNanme4" name="password">
<?php else: ?>
<label for="inputNanme4" class="form-label"><?php echo e(__('store.choose_pass')); ?> <span class="req">*</span></label>
<input type="password" class="form-control" id="inputNanme4" name="password" required>
<?php endif; ?>
</div>
</div>
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('store.d_charges_type'); ?><span class="req">*</span></label>
<select name="type" class="form-control" required onchange="getType(this.value)">
<option value="0" <?php if($data->type == 0): ?> selected <?php endif; ?>><?php echo app('translator')->get('store.fix'); ?></option>
<option value="1" <?php if($data->type == 1): ?> selected <?php endif; ?>><?php echo app('translator')->get('store.per_km'); ?></option>
</select>
</div>

<div class="col-lg-4" id="per_delivery" <?php if(!$data->type == 0): ?> style="display:none" <?php endif; ?>>
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('store.per_d_charges'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="per_delivery" value="<?php echo e($data->per_delivery); ?>">
</div>

<div class="col-lg-4" id="per_km" <?php if(!$data->type == 1): ?> style="display:none" <?php endif; ?>>
<label for="inputNanme4" class="form-label"> <?php echo app('translator')->get('store.Per KM Charges'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="per_km" value="<?php echo e($data->per_km); ?>">
</div>

</div>

<br>
<input type="submit" class="btn btn-primary" value="<?php echo app('translator')->get('app.Submit'); ?>">
</div>
</div>

<script>
function getType(val)
{
    var per_delivery = document.getElementById("per_delivery");
    var per_km       = document.getElementById("per_km");

    if(val == 0)
    {
	    per_delivery.removeAttribute("style");	

        var att 		 = document.createAttribute("style");
        att.value 		 = "display:none";
        per_km.setAttributeNode(att);	
    }
    else
    {
	    per_km.removeAttribute("style");	

        var att 		 = document.createAttribute("style");
        att.value 		 = "display:none";
        per_delivery.setAttributeNode(att);
    }
}
</script><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/delivery/form.blade.php ENDPATH**/ ?>