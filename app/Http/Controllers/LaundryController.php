<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Models\Service;
use App\Models\HaveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LaundryController extends Controller
{
    public function index(){
        return view('welcome');
    }
    
    public function laundries(){
        
        $laundry = Laundry::latest()->filter(request(['search']));
        if(request('service')){
            
            $haveService = HaveService::select("laundry_id")->whereIn('service_id', request('service'))->get();
            $laundryList = array();
            foreach($haveService as $service){                
                array_push($laundryList,$service->laundry_id);
            }
            // return $haveService;
            $laundry = $laundry->whereIn("id",$laundryList);
            // return $haveService;
        }

        if(request('sort') == "asc"){
            $laundry = $laundry->orderBy('priceKg');
        }
        if(request('sort') == "desc"){
            $laundry = $laundry->orderByDesc('priceKg');
        }
        
        return view('laundries',[
            'laundries'=> $laundry->get(),
            'services'=> Service::all(),
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
