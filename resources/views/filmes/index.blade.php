@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Filmes</h3>
    <a href="{{ route('filmes.create') }}" class="btn btn-primary">Novo Filme</a>
</div>
<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Título</th>
            <th>Ano</th>
            <th>Categoria</th>
            <th>Idioma</th>
            <th>Classificação</th>
            <th>Nacionalidade</th>
            <th>Elenco</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($filmes as $filme)
        <tr>
            <td>{{ $filme->titulo }}</td>
            <td>{{ $filme->ano_lancamento }}</td>
            <td>{{ $filme->categoria->nome ?? '-' }}</td>
            <td>{{ $filme->idioma->nome ?? '-' }}</td>
            <td>{{ $filme->classificacao }}</td>
            <td>{{ $filme->nacionalidade->nome ?? 'Não informada' }}</td>
            <td>{{ $filme->atores->pluck('nome')->join(', ') }}</td>
            <td>
                <a href="{{ route('filmes.edit', $filme) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('filmes.destroy', $filme) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection