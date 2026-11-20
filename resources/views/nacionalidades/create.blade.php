@extends('layouts.app')
@section('content')
<h3>Nova Nacionalidade</h3>
<form action="{{ route('nacionalidades.store') }}" method="POST" class="card p-4">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="form-actions">
    <a href="{{ route('nacionalidades.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-success">Salvar Nacionalidade</button>
</div>
</form>
@endsection