<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    protected $table = 'idiomas';
    protected $fillable = ['nome'];

    public function filmes() { return $this->hasMany(Filme::class); }
}