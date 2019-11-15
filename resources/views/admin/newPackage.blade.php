<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Project Edit</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
    <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.adminLayouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Package</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Package</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">

            @if($errors->any())
            <div class="alert alert-danger">
            <ul> 
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
            </div>
            @endif
            
            <form method="POST" action="{{route('create_new_package')}}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">Package Name</label>
                  <input type="text" name="package_name" id="inputName" class="form-control">
                </div>
                <div class="form-group">
                  <label for="amount-per-head">Amount per head</label>
                  <input id="amount-per-head" name="amount-per-head" type="number" class="form-control">
                </div>
               
                <div class="form-group">
                  <label for="facilities">Facilities (comma separated)</label>
                  <input type="text" name="facilities" id="facilities" class="form-control">
                </div>
                <div class="form-group">
                  <label for="t-date-depart">Tentative Date Departure</label>
                  <input type="date" name="depart_date" id="t-date-depart" class="form-control">
                </div>
                <div class="form-group">
                  <label for="t-date-arrival">Tentative Date Arrival</label>
                  <input type="date" name="arrival_date" id="t-date-arrival" class="form-control">
                </div>
                <div class="form-group">
                  <input type="number" name="days"><b>Days</b> <input type="number" name="nights"><b>Nights</b>
                </div>
                <div class="form-group">
                  <input type="submit" name="create_package" class="btn btn-success" value="Add New Project">
                </div>
              </div>
            <form>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('admin.adminLayouts.adminFooter')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
