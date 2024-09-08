<?php echo $__env->make('language.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<br>

<div class="tab-content pt-2" id="myTabContent">
<?php $__currentLoopData = DB::table('language')->where('status',0)->orderBy('sort_no','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="tab-pane fade show" id="l<?php echo e($l->id); ?>" role="tabpanel" aria-labelledby="home-<?php echo e($l->id); ?>">
<div class="card">
<div class="card-body"><br>
<input type="hidden" name="lid[]" value="<?php echo e($l->id); ?>">
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.name')); ?> <span class="req">*</span></label>
<?php echo Form::text('l_name[]', $data->getSData($data->s_data, $l->id, 0), ['id' => 'code', 'class' => 'form-control']); ?>

</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.address')); ?> <span class="req">*</span></label>
<?php echo Form::text('l_address[]', $data->getSData($data->s_data, $l->id, 1), ['id' => 'code', 'class' => 'form-control']); ?>

</div>
</div>

</div>
</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<div class="card">
<div class="card-body">
<h5 class="card-title"><?php echo e(__('app.general_info')); ?></h5>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.name')); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="name" required value="<?php echo e($data->name); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.Phone')); ?> (it will be username)<span class="req">*</span></label>
<input type="number" class="form-control" id="inputNanme4" name="phone" required value="<?php echo e($data->phone); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.address')); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="address" required value="<?php echo e($data->address); ?>">
</div>
</div>
<br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.whatsapp_no')); ?></label>
<input type="number" class="form-control" id="inputNanme4" name="whatsapp_no" value="<?php echo e($data->whatsapp_no); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.can_msg')); ?> <span class="req">*</span></label>
<select name="can_msg" class="form-control" required>
<option value="0" <?php if($data->can_msg == 0): ?> selected <?php endif; ?>><?php echo e(__('app.yes')); ?></option>
<option value="1" <?php if($data->can_msg == 1): ?> selected <?php endif; ?>><?php echo e(__('app.no')); ?></option>
</select>
</div>

<div class="col-lg-4">
<?php if($data->id): ?>
<label for="inputNanme4" class="form-label"><?php echo e(__('app.change_password')); ?></label>
<input type="password" class="form-control" id="inputNanme4" name="password">
<?php else: ?>
<label for="inputNanme4" class="form-label"><?php echo e(__('app.password')); ?> <span class="req">*</span></label>
<input type="password" class="form-control" id="inputNanme4" name="password" required>
<?php endif; ?>
</div>
</div>
<br>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.avg_cost')); ?> <small>(e.g $10-15 Per Person)</small></label>
<input type="text" class="form-control" id="inputNanme4" name="avg_cost" required value="<?php echo e($data->avg_cost); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.max_km')); ?> <small>(Put 0 for no restriction)</small><span class="req">*</span></label>
<input type="number" class="form-control" id="inputNanme4" name="max_km" required value="<?php echo e($data->max_km); ?>">
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.img')); ?> <span class="req">*</span></label>
<input type="file" class="form-control" id="inputNanme4" name="img" <?php if(!$data->id): ?> required <?php endif; ?>>
</div>
</div>
</div>
</div>

<div class="card">
<div class="card-body">
<h5 class="card-title"><?php echo e(__('app.geo_location')); ?></h5>
<?php echo $__env->make('store.google', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
</div>

<?php if(isset($admin)): ?>
<div class="card">
<div class="card-body">
<h5 class="card-title"><?php echo e(__('app.comm_type')); ?></h5>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.comm_type')); ?> <span class="req">*</span></label>
<select name="com_type" class="form-control" required>
<option value="0" <?php if($data->com_type == 0): ?> selected <?php endif; ?>><?php echo e(__('app.fix_commission')); ?></option>
<option value="1" <?php if($data->com_type == 1): ?> selected <?php endif; ?>>% <?php echo e(__('app.from_order_value')); ?></option>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.comm_value')); ?> <span class="req">*</span></label>
<input type="text" class="form-control" id="inputNanme4" name="com_value" required value="<?php echo e($data->com_value); ?>">
</div>
</div>

</div>
</div>
<?php endif; ?>
<div class="card">
<div class="card-body">
<h5 class="card-title"><?php echo e(__('app.working_days')); ?></h5>
<?php ($array = explode(",",$data->working_day)); ?>
<div class="row">
<div class="col-lg-2"><input type="checkbox" name="working_day[]" value="Monday" <?php if(in_array("Monday",$array)): ?> checked <?php endif; ?>> <?php echo e(__('app.monday')); ?></div>
<div class="col-lg-2"><input type="checkbox" name="working_day[]" value="Tuesday" <?php if(in_array("Tuesday",$array)): ?> checked <?php endif; ?>> <?php echo e(__('app.tuesday')); ?></div>
<div class="col-lg-2"><input type="checkbox" name="working_day[]" value="Wednesday" <?php if(in_array("Wednesday",$array)): ?> checked <?php endif; ?>> <?php echo e(__('app.wednesday')); ?></div>
<div class="col-lg-2"><input type="checkbox" name="working_day[]" value="Thursday" <?php if(in_array("Thursday",$array)): ?> checked <?php endif; ?>> <?php echo e(__('app.thursday')); ?></div>
<div class="col-lg-2"><input type="checkbox" name="working_day[]" value="Friday" <?php if(in_array("Friday",$array)): ?> checked <?php endif; ?>> <?php echo e(__('app.friday')); ?></div>
<div class="col-lg-2"><input type="checkbox" name="working_day[]" value="Saturday" <?php if(in_array("Saturday",$array)): ?> checked <?php endif; ?>> <?php echo e(__('app.saturday')); ?></div>
<div class="col-lg-2"><input type="checkbox" name="working_day[]" value="Sunday" <?php if(in_array("Sunday",$array)): ?> checked <?php endif; ?>> <?php echo e(__('app.sunday')); ?></div>
</div>

</div>
</div>

<div class="card">
<div class="card-body">
<h5 class="card-title"><?php echo e(__('app.other_info')); ?></h5>

<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.provide_breakfast')); ?> <span class="req">*</span></label>
<select name="breakfast" class="form-control" required onchange="setBreakfastTime(this.value)">
<option value="0" <?php if($data->breakfast == 0): ?> selected <?php endif; ?>><?php echo e(__('app.yes')); ?></option>
<option value="1" <?php if($data->breakfast == 1): ?> selected <?php endif; ?>><?php echo e(__('app.no')); ?></option>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.breakfast_time_from')); ?> <span class="req">*</span></label>
<input type="text" name="b_time_from" class="form-control" placeholder="<?php echo e(__('app.example_time_from_b')); ?>" id="b_time_from" value="<?php echo e($data->b_time_from); ?>" <?php if($data->breakfast == 1): ?> disabled <?php endif; ?>>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.breakfast_time_to')); ?> <span class="req">*</span></label>
<input type="text" name="b_time_to" class="form-control" placeholder="<?php echo e(__('app.example_time_to_b')); ?>" id="b_time_to" value="<?php echo e($data->b_time_to); ?>" <?php if($data->breakfast == 1): ?> disabled <?php endif; ?>>
</div>
</div>
<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.provide_lunch')); ?> <span class="req">*</span></label>
<select name="lunch" class="form-control" required onchange="setLunchTime(this.value)">
<option value="0" <?php if($data->lunch == 0): ?> selected <?php endif; ?>><?php echo e(__('app.yes')); ?></option>
<option value="1" <?php if($data->lunch == 1): ?> selected <?php endif; ?>><?php echo e(__('app.no')); ?></option>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.lunch_time_from')); ?> <span class="req">*</span></label>
<input type="text" name="l_time_from" class="form-control" placeholder="<?php echo e(__('app.example_time_from_l')); ?>" id="l_time_from" value="<?php echo e($data->l_time_from); ?>" <?php if($data->lunch == 1): ?> disabled <?php endif; ?>>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.lunch_time_to')); ?> <span class="req">*</span></label>
<input type="text" name="l_time_to" class="form-control" placeholder="<?php echo e(__('app.example_time_to_l')); ?>" id="l_time_to" value="<?php echo e($data->l_time_to); ?>" <?php if($data->lunch == 1): ?> disabled <?php endif; ?>>
</div>
</div>

<br>
<div class="row">
<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.provide_dinner')); ?> <span class="req">*</span></label>
<select name="dinner" class="form-control" required onchange="setDinnerTime(this.value)">
<option value="0" <?php if($data->dinner == 0): ?> selected <?php endif; ?>><?php echo e(__('app.yes')); ?></option>
<option value="1" <?php if($data->dinner == 1): ?> selected <?php endif; ?>><?php echo e(__('app.no')); ?></option>
</select>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.dinner_time_from')); ?> <span class="req">*</span></label>
<input type="text" name="d_time_from" class="form-control" placeholder="<?php echo e(__('app.example_time_from_d')); ?>" id="d_time_from" value="<?php echo e($data->d_time_from); ?>" <?php if($data->dinner == 1): ?> disabled <?php endif; ?>>
</div>

<div class="col-lg-4">
<label for="inputNanme4" class="form-label"><?php echo e(__('app.dinner_time_to')); ?> <span class="req">*</span></label>
<input type="text" name="d_time_to" class="form-control" placeholder="<?php echo e(__('app.example_time_to_d')); ?>" id="d_time_to" value="<?php echo e($data->d_time_to); ?>" <?php if($data->dinner == 1): ?> disabled <?php endif; ?>>
</div>
</div>

</div>
</div>

</div>
</div>
<input type="submit" class="btn btn-primary" value="<?php echo e(__('app.Submit')); ?>">

<script>
function setBreakfastTime(type)
{
    var from = document.getElementById("b_time_from");
    var to   = document.getElementById("b_time_to");

    if(type == 1)
    {
        from.disabled = true;
        to.disabled   = true;
    }
    else
    {
        from.disabled = false;
        to.disabled   = false;
    }
}

function setLunchTime(type)
{
    var from = document.getElementById("l_time_from");
    var to   = document.getElementById("l_time_to");

    if(type == 1)
    {
        from.disabled = true;
        to.disabled   = true;
    }
    else
    {
        from.disabled = false;
        to.disabled   = false;
    }
}

function setDinnerTime(type)
{
    var from = document.getElementById("d_time_from");
    var to   = document.getElementById("d_time_to");

    if(type == 1)
    {
        from.disabled = true;
        to.disabled   = true;
    }
    else
    {
        from.disabled = false;
        to.disabled   = false;
    }
}
</script>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tiffin_go/local/resources/views/store/form.blade.php ENDPATH**/ ?>