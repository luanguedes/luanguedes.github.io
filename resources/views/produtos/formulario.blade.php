@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Informe as dados do novo produto:
                        <a class="pull-right" href="{{ url('produtos') }}">Lista de Produtos</a>
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
                            {!! Form::model($produto, ['method' => 'PATCH', 'url' => 'produtos/'.$produto->id]) !!}
                        @else
                            {!! Form::open(['url' => 'produtos/salvar']) !!}
                        @endif

                        {!! Form::label('nome', "Nome do produto") !!}
                        {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome', 'style' => 'margin-bottom:10px', 'value' => "{{ old('nome') }}"]) !!}

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
