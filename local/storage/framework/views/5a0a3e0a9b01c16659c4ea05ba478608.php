<?php ($page = Request::segment(1)); ?>

<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

  
    <li class="nav-item">
      <a class="nav-link <?php if($page == 'home'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset('home')); ?>">
        <i class="bi bi-house-door-fill"></i>
        <span><?php echo e(__('app.home')); ?></span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?php if($page == 'setting'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset('setting')); ?>">
        <i class="bi bi-gear"></i>
        <span><?php echo e(__('app.account_setting')); ?></span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?php if($page == 'plan'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset('plan')); ?>">
        <i class="bi bi-card-checklist"></i>
        <span><?php echo e(__('app.subscription_plan')); ?></span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?php if($page == 'language'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset('language')); ?>">
        <i class="bi bi-translate"></i>
        <span><?php echo e(__('app.app_language')); ?></span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?php if($page == 'slider'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset('slider')); ?>">
        <i class="bi bi-images"></i>
        <span><?php echo e(__('app.welcome_slider')); ?></span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?php if($page == 'banner'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset('banner')); ?>">
        <i class="bi bi-file-earmark-image"></i>
        <span><?php echo e(__('app.homepage_banners')); ?></span>
      </a>
    </li>

 

    <li class="nav-item">
      <a class="nav-link <?php if($page == 'category'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset('category')); ?>">
        <i class="bi bi-bookmark-plus-fill"></i>
        <span><?php echo e(__('app.manage_categories')); ?></span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?php if($page == 'store'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset('store')); ?>">
        <i class="bi bi-cart-check-fill"></i>
        <span><?php echo e(__('app.manage_vendors')); ?></span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?php if($page == 'com'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset('com')); ?>">
        <i class="bi bi-percent"></i>
        <span><?php echo e(__('app.vendor_commission')); ?></span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?php if($page == 'offer'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset('offer')); ?>">
        <i class="bi bi-percent"></i>
        <span><?php echo e(__('app.discount_offers')); ?></span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?php if($page == 'push'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset('push')); ?>">
        <i class="bi bi-bell-fill"></i>
        <span><?php echo e(__('app.push_notifications')); ?></span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?php if($page == 'appuser'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset('appuser')); ?>">
        <i class="bi bi-people-fill"></i>
        <span><?php echo e(__('app.app_users')); ?></span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?php if($page == 'page'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset('page')); ?>">
        <i class="bi bi-journal-text"></i>
        <span><?php echo e(__('app.app_pages')); ?></span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo e(Asset('logout')); ?>">
        <i class="bi bi-box-arrow-left"></i>
        <span><?php echo e(__('app.logout')); ?></span>
      </a>
    </li>

  </ul>

</aside>


<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tiffin_go/local/resources/views/layout/menu.blade.php ENDPATH**/ ?>