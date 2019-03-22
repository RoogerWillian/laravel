<?php

namespace App\Http\Controllers;
use App\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AutenticacaoController extends Controller
{
    public function home()
    {
        return view("publica");
    }

    public function privada()
    {
        return view("privada");
    }

    public function login()
    {
        return view("autenticacao.login");
    }

    public function logar(Request $request)
    {
        $dados = $request->all();

        $login = $dados['login'];
        $senha = $dados['senha'];
        $usuario = Usuario::where("login", $login)->first();

        if (Auth::check() || ($usuario && Hash::check($senha, $usuario->senha))) {
            Auth::login($usuario);
            return redirect(route("home"));
        } else {
            return redirect(route('login'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route("login"));
    }
}
