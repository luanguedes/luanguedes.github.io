@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Informe as dados da compra:
                        <a class="pull-right" href="{{ url('compras') }}">Ver Compras</a>
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
                            {!! Form::model($compra, ['method' => 'PATCH', 'url' => 'compras/'.$compra->id]) !!}

                        @endif
                        {!! Form::open(['url' => 'compras/salvar']) !!}

                        {!! Form::label('text', "Fornecedor") !!}
                        <select name="fornecedor_id" id="fornecedor_id" class="form-control" style='margin-bottom: 10px'>
                            @foreach($fornecedores as $fornecedor)   
                                @if($fornecedor->status == "Ativo")
                                <option value = "{{$fornecedor->id}}">{{$fornecedor->nomefan.' - '.$fornecedor->razsoc.' - CPNJ: '.$fornecedor->cnpj}}</option>
                                @endif
                            @endforeach
                        </select>

                        {!! Form::label('text', "Produto") !!}
                        <select name="produto_id" id="produto_id" class="form-control" style='margin-bottom: 10px'>
                            @foreach($produtos as $produto)
                                @if($produto->status == "Ativo")
                                <option value = "{{$produto->id}}">{{$produto->nome}}</option>
                                @endif
                            @endforeach
                        </select>

                        {!! Form::label('valunitario', "Valor Unitário") !!}
                        {!! Form::input('number', 'valunitario', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Valor Unitário', 'step' => '0.01', 'style' => 'margin-bottom:10px', 'value' => "{{ old('valunitario') }}"]) !!}

                        {!! Form::label('qtde', "Quantidade") !!}
                        {!! Form::input('number', 'qtde', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Quantidade', 'style' => 'margin-bottom:10px', 'value' => "{{ old('qtde') }}"]) !!}

                        {!! Form::label('status', "Situação") !!}
                        {!! Form::select('status', array('Compra' => 'Compra', 'Ajuste de Estoque' => 'Ajuste de Estoque'), null, ['class' => 'form-control', 'style' => 'margin-bottom:10px', 'value' => "{{ old('status') }}"]) !!}

                        {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
