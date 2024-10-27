<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostagensTable extends Migration
{
    public function up()
    {
        Schema::create('postagens', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 150);
            $table->text('descricao');
            $table->decimal('preco', 10, 2);
            $table->date('disponivel_a_partir');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('postagens');
    }
}
