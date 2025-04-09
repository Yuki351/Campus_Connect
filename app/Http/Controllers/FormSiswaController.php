<?php

namespace App\Http\Controllers;

use app\Http\Models\FormSiswa;
use app\Http\Models\Mahasiswa;
use Illuminate\Http\Request;

class FormSiswaController extends Controller
{
    public function submitApplication(Request $request)
    {
        $request->validate([
            'nrp' => 'required|string|max:9|exists:mahasiswa,nrp',
            'name' => 'required|string|max:100',
            'address' => 'requred|string|max:300',
            'semester' => 'nullable|string',
            'keperluan' => 'nullable|string',
            'kodeMK' => 'nullable|string',
            'namaMK' => 'nullable|string',
            'tujuan' => 'nullable|string',
            'topik' => 'nullable|string',
        ]);

        // Fetch Mahasiswa Data
        $mahasiswa = Mahasiswa::where('nrp', $request->nrp)->first();

        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        // Create Form
        $form = new FormSiswa();
        $form->nrp = $mahasiswa->nrp;
        $form->name = $mahasiswa->name;
        $form->address = $request->address ?? $mahasiswa->address;
        $form->semester = $request->semester;
        $form->purpose = $request->purpose;
        $form->course_code = $request->course_code;
        $form->course_name = $request->course_name;
        $form->destination = $request->destination;
        $form->topic = $request->topic;
        $form->save();

        return response()->json(['message' => 'Application submitted successfully'], 200);
    }

    public function applications()
    {
        return $this->hasMany(FormSiswa::class, 'nrp', 'nrp');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nrp', 'nrp');
    }

}
