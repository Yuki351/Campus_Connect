<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswa.index')
        -> with ('mahasiswas', Mahasiswa::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create') -> 
        with('dosens', Dosen::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'nrp' => 'required|string|max:9|unique:mahasiswa,nrp',
            'nama' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:mahasiswa,email',
            'address' => 'required|string|max:300',
            'birthdate' => 'required|date',
            'phone_number' => 'required|string|max:15', 
            'program_studi' => 'required|string|max:3',
        ])->validate();
        $mahasiswa = new Mahasiswa($validatedData);
        $mahasiswa->save();
        return redirect(route('mahasiswaList'))
        ->with('status', 'Mahasiswa successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa = Mahasiswa::find($nrp);
        if ($mahasiswa == null) {
          return back()->withErrors(['err_msg' => 'mahasiswa not found!']);
        }
        return view('mahasiswa.detail')
          ->with('mahasiswa', $mahasiswa);
      }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $mahasiswa = Mahasiswa::find($nrp);
        if ($mahasiswa == null) {
          return back()->withErrors(['err_msg' => 'mahasiswa not found!']);
        }
        return view('mahasiswa.edit')
          ->with('dosens', Dosen::all())
          ->with('mahasiswa', $mahasiswa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa = Mahasiswa::find($nrp);
        if ($mahasiswa == null) {
        return back()->withErrors(['err_msg' => 'mahasiswa not found!']);
        }
        $validatedData = $request->validate([
            'nrp' => ['required', 'string', 'max:9', Rule::unique('mahasiswa', 'nrp')->ignore($mahasiswa->nrp, 'nrp')],
            'nama' => ['required', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:100', Rule::unique('mahasiswa', 'email')->ignore($mahasiswa->nrp, 'nrp')],
            'address' => ['required', 'string', 'max:300'],
            'birth_date' => ['required'],
            'phone_number' => ['required', 'varchar:15'],
            'program_studi' => ['required', 'string', 'max:3'],
        ]);
        $mahasiswa['nama'] = $validatedData['nama'];
        $mahasiswa['birthdate'] = $validatedData['birthdate'];
        $mahasiswa['phone_number'] = $validatedData['phone_number'];
        $mahasiswa['email'] = $validatedData['email'];
        $mahasiswa['address'] = $validatedData['address'];
        $mahasiswa['program_studi'] = $validatedData['program_studi'];
        $mahasiswa->save();
        return redirect()->route('mahasiswaList')
        ->with('status', 'Mahasiswa successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa = Mahasiswa::find($nrp);
        if ($mahasiswa == null) {
          return back()->withErrors(['err_msg' => 'mahasiswa not found!']);
        }
        $mahasiswa->delete();
        return redirect()->route('mahasiswaList')
          ->with('status', 'mahasiswa successfully deleted!');
    }
}
