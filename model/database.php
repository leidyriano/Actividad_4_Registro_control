<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'gestion_humana';
    private $username = 'root';
    private $password = '';
    private $conn;
  
    public function connect() {
      $this->conn = null;
  
      try {
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'Conexión exitosa';
      } catch(PDOException $e) {
        echo 'Error de conexión: ' . $e->getMessage();
      }
  
      return $this->conn;
    }
}
//prueba para verificar la conexión
// // Crear una instancia de la clase Database
// $database = new Database();
// $database->connect();

// // Agregar código adicional para mostrar algo en el navegador
// echo '¡Hola desde database.php!';

