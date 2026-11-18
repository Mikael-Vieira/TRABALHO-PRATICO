<?php

namespace App\Http\Controllers;

use App\Models\Ator;
use App\Models\Nacionalidade;
use App\Models\Filme;
use Illuminate\Http\Request;

class AtorController extends Controller
{
    public function index()
    {
        $atores = Ator::with(['nacionalidade', 'filmes'])->get();
        return view('atores.index', compact('atores'));
    }

    public function create()
    {
        $nacionalidades = Nacionalidade::all();
        $filmes = Filme::all();
        return view('atores.create', compact('nacionalidades', 'filmes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'nacionalidade_id' => 'required|exists:nacionalidades,id',
            'data_nascimento' => 'required|date',
            'sexo' => 'required|string',
        ]);

        $ator = Ator::create($request->all());
        $ator->filmes()->sync($request->input('filmes', []));

        return redirect()->route('atores.index')->with('success', 'Ator cadastrado!');
    }

    public function edit(Ator $ator)
    {
        $nacionalidades = Nacionalidade::all();
        $filmes = Filme::all();
        return view('atores.edit', compact('ator', 'nacionalidades', 'filmes'));
    }

    public function update(Request $request, Ator $ator)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'nacionalidade_id' => 'required|exists:nacionalidades,id',
            'data_nascimento' => 'required|date',
            'sexo' => 'required|string',
        ]);

        $ator->update($request->all());
        $ator->filmes()->sync($request->input('filmes', []));

        return redirect()->route('atores.index')->with('success', 'Ator atualizado!');
    }

    public function destroy(Ator $ator)
    {
        $ator->delete();
        return redirect()->route('atores.index')->with('success', 'Ator removido!');
    }

    // Requisito 2.6: Página separada de filtro
    public function relatorio(Request $request)
    {
        $nomeAtor = $request->input('nome_ator');
        $nomeFilme = $request->input('nome_filme');

        $query = Ator::with(['filmes', 'nacionalidade']);

        if ($nomeAtor) {
            $query->where(function ($q) use ($nomeAtor) {
                $q->where('nome', 'like', "%{$nomeAtor}%")
                  ->orWhere('sobrenome', 'like', "%{$nomeAtor}%");
            });
        }

        if ($nomeFilme) {
            $query->whereHas('filmes', function ($q) use ($nomeFilme) {
                $q->where('titulo', 'like', "%{$nomeFilme}%");
            });
        }

        $atores = $query->get();

        return view('relatorios.atores_filmes', compact('atores', 'nomeAtor', 'nomeFilme'));
    }
}