<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Produto;
use App\Fornecedor;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class ComprasController extends Controller
{

    private $compra;
    private $totalPages = 5;

    public function __construct(Compra $compra)
    {
        $this->compra = $compra;

        $this->middleware('auth');
    }

    public function index(){
        $compras = Compra::paginate($this->totalPages);
        $fornecedores = Fornecedor::get();
        $produtos = Produto::get();

        return view('compras.lista', ['compras' => $compras, 'fornecedores' => $fornecedores, 'produtos' => $produtos]);
    }

    public function salvar(Request $request)
    {
        $compra = new Compra();

        $this->validate($request, $this->compra->rules);

        $compra = $compra->create($request->all());

        \Session::flash('mensagem_sucesso', "Compra realizada com sucesso!");

        return Redirect::to('compras/novo');
    }

    public function editar($id)
    {

        $compra = Compra::findOrFail($id);
        $fornecedores = Fornecedor::get();
        $produtos = Produto::get();

        return view('compras.formulario', ['fornecedores' => $fornecedores, 'produtos' => $produtos, 'compra' => $compra]);
    }

    public function incluir($id)
    {

        $produtos = Produto::get();
        $fornecedores = Fornecedor::get();
        $fornecedor = Fornecedor::findOrFail($id);

        return view('compras.formulario', ['fornecedor' => $fornecedor, 'produtos' => $produtos]);
    }

    public function novo()
    {
        $fornecedores = Fornecedor::get();
        $produtos = Produto::get();

        return view('compras.formulario', ['fornecedores' => $fornecedores, 'produtos' => $produtos]);
    }

    public function deletar($id)
    {
        $compra = Compra::findOrFail($id);

        $compra->delete();
        \Session::flash('mensagem_sucesso', "Compra deletada com sucesso!");

        return Redirect::to('compras/'.$compra->fornecedor_id.'/produtos');
    }
}