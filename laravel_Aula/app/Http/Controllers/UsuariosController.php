<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UsuariosController extends Controller
{
    // exibir o formulário de cadastro de usuário
    public function usuarioForm()
    {
        return view("usuario-form");
    }

    // validar e processar o formulário de cadastro de usuário
    public function usuarioFormSubmit(Request $request)
    {

        $request->validate([
            "nome" => "required|min:2|max:150",
            "email" => "required|email",
            "senha" => "required|min:6"
        ], [
            "nome.required" => "O campo nome é obrigatório",
            "nome.min" => "O nome deve conter no mínimo 2 caracteres",
            "nome.max" => "O nome deve conter no máximo 150 caracteres",
            "email.required" => "O campo email é obrigatório",
            "email.email" => "Digite um email válido",
            "senha.required" => "O campo senha é obrigatório",
            "senha.min" => "A senha deve conter no mínimo 6 caracteres"
        ]);

        $usuario = new Usuarios();
        $usuario->usu_nome = $request->nome;
        $usuario->usu_email = $request->email;
        $usuario->usu_senha = Crypt::encrypt($request->senha);
        $usuario->save();

        return redirect()->route("usuario-form")->with("success", "Usuário cadastrado com sucesso!");
    }

    // exibir a lista de usuários cadastrados
    public function usuarioLista()
    {

        $usuarios = Usuarios::all();
        return view("usuario-lista-todos", ["usuarios" => $usuarios]);
    }

    // carregar o formulário de edição de usuário
    public function usuarioEdit($id)
    {
        $id = Crypt::decrypt($id);
        $usuario = Usuarios::find($id);
        return view("usuario-edit", ["usuario" => $usuario]);
    }

    // validar e processar o formulário de edição de usuário
    public function usuarioEditSubmit(Request $request) {
       
        $request->validate([
            "nome" => "required|min:2|max:150",
            "email" => "required|email",
            "senha" => "required|min:6"
        ], [
            "nome.required" => "O campo nome é obrigatório",
            "nome.min" => "O nome deve conter no mínimo 2 caracteres",
            "nome.max" => "O nome deve conter no máximo 150 caracteres",
            "email.required" => "O campo email é obrigatório",
            "email.email" => "Digite um email válido",
            "senha.required" => "O campo senha é obrigatório",
            "senha.min" => "A senha deve conter no mínimo 6 caracteres"
        ]);
       
        $usuario = Usuarios::find(Crypt::decrypt($request->id));

        $usuario->usu_nome = $request->nome;
        $usuario->usu_email = $request->email;
        $usuario->usu_senha = Crypt::encrypt($request->senha);
        
        $usuario->update();

        return redirect()->route("usuario-lista")->with("success", "Usuário atualizado com sucesso!");
    }


    public function usuarioDelete($id){
        $usu_id =  Crypt::decrypt($id);
        $usuario = Usuarios::find($usu_id);

        // if(!$usuario){
        //     return redirect()->route("usuario-lista")->with("error", "Usuário não encontrado!");
        // }

        return view("usuario-delete", ["usuario" => $usuario]);
    }



    

    public function usuarioDeleteSubmit($id){
        // aqui deve ser implementada a lógica para deletar o usuário do banco de dados
    }
}
