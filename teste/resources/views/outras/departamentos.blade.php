@extends('layouts.principal')

@section('titulo', 'Departamentos')

@section('conteudo')
<h3>Departamentos</h3>
<ul>
    <li>Computadores</li>
    <li>Eletronicos</li>
    <li>Acessórios</li>
    <li>Roupas</li>
</ul>

@alerta(['titulo'=>'Erro Fatal', 'tipo'=>'info'])   
<p><strong>Erro inesperado</strong></p>
<p>Ocorreu um erro inesperado</p>
@endalerta

@alerta(['titulo'=>'Erro Fatal', 'tipo'=>'error'])   
<p><strong>Erro inesperado</strong></p>
<p>Ocorreu um erro inesperado</p>
@endalerta

@alerta(['titulo'=>'Erro Fatal', 'tipo'=>'success'])   
<p><strong>Erro inesperado</strong></p>
<p>Ocorreu um erro inesperado</p>
@endalerta

@alerta(['titulo'=>'Erro Fatal', 'tipo'=>'warning'])   
<p><strong>Erro inesperado</strong></p>
<p>Ocorreu um erro inesperado</p>
@endalerta

@endsection