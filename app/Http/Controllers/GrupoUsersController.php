<?php

namespace App\Http\Controllers;

use App\Evento;
use App\ItemEvento;
use App\GrupoUser;
use App\Inscricao;
use App\Grupo;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class GrupoUsersController extends Controller
{

    private $grupouser;
    private $totalPages = 5;

    public function __construct(GrupoUser $grupouser)
    {
        $this->grupouser = $grupouser;

        $this->middleware('auth');
    }

    public function index(){
        $grupos = Grupo::paginate($this->totalPages);
        $eventos = Evento::get();
        return view('grupousers.lista', ['grupos' => $grupos, 'eventos' => $eventos]);
    }

    public function salvar(Request $request)
    {
        $grupouser = new GrupoUser();

        $this->validate($request, $this->grupouser->rules);

        $grupouser = $grupouser->create($request->all());

        $id = $grupouser->grupo_id;

        \Session::flash('mensagem_sucesso', "Participantes dos Grupos inclusos com sucesso!");

        return Redirect::to('grupousers/'.$grupouser->grupo_id.'/incluir');
    }

    public function incluir($id)
    {

        $users = User::get();
        $eventos = Evento::get();
        $inscricoes = Inscricao::get();
        $itemeventos = ItemEvento::get();
        $grupos = Grupo::get();
        $grupo = Grupo::findOrFail($id);

        return view('grupousers.formulario', ['grupo' => $grupo, 'users' => $users, 'eventos' => $eventos, 'inscricoes' => $inscricoes, 'itemeventos' => $itemeventos]);
    }

    public function visualizar($id)
    {

        $users = User::get();
        $eventos = Evento::get();
        $inscricoes = Inscricao::get();
        $itemeventos = ItemEvento::get();
        $grupousers = GrupoUser::get();
        $grupo = Grupo::findOrFail($id);

        return view('grupousers.ver', ['grupo' => $grupo, 'users' => $users, 'eventos' => $eventos, 'inscricoes' => $inscricoes, 'itemeventos' => $itemeventos, 'grupousers' => $grupousers]);
    }

    public function deletar($id)
    {
        $grupouser = GrupoUser::findOrFail($id);

        $grupouser->delete();
        \Session::flash('mensagem_sucesso', "Participantes dos grupos deletados com sucesso!");

        return Redirect::to('grupousers/'.$grupouser->grupo_id.'/participantes');
    }
}
