@extends('layouts.app')
@section('content')
<h3>Novo Filme</h3>
<form action="{{ route('filmes.store') }}" method="POST" class="card p-4">
    @csrf
    <div class="row">
        <div class="col-md-8 mb-3">
            <label class="form-label">Título *</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Ano de Lançamento *</label>
            <input type="number" name="ano_lancamento" class="form-control" min="1888" max="2100" required>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Descrição *</label>
        <textarea name="descricao" class="form-control" rows="3" required></textarea>
    </div>
    <div class="row">
        <div class="col-md-3 mb-3">
            <label class="form-label">Categoria *</label>
            <select name="categoria_id" class="form-select" required>
                <option value="">Selecione...</option>
                @foreach($categorias as $c)
                    <option value="{{ $c->id }}">{{ $c->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label class="form-label">Idioma *</label>
            <select name="idioma_id" class="form-select" required>
                <option value="">Selecione...</option>
                @foreach($idiomas as $i)
                    <option value="{{ $i->id }}">{{ $i->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label class="form-label">Classificação *</label>
            <select name="classificacao" class="form-select" required>
                <option value="Livre">Livre</option>
                <option value="10 anos">10 anos</option>
                <option value="12 anos">12 anos</option>
                <option value="14 anos">14 anos</option>
                <option value="16 anos">16 anos</option>
                <option value="18 anos">18 anos</option>
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label class="form-label">Nacionalidade (Opcional)</label>
            <select name="nacionalidade_id" class="form-select">
                <option value="">Nenhuma</option>
                @foreach($nacionalidades as $n)
                    <option value="{{ $n->id }}">{{ $n->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Atores do Filme (Segure Ctrl para selecionar vários)</label>
        <select name="atores[]" class="form-select" multiple>
            @foreach($atores as $a)
                <option value="{{ $a->id }}">{{ $a->nome }} {{ $a->sobrenome }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Salvar Filme</button>
</form>
@endsection