<h3>Fornecedor</h3>

@php
//    if (empty($variavel)) {} // retorna true se a variavel estiver vazia
@endphp

{{--@dd($fornecedores)--}}

@isset($fornecedores)
    @forelse($fornecedores as $indice => $fornecedor)
        Fornecedor: @{{ $fornecedor['nome'] }} <br>
        Status: @{{ $fornecedor['status'] }} <br>
        CNPJ: @{{ $fornecedor['cnpj'] ?? 'Cnpj não preenchido' }} <br>
        Telefone: (@{{$fornecedor['ddd'] ?? ''}}) {{$fornecedor['telefone'] ?? ''}} <br>
        <hr>
    @empty
        <p>Nenhum fornecedor encontrado</p>
    @endforelse
@endisset
