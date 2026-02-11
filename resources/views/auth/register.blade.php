<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Juan Time</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; display: flex; align-items: center; height: 100vh; }
        .register-card { max-width: 400px; width: 100%; margin: auto; border: none; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        .btn-primary { background-color: #0d6efd; border: none; }
        .btn-primary:hover { background-color: #0b5ed7; }
    </style>
</head>
<body>
    <div class="card register-card p-4">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 fw-normal">Registro Juan Time</h1>
            <p class="text-muted">Crea una cuenta de administrador</p>
        </div>

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nombre completo</label>
                <input type="text" name="name" class="form-control" placeholder="Ej. Admin Ibra" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
                <input type="email" name="email" class="form-control" placeholder="nombre@ejemplo.com" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Registrarme</button>
            <div class="text-center">
                <a href="{{ route('login') }}" class="text-decoration-none">¿Ya tienes cuenta? Entra aquí</a>
            </div>
        </form>
    </div>
</body>
</html>