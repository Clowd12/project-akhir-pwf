<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Models\Service;
use App\Models\HaveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class DashboardLaundryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.index',[
            "laundries"=> Laundry::where('user_id',auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create',[
                "services"=> Service::all(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
              
        $validatedData = $request->validate([
            'name' => 'required|max:255',                    
            'priceKg'=> 'required|numeric',
            'location'=> 'required|max:255',
            'phone'=> 'required|numeric',
            'description' => 'required',
            'image'=> 'image|file|required|max:1024',
            'open' => 'required',
            'close' => 'required',
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('laundry-images');
        }                    
        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['user_id'] = 1;

        $id = DB::table('laundries')->insertGetId($validatedData);

        $data = $request->all();

        if($request['service']){
            if(count($data['service']) > 0 ){
                foreach($data['service'] as $item => $value){
                    $servis = array(           
                        'laundry_id' => $id,
                        'service_id' => $data['service'][$item],                    
                    );
                    HaveService::create($servis);
                }
            }
        }


        return redirect('/dashboard/laundry')->with('success', 'Laundry berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($laundry)
    {
        $data = Laundry::where('id',Crypt::decrypt($laundry))->first();
        return view('dashboard.show',[
            "laundry"=> $data,
            "haveService"=> HaveService::where("laundry_id", $data->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($laundry)
    {
        $data = Laundry::where('id',Crypt::decrypt($laundry))->first();
        return view('dashboard.edit',[
            "services"=> Service::all(),
            "haveService"=> HaveService::where("laundry_id", $data->id)->get(),
            "laundry"=> $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $laundry)
    {

        $laundry2 = Laundry::where('id',Crypt::decrypt($laundry))->first();
        $validatedData = $request->validate([
            'name' => 'required|max:255',                    
            'priceKg'=> 'required|numeric',
            'location'=> 'required|max:255',
            'phone'=> 'required|numeric',
            'description' => 'required',
            'image'=> 'image|file|max:1024',
            'open' => 'required',
            'close' => 'required',
        ]);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('laundry-images');
        }                    
        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['user_id'] = 1;

        $id = Laundry::where('id',$laundry2->id)->first();
        $id->update($validatedData);


        $data = $request->all();

        if($request['service']){
            if(count($data['service']) > 0 ){
                HaveService::where("laundry_id", $laundry2->id)->delete();
                foreach($data['service'] as $item => $value){
                    $servis = array(           
                        'laundry_id' => $id->id,
                        'service_id' => $data['service'][$item],                    
                    );
                    HaveService::create($servis);
                }
            }
            
        }


        return redirect('/dashboard/laundry')->with('success', 'Laundry berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($laundry)
    {
        $data = Laundry::where('id',Crypt::decrypt($laundry))->first();

        if($data->image){
            Storage::delete($data->image);
        }
        Laundry::destroy($data->id);
        HaveService::where("laundry_id", $data->id)->delete();
        return redirect('/dashboard/laundry')->with('success', 'Laundry berhasil dihapus');
    }
}
