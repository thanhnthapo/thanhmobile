<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewController extends Controller
{
     public function show(){
    	return view('frontend.new.show');
    }
}

