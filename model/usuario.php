<?php
class Usuario {
  private $conn;
  private $table = 'usuarios';

  public $id;
  public $nombre;
  public $apellido;
  public $cedula;
  public $genero;
  public $correo;
  public $examen_id;
  public $actividad_fisica;

  public function __construct($db) {
    $this->conn = $db;
  }

  public function read() {
    $query = 'SELECT * FROM ' . $this->table;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  public function create() {
    $query = 'INSERT INTO ' . $this->table . ' (nombre, apellido, cedula, genero, correo, examen_id, actividad_fisica) VALUES (:nombre, :apellido, :cedula, :genero, :correo, :examen_id, :actividad_fisica)';
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':apellido', $this->apellido);
    $stmt->bindParam(':cedula', $this->cedula);
    $stmt->bindParam(':genero', $this->genero);
    $stmt->bindParam(':correo', $this->correo);
    $stmt->bindParam(':examen_id', $this->examen_id);
    $stmt->bindParam(':actividad_fisica', $this->actividad_fisica);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  public function update() {
    $query = 'UPDATE ' . $this->table . ' SET nombre = :nombre, apellido = :apellido, cedula = :cedula, genero = :genero, correo = :correo, examen_id = :examen_id, actividad_fisica = :actividad_fisica WHERE id = :id';
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':apellido', $this->apellido);
    $stmt->bindParam(':cedula', $this->cedula);
    $stmt->bindParam(':genero', $this->genero);
    $stmt->bindParam(':correo', $this->correo);
    $stmt->bindParam(':examen_id', $this->examen_id);
    $stmt->bindParam(':actividad_fisica', $this->actividad_fisica);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  public function delete() {
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id', $this->id);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }
}

