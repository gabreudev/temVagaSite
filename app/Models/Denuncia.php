<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    use HasFactory;

    // Nome da tabela no banco de dados
    protected $table = 'denuncias';

    // Atributos que podem ser preenchidos em massa
    protected $fillable = [
        'usuario_id',
        'postagem_id',
        'data_denuncia',
    ];

    /**
     * Relacionamento com o usuário que fez a denúncia
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    /**
     * Relacionamento com a postagem denunciada
     */
    public function postagem()
    {
        return $this->belongsTo(Postagem::class, 'postagem_id');
    }
}
