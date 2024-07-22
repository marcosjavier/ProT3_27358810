-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-07-2024 a las 12:59:52
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `marcos_javier_ojeda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE IF NOT EXISTS `perfiles` (
  `id_perfiles` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_perfiles`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfiles`, `descripcion`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `perfil_id` int NOT NULL DEFAULT '2',
  `baja` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`id_usuario`),
  KEY `perfil_id` (`perfil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `email`, `pass`, `perfil_id`, `baja`) VALUES
(1, 'marcos', 'ojeda', 'cliente', 'cliente@gmail.com', '$2y$10$bpnUd6DUOFnQPZYnr59dvuecf3aKXggz.v2zPM6W4VH0pslmhgieS', 2, 'NO'),
(2, 'juan', 'perez', 'cliente2', 'juanperez@correo.com', '$2y$10$YfloIsXE.Lq3G.WHRTtFL.NGgKDaTWiBtVwqdVZwl9QZIPpGji4TS', 2, 'NO'),
(3, 'carlos', 'perez', 'cliente3', 'cliente3@correo.com', '$2y$10$iJ6qSwvNzz49MHCT5PVcSeizjXLt5jpxRFAT.6k1n4eilwdeS1k4C', 2, 'NO'),
(4, 'marcos', 'ojeda', 'admin', 'admin@correo.com', '$2y$10$b4UzbKPLkdZjVkl2bjwZP.I78dmKM7VAcRwHoc49ltkTisFcDAOhm', 1, 'NO');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id_perfiles`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
