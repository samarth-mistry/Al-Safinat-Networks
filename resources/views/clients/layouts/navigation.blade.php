<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="{{ url('/') }}">{{ config('app.name') }} <span>Networks</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="/" class="logo"><img src="{{ asset('dist/img/sa-flag-icon.png') }}" alt=""></a> -->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
          @if(Auth::user())
            <li>
              @if(Auth::user()->getRoles()[0] == 'superadministrator')
                <a class="nav-link scrollto {{ request()->is('admin-dashboard*') ? 'active' : '' }}" href="{{ route('admin-dashboard') }}">Dashboard</a>
              @elseif(Auth::user()->getRoles()[0] == 'client')
                <a class="nav-link scrollto {{ request()->is('client-dashboard*') ? 'active' : '' }}" href="{{ route('client-dashboard') }}">Dashboard</a>
              @endif
            </li>
            @if(Auth::user()->getRoles()[0] == 'client')
              <li><a class="nav-link scrollto {{ request()->is('client-booking*') ? 'active' : '' }}" href="{{ route('client-booking.index') }}">Book</a></li>
              <li><a class="nav-link scrollto {{ request()->is('client-tracking*') ? 'active' : '' }}" href="{{ route('client-trackings.index') }}">Track</a></li>
            @endif
          @endif
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li class="dropdown"><a href="#"><span>Guides</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Team</a></li>
                  <li><a href="#">Contact</a></li>
                  <li><a href="#">FAQs</a></li>
                  <li><a href="#">Help</a></li>
                </ul>
              </li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
              <li><a href="#contact">FAQs</a></li>
              <li><a href="#contact">Help</a></li>
            </ul>
          </li>
          @if (Route::has('login'))
            <!-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> -->
                @auth
                    <li><a href="{{ route('logout') }}" class="nav-link scrollto text-danger">Logout</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="nav-link scrollto text-success">Log in</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="nav-link scrollto text-success">Register</a></li>
                    @endif
                @endauth
            <!-- </div> -->
        @endif
        <!-- <li><a class="nav-link scrollto text-danger" href="{{ route('logout') }}">Logout</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->