<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratPengajuan extends Model
{
    protected $table = 'surat_pengajuan';
    protected $primarykey = 'id_surat_pengajuan';
    protected $fillable = ['id_surat_pengajuan', 'jenis_surat', 'nama_surat', 'status', 'tgl_pengajuan', 'Mahasiswa:nrp', 'Mahasiswa:program_studi'];
    protected $keytype = 'string';
    public $incrementing = false;
    public function dosenWali() {
        return $this->belongsTo(Dosen::class, 'dosen_nik');
    }
}
