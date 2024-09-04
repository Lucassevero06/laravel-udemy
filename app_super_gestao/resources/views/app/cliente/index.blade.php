@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>#</th>
                        <th>#</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            <td><a href="{{ route('produto.show', ['produto' => $cliente->id]) }}">Vizualizar</a></td>
                            <td>
                                <form id="form_{{$cliente->id}}" method="post" action="{{ route('produto.destroy', ['produto' => $cliente->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{ route('produto.edit', ['produto' => $cliente->id]) }}">Editar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{--             links de pagination da table--}}
                {{ $clientes->appends($request)->links() }}
                Exibindo {{ $clientes->count() }} produtos de {{ $clientes->total() }}
                <br>
                (de {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})

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
