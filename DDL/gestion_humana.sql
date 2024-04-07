-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2024 a las 18:15:29
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_humana`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_fisicas`
--

CREATE TABLE `actividades_fisicas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividades_fisicas`
--

INSERT INTO `actividades_fisicas` (`id`, `nombre`) VALUES
(1, 'Sedentarismo'),
(2, 'Activo_saludable');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`id`, `nombre`) VALUES
(1, 'Optemetria'),
(2, 'Viosiometria'),
(3, 'Serologia'),
(4, 'Espirometria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `cedula` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `examen_id` int(11) DEFAULT NULL,
  `actividad_fisica` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `cedula`, `genero`, `correo`, `examen_id`, `actividad_fisica`) VALUES
(1, 'Juan', 'Perez', '12345678', 'Masculino', 'juan.perez@example.com', 1, 1),
(2, 'Maria', 'Gonzalez', '23456789', 'Femenino', 'maria.gonzalez@example.com', 2, 2),
(3, 'Carlos', 'Rodriguez', '34567890', 'Masculino', 'carlos.rodriguez@example.com', 3, 1),
(4, 'Ana', 'Martinez', '45678901', 'Femenino', 'ana.martinez@example.com', 4, 2),
(5, 'Pedro', 'Gomez', '56789012', 'Masculino', 'pedro.gomez@example.com', 1, 1),
(6, 'Laura', 'Lopez', '67890123', 'Femenino', 'laura.lopez@example.com', 2, 2),
(7, 'Luis', 'Hernandez', '78901234', 'Masculino', 'luis.hernandez@example.com', 3, 1),
(8, 'Sofia', 'Torres', '89012345', 'Femenino', 'sofia.torres@example.com', 4, 2),
(9, 'Jorge', 'Morales', '90123456', 'Masculino', 'jorge.morales@example.com', 1, 1),
(10, 'Isabel', 'Ramirez', '01234567', 'Femenino', 'isabel.ramirez@example.com', 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades_fisicas`
--
ALTER TABLE `actividades_fisicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examen_id` (`examen_id`),
  ADD KEY `actividad_fisica` (`actividad_fisica`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades_fisicas`
--
ALTER TABLE `actividades_fisicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`examen_id`) REFERENCES `examenes` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`actividad_fisica`) REFERENCES `actividades_fisicas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
