<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Nuevo Usuario</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Estilos personalizados */
    body {
      background-color: #333333; /* Fondo gris semi oscuro */
      color: #ffffff; /* Texto blanco */
      padding: 20px; /* Espaciado interno */
    }
    .form-container {
      max-width: 600px; /* Ancho máximo del formulario */
      margin: auto; /* Centrar horizontalmente */
      background-color: #555555; /* Fondo gris oscuro para el formulario */
      padding: 30px; /* Espaciado interno */
      border-radius: 10px; /* Bordes redondeados */
    }
    .form-control {
      background-color: #777777; /* Fondo gris medio para los campos de formulario */
      color: #ffffff; /* Texto blanco */
    }
    .btn-submit {
      background-color: #dc3545;
      color: #ffffff;
      border: none;
    }
    .btn-submit:hover {
      background-color: #0056b3; /* Color azul más oscuro al pasar el ratón sobre el botón */
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h1 class="mb-4">Crear Nuevo Usuario</h1>
      <form id="createUserForm">
        <div class="form-group">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
          <label for="apellido">Apellido:</label>
          <input type="text" class="form-control" id="apellido" name="apellido" required>
        </div>
        <div class="form-group">
          <label for="cedula">Cédula:</label>
          <input type="text" class="form-control" id="cedula" name="cedula" required>
        </div>
        <div class="form-group">
          <label for="genero">Género:</label>
          <select class="form-control" id="genero" name="genero" required>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Otro">Otro</option>
          </select>
        </div>
        <div class="form-group">
          <label for="correo">Correo:</label>
          <input type="email" class="form-control" id="correo" name="correo" required>
        </div>
        <div class="form-group">
          <label for="examen_id">ID de Examen:</label>
          <input type="text" class="form-control" id="examen_id" name="examen_id" required>
        </div>
        <div class="form-group">
          <label for="actividad_fisica">Actividad Física:</label>
          <input type="text" class="form-control" id="actividad_fisica" name="actividad_fisica" required>
        </div>
        <button type="submit" class="btn btn-danger btn-submit">Crear Usuario</button>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#createUserForm').submit(function(event) {
        event.preventDefault(); // Evitar el envío por defecto del formulario

        var formData = {
          nombre: $('#nombre').val(),
          apellido: $('#apellido').val(),
          cedula: $('#cedula').val(),
          genero: $('#genero').val(),
          correo: $('#correo').val(),
          examen_id: $('#examen_id').val(),
          actividad_fisica: $('#actividad_fisica').val()
        };

        $.ajax({
            url: '../controller/usuarioController.php',
          type: 'POST',
          contentType: 'application/json',
          data: JSON.stringify(formData),
          success: function(response) {
            alert('Usuario creado exitosamente');
            // Redireccionar a la página de lista de usuarios
            window.location.href = 'usuarios.php';
          },
          error: function(xhr, status, error) {
            alert('Error al crear el usuario');
            console.error(error);
          }
        });
      });
    });
  </script>
</body>
</html>
