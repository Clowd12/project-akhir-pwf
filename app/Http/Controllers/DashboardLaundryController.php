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
        //
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
