<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Testimonial;
use Intervention\Image\Facades\Image;

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
        return view('admin.home')->withPcount($pcount)->withTcount($tcount)->withTitle($title);
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

        $this->storeImage($package);

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
        return view('admin.showInvoice');
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

        $totalAmount = 0;
        $packages = array();

        foreach ($request->package_id as $key => $package_id) {
            $package = Package::findOrFail($package_id); 
            $totalAmount += $package->amount_per_head * $request->package_quantity[$key];
            array_push($packages, $package);  
        }
        //dd($validatedData);
        //dd($package);
        $finalAmount = ($totalAmount-($totalAmount*(($validatedData->discount)/100)))+(2*(round((($totalAmount-($totalAmount*(($validatedData->discount)/100)))*(($validatedData->gst)/2))/100,2)));
        $finalAmount = round($finalAmount);
        $formattedText = new \NumberFormatter("en", \NumberFormatter::SPELLOUT);
        $text = $formattedText->format($finalAmount);

        $data = (object) [
            'validatedData' => $validatedData,
            'totalAmount' => $totalAmount,
            'packages' => $packages,
            'finalAmount' => $finalAmount,
            'text' => $text
        ];
        //dd($data);

        $pdf = \PDF::loadView('admin.invoice.invoice', array('data' => $data));
        return $pdf->download('invoice.pdf');
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
}
