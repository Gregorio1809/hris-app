<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
	public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('auth')->only(['index']);
    }

	public function index(){

		return view('dashboard.profile.index');
	}

    public function create(){

		return view('dashboard.profile.create');
	}


}
