<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Package;
class PagesController extends Controller
{
    public function index() {
        $title = 'Adventure-Freak | Home';
        return view('welcome', ['title'=>$title]);
    }
    public function about() {
        $title = 'Adventure-Freak | About Us';
        return view('about', ['title'=>$title]);
    }
    public function package() {
        $title = 'Adventure-Freak | Packages';
        //$packages = Package::all();
        $packages = DB::table('packages')->simplePaginate(3);
        //dd($packages);
        return view('packages')->withTitle($title)->withPackages($packages);
    }
    public function contact() {
        $title = 'Adventure-Freak | Contact Us';
        return view('contactus', ['title'=>$title]);
    }
}
