-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 17-02-2025 a las 22:29:49
-- Versión del servidor: 5.7.34
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `api_rest_mapas1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `code`, `title`) VALUES
(1, 'AD', 'Andorra'),
(2, 'AE', 'United Arab Emirates'),
(3, 'AF', 'Afghanistan'),
(4, 'AG', 'Antigua and Barbuda'),
(5, 'AI', 'Anguilla'),
(6, 'AL', 'Albania'),
(7, 'AM', 'Armenia'),
(8, 'AO', 'Angola'),
(9, 'AR', 'Argentina'),
(10, 'AS', 'American Samoa'),
(11, 'AT', 'Austria'),
(12, 'AU', 'Australia'),
(13, 'AW', 'Aruba'),
(14, 'AX', 'Aland Islands'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BA', 'Bosnia and Herzegovina'),
(17, 'BB', 'Barbados'),
(18, 'BD', 'Bangladesh'),
(19, 'BE', 'Belgium'),
(20, 'BF', 'Burkina Faso'),
(21, 'BG', 'Bulgaria'),
(22, 'BH', 'Bahrain'),
(23, 'BI', 'Burundi'),
(24, 'BJ', 'Benin'),
(25, 'BL', 'Saint Barthelemy'),
(26, 'BN', 'Brunei Darussalam'),
(27, 'BO', 'Bolivia'),
(28, 'BM', 'Bermuda'),
(29, 'BQ', 'Bonaire, Sint Eustatius and Saba'),
(30, 'BR', 'Brazil'),
(31, 'BS', 'Bahamas'),
(32, 'BT', 'Bhutan'),
(33, 'BV', 'Bouvet Island'),
(34, 'BW', 'Botswana'),
(35, 'BY', 'Belarus'),
(36, 'BZ', 'Belize'),
(37, 'CA', 'Canada'),
(38, 'CC', 'Cocos (Keeling) Islands'),
(39, 'CD', 'Democratic Republic of Congo'),
(40, 'CF', 'Central African Republic'),
(41, 'CG', 'Republic of Congo'),
(42, 'CH', 'Switzerland'),
(43, 'CI', 'Côte d\'Ivoire'),
(44, 'CK', 'Cook Islands'),
(45, 'CL', 'Chile'),
(46, 'CM', 'Cameroon'),
(47, 'CN', 'China'),
(48, 'CO', 'Colombia'),
(49, 'CR', 'Costa Rica'),
(50, 'CU', 'Cuba'),
(51, 'CV', 'Cape Verde'),
(52, 'CW', 'Curaçao'),
(53, 'CX', 'Christmas Island'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DE', 'Germany'),
(57, 'DJ', 'Djibouti'),
(58, 'DK', 'Denmark'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'DZ', 'Algeria'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'EE', 'Estonia'),
(65, 'EH', 'Western Sahara'),
(66, 'ER', 'Eritrea'),
(67, 'ES', 'Spain'),
(68, 'ET', 'Ethiopia'),
(69, 'FI', 'Finland'),
(70, 'ET', 'Ethiopia'),
(71, 'FJ', 'Fiji'),
(72, 'FK', 'Falkland Islands'),
(73, 'FM', 'Federated States of Micronesia'),
(74, 'FO', 'Faroe Islands'),
(75, 'FR', 'France'),
(76, 'GA', 'Gabon'),
(77, 'GB', 'United Kingdom'),
(78, 'GE', 'Georgia'),
(79, 'GD', 'Grenada'),
(80, 'GG', 'Guernsey'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GL', 'Greenland'),
(84, 'GM', 'Gambia'),
(85, 'GN', 'Guinea'),
(86, 'GO', 'Glorioso Islands'),
(87, 'GP', 'Guadeloupe'),
(88, 'GQ', 'Equatorial Guinea'),
(89, 'GR', 'Greece'),
(90, 'GS', 'South Georgia and South Sandwich Islands'),
(91, 'GT', 'Guatemala'),
(92, 'GU', 'Guam'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HK', 'Hong Kong'),
(96, 'HM', 'Heard Island and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HR', 'Croatia'),
(99, 'HT', 'Haiti'),
(100, 'HU', 'Hungary'),
(101, 'ID', 'Indonesia'),
(102, 'IE', 'Ireland'),
(103, 'IL', 'Israel'),
(104, 'IM', 'Isle of Man'),
(105, 'IN', 'India'),
(106, 'IO', 'British Indian Ocean Territory'),
(107, 'IQ', 'Iraq'),
(108, 'IR', 'Iran'),
(109, 'IS', 'Iceland'),
(110, 'IT', 'Italy'),
(111, 'JE', 'Jersey'),
(112, 'JM', 'Jamaica'),
(113, 'JO', 'Jordan'),
(114, 'JP', 'Japan'),
(115, 'JU', 'Juan De Nova Island'),
(116, 'KE', 'Kenya'),
(117, 'KG', 'Kyrgyzstan'),
(118, 'KH', 'Cambodia'),
(119, 'KI', 'Kiribati'),
(120, 'KM', 'Comoros'),
(121, 'KN', 'Saint Kitts and Nevis'),
(122, 'KP', 'North Korea'),
(123, 'KR', 'South Korea'),
(124, 'KR', 'South Korea'),
(125, 'XK', 'Kosovo'),
(126, 'KW', 'Kuwait'),
(127, 'KY', 'Cayman Islands'),
(128, 'KZ', 'Kazakhstan'),
(129, 'LA', 'Lao People\'s Democratic Republic'),
(130, 'LB', 'Lebanon'),
(131, 'LC', 'Saint Lucia'),
(132, 'LI', 'Liechtenstein'),
(133, 'LK', 'Sri Lanka'),
(134, 'LR', 'Liberia'),
(135, 'LS', 'Lesotho'),
(136, 'LT', 'Lithuania'),
(137, 'LU', 'Luxembourg'),
(138, 'LV', 'Latvia'),
(139, 'LY', 'Libya'),
(140, 'MA', 'Morocco'),
(141, 'MC', 'Monaco'),
(142, 'MD', 'Moldova'),
(143, 'MG', 'Madagascar'),
(144, 'ME', 'Montenegro'),
(145, 'MF', 'Saint Martin'),
(146, 'MH', 'Marshall Islands'),
(147, 'MK', 'Macedonia'),
(148, 'ML', 'Mali'),
(149, 'MO', 'Macau'),
(150, 'MM', 'Myanmar'),
(151, 'MN', 'Mongolia'),
(152, 'MP', 'Northern Mariana Islands'),
(153, 'MQ', 'Martinique'),
(154, 'MR', 'Mauritania'),
(155, 'MS', 'Montserrat'),
(156, 'MT', 'Malta'),
(157, 'MU', 'Mauritius'),
(158, 'MV', 'Maldives'),
(159, 'MW', 'Malawi'),
(160, 'MX', 'Mexico'),
(161, 'MY', 'Malaysia'),
(162, 'MZ', 'Mozambique'),
(163, 'NA', 'Namibia'),
(164, 'NC', 'New Caledonia'),
(165, 'NE', 'Niger'),
(166, 'NF', 'Norfolk Island'),
(167, 'NG', 'Nigeria'),
(168, 'NI', 'Nicaragua'),
(169, 'NL', 'Netherlands'),
(170, 'NO', 'Norway'),
(171, 'NP', 'Nepal'),
(172, 'NR', 'Nauru'),
(173, 'NU', 'Niue'),
(174, 'NZ', 'New Zealand'),
(175, 'OM', 'Oman'),
(176, 'PA', 'Panama'),
(177, 'OM', 'Oman'),
(178, 'PE', 'Peru'),
(179, 'PF', 'French Polynesia'),
(180, 'PG', 'Papua New Guinea'),
(181, 'PH', 'Philippines'),
(182, 'PK', 'Pakistan'),
(183, 'PL', 'Poland'),
(184, 'PM', 'Saint Pierre and Miquelon'),
(185, 'PN', 'Pitcairn Islands'),
(186, 'PR', 'Puerto Rico'),
(187, 'PS', 'Palestinian Territories'),
(188, 'PT', 'Portugal'),
(189, 'PW', 'Palau'),
(190, 'PY', 'Paraguay'),
(191, 'QA', 'Qatar'),
(192, 'RE', 'Reunion'),
(193, 'RO', 'Romania'),
(194, 'RS', 'Serbia'),
(195, 'RU', 'Russia'),
(196, 'RW', 'Rwanda'),
(197, 'SA', 'Saudi Arabia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SC', 'Seychelles'),
(200, 'SD', 'Sudan'),
(201, 'SE', 'Sweden'),
(202, 'SG', 'Singapore'),
(203, 'SH', 'Saint Helena'),
(204, 'SI', 'Slovenia'),
(205, 'SJ', 'Svalbard and Jan Mayen'),
(206, 'SK', 'Slovakia'),
(207, 'SL', 'Sierra Leone'),
(208, 'SM', 'San Marino'),
(209, 'SN', 'Senegal'),
(210, 'SO', 'Somalia'),
(211, 'SR', 'Suriname'),
(212, 'SS', 'South Sudan'),
(213, 'ST', 'Sao Tome and Principe'),
(214, 'SV', 'El Salvador'),
(215, 'SX', 'Sint Maarten'),
(216, 'SY', 'Syria'),
(217, 'SZ', 'Swaziland'),
(218, 'TC', 'Turks and Caicos Islands'),
(219, 'TD', 'Chad'),
(220, 'TF', 'French Southern and Antarctic Lands'),
(221, 'TG', 'Togo'),
(222, 'TH', 'Thailand'),
(223, 'TJ', 'Tajikistan'),
(224, 'TK', 'Tokelau'),
(225, 'TL', 'Timor-Leste'),
(226, 'TM', 'Turkmenistan'),
(227, 'TN', 'Tunisia'),
(228, 'TO', 'Tonga'),
(229, 'TR', 'Turkey'),
(230, 'TT', 'Trinidad and Tobago'),
(231, 'TV', 'Tuvalu'),
(232, 'TW', 'Taiwan'),
(233, 'TZ', 'Tanzania'),
(234, 'UA', 'Ukraine'),
(235, 'UG', 'Uganda'),
(236, 'UM-DQ', 'Jarvis Island'),
(237, 'UM-FQ', 'Baker Island'),
(238, 'UM-HQ', 'Howland Island'),
(239, 'UM-JQ', 'Johnston Atoll'),
(240, 'UM-MQ', 'Midway Islands'),
(241, 'UM-WQ', 'Wake Island'),
(242, 'US', 'United States'),
(243, 'UY', 'Uruguay'),
(244, 'UZ', 'Uzbekistan'),
(245, 'VA', 'Vatican City'),
(246, 'VC', 'Saint Vincent and the Grenadines'),
(247, 'VE', 'Venezuela'),
(248, 'VG', 'British Virgin Islands'),
(249, 'VI', 'US Virgin Islands'),
(250, 'VN', 'Vietnam'),
(251, 'VU', 'Vanuatu'),
(252, 'WF', 'Wallis and Futuna'),
(253, 'WS', 'Samoa'),
(254, 'YE', 'Yemen'),
(255, 'YT', 'Mayotte'),
(256, 'ZA', 'South Africa'),
(257, 'ZM', 'Zambia'),
(258, 'ZW', 'Zimbabwe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
