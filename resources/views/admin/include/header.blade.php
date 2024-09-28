  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{route('admin.dashboard')}}" class="logo d-flex align-items-center">
            <h1 class="sitename" style="font-family: 'Montserrat', sans-serif; font-size: 1.5rem; font-weight: 600; color:rgb(255, 51, 0)">
                Rent-A-Ride
            </h1>
          </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
  
          <!-- Search Icon (Visible on smaller screens) -->
          <li class="nav-item d-block d-lg-none">
              <a class="nav-link nav-icon search-bar-toggle" href="#">
                  <i class="bi bi-search"></i>
              </a>
          </li>
  
          <!-- Profile Dropdown -->
          <li class="nav-item dropdown pe-3">
              <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                  <img src="{{ asset('Admin/assets/img/profile-img.jpg') }}" alt="Profile Image" class="rounded-circle">
                  <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
              </a>
  
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                  <!-- User Info -->
                  <li><hr class="dropdown-divider"></li>
  
                  <!-- Profile Link -->
                  <li>
                      <a class="dropdown-item d-flex align-items-center" href="#">
                          <i class="bi bi-person"></i>
                          <span>My Profile</span>
                      </a>
                  </li>
  
                  <li><hr class="dropdown-divider"></li>
  
                  <!-- Logout Form -->
                  <li>
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <button type="submit" class="dropdown-item d-flex align-items-center">
                              <i class="bi bi-box-arrow-right"></i>
                              <span>Log Out</span>
                          </button>
                      </form>
                  </li>
              </ul>
          </li>
      </ul>
  </nav>
  

  </header><!-- End Header -->