@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th>#</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a></td>
                                <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <p>Lista de Produtos</p>
                                    <table border="1" style="margin: auto">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($fornecedor->produtos as $key => $produto)
                                                <tr>
                                                    <th>{{ $produto->id }}</th>
                                                    <th>{{ $produto->nome }}</th>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{--             links de pagination da table--}}
                {{ $fornecedores->appends($request)->links() }}
                Exibindo {{ $fornecedores->count() }} fornecedores de {{ $fornecedores->total() }}
                <br>
                (de {{ $fornecedores->firstItem() }} a {{ $fornecedores->lastItem() }})

{{--             exibe o total de itens por pagina--}}
{{--                {{ $fornecedores->count() }} - Total de registros por página--}}
{{--                <br>--}}
{{--             exibe o total de registro consultados--}}
{{--                {{ $fornecedores->total() }} - Total de registros da consulta--}}
{{--                <br>--}}
{{-- exibe o numero do primeiro registor da pagina (não se baseia em id e sim pela ordem de exibição)--}}
{{--                {{ $fornecedores->firstItem() }} - numero do primeiro registro da pagina--}}
{{--                <br>--}}
{{-- exibe o numero do ultimo registor da pagina (não se baseia em id e sim pela ordem de exibição)--}}
{{--                {{ $fornecedores->lastItem() }} - numero do ultimo registro da pagina--}}
            </div>
        </div>

    </div>

@endsection
