<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratPengajuanController extends Controller
{
    public function submitted()
    {
        return view('mahasiswa.form');
    }

    public function form(Request $request)
    {
        $rules = [
            'jenis_surat' => 'required|in:aktif,tugas,lulus,laporan',
            'nrp' => 'required|string|max:9|unique:mahasiswa,nrp',
            'nama' => 'required|string|max:50',
        ];

        if ($request->jenis_surat == 'aktif') {
            $rules = array_merge($rules, [
                'address' => 'required|string|max:300',
                'semester' => 'required|string|max:2',
                'tujuan' => 'required|string|max:300',
            ]);
        } elseif ($request->jenis_surat == 'tugas') {
            $rules = array_merge($rules, [
                'kodeMk' => 'required|string|max:300',
                'namaMK' => 'required|string|max:2',
                'tujuan' => 'required|string|max:300',
            ]);
        } elseif ($request->jenis_surat == 'laporan') {
            $rules = array_merge($rules, [
                'tujuan' => 'required|string|max:300',
            ]);
        }

        $request->validate($rules);
        $request->save();
        return redirect(route('mahasiswaList'))->with('success', 'Your form request has been submitted successfully.');
    }
}
