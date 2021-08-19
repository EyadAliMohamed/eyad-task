<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    // php artisan make:controller pagesController
    public function index($name){
        return view('ahmed',['name'=>$name]);
    }
}
