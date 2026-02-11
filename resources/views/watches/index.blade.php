@extends('layout')

@section('title', 'Listado de Relojes')

@section('content')
<div class="container mt-5">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1>Panel Juan Time</h1>
            <p class="text-muted">Hola, <strong>{{ $user_name }}</strong></p>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('watches.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="model" class="form-control" placeholder="Buscar por modelo..." value="{{ request('model') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
        </div>
    </form>

    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Catálogo</h5>
            <a href="{{ route('watches.create') }}" class="btn btn-light btn-sm text-primary font-weight-bold">+ Nuevo Reloj</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Precio</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($watches as $watch)
                    <tr>
                        <td>{{ $watch['brand'] }}</td>
                        <td>{{ $watch['model'] }}</td>
                        <td class="font-weight-bold">{{ $watch['price'] }} €</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('watches.edit', $watch['id']) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('watches.destroy', $watch['id']) }}" method="POST" onsubmit="return confirm('¿Eliminar {{ $watch['model'] }}?');" style="display:inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Borrar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center p-4">No hay relojes.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection