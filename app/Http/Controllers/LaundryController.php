<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Models\HaveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LaundryController extends Controller
{
    public function index(){
        return view('welcome');
    }
    
    public function laundries(){
        return view('laundries',[
            'laundries'=> Laundry::latest()->filter(request(['search']))->get()
        ]);
    }
    public function laundry($laundry){
        $data = Laundry::where('id',Crypt::decrypt($laundry))->first();

        return view('laundry',[
            'laundry'=> $data,
            "haveService"=> HaveService::where("laundry_id", $data->id)->get()
        ]);
    }
}
