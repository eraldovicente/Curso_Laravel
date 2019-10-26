<?php

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
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', 'ProdutoControlador@index');

Route::get('/negado', function() {
    return "Acesso negado. Você precisa estar logado para acessar esta página.";
})->name('negado');

Route::get('/negadologin', function() {
    return "Prezado usuário, você precisa ser administrador para acessar este conteúdo.";
})->name('negadologin');

Route::post('/login', function(Request $req) {

    $login_ok = false;
    $admin = false;

    switch($req->input('user')) 
    {
        case 'Eraldo':
            $login_ok = $req->input('passwd') === "senhaeraldo";
            $admin = true;
            break;
        case 'bielCabecao':
            $login_ok = $req->input('passwd') === "senhaCabecao";
            break;
        case 'default':
            $login_ok = false;
    }
    if ($login_ok) {
        $login = [ 'user' => $req->input('user'), 'admin' => $admin ];
        $req->session()->put('login', $login);
        return response("Login OK", 200);
    } else {
        $req->session()->flush();
        return response("Erro no login", 404);
    }
});

Route::get('/logout', function(Request $request) {
    $request->session()->flush();
    return response('Deslogado com sucesso!', 200);
});

// Usar o ARC ou o Postman