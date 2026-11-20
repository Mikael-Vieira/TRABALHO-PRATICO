@extends('layouts.app')
@section('content')
<h3>Editar Nacionalidade</h3>
<form action="{{ route('nacionalidades.update', $nacionalidade) }}" method="POST" class="card p-4">
    @csrf @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $nacionalidade->nome }}" required>
    </div>
    <div class="form-actions">
    <a href="{{ route('nacionalidades.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-success">Atualizar Nacionalidade</button>
</div>
</form>
@endsection