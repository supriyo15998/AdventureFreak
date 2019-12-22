<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Project Edit</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
</head>
<body>
	<div class="container">
		<div class="logo" style="float: right;">
			<img src="{{asset('img/core-img/logojpgfinal.jpg')}}">
		</div>
		<div class="col-md-6">
			<h2 style="font-family: 'Merriweather', serif; font-weight: bold; margin-top: 2%">Adventure Freak</h2>
			<p>CR Road, Kamarpara, Sodepur, Dist: 24 pgs (N), Kolkata:700113 ,W.B.</p>
			<p>Phone no: 7980328015</p>
			<p>Email: adventurefreakindia@gmail.com</p>
		</div>
		<h2 style="text-align: center; color: red;font-family: 'Merriweather', serif; font-weight: bold;">TAX INVOICE</h2>
		<div class="row">
			<div class="col-md-4">
				<p style="font-weight: bold;">Bill To: {{ $validatedData->billingName }}</p>
				<p>{{ $validatedData->address }}</p>
				<p>Contact No: {{ $validatedData->phone }}</p>
			</div>
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<p style="font-weight: bold;">Invoice No:</p>
				<p style="font-weight: bold;">Date: {{ $validatedData->date }}</p>
			</div>
		</div>		
		<table cellpadding="10">
			<thead style="background-color: red; color: white">
				<th>#</th>
				<th>Package Name</th>
				<th>Quantity</th>
				<th>Price/Unit</th>
				<th>Amount</th>
			</thead>
			<tbody>
				<tr style="text-align: right;">
					<td>1</td>
					<td>Manali,Delhi,Lucknow</td>
					<td>1</td>
					<td>17142</td>
					<td>17142</td>
				</tr>
			</tbody>
		</table>
		<hr>
	</div>
</body>
</html>