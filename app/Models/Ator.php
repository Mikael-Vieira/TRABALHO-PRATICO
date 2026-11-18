<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ator extends Model
{
    protected $table = 'atores';
    protected $fillable = ['nome', 'sobrenome', 'nacionalidade_id', 'data_nascimento', 'sexo'];

    public function nacionalidade() { return $this->belongsTo(Nacionalidade::class); }
    public function filmes() { return $this->belongsToMany(Filme::class, 'ator_filme', 'ator_id', 'filme_id'); }
}