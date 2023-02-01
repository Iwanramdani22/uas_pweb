<?php

namespace App\Http\Controllers;

use App\Doctors;
use App\Polyclinics;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctors::all();
        return view('doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $polyclinics = Polyclinics::all();
        return view('doctor.create', compact('polyclinics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Doctors::create($request->all());
        return redirect()->route('doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function show(Doctors $doctors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctors $doctors, $id)
    {
        $polyclinics = Polyclinics::all();
        $doctors = Doctors::find($id);
        return view('doctors.edit', compact('doctors', 'polyclinics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctors $doctors, $id)
    {
        $request->validate([
            'registration_code' => 'required',
            'name' => 'required',
            'polyclinic_id' => 'required',
            ]);
            $doctors = Doctors::find($id);
            $doctors->registration_code = $request->registration_code;
            $doctors->name = $request->name;
            $doctors->polyclinic_id = $request->polyclinic_id;
            $doctors->save();
            return redirect()->route('doctors.index')->with('success', 'Doctors updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctors $doctors, $id)
    {
        $doctors = Doctors::find($id);
        $doctors->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctors deleted!');
    }
}