<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Nome da tabela
    protected $table = "posts";

    //Campos que são inseridos no banco
    protected $fillable = ['id', 'nome', 'email', 'telefone', 'inicio_tarefa', 'termino_tarefa', 'observacao_tarefa'];
}
