<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primarykey = 'nrp';
    protected $fillable = ['nrp', 'nama','email', 'address', 'birthdate', 'phone_number', 'program_studi'];
    protected $keytype = 'string';
    public $incrementing = false;
}
