<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Testimonial;
use App\Invoice;
use App\Customer;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use App\Exports\CustomersExport;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = "Admin | Home";
        $pcount = Package::count();
        $tcount = Testimonial::count();
        $icount = Invoice::count();
        $ccount = Customer::count();
        return view('admin.home')->withPcount($pcount)->withTcount($tcount)->withTitle($title)->withIcount($icount)->withCcount($ccount);
    }
    public function new_package()
    {
        $title = "Admin | New Package";
        return view('admin.newPackage')->withTitle($title);
    }
    public function view_packages()
    {
        $title = "Admin | View Packages";
        $packages = Package::all();
        return view('admin.viewPackage')->withPackages($packages)->withTitle($title);
    }
    public function create_new_package(Request $request)
    {
        $validatedData = $request->validate([
            'package_category' => 'required',
            'package_name' => 'required',
            'amount_per_head' => 'required',
            'facilities' => 'required',
            'depart_date' => 'required',
            'arrival_date' => 'required',
            'days' => 'required',
            'nights' => 'required',
            'image' => 'sometimes|file|image'
        ]);

        $image= $request->file('image');
        $randomNum = bin2hex(random_bytes(8));
        $fileName = time() . '_' . $randomNum . '.png';
        $location = public_path('img/packages/' . $fileName);
        Image::make($image)->resize(500,361)->save($location);

        $package = Package::create($validatedData);
        //$this->storeImage($package); 
        $package->update(['image' => $fileName]);
        return redirect('/admin/home')->with('message', 'Package Added Successfully');
    }
    public function edit_package($id)
    {
        $title = "Admin | Edit Package";
        $package = Package::findOrFail($id);
        return view('admin.editPackage')->withPackage($package)->withTitle($title);
    }
    public function edit_final(Request $request)
    {
        $validatedData = $request->validate([
            'package_category' => 'required',
            'package_name' => 'required',
            'amount_per_head' => 'required',
            'facilities' => 'required',
            'depart_date' => 'required',
            'arrival_date' => 'required',
            'days' => 'required',
            'nights' => 'required'
        ]);
        $package = Package::findOrFail($request->package_id);
        if ($request->hasFile('image')) {
            
            $image= $request->file('image');
            $randomNum = bin2hex(random_bytes(8));
            $fileName = time() . '_' . $randomNum . '.png';
            $location = public_path('img/packages/' . $fileName);
            Image::make($image)->resize(500,361)->save($location);
            $package->update(['image' => $fileName]);
        }
        $package->update($validatedData);

        //$this->storeImage($package);

        return redirect('/admin/home')->with('message', 'Package Updated Successfully');
    }
    public function destroy($id)
    {
        Package::findOrFail($id)->delete();
        return redirect('/admin/home')->with('message', 'Package Deleted Successfully');
    }
    public function generateInvoice()
    {
        $title = "Admin | Generate Invoice";
        $packages = Package::all();   
        return view('admin.generateInvoice')->withPackages($packages)->withTitle($title);
    }
    public function viewInvoice()
    {
        // dd(Invoice::all());
        return view('admin.showInvoice')->withInvoices(Invoice::all());
    }
    public function printInvoice($invoiceId) { 
        $invoice = Invoice::findOrFail($invoiceId);
        $totalAmount = 0;
        foreach ($invoice->packages as $key => $package) {
            $totalAmount += $package->amount_per_head * $package->pivot->quantity;
        }
        $validatedData = (object) [
            'date' => $invoice->date,
            'billingName' => $invoice->bill_to_name,
            'address' => $invoice->address,
            'phone' => $invoice->phone,
            // 'package_id' => ,
            // 'package_quantity' => , ye rahega na?
            'discount' => $invoice->discount,
            'gst' => $invoice->gst,
            'rec_amt' => $invoice->received_amt
        ];

        $finalAmount = ($totalAmount-($totalAmount*(($validatedData->discount)/100)))+(2*(round((($totalAmount-($totalAmount*(($validatedData->discount)/100)))*(($validatedData->gst)/2))/100,2)));
        $finalAmount = round($finalAmount);
        $formattedText = new \NumberFormatter("en", \NumberFormatter::SPELLOUT);
        $text = $formattedText->format($finalAmount);
        // After all calculations and creating that data object
        $data = (object) [
            'invoice' => $invoice,
            'totalAmount' => $totalAmount,
            'finalAmount' => $finalAmount,
            'text' => $text
        ];

        $pdf = \PDF::loadView('admin.invoice.invoice', array('data' => $data));
        return $pdf->stream('invoice.pdf');
    }
    public function createInvoice(Request $request)
    {
        $validatedData = (object) $request->validate([
            'date' => 'required|date',
            'billingName' => 'required',
            'address' => 'required',
            'phone' => 'required|max:10|min:10',
            'package_id' => 'required',
            'package_quantity' => 'required|min:1',
            //'price' => 'required',
            'discount' => 'required',
            'gst' => 'required',
            'rec_amt' => 'required'
        ]);

        $invoice = Invoice::create([
            'date' => $validatedData->date,
            'bill_to_name' => $validatedData->billingName,
            'address' => $validatedData->address,
            'phone' => $validatedData->phone,
            'discount' => $validatedData->discount,
            'gst' => $validatedData->gst,
            'received_amt' => $validatedData->rec_amt,
        ]);

        foreach ($request->package_id as $key => $package) {
            $attach = $invoice->packages()->attach($package, ['quantity' => $request->package_quantity[$key]]);
        }

        $totalAmount = 0;
        foreach ($invoice->packages as $key => $package) {
            $totalAmount += $package->amount_per_head * $package->pivot->quantity;
        }        //dd($validatedData);
        //dd($package);
        $finalAmount = ($totalAmount-($totalAmount*(($validatedData->discount)/100)))+(2*(round((($totalAmount-($totalAmount*(($validatedData->discount)/100)))*(($validatedData->gst)/2))/100,2)));
        $finalAmount = round($finalAmount);
        $formattedText = new \NumberFormatter("en", \NumberFormatter::SPELLOUT);
        $text = $formattedText->format($finalAmount);

        $data = (object) [
            'invoice' => $invoice,
            'totalAmount' => $totalAmount,
            'finalAmount' => $finalAmount,
            'text' => $text
        ];
        //dd($data);


        $pdf = \PDF::loadView('admin.invoice.invoice', array('data' => $data));
        return $pdf->stream('invoice.pdf');
        //return view('admin.invoice.invoice')->withData($data);
    }
    public function new_testimonial()
    {
        $title = "AdventureFreak | Add Testimonal";
        return view('admin.newTestimonial')->withTitle($title);
    }
    public function create_testimonial(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required',
            'description' => 'required',
            'image' => 'sometimes|file|image',
            'star' => 'required'
        ]);
        $image= $request->file('image');
        $randomNum = bin2hex(random_bytes(8));
        $fileName = time() . '_' . $randomNum . '.png';
        $location = public_path('img/testimonials/' . $fileName);
        Image::make($image)->resize(500,361)->save($location);

        $testimonial = Testimonial::create($validatedData);
        $testimonial->update(['image' => $fileName]);
        return redirect('/admin/home')->with('message', 'Testimonial Added Successfully');
    }
    public function new_customer()
    {
        $title = "AdventureFreak | Add Customer";
        return view('admin.addCustomer')->withTitle($title);
    }
    public function add_customer(Request $request)
    {
        $validatedData = $request->validate([
            'invoice_numbers' => 'required',
            'customer_name' => 'required',
            'phone' => 'required|max:10|min:10',
            'package_names' => 'required',
            'dob' => 'required',
            'doa' => 'required',
            'sex' => 'required'
        ]);
        Customer::create($validatedData);
        return redirect('/admin/home')->with('message', 'Customer Added Successfully');
    }
    public function view_customer()
    {
        $customers = Customer::all();
        $title = "AdventureFreak | View Customers";
        //dd($customers);
        return view('admin.viewCustomers')->withTitle($title)->withCustomers($customers);
    }
    public function update_customer($id)
    {
        $customer = Customer::findOrFail($id);
        $title = "AdventureFreak | Update Customer";
        return view('admin.updateCustomer')->withCustomer($customer)->withTitle($title);
    }
    public function update_customer_final(Request $request, $id)
    {
        $validatedData = $request->validate([
            'invoice_numbers' => 'required',
            'customer_name' => 'required',
            'phone' => 'required|max:10|min:10',
            'package_names' => 'required',
            'dob' => 'required',
            'doa' => 'required',
            'sex' => 'required'
        ]);
        $customer = Customer::findOrFail($id);
        $customer->update($validatedData);
        return redirect('/admin/home')->with('message', 'Customer Details Updated Successfully');
    }
    public function destroyInvoice($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->packages()->detach();
        $invoice->delete();
        return redirect('/admin/home')->with('message', 'Customer Data Deleted Successfully');
    }
    public function exportXLS() 
    {
        return Excel::download(new CustomersExport, 'customers.xlsx');
    }
}
