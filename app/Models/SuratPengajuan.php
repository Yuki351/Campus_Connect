<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratPengajuan extends Model
{
    protected $table = 'surat_pengajuan';
    protected $primarykey = 'id_surat_pengajuan';
    protected $fillable = ['id_surat_pengajuan', 'nama_surat', 'jenis_surat', 'tgl_pengajuan', 'status',  'Mahasiswa:nrp', 'Mahasiswa:program_studi'];
    protected $keytype = 'string';
    public $incrementing = false;
}
