@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Atores</h3>
    <a href="{{ route('atores.create') }}" class="btn btn-primary">Novo Ator</a>
</div>
<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Nome Completo</th>
            <th>Nacionalidade</th>
            <th>Nascimento</th>
            <th>Sexo</th>
            <th>Filmes</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($atores as $ator)
        <tr>
            <td>{{ $ator->nome }} {{ $ator->sobrenome }}</td>
            <td>{{ $ator->nacionalidade->nome }}</td>
            <td>{{ date('d/m/Y', strtotime($ator->data_nascimento)) }}</td>
            <td>{{ $ator->sexo }}</td>
            <td>{{ $ator->filmes->pluck('titulo')->join(', ') }}</td>
            <td>
                <a href="{{ route('atores.edit', $ator) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('atores.destroy', $ator) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection