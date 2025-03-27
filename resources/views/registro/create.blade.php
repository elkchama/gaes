<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Crear Nuevo Registro</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1>Crear Nuevo Registro</h1>

    <!-- Mensajes de error -->
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('registros.store') }}" method="POST">
      @csrf

      <!-- ID Usuario -->
      <div class="form-group">
        <label for="id_usuario">ID Usuario</label>
        <input type="number" class="form-control" id="id_usuario" name="id_usuario" value="{{ old('id_usuario') }}" required>
        @error('id_usuario') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <!-- Nombre Completo -->
      <div class="form-group">
        <label for="nombre_completo">Nombre Completo</label>
        <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" value="{{ old('nombre_completo') }}" required>
        @error('nombre_completo') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <!-- Nombre de Usuario -->
      <div class="form-group">
        <label for="nombre_usuario">Nombre de Usuario</label>
        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="{{ old('nombre_usuario') }}" required>
        @error('nombre_usuario') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <!-- Correo Electrónico -->
      <div class="form-group">
        <label for="correo_electronico">Correo Electrónico</label>
        <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" value="{{ old('correo_electronico') }}" required>
        @error('correo_electronico') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <!-- Número de Teléfono -->
      <div class="form-group">
        <label for="numero_telefono">Número de Teléfono</label>
        <input type="text" class="form-control" id="numero_telefono" name="numero_telefono" value="{{ old('numero_telefono') }}" required>
        @error('numero_telefono') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <!-- Contraseña -->
      <div class="form-group">
        <label for="contraseña">Contraseña</label>
        <input type="password" class="form-control" id="contraseña" name="contraseña" required>
        @error('contraseña') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <!-- Confirmar Contraseña -->
      <div class="form-group">
        <label for="contraseña_confirmation">Confirmar Contraseña</label>
        <input type="password" class="form-control" id="contraseña_confirmation" name="contraseña_confirmation" required>
      </div>

      <!-- Género -->
      <div class="form-group">
        <label for="genero">Género</label>
        <select class="form-control" id="genero" name="genero" required>
          <option value="">Seleccione...</option>
          <option value="masculino" {{ old('genero') == 'masculino' ? 'selected' : '' }}>Masculino</option>
          <option value="femenino" {{ old('genero') == 'femenino' ? 'selected' : '' }}>Femenino</option>
          <option value="otro" {{ old('genero') == 'otro' ? 'selected' : '' }}>Otro</option>
        </select>
        @error('genero') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <button type="submit" class="btn btn-primary">Crear Registro</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
