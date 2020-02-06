<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $title }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  @include('admin.adminLayouts.sidebar')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Customer</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
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
            
            <form method="POST" action="{{ route('add_customer') }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <!-- <div class="form-group">
                  <label for="package_category">Package Category</label>
                  <select id="package_category" class="form-control" name="package_category">
                    <option autofocus disabled>Select Package Category</option>
                    <option value="adventurous-tour">Adventurous Tour</option>
                    <option value="trekking">Trekking</option>
                    <option value="city-tour">City Tour</option>
                  </select>
                </div> -->
                <div class="form-group">
                  <label for="inputName">Invoice Number (comma separated)</label>
                  <input type="text" name="invoice_numbers" id="inputName" class="form-control">
                </div>
                <div class="form-group">
                  <label for="amount-per-head">Customer Name</label>
                  <input id="amount-per-head" name="customer_name" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="amount-per-head">Customer Phone Number</label>
                  <input id="amount-per-head" name="phone" type="number" class="form-control">
                </div>
                <div class="form-group">
                  <label for="facilities">Package Name (comma separated)</label>
                  <input type="text" name="package_names" id="facilities" class="form-control">
                </div>
                <div class="form-group">
                  <label for="t-date-depart">Date of Birth</label>
                  <input type="date" name="dob" id="t-date-depart" class="form-control">
                </div>
                <div class="form-group">
                  <label for="t-date-arrival">Date of Anniversary</label>
                  <input type="date" name="doa" id="t-date-arrival" class="form-control">
                </div>
                <div class="form-group">
                  <label for="Sex">Sex</label>
                  <select id="sex" class="form-control" name="sex">
                    <option autofocus disabled>Select Sex (Male/Female/Others)</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Others</option>
                  </select>
                </div>
                <!-- <div class="form-group d-flex flex-column">
                  <label for="image">Upload Photo</label>
                  <input type="file" id="image" name="image">
                </div> -->
                <div class="form-group d-flex flex-column">
                  <input type="submit" name="create_package" class="btn btn-success" value="Add New Customer">
                </div>
              </div>
            <form>
        </div>
      </div>
    </section>
  </div>
  @include('admin.adminLayouts.adminFooter')
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
</body>
</html>
