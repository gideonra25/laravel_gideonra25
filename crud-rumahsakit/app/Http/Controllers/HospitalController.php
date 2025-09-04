<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index()
    {
        $hospitals = Hospital::orderBy('id', 'asc')->paginate(10);
        return view('hospitals.index', compact('hospitals'));
    }

    public function create() { return view('hospitals.create'); }

    public function store(Request $request)
    {
        $data = $request->validate(['name'=>'required','address'=>'nullable','email'=>'nullable|email','phone'=>'nullable']);
        Hospital::create($data);
        return redirect()->route('hospitals.index')->with('success','Rumah sakit dibuat');
    }

    public function edit(Hospital $hospital) { return view('hospitals.edit', compact('hospital')); }

    public function update(Request $request, Hospital $hospital)
    {
        $data = $request->validate(['name'=>'required','address'=>'nullable','email'=>'nullable|email','phone'=>'nullable']);
        $hospital->update($data);
        return redirect()->route('hospitals.index')->with('success','Diupdate');
    }

    public function destroy(Hospital $hospital)
    {
        $hospital->delete();
        return redirect()->route('hospitals.index')->with('success','Dihapus');
    }

}