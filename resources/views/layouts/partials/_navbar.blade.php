<nav class="navbar navbar-expand-lg fixed-top bg-light d-flex justify-content-between">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="http://localhost:5174">
        BoolBnB
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('homepage') }}">{{ __('Home') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.apartments.index') }}">{{ __('Your Apartments') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost:5174/apartments/">{{ __('Apartments') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost:5174/ourteam/">{{ __('Our Team') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.messages.index') }}">{{ __('Messages') }}</a>
          </li>
        </ul>


        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif
          @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                @if (Auth::user()->name)
                {{ Auth::user()->name }}
                @else
                {{ Auth::user()->email }}
                @endif
              </a>

              <div class="dropdown-menu dropdown-menu-right dropdown-menu-dark">
                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>