<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	return view('Dashboard.index');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
