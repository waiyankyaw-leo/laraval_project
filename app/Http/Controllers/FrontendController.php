<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home($value='')
    {
    	return view('frontend.home');
    }
    public function about($value='')
    {
    	return view('frontend.about');
    }
    public function post($value='')
    {
    	return view('frontend.postdetail');
    }
    public function contact($value='')
    {
    	return view('frontend.contact');
    }
}
