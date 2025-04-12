<?php

namespace App\Http\Controllers;
use App\Models\TU;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TUController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tu.index')
        -> with ('tus', TU::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'nip' => 'required|string|max:7|unique:tu, nrp',
            'nama' => 'requred|string|max:50',
            'email' => 'requred|string|email|max:100|unique:tu, email',
            'birthdate' => 'requred|date',
            'program_studi' => 'required|string|max:3',
        ])->validate();
        $tu = new TU($validatedData);
        $tu->save();
        return redirect(route('tuList'));
    }

    /**
     * Display the specified resource.
     */
    public function show(TU $tu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TU $tu)
    {
        $tu = TU::find($nik);
        if ($tu == null) {
        return back()->withErrors(['err_msg' => 'TU not found!']);
        }
        return view('tuEdit')
        ->with('tu', $tu);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TU $tu)
    {
        $tu = Dosen::find($nik);
        if ($tu == null) {
            return back()->withErrors(['err_msg' => 'TU not found!']);
        }
        $validatedData = validator($request->all(),[
            'nip' => ['required', 'string', 'max:7', Rule::unique('tu', 'nip')->ignore($tu->nip, 'nip')],
            'name' => ['required', 'string', 'max:100'],
            'birthdate' => ['required'],
            'email' => ['required', 'email', 'max:50', Rule::unique('tu', 'email')->ignore($tu->nip, 'nip')],
            'program_studi' => ['required', 'string', 'max:3'],
        ])->validate();
        $tu['name'] = $validatedData['name'];
        $tu['birthdate'] = $validatedData['birthdate'];
        $tu['email'] = $validatedData['email'];

        $tu->save();
        return redirect()->route('tuList')
            -> with('success', 'TU Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TU $tu)
    {
        $tu->delete();
        return redirect(route('tuList'))->with('success', 'TU Berhasil Dihapus');
    }
    
    /**
     * Show the form for uploading a file.
     */
    public function view()
    {
        return view('tu.upload');
    }
    /**
     * Handle the file upload.
     */
    public function upload(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:2048', // Max 2MB
        ]);

        $file = $request->file('pdf');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('/uploads/pdf/', $fileName); 

        return back()->with('success', 'PDF uploaded successfully!');
    }
}
