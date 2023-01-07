-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2023 a las 17:03:58
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `planificador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audiencia_eventos`
--

CREATE TABLE `audiencia_eventos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_eventos`
--

CREATE TABLE `categorias_eventos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_monumentos`
--

CREATE TABLE `categorias_monumentos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_museos`
--

CREATE TABLE `categorias_museos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_restaurantes`
--

CREATE TABLE `categorias_restaurantes` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id_usuario` int(11) NOT NULL,
  `id_contacto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(8000) DEFAULT NULL,
  `precio` varchar(100) DEFAULT NULL,
  `gratis` tinyint(1) DEFAULT NULL,
  `dias` varchar(30) DEFAULT NULL,
  `dias_ex` varchar(300) DEFAULT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora` varchar(100) DEFAULT NULL,
  `url` varchar(400) DEFAULT NULL,
  `lugar` varchar(200) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `codpostal` varchar(10) DEFAULT NULL,
  `latitud` varchar(30) DEFAULT NULL,
  `longitud` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo_actividad` varchar(15) NOT NULL,
  `id_actividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monumentos`
--

CREATE TABLE `monumentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(8000) DEFAULT NULL,
  `fecha` varchar(30) DEFAULT NULL,
  `autores` varchar(300) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `codpostal` varchar(10) DEFAULT NULL,
  `latitud` varchar(30) DEFAULT NULL,
  `longitud` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `museos`
--

CREATE TABLE `museos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(8000) DEFAULT NULL,
  `desc_sitio` varchar(8000) DEFAULT NULL,
  `horario` varchar(100) DEFAULT NULL,
  `transporte` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `codpostal` varchar(8) DEFAULT NULL,
  `latitud` varchar(30) DEFAULT NULL,
  `longitud` varchar(30) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(500) NOT NULL,
  `hora_act_1` varchar(5) NOT NULL,
  `id_act_1` int(11) NOT NULL,
  `tipo_act_1` varchar(30) NOT NULL,
  `hora_act_2` varchar(5) NOT NULL,
  `id_act_2` int(11) NOT NULL,
  `tipo_act_2` varchar(30) NOT NULL,
  `hora_act_3` varchar(5) NOT NULL,
  `id_act_3` int(11) NOT NULL,
  `tipo_act_3` varchar(30) NOT NULL,
  `hora_act_4` varchar(5) NOT NULL,
  `id_act_4` int(11) NOT NULL,
  `tipo_act_4` varchar(30) NOT NULL,
  `hora_act_5` varchar(5) NOT NULL,
  `id_act_5` int(11) NOT NULL,
  `tipo_act_5` varchar(30) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes_favoritos`
--

CREATE TABLE `planes_favoritos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_plan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendaciones`
--

CREATE TABLE `recomendaciones` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_contacto` int(11) NOT NULL,
  `tipo_actividad` varchar(15) NOT NULL,
  `id_actividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_audiencia_eventos`
--

CREATE TABLE `relacion_audiencia_eventos` (
  `id_audiencia` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_categorias_eventos`
--

CREATE TABLE `relacion_categorias_eventos` (
  `id_categoria` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_categorias_monumentos`
--

CREATE TABLE `relacion_categorias_monumentos` (
  `id_categoria` int(11) NOT NULL,
  `id_monumento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_categorias_museos`
--

CREATE TABLE `relacion_categorias_museos` (
  `id_categoria` int(11) NOT NULL,
  `id_museo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_categorias_restaurantes`
--

CREATE TABLE `relacion_categorias_restaurantes` (
  `id_categoria` int(11) NOT NULL,
  `id_restaurante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_categorias_usuarios`
--

CREATE TABLE `relacion_categorias_usuarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `museos` varchar(50) NOT NULL,
  `monumentos` varchar(50) NOT NULL,
  `restaurantes` varchar(50) NOT NULL,
  `eventos` varchar(50) NOT NULL,
  `audiencias` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_subcategorias_restaurantes`
--

CREATE TABLE `relacion_subcategorias_restaurantes` (
  `id_subcategoria` int(11) NOT NULL,
  `id_restaurante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `descripcion` varchar(8000) DEFAULT NULL,
  `horario` varchar(300) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `codpostal` varchar(10) DEFAULT NULL,
  `latitud` varchar(20) DEFAULT NULL,
  `longitud` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes_imagenes`
--

CREATE TABLE `restaurantes_imagenes` (
  `id` int(11) NOT NULL,
  `id_restaurante` int(11) NOT NULL,
  `imagen` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_solicitante` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias_restaurantes`
--

CREATE TABLE `subcategorias_restaurantes` (
  `id` int(11) NOT NULL,
  `subcategoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tendencias`
--

CREATE TABLE `tendencias` (
  `id` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `tipo_actividad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `rol` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones_eventos`
--

CREATE TABLE `valoraciones_eventos` (
  `id` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `valoracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones_monumentos`
--

CREATE TABLE `valoraciones_monumentos` (
  `id` int(11) NOT NULL,
  `id_monumento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `valoracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones_museos`
--

CREATE TABLE `valoraciones_museos` (
  `id` int(11) NOT NULL,
  `id_museo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `valoracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones_planes`
--

CREATE TABLE `valoraciones_planes` (
  `id` int(11) NOT NULL,
  `id_plan` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `valoracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones_restaurantes`
--

CREATE TABLE `valoraciones_restaurantes` (
  `id` int(11) NOT NULL,
  `id_restaurante` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `valoracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `audiencia_eventos`
--
ALTER TABLE `audiencia_eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_eventos`
--
ALTER TABLE `categorias_eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_monumentos`
--
ALTER TABLE `categorias_monumentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_museos`
--
ALTER TABLE `categorias_museos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_restaurantes`
--
ALTER TABLE `categorias_restaurantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD KEY `contacto` (`id_contacto`),
  ADD KEY `usuario` (`id_usuario`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `monumentos`
--
ALTER TABLE `monumentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `museos`
--
ALTER TABLE `museos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planes_favoritos`
--
ALTER TABLE `planes_favoritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan favorito` (`id_usuario`),
  ADD KEY `plan` (`id_plan`);

--
-- Indices de la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recomendacion usuario` (`id_usuario`),
  ADD KEY `recomendacion contacto` (`id_contacto`);

--
-- Indices de la tabla `relacion_audiencia_eventos`
--
ALTER TABLE `relacion_audiencia_eventos`
  ADD KEY `audiencia eventos` (`id_audiencia`),
  ADD KEY `evento audiencias` (`id_evento`);

--
-- Indices de la tabla `relacion_categorias_eventos`
--
ALTER TABLE `relacion_categorias_eventos`
  ADD KEY `categorias evento` (`id_categoria`),
  ADD KEY `evento categorias` (`id_evento`);

--
-- Indices de la tabla `relacion_categorias_monumentos`
--
ALTER TABLE `relacion_categorias_monumentos`
  ADD KEY `categorias monumento` (`id_categoria`),
  ADD KEY `monumento categorias` (`id_monumento`);

--
-- Indices de la tabla `relacion_categorias_museos`
--
ALTER TABLE `relacion_categorias_museos`
  ADD KEY `categorias museos` (`id_categoria`),
  ADD KEY `museo categoria` (`id_museo`);

--
-- Indices de la tabla `relacion_categorias_restaurantes`
--
ALTER TABLE `relacion_categorias_restaurantes`
  ADD KEY `categorias restaurante` (`id_categoria`),
  ADD KEY `restaurante categoria` (`id_restaurante`);

--
-- Indices de la tabla `relacion_categorias_usuarios`
--
ALTER TABLE `relacion_categorias_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorias usuario` (`id_usuario`);

--
-- Indices de la tabla `relacion_subcategorias_restaurantes`
--
ALTER TABLE `relacion_subcategorias_restaurantes`
  ADD KEY `subcategorias restaurante` (`id_subcategoria`),
  ADD KEY `restaurante subcategoria` (`id_restaurante`);

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `restaurantes_imagenes`
--
ALTER TABLE `restaurantes_imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurante imagen` (`id_restaurante`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD KEY `solicitud usuario` (`id_solicitud`),
  ADD KEY `solicitud contacto` (`id_solicitante`);

--
-- Indices de la tabla `subcategorias_restaurantes`
--
ALTER TABLE `subcategorias_restaurantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tendencias`
--
ALTER TABLE `tendencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `valoraciones_eventos`
--
ALTER TABLE `valoraciones_eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `valoracion evento usuario` (`id_usuario`),
  ADD KEY `valoracion evento` (`id_evento`);

--
-- Indices de la tabla `valoraciones_monumentos`
--
ALTER TABLE `valoraciones_monumentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `valoracion monumento usuario` (`id_usuario`),
  ADD KEY `valoracion monumento` (`id_monumento`);

--
-- Indices de la tabla `valoraciones_museos`
--
ALTER TABLE `valoraciones_museos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_museo` (`id_museo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `valoraciones_planes`
--
ALTER TABLE `valoraciones_planes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `valoracion plan usuario` (`id_usuario`),
  ADD KEY `valoracion plan` (`id_plan`);

--
-- Indices de la tabla `valoraciones_restaurantes`
--
ALTER TABLE `valoraciones_restaurantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `valoracion restaurante usuario` (`id_usuario`),
  ADD KEY `valoracion restaurantes` (`id_restaurante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `audiencia_eventos`
--
ALTER TABLE `audiencia_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias_eventos`
--
ALTER TABLE `categorias_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias_monumentos`
--
ALTER TABLE `categorias_monumentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias_museos`
--
ALTER TABLE `categorias_museos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias_restaurantes`
--
ALTER TABLE `categorias_restaurantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `monumentos`
--
ALTER TABLE `monumentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `museos`
--
ALTER TABLE `museos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planes_favoritos`
--
ALTER TABLE `planes_favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `relacion_categorias_usuarios`
--
ALTER TABLE `relacion_categorias_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `restaurantes_imagenes`
--
ALTER TABLE `restaurantes_imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subcategorias_restaurantes`
--
ALTER TABLE `subcategorias_restaurantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tendencias`
--
ALTER TABLE `tendencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valoraciones_eventos`
--
ALTER TABLE `valoraciones_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valoraciones_monumentos`
--
ALTER TABLE `valoraciones_monumentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valoraciones_museos`
--
ALTER TABLE `valoraciones_museos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valoraciones_planes`
--
ALTER TABLE `valoraciones_planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valoraciones_restaurantes`
--
ALTER TABLE `valoraciones_restaurantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `contacto` FOREIGN KEY (`id_contacto`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `actividad favorita` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `planes_favoritos`
--
ALTER TABLE `planes_favoritos`
  ADD CONSTRAINT `plan` FOREIGN KEY (`id_plan`) REFERENCES `planes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plan favorito` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  ADD CONSTRAINT `recomendacion contacto` FOREIGN KEY (`id_contacto`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recomendacion usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `relacion_audiencia_eventos`
--
ALTER TABLE `relacion_audiencia_eventos`
  ADD CONSTRAINT `audiencia eventos` FOREIGN KEY (`id_audiencia`) REFERENCES `audiencia_eventos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evento audiencias` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `relacion_categorias_eventos`
--
ALTER TABLE `relacion_categorias_eventos`
  ADD CONSTRAINT `categorias evento` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_eventos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evento categorias` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `relacion_categorias_monumentos`
--
ALTER TABLE `relacion_categorias_monumentos`
  ADD CONSTRAINT `categorias monumento` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_monumentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `monumento categorias` FOREIGN KEY (`id_monumento`) REFERENCES `monumentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `relacion_categorias_museos`
--
ALTER TABLE `relacion_categorias_museos`
  ADD CONSTRAINT `categorias museos` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_museos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `museo categoria` FOREIGN KEY (`id_museo`) REFERENCES `museos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `relacion_categorias_restaurantes`
--
ALTER TABLE `relacion_categorias_restaurantes`
  ADD CONSTRAINT `categorias restaurante` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_restaurantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restaurante categoria` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `relacion_categorias_usuarios`
--
ALTER TABLE `relacion_categorias_usuarios`
  ADD CONSTRAINT `categorias usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `relacion_subcategorias_restaurantes`
--
ALTER TABLE `relacion_subcategorias_restaurantes`
  ADD CONSTRAINT `restaurante subcategoria` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subcategorias restaurante` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategorias_restaurantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `restaurantes_imagenes`
--
ALTER TABLE `restaurantes_imagenes`
  ADD CONSTRAINT `restaurante imagen` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitud contacto` FOREIGN KEY (`id_solicitante`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud usuario` FOREIGN KEY (`id_solicitud`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoraciones_eventos`
--
ALTER TABLE `valoraciones_eventos`
  ADD CONSTRAINT `valoracion evento` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valoracion evento usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoraciones_monumentos`
--
ALTER TABLE `valoraciones_monumentos`
  ADD CONSTRAINT `valoracion monumento` FOREIGN KEY (`id_monumento`) REFERENCES `monumentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valoracion monumento usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoraciones_museos`
--
ALTER TABLE `valoraciones_museos`
  ADD CONSTRAINT `museos valoraciones` FOREIGN KEY (`id_museo`) REFERENCES `museos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valoracion museo usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoraciones_planes`
--
ALTER TABLE `valoraciones_planes`
  ADD CONSTRAINT `valoracion plan` FOREIGN KEY (`id_plan`) REFERENCES `planes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valoracion plan usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoraciones_restaurantes`
--
ALTER TABLE `valoraciones_restaurantes`
  ADD CONSTRAINT `valoracion restaurante usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valoracion restaurantes` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
