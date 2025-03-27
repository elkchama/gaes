<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
  <div class="login-container">
    <div class="login-card">
      <h1>Registro</h1>
      <form method="POST" action="{{ route('usuarios.store') }}">
        @csrf
        <div class="input-group">
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
        </div>
        <div class="input-group">
          <label for="apellido">Apellido</label>
          <input type="text" id="apellido" name="apellido" placeholder="Ingresa tu apellido" required>
        </div>
        <div class="input-group">
          <label for="correo">Correo</label>
          <input type="email" id="correo" name="correo" placeholder="Ingresa tu correo" required>
        </div>
        <div class="input-group">
          <label for="contrasena">Contraseña</label>
          <input type="password" id="contrasena" name="contrasena" placeholder="Ingresa tu contraseña" required>
        </div>
        <!-- Puedes agregar otros campos según tu migración -->
        <button type="submit" class="btn-login">Registrarse</button>
      </form>
    </div>
  </div>
</body>
</html>
