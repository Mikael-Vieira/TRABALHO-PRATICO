@extends('layouts.app')
@section('content')
<h3>Editar Ator</h3>
<form action="{{ route('atores.update', $ator) }}" method="POST" class="card p-4">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Nome *</label>
            <input type="text" name="nome" class="form-control" value="{{ $ator->nome }}" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Sobrenome *</label>
            <input type="text" name="sobrenome" class="form-control" value="{{ $ator->sobrenome }}" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Nacionalidade *</label>
            <select name="nacionalidade_id" class="form-select" required>
                @foreach($nacionalidades as $n)
                    <option value="{{ $n->id }}" {{ $ator->nacionalidade_id == $n->id ? 'selected' : '' }}>{{ $n->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Data de Nascimento *</label>
            <input type="date" name="data_nascimento" class="form-control" value="{{ $ator->data_nascimento }}" required>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Sexo *</label>
            <select name="sexo" class="form-select" required>
                <option value="Masculino" {{ $ator->sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Feminino" {{ $ator->sexo == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                <option value="Outro" {{ $ator->sexo == 'Outro' ? 'selected' : '' }}>Outro</option>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Filmes em que atua</label>
        <select name="filmes[]" class="form-select" multiple>
            @foreach($filmes as $f)
                <option value="{{ $f->id }}" {{ $ator->filmes->contains($f->id) ? 'selected' : '' }}>{{ $f->titulo }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Atualizar Ator</button>
</form>
@endsection