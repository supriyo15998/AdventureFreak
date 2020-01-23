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
			<img src="#">
		</div>
		<div class="row">
			<div class="col-md-6">
				<h2 style="font-family: 'Merriweather', serif; font-weight: bold; margin-top: 2%">Adventure Freak</h2>
				<p>CR Road, Kamarpara, Sodepur, Dist: 24 pgs (N), Kolkata:700113 ,W.B.</p>
				<p>Phone no: 7980328015</p>
				<p>Email: adventurefreakindia@gmail.com</p>
			</div>
		</div>
		<h2 style="text-align: center; color: red;font-family: 'Merriweather', serif; font-weight: bold;">TAX INVOICE</h2>
		<div class="row">
			<div>
				<p style="font-weight: bold;">Bill To: {{ $data->validatedData->billingName }}</p>
				<p>{{ $data->validatedData->address }}</p>
				<p>Contact No: {{ $data->validatedData->phone }}</p>
			</div>
			<div>
				<p style="font-weight: bold;">Invoice No:</p>
				<p style="font-weight: bold;">Date: {{ $data->validatedData->date }}</p>
			</div>
		</div>		
		<table>
			<thead style="background-color: red; color: white">
				<th>#</th>
				<th>Package Name</th>
				<th>Package Details</th>
				<th>Quantity</th>
				<th>Price/Unit</th>
				<th>Amount</th>
			</thead>
			<tbody>
				@foreach($data->packages as $key => $package)
					<tr>
						<td>{{ $key+1 }}</td>
						<td>{{ $package->package_name }}</td>
						<td>{{ $package->facilities }}</td>
						<td>{{ $data->validatedData->package_quantity[$key] }}</td>
						<td>₹ {{ number_format($package->amount_per_head) }}</td>
						<td>₹ {{ number_format($data->validatedData->package_quantity[$key] * $package->amount_per_head) }}</td>
					</tr>
				@endforeach
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">Sub Total :</td>
					<td></td>
					<td style="font-weight: bold;">₹ {{ number_format($data->totalAmount) }}</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">Discount @ {{ $data->validatedData->discount }}% :</td>
					<td></td>
					<td style="font-weight: bold;">₹ {{ $data->totalAmount*(($data->validatedData->discount)/100) }}</td>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">After Discount @ {{ ($data->validatedData->discount) }}% :</td>
					<td></td>
					<td style="font-weight: bold;">₹ {{ $data->totalAmount-($data->totalAmount*(($data->validatedData->discount)/100)) }}</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">SGST @ {{ ($data->validatedData->gst)/2 }}% :</td>
					<td></td>
					<td style="font-weight: bold;">₹ {{ round((($data->totalAmount-($data->totalAmount*(($data->validatedData->discount)/100)))*(($data->validatedData->gst)/2))/100,2) }}</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">CGST @ {{ ($data->validatedData->gst)/2 }}% :</td>
					<td></td>
					<td style="font-weight: bold;">₹ {{ round((($data->totalAmount-($data->totalAmount*(($data->validatedData->discount)/100)))*(($data->validatedData->gst)/2))/100,2) }}</td>
				</tr>
				<tr style="background-color: red; color: white">
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">Total Amount :</td>
					<td></td>
					<td style="font-weight: bold;">₹ {{ $data->finalAmount }}</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">Received Amount :</td>
					<td></td>
					<td style="font-weight: bold;">₹ {{ ($data->validatedData->rec_amt) }}</td>
				</tr>

				<tr style="background-color: red; color: white">
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">Balance Amount :</td>
					<td></td>
					<td style="font-weight: bold;">₹ {{ ($data->finalAmount)-($data->validatedData->rec_amt) }}</td>
				</tr>
				<tr>
					<td></td>
					<td style="font-weight: bold;">Total Amount in Words :</td>
					<td style="font-weight: bold;">{{ $data->text }} only</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<hr>
		<div style="font-weight: bold;">
			<p>For, Adventure Freak</p>
			<br /> <br />
			<p>Authorized Signatory</p>
		</div>
	</div>
</body>
</html>