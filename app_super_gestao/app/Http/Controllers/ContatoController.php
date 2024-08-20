<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use function print_r;
use function var_dump;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        return view('site.contato', ['titulo' => 'Contato']);
    }

    public function salvar(Request $request)
    {
        $request->validate([
           'nome' => 'required|min:3|max:40',
           'telefone' => 'required',
           'email' => 'required',
           'motivo_contato' => 'required',
           'mensagem' => 'required|max:2000'
        ]);
        //SiteContato::create($request->all());
    }
}
