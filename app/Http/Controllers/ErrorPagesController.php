<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorPagesController extends Controller
{
    public function index(){
        return view('welcome');
    }
}
