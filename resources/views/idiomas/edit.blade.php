@extends('layouts.app')
@section('content')
<h3>Editar Idioma</h3>
<form action="{{ route('idiomas.update', $idioma) }}" method="POST" class="card p-4">
    @csrf @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $idioma->nome }}" required>
    </div>
    <div class="form-actions">
    <a href="{{ route('idiomas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-success">Atualizar Idioma</button>
</div>
</form>
@endsection