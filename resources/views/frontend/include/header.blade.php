
<header id="header" class="header sticky-top" style="z-index: 1030; background-color: #fff; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">

  <div class="branding d-flex align-items-center">

    <div class="container position-relative d-flex align-items-center justify-content-between">
      <a href="{{route('home')}}" class="logo d-flex align-items-center">
        <h1 class="sitename" style="font-family: 'Montserrat', sans-serif; font-size: 1.5rem; font-weight: 600; color:rgb(255, 51, 0)">
            Rent-A-Ride
        </h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul class="d-flex">
            <li><a href="{{ route('home') }}" class="active">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('rentals.index') }}">Rental</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            @if (Auth::check())
            <!-- User dropdown menu -->
            <li class="nav-item dropdown">
                <button class="btn btn-dark text-white  dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="userDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('rentals.myBookings') }}">My Booking History</a>
                    </li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
            </li>
            @else
            <li class="nav-item">
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm px-3 p-2 text-white shadow-sm">Login</a>
            </li>
            <li class="nav-item ms-2">
                <a href="{{ route('register') }}" class="btn btn-success btn-sm px-3 p-2 text-white shadow-sm">Signup</a>
            </li>
            @endif
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    </div>
  </div>
</header>
   <style>
        /* Ensure dropdown is hidden by default */
        .dropdown-menu {
            display: none !important;
             /* Hide dropdown menu */
        }
        .dropdown-menu.show {
            display: block !important;
        }
        .dropdown-menu .dropdown-item {
    padding: 0.5rem 1rem; /* Adjust as necessary */
}

.dropdown-menu .dropdown-item:hover {
    background-color: #343a40; /* Optional: Change background color on hover */
    color: white; /* Optional: Change text color on hover */
}
    </style>