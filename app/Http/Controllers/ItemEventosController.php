<?php

namespace App\Http\Controllers;

use App\Evento;
use App\ItemEvento;
use App\Local;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class ItemEventosController extends Controller
{

    private $itemevento;
    private $totalPages = 5;

    public function __construct(ItemEvento $itemevento)
    {
        $this->itemevento = $itemevento;

        $this->middleware('auth');
    }

    public function index()
    {


        $eventos = Evento::get();
        $itemeventos = ItemEvento::paginate($this->totalPages);

        return view('itemeventos.lista', ['itemeventos' => $itemeventos], ['eventos' => $eventos]);

    }

    public function novo()
    {
        $eventos = Evento::get();

        return view('itemeventos.formulario', ['eventos' => $eventos]);
    }

    public function salvar(Request $request)
    {
        $itemevento = new ItemEvento();

        $this->validate($request, $this->itemevento->rules);

        $itemevento = $itemevento->create($request->all());

        \Session::flash('mensagem_sucesso', "Item do Evento cadastrado com sucesso!");

        return Redirect::to('itemeventos/novo');
    }

    public function editar($id)
    {

        $itemevento = ItemEvento::findOrFail($id);

        $eventos = Evento::get();

        return view('itemeventos.formulario', ['itemevento' => $itemevento], ['eventos' => $eventos]);
    }

    public function atualizar($id, Request $request)
    {
        $itemevento = ItemEvento::findOrFail($id);
        $itemevento->update($request->all());

        \Session::flash('mensagem_sucesso', "Item do Evento atualizado com sucesso!");

        return Redirect::to('itemeventos/' . $itemevento->id . '/editar');
    }

    public function deletar($id)
    {
        $itemevento = ItemEvento::findOrFail($id);

        $itemevento->delete();
        \Session::flash('mensagem_sucesso', "Item do Evento deletado com sucesso!");

        return Redirect::to('itemeventos');
    }
}
