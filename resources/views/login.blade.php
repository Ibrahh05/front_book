@extends('layout')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">Inicia Sesión</div>
                <div class="card-body">
                    
                    @if($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif

                    <form action="{{ route('login.submit') }}" method="POST">
                        @csrf 

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required placeholder="admin@juan.com">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control" required placeholder="123456">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection