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
    public function create_new_package(Request $request)
    {
        $validatedData = $request->validate([
            'pack_name' => 'required',
            'amount' => 'required',
            'facilities' => 'required',
            'depart-date' => 'required',
            'arrival-date' => 'required',
            'days' => 'required',
            'nights' => 'required'
        ]);
        Package::create($validatedData);
        return redirect('/home');
    }
}
