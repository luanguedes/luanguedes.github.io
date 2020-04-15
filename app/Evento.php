<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Evento extends Model
{


    protected $fillable = [
        'nome',
        'dataeve',
        'status',
        'local_id'
    ];

    public $rules = [
        'nome'          => 'required|max:80',
        'dataeve'       => 'required',
        'local_id'      => 'required',
        'status'        => 'required|max:15',
    ];

    public function local(){
        return $this->belongsTo(Local::class);
    }

    public function grupo()
    {
        return $this->hasOne(Grupo::class);
    }


}
