<div class="card">
<div class="card-body">
<br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.name'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required value="<?php echo e($data->name); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Email'); ?> <span class="req">*</span></label>
<input type="email" class="form-control" id="inputNanme4" name="email" required value="<?php echo e($data->email); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo app('translator')->get('app.Phone'); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="phone" required value="<?php echo e($data->phone); ?>">
</div>
</div>
<br>
<div class="row">
<div class="col-lg-4">
<?php if($data->id): ?>
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Change Password')); ?></label>
<input type="password" class="form-control" id="inputNanme4" name="password">
<?php else: ?>
<label for="inputNanme4" class="form-label"><?php echo e(__('store.choose_pass')); ?> <span class="req">*</span></label>
<input type="password" class="form-control" id="inputNanme4" name="password" required>
<?php endif; ?>
</div>
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
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label">Vehicle Type<span class="req">*</span></label>
<select name="v_type" class="form-control" required>
<option value="">Select</option>
<option value="Bike" <?php if($data->v_type == "Bike"): ?> selected <?php endif; ?>>Bike</option>
<option value="Car" <?php if($data->v_type == "Car"): ?> selected <?php endif; ?>>Car</option>
<option value="Bicycle" <?php if($data->v_type == "Bicycle"): ?> selected <?php endif; ?>>Bicycle</option>
<option value="Truck" <?php if($data->v_type == "Truck"): ?> selected <?php endif; ?>>Truck</option>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"> Upload Driver ID</label>
<input type="file" name="driver_id" class="form-control" accept="image/png, image/gif, image/jpeg">

<?php if($data->driver_id): ?>
<br>
<a href="<?php echo e(Asset('upload/delivery/'.$data->driver_id)); ?>" target="_blank"><img src="<?php echo e(Asset('upload/delivery/'.$data->driver_id)); ?>" style="height: 60px;"></a>
<?php endif; ?>

</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"> Upload Vehicle Document</label>
<input type="file" name="v_doc" class="form-control" accept="image/png, image/gif, image/jpeg">
<?php if($data->v_doc): ?>
<br>
<a href="<?php echo e(Asset('upload/delivery/'.$data->v_doc)); ?>" target="_blank"><img src="<?php echo e(Asset('upload/delivery/'.$data->v_doc)); ?>" style="height: 60px;"></a>
<?php endif; ?>
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
</script><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tiffin_go/local/resources/views/store_login/delivery/form.blade.php ENDPATH**/ ?>