-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-04-2022 a las 17:54:28
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cinegchu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_compra` int(11) NOT NULL,
  `pelicula` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `sala` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `butacas` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_compra`, `pelicula`, `fecha`, `hora`, `sala`, `precio`, `butacas`, `total`, `id`) VALUES
(25, 'Joker', '2022-04-22', '19:30:00', 2, '20', 20, '400', 69),
(26, 'StarWars', '2022-04-22', '14:00:00', 2, '19', 20, '380', 69),
(27, 'Godzilla', '2022-04-30', '17:00:00', 2, '19', 1, '19', 69);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `pelicula` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `sala` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `pelicula`, `fecha`, `hora`, `sala`, `precio`) VALUES
(3, 'Uncharted', '2022-04-22', '17:00:00', 1, '18'),
(4, 'Uncharted', '2022-05-13', '14:00:00', 1, '14'),
(5, 'Uncharted', '2022-06-09', '17:00:00', 1, '18'),
(7, 'CODA', '2022-04-15', '14:00:00', 1, '18'),
(8, 'The Batman', '2022-04-29', '12:00:00', 2, '15'),
(9, 'Joker', '2022-04-22', '19:30:00', 2, '20'),
(10, 'StarWars', '2022-04-22', '14:00:00', 2, '19'),
(333, 'Godzilla', '2022-04-30', '17:00:00', 2, '19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

CREATE TABLE `locales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `domicilio` varchar(255) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lon` float(10,6) NOT NULL,
  `descripcion` text NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`id`, `nombre`, `domicilio`, `lat`, `lon`, `descripcion`, `created_at`) VALUES
(1, 'Sucursal 1', '', 9.960332, -84.045174, '', '2022-03-23 09:22:47'),
(2, 'Sucursal 2', '', 9.950778, -84.102448, '', '2022-03-14 09:22:55'),
(3, 'Sucursal 3', '', 9.931419, -84.061050, '', '2022-04-11 02:53:06'),
(4, 'Sucursal 4', '', 9.931852, -84.105118, '', '2022-04-11 02:54:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descript` text NOT NULL,
  `actores` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `clasificacion` varchar(255) NOT NULL,
  `duracion` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `idioma` varchar(255) NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `movie_premiere` date NOT NULL,
  `price` float(6,2) NOT NULL,
  `folder` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `src_cover` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `title`, `descript`, `actores`, `director`, `clasificacion`, `duracion`, `genero`, `idioma`, `trailer`, `estado`, `movie_premiere`, `price`, `folder`, `src`, `src_cover`, `created_at`) VALUES
(1, 'Godzilla', 'Un monstruo marino prehistórico, que ha permanecido décadas aletargado después de que la humanidad tratara de destruirlo, se enfrenta a malvadas criaturas que, animadas por la arrogancia científica del hombre, amenazan la vida de la raza humana. ', 'Kyle Chandler, Vera Farmiga, Millie Bobby Brown, Ken Watanabe', 'Michael Dougherty', 'No recomendada menores de 12 años', '2h 12min', 'Acción, Ciencia ficción', 'Español', 'https://www.youtube.com/watch?v=QFxN2oDKk0E', 'Disponible', '2022-05-03', 18.00, 'img/peliculas/', 'godzilla.jpg', 'godzilla_cover.jpg', '2022-04-26 05:25:32'),
(2, 'StarWars', 'La Resistencia sobreviviente se enfrenta a la Primera Orden, y Rey, Finn, Poe y el resto de los héroes encararán nuevos retos y una batalla final con la sabiduría de las generaciones anteriores.', 'Daisy Ridley, Adam Driver, John Boyega, Oscar Isaac, Kelly Marie Tran', 'J.J. Abrams', 'No recomendada a menores de 7 años.', '2h 22min', 'Ciencia ficción, Aventura', 'Ingles subtitulada', 'https://www.youtube.com/watch?v=Izme__ZsURY', '', '2022-05-12', 25.00, 'img/peliculas/', 'starwars.jpg', 'starwars_cover.jpg', '2022-03-30 22:50:54'),
(3, 'Joker', 'La pasión de Arthur Fleck, un hombre ignorado por la sociedad, es hacer reír a la gente. Sin embargo, una serie de trágicos sucesos harán que su visión del mundo se distorsione considerablemente convirtiéndolo en un brillante criminal.', 'Joaquin Phoenix, Robert De Niro, Zazie Beetz', 'Todd Phillips', 'No recomendada a menores de 18 años', '2h 02min', 'Drama', 'Español', 'https://www.youtube.com/watch?v=ZMH8NWf9btw', '', '2022-06-02', 22.00, 'img/peliculas/', 'joker.jpg', 'joker_cover.jpg', '2022-03-31 02:32:39'),
(4, 'The Batman', 'Cada noche Bruce Wayne se enmascara en la identidad de Batman para sumergirse en las profundidades de Gotham City. Solo en su lucha contra el crimen, únicamente cuenta con el apoyo de Alfred Pennyworth y la ayuda del teniente James Gordon, dentro de una blindada red de corrupción policial. De pronto, un nuevo asesino pone la mirada en algunos de los ciudadanos de Gotham creando una serie de sádicas maquinaciones.', 'Robert Pattinson, Zoë Kravitz, Paul Dano', 'Matt Reeves', 'No recomendada a menores de 12 años.', '2h 57min', 'Acción, Crimen, Suspenso', 'Ingles subtitulada', 'https://www.youtube.com/watch?v=fWQrd6cwJ0A', '', '2022-06-16', 15.00, 'img/peliculas/', 'thebatman.jpg', 'thebatman_cover.jpg', '2022-04-12 22:17:57'),
(5, 'Uncharted', 'Nathan Drake sueña con volver a ver a su hermano. Un día recibe la visita de Victor Sullivan, un misterioso hombre con un gran talento para robar como él, quien le trae noticias de su hermano. Desesperado por volver a verle, Nathan se embarcará en una peligrosa y temeraria cruzada por España y otros países del mundo hasta encontrar las pistas suficientes que les lleven hasta el oro perdido de Magallanes, y por ende hasta su hermano.', 'Tom Holland, Mark Wahlberg, Sophia Ali', 'Ruben Fleischer', '1h 56min', 'Aventura, Acción', 'Español', 'No recomendada a menores de 12 años.', 'https://www.youtube.com/watch?v=kVgsnqAp0Kk', '', '2022-06-17', 18.00, 'img/peliculas/', 'uncharted.jpg', 'uncharted_cover.jpg', '2022-04-26 05:26:25'),
(6, 'CODA', 'Como CODA (el acrónimo en inglés de Child of Deaf Adults, es decir, hija de adultos sordos), Ruby es la única que puede oír en su familia. Cuando el negocio de pesca de la familia se ve amenazado, Ruby se encuentra dividida entre su amor por la música y su miedo a abandonar a sus padres.', 'Emilia Jones, Marlee Matlin, Eugenio Derbez', 'Siân Heder', 'Drama', 'Español', 'Apta para todo público.', '1h 51min', 'https://www.youtube.com/watch?v=0pmfrE1YL4I', '', '2022-05-20', 21.00, 'img/peliculas/', 'coda.jpg', 'coda_cover.jpg', '2022-04-26 05:28:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido1` varchar(255) NOT NULL,
  `apellido2` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT 'img/usuario.png',
  `fecha_nac` date NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL DEFAULT 'usuario_def.png',
  `rol` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `pass`, `nombre`, `apellido1`, `apellido2`, `email`, `fecha_nac`, `telefono`, `pic`, `rol`) VALUES
(69, 'franco2022', '202cb962ac59075b964b07152d234b70', 'Franco', 'Gomez', 'Gonzalez', 'juanelabayen@gmail.com', '2022-04-21', '5465646546546', 'images.jpg', 'admin'),
(70, 'pedro28', '202cb962ac59075b964b07152d234b70', 'Juan', 'Gomez', 'Labayen', 'juanelabayen@gmail.com', '2022-04-26', '03446672415', 'usuario_def.png', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
