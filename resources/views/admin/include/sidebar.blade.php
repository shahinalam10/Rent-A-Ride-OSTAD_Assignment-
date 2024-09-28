<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/dashboard') ? '' : 'collapsed' }}" href="{{route('admin.dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/cars*') ? '' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Managing Cars</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse {{ request()->is('admin/cars*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('admin.cars.index')}}" class="{{ request()->is('admin/cars') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>View Car List</span>
          </a>
        </li>
        <li>
          <a href="{{route('admin.cars.create')}}" class="{{ request()->is('admin/cars/create') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Add Car</span>
          </a>
        </li>
      </ul>
    </li><!-- End Components Nav -->
  
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Manage Rentals</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('admin.rentals.index')}}">
            <i class="bi bi-circle"></i><span>View Rental</span>
          </a>
        </li>
        <li>
          <a href="{{route('admin.rentals.create')}}">
            <i class="bi bi-circle"></i><span>Add Rental</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-navs" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Manage Customer</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-navs" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <!-- Customer List -->
        <li>
          <a href="{{ route('admin.customers.index') }}">
            <i class="bi bi-circle"></i><span>View Customer List</span>
          </a>
        </li>
        <!-- Add Customer -->
        <li>
          <a href="{{ route('admin.customers.create') }}">
            <i class="bi bi-circle"></i><span>Add Customer</span>
          </a>
        </li>
      </ul>
    </li>
    

  </ul>

</aside><!-- End Sidebar -->
