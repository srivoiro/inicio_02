<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function clock()
    {
        return view('layouts.clock-example');
    }

    public function calendar()
    {     
        return view('layouts.calendar-example');         
    }   
}