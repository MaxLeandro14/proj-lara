<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/
Route::post('/setPessoa', 'PessoaController@setPessoa');
Route::get('/pessoa', 'PessoaController@getPessoa');
Route::get('/pessoas', 'PessoaController@getPessoas');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
