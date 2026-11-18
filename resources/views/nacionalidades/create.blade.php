@extends('layouts.app')
@section('content')
<h3>Nova Nacionalidade</h3>
<form action="{{ route('nacionalidades.store') }}" method="POST" class="card p-4">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
</form>
@endsection