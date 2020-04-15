<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemEvento extends Model
{
    protected $table = 'itemeventos';
    protected $fillable = [
        'nome',
        'valor',
        'evento_id',
        'status'
    ];

    public $rules = [
        'nome'      => 'required|max:120',
        'valor'     => 'required',
        'evento_id' => 'required',
        'status'    => 'required|max:15',
    ];

    public function evento()
    {
        return $this->hasOne(Evento::class);
    }
}
