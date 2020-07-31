<?php

namespace App\Http\Controllers;

use App\Country;
use App\Region;
use Illuminate\Http\Request;

class NeederController extends Controller
{
    public function index() {
    	$countries = Country::get();

    	return view('corona.needer', compact('countries'));
    }
}