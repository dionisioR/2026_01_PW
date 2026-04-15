<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; 
    protected $primaryKey = 'usu_id';

    public $timestamps = false;

    protected $fillable = [
        'usu_nome',
        'usu_email',
        'usu_senha'
    ];

    // relacionamento
    // um usuário pode ter muitos produtos
    public function produtos(){
        //  $this->hasMany(Modelo_Relacionado::class, 'FK','PK');
        return $this->hasMany(Produtos::class, 'usu_id','usu_id');
    }
}
