<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Usuarios</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Estilos personalizados */
    body {
      background-color: #333333; /* Fondo gris semi oscuro */
      color: #ffffff; /* Texto blanco */
    }
    .modify-btn {
      background-color: #343a40;
      color: #ffffff;
      border: none;
    }
    .delete-btn {
      background-color: #dc3545;
      color: #ffffff;
      border: none;
    }
    .delete-btn:focus,
    .delete-btn:hover,
    .modify-btn:focus,
    .modify-btn:hover {
      color: #ffffff;
      text-decoration: none;
      box-shadow: none;
    }
    th,
    td {
      color: #ffffff; /* Texto blanco */
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mb-3"> <!-- Columna de 6 para tamaños medianos y grandes -->
        <h1>Lista de Usuarios</h1>
      </div>
      <div class="col-md-6 mb-3 text-right"> <!-- Columna de 6 para tamaños medianos y grandes, alineada a la derecha -->
        <!-- Botón para ir a la página de creación de usuario -->
        <a href="createUser.php" class="btn btn-danger">Nuevo Usuario</a>
      </div>
    </div>
    <table id="usuariosTable" class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Cédula</th>
          <th>Género</th>
          <th>Correo</th>
          <th>ID de Examen</th>
          <th>Actividad Física</th>
          <th>Modificar Usuario</th>
          <th>Eliminar Usuario</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(function() {
      $.ajax({
        url: '../controller/usuarioController.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          var usuarios = data;
          var tableBody = $('#usuariosTable tbody');
          $.each(usuarios, function(index, usuario) {
            var row = '<tr>' +
              '<td>' + usuario.id + '</td>' +
              '<td contenteditable="true">' + usuario.nombre + '</td>' +
              '<td contenteditable="true">' + usuario.apellido + '</td>' +
              '<td contenteditable="true">' + usuario.cedula + '</td>' +
              '<td contenteditable="true">' + usuario.genero + '</td>' +
              '<td contenteditable="true">' + usuario.correo + '</td>' +
              '<td contenteditable="true">' + usuario.examen_id + '</td>' +
              '<td contenteditable="true">' + usuario.actividad_fisica + '</td>' +
              '<td><button class="modify-btn" onclick="modificarUsuario(' + usuario.id + ')">Modificar</button>' +
              '<td><button class="delete-btn" onclick="eliminarUsuario(' + usuario.id + ')">Eliminar</button></td>' +
              '</tr>';
            tableBody.append(row);
          });
        }
      });
    });
    function modificarUsuario(id) {
      var nombre = $('#usuariosTable tbody tr:nth-child(' + id + ') td:nth-child(2)').text();
      var apellido = $('#usuariosTable tbody tr:nth-child(' + id + ') td:nth-child(3)').text();
      var cedula = $('#usuariosTable tbody tr:nth-child(' + id + ') td:nth-child(4)').text();
      var genero = $('#usuariosTable tbody tr:nth-child(' + id + ') td:nth-child(5)').text();
      var correo = $('#usuariosTable tbody tr:nth-child(' + id + ') td:nth-child(6)').text();
      var examen_id = $('#usuariosTable tbody tr:nth-child(' + id + ') td:nth-child(7)').text();
      var actividad_fisica = $('#usuariosTable tbody tr:nth-child(' + id + ') td:nth-child(8)').text();

  $.ajax({
    url: '../controller/usuarioController.php',
    type: 'PUT',
    contentType: 'application/json',
    data: JSON.stringify({
      id: id,
      nombre: nombre,
      apellido: apellido,
      cedula: cedula,
      genero: genero,
      correo: correo,
      examen_id: examen_id,
      actividad_fisica: actividad_fisica
    }),
    success: function(response) {
      console.log('Usuario modificado con éxito');
    },
    error: function(xhr, status, error) {
      console.log('Error al modificar el usuario');
    }
  });
}

function eliminarUsuario(id) {
  $.ajax({
    url: '../controller/usuarioController.php',
    type: 'DELETE',
    contentType: 'application/json',
    data: JSON.stringify({
      id: id
    }),
    success: function(response) {
      console.log('Usuario eliminado con éxito');
    },
    error: function(xhr, status, error) {
      console.log('Error al eliminar el usuario');
    }
  });
}

  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
