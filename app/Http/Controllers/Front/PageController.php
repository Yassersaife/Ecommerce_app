<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('front.pages.home');
    }

    public function shop()
    {
        return view('front.pages.shop');
    }
    public function about()
    {
        return view('front.pages.about');
    }

    public function contact()
    {
        return view('front.pages.contact');
    }

}
