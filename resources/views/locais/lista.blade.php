@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Locais
                        <a class="pull-right" href="{{ url('locais/novo') }}">Novo Local</a>
                    </div>

                    <div class="panel-body">


                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                        @endif

                        <table class='table'>
                            <th>Local</th>
                            <th>Endereço</th>
                            <th>Bairro</th>
                            <th>Situação</th>
                            <th>Ações</th>
                            <tbody>
                            @foreach($locais as $local)
                                <tr>
                                    <td>{{$local->nome}}</td>
                                    <td>{{$local->endereco.', '.$local->numero}}</td>
                                    <td>{{$local->bairro}}</td>
                                    <td>{{$local->status}}</td>
                                    <td>
                                        <a href="locais/{{$local->id}}/editar" class="btn btn-warning btn-sm"><i class="fa fa-btn fa-pencil"></i>Editar</a>
                                        {!! Form::open(['method' => 'DELETE', 'url' => '/locais/'.$local->id, 'style' => 'display: inline']) !!}
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
                {!! $locais->links() !!}
            </div>
        </div>
    </div>
@endsection
