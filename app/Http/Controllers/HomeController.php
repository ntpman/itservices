<?php

namespace App\Http\Controllers;
use resources\pic;
use Illuminate\Http\Request;

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
        
        return view('home');
        // return view('admin.dashboard');
    }

    public function admin()
    {
        return view('admin.dashboard');
    }
}
