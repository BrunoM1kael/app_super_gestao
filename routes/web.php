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
/* 
Route::any('/any' , function(){
    return "Permite todo tipo de acesso http(put,delete,get,post)";
});

Route::match(['get', 'post'], '/match', function(){
    return "Permite apenas acessos definidos";
}); 
*/
/* 
Route::get('/', function () {
    return "Olá, seja bem vindo ao curso";
}); 
*/
// user app\Http\Controllers\PrincipalController
//Route::get('/', [PrincipalController::class, 'principal'])->name('site.index'); Jeito atual de se chamar um controlador
Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@contato')->name('site.contato');

Route::get('/login', function () {
    return 'Login';
})->name('site.login');

Route::prefix('/app')->group(function () {
    Route::get('/clientes', function () {
        return 'clientes';
    })->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');;
    Route::get('/produtos', function () {
        return 'produtos';
    })->name('app.produtos');;
});
/*
Route::name faz todos os nomes começarem com a condição imposta.
 Route::name('app.')->group(function () {
    Route::get('app/clientes', function () {
        return 'clientes';
    })->name('clientes');
    Route::get('app/fornecedores', 'FornecedorController@index')->name('app.fornecedores');;
    Route::get('app/produtos', function () {
        return 'produtos';
    })->name('produtos');;
}); */
/* Route::get('/', function () {
    return redirect()->route('admin.clientes');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.' //as É a chave para o name
], function(){ 
    Route::get('app/clientes', function () {
        return 'clientes';    
    })->name('clientes');
    Route::get('app/fornecedores', 'FornecedorController@index')->name('app.fornecedores');;
    Route::get('app/produtos', function () {
        return 'produtos';
    })->name('produtos');;
});
 */

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');
/* 
Caso caia nessa rota2 será redirecionado para a rota1 
 Route::get('/rota2', function(){
    return redirect()->route('site.rota1');
})->name('site.rota2'); */
//route::redirect('/sobre','/contato');
//route::view('/sobre','welcome');

route::get('/novidades', function () {
    return redirect()->route('app.produtos');
});


//Route::redirect('/rota2','/rota1');


Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.index') . '"> clique aqui</a> para ir para a página inicial';
});
/*
// Para tornar um parametro opcional, basta colocar uma ? ao lado do mesmo ex: {mensagem}Não opcional {mensagem?} Opcional
 Route::get(
    '/contato/{nome}/{categoria_id}',
    function (
        string $nome = "Desconhecido",
        int $categoria_id = 1
    ) {
        echo "Estamos aqui: $nome - $categoria_id";
    }
)->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+'); */

/* verbo http 
get 
post
put
patch
delete
options

 */
