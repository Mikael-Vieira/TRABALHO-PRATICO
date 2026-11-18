@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Idiomas</h3>
    <a href="{{ route('idiomas.create') }}" class="btn btn-primary">Novo Idioma</a>
</div>
<table class="table table-bordered bg-white">
    <thead><tr><th>ID</th><th>Nome</th><th>Ações</th></tr></thead>
    <tbody>
        @foreach($idiomas as $i)
        <tr>
            <td>{{ $i->id }}</td>
            <td>{{ $i->nome }}</td>
            <td>
                <a href="{{ route('idiomas.edit', $i) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('idiomas.destroy', $i) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection