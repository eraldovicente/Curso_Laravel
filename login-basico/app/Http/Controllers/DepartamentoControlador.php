<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartamentoControlador extends Controller
{
        public function index() 
        {
            echo "<h4>Lista de Categorias</h4>";
            echo "<ul>";
            echo "<li>Alimentos</li>";
            echo "<li>Eletronicos</li>";
            echo "<li>Móveis</li>";
            echo "<li>Informática</li>";
            echo "</ul>";
            echo "<hr>";

        if (Auth::check()) 
        {
            $user = Auth::user();
            echo "<h4>Você está logado!</h4>";
            echo "<p>Id: " . $user->id . "</p>";
            echo "<p>Nome: " . $user->name . "</p>";
            echo "<p>Email: " . $user->email . "</p>";

        } else {
            
            echo "<h4>Você não está logado!</h4>";
        }
    }
}
