<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Invoice Print</title>
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
		<div class="row" style="margin-left: 15%">
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
		<table cellpadding="10" align="center">
			<thead style="background-color: red; color: white">
				<th>#</th>
				<th>Package Name</th>
				<th>Package Details</th>
				<th>Quantity</th>
				<th>Price/Unit</th>
				<th>Amount</th>
			</thead>
			<tbody>
				@foreach($packages as $key => $package)
					<tr style="text-align: right;">
						<td>{{ $key+1 }}</td>
						<td>{{ $package->package_name }}</td>
						<td>{{ $package->facilities }}</td>
						<td>{{ $validatedData->package_quantity[$key] }}</td>
						<td>₹ {{ number_format($package->amount_per_head) }}</td>
						<td>₹ {{ number_format($validatedData->package_quantity[$key] * $package->amount_per_head) }}</td>
					</tr>
				@endforeach
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">Sub Total :</td>
					<td></td>
					<td style="text-align: right; font-weight: bold;">₹ {{ number_format($totalAmount) }}</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">Discount @ {{ $validatedData->discount }}% :</td>
					<td></td>
					<td style="text-align: right; font-weight: bold;">₹ {{ $totalAmount*(($validatedData->discount)/100) }}</td>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">After Discount @ {{ ($validatedData->discount) }}% :</td>
					<td></td>
					<td style="text-align: right; font-weight: bold;">₹ {{ $totalAmount-($totalAmount*(($validatedData->discount)/100)) }}</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">SGST @ {{ ($validatedData->gst)/2 }}% :</td>
					<td></td>
					<td style="text-align: right; font-weight: bold;">₹ {{ round((($totalAmount-($totalAmount*(($validatedData->discount)/100)))*(($validatedData->gst)/2))/100,2) }}</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">CGST @ {{ ($validatedData->gst)/2 }}% :</td>
					<td></td>
					<td style="text-align: right; font-weight: bold;">₹ {{ round((($totalAmount-($totalAmount*(($validatedData->discount)/100)))*(($validatedData->gst)/2))/100,2) }}</td>
				</tr>
				<tr style="background-color: red; color: white">
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">Total Amount :</td>
					<td></td>
					<td style="text-align: right; font-weight: bold;">₹ {{ $finalAmount }}</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">Received Amount :</td>
					<td></td>
					<td style="text-align: right; font-weight: bold;">₹ {{ ($validatedData->rec_amt) }}</td>
				</tr>

				<tr style="background-color: red; color: white">
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">Balance Amount :</td>
					<td></td>
					<td style="text-align: right; font-weight: bold;">₹ {{ ($finalAmount)-($validatedData->rec_amt) }}</td>
				</tr>
				<tr>
					<td></td>
					<td style="font-weight: bold;">Total Amount in Words :</td>
					<td style="text-align: right; font-weight: bold;">{{ $text }} only</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<hr>
		<div style="float: right; font-weight: bold;">
			<p>For, Adventure Freak</p>
			<br /> <br />
			<p>Authorized Signatory</p>
		</div>
	</div>
</body>
</html>