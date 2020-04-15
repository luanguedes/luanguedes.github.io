<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $fillable = [
        'nome',
        'endereco',
        'numero',
        'status',
        'bairro'
    ];

    public $rules = [
        'nome'      => 'required|max:80',
        'endereco'  => 'required|max:80',
        'numero'    => 'required',
        'bairro'    => 'required|max:50',
        'status'    => 'required|max:15',
    ];

    public function evento(){
        return $this->hasOne(Evento::class);
    }

}
