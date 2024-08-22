<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use function dd;
use function print_r;
use function redirect;
use function view;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuário ou senha inválidos';
        }

        if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar login';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
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

            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.clientes');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }

    }
}
