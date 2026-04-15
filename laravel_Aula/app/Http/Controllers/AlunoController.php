<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class AlunoController extends Controller
{
    public function select()
    {
        echo "<h1>SELECT</h1>";

        // Buscar todos os regitros 
        $alunos = Aluno::all()->toArray();
        // Select * from alunos

        // Ordernar registros por nome
        $alunos = Aluno::orderBy('nome')->get()->toArray();


        // Ordernar registros por nome decrescente
        $alunos = Aluno::orderBy('nome', 'desc')->get()->toArray();

        // Buscar os três primeiros registros
        $alunos = Aluno::limit(3)->get()->toArray();
        // select * from alunos limit 3


        // Burscar os três primeiros registros ordenados por nome
        $alunos = Aluno::orderBy('nome')->limit(3)->get()->toArray();
        // select * from alunos order by nome limit 3

        // Buscar todos os regitros com ID > 5
        $alunos = Aluno::where('id', '>', 5)->get()->toArray();


        // Buscar todos os registros entre 5 e 10
        $alunos = Aluno::whereBetween('id', [5, 10])->get()->toArray();


        // try {
        //     //Buscar um registro pelo Id    
        //     $aluno = Aluno::find(100);
        //     echo "ID: " . $aluno->id . " - Nome: " . $aluno->nome . " Curso: " . $aluno->curso . "<hr>";
        // } catch (\Exception $e) {
        //     echo "Registro não encontrado";
        // }


        // Buscar o primeiro registro que atenda uma condição
        // try {
        //     $aluno = Aluno::where('id', '>', 5)->first()->toArray();
        //     echo "ID: " . $aluno['id'] . " - Nome: " . $aluno['nome'] . " Curso: " . $aluno['curso'] . "<hr>";    


        // } catch (\Exception $e) {
        //     echo "Registro não encontrado";
        // }

        // select count(*) from alunos
        $totalAlunos = Aluno::count();
        echo "Total de alunos: " . $totalAlunos;


        // select avg(id) from alunos
        $mediaId = Aluno::avg('id');
        echo "<br>Média dos IDs: " . $mediaId;

        // select sum(id) from alunos
        $somaId = Aluno::sum('id');
        echo "<br>Soma dos IDs: " . $somaId;

        // select max(id) from alunos
        $maxId = Aluno::max('id');
        echo "<br>Maior ID: " . $maxId;

        // select min(id) from alunos
        $minId = Aluno::min('id');
        echo "<br>Menor ID: " . $minId;


        // echo "<pre>";
        // print_r($alunos);
        // echo "</pre>";

        // foreach ($alunos as $aluno) {
        //     echo "ID: " . $aluno['id'] . " - Nome: " . $aluno['nome'] . " Curso: " . $aluno['curso'] . "<hr>";
        // }
    }

    public function insert()
    {
        echo "<h1>INSERT</h1> <hr>";

        // Inserir um novo registro
        // $aluno = new Aluno();
        // $aluno->nome = "Maria Silva";
        // $aluno->curso = "Engenharia";
        // $aluno->matricula = "124";
        // $aluno->save();

        // Aluno::create([
        //     'nome' => 'João Pereira',
        //     'curso' => 'Medicina',
        //     'matricula' => '125'
        // ]);


        // Inserir vários registros
        Aluno::insert([
            [
                'nome' => 'Ana Martins',
                'curso' => 'Direito',
                'matricula' => '128',
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'nome' => 'Carlos Santos',
                'curso' => 'Arquitetura',
                'matricula' => '129',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    public function update()
    {
        echo "<h1>UPDATE</h1><hr>";

        // try {

        //     // Buscar o registro
        //     $aluno = Aluno::find(100);

        //     //atualizar os dados
        //     $aluno->nome = "Carlos Santos Atualizado";
        //     $aluno->curso = "Arquitetura Atualizado";
        //     $aluno->matricula = "129 Atualizado";
        //     $aluno->save();
        // } catch (\Throwable  $e) {
        //     echo "Ops!!!  Erro";
        // }

        // ----------------------------------------
        // Atualizar vários registros
        //-----------------------------------------
        Aluno::where('id', '>', 5)->update([
            'curso' => 'Curso Atualizado'
        ]);
    }

    public function delete()
    {
        echo "<h1>DELETE</h1> <hr>";
        // $aluno = Aluno::find(28);
        // $aluno->delete();

        // Aluno::where('id', '>', 25)->delete();

        // Aluno::destroy(25);
        // Aluno::destroy([23, 24]);

        // Apaga todos os registros da tabela
        // Aluno::truncate();

    }

    public function sql()
    {
        echo "<h1>SQL </h1><hr>";

        // $alunos = DB::select('SELECT * FROM alunos');

        // foreach ($alunos as $aluno) {
        //     echo "ID: " . $aluno->id . " - Nome: " . $aluno->nome . " Curso: " . $aluno->curso . "<hr>";
        // }

        //--------------------------------------

        // $id = 5;
        // $alunos = DB::select('SELECT * FROM alunos WHERE id = ?', [$id]);
        // foreach ($alunos as $aluno) {
        //     echo "ID: " . $aluno->id . " - Nome: " . $aluno->nome . " Curso: " . $aluno->curso . "<hr>";
        // }

        //--------------------------------------

        // $nome = "A%";
        // $alunos = DB::select('SELECT * FROM alunos WHERE nome LIKE ? order by nome', [$nome]);

        // foreach ($alunos as $aluno) {
        //     echo "ID: " . $aluno->id . " - Nome: " . $aluno->nome . " Curso: " . $aluno->curso . "<hr>";
        // }

        //---------------------------------------
        // DB::insert('INSERT INTO alunos (nome, curso, matricula, created_at, updated_at) VALUES (?, ?, ?, ?, ?)', [
        //     'Teste SQL',
        //     'Curso Teste',
        //     '126',
        //     now(),
        //     now()
        // ]);

        //---------------------------------------
        // $id = 1;
        // DB::update('UPDATE alunos SET curso = ?, updated_at = ? WHERE id = ?', ['Curso Atualizado SQL', now(), $id]);

        //---------------------------------------
        $id = 1;
        DB::delete('DELETE FROM alunos WHERE id = ?', [$id]);


    }
}
