@extends('layout')
@section('title', 'Editar Reloj')
@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-white"><h4>Editar Reloj: {{ $watch['model'] }}</h4></div>
        <div class="card-body">
            <form action="{{ route('watches.update', $watch['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Marca</label>
                        <input type="text" name="brand" class="form-control" value="{{ $watch['brand'] }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Modelo</label>
                        <input type="text" name="model" class="form-control" value="{{ $watch['model'] }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Precio (€)</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="{{ $watch['price'] }}" required>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Tipo</label>
                        <select name="type_id" class="form-control">
                            <option value="1" {{ $watch['type_id'] == 1 ? 'selected' : '' }}>Deportivo</option>
                            <option value="2" {{ $watch['type_id'] == 2 ? 'selected' : '' }}>Ejecutivo</option>
                            <option value="3" {{ $watch['type_id'] == 3 ? 'selected' : '' }}>Casual</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Correa</label>
                        <select name="strap_id" class="form-control">
                            <option value="1" {{ $watch['strap_id'] == 1 ? 'selected' : '' }}>Acero</option>
                            <option value="2" {{ $watch['strap_id'] == 2 ? 'selected' : '' }}>Cuero</option>
                            <option value="3" {{ $watch['strap_id'] == 3 ? 'selected' : '' }}>Plástico</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning mt-3">Actualizar</button>
                <a href="{{ route('watches.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection