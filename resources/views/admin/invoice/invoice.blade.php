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
			<img src="img/core-img/invoice_logo.jpg">
		</div>
		<div class="row">
			<div class="col-md-6">
				<img src="img/core-img/sup1copy.jpg">
				<!-- <h2 style="font-family: 'Merriweather', serif; font-weight: bold; margin-top: 2%">Adventure Freak</h2> -->
				<p>CR Road, Kamarpara, Sodepur<br>Dist: 24 pgs (N), Kolkata:700113 ,W.B.<br>
				Phone no: 7980328015<br>
				Email: adventurefreakindia@gmail.com</p>
			</div>
		</div>
		<h2 style="text-align: center; color: red;font-family: 'Merriweather', serif; font-weight: bold;">TAX INVOICE</h2>
		<div class="row">
			<div style="float: right;">
				<p style="font-weight: bold;">Invoice No: {{ 1000+$data->invoice->id }}</p>
				<p style="font-weight: bold;">Date: {{ $data->invoice->date }}</p>
			</div>
			<div>
				<p style="font-weight: bold;">Bill To: {{ $data->invoice->bill_to_name }}</p>
				<p>{{ $data->invoice->address }}</p>
				<p>Contact No: {{ $data->invoice->phone }}</p>
			</div>
			
		</div>		
		<table style="width: 100%">
			<thead style="background-color: red; color: white">
				<tr>
					<th>#</th>
					<th>Package Name</th>
					<th>Package Details</th>
					<th>Quantity</th>
					<th>Price/Unit</th>
					<th>Amount</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data->invoice->packages as $key => $package)
					<tr>
						<td>{{ $key+1 }}</td>
						<td>{{ $package->package_name }}</td>
						<td>{{ $package->facilities }}</td>
						<td>{{ $package->pivot->quantity }}</td>
						<td>Rs. {{ number_format($package->amount_per_head) }}</td>
						<td>Rs. {{ number_format($package->pivot->quantity * $package->amount_per_head) }}</td>
					</tr>
				@endforeach
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">Sub Total :</td>
					<td></td>
					<td style="font-weight: bold;">Rs. {{ number_format($data->totalAmount) }}</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">Discount @ {{ $data->invoice->discount }}%</td>
					<td></td>
					<td style="font-weight: bold;">- Rs. {{ $data->totalAmount*(($data->invoice->discount)/100) }}</td>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">After Discount @ {{ ($data->invoice->discount) }}% :</td>
					<td></td>
					<td style="font-weight: bold;">Rs. {{ $data->totalAmount-($data->totalAmount*(($data->invoice->discount)/100)) }}</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">SGST @ {{ ($data->invoice->gst)/2 }}% :</td>
					<td></td>
					<td style="font-weight: bold;">Rs. {{ round((($data->totalAmount-($data->totalAmount*(($data->invoice->discount)/100)))*(($data->invoice->gst)/2))/100,2) }}</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">CGST @ {{ ($data->invoice->gst)/2 }}% :</td>
					<td></td>
					<td style="font-weight: bold;">Rs. {{ round((($data->totalAmount-($data->totalAmount*(($data->invoice->discount)/100)))*(($data->invoice->gst)/2))/100,2) }}</td>
				</tr>
				<tr style="background-color: red; color: white">
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">Total Amount :</td>
					<td></td>
					<td style="font-weight: bold;">Rs. {{ $data->finalAmount }}</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">Received Amount</td>
					<td></td>
					<td style="font-weight: bold;">Rs. {{ ($data->invoice->received_amt) }}</td>
				</tr>

				<tr style="background-color: red; color: white">
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">Balance Amount</td>
					<td></td>
					<td style="font-weight: bold;">Rs. {{ ($data->finalAmount)-($data->invoice->received_amt) }}</td>
				</tr>
				<tr>
					<td style="font-weight: bold;" colspan="6">Total Amount in Words : {{ ucwords($data->text) }} only</td>
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