<?php

namespace App\Http\Controllers;

use App\Models\Ator;
use App\Models\Nacionalidade;
use App\Models\Filme;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
    $nomeAtor = trim($request->string('nome_ator')->toString());
    $nomeFilme = trim($request->string('nome_filme')->toString());

    $normalizar = fn ($texto) => Str::lower(Str::ascii($texto));

    $atores = Ator::with(['filmes', 'nacionalidade'])->get();

    if ($nomeAtor !== '') {
        $termos = preg_split(
            '/\s+/',
            $normalizar($nomeAtor),
            -1,
            PREG_SPLIT_NO_EMPTY
        );

        $atores = $atores->filter(function ($ator) use ($termos, $normalizar) {
            $nomeCompleto = $normalizar($ator->nome . ' ' . $ator->sobrenome);

            foreach ($termos as $termo) {
                if (!str_contains($nomeCompleto, $termo)) {
                    return false;
                }
            }

            return true;
        });
    }

    if ($nomeFilme !== '') {
        $atores = $atores->filter(function ($ator) use ($nomeFilme, $normalizar) {
            return $ator->filmes->contains(function ($filme) use ($nomeFilme, $normalizar) {
                return str_contains(
                    $normalizar($filme->titulo),
                    $normalizar($nomeFilme)
                );
            });
        });
    }

    return view('relatorios.atores_filmes', compact(
        'atores', 'nomeAtor', 'nomeFilme'
    ));
}
}