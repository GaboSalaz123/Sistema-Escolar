-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2024 a las 11:47:39
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdcme`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `idGrado` varchar(4) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `cedula_escolar` varchar(8) NOT NULL,
  `edad` varchar(8) NOT NULL,
  `grado` varchar(11) NOT NULL,
  `lugar_nacimiento` varchar(30) NOT NULL,
  `fecha_nacimiento` varchar(12) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `bautizado` varchar(3) NOT NULL,
  `hermanos` varchar(3) NOT NULL,
  `tratamiento_especial` varchar(3) NOT NULL,
  `alergia` varchar(3) NOT NULL,
  `convulsionado` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `idGrado`, `nombres`, `apellidos`, `cedula_escolar`, `edad`, `grado`, `lugar_nacimiento`, `fecha_nacimiento`, `sexo`, `bautizado`, `hermanos`, `tratamiento_especial`, `alergia`, `convulsionado`) VALUES
(1, '002A', 'Gabriel Rafael', 'Salazar Jimenez', '31456789', '17', '001A', 'La Guaira, Venezuela', '04-02-2006', 'Masculino', 'Si', 'Si', '', '', ''),
(2, '002A', 'Alana Leorianny', 'Mendoza Perez', '31456784', '18', '001A', 'La Guaira, Venezuela', '02-02-2006', 'Femenina', 'Si', 'Si', '', '', ''),
(3, '001A', 'Gelimar Geray', 'Romero Gonzalez', '31456730', '17', '002A', 'La Guaira, Venezuela', '04-02-2006', 'Femenina', 'Si', 'No', '', '', ''),
(4, '001A', 'Rayderson Alexander', 'Guilarte Bravos', '31456789', '17', '001A', 'La Guaira, Venezuela', '04-02-2006', 'Masculino', 'Si', 'Si', '', '', ''),
(5, '002A', 'Juan Ricardo', 'Fernández Esteves', '31456789', '17', '002A', 'La Guaira, Venezuela', '04-02-2006', 'Masculino', 'Si', 'Si', '', '', ''),
(6, '001B', 'Victor Emanuel', 'Oses Rodriguez', '31456789', '19', '001B', 'La Guaira, Venezuela', '02-02-2006', 'Masculino', 'Si', 'Si', '', '', ''),
(7, '001B', 'Dargelis Camila', 'Brito Hernandez', '31456789', '17', '001B', 'La Guaira, Venezuela', '04-02-2006', 'Femenina', 'Si', 'Si', '', '', ''),
(10, '001A', 'Jose Francisco', 'Bermudez Francisquito', '31456789', '7', '001B', 'La Guaira, Venezuela', '04-02-2005', 'Masculino', 'no', 'no', '', '', ''),
(12, '001B', 'Edith', 'Diapa', '2020102', '23', '001B', 'sss', '22-09-0999', 'Femenino', 'Si', 'No', 'No', '', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id` int(11) NOT NULL,
  `asignaturas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id`, `asignaturas`) VALUES
(1, 'Matemáticas'),
(2, 'Lengua'),
(3, 'Religión'),
(4, 'Música'),
(5, 'Informática'),
(6, 'Educación Fisica'),
(7, 'Ciencias Sociales'),
(8, 'Ciencias Naturales'),
(10, 'Biblioteca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletas`
--

CREATE TABLE `boletas` (
  `id` int(11) NOT NULL,
  `periodo` varchar(10) NOT NULL,
  `lapso` varchar(30) NOT NULL,
  `indicadores` varchar(100) NOT NULL,
  `estudiante` varchar(30) NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `mensaje` varchar(30) NOT NULL,
  `dias_h` varchar(20) NOT NULL,
  `asistencias` varchar(20) NOT NULL,
  `inasistencias` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `boletas`
--

INSERT INTO `boletas` (`id`, `periodo`, `lapso`, `indicadores`, `estudiante`, `observaciones`, `mensaje`, `dias_h`, `asistencias`, `inasistencias`) VALUES
(6, '2023-2024', 'lapso', '8', '1', 'Esto es una completa prueba a ver qlq', 'Feliz Navidad', '23', '222', '18'),
(7, '2023-2024', 'Primer Lapso', '12', '6', 'Estoy probando esta prueba de probacion', 'Felices Vaciones', '23', '11', '22'),
(8, '2023-2024', 'Segundo Lapso', '10', '5', 'Esta es otra pruebita que estoy haciendo', 'Felices Vaciones', '56', '43', '16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `idGrado` varchar(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`idGrado`, `descripcion`) VALUES
('001A', 'Primer Grado A'),
('001B', 'Primer Grado B'),
('002A', 'Segundo Grado A'),
('002B', 'Segundo Grado B'),
('003A', 'Tercer Grado A'),
('003B', 'Tercer Grado B'),
('004A', 'Cuarto Grado A'),
('004B', 'Cuarto Grado B'),
('005A', 'Quinto Grado A'),
('005B', 'Quinto Grado B'),
('006A', 'Sexto Grado A'),
('006B', 'Sexto Grado B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicadores`
--

CREATE TABLE `indicadores` (
  `id` int(11) NOT NULL,
  `indicadores` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `indicadores`
--

INSERT INTO `indicadores` (`id`, `indicadores`) VALUES
(1, 'Reconocimiento de los elementos del discurso: conversación, saludo, agradecimiento y solicitud de ayuda para comprender un tema.'),
(2, 'Identificación y reproducción de juegos de palabras.'),
(3, 'Decodificación de símbolos para darles significados como palabras.'),
(4, 'Seguimiento de instrucciones orales al realizar diversas actividades.'),
(5, 'Descripciòn de elementos del ambiente natural y cultural.'),
(6, 'Argumentación de preguntas y respuestas sencillas.'),
(7, 'Señalamiento de manifestaciones literarias de tradición oral del pueblo, la comunidad y la región.'),
(8, 'Lectura de imágenes y construcción escrita de su significado y secuencia.'),
(9, 'Anticipación del contexto a partir de imágenes.'),
(10, 'Secuencia cronológica de la narraciòn de los hechos.'),
(11, 'Construcción de significados sobre el comportamiento de las personas.'),
(12, 'Producción de textos sencillos y dibujo a partir de una lectura.'),
(13, 'Narracción de hechos sobresalientes de la comunidad: leyendas, creencias, costumbres, manifestaciones artÍsticas, recreativas, deportivas y culturales.'),
(14, 'Decodificación de los sìmbolos y códigos lingüísticos.'),
(15, 'Contrucción de cuentos, poesías y repertorio de canciones venezolanas.'),
(16, 'Diferenciación de la escritura: grafismo, escritura sin control de cantidad, escritura fija, correspondencia entre el sonido y lo que escribe.'),
(17, 'Establecimiento de correspondencia entre el fonema y el grafema con valor sonoro convencional.'),
(18, 'Desarrollo de la lectura y escritura de textos sencillos para recibir y dar información.'),
(20, 'Diferenciación entre texto escrito, dibujo, número y letra.'),
(21, 'Parafraseo de textos sencillos.'),
(22, 'Identificación y práctica de normas sociales de convivencia (el respeto del turno de la palabra, expresión de ideas, sentimientos, normas del buen oyente).'),
(23, 'Descubrimiento del sistema alfabético convencional: género, y número, uso de las mayúsculas y del punto.'),
(24, 'Identificación, ejercitación y separación de palabras en sílabas y clasificación de las palabras según el número de sílabas.'),
(25, 'Construcción de familia de palabras.'),
(26, 'Escritura de frases y oraciones sencillas.'),
(27, 'Lectura y escritura de vocablos, consonantes y números en otros idiomas.'),
(28, 'Práctica oral del saludo en un idioma indígena.'),
(29, 'Identificación de la necesidad de la comunicación en la familia,  la escuela y la comunidad.'),
(30, 'Señalamiento de sustantivos y adjetivos en forma oral y escrita.'),
(31, 'Identificación del propósito de la lectura y escritura.'),
(32, 'Conocimiento de la literatura venezolana, indígena y universal.'),
(33, 'Conocimiento y práctica de adivinanzas, trabalenguas y cuentos.'),
(34, 'El computador y su uso. Uso del mouse y el teclado. Actividades de aprendizaje para el desarrollo de habilidades en el manejo del computador. Utilización del computador para escribir textos sencillos.'),
(35, 'Diferenciación de distintas tecnologías de la información y la comunicación y su uso: radio, televisión, prensa y computador.'),
(36, 'Dramatizaciones de situaciones cotidianas y/o ficticias.'),
(37, 'Creación de temas de interés propio a través del dibujo.'),
(38, 'Creación de composiciones plásticas, utilizando material de provecho y recursos de la naturaleza.'),
(39, 'Expresión de opiniones sobre producciones artísticas.'),
(40, 'Diferenciación de sensaciones y emociones, a partir de diversas líneas, colores, formas y texturas.'),
(41, 'Uso de técnicas gráficas-plásticas para expresar situaciones y valores sociales.'),
(42, 'Identificción de cuentos, poesías y repertorio de canciones venezolanas.'),
(43, 'Expresión de vivencias y emociones a través del juego.'),
(44, 'Improvisasión de diálogos verbales y no verbales.'),
(45, 'Improvisación de escenas teatrales.'),
(46, 'Representación de situaciones cotidianas a través de títeres.'),
(47, 'Creación de producciones artísticas a través de la música y la danza.'),
(48, 'Observación y opinión sobre expresiones artiísticas en los medios de comunicación.'),
(49, 'Representación de la danza a través de la música tradicional.'),
(50, 'Identificación de manifestaciones artísticas de la localidad, región, Nación, a nivel latinoamericano, caribeño y mundial.'),
(51, 'Elaboración de dibujos secuenciados para la obtención de la noción de tiempo y espacio.'),
(52, 'Sonorización con instrumentos y onomatopeya.'),
(53, 'El lenguaje artístico: tipos de línea. Colores primarios y secundarios. Cuerpos geométricos.'),
(54, 'Creación libre.'),
(55, 'Educación musical: Lectura y escritura musical, intrepretación de canciones populares, tradicionales infantiles y escolares.'),
(56, 'Vocalización y entonación del Himno Nacional, regional, institucional y otros.'),
(58, 'Ejecución de instrumentos musicales.'),
(59, 'Sentido númerico: construcción de series, noción de números, usos de los números en la vida cotidiana.'),
(60, 'Conversación sobre la historia familiar, comunitaria y escolar.'),
(61, 'Formaciones grupales: columnas, filas, círculos, triángulos y rectángulos.'),
(62, 'Uso del mapa y el cartograma para el estudio de la realidad geohistórica.'),
(63, 'Acondicionamiento de los músculos y articulaciones.'),
(64, 'Ordenación de números de mayor a menor y de menor a mayor y relación de números mayor que, menor que de forma escrita.'),
(65, 'Identificación del nombre de mi localidad y región.'),
(66, 'Clasificación y ejecución de diferentes tipos de juegos.'),
(67, 'Lectura y escritura de números , cifras y cantidades.'),
(68, 'Identificación de la capital de mi estado. Capital de la República Bolivariana de Venezuela. Sitios históricos de la ciudad capital.'),
(69, 'Desarrollo de actividades grupales kinestésicas, oculomanual y oculopodal. Actividades físicas grupales: juegos cognoscitivos, tradicionales y predeportivos. Actividades físicas ecológicas. Actividades lúdicas que desarrollen la creatividad y la integración como equipo.'),
(70, 'Sistema de Numeración Romana: conteo y escritura de números romanos hasta el X.'),
(71, 'Conomientos geohistóricos de los sitios claves donde se produjeron los eventos de la independencia.'),
(72, 'Realización de juegos, utilizando las normas creadas por los mismos niños y niñas.'),
(73, 'Valor de posición: identificación y uso del cartel de valores hasta la centena.'),
(74, 'Reconocimiento de las entidades federales dentro del mapa de la República Bolivariana de Venezuela.'),
(75, 'Ejecución de actividades físicas al aire libre.'),
(76, 'El sistema de numeración: conceptos y aplicaciones se seriar, contar y agrupar, concepto básica de números naturales, conteo de número naturales hasta el 100, números ordinales hasta el centésimo.'),
(77, 'Localización de la República Bolivariana de Venezuela en el continente americano y en el mapamundi.'),
(78, 'Ejecución de diferentes posturas del cuerpo.'),
(79, 'Relaciones: establecimiento de relaciones \"más que\", \"menos que\", \"tantos como\".'),
(80, 'Ubicación espacial: puntos cardinales con referencias escolar y comunitaria.'),
(81, 'Ejercitación a partir de segmentos corporales: el pie, sentado, acostado, arrodillado.'),
(82, 'Noción de fracción: concepto intiuitivo de fracción, estudio sencillo de las fracciones en la vida cotidiana, identificación de fracciones de denominador 2, 3, 4. Resolución de problemas orales de fracciones.'),
(83, 'Identificación y respeto a la diversidad socio cultural venezolana. Conocimiento de aportes ancestrales, originarios y afrodescendientes que nos identifican como Nación.'),
(84, 'Habilidades motrices básicas: correr, saltar, lanzar, trepar, reptar.'),
(85, 'La geometría y las mediciones. Figuras planas: identificación, descripción y construcción del círculo, el rectángulo, el cuadrado y el triángulo. Identificación y descripción de figuras tridimensionales: el cubo, el prisma rectangular, la pirámide, el cono, el cilindro y la esfera. Construcción de patrones geométricos. Noción de recta y punto: identificación de una lína y un punto, trazado de líneas a partir de la unión de varios puntos, identificación de una línea y un punto en el ambiente natural. Establecimiento de unidades de medidas arbitrarias: el pie. Uso de partes del cuerpo humano como sistema de medida, reconocimiento del centímetro en la regla: uso de la regla. Masa: comparación de masas y longitudes, comparación de capacidades. Tiempo: identificación del calendario o almanaque como herramienta para medir el tiempo: establecimiento de valores relativos del tiempo: días, semanas, meses, años, el día, la noche, identificación del movimiento de rotación y trasladación. Observación e identificación de elementos de la naturaleza que señalan el tiempo: el sol, la luna, el cielo. Construcción de secuencias de hechos de la vida cotidiana y distribución del tiempo. Sistema Monetario: identificaicón de la moneda nacional, usos de la moneda nacional, resolución de problemas sencillos a partir del uso de la moneda.'),
(86, 'Reconocimiento de los forjadores y forjadoras de la patria venezolana: locales, regionales y nacionales.'),
(87, 'Desarrollo de la expresión lúdica como espacio para la salud integral, la alegría y la espiritualidad.'),
(88, 'Noción de estadísticas: recolección de datos tomados de la realidad, organización de datos en un cuadro, clasificación de los datos. Clasificación de los alimentos: formadores, energéticos y reguladores en una tabla de datos. Observación y caracterización de objetos del entorno: clasificación usando datos y criterios dados.'),
(89, 'Identificación y valoración de héroes y heroínas nacionales, regionales y locales. Acontecimientos y hechos donde participaron (sólo efemérides).'),
(90, 'Desarrollo auditivo muiscal.'),
(91, 'Números y operaciones: Agregar-Sumar-Adicionar: construcción del concepto básico de suma, elementos de la suma, signos de la suma, operaciones de adición hasta la centena, frases de suma, propiedades de la suma, prpiedad conmutativa, intuitiva del cero, resolución de problemas sencillos de la vida cotidiana donde se aplica la suma, agrupaciones para la noción de doble o triple de un número. Quitar-Restar-Sustraer: construcción  del concepto básico de la resta, elementos de la resta, signos de la resta, relación de la sustracción y la adición, identificaicón y resolución de operaciones de sustracción hasta la centena, elaboración de frases, propiedades de la resta: identificación del cero como elemento neutro de la resta, resolución de problemas sencillos donde se aplica la resta.'),
(92, 'Introduccción al estudio de los héroes y heroínes patria universal, a fin de incorporar los valores republicanos para el desarrollo de la cuidadanía: Simón Bolívar, Simón Rodríguez, Francisco de Miranda, Ezequiel Zamora y Antonio José de Sucre.'),
(93, 'Desarrollo de habilidades rítmicas.'),
(94, 'Noción de ambiente: construcción del concepto de ambiente, identificación de las características del aire, del agua y del suelo como elementos de la tierra. Conocimiento del cuerpo y conservación de la salud en armonía con el ambiente. Ambiente y vida: observación e identificación de plantas y animales en la naturaleza. Establecimineto de relaciones entre los seres vivientes y materias no vivientes. Observación e identificación de fenómenos naturales (la lluvia, el frío, el calor). El agua en la naturaleza y en los seres vivos. Prácticas de conservación ambiental.'),
(95, 'Reconocimiento de los valores presentes de los héroes y heroínas patrias y locales.'),
(96, 'Conocimiento de los elementos básicos del ajedrez.'),
(97, 'Cuerpo humano: identificación del cuerpo humano como una unidad que se compone de varias partes, identificación y señalamiento de las principales partes que componen el sistema locomotor: huesos y músculos, observación y señalamiento de los cambios que producen en el crecimiento de los seres vivos.'),
(98, 'Identificación y valoración de las enfemérides nacionales: 19 de abril de 1810, 3 de agosto de 1806, 12 de febrero de 1814, 1 de mayo de 1886.'),
(99, 'Identificación de la importancia de la alimentación para la realización de actividades físicas.'),
(100, 'Salud e higiene: conocimiento y descripción de una buena alimentación, establecimiento de relaciones entre los alimentos y la salud. Reconocimiento y señalamiento de la ubicación de los dientes y tipos, establecimiento de medidas para el cuidado de los dientes, identificación de los sentidos y sus órganos, cuidados del cuerpo y sus partes: higiene personal. Identificación y seguimiento de las normas de seguridad en la casa, la escuela y la comunidad. Las enfermedades: Identificación de enfermedades que se dan en la casa, la escuela y la comunidad. Indagar sobre las enfermedades más frecuentes que sufre la población venezolana.'),
(101, 'Introducción al estudio del 5 de julio de 1811 como día de la independencia.'),
(102, 'Desarrollo de actividades físicas grupales: juegos cognoscitivos, tradicionales y predeportivos. Actividades físicas ecológicas. Actividades lúdicas que desarrollen la creatividad y la integración como equipo.'),
(103, 'Experimentación: desarrollo de experimentos sencillos e importancia para la vida. Manipulación de herramientas para armar y desarmar objetos y juguetes sencillos.'),
(104, 'Reconocimiento de la resistencia indígena y la lucha antiesclavista durante el proceso de independencia.'),
(105, 'Actividades gurpales, utilización de canciones infantiles, tradicionales y populares para el desarrollo auditivo musical, trabajo grupal y habilidades para el baile.'),
(106, 'Conocimiento del paisaje geográfico local: elementos y clasificación.'),
(107, 'Actividades físicas de interacción con el ambiente. Actividades recreativas: visitas y excursiones a espacios culturales, históricos y otros. Cuidado y mantenimiento de espacios destinados a la actividad física. Práctica de juegos y danzas tradicionales típicas de la comunidad y región.'),
(108, 'La familia y sus valores: construcción del árbol genealógico.'),
(109, 'Actividades físicas y las diferentes formas de comunicación: movimiento, la música, mímicas de personajes, dramatizaciones, bailes tradicionales e índigenas individuales y colectivas. Actividades de reconocimiento y diferenciación del lenguaje corporal, gestual y sonidos. Normas universales de comunicación a través del lenguaje por señas.'),
(110, 'Reconocimiento de los miembros de la familia.'),
(111, 'Noción del patrimonio cultural, natural, local, regional y nacional.'),
(112, 'Identificación y respeto a la diversidad sociocultural venezolana.'),
(113, 'Desarrollo de conocimientos de aportes ancestrales, orirginarios y afrodescendientes que nos identifican como Nación.'),
(114, 'Manifestaciones artísticas y culturales de la localidad y la región.'),
(115, 'Identificación y valoración de los símbolos patrios y emblemáticos naturales de la región y el país.'),
(116, 'Reconocimiento e intercambio de cultores y culturas, artistas y libros vivientes de la comunidad.'),
(117, 'Menciona valores presentes de los héroes y heroínas patrios y locales.'),
(118, 'Ubicación de las instituciones públicas locales, regionales y nacionales.'),
(119, 'Valoración del Día Nacional de los Pueblos y Comunidades Indígenas y Afrodescendientes.'),
(120, 'Educación y seguridad víal: reconocimiento de las funciones del semáforo. Identificación de las normas del peaton y el conductor. Uso del cinturón de seguridad.'),
(121, 'Medios de transporte: descripción de los medios de transporte público vehicular, metro, trenes, camionetas, motos, etc. Señalamiento de normas para su uso.'),
(122, 'Valoración del trabajo como fuente de vida de la familia. Dignificación a la labor que desempeña su grupo familiar.'),
(123, 'Reconocimiento de la importancia de la Constitución de la República Bolivariana de Venezuela.'),
(124, 'Educación para la cuidadanía y Derechos Humanos, identificación de los derechos y déberes del niño y la niña, y valoración de las normas de convivencia.'),
(125, 'Observación y descripción de paisajes geográficos y señalamiento de características.'),
(126, 'Acondicionamiento de los músculos y articulaciones.'),
(127, 'Identificación y desarrollo de los procesos de la comunicación: valoración y práctica de las normas de convivencia.'),
(128, 'Sentido numérico. El número: concepto. Usos de los números en la vida cotidiana. Escritura y lectura de los números hasta el 1000.'),
(129, 'Distinción de las actividades económicas y productivas de la comunidad y región.'),
(130, 'Formaciones grupales: columnas, filas, círculos, triángulos y rectángulos. Actividades grupales: kinéstesicas, segmentales y totales, oculomanual y oculopodal.'),
(131, 'Aplicación de normas de conversación en su ambiente familia, escolar y comunitario.'),
(132, 'El sistema de numeración: construcción de conceptos y aplicaciones de seriar, contar y agrupar, establecimiento de agrupamientos , concepto básico de números naturales, identificación , interpretación y graficación de números hasta de tres dígitos, conteo de números naturales hasta el 1000, identificación y conteo de números ordinales hasta la unidad de mil.'),
(133, 'Identificación, señalamiento y establecimiento de relaciones de los estados de Venezuela y sus capitales.'),
(134, 'Actividades físicas grupales: juegos cognoscitivos, motrices, sociales, tradicionales y predeportivos.'),
(135, 'Reproducción y producción de juegos de palabras.'),
(136, 'Ordenación de números. Larecta numérica. Establecimiento de relaciones a través de los signos >, < e = a partir de un orden numérico en la recta, orden de números naturales menores o iguales que 1000. Identificación y realización de sucesiones hasta la unidad de mil.'),
(137, 'Conocimiento de la importancia del petróleo en las actividad económica del país.'),
(138, 'Realización de juegos, utilizando las normas creadas por niños y niñas.'),
(139, 'Establecimiento del significado social de las palabras.'),
(140, 'Lectura y escritura de números: lectura y escritura de números naturales, escritura e interpretación de cifras y cantidades.'),
(141, 'Conocimiento y valoración de los héroes patrios nacionales, regionales y locales. Estudio de los acontecimientos que caracterizaron sus vidas. Simón Bolívar, Simón Rodríguez, Francisco de Miranda, Ezequiel Zamora y Antonio José de Sucre.'),
(142, 'Actividades grupales utilizando diferentes objetos.'),
(143, 'Seguimiento de intrucciones orales y escritas.'),
(144, 'Sistema de Numeración Romana: conteo de números romanos hasta el C.'),
(145, 'Conmemoración y valoración de efemérides nacionales: 19 de abril de 1810, 5 de julio de 1811. Resaltar su importancia para la independencia venezolana. Así como 3 de agosto de 1806, 12 de febrero de 1814 y 1° de mayo de 1886.'),
(146, 'Ubicación espacial a partir de medidas sencillas: pasos, pulgadas y puntos de referencias.'),
(147, 'Descripción de elementos del ambiente natural y cultural elaborando pequeñas oraciones o textos.'),
(148, 'Relaciones: establecimiento de relaciones con objetos y números: \"más que\", \"menos que\", \"tantos como\", pertenencia y no pertenencia; algunos y ninguno.'),
(149, 'Pueblos originarios: conocimiento y organización.'),
(150, 'Mantenimiento del equilibrio sobre una base de sustentación del cuerpo.'),
(151, 'Argumentación de preguntas y respuestas a partir de lecturas de diversos textos o cuentos.'),
(152, 'Valor de posición: identificación y ubicación de cifras en el cartel de valores hasta la unidad de mil. Empleo del ábaco y del cartel de valores para el estudio del sistema de posición decimal: unidades, decenas, centenas y unidades de mil.'),
(153, 'Identificación y ubicación espacial de los países que conforman el Caribe y la América Latina.'),
(154, 'Ejecuciónn de ejercicios sencillos de flexibilidad, velocidad, resistencia y fuerza en tareas motrices.'),
(155, 'Dramatización de situaciones cotidianas o ficticias.'),
(156, 'Noción de fracción: construcción del concepto de fracción, las fracciones en la vida cotidiana, fracciones de denominador 2,3,4,5,6,8. Resolución de problemas sencillos orales y escritos de fracciones.'),
(157, 'Identificación de los continentes en el mapamundi.'),
(158, 'Ejecución de ejercicios para regular la respiración tanto en movimiento como en en quietud'),
(159, 'Lectura de imágenes y construcción escrita de su significado y secuencia.'),
(160, 'La geometría y las mediciones. Figuras planas: identificación, descripción y construcción del crículo, el rectángulo, el cuadrado y el triángulo e identificación de los elementos básicos que componen cada figura. Resolución de problemas sencillos en base al área de un rectángulo. Indentificación, descripción y diseño básico de figuras tridimensionales: el cubo, el prisma rectangular, la pirámide, el cono, el cilindro y la esfera. Desarrollo de patrones geométricos. Noción de recta y punto: Identificación de una línea y un punto, trazado de líneas a partir de unos puntos, identificación y graficación de líneas cerradas y abiertas. Identificación de la posición de un objeto con respectoa otro. Elaboración de posiciones y desplazamaiento de objetos en ejes, cruces, filas y columnas con ayuda de instrumentos geométricos, establecimiento de unidades de medidas arbitrarias. Utilización de partes del cuerpo humano como sistema de medida: la pulgada, el pie. Inferencia de la utilidad del centrímetro y el metro, identificación del centrímetro en la regla: uso de la regla. Masa: comparación de masas y longitudes. Establecimiento de relaciones >, <, = entre longitudes de objetos expresados en centrímetros. Tiempo: el calendario o almanaque para determinar y expresar los valores relativos del tiempo: días, semanas, meses, año, el día, la noche. Determinación de las causas del movimiento de rotación y trasladación y sus efectos en el tiempo y en las actividades humanas. Elementos de la naturaleza que señalan el tiempo: el sol, la luna, el cielo. Cálculos temporales de hechos y acontecimientos basados en la realidad, distribución del tiempo. Comparación de capacidades. Sistema Monetario: Monedas de uso Nacional, resolución de problemas relacionados con el valor de la moneda, desde la realidad nacional.'),
(161, 'Historia local: indagación de la vida social en la comunidad.'),
(162, 'Ejecución de movimientos básicos para lanzar diferentes tipos de pelotas.'),
(163, 'Anticipación del contexto a partir de imágenes.'),
(164, 'Noción de estadística: recolección de datos tomados de la realidad, organización de datos de una tabla de doble entrada, clasificación de datos gráficos de barra, clasificación de los alimentos, de animales, plantas y otros objetos del contexto en tablas de doble entrada y gráficos de barra. Diseño de tablas de datos de acuerdo a la ocurrencia de hechos de acuerdo al momento: siempre, a veces, nunca, más frecuente, menos frecuente.'),
(165, 'Aparición de las nociones del tiempo y espacio.'),
(166, 'Identificación y ejecución de posturas con segmentos corporales: cabeza, tronco y extremidades.'),
(167, 'Secuencia cronológicamente la narración de los hechos.'),
(168, 'Números y operaciones. Sumar-Agregrar-Adicionar: aplicación del concepto y términos de la suma, signos de la suma, ejecución de operaciones de adición hasta la unidad de mil, Ejercitación con frases de sum, propiedades de la suma: propiedad conmutativa, propiedad asociativa intuitiva del cero, Identificación de los elementos de un problema para buscar una solución, resolución de problemas sencillos de la vida cotidiana donde se aplica la suma, agrupaciones para la noción de doble o triple de un número. Quitar-Restar-Sustraer: aplicación del concepto de sustracción, identificación de las funciones del minuendo, el sustraendo y la diferencia en las operaciones de resta, signs de resta, ejecución de operaciones de sustracción hasta la unidad de mil, construcción y ejecución de frases de resta, propiedades de la resta: el elemento cero, resolución de problemas sencillos sonde se aplica la resta, identificación y relación de la suma y la resta en operaciones sencillas. Representación gráfica de la suma y la resta hasta la unidad de mil en una recta. Agrupar-adicionar-multiplicar: interpretación de la multiplicación de dos unidades. Identificación de los elementos de la multiplicación. Signos de la multiplicación . x. Resolución de problemas utilizando números de un solo dígito y de un número de un dígito por la decena. Identificación y cálculo del doble de un número hasta la centena.'),
(169, 'Utilización y estudio del mapa local, regional y nacional.'),
(170, 'Desarrollo de habilidades motrices básicas: correr, saltar, lanzar, trepar, reptar, etc.'),
(171, 'Construcción de significados sobre el comportamiento de las personas.'),
(172, 'Noción de ambiente: concepto, identificación y descripción de los componentes del ambiente, el ambiente en mi comunidad, identificación de las características del aire, del agua y del suelo como elementos de la tierra e importancia para los seres vivos, clasificación de los suelos de la comunidad según sus características, el agua en la comunidad. Conocimiento del cuerpo y conservación de la salud en armonía con el ambiente. Ambiente y vida: plantas y animales en la naturaleza, concepto de fauna y flora a partir de la clasificación de plantas animales de la comunidad, apreciando su diversidad y utilidad. Seres vivientes y materias no vivientes. Observación e identificación de fenómenos naturales (la lluvia, el frío, el calor), el ciclo del agua. Señalamiento de evidencias de contaminación del aire y del agua y promoción de alternativas de prevención. Identificación de las relaciones que se dan entre factores naturales y seres vivos.'),
(173, 'Identificación de su estado dentro de la organización política territorial de la República Bolivariana de Venezuela.'),
(174, 'Desarrollo de habilidades de coordinación y equilibrio.'),
(175, 'Producción escrita y gráfica a partir de la lectura.'),
(176, 'Cuerpo humano: el cuerpo humano como sistema, señalamiento de las características físicas de los seres humanos: establecimiento de comparaciones con otras personas. Identificación y relación de los elementos que componen el sistema locomotor: huesos, músculos y arterias. Descripción de los cambios que se producen en el desarrollo de los seres vivos.'),
(177, 'Ubicación de la República Bolivariana de Venezuela en nuestro continente y el mundo.'),
(178, 'Estudio de la importancia de la alimentación para la realización de actividades físicas.'),
(179, 'Narración de hechos sobresalientes de la comunidad: leyendas, creencias, costumbres, manifestaciones artísticas, económicas y culturales.'),
(180, 'Salud e higiene: la buena alimentación, los alimentos y la salud, identificación y señalamiento del recorrido de los alimentos y del aire por los órganos internos relacionándolo con la digestión, la nutrición y la respiración. Identificación y descripción de los sentidos y sus órganos a fin de cuidarlos de acuerdo a su importancia. Establecimiento de normas de seguridad en la casa, la escuela y en la comunidad. Las enfermedades: identificación de enfermedades que se dan en la casa, la escuela y la comunidad, Relaciones entre los hábitos de higiene y la aparición de enfermedades más comunes en los dientes, la boca, el estómago, la piel, la cabeza. Enfermedades frecuentes en la República Bolivariana de Venezuela.'),
(181, 'Ubicación de los pueblos ancestrales en la geografía actual.'),
(182, 'Ejecución de actividades lúdicas para la creatividad y la integración como equipo.'),
(183, 'Problematización del significado de palabras, frases y oración.'),
(184, 'Experimentación: desarrollo de experimentos sencillos e importancia para la vida: identificación de propiedades de la materia: peso y volumen. Experimentación de cambios que se producen en la materia por la acción de la luz y el calor: evaporación, calentamiento y fototropismo. Utilización de objetos tecnológicos valorando su buen uso e importancia. Uso adecuado de herramientas para elaborar, armar y desarmar objetos y juguetes sencillos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `madres`
--

CREATE TABLE `madres` (
  `id` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `nombre_apellido` varchar(30) NOT NULL,
  `cedula_identidad` varchar(8) NOT NULL,
  `fecha_nacimiento` varchar(10) NOT NULL,
  `estado_nacimiento` varchar(20) NOT NULL,
  `edad` varchar(3) NOT NULL,
  `profesion` varchar(10) NOT NULL,
  `grado_instruccion` varchar(10) NOT NULL,
  `empresa_trabaja` varchar(15) NOT NULL,
  `cargo_desempeña` varchar(10) NOT NULL,
  `sueldo` varchar(10) NOT NULL,
  `telefonos` varchar(12) NOT NULL,
  `estado_civil` varchar(10) NOT NULL,
  `correo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestras`
--

CREATE TABLE `maestras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `cedula` varchar(8) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `aula` varchar(30) NOT NULL,
  `idGrado` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `maestras`
--

INSERT INTO `maestras` (`id`, `nombre`, `apellido`, `cedula`, `correo`, `telefono`, `direccion`, `aula`, `idGrado`) VALUES
(1, 'German', 'Vergara', '6465328', 'german123vergara@gma', '04242566778', 'Madre Emilia Maiquetia', 'Administrador', '0'),
(2, 'Marjorie', 'Amaro', '65489939', 'marjoreamaro123@gmail.com', '04242566778', 'Madre Emilia Maiquetia', 'Administrador', '0'),
(4, 'Dionisia', 'Gorrin', '11190383', 'dionisia444@gmail.com', '04122566778', 'Madre Emilia Maiquetia', 'Primer Grado A', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `observaciones` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `observaciones`
--

INSERT INTO `observaciones` (`id`, `fecha`, `observaciones`) VALUES
(10, '2024-02-28', 'Hoy el estudiante Daniel Hernandez pudo leer de forma segura'),
(11, '2024-02-28', 'El estudiante Abraham Lopez no pudo completar el ejercicio que se le puso en el cuaderno'),
(12, '2024-02-28', 'La estudiante Sofia Salazar sorprendió la clase logrando leer todo lo que estaba en el pizarrón'),
(14, '2024-03-05', 'Esteba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padres`
--

CREATE TABLE `padres` (
  `id` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `nombre_apellido` varchar(30) NOT NULL,
  `cedula_identidad` varchar(8) NOT NULL,
  `fecha_nacimiento` varchar(10) NOT NULL,
  `estado_nacimiento` varchar(20) NOT NULL,
  `edad` varchar(3) NOT NULL,
  `profesion` varchar(10) NOT NULL,
  `grado_instruccion` varchar(10) NOT NULL,
  `empresa_trabaja` varchar(15) NOT NULL,
  `cargo_desempeña` varchar(10) NOT NULL,
  `sueldo` varchar(10) NOT NULL,
  `telefonos` varchar(12) NOT NULL,
  `estado_civil` varchar(10) NOT NULL,
  `correo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representantes`
--

CREATE TABLE `representantes` (
  `id` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `nombre_apellido` varchar(30) NOT NULL,
  `cedula_identidad` varchar(8) NOT NULL,
  `fecha_nacimiento` varchar(10) NOT NULL,
  `estado_nacimiento` varchar(20) NOT NULL,
  `telefonos` varchar(12) NOT NULL,
  `correo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `descripcion`) VALUES
(1, 'admin'),
(2, 'maestra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `idRol` int(11) NOT NULL,
  `idGrado` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `idRol`, `idGrado`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1, '00AA'),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 2, '00BB'),
(3, '1ACME', '5c4391b99f97f25332c87a21c2fe4ce7', 2, '001A'),
(4, '1BCME', '420f81aa4f7c25158fef3cef2cd981c3', 2, '001B'),
(5, '2ACME', '165fc8aad64b8d7d7b88d225a195011a', 2, '002A'),
(6, '2BCME', '0aa7b34c7fc694c7d94aab9d8fc9d43a', 2, '002B'),
(7, '3ACME', 'd5f8732cc0d5bcada391de1756fcca71', 2, '003A'),
(10, '3BCME', 'cf5ed9d178bd0fc73e0d9f2f5d944170', 2, '003B'),
(11, '4ACME', 'f1b4509c8f8ad381591662baf2c219ea', 2, '004A'),
(12, '4BCME', '07510e56d33b0a6f919ead24ff26ec7e', 2, '004B'),
(13, '5ACME', 'd2ada9b3d4ddc6eb65d58aee244554ea', 2, '005A'),
(15, '5BCME', '9a8a735d9dc80751235963309603618e', 2, '005B'),
(16, '6ACME', 'e626abbda4e342783a067165a27627d2', 2, '006A'),
(17, '6BCME', '5c3d1c3c79a0b4e05b1672952b3876d5', 2, '006B');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGrado` (`idGrado`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `boletas`
--
ALTER TABLE `boletas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`idGrado`);

--
-- Indices de la tabla `indicadores`
--
ALTER TABLE `indicadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `madres`
--
ALTER TABLE `madres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAlumno` (`idAlumno`);

--
-- Indices de la tabla `maestras`
--
ALTER TABLE `maestras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGrado` (`idGrado`);

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `padres`
--
ALTER TABLE `padres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAlumno` (`idAlumno`);

--
-- Indices de la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAlumno` (`idAlumno`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `idGrado` (`idGrado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `boletas`
--
ALTER TABLE `boletas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `indicadores`
--
ALTER TABLE `indicadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT de la tabla `madres`
--
ALTER TABLE `madres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `maestras`
--
ALTER TABLE `maestras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `padres`
--
ALTER TABLE `padres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `representantes`
--
ALTER TABLE `representantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `madres`
--
ALTER TABLE `madres`
  ADD CONSTRAINT `madres_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `padres`
--
ALTER TABLE `padres`
  ADD CONSTRAINT `padres_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD CONSTRAINT `representantes_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
