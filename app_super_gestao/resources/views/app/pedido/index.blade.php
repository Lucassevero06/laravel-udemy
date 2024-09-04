@extends('app.layouts.basico')

@section('titulo', 'pedido')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Pedidos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>Cliente</th>
                        <th>#</th>
                        <th>#</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente_id }}</td>
                            <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{$pedido->id}}" method="post" action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">Editar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{--             links de pagination da table--}}
                {{ $pedidos->appends($request)->links() }}
                Exibindo {{ $pedidos->count() }} produtos de {{ $pedidos->total() }}
                <br>
                (de {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})

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
