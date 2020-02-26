<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Projects</title>
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
 
  @include('admin.adminLayouts.sidebar')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Show Invoices</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Show Invoices</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Invoices</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th>Invoice ID</th>
                      <th>Customer Name</th>
                      <th>Package Details</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($invoices as $invoice)
                  <tr>
                    <td>{{ 1000+$invoice->id }}</td>
                    <td>{{ $invoice->bill_to_name }}</td>
                    <td>
                      <table class="table projects">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($invoice->packages as $package)
                            <tr><td>{{ $package->package_name }}</td><td>{{ $package->pivot->quantity }}</td></tr>
                          @endforeach                        
                        </tbody>
                      </table>
                    </td>
                    <td class="project-actions text-right">      
                      <form method="POST" style="display: inline;" action="{{ route('delete_invoice', $invoice->id) }}">
                          @method('delete')
                          @csrf
                          <button type="submit" onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-danger btn-sm">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </button>
                        </form>
                    </td>
                    <td>
                      <a class="btn btn-primary btn-sm" href="{{ route('print-invoice', $invoice->id) }}">
                        <i class="fas fa-print">
                        </i>
                        Print
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
@include('admin.adminLayouts.adminFooter')
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
