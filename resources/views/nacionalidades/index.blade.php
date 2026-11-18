@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Nacionalidades</h3>
    <a href="{{ route('nacionalidades.create') }}" class="btn btn-primary">Nova Nacionalidade</a>
</div>
<table class="table table-bordered bg-white">
    <thead><tr><th>ID</th><th>Nome</th><th>Ações</th></tr></thead>
    <tbody>
        @foreach($nacionalidades as $n)
        <tr>
            <td>{{ $n->id }}</td>
            <td>{{ $n->nome }}</td>
            <td>
                <a href="{{ route('nacionalidades.edit', $n) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('nacionalidades.destroy', $n) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection