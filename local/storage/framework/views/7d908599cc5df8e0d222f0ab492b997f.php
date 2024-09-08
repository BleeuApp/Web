<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
<a href="<?php echo e(Asset(env('store').'/home')); ?>" class="logo d-flex align-items-center">
<img src="<?php echo e(Asset('assets/img/logo.png')); ?>" alt="">
<span class="d-none d-lg-block">&nbsp; &nbsp;<?php echo app('translator')->get('app.admin'); ?></span>
</a>
<i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<div class="search-bar">

</div><!-- End Search Bar -->

<nav class="header-nav ms-auto">
<ul class="d-flex align-items-center">





<li class="nav-item dropdown">

<a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
  <i class="bi bi-translate"></i> 
  
  <?php if(Session::has('locale')): ?>

  <?php if(Session::get('locale') == 'en'): ?>

  <?php echo e(__('app.english')); ?> 

  <?php elseif(Session::get('locale') == 'ar'): ?>

  <?php echo e(__('app.arabic')); ?> 

  <?php elseif(Session::get('locale') == 'sp'): ?>

  <?php echo e(__('app.spanish')); ?> 

  <?php elseif(Session::get('locale') == 'fr'): ?>

  <?php echo e(__('app.french')); ?> 

  <?php elseif(Session::get('locale') == 'por'): ?>

  <?php echo e(__('app.por')); ?> 
  <?php endif; ?>
  <?php else: ?>
  <?php echo e(__('app.english')); ?> 
  <?php endif; ?>

</a><!-- End Messages Icon -->

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">

  <li>
    <a class="dropdown-item d-flex align-items-center" href="<?php echo e(Asset(env('store').'/setLang?lang=en')); ?>">
    <i class="bi bi-check-circle"></i>
    <span><?php echo e(__('app.english')); ?></span>
    </a>
    </li>
    <li>
    <hr class="dropdown-divider">
    </li>
    
    <li>
    <a class="dropdown-item d-flex align-items-center" href="<?php echo e(Asset(env('store').'/setLang?lang=ar')); ?>">
      <i class="bi bi-check-circle"></i>
    <span><?php echo e(__('app.arabic')); ?></span>
    </a>
    </li>
    <li>
    <hr class="dropdown-divider">
    </li>
    
    <li>
    <a class="dropdown-item d-flex align-items-center" href="<?php echo e(Asset(env('store').'/setLang?lang=sp')); ?>">
      <i class="bi bi-check-circle"></i>
    <span><?php echo e(__('app.spanish')); ?></span>
    </a>
    </li>
    <li>
    <hr class="dropdown-divider">
    </li>
    
    <li>
      <a class="dropdown-item d-flex align-items-center" href="<?php echo e(Asset(env('store').'/setLang?lang=fr')); ?>">
        <i class="bi bi-check-circle"></i>
      <span><?php echo e(__('app.french')); ?></span>
      </a>
      </li>
      <li>
      <hr class="dropdown-divider">
      </li>
    
    <li>
    <a class="dropdown-item d-flex align-items-center" href="<?php echo e(Asset(env('store').'/setLang?lang=por')); ?>">
      <i class="bi bi-check-circle"></i>
    <span><?php echo e(__('app.por')); ?></span>
    </a>
    </li>
    <li>
    <hr class="dropdown-divider">
    </li>

</ul><!-- End Messages Dropdown Items -->

</li><!-- End Messages Nav -->

<li class="nav-item dropdown pe-3">

<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
<img src="<?php echo e(Asset('assets/admin.png')); ?>" alt="Profile" class="rounded-circle">
<span class="d-none d-md-block dropdown-toggle ps-2"><?php echo e(Auth::guard('store')->user()->name); ?></span>
</a><!-- End Profile Iamge Icon -->

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">


<li>
<a class="dropdown-item d-flex align-items-center" href="<?php echo e(Asset(env('store').'/setting')); ?>">
<i class="bi bi-gear"></i>
<span><?php echo app('translator')->get('app.account_setting'); ?></span>
</a>
</li>
<li>
<hr class="dropdown-divider">
</li>



<li>
<a class="dropdown-item d-flex align-items-center" href="<?php echo e(Asset(env('store').'/logout')); ?>">
<i class="bi bi-box-arrow-right"></i>
<span><?php echo app('translator')->get('app.logout'); ?></span>
</a>
</li>

</ul><!-- End Profile Dropdown Items -->
</li><!-- End Profile Nav -->

</ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header --><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tiffin_go/local/resources/views/store_login/layout/header.blade.php ENDPATH**/ ?>