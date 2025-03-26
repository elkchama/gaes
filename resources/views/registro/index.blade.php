<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario - CONFER</title>
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
</head>
<body>
    <div class="register-container">
      <div class="register-card">
        <!-- Logo -->
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
        </div>

        <!-- Título -->
        <h1>Registro de Cuenta</h1>

        <!-- Formulario de Registro -->
        <form id="register-form" class="register-form">
          <!-- Nombre Completo -->
          <div class="input-group">
            <label for="fullname">Nombre Completo</label>
            <input type="text" id="fullname" name="fullname" placeholder="Ingresa tu nombre completo" required>
          </div>

          <!-- Correo Electrónico -->
          <div class="input-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
          </div>

          <!-- Fecha de Nacimiento -->
          <div class="input-group">
            <label for="dob">Fecha de Nacimiento</label>
            <input type="date" id="dob" name="dob" required>
          </div>

          <!-- Región -->
          <div class="input-group">
            <label for="region">Región</label>
            <select id="region" name="region" required onchange="updateCities()">
              <option value="">Selecciona tu región</option>
              <option value="Andina">Andina</option>
              <option value="Caribe">Caribe</option>
              <option value="Pacífica">Pacífica</option>
              <option value="Orinoquía">Orinoquía</option>
              <option value="Amazonía">Amazonía</option>
            </select>
          </div>

          <!-- Ciudad -->
          <div class="input-group">
            <label for="city">Ciudad</label>
            <select id="city" name="city" required>
              <option value="">Selecciona tu ciudad</option>
            </select>
          </div>

          <!-- Contraseña -->
          <div class="input-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Crea una contraseña" required>
          </div>

          <!-- Confirmar Contraseña -->
          <div class="input-group">
            <label for="confirm-password">Confirmar Contraseña</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirma tu contraseña" required>
          </div>

          <!-- Botón de Registro con redirección -->
         <!-- Enlace de Registro con redirección -->
          <a href="pestaña1.html" class="btn-register">Registrarse</a>

        </form>

        <!-- Enlace para Iniciar Sesión -->
        <p class="login-link">
          ¿Ya tienes cuenta? <a href="login.html">Inicia sesión aquí</a>
        </p>
      </div>
    </div>

    <script src="review.js"></script>
    <script>
      // Función para actualizar las ciudades basadas en la región seleccionada
      function updateCities() {
        const region = document.getElementById("region").value;
        const citySelect = document.getElementById("city");

        let cities = [];

        // Llenado de ciudades según la región seleccionada
        if (region === "Andina") {
          cities = ["Bogotá", "Medellín", "Cali", "Bucaramanga"];
        } else if (region === "Caribe") {
          cities = ["Barranquilla", "Cartagena", "Santa Marta", "Montería"];
        } else if (region === "Pacífica") {
          cities = ["Cali", "Buenaventura", "Pasto", "Quibdó"];
        } else if (region === "Orinoquía") {
          cities = ["Villavicencio", "Puerto Carreño", "Yopal", "Arauca"];
        } else if (region === "Amazonía") {
          cities = ["Leticia", "Puerto Nariño", "Inírida", "Mitu"];
        }

        // Limpiar el menú de ciudades
        citySelect.innerHTML = '<option value="">Selecciona tu ciudad</option>';

        // Agregar las opciones de ciudad
        cities.forEach(city => {
          const option = document.createElement("option");
          option.value = city;
          option.textContent = city;
          citySelect.appendChild(option);
        });
      }

      // Redirigir al modal de registro exitoso con el nombre del usuario
      document.getElementById("register-button").addEventListener("click", function(event) {
        event.preventDefault(); // Prevenir el comportamiento por defecto del enlace
        const userName = document.getElementById("fullname").value.trim();

        if (userName) {
          // Redirigir a la página de éxito con el nombre del usuario
          window.location.href = `success.html?name=${encodeURIComponent(userName)}`;
        } else {
          alert("Por favor, ingresa tu nombre.");
        }
      });
    </script>
  </body>
  </html>
  </html>
