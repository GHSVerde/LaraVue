<?php

use \Illuminate\Http\Request;
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
Use App\Artigo;
// Route::view('/', 'site');
Route::get('/', function (Request $req) {

    if (isset($req->busca) && $req->busca != '') {
        $busca = $req->busca;
        $lista = Artigo::listaArtigosSite(3, $busca);
    } else {
        $lista = Artigo::listaArtigosSite(3);
        $busca = "";
    }
    return view('site', compact('lista', 'busca'));
})->name('site');

Route::get('/artigo/{id}/{titulo?}', function($id) {
    $artigo = Artigo::find($id);
    if ($artigo) {
        return view('artigo', compact('artigo'));
    } else {
        return redirect()->route('site'); 
    }
})->name('artigo');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('can:eAutor');

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function() {
    Route::resource('artigos', 'ArtigosController')->middleware('can:eAutor');
    Route::resource('usuarios', 'UsuariosController')->middleware('can:eAdmin');
    Route::resource('autores', 'AutoresController')->middleware('can:eAdmin');
    Route::resource('adm', 'AdminController')->middleware('can:eAdmin');
});
