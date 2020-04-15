@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Fornecedores
                        <a class="pull-right" href="{{ url('fornecedores/novo') }}">Novo fornecedor</a>
                    </div>

                    <div class="panel-body">


                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                        @endif

                        <table class='table'>
                            <th>Nome Fantasia</th>
                            <th>CNPJ</th>
                            <th>Endereço</th>
                            <th>Tipo</th>
                            <th>Situação</th>
                            <th>Ações</th>
                            <tbody>
                            @foreach($fornecedores as $fornecedor)
                                <tr>
                                    <td>{{$fornecedor->nomefan}}</td>
                                    <td>{{$fornecedor->cnpj}}</td>
                                    <td>{{$fornecedor->endereco.', '.$fornecedor->numero}}</td>
                                    <td>{{$fornecedor->tipo}}</td>
                                    <td>{{$fornecedor->status}}</td>
                                    <td>
                                        <a href="fornecedores/{{$fornecedor->id}}/editar" class="btn btn-warning btn-sm"><i class="fa fa-btn fa-pencil"></i>Editar</a>
                                        {!! Form::open(['method' => 'DELETE', 'url' => '/fornecedores/'.$fornecedor->id, 'style' => 'display: inline']) !!}
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fa fa-btn fa-trash"></i>Excluir
                                        </button>
                                        <div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content"  style="border-color: red;">
                                                    <div class="modal-header" >
                                                        <h5 class="modal-title" id="modalExcluir">Confirmação</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Deseja realmente deletar esse registro?
                                                    </div>
                                                    <div class="modal-footer" >
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-danger">Confirmar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    {!! Form::close() !!}
                                    <td/>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {!! $fornecedores->links() !!}
            </div>
        </div>
    </div>
@endsection
