<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = ['nome', 'email', 'senha', 'telefone', 'descricao'];

    public function postagens()
    {
        return $this->hasMany(Postagem::class, 'usuario_id');
    }
}
