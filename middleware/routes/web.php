<?php

/*##########################################################
                                       .
                             /^\     .
                        /\   "V"
                       /__\   I      O  o
                      //..\\  I     .
                      \].`[/  I
                      /l\/j\  (]    .  O
                     /. ~~ ,\/I          .
                     \\L__j^\/I       o
                      \/--v}  I     o   .
                      |    |  I   _________
                      |    |  I c(`       ')o
                      |    l  I   \.     ,/      
                    _/j  L l\_!  _//^---^\\_
                 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*/##########################################################

// use App\Http\Middleware\PrimeiroMiddleware;

// Route::get('/usuarios', 'UsuarioControlador@index')
//     ->middleware(PrimeiroMiddleware::class);

Route::get('/usuarios', 'UsuarioControlador@index')
    ->middleware('primeiro','segundo');

// Route::get('/usuarios', 'UsuarioControlador@index');

Route::get('/terceiro', function() {
  return 'Passou pelo terceiro middleware';
})->middleware('terceiro:Eraldo Vicente,29');