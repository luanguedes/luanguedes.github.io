<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Events\Event;
use App\Inscricao;
use App\ItemEvento;
use App\Local;
use App\RecebimentoInscricao;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class RecebimentoInscricoesController extends Controller
{

    private $totalPages = 5;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $itemeventos = ItemEvento::get();
        $eventos = Evento::get();
        $users = User::paginate($this->totalPages);
        $inscricoes = Inscricao::get();

        return view('recebimentoinscricoes.lista', ['inscricoes' => $inscricoes, "users" => $users, "eventos" => $eventos, "itemeventos" => $itemeventos]);

    }

    public function novo()
    {
        $eventos = Evento::get();
        $users = User::get();
        $itemeventos = ItemEvento::get();
        $inscricao = Inscricao::get();

        return view('recebimentoinscricoes.formulario', ['inscricao' => $inscricao], ['users' => $users]);
    }

    public function salvar(Request $request)
    {
        $recebimentoinscricao = new RecebimentoInscricao();

        $recebimentoinscricao = $recebimentoinscricao->create($request->all());

        \Session::flash('mensagem_sucesso', "Confirmação da Inscrição realizada com sucesso!");

        return Redirect::to('recebimentoinscricoes');
    }

    public function confirmar(Request $request, $id)
    {


        $inscricao = Inscricao::findOrFail($id);
        $inscricao->status = $request->status;
        $inscricao->save();


        return Redirect::to('recebimentoinscricoes');
    }

    public function atualizar($id, Request $request)
    {
        $inscricao = Inscricao::findOrFail($id);
        $inscricao->status =

        \Session::flash('mensagem_sucesso', "Confirmação de Inscrição atualizada!");

        return Redirect::to('recebimentoinscricoes');
    }

    public function deletar($id)
    {
        $recebimentoinscricao = RecebimentoInscricao::findOrFail($id);

        $recebimentoinscricao->delete();
        \Session::flash('mensagem_sucesso', "Recebimento deletado com sucesso!");

        return Redirect::to('recebimentoinscricoes/lista');
    }
}