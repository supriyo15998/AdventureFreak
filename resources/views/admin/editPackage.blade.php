<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $title }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
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
            <h1>Edit Existing Package</h1>
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
            
            <form method="POST" action="{{ route('edit_final', $package->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">

                <input type="hidden" value="{{ $package->id }}" name="package_id"/>
                    <div class="form-group">
                      <label for="package_category">Package Category</label>
                      <select id="package_category" class="form-control" name="package_category">
                        <option disabled>Select Package Category</option>
                        <option value="adventurous-tour" {{ $package->package_category == 'adventurous-tour' ? "selected" : "" }}>Adventurous Tour</option>
                        <option value="trekking" {{ $package->package_category == 'trekking' ? "selected" : "" }}>Trekking</option>
                        <option value="city-tour" {{ $package->package_category == 'city-tour' ? "selected" : "" }}>City Tour</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Package Name</label>
                        <input type="text" name="package_name" value="{{ $package->package_name }}" id="inputName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="amount-per-head">Amount per head</label>
                        <input id="amount-per-head" name="amount_per_head" value="{{ $package->amount_per_head }}" type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="facilities">Facilities (comma separated)</label>
                        <input type="text" name="facilities" value="{{ $package->facilities }}" id="facilities" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="t-date-depart">Tentative Date Departure</label>
                        <input type="date" name="depart_date" value="{{ $package->depart_date }}" id="t-date-depart" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="t-date-arrival">Tentative Date Arrival</label>
                        <input type="date" name="arrival_date" value="{{ $package->arrival_date }}" id="t-date-arrival" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="number" name="days" value="{{ $package->days }}"><b>Days</b> <input type="number" name="nights" value="{{ $package->nights }}"><b>Nights</b>
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="image">Upload Photo</label>
                        <input type="file" id="image" name="image">
                    </div>
                    <div class="form-group d-flex flex-column">
                        <input type="submit" name="create_package" class="btn btn-success" value="Update Package">
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
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
</body>
</html>
