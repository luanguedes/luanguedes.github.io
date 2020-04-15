<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',   
        'status'
    ];

    public $rules = [
        'nome'      => 'required|max:80',
        'status'    => 'required|max:15',
    ];
}
