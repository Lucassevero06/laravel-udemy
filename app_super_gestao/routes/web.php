<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PrincipalController@principal');

Route::get('/sobre-nos', 'SobreNosController@sobreNos');

Route::get('/contato', 'ContatoController@contato');
// nome, categoria, assunto, mensagem

Route::get('/contato/{nome}/{categoria?}/{assunto?}/{mensagem?}',
    function (
        string $nome,
        string $categoria = 'Sem categoria',
        string $assunto = 'Assunto não informado',
        string $mensagem = 'Mensagem não informada') {
    echo
        "Nome: $nome <br>
        Categoria: $categoria <br>
        Assunto: $assunto <br>
        Mensagem: $mensagem";
});
