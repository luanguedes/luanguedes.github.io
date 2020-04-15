@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Participantes dos Grupos
                    </div>
                    <div class="panel-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                        @endif

                        <table class='table'>
                            <th>Evento</th>
                            <th>Grupo</th>
                            <th>Gênero</th>
                            <th>Ações</th>
                            <tbody>
                            @foreach($grupos as $grupo)
                                @foreach($eventos as $evento)
                                    @if($grupo->status != 'Inativo')
                                    @if($grupo->evento_id == $evento->id)
                                        <tr>
                                            <td>{{$evento->nome}}</td>
                                            <td>{{$grupo->nome}}</td>
                                            <td>{{$grupo->genero}}</td>
                                            <td>
                                                <a href="grupousers/{{$grupo->id}}/incluir" class="btn btn-primary btn-sm"><i class="fa fa-btn fa-plus"></i>Adicionar Participantes</a>
                                                <a href="grupousers/{{$grupo->id}}/participantes" class="btn btn-success btn-sm"><i class="fa fa-btn fa-pencil"></i>Ver Participantes</a>
                                            <td/>
                                        </tr>
                                    @endif
                                    @endif
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {!! $grupos->links() !!}
            </div>
        </div>
    </div>
@endsection

