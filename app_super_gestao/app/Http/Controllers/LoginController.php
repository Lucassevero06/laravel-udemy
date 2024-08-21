<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use function print_r;
use function view;

class LoginController extends Controller
{
    public function index()
    {
        return view('site.login', ['titulo' => 'Login']);
    }

    public function autenticar(Request $request)
    {

        //regras de validação
        $regras = [
          'usuario' => 'email',
          'senha' => 'required'
        ];

        // mensdagens de feedback
        $feedback = [
            'usuario.email' => 'O campo usuario (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        print_r($request->all());

    }
}
