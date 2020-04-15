@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Informe as dados do novo fornecedor:
                        <a class="pull-right" href="{{ url('fornecedores') }}">Lista de Fornecedores</a>
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
                            {!! Form::model($fornecedor, ['method' => 'PATCH', 'url' => 'fornecedores/'.$fornecedor->id]) !!}
                        @else
                            {!! Form::open(['url' => 'fornecedores/salvar']) !!}
                        @endif

                        {!! Form::label('nomefan', "Nome Fantasia") !!}
                        {!! Form::input('text', 'nomefan', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome Fantasia', 'style' => 'margin-bottom:10px', 'value' => "{{ old('nomefan') }}"]) !!}

                        {!! Form::label('razsoc', "Razão Social") !!}
                        {!! Form::input('text', 'razsoc', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Razão Social', 'style' => 'margin-bottom:10px', 'value' => "{{ old('razsoc') }}"]) !!}

                        {!! Form::label('cnpj', "CNPJ") !!}
                        {!! Form::input('text', 'cnpj', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'CNPJ', 'style' => 'margin-bottom:10px', 'value' => "{{ old('cnpj') }}"]) !!}

                        {!! Form::label('endereco', "Endereço") !!}
                        {!! Form::input('text', 'endereco', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Endereço', 'style' => 'margin-bottom:10px', 'value' => "{{ old('endereco') }}"]) !!}

                        {!! Form::label('numero', "Número") !!}
                        {!! Form::input('text', 'numero', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Numero', 'style' => 'margin-bottom:10px', 'value' => "{{ old('numero') }}"]) !!}

                        {!! Form::label('bairro', "Bairro") !!}
                        {!! Form::input('text', 'bairro', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Bairro', 'style' => 'margin-bottom:10px', 'value' => "{{ old('bairro') }}"]) !!}

                        {!! Form::label('telefone', "Telefone") !!}
                        {!! Form::input('text', 'telefone', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Telefone', 'style' => 'margin-bottom:10px', 'value' => "{{ old('telefone') }}"]) !!}

                        {!! Form::label('tipo', "Tipo") !!}
                        {!! Form::select('tipo', array('Fornecedor' => 'Fornecedor', 'Patrocinador' => 'Patrocinador', 'Ambos' => 'Ambos'), null, ['class' => 'form-control', 'style' => 'margin-bottom:10px', 'value' => "{{ old('tipo') }}"]) !!}

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
