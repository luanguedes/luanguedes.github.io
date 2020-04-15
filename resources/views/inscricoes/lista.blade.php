@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Suas Inscrições
                        <a class="pull-right" href="{{ url('inscricoes/novo') }}">Nova Inscrição</a>
                    </div>

                    <div class="panel-body">
                        @php($user = Auth::user())
                        @php($eventos = \App\Evento::get())

                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                        @endif

                        <table class='table'>
                            <th>Participante</th>
                            <th>Item do Evento</th>
                            <th>Situação</th>
                            <th>Ações</th>

                            <tbody>

                            @foreach($inscricoes as $inscricao)
                                @foreach($itemeventos as $itemevento)
                                    @foreach($eventos as $evento)
                                        @if($inscricao->itemevento_id == $itemevento->id)
                                            @if($inscricao->user_id == $user->id)
                                                @if($itemevento->evento_id == $evento->id)
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$evento->nome.' - ' .$itemevento->nome.' Valor:  R$ '.$itemevento->valor}}</td>
                                                <td>{{$inscricao->status}}</td>
                                                @if($inscricao->status == 'Pendente')
                                                <td>
                                                    <a href="inscricoes/{{$inscricao->id}}/editar" class="btn btn-warning btn-sm"><i class="fa fa-btn fa-pencil"></i>Editar</a>
                                                    {!! Form::open(['method' => 'DELETE', 'url' => '/inscricoes/'.$inscricao->id, 'style' => 'display: inline']) !!}
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="fa fa-btn fa-trash"></i>Excluir
                                                    </button>
                                                    <div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content"  style="border-color: red;">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalExcluir">Confirmação</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Deseja realmente deletar esse registro?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <button type="submit" class="btn btn-danger">Confirmar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                {!! Form::close() !!}
                                                <td/>
                                                    @endif
                                            </tr>


                                    @endif
                                    @endif
                                    @endif
                                    @endforeach
                                @endforeach
                            @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
                {!! $inscricoes->links() !!}
            </div>
        </div>
    </div>
@endsection
