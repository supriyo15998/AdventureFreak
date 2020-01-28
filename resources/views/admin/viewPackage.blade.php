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
                          ID
                      </th>
                      <th>
                          Package Category
                      </th>
                      <th>
                          Package Name
                      </th>
                      <th>
                          Amount per head
                      </th>
                      <th>
                          Facilites
                      </th>
                      <th>
                          Departure
                      </th>
                      <th>
                          Arrival
                      </th>
                  </tr>
              </thead>
              <tbody>

                @foreach($packages as $package)
                  <tr>
                      <td>
                          {{ $package->id }}
                      </td>
                      <td>
                          {{ $package->package_category }}
                      </td>
                      <td>
                          <a>
                              {{ $package->package_name }}
                          </a>
                          <br/>
                          <small>
                              Created:{{ $package->created_at }}
                          </small>
                      </td>
                      <td>
                          <p>{{ $package->amount_per_head }}</p>
                      </td>
                      <td class="project_progress">
                          <p>{{ $package->facilities }}</p>
                      </td>
                      <td class="project-state">
                          <p>{{ $package->depart_date }}</p>
                      </td>
                      <td>
                        <p>{{ $package->arrival_date }}</p>
                      </td>
                      <td class="project-actions text-right">
                          
                        <a class="btn btn-info btn-sm" href="{{ route('edit_package', $package->id) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <form method="POST" style="display: inline;" action="{{ route('delete_package', $package->id) }}">
                          @method('delete')
                          @csrf
                          <button type="submit" onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-danger btn-sm">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </button>
                        </form>
                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
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
