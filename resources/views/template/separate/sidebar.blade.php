<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ asset('film') }}" class="nav-link @if(Request::segment(1) == 'film') active @endif">
            <i class="nav-icon fas fa-film"></i>
              <p>
                Data Film
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('genre') }}" class="nav-link @if(Request::segment(1) == 'genre') active @endif">
              <i class="nav-icon fas fa-genderless"></i>
              <p>
                Data Genre
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('cast') }}" class="nav-link @if(Request::segment(1) == 'cast') active @endif">
            <i class="nav-icon fas fa-users"></i>
              <p>
                Data Cast
              </p>
            </a>
          </li>
          <li class="nav-item">
            <form action="{{ route('auth.logout') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-secondary btn-md">Log Out</button>
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
  </aside>