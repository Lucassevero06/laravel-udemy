@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
                        <th>#</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->peso }}</td>
                            <td>{{ $produto->unidade_id }}</td>
                            <td><a href="">Excluir</a></td>
                            <td><a href="">Editar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{--             links de pagination da table--}}
                {{ $produtos->appends($request)->links() }}
                Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }}
                <br>
                (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})

                {{--             exibe o total de itens por pagina--}}
                {{--                {{ $produtos->count() }} - Total de registros por página--}}
                {{--                <br>--}}
                {{--             exibe o total de registro consultados--}}
                {{--                {{ $produtos->total() }} - Total de registros da consulta--}}
                {{--                <br>--}}
                {{-- exibe o numero do primeiro registor da pagina (não se baseia em id e sim pela ordem de exibição)--}}
                {{--                {{ $produtos->firstItem() }} - numero do primeiro registro da pagina--}}
                {{--                <br>--}}
                {{-- exibe o numero do ultimo registor da pagina (não se baseia em id e sim pela ordem de exibição)--}}
                {{--                {{ $produtos->lastItem() }} - numero do ultimo registro da pagina--}}
            </div>
        </div>

    </div>

@endsection
