<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    protected $table = 'filmes';
    protected $fillable = ['titulo', 'descricao', 'ano_lancamento', 'categoria_id', 'idioma_id', 'classificacao', 'nacionalidade_id'];

    public function nacionalidade() { return $this->belongsTo(Nacionalidade::class); }
    public function categoria() { return $this->belongsTo(Categoria::class); }
    public function idioma() { return $this->belongsTo(Idioma::class); }
    public function atores() { return $this->belongsToMany(Ator::class, 'ator_filme', 'filme_id', 'ator_id'); }
}