<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'fornecedor_id',
        'produto_id',
        'valunitario',
        'qtde',
        'status'
    ];

    public $rules = [
        'fornecedor_id'     => 'required',
        'produto_id'        => 'required',
        'valunitario'       => 'required',
        'qtde'              => 'required',
        'status'            => 'required|max:15',
    ];
}
