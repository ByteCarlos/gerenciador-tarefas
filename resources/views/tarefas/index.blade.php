<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/header.css')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tarefas.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css')}}">
    @livewireStyles
</head>
<body>
    @if(Auth::check())
        <header>
            <div class="title">Bem-vindo {{$user->name}} 😊</div>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Sair</button>
            </form>
            <livewire:header />
        </header>
        <main>
            <livewire:alert />
            <livewire:list-tasks :tarefas="$tarefas" :categorias="$categorias"/>
        </main>
    @else
        <header>
            <div class="title">Bem-vindo ao seu gerenciador de tarefas 😊</div>
        </header>
        <main>
            <livewire:login />
        </main>
    @endif
    
    <footer>
        <livewire:footer />
    </footer>
    
    <livewire:scripts />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
    <script type="module" src="{{ asset('js/filters.js')}}"></script>
</body>
</html>