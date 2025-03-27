<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario - CONFER</title>
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
</head>
<body>
    <div class="container">
        <div class="title">Registro</div>
        <form action="{{ route('registros.store') }}" method="POST">
            @csrf
            <!-- Si id_usuario se obtiene de la sesión o de otro lado, se puede enviar como hidden -->
            <input type="hidden" name="id_usuario" value="1">
            <div class="user-datails">
                <div class="input-box">
                    <span class="details">Nombre completo</span>
                    <input type="text" name="nombre_completo" placeholder="Indica tu nombre" required>
                </div>
                <div class="input-box">
                    <span class="details">Nombre de usuario</span>
                    <input type="text" name="nombre_usuario" placeholder="Indica tu nombre de usuario" required>
                </div>
                <div class="input-box">
                    <span class="details">Correo electrónico</span>
                    <input type="email" name="correo_electronico" placeholder="Indica tu correo electrónico" required>
                </div>
                <div class="input-box">
                    <span class="details">Número de teléfono</span>
                    <input type="text" name="numero_telefono" placeholder="Indica tu número de teléfono" required>
                </div>
                <div class="input-box">
                    <span class="details">Contraseña</span>
                    <input type="password" name="contraseña" placeholder="Indica tu contraseña" required>
                </div>
                <div class="input-box">
                    <span class="details">Confirmar contraseña</span>
                    <input type="password" name="contraseña_confirmation" placeholder="Confirma tu contraseña" required>
                </div>
            </div>
            <div class="gender-details">
                <input type="radio" name="gender" id="dot-1">
                <input type="radio" name="gender" id="dot-2">
                <input type="radio" name="gender" id="dot-3">
                <span class="gender-title">Genero</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Masculino</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Femenino</span>
                    </label>
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="gender">Prefiero no decirlo </span>
                    </label>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Registrarse">
            </div>
        </form>
    </div>

</body>
</html>
