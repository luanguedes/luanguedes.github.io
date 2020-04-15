<?php

namespace App\Http\Controllers;

use App\Caixa;
use App\Incricao;
use App\Evento;
use App\Inscricao;
use App\ItemEvento;
use App\Local;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CaixaController extends Controller
{

    private $caixa;


    public function __construct(Caixa $caixa)
    {
        $this->caixa = $caixa;

        $this->middleware('auth');
    }

    public function index()
    {


        $users = User::get();
        $itemeventos = ItemEvento::get();
        $inscricoes = Inscricao::get();

        return view('inscricoes.lista', ['inscricoes' => $inscricoes], ['itemeventos' => $itemeventos]);

    }

    public function novo()
    {
        $eventos = Evento::get();
        $itemeventos = ItemEvento::get();

        return view('inscricoes.formulario', ['eventos' => $eventos, 'itemeventos' => $itemeventos]);
    }

    public function salvar(Request $request)
    {
        $inscricao = new Inscricao();

        $this->validate($request, $this->caixa->rules);

        $inscricao = $inscricao->create($request->all());

        \Session::flash('mensagem_sucesso', "Inscrição realizada com sucesso!");

        return Redirect::to('inscricoes');
    }

    public function editar($id)
    {

        $inscricao = Inscricao::findOrFail($id);

        $itemeventos = ItemEvento::get();

        return view('inscricoes.formulario', ['inscricao' => $inscricao], ['itemeventos' => $itemeventos]);
    }

    public function atualizar($id, Request $request)
    {
        $inscricao = Inscricao::findOrFail($id);
        $inscricao->update($request->all());

        \Session::flash('mensagem_sucesso', "Inscrição atualizada com sucesso!");

        return Redirect::to('inscricoes/' . $inscricao->id . '/editar');
    }

    public function deletar($id)
    {
        $inscricao = Inscricao::findOrFail($id);

        $inscricao->delete();
        \Session::flash('mensagem_sucesso', "Incrição deletada com sucesso!");

        return Redirect::to('inscricoes/lista');
    }
}
