@extends('layouts.app')
@section('content')
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h4 class="mb-3">Consulta de Atores e Filmes</h4>
        <form method="GET" action="{{ route('relatorios.atores_filmes') }}" class="row g-3">
            <div class="col-md-5">
                <label class="form-label">Filtrar por Nome do Ator</label>
                <input type="text" name="nome_ator" class="form-control" placeholder="Ex: Wagner Moura" value="{{ $nomeAtor ?? '' }}">
            </div>
            <div class="col-md-5">
                <label class="form-label">Filtrar por Nome do Filme</label>
                <input type="text" name="nome_filme" class="form-control" placeholder="Ex: Tropa de Elite" value="{{ $nomeFilme ?? '' }}">
            </div>
            <div class="col-md-2 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                <a href="{{ route('relatorios.atores_filmes') }}" class="btn btn-secondary">Limpar</a>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Ator</th>
                    <th>Nacionalidade</th>
                    <th>Filmes em que Atua</th>
                </tr>
            </thead>
            <tbody>
                @forelse($atores as $ator)
                <tr>
                    <td class="fw-bold">{{ $ator->nome }} {{ $ator->sobrenome }}</td>
                    <td>{{ $ator->nacionalidade->nome }}</td>
                    <td>
                        @if($ator->filmes->count() > 0)
                            <ul class="mb-0">
                                @foreach($ator->filmes as $filme)
                                    <li>{{ $filme->titulo }} ({{ $filme->ano_lancamento }})</li>
                                @endforeach
                            </ul>
                        @else
                            <span class="text-muted">Nenhum filme vinculado</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" class="text-center">Nenhum resultado encontrado para os filtros aplicados.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection