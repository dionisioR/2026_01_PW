<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $table = 'produtos';
    protected $primaryKey = "pro_id";

    public $timestamps = false;

    protected $fillable = [
        'pro_nome',
        'pro_descricao',
        'pro_preco',
        'usu_id'
    ];

    // Relacionamento com a tabela de usuários
    public function usuario(){
        // belongsTo: um produto pertence a um usuário
        // belongsTo(Tabela_Relacionamento, chave estrangeira, chave primária)
        return $this->belongsTo(Usuarios::class, 'usu_id', 'usu_id');   
    }
}
