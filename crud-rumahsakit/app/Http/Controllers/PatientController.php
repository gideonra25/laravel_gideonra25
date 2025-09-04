<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Hospital;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $hospitals = Hospital::all();
        $query = Patient::with('hospital')->orderBy('id', 'asc'); // <- ubah di sini

        if ($request->filled('hospital_id')) {
            $query->where('hospital_id', $request->hospital_id);
        }

        $patients = $query->paginate(10)->withQueryString();

        // untuk safety: jika AJAX request balik partial rows saja
        if ($request->ajax()) {
            return view('patients.partials.rows', compact('patients'))->render();
        }

        return view('patients.index', compact('patients', 'hospitals'));
    }

// filter: route khusus mengembalikan partial rows (dipanggil AJAX)
    public function filter(Request $request)
    {
        $query = Patient::with('hospital')->orderBy('id', 'asc');

        if ($request->filled('hospital_id')) {
            $query->where('hospital_id', $request->hospital_id);
        }

        // paginate agar ukuran halaman tetap konsisten
        $patients = $query->paginate(10)->withQueryString();

        // hanya kembalikan baris tabel (tidak layout/panel)
        return view('patients.partials.rows', compact('patients'))->render();
    }

    public function create()
    {
        $hospitals = Hospital::all();
        return view('patients.create', compact('hospitals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'hospital_id' => 'required|exists:hospitals,id'
        ]);

        Patient::create($request->all());
        return redirect()->route('patients.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function edit(Patient $patient)
    {
        $hospitals = Hospital::all();
        return view('patients.edit', compact('patient', 'hospitals'));
    }


    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'hospital_id' => 'required|exists:hospitals,id'
        ]);

        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Data pasien berhasil diupdate.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return response()->json(['success' => true]);
    }
}