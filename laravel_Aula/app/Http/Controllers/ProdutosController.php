<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function produtoForm()
    {
        return view('produto-cadastrar');
    }

    public function produtoFormSubmit(Request $request){
        $request->validate([
            'nome' => 'required|min:2|max:150',
            'descricao' => 'required|min:5',
            'preco' => 'required|numeric|min:0',
        ],[
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.min' => 'O campo nome deve conter no mínimo 2 caracteres.',
            'nome.max' => 'O campo nome deve conter no máximo 150 caracteres.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'descricao.min' => 'O campo descrição deve conter no mínimo 5 caracteres.',
            'preco.required' => 'O campo preço é obrigatório.',
            'preco.numeric' => 'O campo preço deve ser um número.',
            'preco.min' => 'O campo preço deve ser um valor positivo.',
        ]);

        Produtos::create([
            'pro_nome' => $request->nome,
            'pro_descricao' => $request->descricao,
            'pro_preco' => $request->preco,
            'usu_id'=>session('id'),
        ]);

        return redirect()->route('produtoForm')->with('success', 'Produto cadastrado com sucesso!');
        
    }
}
