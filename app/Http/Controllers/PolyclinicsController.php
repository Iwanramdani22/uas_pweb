<?php

namespace App\Http\Controllers;

use App\Polyclinics;
use Illuminate\Http\Request;

class PolyclinicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polyclinics = Polyclinics::all();
        return view('poliklinik.index', compact('polyclinics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poliklinik.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            ]);
            $polyclinics = new Polyclinics;
            $polyclinics->name = $request->name;
            $polyclinics->save();
            return redirect()->route('poliklinik.index')->with('success', 'Poli Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Polyclinics  $polyclinics
     * @return \Illuminate\Http\Response
     */
    public function show(Polyclinics $polyclinics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Polyclinics  $polyclinics
     * @return \Illuminate\Http\Response
     */
    public function edit(Polyclinics $polyclinics, $id)
    {
        $polyclinic = Polyclinics::find($id);
        return view('poliklinik.edit', compact('polyclinic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Polyclinics  $polyclinics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            ]);
            $polyclinic = Polyclinics::find($id);
            $polyclinic->name = $request->name;
            $polyclinic->save();
            return redirect()->route('poliklinik.index')->with('success', 'Poli updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Polyclinics  $polyclinics
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $polyclinic = Polyclinics::find($id);
        $polyclinic->delete();
        return redirect()->route('poliklinik.index')->with('success', 'Poli deleted!');
    }
}