<?php

namespace App\Http\Controllers;

use App\Dormitorio;
use App\Evento;
use App\Local;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class DormitoriosController extends Controller
{

    private $dormitorio;
    private $totalPages = 5;

    public function __construct(Dormitorio $dormitorio)
    {
        $this->dormitorio = $dormitorio;

        $this->middleware('auth');
    }

    public function index()
    {


        $locais = Local::get();
        $dormitorios = Dormitorio::paginate($this->totalPages);

        return view('dormitorios.lista', ['dormitorios' => $dormitorios], ['locais' => $locais]);

    }

    public function novo()
    {
        $locais = Local::get();

        return view('dormitorios.formulario', ['locais' => $locais]);
    }

    public function salvar(Request $request)
    {
        $dormitorio = new Dormitorio();

        $this->validate($request, $this->dormitorio->rules);

        $dormitorio = $dormitorio->create($request->all());

        \Session::flash('mensagem_sucesso', "Dormitório cadastrado com sucesso!");

        return Redirect::to('dormitorios/novo');
    }

    public function editar($id)
    {

        $dormitorio = Dormitorio::findOrFail($id);

        $locais = Local::get();

        return view('dormitorios.formulario', ['dormitorio' => $dormitorio], ['locais' => $locais]);
    }

    public function atualizar($id, Request $request)
    {
        $dormitorio = Dormitorio::findOrFail($id);
        $dormitorio->update($request->all());

        \Session::flash('mensagem_sucesso', "Dormitório atualizado com sucesso!");

        return Redirect::to('dormitorios/' . $dormitorio->id . '/editar');
    }

    public function deletar($id)
    {
        $dormitorio = Dormitorio::findOrFail($id);

        $dormitorio->delete();
        \Session::flash('mensagem_sucesso', "Dormitório deletado com sucesso!");

        return Redirect::to('dormitorios');
    }
}
