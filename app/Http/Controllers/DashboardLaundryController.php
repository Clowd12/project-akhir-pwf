<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use Illuminate\Http\Request;

class DashboardLaundryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.index',[
            "laundries"=> Laundry::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',        
            'speaker_id' => 'required',
            'image'=> 'image|file|max:1024',
            'location'=> 'required|max:255',
            'price'=> 'required|numeric',
            'body' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('course-images');
        }                    
        $validatedData['slug'] = $request->slug . "-" . time(); 
        $validatedData['status'] = "aktif";
        
        Course::create($validatedData);
        return redirect('/dashboard/super/courses')->with('success', 'post berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laundry $laundry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laundry $laundry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laundry $laundry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laundry $laundry)
    {
        //
    }
}
