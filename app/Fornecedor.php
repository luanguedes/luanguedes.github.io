<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';
    protected $fillable = [
        'nomefan',
        'razsoc',
        'cnpj',
        'endereco',
        'numero',
        'bairro',
        'telefone',
        'tipo',
        'status'
    ];

    public $rules = [
        'nomefan'       => 'required|max:100',
        'razsoc'        => 'required|max:100|unique:fornecedores',
        'cnpj'          => 'required|cnpj|max:30|unique:fornecedores',
        'endereco'      => 'required|max:80',
        'numero'        => 'required|max:15',
        'bairro'        => 'required|max:50',
        'telefone'      => 'required|max:15',
        'tipo'          => 'required|max:20',
        'status'        => 'required|max:15',
    ];
}

