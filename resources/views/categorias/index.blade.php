@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Categorias</h3>
    <a href="{{ route('categorias.create') }}" class="btn btn-primary">Nova Categoria</a>
</div>
<table class="table table-bordered bg-white">
    <thead><tr><th>ID</th><th>Nome</th><th>Ações</th></tr></thead>
    <tbody>
        @foreach($categorias as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->nome }}</td>
            <td>
                <a href="{{ route('categorias.edit', $c) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('categorias.destroy', $c) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection