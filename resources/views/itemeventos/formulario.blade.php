@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Informe as dados do novo item de evento:
                        <a class="pull-right" href="{{ url('itemeventos') }}">Lista de Itens dos Eventos</a>
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

                        @if(Request::is('*/editar'))
                            {!! Form::model($itemevento, ['method' => 'PATCH', 'url' => 'itemeventos/'.$itemevento->id]) !!}

                        @endif
                        {!! Form::open(['url' => 'itemeventos/salvar']) !!}
                        {!! Form::label('nome', "Nome do item do evento") !!}
                        {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome', 'style' => 'margin-bottom:10px', 'value' => "{{ old('nome') }}"]) !!}

                        {!! Form::label('valor', "Valor do item") !!}
                        {!! Form::input('number', 'valor', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Valor', 'style' => 'margin-bottom:10px', 'value' => "{{ old('valor') }}"]) !!}

                        {!! Form::label('evento_id', "Evento") !!}
                        <select name="evento_id" id="evento_id" class="form-control" style='margin-bottom: 10px'>
                            @foreach($eventos as $evento)
                                @if($evento->status =="Ativo")
                                <option value = "{{$evento->id}}">{{$evento->nome." - Data:  ".$evento->dataeve}}</option>
                                @endif
                            @endforeach
                        </select>

                        {!! Form::label('status', "Situação") !!}
                        {!! Form::select('status', array('Ativo' => 'Ativo', 'Inativo' => 'Inativo'), null, ['class' => 'form-control', 'style' => 'margin-bottom:10px', 'value' => "{{ old('status') }}"]) !!}

                        {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
