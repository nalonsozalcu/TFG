-- 26/10/2022 -- datos para las tablas de catacteristicas

INSERT INTO `audiencia_eventos` (`id`, `tipo`) VALUES
(1, 'Familias'),
(2, 'Mujeres'),
(3, 'Mayores'),
(4, 'Niños'),
(5, 'Jovenes'),
(6, 'EstudianteseInvestigadores'),
(7, 'EmpresariosYComerciantes');


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


INSERT INTO `categorias_museos` (`id`, `categoria`) VALUES
(1, 'Museos'),
(2, 'MonumentosEdificiosArtisticos'),
(3, 'FundacionesCulturales'),
(4, 'AyuntamientoMadrid/OrganismosEmpresasMunicipales'),
(5, 'Planetarios');

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

-- 02/11/2022 -- eliminar columna de categoria

ALTER TABLE eventos DROP COLUMN categoria;
ALTER TABLE monumentos DROP COLUMN categoria;
ALTER TABLE museos DROP COLUMN categoria;
ALTER TABLE restaurantes DROP COLUMN categoria;

-- 03/11/2022 -- eliminar columna de categoria

TRUNCATE TABLE `eventos`;
TRUNCATE TABLE `monumentos`;
TRUNCATE TABLE `museos`;
TRUNCATE TABLE `restaurantes`;

-- 08/11/2022 -- nuevas tablas para gestion de contactos
CREATE TABLE `solicitudes` (
  `id_solicitante` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `contactos` (
  `id_usuario` int(11) NOT NULL,
  `id_contacto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
