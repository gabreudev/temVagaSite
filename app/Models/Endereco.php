<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'enderecos';

    protected $fillable = ['cidade', 'estado', 'postagem_id'];

    public function postagem()
    {
        return $this->belongsTo(Postagem::class, 'postagem_id');
    }
}
