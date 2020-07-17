<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('role:Super Administrador|Administrador|');
    }

    public function index()
    {
        return view('home');
    }
}