@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Recebimento das Inscrições
                        <a class="pull-right" href="{{ url('recebimentoinscricoes') }}"></a>
                    </div>

                    <div class="panel-body">
                        <?php
                        $valortotal = 0;
                        $today = date("Y-m-d");
                        ?>

                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                        @endif

                        <table class='table'>
                            <th>Participante</th>
                            <th>Evento</th>
                            <th>Item do Evento</th>
                            <th>Situação</th>
                            <th>Ações</th>

                            <tbody>
                            @foreach($users as $user)
                            @foreach($inscricoes as $inscricao)
                                @foreach($eventos as $evento)
                                @foreach($itemeventos as $itemevento)

                                    @if($inscricao->user_id == $user->id)
                                    @if($evento->id == $itemevento->evento_id)
                                    @if($itemevento->id == $inscricao->itemevento_id)




                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$evento->nome}}</td>
                                                <td>{{$itemevento->nome.' - R$  '.$itemevento->valor}}</td>
                                                <td>{{$inscricao->status}}</td>
                                                <td>
                                                    {!! Form::open(['url' => "recebimentoinscricoes/{$inscricao->id}/confirmar"]) !!}
                                                    <input name="status" type="hidden" id="status" value="Confirmado">
                                                    {!! Form::submit('Confirmar', ['class' => 'btn btn-success btn-sm']) !!}
                                                    {!! Form::close() !!}

                                                    {!! Form::open(['url' => "recebimentoinscricoes/{$inscricao->id}/confirmar"]) !!}
                                                    <input name="status" type="hidden" id="status" value="Recusado">
                                                    {!! Form::submit('Recusar', ['class' => 'btn btn-danger btn-sm']) !!}
                                                    {!! Form::close() !!}

                                                <td/>
                                            </tr>

                                    @endif
                                    @endif
                                    @endif

                                    @endforeach
                                @endforeach
                                @endforeach
                                @endforeach




                            </tbody>

                        </table>
                    </div>
                </div>
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection
