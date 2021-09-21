<?php

use App\Http\Controllers\Clientes;
use App\Http\Controllers\Produtos;
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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/produtos')->group( function(){

    Route::get('/', [Produtos::class, 'index'])->name('produtos.index');

    Route::get('/create', [Produtos::class, 'create'])->name('produtos.create');


});

//rota que redireciona para um controller

Route::prefix('/cliente')->group(function()
{
    Route::get('/index', [Clientes::class, 'index'])->name('clientes.index');

    Route::get('/create', [Clientes::class, 'create'])->name('clientes.create');

    Route::post('/store', [Clientes::class, 'store'])->name('clientes.store');

    Route::get('/edit/{id}', [Clientes::class, 'edit'])->name('clientes.edit');

    Route::put('/update/{id}', [Clientes::class, 'update'])->name('clientes.update');

    Route::get('/show/{id}', [Clientes::class, 'show'])->name('clientes.show');

    Route::delete('/destroy/{id}', [Clientes::class, 'destroy'])->name('clientes.destroy');


});//Agrupamento de rotas


//Route::get('/cliente/index', [Clientes::class, 'index']);

//Route::get('/cliente/index', function ($id) {

/*
Route::get('/teste', function() {
    return "Bruno post";
});//Rota padrão

Route::get('/ola/{nome}', function($nome) {
    if(isset($nome))
        echo "Ola ". $nome . "!";
    else
        echo "Nome vazio";

});//Rota com parametro

Route::get('/novo/{nome?}', function($nome=null) {
    if(isset($nome))
        echo "Ola ". $nome . "!";
    else
        echo "Nenhum nome encontrado";
});//Rota com parametro opcional

Route::get('/novoteste/{nome}/{n}', function($nome, $n) {
    if(isset($nome))
        echo "Ola ". $nome . " ! ". $n;
    else
        echo "Nenhum nome encontrado";
})->where('nome','[A-Za-z]+')
  ->where('n','[~0-9]+');
//Rota com regras de parametros

Route::prefix('/app')->group(function()
{
    Route::get('/', function () {
        return view('app');
    })->name('app.home');

    Route::get('/index', function () {
        return view('index');
    })->name('app.user');

});//Agrupamento de rotas

Route::prefix('/us')->group(
    function(){
        Route::get('/index', function () {
            return view('app');
        })->name('index');

        Route::get('/novo', function () {

        })->name('novo');
    }
);

//Route::redirect('/red', '/app', 301);

Route::get('/red/{n}', function($n){
    if($n == 1)
        return redirect()->route('app.home');
    else if ($n == 2)
        return redirect()->route('app.user');
});

*/
