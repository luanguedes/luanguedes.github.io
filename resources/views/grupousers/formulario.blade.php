@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Informe o participante desse grupo:
                        <a class="pull-right" href="{{ url('grupousers') }}">Lista de Grupos</a>
                    </div>

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

                        @if(Request::is('*/incluir'))
                            {!! Form::model($grupo, ['method' => 'POST', 'url' => 'grupousers/salvar'])!!}
                        @else
                            {!! Form::open(['url' => 'grupousers/salvar']) !!}
                        @endif

                        {!! Form::label('nome', "Nome do Grupo") !!}
                        {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'readonly class' => "form-control-plaintext", 'style' => 'margin-bottom:10px', 'value' => "{{ old('nome') }}"]) !!}
                            <input type=hidden id="grupo_id" name="grupo_id" value="{{$grupo->id}}">
                        {!! Form::label('genero', "Gênero do Grupo") !!}
                        {!! Form::input('text', 'genero', null, ['class' => 'form-control', 'autofocus', 'readonly class' => "form-control-plaintext", 'style' => 'margin-bottom:10px', 'value' => "{{ old('genero') }}"]) !!}

                        {!! Form::label('user_id', "Participante") !!}
                        <select name="user_id" id="user_id" class="form-control" style='margin-bottom: 10px'>
                            @foreach($users as $user)
                                @foreach($inscricoes as $inscricao)
                                    @foreach($eventos as $evento)
                                        @foreach($itemeventos as $itemevento)
                                            @if($inscricao->itemevento_id == $itemevento->id)
                                                @if($itemevento->evento_id == $evento->id)
                                                    @if($grupo->evento_id == $evento->id)
                                                        @if($inscricao->user_id == $user->id)
                                                            @if($grupo->genero == $user->gender)
                                                                @if($inscricao->status == 'Confirmado')
                                                                    <option value = "{{$user->id}}">{{$user->name." - ".$user->born_date}}</option>
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
                        </select>

                        {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
