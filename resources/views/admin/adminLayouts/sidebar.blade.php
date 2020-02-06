<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdventureFreak|Admin</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::User()->name }}</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('home') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                More Options
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('new-package') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Package</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('view_packages') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View all Packages</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('generate-invoice') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Generate Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('view-invoice') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Invoices</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('new_testimonial') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Testimonials</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Customer Details
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('new_customer') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Existing</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('view_customer') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Customers</p>
                </a>
              </li>
            </ul>
          </li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <li class="nav-item has-treeview menu-open">
              <a class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <input type="submit" value="Logout">
              </a>
            </li>
          </form>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>