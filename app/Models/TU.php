<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TU extends Model
{
    protected $table = 'tu';
    protected $primarykey = 'nip';
    protected $fillable = ['nip', 'name', 'email', 'birthdate'];
    protected $keytype = 'string';
    public $incrementing = false;
}
