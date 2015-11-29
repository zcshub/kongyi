<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
    	$user = Auth::user();
        return view('home', compact('user'));
    }
}
