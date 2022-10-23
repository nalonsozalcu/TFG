-- 23/10/2022 -- Nuevas tablas para las actividades
--
-- Estructura de tabla para la tabla `audiencia_eventos`
--

CREATE TABLE `audiencia_eventos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_eventos`
--

CREATE TABLE `categorias_eventos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_monumentos`
--

CREATE TABLE `categorias_monumentos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL
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
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(800) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `gratis` tinyint(1) NOT NULL,
  `dias` varchar(30) NOT NULL,
  `dias_ex` varchar(30) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `desc_sitio` varchar(800) NOT NULL,
  `horario` varchar(100) NOT NULL,
  `transporte` varchar(500) NOT NULL,
  `url` varchar(200) NOT NULL,
  `lugar` varchar(200) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `codpostal` varchar(10) NOT NULL,
  `latitud` varchar(15) NOT NULL,
  `longitud` varchar(15) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `categoria` varchar(10) NOT NULL,
  `audiencia` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monumentos`
--

CREATE TABLE `monumentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(800) NOT NULL,
  `fecha` varchar(4) NOT NULL,
  `autores` varchar(100) NOT NULL,
  `horario` varchar(100) NOT NULL,
  `transporte` varchar(500) NOT NULL,
  `url` varchar(200) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `codpostal` varchar(10) NOT NULL,
  `latitud` varchar(15) NOT NULL,
  `longitud` varchar(15) NOT NULL,
  `desc_sitio` varchar(800) NOT NULL,
  `categoria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `museos`
--

CREATE TABLE `museos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(800) DEFAULT NULL,
  `desc_sitio` varchar(800) DEFAULT NULL,
  `horario` varchar(100) DEFAULT NULL,
  `transporte` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `codpostal` varchar(8) NOT NULL,
  `latitud` varchar(15) NOT NULL,
  `longitud` varchar(15) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `categoria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `descripcion` varchar(800) NOT NULL,
  `horario` varchar(50) NOT NULL,
  `url` varchar(200) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `codpostal` varchar(10) NOT NULL,
  `latitud` varchar(15) NOT NULL,
  `longitud` varchar(15) NOT NULL,
  `categoria` varchar(10) NOT NULL,
  `subcategoria` varchar(10) NOT NULL
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
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategorias_restaurantes`
--
ALTER TABLE `subcategorias_restaurantes`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subcategorias_restaurantes`
--
ALTER TABLE `subcategorias_restaurantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `relacion_categorías` ( 
`id_categoria` INT NOT NULL , 
`tipo_categoria` VARCHAR(30) NOT NULL , 
`id_actividad` INT NOT NULL , 
`tipo_actividad` VARCHAR(15) NOT NULL 
) ENGINE = InnoDB;
