-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2024 a las 22:29:29
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
-- Base de datos: `merlibre`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(8) NOT NULL,
  `id_usuario` int(4) NOT NULL,
  `cantidad_productos` int(3) NOT NULL,
  `importe_carrito` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_detalle`
--

CREATE TABLE `carrito_detalle` (
  `id_carrito` int(8) NOT NULL,
  `id_producto` int(4) NOT NULL,
  `fecha_agregado` date NOT NULL,
  `cantidad` int(3) NOT NULL,
  `precio` float(8,2) NOT NULL,
  `descuento` int(2) NOT NULL,
  `tiempo_surtido` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion_clientes`
--

CREATE TABLE `direccion_clientes` (
  `id_direccioncliente` int(11) NOT NULL,
  `id_usuario` int(8) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `colonia` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `CP` int(8) NOT NULL,
  `telefono` bigint(10) NOT NULL,
  `detalles_domicilio` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `direccion_clientes`
--

INSERT INTO `direccion_clientes` (`id_direccioncliente`, `id_usuario`, `calle`, `numero`, `colonia`, `ciudad`, `estado`, `pais`, `CP`, `telefono`, `detalles_domicilio`) VALUES
(1, 1, 'Media Luna', '3160', 'Agustina Ramirez', 'Culiacan Rosales', 'Sinaloa', 'México', 80028, 6677906516, 'Entre circulo del sol y eclipse, color de casa ploma'),
(2, 2, 'Alvaro Obregon', '1234', 'Centro', 'Culiacan ', 'Sinaloa', 'Mexico', 80000, 6672277904, 'Ayuntamiento de Culiacan'),
(3, 3, 'Mezquital del oro', '2394', 'Toledo Corro', 'Culiacan Rosales', 'Sinaloa', 'Mexico', 80296, 6672277904, 'Casa azul, barda blanca, junto a una herreria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion_proveedores`
--

CREATE TABLE `direccion_proveedores` (
  `id_direccionproveedor` int(4) NOT NULL,
  `id_proveedor` int(4) NOT NULL,
  `calle` varchar(120) NOT NULL,
  `numero` int(8) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `CP` int(8) NOT NULL,
  `telefono` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `direccion_proveedores`
--

INSERT INTO `direccion_proveedores` (`id_direccionproveedor`, `id_proveedor`, `calle`, `numero`, `colonia`, `ciudad`, `estado`, `pais`, `CP`, `telefono`) VALUES
(1, 1, 'Revolución', 4562, 'Merced', 'Azcapozalco', 'México', 'México', 1001, 5599999999),
(2, 2, 'Pedro Infante', 3145, 'Alamos', 'Culiacan Rosales', 'Sinaloa', 'México', 80001, 6677111111);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(4) NOT NULL,
  `id_proveedor` int(4) NOT NULL,
  `nombre_producto` varchar(250) NOT NULL,
  `marca` varchar(50) NOT NULL DEFAULT 'Marca no especificada por el vendedor',
  `precio_producto` float(8,2) NOT NULL,
  `descuento` int(2) NOT NULL DEFAULT 0,
  `existencia` int(5) NOT NULL,
  `mercancia_transito` int(5) NOT NULL,
  `nuevo_usado` varchar(5) NOT NULL,
  `descripcion_general` varchar(900) NOT NULL DEFAULT 'El vendedor no otorgo una descripción a este producto',
  `imagen` varchar(200) NOT NULL DEFAULT 'https://www.colombianosune.com/sites/default/files/asociaciones/NO_disponible-43_17.jpg',
  `tiempo_surtido` int(2) NOT NULL DEFAULT 7
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_proveedor`, `nombre_producto`, `marca`, `precio_producto`, `descuento`, `existencia`, `mercancia_transito`, `nuevo_usado`, `descripcion_general`, `imagen`, `tiempo_surtido`) VALUES
(2, 2, 'Sala Esquinera Minimalista Sillón Esquinero Economica Modern Color Gris', 'Mobeler', 7850.00, 21, 7, 4, 'Nuevo', 'Encuentra en tu sofá la calidad y el confort que Mobeler puede brindar. Disfruta tus momentos de dispersión leyendo una revista o disfrutando de una película sobre una estructura sólida y cómoda.\r\nTamaño y confort\r\nEste sofá de 3 cuerpos es el mueble que necesitas para compartir y disfrutar momentos con amigos y familia. Sus dimensiones son ideales para que tus invitados y vos se sientan cómodos y a gusto en un mismo lugar.', 'https://http2.mlstatic.com/D_NQ_NP_2X_681163-MLU72628282998_112023-F.webp', 7),
(3, 1, 'SAMSUNG Galaxy A34 5G Negro', 'Samsung', 4799.00, 2, 20, 5, 'Nuevo', 'Diseño simple y estilizado. Enmarcado en líneas sencillas y un acabado brillante, el Galaxy A34 5G está disponible en combinaciones de colores a la moda y clásicos como Lima, Plata, Violeta y Grafito.', 'https://m.media-amazon.com/images/I/51+02t1vkAL._AC_SL1500_.jpg', 7),
(7, 1, 'Transformers Gamer Edition Optimus Prime', 'Hasbro', 949.00, 30, 18, 3, 'Nuevo', '¡Lleva tus momentos favoritos de los videojuegos de Transformers a tu colección con la figura de acción Transformers Studio Series Voyager Class Gamer Edition Optimus Prime! Optimus Prime lleva a cabo su plan de ser capturado por los Decepticons con el fin de salvar a Zeta Prime. Las figuras Transformers Studio Series Gamer Edition son figuras de colección para niños y niñas a partir de 8 años y cuentan con detalles y accesorios inspirados en los videojuegos. Convierte la figura robot en modo camión cibertroniano en 22 pasos y coloca la figura Optimus Prime en poses frente al decorado de fondo incluido que representa la escena del Escape de la prisión de Kaon. ¡Las figuras de acción Transformers son ideales para niños y niñas! Transformers y todos los personajes relacionados son marcas registradas de Hasbro. Hasbro y todos los términos relacionados son marcas registradas de Hasbro.', 'https://http2.mlstatic.com/D_NQ_NP_2X_896122-MLU72675540220_112023-F.webp', 7),
(8, 2, 'Lenovo All-in-One Business Desktop', 'Lenovo', 8485.75, 30, 27, 3, 'Nuevo', 'Almacenamiento y RAM: este sistema cuenta con una generosa configuración de almacenamiento y RAM, incluyendo un SSD PCIe M.2 de 256 GB junto con un disco duro de 1 TB. Además, está equipado con 16 GB de RAM DDR4, lo que garantiza un rendimiento fluido y eficiente para todas sus necesidades informáticas.', 'https://m.media-amazon.com/images/I/71NzTEP77DL._AC_SL1500_.jpg', 7),
(10, 3, 'Tenis Court Low Streetcheck Cloudfoam adidas', 'Adidas', 850.00, 49, 6344, 56, 'Nuevo', 'Una plataforma para tus sueños. Una lona para escribir tu propia historia. Puede que parezca mucho para un calzado, pero estos tenis adidas pueden soportarlo. Con una silueta de corte bajo inspirada en el legado de adidas, además de una mediasuela y plantilla ultracómoda, están listos para acompañarte adonde quieras ir.', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/dd170e2d5f9843c78efeadc50102e33a_9366/Tenis_Court_Low_Streetcheck_Cloudfoam_Blanco_GW5495_04_standard.jpg', 7),
(11, 3, 'Pc Gamer Ryzen 5600g 32gb Ram 1tb Ssd Graficos Radeon 7 Wifi', 'Ryzen', 7766.67, 10, 35, 89, 'Usado', 'Sistema Ensamblado y listo para funcionar, nuevo con garantía de un año, se te envían todas las cajas, manuales y drivers incluidos en tus productos.  Incluye Windows 10 Pro de 64 Bits (actualizable a Windows 11) versión de Prueba por 30 días.', 'https://http2.mlstatic.com/D_NQ_NP_2X_715827-MLM72701770014_112023-F.webp', 7),
(12, 3, 'Marshall Major IV Audífonos Inalámbricos Bluetooth - Negro', 'Marshall ', 2095.73, 2, 58, 2, 'Nuevo', 'Sonido emblemático. Más de 80 horas de reproducción inalámbrica. La carga rápida de 15 minutos te ofrece hasta 15 horas de reproducción. Obtén una carga completa en solo 3 horas. Con el botón multidireccional puedes reproducir, detener, mezclar y ajustar el volumen, así como encender o apagar tus audífonos. Ajuste plegable y almohadillas protegidas para el desgaste. Con una clavija de 3,5 mm que p', 'https://m.media-amazon.com/images/I/71mTfSKhhTL._AC_SL1500_.jpg', 7),
(14, 1, 'Sony PSP', 'Sony', 1500.00, 33, 1, 1, 'Nuevo', 'Chipeado  Con cargador  Funciona todo  Memoria explandible  Lleva 4gb ', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Sony-PSP-1000-Body.png/1200px-Sony-PSP-1000-Body.png', 7),
(15, 3, 'Ford F200 Fighter', 'Ford', 680000.00, 0, 1, 1, 'Nuevo', 'Vendo Ford F200 Fighter 1991 en excelentes condiciones pintura original estándar motor 351 sin ningún tipo de modificaciones con un excelente trato ,envío opcional depende de donde te encuentres', 'https://http2.mlstatic.com/D_NQ_NP_2X_833502-MLM70681615977_072023-F.webp', 7),
(16, 2, 'Audífonos in-ear alámbricos JBL Tune 110 JBLT110 black', 'JBL', 195.00, 90, 56, 50, 'Nuevo', 'Audífonos in-ear JBL Tune 110 con micrófono incorporado para llamadas y control de canciones. Resistente al polvo y con cable de 111.3 cm para mayor comodidad.', 'https://http2.mlstatic.com/D_NQ_NP_2X_980889-MLA72646562123_112023-F.webp', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(4) NOT NULL,
  `nombre_proveedor` varchar(100) NOT NULL,
  `direccion_proveedor` varchar(100) NOT NULL,
  `RFC` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_proveedor`, `direccion_proveedor`, `RFC`) VALUES
(1, 'Celular Movil S.A. de C.V.', 'celularmovil@clm.com.mx', 'CEMO8005307N6'),
(2, 'Coppel S.A. de C.V.', 'enriquecoppel@coppel.com.mx', 'CPPL451013F4G');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(8) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_paterno` varchar(30) NOT NULL,
  `apellido_materno` varchar(30) DEFAULT NULL,
  `apodo_usuario` varchar(50) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `telefono` bigint(10) NOT NULL,
  `RFC` varchar(13) NOT NULL,
  `contrasena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellido_paterno`, `apellido_materno`, `apodo_usuario`, `correo_electronico`, `telefono`, `RFC`, `contrasena`) VALUES
(1, 'Lorenzo', 'Chávez', 'Félix', 'Almacenes Zaragoza S.A. de C.V.', 'lorenzoch1971@gmail.com', 6677906516, 'AMZA8005307N5', '123'),
(2, 'José Roman', 'Armenta', 'Valenzuela', 'Celular Movil S.A. de C.V.', 'joserarmenta@gmail.com', 6671608148, 'CEMO451013F4G', 'contraseña'),
(3, 'Juan Francisco', 'Hernandez ', 'Felix', 'Francisco Venta', 'fr4nk375h@gmail.com', 6672277904, 'HEFJ9711104D9', 'contraseña123'),
(4, 'Homero', 'J', 'Simpson', 'El Baron de la Cerveza', 'dou@burns.com', 123456789, '21541', 'Bart'),
(5, 'Marge', 'Bubier', 'Simpson', 'La loca', 'lisa@mmm.com', 2, '2', 'lisa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(8) NOT NULL,
  `id_cliente` int(8) NOT NULL,
  `num_envio` int(2) NOT NULL,
  `fecha_venta` date NOT NULL,
  `hora` time NOT NULL,
  `monto_total` float(8,2) NOT NULL,
  `estatus` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `num_envio`, `fecha_venta`, `hora`, `monto_total`, `estatus`) VALUES
(126, 2, 1, '2023-12-10', '22:10:17', 14039.10, 's'),
(127, 2, 2, '2023-12-10', '22:10:17', 2001.30, 't'),
(128, 2, 1, '2023-12-10', '22:23:57', 28078.20, 'p2'),
(129, 2, 2, '2023-12-10', '22:23:57', 10006.50, 'p2'),
(130, 2, 1, '2023-12-10', '22:39:14', 14039.10, 'p1'),
(131, 2, 2, '2023-12-10', '22:39:14', 2859.00, 'p1'),
(132, 2, 1, '2023-12-10', '22:46:53', 14039.10, 'q'),
(133, 2, 2, '2023-12-10', '22:46:53', 2001.30, 'e'),
(134, 2, 1, '2023-12-10', '22:53:54', 14039.10, 'p4'),
(135, 2, 2, '2023-12-10', '22:53:54', 2001.30, 'p4'),
(136, 2, 1, '2024-01-05', '15:37:21', 0.00, 'p5'),
(137, 2, 1, '2024-01-05', '15:37:21', 0.00, 'p5'),
(138, 2, 1, '2024-01-05', '15:50:07', 0.00, 'p3'),
(139, 2, 1, '2024-01-05', '15:50:07', 1005.00, 'p3'),
(140, 2, 1, '2024-01-06', '18:15:56', 0.00, 'p5'),
(141, 2, 1, '2024-01-06', '18:16:04', 0.00, 'p1'),
(151, 2, 1, '2024-01-06', '18:16:38', 4703.02, 'p1'),
(152, 2, 1, '2024-01-06', '19:32:31', 0.00, 'p5'),
(153, 2, 1, '2024-01-06', '19:32:49', 433.50, 'p5'),
(156, 3, 1, '2024-01-08', '14:39:13', 468.91, 'p5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id_venta` int(8) NOT NULL,
  `id_producto` int(4) NOT NULL,
  `tiempo_surtido` int(2) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` float(8,2) NOT NULL,
  `descuento` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id_venta`, `id_producto`, `tiempo_surtido`, `cantidad`, `precio`, `descuento`) VALUES
(126, 2, 2, 1, 15599.00, 10),
(127, 1, 3, 1, 2859.00, 30),
(128, 2, 2, 2, 15599.00, 10),
(129, 1, 3, 5, 2859.00, 30),
(130, 2, 2, 1, 15599.00, 10),
(131, 1, 3, 1, 2859.00, 0),
(132, 2, 2, 1, 15599.00, 10),
(133, 1, 3, 1, 2859.00, 30),
(134, 2, 2, 1, 15599.00, 10),
(135, 1, 3, 1, 2859.00, 30),
(151, 3, 7, 1, 4799.00, 2),
(152, 10, 7, 1, 850.00, 49),
(153, 10, 7, 1, 850.00, 49),
(0, 7, 7, 1, 664.30, 30),
(0, 16, 7, 2, 19.50, 90),
(156, 7, 7, 1, 664.30, 30),
(156, 16, 7, 2, 19.50, 90);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`,`id_usuario`);

--
-- Indices de la tabla `carrito_detalle`
--
ALTER TABLE `carrito_detalle`
  ADD PRIMARY KEY (`id_carrito`,`id_producto`);

--
-- Indices de la tabla `direccion_clientes`
--
ALTER TABLE `direccion_clientes`
  ADD PRIMARY KEY (`id_direccioncliente`,`id_usuario`) USING BTREE;

--
-- Indices de la tabla `direccion_proveedores`
--
ALTER TABLE `direccion_proveedores`
  ADD PRIMARY KEY (`id_direccionproveedor`,`id_proveedor`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`) USING BTREE;

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `direccion_clientes`
--
ALTER TABLE `direccion_clientes`
  MODIFY `id_direccioncliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `direccion_proveedores`
--
ALTER TABLE `direccion_proveedores`
  MODIFY `id_direccionproveedor` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
