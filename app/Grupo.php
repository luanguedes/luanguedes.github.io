<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';
    protected $fillable = [
        'nome',
        'genero',
        'evento_id',
        'status'
    ];

    public $rules = [
        'nome'      => 'required|max:80',
        'genero'    => 'required|max:15',
        'evento_id' => 'required',
        'status'    => 'required|max:15',
    ];
}
