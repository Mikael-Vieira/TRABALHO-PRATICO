<?php

namespace App\Http\Controllers;

use App\Models\Nacionalidade;
use Illuminate\Http\Request;

class NacionalidadeController extends Controller
{
    public function index()
    {
        $nacionalidades = Nacionalidade::all();
        return view('nacionalidades.index', compact('nacionalidades'));
    }

    public function create()
    {
        return view('nacionalidades.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        Nacionalidade::create($request->all());
        return redirect()->route('nacionalidades.index')->with('success', 'Nacionalidade cadastrada!');
    }

    public function edit(Nacionalidade $nacionalidade)
    {
        return view('nacionalidades.edit', compact('nacionalidade'));
    }

    public function update(Request $request, Nacionalidade $nacionalidade)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        $nacionalidade->update($request->all());
        return redirect()->route('nacionalidades.index')->with('success', 'Nacionalidade atualizada!');
    }

    public function destroy(Nacionalidade $nacionalidade)
    {
        $nacionalidade->delete();
        return redirect()->route('nacionalidades.index')->with('success', 'Nacionalidade removida!');
    }
}