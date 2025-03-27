<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CONFER</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
  <div class="login-container">
    <div class="login-card">
      <!-- Logo -->
      <div class="logo">
        <img src="{{ asset('img/logo.png') }}" alt="Logo">
      </div>
      <!-- Título -->
      <h1>Iniciar Sesión</h1>
      <!-- Formulario -->
      <form class="login-form" id="login-form" method="POST" action="{{ route('login.process') }}">
        @csrf
        <!-- Campo de Correo -->
        <div class="input-group">
          <label for="correo">Correo</label>
          <input type="email" id="correo" name="correo" placeholder="Ingresa tu correo" required>
        </div>
        <!-- Campo de Contraseña -->
        <div class="input-group">
          <label for="contrasena">Contraseña</label>
          <input type="password" id="contrasena" name="contrasena" placeholder="Ingresa tu contraseña" required>
        </div>
        <!-- Enlace "Olvidé la contraseña" -->

        <!-- Botón de Ingresar -->
        <button type="submit" class="btn-login" id="login-button">Ingresar</button>
      </form>
      <!-- Enlace para Registro -->
      <p class="signup-link">
        ¿No tienes cuenta? <a href="{{ route('registros.create') }}">Regístrate aquí</a>
    </p>
    </div>
  </div>
  <!-- Validación del formulario (opcional) -->
  <script>
    document.getElementById("login-form").addEventListener("submit", function (event) {
      const correo = document.getElementById("correo").value.trim();
      const contrasena = document.getElementById("contrasena").value.trim();
      if (correo === "" || contrasena === "") {
        event.preventDefault();
        alert("Por favor, llena todos los campos antes de continuar.");
      }
    });
  </script>
</body>
</html>
