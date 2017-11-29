-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2017 a las 20:25:33
-- Versión del servidor: 10.1.24-MariaDB
-- Versión de PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ayudar_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avisos`
--

CREATE TABLE `avisos` (
  `id_aviso` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `id_aviso_tipo` int(11) NOT NULL,
  `id_pedidoayuda` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `avisos`
--

INSERT INTO `avisos` (`id_aviso`, `titulo`, `descripcion`, `imagen`, `id_categoria`, `id_provincia`, `id_aviso_tipo`, `id_pedidoayuda`, `id_usuario`) VALUES
(46, 'Alimentos no perecederos', '10 kilos de fideos, polenta y harina', 'alimentos.jpg', 1, 3, 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avisos_categorias`
--

CREATE TABLE `avisos_categorias` (
  `id_categoria` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `avisos_categorias`
--

INSERT INTO `avisos_categorias` (`id_categoria`, `descripcion`) VALUES
(1, 'Alimentos y Bebidas'),
(2, 'Animales y Mascotas'),
(3, 'Arte y Artesanias'),
(4, 'Belleza y Cuidado Personal'),
(5, 'Cursos y Clases'),
(6, 'Delivery'),
(7, 'Deportes y Fitness'),
(8, 'Electronica y Tecnologia'),
(9, 'Fiestas y Eventos'),
(10, 'Herramientas y Construccion'),
(11, 'Hogar'),
(12, 'Juegos y Juguetes'),
(13, 'Musica y Libros'),
(14, 'Oficios'),
(15, 'Profesionales'),
(16, 'Ropa y Calzado'),
(17, 'Salud'),
(18, 'Servicio Tecnico'),
(19, 'Transporte'),
(20, 'Vehiculos'),
(21, 'Viajes y Turismo'),
(22, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avisos_tipo`
--

CREATE TABLE `avisos_tipo` (
  `id_avisotipo` int(11) NOT NULL,
  `nombre_tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `avisos_tipo`
--

INSERT INTO `avisos_tipo` (`id_avisotipo`, `nombre_tipo`) VALUES
(1, 'Servicio'),
(2, 'Producto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avisos_usuarios`
--

CREATE TABLE `avisos_usuarios` (
  `id_avisosusuarios` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_aviso` int(11) NOT NULL,
  `id_pedidoayuda` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `avisos_usuarios`
--

INSERT INTO `avisos_usuarios` (`id_avisosusuarios`, `id_usuario`, `id_aviso`, `id_pedidoayuda`, `id_estado`) VALUES
(5, 9, 46, 2, 3),
(10, 10, 46, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_avisos`
--

CREATE TABLE `estado_avisos` (
  `id_estadoavisos` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_avisos`
--

INSERT INTO `estado_avisos` (`id_estadoavisos`, `descripcion`) VALUES
(1, 'Pendiente'),
(2, 'Rechazado'),
(3, 'Aceptado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoayuda`
--

CREATE TABLE `pedidoayuda` (
  `id_pedidoayuda` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidoayuda`
--

INSERT INTO `pedidoayuda` (`id_pedidoayuda`, `descripcion`) VALUES
(1, 'pedido'),
(2, 'ayuda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id_provincia` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `nombre`) VALUES
(1, 'Buenos Aires'),
(2, 'Catamarca'),
(3, 'Chaco'),
(4, 'Chubut'),
(5, 'Cordoba'),
(6, 'Corrientes'),
(7, 'Entre Rios'),
(8, 'Formosa'),
(9, 'Jujuy'),
(10, 'La Pampa'),
(11, 'La Rioja'),
(12, 'Mendoza'),
(13, 'Misiones'),
(14, 'Neuquen'),
(15, 'Rio Negro'),
(16, 'Salta'),
(17, 'San Juan'),
(18, 'San Luis'),
(19, 'Santa Cruz'),
(20, 'Santa Fe'),
(21, 'Santiago del Estero'),
(22, 'Tierra del Fuego'),
(23, 'Tucuman');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `documento` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `localidad` varchar(255) NOT NULL,
  `cod_postal` int(11) NOT NULL,
  `id_provincia_fk` int(11) NOT NULL,
  `telefono` bigint(40) NOT NULL,
  `id_usuariotipo_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `password`, `documento`, `direccion`, `localidad`, `cod_postal`, `id_provincia_fk`, `telefono`, `id_usuariotipo_fk`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'admin', 31933140, 'alegria 1185 dto 9', 'haedo', 1704, 1, 46569921, 1),
(9, 'Fernanda', 'Pezzutti', 'ferpezzutti@gmail.com', 'ramosmejia', 31933140, 'Alegria 1185, apt 9', 'Haedo', 1706, 1, 1146505948, 1),
(10, 'Julieta', 'Ramon', 'julietaramon@gmail.com', 'ramona', 35555555, 'rivadavia 2345', 'caballito', 1758, 1, 44445555, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tipo`
--

CREATE TABLE `usuarios_tipo` (
  `id_usuariotipo` int(11) NOT NULL,
  `nombre_tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_tipo`
--

INSERT INTO `usuarios_tipo` (`id_usuariotipo`, `nombre_tipo`) VALUES
(1, 'Usuario'),
(2, 'Entidad Social');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`id_aviso`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_aviso_tipo` (`id_aviso_tipo`),
  ADD KEY `id_pedidoayuda` (`id_pedidoayuda`),
  ADD KEY `id_provincia` (`id_provincia`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `avisos_categorias`
--
ALTER TABLE `avisos_categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `avisos_tipo`
--
ALTER TABLE `avisos_tipo`
  ADD PRIMARY KEY (`id_avisotipo`),
  ADD KEY `id_avisotipo` (`id_avisotipo`);

--
-- Indices de la tabla `avisos_usuarios`
--
ALTER TABLE `avisos_usuarios`
  ADD PRIMARY KEY (`id_avisosusuarios`),
  ADD KEY `id_aviso` (`id_aviso`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `estado` (`id_estado`),
  ADD KEY `id_pedidoayuda` (`id_pedidoayuda`);

--
-- Indices de la tabla `estado_avisos`
--
ALTER TABLE `estado_avisos`
  ADD PRIMARY KEY (`id_estadoavisos`);

--
-- Indices de la tabla `pedidoayuda`
--
ALTER TABLE `pedidoayuda`
  ADD PRIMARY KEY (`id_pedidoayuda`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id_provincia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_usuariotipo_fk` (`id_usuariotipo_fk`),
  ADD KEY `provincias_ibfk_1` (`id_provincia_fk`);

--
-- Indices de la tabla `usuarios_tipo`
--
ALTER TABLE `usuarios_tipo`
  ADD PRIMARY KEY (`id_usuariotipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avisos`
--
ALTER TABLE `avisos`
  MODIFY `id_aviso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `avisos_categorias`
--
ALTER TABLE `avisos_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `avisos_tipo`
--
ALTER TABLE `avisos_tipo`
  MODIFY `id_avisotipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `avisos_usuarios`
--
ALTER TABLE `avisos_usuarios`
  MODIFY `id_avisosusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `estado_avisos`
--
ALTER TABLE `estado_avisos`
  MODIFY `id_estadoavisos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pedidoayuda`
--
ALTER TABLE `pedidoayuda`
  MODIFY `id_pedidoayuda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `usuarios_tipo`
--
ALTER TABLE `usuarios_tipo`
  MODIFY `id_usuariotipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `avisos`
--
ALTER TABLE `avisos`
  ADD CONSTRAINT `avisos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `avisos_categorias` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `avisos_ibfk_2` FOREIGN KEY (`id_aviso_tipo`) REFERENCES `avisos_tipo` (`id_avisotipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `avisos_ibfk_3` FOREIGN KEY (`id_pedidoayuda`) REFERENCES `pedidoayuda` (`id_pedidoayuda`) ON UPDATE CASCADE,
  ADD CONSTRAINT `avisos_ibfk_4` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`) ON UPDATE CASCADE,
  ADD CONSTRAINT `avisos_ibfk_5` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `avisos_usuarios`
--
ALTER TABLE `avisos_usuarios`
  ADD CONSTRAINT `avisos_usuarios_ibfk_1` FOREIGN KEY (`id_aviso`) REFERENCES `avisos` (`id_aviso`) ON UPDATE CASCADE,
  ADD CONSTRAINT `avisos_usuarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `avisos_usuarios_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado_avisos` (`id_estadoavisos`) ON UPDATE CASCADE,
  ADD CONSTRAINT `avisos_usuarios_ibfk_4` FOREIGN KEY (`id_pedidoayuda`) REFERENCES `pedidoayuda` (`id_pedidoayuda`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `provincias_ibfk_1` FOREIGN KEY (`id_provincia_fk`) REFERENCES `provincias` (`id_provincia`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_usuariotipo_fk`) REFERENCES `usuarios_tipo` (`id_usuariotipo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
