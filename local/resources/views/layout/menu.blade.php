@php($page = Request::segment(1))

<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

  
    <li class="nav-item">
      <a class="nav-link @if($page == 'home') active @else collapsed @endif" href="{{ Asset('home') }}">
        <i class="bi bi-house-door-fill"></i>
        <span>{{ __('app.home') }}</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link @if($page == 'setting') active @else collapsed @endif" href="{{ Asset('setting') }}">
        <i class="bi bi-gear"></i>
        <span>{{ __('app.account_setting') }}</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link @if($page == 'plan') active @else collapsed @endif" href="{{ Asset('plan') }}">
        <i class="bi bi-card-checklist"></i>
        <span>{{ __('app.subscription_plan') }}</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link @if($page == 'language') active @else collapsed @endif" href="{{ Asset('language') }}">
        <i class="bi bi-translate"></i>
        <span>{{ __('app.app_language') }}</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link @if($page == 'slider') active @else collapsed @endif" href="{{ Asset('slider') }}">
        <i class="bi bi-images"></i>
        <span>{{ __('app.welcome_slider') }}</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link @if($page == 'banner') active @else collapsed @endif" href="{{ Asset('banner') }}">
        <i class="bi bi-file-earmark-image"></i>
        <span>{{ __('app.homepage_banners') }}</span>
      </a>
    </li>

 

    <li class="nav-item">
      <a class="nav-link @if($page == 'category') active @else collapsed @endif" href="{{ Asset('category') }}">
        <i class="bi bi-bookmark-plus-fill"></i>
        <span>{{ __('app.manage_categories') }}</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link @if($page == 'store') active @else collapsed @endif" href="{{ Asset('store') }}">
        <i class="bi bi-cart-check-fill"></i>
        <span>{{ __('app.manage_vendors') }}</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link @if($page == 'com') active @else collapsed @endif" href="{{ Asset('com') }}">
        <i class="bi bi-percent"></i>
        <span>{{ __('app.vendor_commission') }}</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link @if($page == 'offer') active @else collapsed @endif" href="{{ Asset('offer') }}">
        <i class="bi bi-percent"></i>
        <span>{{ __('app.discount_offers') }}</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link @if($page == 'push') active @else collapsed @endif" href="{{ Asset('push') }}">
        <i class="bi bi-bell-fill"></i>
        <span>{{ __('app.push_notifications') }}</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link @if($page == 'appuser') active @else collapsed @endif" href="{{ Asset('appuser') }}">
        <i class="bi bi-people-fill"></i>
        <span>{{ __('app.app_users') }}</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link @if($page == 'page') active @else collapsed @endif" href="{{ Asset('page') }}">
        <i class="bi bi-journal-text"></i>
        <span>{{ __('app.app_pages') }}</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ Asset('logout') }}">
        <i class="bi bi-box-arrow-left"></i>
        <span>{{ __('app.logout') }}</span>
      </a>
    </li>

  </ul>

</aside>


