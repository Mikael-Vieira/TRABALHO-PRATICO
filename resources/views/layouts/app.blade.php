<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Filmes e Atores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('relatorios.atores_filmes') }}">CineDB</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('relatorios.atores_filmes') }}">Pesquisa (Atores/Filmes)</a>
                <a class="nav-link" href="{{ route('atores.index') }}">Atores</a>
                <a class="nav-link" href="{{ route('filmes.index') }}">Filmes</a>
                <a class="nav-link" href="{{ route('nacionalidades.index') }}">Nacionalidades</a>
                <a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a>
                <a class="nav-link" href="{{ route('idiomas.index') }}">Idiomas</a>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>