<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nacionalidade extends Model
{
    protected $table = 'nacionalidades';
    protected $fillable = ['nome'];

    public function atores() { return $this->hasMany(Ator::class); }
    public function filmes() { return $this->hasMany(Filme::class); }
}