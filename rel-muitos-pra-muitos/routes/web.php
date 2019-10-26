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

use App\Projeto;
use App\Desenvolvedor;
use App\Alocacao;

Route::get('/desenvolvedor_projetos', function () {
    $desenvolvedores = Desenvolvedor::with('projetos')->get();

    foreach($desenvolvedores as $d) {
        echo "<p>Nome do Desenvolvedor: " . $d->nome . "</p>";
        echo "<p>Cargo: " . $d->cargo . "</p>";
        if (count($d->projetos) > 0) {
            echo "Projetos: <br>";
            echo "<ul>";
            foreach($d->projetos as $p) {
                echo "<li>";
                echo "Nome: " . $p->nome . " | ";
                echo "Horas do projeto: " . $p->estimativa_horas . " | ";
                echo "Horas trabalhadas: " . $p->pivot->horas_semanais . " | ";
                echo "</li>";
            }
        echo "</ul>";
        }
        echo "<hr>";
    }
    // return $desenvolvedores->toJson();
});

Route::get('/projeto_desenvolvedores', function () {
    $projetos = Projeto::with('desenvolvedores')->get();

    foreach($projetos as $proj) {
        echo "<p>Nome do Projeto: " . $proj->nome . "</p>";
        echo "<p>Estimativa: " . $proj->estimativa_horas . "</p>";
        if (count($proj->desenvolvedores) > 0) {
            echo "Desenvolvedores: <br>";
            echo "<ul>";
            foreach($proj->desenvolvedores as $d) {
                echo "<li>";
                echo "Nome do Desenvolvedor: " . $d->nome . " | ";
                echo "Cargo: " . $d->cargo . " | ";
                echo "Horas trabalhadas: " . $d->pivot->horas_semanais . " | ";
                echo "</li>";
            }
        echo "</ul>";
        }
        echo "<hr>";
    }
    // return $projetos->toJson();
});

Route::get('/alocar', function() {
    $proj = Projeto::find(4);
    if (isset($proj)) {
        // $proj->desenvolvedores()->attach(1, ['horas_semanais' => 50 ]);
        $proj->desenvolvedores()->attach([
            1 => ['horas_semanais' => 10],
            2 => ['horas_semanais' => 20],
            3 => ['horas_semanais' => 30]
        ]);
    }
});

Route::get('/desalocar', function() {
    $proj = Projeto::find(4);
    if (isset($proj)) {
        // $proj->desenvolvedores()->attach(1, ['horas_semanais' => 50 ]);
        // $proj->desenvolvedores()->detach([1,2,3]);
        $proj->desenvolvedores()->detach(1);
        $proj->desenvolvedores()->detach(2);
        $proj->desenvolvedores()->detach(3);
    }
});
