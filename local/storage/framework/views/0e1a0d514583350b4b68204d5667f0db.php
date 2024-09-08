<div class="row">
<div class="col-lg-3">
<div class="card total">
<div class="card-body">
<br>
<b><i class="bi bi-person-check-fill"></i> &nbsp;<?php echo app('translator')->get('store.Total Subscriber'); ?> <span style="float: right;color:gray"><?php echo e($overview['total_sub']); ?></span></b><br><br>
<b><i class="bi bi-cash-coin"></i> &nbsp; <?php echo app('translator')->get('store.Total Earnings'); ?><span style="float: right;color:gray"><?php echo e($setting->currency.$overview['total_earning']); ?></span></b>
</div>
</div>
</div>

<div class="col-lg-3">
<div class="card current">
<div class="card-body">
<br>
<b><i class="bi bi-person-check-fill"></i> &nbsp;<?php echo app('translator')->get('store.Total Subscriber'); ?> <small style="color:gray"><?php echo app('translator')->get('store.c_month'); ?></small> <span style="float: right;color:gray"><?php echo e($overview['current_sub']); ?></span></b><br><br>
<b><i class="bi bi-cash-coin"></i> &nbsp;<?php echo app('translator')->get('store.Total Earnings'); ?>  <span style="float: right;color:gray"><?php echo e($setting->currency.$overview['current_earning']); ?></span></b>
</div>
</div>
</div>

<div class="col-lg-3">
<div class="card last">
<div class="card-body">
<br>
<b><i class="bi bi-person-check-fill"></i> &nbsp;<?php echo app('translator')->get('store.Total Subscriber'); ?> <small style="color:gray"><?php echo app('translator')->get('store.last_month'); ?></small> <span style="float: right;color:gray"><?php echo e($overview['last_sub']); ?></span></b><br><br>
<b><i class="bi bi-cash-coin"></i> &nbsp;<?php echo app('translator')->get('store.Total Earnings'); ?>  <span style="float: right;color:gray"><?php echo e($setting->currency.$overview['last_earning']); ?></span></b>
</div>
</div>
</div>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/home/overview.blade.php ENDPATH**/ ?>