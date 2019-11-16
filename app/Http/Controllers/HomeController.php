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
}
