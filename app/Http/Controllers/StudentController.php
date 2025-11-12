<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Students ::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nim'       => 'required|unique:students',
            'name'      => 'required',
            'gender'    => 'required',
            'domisili'  => 'required',
            'angkatan'  => 'required',
            'prodi'     => 'required',
            'fakultas'  => 'required',
        ]);
        Students::create($request -> all());
        return view('dashboard') -> with('success', 'Data mahasiswa berhasil dibuat');
    }
    
    /**
     * Display the specified resource.
    */
    public function show(string $id)
    {
        $student = Students::findOrFail($id);
        return view('students.edit', compact('student'));
    }
    
    /**
     * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        $student = Students::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        $student = Students::findOrFail($id);

        $request -> validate([
            'nim'       => 'required|unique:students' . $student -> id,
            'name'      => 'required',
            'gender'    => 'required',
            'domisili'  => 'required',
            'angkatan'  => 'required',
            'prodi'     => 'required',
            'fakultas'  => 'required',
        ]);

        $student -> update($request -> all());
        return view('dashboard') -> with('success', 'Data mahasiswa berhasil diubah');
    }
    
    /**
     * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
        $student = Students::findOrFail($id);
        $student -> delet();

        return redirect() -> route('dashboard') -> with('success', 'Data mahasiswa berhasil dihapus');
    }
}
