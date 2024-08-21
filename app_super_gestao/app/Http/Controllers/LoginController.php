<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use function print_r;
use function redirect;
use function view;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = $request->get('erro');
        return view('site.login', ['titulo' => 'Login', 'erro', $erro]);
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

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();

        $usuario = $user->where('email', $email)
                        ->where('password', $password)
                        ->get()
                        ->first();

        if (isset($usuario->name)) {
            echo "Usuario existe";
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }

    }
}
