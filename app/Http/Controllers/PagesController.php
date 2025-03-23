<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('index'); // Home Page
    }

    public function about()
    {
        return view('about'); // About Us Page
    }

    public function contact()
    {
        return view('contact'); // Contact Page
    }
}
