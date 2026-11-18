<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Categoria;
use App\Models\Idioma;
use App\Models\Nacionalidade;
use App\Models\Ator;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function index()
    {
        $filmes = Filme::with(['categoria', 'idioma', 'nacionalidade', 'atores'])->get();
        return view('filmes.index', compact('filmes'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $idiomas = Idioma::all();
        $nacionalidades = Nacionalidade::all();
        $atores = Ator::all();
        return view('filmes.create', compact('categorias', 'idiomas', 'nacionalidades', 'atores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'ano_lancamento' => 'required|integer|min:1888|max:2100',
            'categoria_id' => 'required|exists:categorias,id',
            'idioma_id' => 'required|exists:idiomas,id',
            'classificacao' => 'required|string|max:20',
            'nacionalidade_id' => 'nullable|exists:nacionalidades,id',
        ]);

        $filme = Filme::create($request->all());
        $filme->atores()->sync($request->input('atores', []));

        return redirect()->route('filmes.index')->with('success', 'Filme cadastrado!');
    }

    public function edit(Filme $filme)
    {
        $categorias = Categoria::all();
        $idiomas = Idioma::all();
        $nacionalidades = Nacionalidade::all();
        $atores = Ator::all();
        return view('filmes.edit', compact('filme', 'categorias', 'idiomas', 'nacionalidades', 'atores'));
    }

    public function update(Request $request, Filme $filme)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'ano_lancamento' => 'required|integer|min:1888|max:2100',
            'categoria_id' => 'required|exists:categorias,id',
            'idioma_id' => 'required|exists:idiomas,id',
            'classificacao' => 'required|string|max:20',
            'nacionalidade_id' => 'nullable|exists:nacionalidades,id',
        ]);

        $filme->update($request->all());
        $filme->atores()->sync($request->input('atores', []));

        return redirect()->route('filmes.index')->with('success', 'Filme atualizado!');
    }

    public function destroy(Filme $filme)
    {
        $filme->delete();
        return redirect()->route('filmes.index')->with('success', 'Filme removido!');
    }
}