<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoUser extends Model
{
    protected $table = 'grupousers';
    protected $fillable = [
        'grupo_id',
        'user_id'
    ];

    public $rules = [
        'grupo_id'    => 'required',
        'user_id'     => 'required|unique:grupousers',
    ];
}
