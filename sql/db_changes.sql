-- 23/10/2022 -- Nuevas tablas para las actividades
--
-- Estructura de tabla para la tabla `audiencia_eventos`
--

CREATE TABLE `audiencia_eventos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
-- Volcado de datos para la tabla `categorias_museos`
--

INSERT INTO `audiencia_eventos` (`id`, `tipo`) VALUES
(1, 'Familias'),
(2, 'Mujeres'),
(3, 'Mayores'),
(4, 'Niños'),
(5, 'Jovenes'),
(6, 'EstudianteseInvestigadores'),
(7, 'EmpresariosYComerciantes');

--
--
-- Estructura de tabla para la tabla `categorias_eventos`
--

CREATE TABLE `categorias_eventos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
-- Volcado de datos para la tabla `categorias_museos`
--

INSERT INTO `categorias_eventos` (`id`, `categoria`) VALUES
(1, 'ActividadesDeportivas'),
(2, 'ActividadesEscolares'),
(3, 'ActividadesInfantiles'),
(4, 'ActosReligiosos'),
(5, 'Campamentos'),
(6, 'Carnavales'),
(7, 'Circos'),
(8, 'ConmemoracionesHomenajes'),
(9, 'Conciertos'),
(10, 'ConferenciasColoquios'),
(11, 'CongresosJornadas'),
(12, 'CorridasToros'),
(13, 'CuentacuentosTíteresMarionetas'),
(14, 'CursosTalleres'),
(15, 'DanzaBallet'),
(16, 'ExpectáculosHumorMagia'),
(17, 'ExcursionesViajes'),
(18, 'Exposiciones'),
(19, 'FeriasMuestras'),
(20, 'FiestasActividadesCalle'),
(21, 'ItinerariosOtrasActividadesAmbientales'),
(22, 'ObrasTeatro'),
(23, 'Ópera'),
(24, 'Películas'),
(25, 'PerfomancesEspectáculosAudiovisuales'),
(26, 'RecitalesPresentacionesActosLiterarios'),
(27, 'VeranosVilla'),
(28, 'VisitasGuiadasTurísticas'),
(29, 'Zarzuelas');

--
-- Estructura de tabla para la tabla `categorias_monumentos`
--

CREATE TABLE `categorias_monumentos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
-- Volcado de datos para la tabla `categorias_monumentos`
--

INSERT INTO `categorias_monumentos` (`id`, `categoria`) VALUES
(1, 'Escultura conceptual o abstracta'),
(2, 'Grupo Escultórico'),
(3, 'Estatua'),
(4, 'Elemento conmemorativo, Lápida'),
(5, 'Puente, construcción civil'),
(6, 'Fuente, Estanque, Lámina de agua'),
(7, 'Elemento de ornamentación'),
(8, 'Edificación singular'),
(9, 'Puerta, Arco triunfal');

--
--
-- Estructura de tabla para la tabla `categorias_museos`
--

CREATE TABLE `categorias_museos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
-- Volcado de datos para la tabla `categorias_museos`
--

INSERT INTO `categorias_museos` (`id`, `categoria`) VALUES
(1, 'Museos'),
(2, 'MonumentosEdificiosArtisticos'),
(3, 'FundacionesCulturales'),
(4, 'AyuntamientoMadrid/OrganismosEmpresasMunicipales'),
(5, 'Planetarios');

--
--
-- Estructura de tabla para la tabla `categorias_restaurantes`
--

CREATE TABLE `categorias_restaurantes` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
-- Volcado de datos para la tabla `categorias_restaurantes`
--

INSERT INTO `categorias_restaurantes` (`id`, `categoria`) VALUES
(1, 'Bares'),
(2, 'Tapas'),
(3, 'Española'),
(4, 'Internacional'),
(5, 'De autor'),
(6, 'Multiespacio'),
(7, 'Tabernas'),
(8, 'Especiales'),
(9, 'Vegano'),
(10, 'Vegetariano');

--
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

-- Volcado de datos para la tabla `subcategorias_restaurantes`
--

INSERT INTO `subcategorias_restaurantes` (`id`, `subcategoria`) VALUES
(1, 'Tradicional'),
(2, 'Fusión'),
(3, 'Internacional'),
(4, 'Japonesa'),
(5, 'Peruana'),
(6, 'Gallega'),
(7, 'Tradicional renovada'),
(8, 'Casera'),
(9, 'Madrileña'),
(10, 'Mexicana'),
(11, 'Tailandesa'),
(12, 'China'),
(13, 'Asiática'),
(14, 'Gastrobares'),
(15, 'Italiana'),
(16, 'Cubana'),
(17, 'Marisquería'),
(18, 'De temporada'),
(19, 'Libanesa'),
(20, 'Halal'),
(21, 'Asador / Parrilla'),
(22, 'Arrocería'),
(23, 'Hawaiana'),
(24, 'Cántabra'),
(25, 'Tapas');

--
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
