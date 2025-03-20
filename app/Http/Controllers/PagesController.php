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

    public function blogs()
    {
        return view('blogs'); // Blog Page
    }
    public function top50()
    {
        return view('top50'); // Top 50 Page
    }

    public function profile()
    {
        // Ensure the user is authenticated before showing the profile
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access your profile.');
        }

        return view('profile', ['user' => Auth::user()]);
    }
}
