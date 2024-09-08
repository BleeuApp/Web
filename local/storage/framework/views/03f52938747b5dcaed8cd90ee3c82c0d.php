<?php ($page = Request::segment(2)); ?>

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


      <li class="nav-item">
        <a class="nav-link <?php if($page == 'home'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset(env('store').'/home')); ?>">
          <i class="bi bi-house-door-fill"></i>
          <span><?php echo app('translator')->get('app.dash'); ?></span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if($page == 'delivery'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset(env('store').'/setting')); ?>">
          <i class="bi bi-gear-fill"></i>
          <span><?php echo app('translator')->get('app.account_setting'); ?></span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if($page == 'delivery'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset(env('store').'/delivery')); ?>">
          <i class="bi bi-people-fill"></i>
          <span><?php echo app('translator')->get('store.d_staff'); ?></span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if($page == 'tifin'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset(env('store').'/tifin')); ?>">
          <i class="bi bi-gift-fill"></i>
          <span><?php echo app('translator')->get('store.tifin'); ?></span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if($page == 'createOrder'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset(env('store').'/createOrder')); ?>">
          <i class="bi bi-pencil-square"></i>
          <span><?php echo app('translator')->get('store.create_order'); ?></span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if($page == 'order'): ?> active <?php else: ?> collapsed <?php endif; ?>" href="<?php echo e(Asset(env('store').'/order')); ?>">
          <i class="bi bi-file-earmark-check-fill"></i>
          <span><?php echo app('translator')->get('store.sub'); ?></span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if($page == 'today'): ?> active <?php else: ?> collapsed <?php endif; ?>"" href="<?php echo e(Asset(env('store').'/today')); ?>">
          <i class="bi bi-calendar-check-fill"></i>
          <span><?php echo app('translator')->get('store.today'); ?></span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if($page == 'next'): ?> active <?php else: ?> collapsed <?php endif; ?>"" href="<?php echo e(Asset(env('store').'/next')); ?>">
          <i class="bi bi-calendar2-heart"></i>
          <span><?php echo app('translator')->get('store.up'); ?></span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if($page == 'withdraw'): ?> active <?php else: ?> collapsed <?php endif; ?>"" href="<?php echo e(Asset(env('store').'/withdraw')); ?>">
          <i class="bi bi-cash-coin"></i>
          <span><?php echo app('translator')->get('store.wr'); ?></span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if($page == 'user'): ?> active <?php else: ?> collapsed <?php endif; ?>"" href="<?php echo e(Asset(env('store').'/user')); ?>">
          <i class="bi bi-people"></i>
          <span><?php echo app('translator')->get('store.app_user'); ?></span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if($page == 'paid'): ?> active <?php else: ?> collapsed <?php endif; ?>"" href="<?php echo e(Asset(env('store').'/paid')); ?>">
          <i class="bi bi-cash-coin"></i>
          <span><?php echo app('translator')->get('store.payment_history'); ?></span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo e(Asset(env('store').'/logout')); ?>">
          <i class="bi bi-box-arrow-left"></i>
          <span><?php echo app('translator')->get('app.logout'); ?></span>
        </a>
      </li>

    </ul>

  </aside>

<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/store_login/layout/menu.blade.php ENDPATH**/ ?>