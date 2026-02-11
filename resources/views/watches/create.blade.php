@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white"><h4>Nuevo Reloj</h4></div>
        <div class="card-body">
            
            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('watches.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Marca</label>
                        <input type="text" name="brand" class="form-control" required value="{{ old('brand') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Modelo</label>
                        <input type="text" name="model" class="form-control" required value="{{ old('model') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Precio (€)</label>
                    <input type="number" step="0.01" name="price" class="form-control" required value="{{ old('price') }}">
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Tipo (ID)</label>
                        <select name="type_id" class="form-control">
                            <option value="1">Deportivo</option>
                            <option value="2">Ejecutivo</option>
                            <option value="3">Casual</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Correa (ID)</label>
                        <select name="strap_id" class="form-control">
                            <option value="1">Acero</option>
                            <option value="2">Cuero</option>
                            <option value="3">Plástico</option>
                        </select>
                    </div>
                </div>
                <hr>
                <h5>Características (Features)</h5>
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
                </div>
                <div class="form-group form-check">
                    <input type="hidden" name="water_resistant" value="0">
                    <input type="checkbox" name="water_resistant" class="form-check-input" value="1" id="wr">
                    <label class="form-check-label" for="wr">Resistente al agua</label>
                </div>
                <button type="submit" class="btn btn-success mt-3">Guardar</button>
                <a href="{{ route('watches.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection