<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'fotos';

    protected $fillable = [
        'caminho',
        'postagem_id'
    ];

    // Relacionamento: Uma foto pertence a uma postagem
    public function postagem()
    {
        return $this->belongsTo(Postagem::class, 'postagem_id');
    }
}
