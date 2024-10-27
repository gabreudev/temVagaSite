<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    use HasFactory;

    protected $table = 'postagens';

    protected $fillable = [
        'titulo',
        'descricao',
        'preco',
        'disponivel_a_partir',
        'usuario_id'
    ];

    // Relacionamento: Uma postagem pode ter várias fotos
    public function fotos()
    {
        return $this->hasMany(Foto::class, 'postagem_id');
    }

    // Relacionamento: Uma postagem pertence a um usuário
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
