<?
require_once '../controller/usuarioController.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'GET':
    $result = $usuario->read();
    $num = $result->rowCount();

    if ($num > 0) {
      $usuarios_arr = array();
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $usuario_item = array(
          'id' => $id,
          'nombre' => $nombre,
          'apellido' => $apellido,
          'cedula' => $cedula,
          'genero' => $genero,
          'correo' => $correo,
          'examen_id' => $examen_id,
          'actividad_fisica' => $actividad_fisica
        );
        array_push($usuarios_arr, $usuario_item);
      }
      header('Content-Type: application/json');
      echo json_encode($usuarios_arr);
    } else {
      header('Content-Type: application/json');
      echo json_encode(array('message' => 'No se encontraron usuarios'));
    }
    break;
  case 'POST':
    $data = json_decode(file_get_contents("php://input"));

    $usuario->nombre = $data->nombre;
    $usuario->apellido = $data->apellido;
    $usuario->cedula = $data->cedula;
    $usuario->genero = $data->genero;
    $usuario->correo = $data->correo;
    $usuario->examen_id = $data->examen_id;
    $usuario->actividad_fisica = $data->actividad_fisica;

    if ($usuario->create()) {
      echo json_encode(array('message' => 'Usuario creado exitosamente'));
    } else {
      echo json_encode(array('message' => 'No se pudo crear el usuario'));
    }
    break;
  case 'PUT':
    $data = json_decode(file_get_contents("php://input"));

    $usuario->id = $data->id;
    $usuario->nombre = $data->nombre;
    $usuario->apellido = $data->apellido;
    $usuario->cedula = $data->cedula;
    $usuario->genero = $data->genero;
    $usuario->correo = $data->correo;
    $usuario->examen_id = $data->examen_id;
    $usuario->actividad_fisica = $data->actividad_fisica;

    if ($usuario->update()) {
      echo json_encode(array('message' => 'Usuario actualizado exitosamente'));
    } else {
      echo json_encode(array('message' => 'No se pudo actualizar el usuario'));
    }
    break;
  case 'DELETE':
    $data = json_decode(file_get_contents("php://input"));

    $usuario->id = $data->id;

    if ($usuario->delete()) {
      echo json_encode(array('message' => 'Usuario eliminado exitosamente'));
    } else {
      echo json_encode(array('message' => 'No se pudo eliminar el usuario'));
    }
    break;
}

