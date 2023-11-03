<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaundryController extends Controller
{
    public function index(){
        return view('welcome');
    }
    
    public function laundries(){
        return view('laundries');
    }
    public function laundry($laundry){
        return view('laundry');
    }
}
