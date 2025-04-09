<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormSiswa extends Model
{
    protected $table = 'pengajuan';
    protected $primarykey = 'nrp';
    protected $fillable = ['nrp', 'name', 'address', 'semester', 'keperluan', 'kodeMK', 'namaMK', 'tujuan', 'topik'];
    protected $keytype = 'string';
    public $incrementing = false;
    public function dosenWali() {
        return $this->belongsTo(Dosen::class, 'dosen_nik');
    }
}
