<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>Paginação</title>
        <style>
           body {
               padding: 20px;
           }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="card text-center">
                <div class="card-header">
                    Tabela de clientes
                </div>
                <div class="card-body">
                    <h5 class="card-title">Exibindo tabela</h5>
                    <table class="table table-hover" id="tabelaClientes">
                        <thead>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Sobrenome</th>
                                <th scope="col">E-mail</th>
                            </thead>
                        <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>amaro</td>
                                    <td>zé</td>
                                    <td>@</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <nav id="paginator">
                        <ul class="pagination">
<!--
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
-->
                        </ul>
                    </nav>
                </div>
            </div>
        <div>

        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
        <script type="text/javascript">

            function getItem(data, i) {
                if ( i == data.current_page)
                    s = ' <li class="page-item active" aria-current="page">';
                else
                    s = '<li class="page-item">';
                    s += '<a class="page-link" href="#">' + i + '</a></li>';
                    return s;
            }
            function montarPaginator(data) {
                for (let i = 1; i < data.total; i++) {
                    s = getItem(data, i);
                }
            }

            function montarLinha(cliente) {
                return '<tr>' +
                    '<td>' + cliente.id + '</td>' +
                    '<td>' + cliente.nome + '</td>' +
                    '<td>' + cliente.sobrenome + '</td>' +
                    '<td>' + cliente.email + '</td>' +
                '</tr>';
            }

            function montarTabela(data) {
                $("#tabelaClientes>tbody>tr").remove();
                for (let i = 0; i < data.data.length; i++) {
                    s = montarLinha(data.data[i]);
                    $("#tabelaClientes>tbody").append(s)
                }
            }

            function carregarClientes(pagina) {
                $.get('/json', {page: pagina}, function(resp) {
                    console.log(resp);
                    montarTabela(resp);
                    montarPaginator(resp);
                });
            }


            $(function() {
                carregarClientes(2);
            });
        </script>
    </body>
</html>
