@extends('layouts.app')
@section('content')
<h3>Editar Categoria</h3>
<form action="{{ route('categorias.update', $categoria) }}" method="POST" class="card p-4">
    @csrf @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $categoria->nome }}" required>
    </div>
    <button type="submit" class="btn btn-success">Atualizar</button>
</form>
@endsection