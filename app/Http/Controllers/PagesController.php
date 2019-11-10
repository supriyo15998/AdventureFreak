<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('packages', ['title'=>$title]);
    }
    public function contact() {
        $title = 'Adventure-Freak | Contact Us';
        return view('contactus', ['title'=>$title]);
    }
}
