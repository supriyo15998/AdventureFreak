<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
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
        return view('admin.home');
    }
    public function new_package()
    {
        return view('admin.newPackage');
    }
    public function view_packages()
    {
        $packages = Package::all();
        return view('admin.viewPackage')->withPackages($packages);
    }
    public function create_new_package(Request $request)
    {
        $validatedData = $request->validate([
            'package_name' => 'required',
            'amount_per_head' => 'required',
            'facilities' => 'required',
            'depart_date' => 'required',
            'arrival_date' => 'required',
            'days' => 'required',
            'nights' => 'required'
        ]);
        //dd($validatedData);
        Package::create($validatedData);
        return redirect('/admin/home')->with('message', 'Package Added Successfully');
    }
    public function edit_package($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.editPackage')->withPackage($package);
    }
    public function edit_final(Request $request)
    {
        $validatedData = $request->validate([
            'package_name' => 'required',
            'amount_per_head' => 'required',
            'facilities' => 'required',
            'depart_date' => 'required',
            'arrival_date' => 'required',
            'days' => 'required',
            'nights' => 'required'
        ]);

        $package = Package::findOrFail($request->package_id);

        $package->update($validatedData);
        return redirect('/admin/home')->with('message', 'Package Updated Successfully');
    }
    public function generateInvoice()
    {
        $packages = Package::all();   
        return view('admin.generateInvoice')->withPackages($packages);
    }
    public function viewInvoice()
    {
        return view('admin.showInvoice');
    }
    public function createInvoice(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'billingName' => 'required',
            'address' => 'required',
            'phone' => 'required|max:10|min:10',
            'package_id' => 'required',
            'quantity' => 'required|min:1',
            'price' => 'required',
            'discount' => 'required',
            'gst' => 'required',
            'rec_amt' => 'required'
        ]);
        //dd($validatedData);
        return view('admin.invoice.invoice')->withValidatedData($validatedData);
    }
}
