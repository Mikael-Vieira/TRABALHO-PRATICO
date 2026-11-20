@extends('layouts.app')
@section('content')
<h3>Editar Categoria</h3>
<form action="{{ route('categorias.update', $categoria) }}" method="POST" class="card p-4">
    @csrf @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $categoria->nome }}" required>
    </div>
   <div class="form-actions">
    <a href="{{ route('categorias.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-success">Atualizar Categoria</button>
</div>
</form>
@endsection