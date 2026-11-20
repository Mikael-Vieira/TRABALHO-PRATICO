@extends('layouts.app')

@section('content')

<div class="cine-banner mb-4">
    <span class="cine-label">CATÁLOGO DE CINEMA</span>
    <h1>Explore o universo do cinema</h1>
    <p>Encontre atores, descubra filmes e consulte seus elencos.</p>
</div>

<div class="card mb-4">
    <div class="card-body">

        <h4>Consulta de Atores e Filmes</h4>

        <form method="GET"
              action="{{ route('relatorios.atores_filmes') }}#resultados"
              class="row g-3 align-items-end">

            <div class="col-12 col-md-6 col-xl-4">
                <label for="nome_ator" class="form-label">Nome do ator</label>

                <input type="text"
                       id="nome_ator"
                       name="nome_ator"
                       class="form-control"
                       placeholder="Ex.: Wagner Moura"
                       value="{{ $nomeAtor ?? '' }}">
            </div>

            <div class="col-12 col-md-6 col-xl-4">
                <label for="nome_filme" class="form-label">Nome do filme</label>

                <input type="text"
                       id="nome_filme"
                       name="nome_filme"
                       class="form-control"
                       placeholder="Ex.: Tropa de Elite"
                       value="{{ $nomeFilme ?? '' }}">
            </div>

            <div class="col-12 col-xl-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary flex-grow-1">
                    Pesquisar
                </button>

                <a href="{{ route('relatorios.atores_filmes') }}"
                   class="btn btn-secondary">
                    Limpar
                </a>
            </div>

        </form>
    </div>
</div>

<div class="card" id="resultados">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <h4 class="mb-0">Resultados da pesquisa</h4>

            <span class="resultado-badge">
                {{ $atores->count() }} resultado(s)
            </span>
        </div>

        <div class="table-responsive report-table">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Ator</th>
                        <th>Nacionalidade</th>
                        <th>Filmes em que atua</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($atores as $ator)
                        <tr>
                            <td class="fw-bold">
                                {{ $ator->nome }} {{ $ator->sobrenome }}
                            </td>

                            <td>{{ $ator->nacionalidade->nome }}</td>

                            <td>
                                @forelse($ator->filmes as $filme)
                                    <span class="filme-badge">
                                        {{ $filme->titulo }} ({{ $filme->ano_lancamento }})
                                    </span>
                                @empty
                                    <span class="text-muted">
                                        Nenhum filme vinculado
                                    </span>
                                @endforelse
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-5">
                                <h5>Nenhum resultado encontrado</h5>
                                <p class="text-muted mb-0">
                                    Tente pesquisar por outro ator ou filme.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection