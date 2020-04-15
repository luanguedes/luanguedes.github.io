<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caixa extends Model
{
    protected $table = 'caixa';
    protected $fillable = [
        'inscricao_id',
        'saldo'
    ];

    public $rules = [
        'inscricao_id'      => 'required',
        'saldo'             => 'required',
    ];
}
