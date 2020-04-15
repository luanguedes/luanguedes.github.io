@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Informe o participante desse grupo:
                        <a class="pull-right" href="{{ url('grupousers') }}">Lista de Grupos</a>
                    </div>
                    @php($grupousers = \App\GrupoUser::get())

                    <div class="panel-body">

                        @if(isset($errors) && count($errors) > 0)
                            <div class = "alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            </div>
                        @endif

                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                        @endif

                        @if(Request::is('*/participantes'))
                            {!! Form::model($grupo, ['method' => 'POST', 'url' => 'grupousers/salvar'])!!}
                        @else
                            {!! Form::open(['url' => 'grupousers/salvar']) !!}
                        @endif

                        {!! Form::label('nome', "Nome do Grupo") !!}
                        {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'readonly class' => "form-control-plaintext", 'style' => 'margin-bottom:10px', 'value' => "{{ old('nome') }}"]) !!}
                        <input type=hidden id="grupo_id" name="grupo_id" value="{{$grupo->id}}">
                        {!! Form::label('genero', "Gênero do Grupo") !!}
                        {!! Form::input('text', 'genero', null, ['class' => 'form-control', 'autofocus', 'readonly class' => "form-control-plaintext", 'style' => 'margin-bottom:10px', 'value' => "{{ old('genero') }}"]) !!}
                            {!! Form::close() !!}

                            <table class='table'>
                                <th>Participantes</th>
                                <th>Ações</th>
                                <tbody>
                            @foreach($users as $user)
                            @foreach($grupousers as $grupouser)
                                @foreach($inscricoes as $inscricao)
                                    @foreach($eventos as $evento)
                                        @foreach($itemeventos as $itemevento)
                                            @if($inscricao->itemevento_id == $itemevento->id)
                                                @if($itemevento->evento_id == $evento->id)
                                                    @if($grupo->evento_id == $evento->id)
                                                        @if($inscricao->user_id == $user->id)
                                                            @if($grupo->genero == $user->gender)
                                                            @if($grupouser->user_id == $user->id)
                                                            @if($grupouser->grupo_id == $grupo->id)
                                                                @if($inscricao->status == 'Confirmado')

                                                                    <tr>
                                                                        <td>{{$user->name.' - '.$user->born_date}}</td>
                                                                        <td>
                                                                    {!! Form::open(['method' => 'DELETE', 'url' => '/grupousers/'.$grupouser->id, 'style' => 'display: inline']) !!}
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
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endif
                                                    @endif
                                                    @endif
                                                @endif
                                            @endif
                                        @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
