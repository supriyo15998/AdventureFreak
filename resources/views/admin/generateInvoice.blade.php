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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Generate New Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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

            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="package">Package Name</label>
                  <select id="packageid" class="form-control">
                    <option selected="">Select package</option>
                    @foreach($packages as $package)
                      <option value="{{ $package->id }}" price="{{ $package->amount_per_head }}" >{{ $package->package_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="number" id="packagequantity" class="form-control">
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" id="packageprice" readonly="readonly" class="form-control">
                </div>
                <div class="form-group">
                  <a href="#" class="btn btn-success add-package">Add Package</a>
                </div>
              </div>
            </form>

            <!-- Form To Post -->

            <form method="POST" action="{{route('create-invoice')}}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="date">Date</label>
                  <input type="date" name="date" id="date" class="form-control">
                </div>
                <div class="form-group">
                  <label for="billingName">Bill To: Name</label>
                  <input type="text" name="billingName" id="billingName" class="form-control">
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input id="address" name="address" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="text" name="phone" id="phone" class="form-control">
                </div>
                <div class="form-group">
                  <label>Selected Packages:</label>
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Package ID</th>
                        <th>Package Name</th>
                        <th>Package Quantity</th>
                        <th>Package Price</th>
                      </tr>
                    </thead>
                    <tbody id="packages-table">
                    </tbody>
                  </table>
                  <a href="#" class="btn btn-danger delete-selected">Delete Selected</a>
                </div>
                <div class="form-group">
                  <label for="discount">Discount (in %)</label>
                  <input type="number" step="0.01" name="discount" id="discount" class="form-control">
                </div>
                <div class="form-group">
                  <label for="gst">GST (in %)</label>
                  <input type="number" step="0.01" name="gst" id="gst" class="form-control">
                </div>
                <div class="form-group">
                  <label for="rec_amt">Received Amount</label>
                  <input type="number" name="rec_amt" id="rec_amt" class="form-control">
                </div>

                <div class="form-group">
                  <input type="submit" name="generate_invoice" class="btn btn-success" value="Generate Invoice">
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

<script>

  $(document).ready(function() {

    $(".add-package").click(function() {
      var packageId = $("#packageid").val();
      var packageName = $("#packageid :selected").text();
      var packageQuantity = $("#packagequantity").val();
      var packagePrice = $("#packageprice").val();

      var markup = "<tr><td><input type='checkbox' name='record'></td><td><input type='hidden' value='" + packageId + "' name='package_id[]'>" + packageId + "</input></td> <td>" + packageName + "</td> <td><input type='hidden' value='" + packageQuantity + "' name='package_quantity[]'>" + packageQuantity + "</input></td> <td>" + packagePrice + "</td>";

      $("#packages-table").append(markup);
    });

    $(".delete-selected").click(function() {
      $("#packages-table").find('input[name="record"]').each(function() {
        if($(this).is(":checked")) {
          $(this).parents("tr").remove();
        }
      });
    });

    $("#packageid").on("change", function() {
      $("#packageprice").val($(this).find("option:selected").attr("price"));
    });

  });

</script>

</body>
</html>
