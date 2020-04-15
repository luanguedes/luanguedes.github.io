<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    protected $table = 'inscricoes';
    protected $fillable = [
        'itemevento_id',
        'user_id',
        'status'
    ];

    public $rules = [
        'user_id'           => 'required',
        'itemevento_id'     => 'required',
        'status'            => 'required|max:15',
    ];


    public function itemevento()
    {
        return $this->hasOne(ItemEvento::class);
    }
}
