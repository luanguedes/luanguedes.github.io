@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Informe as dados do novo dormitório:
                        <a class="pull-right" href="{{ url('dormitorios') }}">Lista de Dormitórios</a>
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
                            {!! Form::model($dormitorio, ['method' => 'PATCH', 'url' => 'dormitorios/'.$dormitorio->id]) !!}

                        @endif
                        {!! Form::open(['url' => 'dormitorios/salvar']) !!}
                        {!! Form::label('number', "Número do dormitório") !!}
                        {!! Form::input('text', 'number', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Número', 'style' => 'margin-bottom:10px', 'value' => "{{ old('number') }}"]) !!}

                        {!! Form::label('gender', "Gênero do dormitório") !!}
                        {!! Form::select('gender', array('' => '', 'Masculino' => 'Masculino', 'Feminino' => 'Feminino', 'Misto' => 'Misto'), null, ['class' => 'form-control', 'style' => 'margin-bottom:10px', 'value' => "{{ old('gender') }}"]) !!}

                        {!! Form::label('bloco', "Bloco") !!}
                        {!! Form::select('bloco', array('Nenhum' => 'Nenhum', 'Bloco 01' => 'Bloco 01', 'Bloco 02' => 'Bloco 02', 'Bloco 03' => 'Bloco 03', 'Bloco 04' => 'Bloco 04', 'Bloco 05' => 'Bloco 05'), null, ['class' => 'form-control', 'style' => 'margin-bottom:10px', 'value' => "{{ old('bloco') }}"]) !!}

                        {!! Form::label('local_id', "Local do Evento") !!}
                        <select name="local_id" id="local_id" class="form-control" style='margin-bottom: 10px'>
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
