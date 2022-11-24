<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerSatu extends Controller
{
    public function index(){
        return view('master');
    }

    public function profile(){
        return view('profile');
    }

    public function tabel(){
        return view('tabel');
    }
}
