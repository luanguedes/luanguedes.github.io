@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Informe as dados do novo evento:
                <a class="pull-right" href="{{ url('eventos') }}">Lista de Eventos</a>
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
                        {!! Form::model($evento, ['method' => 'PATCH', 'url' => 'eventos/'.$evento->id]) !!}

                    @endif
                        {!! Form::open(['url' => 'eventos/salvar']) !!}
                        {!! Form::label('nome', "Nome do evento") !!}
                        {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome', 'style' => 'margin-bottom:10px', 'value' => "{{ old('nome') }}"]) !!}

                        {!! Form::label('dataeve', "Data do evento") !!}
                        {!! Form::input('date', 'dataeve', null, ['class' => 'form-control', 'autofocus', 'style' => 'margin-bottom:15px', 'value' => "{{ old('dataeve') }}"]) !!}

                        {!! Form::label('local_id', "Local do Evento") !!}
                        <select name="local_id" id="local_id" class="form-control" style='margin-bottom: 10px' value ="{{ old('local_id') }}">
                            @foreach($locais as $local)
                                @if($local->status == "Ativo")
                                <option value = "{{$local->id}}">{{$local->nome." - ".$local->endereco.", ".$local->numero." - ".$local->bairro}}</option>
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
