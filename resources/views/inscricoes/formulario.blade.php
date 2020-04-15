@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Informe as dados para inscrever-se:
                        <a class="pull-right" href="{{ url('inscricoes') }}">Ver Inscrições</a>
                    </div>

                    <div class="panel-body">

                        @if(isset($errors) && count($errors) > 0)
                            <div class = "alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            </div>
                        @endif

                        @php($user = Auth::user())
                        @php($eventos = \App\Evento::get())

                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                        @endif

                        @if(Request::is('*/editar'))
                            {!! Form::model($inscricao, ['method' => 'PATCH', 'url' => 'inscricoes/'.$inscricao->id]) !!}

                        @endif
                        {!! Form::open(['url' => 'inscricoes/salvar']) !!}

                        {!! Form::label('text', "Participante:") !!}
                        {!! Form::select('user_id', array("$user->id" => "$user->name"), null, ['class' => 'form-control', 'autofocus', 'readonly class' => "form-control-plaintext", 'style' => 'margin-bottom:10px', 'value' => "{{ old('user_id') }}"]) !!}

                        {!! Form::label('text', "Item do Evento que irá participar") !!}
                        <select name="itemevento_id" id="itemevento_id" class="form-control" style='margin-bottom: 10px'>
                            @foreach($itemeventos as $itemevento)
                                @foreach($eventos as $evento)
                                    @if($evento->status == "Ativo")
                                    @if($itemevento->status == "Ativo")
                                    @if($itemevento->evento_id == $evento->id)
                                <option value = "{{$itemevento->id}}">{{$evento->nome.' - '.$itemevento->nome.' - Valor:  R$ '.$itemevento->valor}}</option>
                                     @endif
                                     @endif
                                     @endif
                                @endforeach
                            @endforeach
                        </select>

                        {!! Form::label('status', "Situação") !!}
                        {!! Form::select('status', array('Pendente' => 'Pendente'), null, ['class' => 'form-control', 'style' => 'margin-bottom:10px', 'value' => "{{ old('status') }}"]) !!}

                        {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
