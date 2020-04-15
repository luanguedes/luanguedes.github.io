<?php

namespace App\Http\Controllers;

use App\Local;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class LocalsController extends Controller
{

    private $local;
    private $totalPages = 5;

    public function __construct(Local $local)
    {

        $this->local = $local;

        $this->middleware('auth');
    }

    public function index(){
        $locais = Local::paginate($this->totalPages);
        return view('locais.lista', ['locais' => $locais]);
    }

    public function novo(){
        return view('locais.formulario');
    }

    public function salvar(Request $request){
        $local = new Local();

        $this->validate($request, $this->local->rules);

        $local = $local->create($request->all());

        \Session::flash('mensagem_sucesso', "Local cadastrado com sucesso!");

        return Redirect::to('locais/novo');
    }

    public function editar($id){

        $local = Local::findOrFail($id);

        return view('locais.formulario', ['local' => $local]);
    }

    public function atualizar($id, Request $request){
        $local = Local::findOrFail($id);
        $local->update($request->all());

        \Session::flash('mensagem_sucesso', "Local atualizado com sucesso!");

        return Redirect::to('locais/'.$local->id.'/editar');
    }

    public function deletar($id){
        $local = Local::findOrFail($id);

        $local->delete();
        \Session::flash('mensagem_sucesso', "Local deletado com sucesso!");

        return Redirect::to('locais');
    }
}
