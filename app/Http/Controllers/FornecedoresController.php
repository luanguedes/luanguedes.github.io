<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Local;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class FornecedoresController extends Controller
{

    private $fornecedor;
    private $totalPages = 5;

    public function __construct(Fornecedor $fornecedor)
    {
        $this->fornecedor = $fornecedor;

        $this->middleware('auth');
    }

    public function index(){
        $fornecedores = Fornecedor::paginate($this->totalPages);
        return view('fornecedores.lista', ['fornecedores' => $fornecedores]);
    }

    public function novo(){
        return view('fornecedores.formulario');
    }

    public function salvar(Request $request){
        $fornecedores = new Fornecedor();

        $this->validate($request, $this->fornecedor->rules);

        $fornecedores = $fornecedores->create($request->all());

        \Session::flash('mensagem_sucesso', "Fornecedor cadastrado com sucesso!");

        return Redirect::to('fornecedores/novo');
    }

    public function editar($id){

        $fornecedor = Fornecedor::findOrFail($id);

        return view('fornecedores.formulario', ['fornecedor' => $fornecedor]);
    }

    public function atualizar($id, Request $request){
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->update($request->all());

        \Session::flash('mensagem_sucesso', "Fornecedor atualizado com sucesso!");

        return Redirect::to('fornecedores/'.$fornecedor->id.'/editar');
    }

    public function deletar($id){
        $funcionario = Fornecedor::findOrFail($id);

        $funcionario->delete();
        \Session::flash('mensagem_sucesso', "Fornecedor deletado com sucesso!");

        return Redirect::to('fornecedores');
    }
}
