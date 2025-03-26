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
      <form class="login-form" id="login-form">
        <!-- Usuario -->
        <div class="input-group">
          <label for="username">Usuario</label>
          <input type="text" id="username" name="username" placeholder="Ingresa tu usuario" required>
        </div>

        <!-- Contraseña -->
        <div class="input-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
        </div>

        <!-- Enlace "Olvidé la contraseña" -->
        <p class="forgot-link">
          <a href="forgot.html">¿Olvidaste tu contraseña?</a>
        </p>

        <!-- Botón de Ingresar con validación -->
        <button type="button" class="btn-login" id="login-button">Ingresar</button>
      </form>

      <!-- Enlace para Registro -->
      <p class="signup-link">
        ¿No tienes cuenta? <a href="register.html">Regístrate aquí</a>
      </p>
    </div>
  </div>

  <!-- Script de Validación -->
  <script>
    document.getElementById("login-button").addEventListener("click", function () {
      // Obtener los valores de los campos
      const username = document.getElementById("username").value.trim();
      const password = document.getElementById("password").value.trim();

      // Validar que los campos no estén vacíos
      if (username === "" || password === "") {
        alert("Por favor, llena todos los campos antes de continuar.");
        return; // Detener la ejecución si faltan campos
      }

      // Redirigir al dashboard si todo está correcto
      window.location.href = "dashboard.html";
    });
  </script>
</body>
</html>
