<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The Cursilho</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">


    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    The Cursilho
                </a>
            </div>


            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">

                    <li><a href="{{ url('/home') }}"><i class="fa fa-btn fa-home"></i>Página Inicial</a></li>
                    <li><a href="{{ url('/inscricoes/novo') }}"><i class="fa fa-btn fa-plus-circle"></i>Inscrições</a></li>
                    @if (!Auth::guest())
                    @if(Auth::user()->profile == 1)
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: 8px",>
                                Cadastros
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                <h6 class="dropdown-header">Eventos</h6>
                                <a class="dropdown-item" href="{{ url('/eventos') }}">Eventos</a>
                                <a class="dropdown-item" href="{{ url('/itemeventos') }}">Itens dos Eventos</a>
                                <a class="dropdown-item" href="{{ url('/grupos') }}">Grupos</a>
                                <h6 class="dropdown-header">Locais</h6>
                                <a class="dropdown-item" href="{{ url('/locais') }}">Locais</a>
                                <a class="dropdown-item" href="{{ url('/dormitorios') }}">Dormitórios</a>
                                <h6 class="dropdown-header">Compras</h6>
                                <a class="dropdown-item" href="{{ url('/fornecedores') }}">Fornecedores</a>
                                <a class="dropdown-item" href="{{ url('/produtos') }}">Produtos</a>
                            </div>
                        
                        </div>
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: 8px",>
                                    Movimentações
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                    <h6 class="dropdown-header">Contas a Receber</h6>
                                    <a class="dropdown-item" href="{{ url('/recebimentoinscricoes') }}">Recebimento das Inscrições</a>
                                    <h6 class="dropdown-header">Participantes</h6>
                                    <a class="dropdown-item" href="{{ url('/grupousers') }}">Participantes dos Grupos</a>
                                    <h6 class="dropdown-header">Compras</h6>
                                    <a class="dropdown-item" href="{{ url('/compras') }}">Compras de Produtos</a>
                                </div>
                            </div>
                    @endif
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"><i class="fa fa-btn fa-sign-in"></i>Entrar</a></li>
                        <li><a href="{{ url('/register') }}"><i class="fa fa-btn fa-user-plus"></i>Registre-se</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Olá, {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Sair</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
