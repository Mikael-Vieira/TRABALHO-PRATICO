<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    public function index()
    {
        $idiomas = Idioma::all();
        return view('idiomas.index', compact('idiomas'));
    }

    public function create()
    {
        return view('idiomas.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        Idioma::create($request->all());
        return redirect()->route('idiomas.index')->with('success', 'Idioma cadastrado!');
    }

    public function edit(Idioma $idioma)
    {
        return view('idiomas.edit', compact('idioma'));
    }

    public function update(Request $request, Idioma $idioma)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        $idioma->update($request->all());
        return redirect()->route('idiomas.index')->with('success', 'Idioma atualizado!');
    }

    public function destroy(Idioma $idioma)
    {
        $idioma->delete();
        return redirect()->route('idiomas.index')->with('success', 'Idioma removido!');
    }
}