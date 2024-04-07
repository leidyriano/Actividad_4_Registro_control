CREATE DATABASE gestion_humana;
USE gestion_humana;

CREATE TABLE examenes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL
);

CREATE TABLE actividades_fisicas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL
);

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  apellido VARCHAR(255) NOT NULL,
  cedula VARCHAR(255) NOT NULL,
  genero VARCHAR(255) NOT NULL,
  correo VARCHAR(255) NOT NULL,
  examen_id INT,
  actividad_fisica INT,
  FOREIGN KEY (examen_id) REFERENCES examenes(id),
  FOREIGN KEY (actividad_fisica) REFERENCES actividades_fisicas(id)
);
