@php($page = Request::segment(2))

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


      <li class="nav-item">
        <a class="nav-link @if($page == 'home') active @else collapsed @endif" href="{{ Asset(env('store').'/home') }}">
          <i class="bi bi-house-door-fill"></i>
          <span>@lang('app.dash')</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if($page == 'setting') active @else collapsed @endif" href="{{ Asset(env('store').'/setting') }}">
          <i class="bi bi-gear-fill"></i>
          <span>@lang('app.account_setting')</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if($page == 'delivery') active @else collapsed @endif" href="{{ Asset(env('store').'/delivery') }}">
          <i class="bi bi-people-fill"></i>
          <span>@lang('store.d_staff')</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if($page == 'tifin') active @else collapsed @endif" href="{{ Asset(env('store').'/tifin') }}">
          <i class="bi bi-gift-fill"></i>
          <span>@lang('store.tifin')</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if($page == 'createOrder') active @else collapsed @endif" href="{{ Asset(env('store').'/createOrder') }}">
          <i class="bi bi-pencil-square"></i>
          <span>@lang('store.create_order')</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if($page == 'order') active @else collapsed @endif" href="{{ Asset(env('store').'/order') }}">
          <i class="bi bi-file-earmark-check-fill"></i>
          <span>@lang('store.sub')</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if($page == 'today') active @else collapsed @endif"" href="{{ Asset(env('store').'/today') }}">
          <i class="bi bi-calendar-check-fill"></i>
          <span>@lang('store.today')</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if($page == 'next') active @else collapsed @endif"" href="{{ Asset(env('store').'/next') }}">
          <i class="bi bi-calendar2-heart"></i>
          <span>@lang('store.up')</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if($page == 'withdraw') active @else collapsed @endif"" href="{{ Asset(env('store').'/withdraw') }}">
          <i class="bi bi-cash-coin"></i>
          <span>@lang('store.wr')</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if($page == 'user') active @else collapsed @endif"" href="{{ Asset(env('store').'/user') }}">
          <i class="bi bi-people"></i>
          <span>@lang('store.app_user')</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if($page == 'paid') active @else collapsed @endif"" href="{{ Asset(env('store').'/paid') }}">
          <i class="bi bi-cash-coin"></i>
          <span>@lang('store.payment_history')</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ Asset(env('store').'/logout') }}">
          <i class="bi bi-box-arrow-left"></i>
          <span>@lang('app.logout')</span>
        </a>
      </li>

    </ul>

  </aside>

