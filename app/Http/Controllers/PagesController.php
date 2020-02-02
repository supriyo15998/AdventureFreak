<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Package;
use App\Testimonial;
class PagesController extends Controller
{
    public function index() {
        $title = 'Adventure-Freak | Home';
        //$testimonials = Testimonial::all();
        //dd($testimonials);
        $testimonials = DB::table('testimonials')->paginate(1);
        return view('welcome')->withTitle($title)->withTestimonials($testimonials);
    }
    public function about() {
        $title = 'Adventure-Freak | About Us';
        return view('about', ['title'=>$title]);
    }
    public function package() {
        $title = 'Adventure-Freak | Packages';
        //$packages = Package::all();
        $packages = DB::table('packages')->paginate(3);
        //dd($packages);
        return view('packages')->withTitle($title)->withPackages($packages);
    }
    public function contact() {
        $title = 'Adventure-Freak | Contact Us';
        return view('contactus', ['title'=>$title]);
    }
    public function adventurous_tour() {
        //$companies = DB::table('users')->where('role', 3)->get();
        $packages = DB::table('packages')->where('package_category','adventurous-tour')->get();
        //dd($packages);
        $title = "Adventure-Freak | Adventurous Tour";
        return view('packages.adventurous')->withTitle($title)->withPackages($packages);
    }
    public function trekking() {
        $packages = DB::table('packages')->where('package_category','trekking')->get();
        $title = "Adventure-Freak | Trekking";
        return view('packages.trekking')->withTitle($title)->withPackages($packages);
    }
    public function city_tour() {
        $packages = DB::table('packages')->where('package_category','city-tour')->get();
        $title = "Adventure-Freak | City Tour";
        return view('packages.citytour')->withTitle($title)->withPackages($packages);
    }
}
