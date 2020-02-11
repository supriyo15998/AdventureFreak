<table>
    <thead>
    <tr>
        <th>Freakers ID</th>
        <th>Customer Name</th>
        <th>Invoice Numbers</th>
        <th>Packages Purchased</th>
        <th>Customer Phone</th>
        <th>Date of Birth</th>
        <th>Date of Anniversary</th>
        <th>Sex</th>
        <th>Created At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
            <td>F00{{ $customer->id }}</td>
            <td>{{ $customer->customer_name }}</td>
            <td>{{ $customer->invoice_numbers }}</td>
            <td>{{ $customer->package_names }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->dob }}</td>
            <td>{{ $customer->doa }}</td>
            <td>{{ ucfirst($customer->sex) }}</td>
            <td>{{ $customer->created_at->format('d/m/Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>