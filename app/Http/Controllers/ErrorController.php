<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function index403($id)
    {
        return view('errors.403');
    }
}
