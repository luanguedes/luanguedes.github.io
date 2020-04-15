<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



    Route::auth();

    Route::get('/home', 'HomeController@index');

    /**
 * Rotas de Eventos
 */
    Route::get('eventos', 'EventosController@index');
    Route::get('eventos/novo', 'EventosController@novo');
    Route::post('eventos/salvar', 'EventosController@salvar');
    Route::get('eventos/{evento}/editar', 'EventosController@editar');
    Route::patch('eventos/{evento}', 'EventosController@atualizar');
    Route::delete('eventos/{evento}', 'EventosController@deletar');

/**
 * Rotas de Locais
 */
    Route::get('locais', 'LocalsController@index');
    Route::get('locais/novo', 'LocalsController@novo');
    Route::post('locais/salvar', 'LocalsController@salvar');
    Route::get('locais/{local}/editar', 'LocalsController@editar');
    Route::patch('locais/{local}', 'LocalsController@atualizar');
    Route::delete('locais/{local}', 'LocalsController@deletar');

/**
 * Rotas de Dormitorios
 */

    Route::get('dormitorios', 'DormitoriosController@index');
    Route::get('dormitorios/novo', 'DormitoriosController@novo');
    Route::post('dormitorios/salvar', 'DormitoriosController@salvar');
    Route::get('dormitorios/{dormitorio}/editar', 'DormitoriosController@editar');
    Route::patch('dormitorios/{dormitorio}', 'DormitoriosController@atualizar');
    Route::delete('dormitorios/{dormitorio}', 'DormitoriosController@deletar');


/**
* Rotas de Produtos
*/

    Route::get('produtos', 'ProdutosController@index');
    Route::get('produtos/novo', 'ProdutosController@novo');
    Route::post('produtos/salvar', 'ProdutosController@salvar');
    Route::get('produtos/{produto}/editar', 'ProdutosController@editar');
    Route::patch('produtos/{produto}', 'ProdutosController@atualizar');
    Route::delete('produtos/{produto}', 'ProdutosController@deletar');

/**
 * Rotas de Fornecedores
 */

    Route::get('fornecedores', 'FornecedoresController@index');
    Route::get('fornecedores/novo', 'FornecedoresController@novo');
    Route::post('fornecedores/salvar', 'FornecedoresController@salvar');
    Route::get('fornecedores/{fornecedor}/editar', 'FornecedoresController@editar');
    Route::patch('fornecedores/{fornecedor}', 'FornecedoresController@atualizar');
    Route::delete('fornecedores/{fornecedor}', 'FornecedoresController@deletar');


/**
 * Rotas de Item dos Eventos
 */

    Route::get('itemeventos', 'ItemEventosController@index');
    Route::get('itemeventos/novo', 'ItemEventosController@novo');
    Route::post('itemeventos/salvar', 'ItemEventosController@salvar');
    Route::get('itemeventos/{itemevento}/editar', 'ItemEventosController@editar');
    Route::patch('itemeventos/{itemevento}', 'ItemEventosController@atualizar');
    Route::delete('itemeventos/{itemevento}', 'ItemEventosController@deletar');

/**
 * Rotas de Incricoes
 */

    Route::get('inscricoes/novo', 'InscricoesController@novo');
    Route::get('inscricoes', 'InscricoesController@index');
    Route::post('inscricoes/salvar', 'InscricoesController@salvar');
    Route::get('inscricoes/{inscricao}/editar', 'InscricoesController@editar');
    Route::patch('inscricoes/{inscricao}', 'InscricoesController@atualizar');
    Route::delete('inscricoes/{inscricao}', 'InscricoesController@deletar');

/**
 * Rotas de Recebimento das Inscrições
 */

    Route::get('recebimentoinscricoes', 'RecebimentoInscricoesController@index');
    Route::get('recebimentoinscricoes/novo', 'RecebimentoInscricoesController@novo');
    Route::post('recebimentoinscricoes/salvar', 'RecebimentoInscricoesController@salvar');
    Route::post('recebimentoinscricoes/{inscricao}/confirmar', 'RecebimentoInscricoesController@confirmar');
    Route::patch('recebimentoinscricoes/{inscricao}', 'RecebimentoInscricoesController@atualizar');
    Route::delete('recebimentoinscricoes/{recebimentoinscricoe}', 'RecebimentoInscricoesController@deletar');

/**
 * Rotas de Caixa
 */

    Route::get('caixa', 'RecebimentoInscricoesController@index');


/**
 * Rotas de Grupos
 */

    Route::get('grupos', 'GruposController@index');
    Route::get('grupos/novo', 'GruposController@novo');
    Route::post('grupos/salvar', 'GruposController@salvar');
    Route::get('grupos/{grupo}/editar', 'GruposController@editar');
    Route::post('grupos/{grupo}/confirmar', 'GruposController@confirmar');
    Route::patch('grupos/{grupo}', 'GruposController@atualizar');
    Route::delete('grupos/{grupo}', 'GruposController@deletar');


/**
 * Rotas de Usuarios dos Grupos
 */

    Route::get('grupousers', 'GrupoUsersController@index');
    Route::post('grupousers', 'GrupoUsersController@index');
    Route::get('grupousers/novo', 'GrupoUsersController@novo');
    Route::post('grupousers/salvar', 'GrupoUsersController@salvar');
    Route::post('grupousers/{grupo}/confirmar', 'GrupoUsersController@confirmar');
    Route::get('grupousers/{grupo}/incluir', 'GrupoUsersController@incluir');
    Route::post('grupousers/{grupo}/incluir', 'GrupoUsersController@incluir');
    Route::get('grupousers/{grupo}/participantes', 'GrupoUsersController@visualizar');
    Route::delete('grupousers/{grupouser}', 'GrupoUsersController@deletar');

/**
 * Rotas de Compras
 */

    Route::get('compras/novo', 'ComprasController@novo');
    Route::get('compras', 'ComprasController@index');
    Route::post('compras/salvar', 'ComprasController@salvar');
    Route::get('compras/{compra}/editar', 'ComprasController@editar');
    Route::patch('compras/{compra}', 'ComprasController@atualizar');
    Route::delete('compras/{compra}', 'ComprasController@deletar');


Route::get('/', function () {
    return view('welcome');
});

