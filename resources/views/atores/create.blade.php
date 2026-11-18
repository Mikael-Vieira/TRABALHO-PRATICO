@extends('layouts.app')
@section('content')
<h3>Novo Ator</h3>
<form action="{{ route('atores.store') }}" method="POST" class="card p-4">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Nome *</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Sobrenome *</label>
            <input type="text" name="sobrenome" class="form-control" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Nacionalidade *</label>
            <select name="nacionalidade_id" class="form-select" required>
                <option value="">Selecione...</option>
                @foreach($nacionalidades as $n)
                    <option value="{{ $n->id }}">{{ $n->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Data de Nascimento *</label>
            <input type="date" name="data_nascimento" class="form-control" required>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Sexo *</label>
            <select name="sexo" class="form-select" required>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Outro">Outro</option>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Filmes em que atua (Segure Ctrl para selecionar vários)</label>
        <select name="filmes[]" class="form-select" multiple>
            @foreach($filmes as $f)
                <option value="{{ $f->id }}">{{ $f->titulo }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Salvar Ator</button>
</form>
@endsection