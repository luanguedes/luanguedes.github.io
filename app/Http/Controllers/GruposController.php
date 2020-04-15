<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Grupo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class GruposController extends Controller
{
    private $grupo;
    private $totalPages = 5;

    public function __construct(Grupo $grupo)
    {
        $this->grupo = $grupo;

        $this->middleware('auth');
    }

    public function index(){
        $grupos = Grupo::paginate($this->totalPages);
        $eventos = Evento::get();
        return view('grupos.lista', ['grupos' => $grupos, 'eventos' => $eventos]);
    }

    public function novo(){
        $eventos = Evento::get();
        return view('grupos.formulario', ['eventos' => $eventos]);
    }

    public function salvar(Request $request){
        $grupo = new Grupo();

        $this->validate($request, $this->grupo->rules);

        $grupo = $grupo->create($request->all());

        \Session::flash('mensagem_sucesso', "Grupo cadastrado com sucesso!");

        return Redirect::to('grupos/novo');
    }

    public function editar($id){

        $grupo = Grupo::findOrFail($id);
        $eventos = Evento::get();

        return view('grupos.formulario', ['grupo' => $grupo, 'eventos' => $eventos]);
    }

    public function atualizar($id, Request $request){
        $grupo = Grupo::findOrFail($id);
        $grupo->update($request->all());

        \Session::flash('mensagem_sucesso', "Grupo atualizado com sucesso!");

        return Redirect::to('grupos/'.$grupo->id.'/editar');
    }

    public function deletar($id){
        $grupo = Grupo::findOrFail($id);

        $grupo->delete();
        \Session::flash('mensagem_sucesso', "Grupo deletado com sucesso!");

        return Redirect::to('grupos');
    }
}
