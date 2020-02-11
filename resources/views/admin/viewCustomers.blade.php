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
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th>
                          Freakers Id
                      </th>
                      <th>
                          Customer Name
                      </th>
                      <th>
                          Invoice Numbers
                      </th>
                      <th>
                        Packages Purchased
                      </th>
                      <th>
                          Customer Phone
                      </th>
                      <th>
                          Date of Birth
                      </th>
                      <th>
                          Date of Anniversary
                      </th>
                      <th>
                          Sex
                      </th>
                      <th>
                        Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($customers as $customer)
                  <tr>
                      <td>
                          F00{{ $customer->id }}
                      </td>
                      <td>
                          {{ $customer->customer_name }}
                      </td>
                      <td>
                          <a>
                            {{ $customer->invoice_numbers }}
                          </a>
                          <br/>
                          <small>
                              Created: {{ $customer->created_at->format('d/m/Y') }}
                          </small>
                      </td>
                      <td>
                          <p>{{ $customer->package_names }}</p>
                      </td>
                      <td class="project_progress">
                          <p>{{ $customer->phone }}</p>
                      </td>
                      <td class="project-state">
                          <p>{{ $customer->dob }}</p>
                      </td>
                      <td>
                        <p>{{ $customer->doa }}</p>
                      </td>
                      <td>
                        <p>{{ ucfirst($customer->sex) }}</p>
                      </td>
                      <td>
                        <form action="{{ route('update_customer', $customer->id) }}" method="GET">
                          <input type="submit" name="submit" class="btn btn-warning" value="Update Details">
                        </form>

                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          <a href="{{ route('exportXLS') }}" class="btn btn-success">Export to Excel</a>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

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
