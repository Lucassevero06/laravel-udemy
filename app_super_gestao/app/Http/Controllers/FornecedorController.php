<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function view;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '11.111.111/1111-11',
                'ddd' => '11', // São Paulo
                'telefone' => '1111-1111',
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '85', // fortaleza
                'telefone' => '2222-2222',
            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'S',
                'cnpj' => null, // juiz de fora
                'ddd' => '32',
                'telefone' => '3333-3333',
            ]
        ];

        return view('app.fornecedor.index', ['fornecedores' => $fornecedores]);
    }
}
