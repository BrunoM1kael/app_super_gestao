<?php

use App\Http\Controllers\ProdutoController;
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
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

Route::get('/login/{erro?}' , 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao:padrao')->prefix('/app')->group(function () {
    Route::get('/home', 'HomeController@index')->name('app.home');
    
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    //produtos
    Route::resource('produto', 'ProdutoController');
    Route::resource('cliente', 'ClienteController');
    Route::resource('pedido', 'PedidoController');
    /* Route::resource('pedido-produto', 'PedidoProdutoController'); */
    Route::get('pedido-produto/create/{pedido}', 'PedidoProdutoController@create')->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', 'PedidoProdutoController@store')->name('pedido-produto.store');
    Route::delete('pedido-produto.destroy/{pedidoProduto}/{pedido_id}', 'PedidoProdutoController@destroy')->name('pedido-produto.destroy');


    Route::resource('produto-detalhe', 'ProdutoDetalheController');
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
