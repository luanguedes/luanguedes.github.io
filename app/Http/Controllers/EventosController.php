<?php

namespace App\Http\Controllers;

use App\Local;
use Illuminate\Http\Request;
use App\Evento;
use App\Http\Requests;
use Redirect;

class EventosController extends Controller
{

    private $evento;
    private $totalPages = 5;


    public function __construct(Evento $evento)
    {
        $this->evento = $evento;

        $this->middleware('auth');
    }

    public function index(){


        $locais = Local::get();
        $eventos = Evento::paginate($this->totalPages);

        return view('eventos.lista', ['eventos' => $eventos, 'locais' => $locais]);

    }

    public function novo(){
        $locais = Local::get();

        return view('eventos.formulario', compact('locais'));
    }
    
    public function salvar(Request $request){
        $evento = new Evento();

        $this->validate($request, $this->evento->rules);

        $evento = $evento->create($request->all());

        \Session::flash('mensagem_sucesso', "Evento cadastrado com sucesso!");

        return Redirect::to('eventos/novo');
    }

    public function editar($id){

        $evento = Evento::findOrFail($id);

        $locais = Local::get();

        return view('eventos.formulario', ['evento' => $evento], ['locais' => $locais]);
    }

    public function atualizar($id, Request $request){
        $evento = Evento::findOrFail($id);
        $evento->update($request->all());

        \Session::flash('mensagem_sucesso', "Evento atualizado com sucesso!");

        return Redirect::to('eventos/'.$evento->id.'/editar');
    }

    public function deletar($id){
        $evento = Evento::findOrFail($id);

        $evento->delete();
        \Session::flash('mensagem_sucesso', "Evento deletado com sucesso!");

        return Redirect::to('eventos');
    }
}