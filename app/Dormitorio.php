<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dormitorio extends Model
{
    protected $fillable = [
        'number',
        'gender',
        'bloco',
        'status',
        'local_id'
    ];

    public $rules = [
        'number'        => 'required|max:15',
        'gender'        => 'required|max:15',
        'bloco'         => 'required|max:50',
        'local_id'      => 'required',
        'status'        => 'required|max:15',
    ];

}
