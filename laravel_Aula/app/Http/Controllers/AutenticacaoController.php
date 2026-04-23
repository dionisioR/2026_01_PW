<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class AutenticacaoController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function loginFormSubmit(Request $request)
    {

        // Validação dos dados de login
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required|min:6',
        ],[
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'senha.required' => 'O campo senha é obrigatório.',
            'senha.min' => 'A senha deve conter no mínimo 6 caracteres.',
        ]);

        $usuario = Usuarios::where('usu_email', $request->email)->first();

        if(!$usuario){
            return redirect()->route("loginForm")->with("error", "Usuário não encontrado.");
        }

    }
}
