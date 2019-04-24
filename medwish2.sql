-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 23 avr. 2019 à 08:21
-- Version du serveur :  10.2.23-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `medwish`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE `appartenir` (
  `Soc_Id` int(11) NOT NULL,
  `Users_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE `country` (
  `Country_id` int(11) NOT NULL,
  `Country_code` int(11) NOT NULL,
  `Country_alpha2` varchar(3) NOT NULL,
  `Country_alpha3` varchar(3) NOT NULL,
  `Country_en_gb` varchar(45) NOT NULL,
  `Country_fr_fr` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `country`
--

INSERT INTO `country` (`Country_id`, `Country_code`, `Country_alpha2`, `Country_alpha3`, `Country_en_gb`, `Country_fr_fr`) VALUES
(1, 4, 'AF', 'AFG', 'Afghanistan', 'Afghanistan'),
(2, 8, 'AL', 'ALB', 'Albania', 'Albanie'),
(3, 10, 'AQ', 'ATA', 'Antarctica', 'Antarctique'),
(4, 12, 'DZ', 'DZA', 'Algeria', 'Algérie'),
(5, 16, 'AS', 'ASM', 'American Samoa', 'Samoa Américaines'),
(6, 20, 'AD', 'AND', 'Andorra', 'Andorre'),
(7, 24, 'AO', 'AGO', 'Angola', 'Angola'),
(8, 28, 'AG', 'ATG', 'Antigua and Barbuda', 'Antigua-et-Barbuda'),
(9, 31, 'AZ', 'AZE', 'Azerbaijan', 'Azerbaïdjan'),
(10, 32, 'AR', 'ARG', 'Argentina', 'Argentine'),
(11, 36, 'AU', 'AUS', 'Australia', 'Australie'),
(12, 40, 'AT', 'AUT', 'Austria', 'Autriche'),
(13, 44, 'BS', 'BHS', 'Bahamas', 'Bahamas'),
(14, 48, 'BH', 'BHR', 'Bahrain', 'Bahreïn'),
(15, 50, 'BD', 'BGD', 'Bangladesh', 'Bangladesh'),
(16, 51, 'AM', 'ARM', 'Armenia', 'Arménie'),
(17, 52, 'BB', 'BRB', 'Barbados', 'Barbade'),
(18, 56, 'BE', 'BEL', 'Belgium', 'Belgique'),
(19, 60, 'BM', 'BMU', 'Bermuda', 'Bermudes'),
(20, 64, 'BT', 'BTN', 'Bhutan', 'Bhoutan'),
(21, 68, 'BO', 'BOL', 'Bolivia', 'Bolivie'),
(22, 70, 'BA', 'BIH', 'Bosnia and Herzegovina', 'Bosnie-Herzégovine'),
(23, 72, 'BW', 'BWA', 'Botswana', 'Botswana'),
(24, 74, 'BV', 'BVT', 'Bouvet Island', 'Île Bouvet'),
(25, 76, 'BR', 'BRA', 'Brazil', 'Brésil'),
(26, 84, 'BZ', 'BLZ', 'Belize', 'Belize'),
(27, 86, 'IO', 'IOT', 'British Indian Ocean Territory', 'Territoire Britannique de l\'Océan Indien'),
(28, 90, 'SB', 'SLB', 'Solomon Islands', 'Îles Salomon'),
(29, 92, 'VG', 'VGB', 'British Virgin Islands', 'Îles Vierges Britanniques'),
(30, 96, 'BN', 'BRN', 'Brunei Darussalam', 'Brunéi Darussalam'),
(31, 100, 'BG', 'BGR', 'Bulgaria', 'Bulgarie'),
(32, 104, 'MM', 'MMR', 'Myanmar', 'Myanmar'),
(33, 108, 'BI', 'BDI', 'Burundi', 'Burundi'),
(34, 112, 'BY', 'BLR', 'Belarus', 'Bélarus'),
(35, 116, 'KH', 'KHM', 'Cambodia', 'Cambodge'),
(36, 120, 'CM', 'CMR', 'Cameroon', 'Cameroun'),
(37, 124, 'CA', 'CAN', 'Canada', 'Canada'),
(38, 132, 'CV', 'CPV', 'Cape Verde', 'Cap-vert'),
(39, 136, 'KY', 'CYM', 'Cayman Islands', 'Îles Caïmanes'),
(40, 140, 'CF', 'CAF', 'Central African', 'République Centrafricaine'),
(41, 144, 'LK', 'LKA', 'Sri Lanka', 'Sri Lanka'),
(42, 148, 'TD', 'TCD', 'Chad', 'Tchad'),
(43, 152, 'CL', 'CHL', 'Chile', 'Chili'),
(44, 156, 'CN', 'CHN', 'China', 'Chine'),
(45, 158, 'TW', 'TWN', 'Taiwan', 'Taïwan'),
(46, 162, 'CX', 'CXR', 'Christmas Island', 'Île Christmas'),
(47, 166, 'CC', 'CCK', 'Cocos (Keeling) Islands', 'Îles Cocos (Keeling)'),
(48, 170, 'CO', 'COL', 'Colombia', 'Colombie'),
(49, 174, 'KM', 'COM', 'Comoros', 'Comores'),
(50, 175, 'YT', 'MYT', 'Mayotte', 'Mayotte'),
(51, 178, 'CG', 'COG', 'Republic of the Congo', 'République du Congo'),
(52, 180, 'CD', 'COD', 'The Democratic Republic Of The Congo', 'République Démocratique du Congo'),
(53, 184, 'CK', 'COK', 'Cook Islands', 'Îles Cook'),
(54, 188, 'CR', 'CRI', 'Costa Rica', 'Costa Rica'),
(55, 191, 'HR', 'HRV', 'Croatia', 'Croatie'),
(56, 192, 'CU', 'CUB', 'Cuba', 'Cuba'),
(57, 196, 'CY', 'CYP', 'Cyprus', 'Chypre'),
(58, 203, 'CZ', 'CZE', 'Czech Republic', 'République Tchèque'),
(59, 204, 'BJ', 'BEN', 'Benin', 'Bénin'),
(60, 208, 'DK', 'DNK', 'Denmark', 'Danemark'),
(61, 212, 'DM', 'DMA', 'Dominica', 'Dominique'),
(62, 214, 'DO', 'DOM', 'Dominican Republic', 'République Dominicaine'),
(63, 218, 'EC', 'ECU', 'Ecuador', 'Équateur'),
(64, 222, 'SV', 'SLV', 'El Salvador', 'El Salvador'),
(65, 226, 'GQ', 'GNQ', 'Equatorial Guinea', 'Guinée Équatoriale'),
(66, 231, 'ET', 'ETH', 'Ethiopia', 'Éthiopie'),
(67, 232, 'ER', 'ERI', 'Eritrea', 'Érythrée'),
(68, 233, 'EE', 'EST', 'Estonia', 'Estonie'),
(69, 234, 'FO', 'FRO', 'Faroe Islands', 'Îles Féroé'),
(70, 238, 'FK', 'FLK', 'Falkland Islands', 'Îles (malvinas) Falkland'),
(71, 239, 'GS', 'SGS', 'South Georgia and the South Sandwich Islands', 'Géorgie du Sud et les Îles Sandwich du Sud'),
(72, 242, 'FJ', 'FJI', 'Fiji', 'Fidji'),
(73, 246, 'FI', 'FIN', 'Finland', 'Finlande'),
(74, 248, 'AX', 'ALA', 'Åland Islands', 'Îles Åland'),
(75, 250, 'FR', 'FRA', 'France', 'France'),
(76, 254, 'GF', 'GUF', 'French Guiana', 'Guyane Française'),
(77, 258, 'PF', 'PYF', 'French Polynesia', 'Polynésie Française'),
(78, 260, 'TF', 'ATF', 'French Southern Territories', 'Terres Australes Françaises'),
(79, 262, 'DJ', 'DJI', 'Djibouti', 'Djibouti'),
(80, 266, 'GA', 'GAB', 'Gabon', 'Gabon'),
(81, 268, 'GE', 'GEO', 'Georgia', 'Géorgie'),
(82, 270, 'GM', 'GMB', 'Gambia', 'Gambie'),
(83, 275, 'PS', 'PSE', 'Occupied Palestinian Territory', 'Territoire Palestinien Occupé'),
(84, 276, 'DE', 'DEU', 'Germany', 'Allemagne'),
(85, 288, 'GH', 'GHA', 'Ghana', 'Ghana'),
(86, 292, 'GI', 'GIB', 'Gibraltar', 'Gibraltar'),
(87, 296, 'KI', 'KIR', 'Kiribati', 'Kiribati'),
(88, 300, 'GR', 'GRC', 'Greece', 'Grèce'),
(89, 304, 'GL', 'GRL', 'Greenland', 'Groenland'),
(90, 308, 'GD', 'GRD', 'Grenada', 'Grenade'),
(91, 312, 'GP', 'GLP', 'Guadeloupe', 'Guadeloupe'),
(92, 316, 'GU', 'GUM', 'Guam', 'Guam'),
(93, 320, 'GT', 'GTM', 'Guatemala', 'Guatemala'),
(94, 324, 'GN', 'GIN', 'Guinea', 'Guinée'),
(95, 328, 'GY', 'GUY', 'Guyana', 'Guyana'),
(96, 332, 'HT', 'HTI', 'Haiti', 'Haïti'),
(97, 334, 'HM', 'HMD', 'Heard Island and McDonald Islands', 'Îles Heard et Mcdonald'),
(98, 336, 'VA', 'VAT', 'Vatican City State', 'Saint-Siège (état de la Cité du Vatican)'),
(99, 340, 'HN', 'HND', 'Honduras', 'Honduras'),
(100, 344, 'HK', 'HKG', 'Hong Kong', 'Hong-Kong'),
(101, 348, 'HU', 'HUN', 'Hungary', 'Hongrie'),
(102, 352, 'IS', 'ISL', 'Iceland', 'Islande'),
(103, 356, 'IN', 'IND', 'India', 'Inde'),
(104, 360, 'ID', 'IDN', 'Indonesia', 'Indonésie'),
(105, 364, 'IR', 'IRN', 'Islamic Republic of Iran', 'République Islamique d\'Iran'),
(106, 368, 'IQ', 'IRQ', 'Iraq', 'Iraq'),
(107, 372, 'IE', 'IRL', 'Ireland', 'Irlande'),
(108, 376, 'IL', 'ISR', 'Israel', 'Israël'),
(109, 380, 'IT', 'ITA', 'Italy', 'Italie'),
(110, 384, 'CI', 'CIV', 'Côte d\'Ivoire', 'Côte d\'Ivoire'),
(111, 388, 'JM', 'JAM', 'Jamaica', 'Jamaïque'),
(112, 392, 'JP', 'JPN', 'Japan', 'Japon'),
(113, 398, 'KZ', 'KAZ', 'Kazakhstan', 'Kazakhstan'),
(114, 400, 'JO', 'JOR', 'Jordan', 'Jordanie'),
(115, 404, 'KE', 'KEN', 'Kenya', 'Kenya'),
(116, 408, 'KP', 'PRK', 'Democratic People\'s Republic of Korea', 'République Populaire Démocratique de Corée'),
(117, 410, 'KR', 'KOR', 'Republic of Korea', 'République de Corée'),
(118, 414, 'KW', 'KWT', 'Kuwait', 'Koweït'),
(119, 417, 'KG', 'KGZ', 'Kyrgyzstan', 'Kirghizistan'),
(120, 418, 'LA', 'LAO', 'Lao People\'s Democratic Republic', 'République Démocratique Populaire Lao'),
(121, 422, 'LB', 'LBN', 'Lebanon', 'Liban'),
(122, 426, 'LS', 'LSO', 'Lesotho', 'Lesotho'),
(123, 428, 'LV', 'LVA', 'Latvia', 'Lettonie'),
(124, 430, 'LR', 'LBR', 'Liberia', 'Libéria'),
(125, 434, 'LY', 'LBY', 'Libyan Arab Jamahiriya', 'Jamahiriya Arabe Libyenne'),
(126, 438, 'LI', 'LIE', 'Liechtenstein', 'Liechtenstein'),
(127, 440, 'LT', 'LTU', 'Lithuania', 'Lituanie'),
(128, 442, 'LU', 'LUX', 'Luxembourg', 'Luxembourg'),
(129, 446, 'MO', 'MAC', 'Macao', 'Macao'),
(130, 450, 'MG', 'MDG', 'Madagascar', 'Madagascar'),
(131, 454, 'MW', 'MWI', 'Malawi', 'Malawi'),
(132, 458, 'MY', 'MYS', 'Malaysia', 'Malaisie'),
(133, 462, 'MV', 'MDV', 'Maldives', 'Maldives'),
(134, 466, 'ML', 'MLI', 'Mali', 'Mali'),
(135, 470, 'MT', 'MLT', 'Malta', 'Malte'),
(136, 474, 'MQ', 'MTQ', 'Martinique', 'Martinique'),
(137, 478, 'MR', 'MRT', 'Mauritania', 'Mauritanie'),
(138, 480, 'MU', 'MUS', 'Mauritius', 'Maurice'),
(139, 484, 'MX', 'MEX', 'Mexico', 'Mexique'),
(140, 492, 'MC', 'MCO', 'Monaco', 'Monaco'),
(141, 496, 'MN', 'MNG', 'Mongolia', 'Mongolie'),
(142, 498, 'MD', 'MDA', 'Republic of Moldova', 'République de Moldova'),
(143, 500, 'MS', 'MSR', 'Montserrat', 'Montserrat'),
(144, 504, 'MA', 'MAR', 'Morocco', 'Maroc'),
(145, 508, 'MZ', 'MOZ', 'Mozambique', 'Mozambique'),
(146, 512, 'OM', 'OMN', 'Oman', 'Oman'),
(147, 516, 'NA', 'NAM', 'Namibia', 'Namibie'),
(148, 520, 'NR', 'NRU', 'Nauru', 'Nauru'),
(149, 524, 'NP', 'NPL', 'Nepal', 'Népal'),
(150, 528, 'NL', 'NLD', 'Netherlands', 'Pays-Bas'),
(151, 530, 'AN', 'ANT', 'Netherlands Antilles', 'Antilles Néerlandaises'),
(152, 533, 'AW', 'ABW', 'Aruba', 'Aruba'),
(153, 540, 'NC', 'NCL', 'New Caledonia', 'Nouvelle-Calédonie'),
(154, 548, 'VU', 'VUT', 'Vanuatu', 'Vanuatu'),
(155, 554, 'NZ', 'NZL', 'New Zealand', 'Nouvelle-Zélande'),
(156, 558, 'NI', 'NIC', 'Nicaragua', 'Nicaragua'),
(157, 562, 'NE', 'NER', 'Niger', 'Niger'),
(158, 566, 'NG', 'NGA', 'Nigeria', 'Nigéria'),
(159, 570, 'NU', 'NIU', 'Niue', 'Niué'),
(160, 574, 'NF', 'NFK', 'Norfolk Island', 'Île Norfolk'),
(161, 578, 'NO', 'NOR', 'Norway', 'Norvège'),
(162, 580, 'MP', 'MNP', 'Northern Mariana Islands', 'Îles Mariannes du Nord'),
(163, 581, 'UM', 'UMI', 'United States Minor Outlying Islands', 'Îles Mineures Éloignées des États-Unis'),
(164, 583, 'FM', 'FSM', 'Federated States of Micronesia', 'États Fédérés de Micronésie'),
(165, 584, 'MH', 'MHL', 'Marshall Islands', 'Îles Marshall'),
(166, 585, 'PW', 'PLW', 'Palau', 'Palaos'),
(167, 586, 'PK', 'PAK', 'Pakistan', 'Pakistan'),
(168, 591, 'PA', 'PAN', 'Panama', 'Panama'),
(169, 598, 'PG', 'PNG', 'Papua New Guinea', 'Papouasie-Nouvelle-Guinée'),
(170, 600, 'PY', 'PRY', 'Paraguay', 'Paraguay'),
(171, 604, 'PE', 'PER', 'Peru', 'Pérou'),
(172, 608, 'PH', 'PHL', 'Philippines', 'Philippines'),
(173, 612, 'PN', 'PCN', 'Pitcairn', 'Pitcairn'),
(174, 616, 'PL', 'POL', 'Poland', 'Pologne'),
(175, 620, 'PT', 'PRT', 'Portugal', 'Portugal'),
(176, 624, 'GW', 'GNB', 'Guinea-Bissau', 'Guinée-Bissau'),
(177, 626, 'TL', 'TLS', 'Timor-Leste', 'Timor-Leste'),
(178, 630, 'PR', 'PRI', 'Puerto Rico', 'Porto Rico'),
(179, 634, 'QA', 'QAT', 'Qatar', 'Qatar'),
(180, 638, 'RE', 'REU', 'Réunion', 'Réunion'),
(181, 642, 'RO', 'ROU', 'Romania', 'Roumanie'),
(182, 643, 'RU', 'RUS', 'Russian Federation', 'Fédération de Russie'),
(183, 646, 'RW', 'RWA', 'Rwanda', 'Rwanda'),
(184, 654, 'SH', 'SHN', 'Saint Helena', 'Sainte-Hélène'),
(185, 659, 'KN', 'KNA', 'Saint Kitts and Nevis', 'Saint-Kitts-et-Nevis'),
(186, 660, 'AI', 'AIA', 'Anguilla', 'Anguilla'),
(187, 662, 'LC', 'LCA', 'Saint Lucia', 'Sainte-Lucie'),
(188, 666, 'PM', 'SPM', 'Saint-Pierre and Miquelon', 'Saint-Pierre-et-Miquelon'),
(189, 670, 'VC', 'VCT', 'Saint Vincent and the Grenadines', 'Saint-Vincent-et-les Grenadines'),
(190, 674, 'SM', 'SMR', 'San Marino', 'Saint-Marin'),
(191, 678, 'ST', 'STP', 'Sao Tome and Principe', 'Sao Tomé-et-Principe'),
(192, 682, 'SA', 'SAU', 'Saudi Arabia', 'Arabie Saoudite'),
(193, 686, 'SN', 'SEN', 'Senegal', 'Sénégal'),
(194, 690, 'SC', 'SYC', 'Seychelles', 'Seychelles'),
(195, 694, 'SL', 'SLE', 'Sierra Leone', 'Sierra Leone'),
(196, 702, 'SG', 'SGP', 'Singapore', 'Singapour'),
(197, 703, 'SK', 'SVK', 'Slovakia', 'Slovaquie'),
(198, 704, 'VN', 'VNM', 'Vietnam', 'Viet Nam'),
(199, 705, 'SI', 'SVN', 'Slovenia', 'Slovénie'),
(200, 706, 'SO', 'SOM', 'Somalia', 'Somalie'),
(201, 710, 'ZA', 'ZAF', 'South Africa', 'Afrique du Sud'),
(202, 716, 'ZW', 'ZWE', 'Zimbabwe', 'Zimbabwe'),
(203, 724, 'ES', 'ESP', 'Spain', 'Espagne'),
(204, 732, 'EH', 'ESH', 'Western Sahara', 'Sahara Occidental'),
(205, 736, 'SD', 'SDN', 'Sudan', 'Soudan'),
(206, 740, 'SR', 'SUR', 'Suriname', 'Suriname'),
(207, 744, 'SJ', 'SJM', 'Svalbard and Jan Mayen', 'Svalbard etÎle Jan Mayen'),
(208, 748, 'SZ', 'SWZ', 'Swaziland', 'Swaziland'),
(209, 752, 'SE', 'SWE', 'Sweden', 'Suède'),
(210, 756, 'CH', 'CHE', 'Switzerland', 'Suisse'),
(211, 760, 'SY', 'SYR', 'Syrian Arab Republic', 'République Arabe Syrienne'),
(212, 762, 'TJ', 'TJK', 'Tajikistan', 'Tadjikistan'),
(213, 764, 'TH', 'THA', 'Thailand', 'Thaïlande'),
(214, 768, 'TG', 'TGO', 'Togo', 'Togo'),
(215, 772, 'TK', 'TKL', 'Tokelau', 'Tokelau'),
(216, 776, 'TO', 'TON', 'Tonga', 'Tonga'),
(217, 780, 'TT', 'TTO', 'Trinidad and Tobago', 'Trinité-et-Tobago'),
(218, 784, 'AE', 'ARE', 'United Arab Emirates', 'Émirats Arabes Unis'),
(219, 788, 'TN', 'TUN', 'Tunisia', 'Tunisie'),
(220, 792, 'TR', 'TUR', 'Turkey', 'Turquie'),
(221, 795, 'TM', 'TKM', 'Turkmenistan', 'Turkménistan'),
(222, 796, 'TC', 'TCA', 'Turks and Caicos Islands', 'Îles Turks et Caïques'),
(223, 798, 'TV', 'TUV', 'Tuvalu', 'Tuvalu'),
(224, 800, 'UG', 'UGA', 'Uganda', 'Ouganda'),
(225, 804, 'UA', 'UKR', 'Ukraine', 'Ukraine'),
(226, 807, 'MK', 'MKD', 'The Former Yugoslav Republic of Macedonia', 'L\'ex-République Yougoslave de Macédoine'),
(227, 818, 'EG', 'EGY', 'Egypt', 'Égypte'),
(228, 826, 'GB', 'GBR', 'United Kingdom', 'Royaume-Uni'),
(229, 833, 'IM', 'IMN', 'Isle of Man', 'Île de Man'),
(230, 834, 'TZ', 'TZA', 'United Republic Of Tanzania', 'République-Unie de Tanzanie'),
(231, 840, 'US', 'USA', 'United States', 'États-Unis'),
(232, 850, 'VI', 'VIR', 'U.S. Virgin Islands', 'Îles Vierges des États-Unis'),
(233, 854, 'BF', 'BFA', 'Burkina Faso', 'Burkina Faso'),
(234, 858, 'UY', 'URY', 'Uruguay', 'Uruguay'),
(235, 860, 'UZ', 'UZB', 'Uzbekistan', 'Ouzbékistan'),
(236, 862, 'VE', 'VEN', 'Venezuela', 'Venezuela'),
(237, 876, 'WF', 'WLF', 'Wallis and Futuna', 'Wallis et Futuna'),
(238, 882, 'WS', 'WSM', 'Samoa', 'Samoa'),
(239, 887, 'YE', 'YEM', 'Yemen', 'Yémen'),
(240, 891, 'CS', 'SCG', 'Serbia and Montenegro', 'Serbie-et-Monténégro'),
(241, 894, 'ZM', 'ZMB', 'Zambia', 'Zambie');

-- --------------------------------------------------------

--
-- Structure de la table `evidence`
--

CREATE TABLE `evidence` (
  `Evi_Id` int(30) NOT NULL,
  `Evi_Type` varchar(50) NOT NULL,
  `Evi_Document` varchar(50) NOT NULL,
  `Evi_numDoc` varchar(50) NOT NULL,
  `Evi_Selfie` varchar(50) NOT NULL,
  `Evi_Conf` tinyint(1) NOT NULL,
  `Evi_Users_Id` int(11) NOT NULL,
  `Evi_Soc_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evidence`
--

INSERT INTO `evidence` (`Evi_Id`, `Evi_Type`, `Evi_Document`, `Evi_numDoc`, `Evi_Selfie`, `Evi_Conf`, `Evi_Users_Id`, `Evi_Soc_Id`) VALUES
(6, 'Permis de conduire', 'png', '123', 'png', 0, 8, NULL),
(7, 'Visa Immigrant - Carte Verte', 'png', '86387396', 'jpeg', 0, 1, NULL),
(8, 'Carte nationale d\'identité', 'jpeg', '566744', 'jpeg', 0, 7, NULL),
(9, 'Visa Immigrant - Carte Verte', 'png', '1234567', 'png', 0, 9, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `nationality`
--

CREATE TABLE `nationality` (
  `Nationality_Id` int(11) NOT NULL,
  `Nationality_Fr` varchar(50) NOT NULL,
  `Nationality_En` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `nationality`
--

INSERT INTO `nationality` (`Nationality_Id`, `Nationality_Fr`, `Nationality_En`) VALUES
(1, 'Afghane', 'Afghan'),
(2, 'Albanaise', 'Albanian'),
(3, 'Algérienne', 'Algerian'),
(4, 'Americaine', 'American'),
(5, 'Andorrane', 'Andorran'),
(6, 'Angolaise', 'Angolan'),
(7, 'Antiguaise', 'Antiguans'),
(8, 'Argentine', 'Argentinean'),
(9, 'Armenienne', 'Armenian'),
(10, 'Australienne', 'Australian'),
(11, 'Autrichienne', 'Austrian'),
(12, 'Azerbaïdjanaise', 'Azerbaijani'),
(13, 'Bahamienne', 'Bahamian'),
(14, 'Bahreïnienne', 'Bahraini'),
(15, 'Bangladaise', 'Bangladeshi'),
(16, 'Barbadienne', 'Barbadian'),
(17, 'Barbudane', 'Barbudans'),
(18, 'Botswanaise', 'Batswana'),
(19, 'Bielorusse', 'Belarusian'),
(20, 'Belge', 'Belgian'),
(21, 'Bélizienne', 'Belizean'),
(22, 'Béninoise', 'Beninese'),
(23, 'Bhoutanaise', 'Bhutanese'),
(24, 'Bolivienne', 'Bolivian'),
(25, 'Bosniaque', 'Bosnian'),
(26, 'Brezilienne', 'Brazilian'),
(27, 'Anglaise', 'British'),
(28, 'Brunéienne', 'Bruneian'),
(29, 'Bulgare', 'Bulgarian'),
(30, 'Burkinabée', 'Burkinabe'),
(31, 'Birmane', 'Burmese'),
(32, 'Burundaise', 'Burundian'),
(33, 'Cambodgienne', 'Cambodian'),
(34, 'Camerounaise', 'Cameroonian'),
(35, 'Canadienne', 'Canadian'),
(36, 'Cap-Verdienne', 'Cape_Verdean'),
(37, 'Centrafricaine', 'Central_African'),
(38, 'Tchadienne', 'Chadian'),
(39, 'Chilienne', 'Chilean'),
(40, 'Chinoise', 'Chinese'),
(41, 'Colombienne', 'Colombian'),
(42, 'Comorienne', 'Comoran'),
(43, 'Congolaise', 'Congolese'),
(44, 'Congolaise', 'Congolese'),
(45, 'Costaricaine', 'Costa_Rican'),
(46, 'Croate', 'Croatian'),
(47, 'Cubaine', 'Cuban'),
(48, 'Chypriote', 'Cypriot'),
(49, 'Tchèque', 'Czech'),
(50, 'Dannoise', 'Danish'),
(51, 'Djiboutienne', 'Djibouti'),
(52, 'Dominicaine', 'Dominican'),
(53, 'Dominicaine', 'Dominican'),
(54, 'Hollandaise', 'Dutch'),
(55, 'Hollandaise', 'Dutchman'),
(56, 'Hollandaise', 'Dutchwoman'),
(57, 'Timoraise', 'Timorese'),
(58, 'Équatorienne', 'Ecuadorean'),
(59, 'Egyptienne', 'Egyptian'),
(60, 'Emirienne', 'Emirian'),
(61, 'Équato_Guinéenne', 'Equatorial_Guinean'),
(62, 'Érythréenne', 'Eritrean'),
(63, 'Estonienne', 'Estonian'),
(64, 'Éthiopienne', 'Ethiopian'),
(65, 'Fidjienne', 'Fijian'),
(66, 'Philippine', 'Filipino'),
(67, 'Finlandaise', 'Finnish'),
(68, 'Francaise', 'French'),
(69, 'Gabonnaise', 'Gabonese'),
(70, 'Gambienne', 'Gambian'),
(71, 'Géorgienne', 'Georgian'),
(72, 'Allemande', 'German'),
(73, 'Ghanéenne', 'Ghanaian'),
(74, 'Grecque', 'Greek'),
(75, 'Grenadienne', 'Grenadian'),
(76, 'Guatémaltèque', 'Guatemalan'),
(77, 'Bissau-Guinéenne', 'Guinea-Bissauan'),
(78, 'Guinéenne', 'Guinean'),
(79, 'Guyanaise', 'Guyanese'),
(80, 'Haïtienne', 'Haitian'),
(81, 'Herzegovinnaise', 'Herzegovinian'),
(82, 'Hondurienne', 'Honduran'),
(83, 'Hongroise', 'Hungarian'),
(84, 'Kibirati', 'I-Kiribati'),
(85, 'Islandaise', 'Icelander'),
(86, 'Indienne', 'Indian'),
(87, 'Indonésienne', 'Indonesian'),
(88, 'Iranienne', 'Iranian'),
(89, 'Irakienne', 'Iraqi'),
(90, 'Irlandaise', 'Irish'),
(91, 'Irlandaise', 'Irish'),
(92, 'Israélienne', 'Israeli'),
(93, 'Italienne', 'Italian'),
(94, 'Ivoirienne', 'Ivorian'),
(95, 'Jamaïcaine', 'Jamaican'),
(96, 'Japonaise', 'Japanese'),
(97, 'Jordanienne', 'Jordanian'),
(98, 'Kazakh', 'Kazakhstani'),
(99, 'Kenyane', 'Kenyan'),
(100, 'Saint-Christophe-et-Niévès', 'Kittian-Nevisian'),
(101, 'Koweïtienne', 'Kuwaiti'),
(102, 'Kirghiz', 'Kyrgyz'),
(103, 'Laotienne', 'Laotian'),
(104, 'Lettonne', 'Latvian'),
(105, 'Libanaise', 'Lebanese'),
(106, 'Libérienne', 'Liberian'),
(107, 'Libyenne', 'Libyan'),
(108, 'Liechtensteinoise', 'Liechtensteiner'),
(109, 'Lituanienne', 'Lithuanian'),
(110, 'Luxembourgeoise', 'Luxembourger'),
(111, 'Macédonienne', 'Macedonian'),
(112, 'Malgache', 'Malagasy'),
(113, 'Malawite', 'Malawian'),
(114, 'Malaisienne', 'Malaysian'),
(115, 'Maldivienne', 'Maldivan'),
(116, 'Malienne', 'Malian'),
(117, 'Maltaise', 'Maltese'),
(118, 'Marshallaise', 'Marshallese'),
(119, 'Mauritanienne', 'Mauritanian'),
(120, 'Mauricienne', 'Mauritian'),
(121, 'Mexicaine', 'Mexican'),
(122, 'Micronesienne', 'Micronesian'),
(123, 'Moldave', 'Moldovan'),
(124, 'Monégasque', 'Monacan'),
(125, 'Mongole', 'Mongolian'),
(126, 'Marocaine', 'Moroccan'),
(127, 'Mosotho', 'Mosotho'),
(128, 'Botswanaise', 'Motswana'),
(129, 'Mozambicaine', 'Mozambican'),
(130, 'Namibienne', 'Namibian'),
(131, 'Nauruane', 'Nauruan'),
(132, 'Népalaise', 'Nepalese'),
(133, 'néerlandaise', 'Netherlander'),
(134, 'Néo_Zélandaise', 'New_Zealander'),
(135, 'Vanuatu', 'Ni-Vanuatu'),
(136, 'Nicaraguayenne', 'Nicaraguan'),
(137, 'Nigérienne', 'Nigerian'),
(138, 'Nigériane', 'Nigerien'),
(139, 'Nord-Coréenne', 'North_Korean'),
(140, 'Nord-Irlandaise', 'Northern_Irish'),
(141, 'Norvégienne', 'Norwegian'),
(142, 'Omanaise', 'Omani'),
(143, 'Pakistanaise', 'Pakistani'),
(144, 'Paluanaise', 'Palauan'),
(145, 'Panaméenne', 'Panamanian'),
(146, 'Papouasienne', 'Papua-New-Guinean'),
(147, 'Paraguayenne', 'Paraguayan'),
(148, 'Péruvienne', 'Peruvian'),
(149, 'Polonaise', 'Polish'),
(150, 'Portugaise', 'Portuguese'),
(151, 'Qatarie', 'Qatari'),
(152, 'Roumaine', 'Romanian'),
(153, 'Russe', 'Russian'),
(154, 'Rwandaise', 'Rwandan'),
(155, 'Saint-Lucienne', 'Saint_Lucian'),
(156, 'Salvadorienne', 'Salvadoran'),
(157, 'Samoanne', 'Samoan'),
(158, 'Saint-Marinnaise', 'San_Marinese'),
(159, 'Sao-Tomene', 'Sao_Tomean'),
(160, 'Saoudien', 'Saudi'),
(161, 'Ecossaise', 'Scottish'),
(162, 'Senegalaise', 'Senegalese'),
(163, 'Serbe', 'Serbian'),
(164, 'seychelloise', 'Seychellois'),
(165, 'Sierra-Léonaise', 'Sierra-Leonean'),
(166, 'Singapourienne', 'Singaporean'),
(167, 'Slovaque', 'Slovakian'),
(168, 'Slovène', 'Slovenian'),
(169, 'Solomonais', 'Solomon_Islander'),
(170, 'Somalienne', 'Somali'),
(171, 'Sud-Africaine', 'South_African'),
(172, 'Sud-Coréenne', 'South_Korean'),
(173, 'Espagnole', 'Spanish'),
(174, 'Sri-Lankaise', 'Sri_Lankan'),
(175, 'Soudanaise', 'Sudanese'),
(176, 'Surinamienne', 'Surinamer'),
(177, 'Swazie', 'Swazi'),
(178, 'Suédoise', 'Swedish'),
(179, 'Suisse', 'Swiss'),
(180, 'Syrienne', 'Syrian'),
(181, 'Taïwanaise', 'Taiwanese'),
(182, 'Tadjik', 'Tajik'),
(183, 'Tanzanienne', 'Tanzanian'),
(184, 'Thaïlandaise', 'Thai'),
(185, 'Togolaise', 'Togolese'),
(186, 'Tonganaise', 'Tongan'),
(187, 'Trinidienne_Tobagonienne', 'Trinidadian_Tobagonian'),
(188, 'Tunisienne', 'Tunisian'),
(189, 'Turc', 'Turkish'),
(190, 'Tuvaluane', 'Tuvaluan'),
(191, 'Ougandaise', 'Ugandan'),
(192, 'Ukrainienne', 'Ukrainian'),
(193, 'Uruguayenne', 'Uruguayan'),
(194, 'Ouzbek', 'Uzbekistani'),
(195, 'Vénézuélienne', 'Venezuelan'),
(196, 'Vietnamienne', 'Vietnamese'),
(197, 'Galloise', 'Welsh'),
(198, 'Yéménite', 'Yemenite'),
(199, 'Zambienne', 'Zambian'),
(200, 'Zimbabwéenne', 'Zimbabwean');

-- --------------------------------------------------------

--
-- Structure de la table `society`
--

CREATE TABLE `society` (
  `Soc_Id` int(11) NOT NULL,
  `Soc_Name` varchar(50) NOT NULL,
  `Soc_Siret` varchar(50) NOT NULL,
  `Soc_PresName` varchar(50) NOT NULL,
  `Soc_PresSurname` varchar(50) NOT NULL,
  `Soc_PresSouscript` tinyint(1) DEFAULT NULL,
  `Soc_Address1` varchar(150) NOT NULL,
  `Soc_Address2` varchar(150) NOT NULL,
  `Soc_City` varchar(50) NOT NULL,
  `Soc_CP` varchar(10) NOT NULL,
  `Soc_State` varchar(50) NOT NULL,
  `Soc_Country` varchar(50) NOT NULL,
  `Soc_Phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `Users_Id` int(11) NOT NULL,
  `Users_Login` varchar(50) NOT NULL,
  `Users_Password` varchar(255) NOT NULL,
  `Users_Name` varchar(50) NOT NULL,
  `Users_Surname` varchar(50) NOT NULL,
  `Users_Gender` varchar(6) NOT NULL,
  `Users_Birthdate` date DEFAULT NULL,
  `Users_Address1` varchar(150) NOT NULL,
  `Users_Address2` varchar(150) NOT NULL,
  `Users_City` varchar(50) NOT NULL,
  `Users_CP` varchar(10) NOT NULL,
  `Users_State` varchar(50) NOT NULL,
  `Users_Phone` varchar(20) NOT NULL,
  `Users_Mail` varchar(50) NOT NULL,
  `Users_Job` varchar(30) NOT NULL,
  `Users_Country_id` int(11) DEFAULT NULL,
  `Users_Nationality_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Users_Id`, `Users_Login`, `Users_Password`, `Users_Name`, `Users_Surname`, `Users_Gender`, `Users_Birthdate`, `Users_Address1`, `Users_Address2`, `Users_City`, `Users_CP`, `Users_State`, `Users_Phone`, `Users_Mail`, `Users_Job`, `Users_Country_id`, `Users_Nationality_Id`) VALUES
(1, 'tutu', '$2y$10$nWH5qnmodHesobtncR0izuzgOoSIh5cFrA5m34leTa/OUEzWGhZlm', 'tututititete', 'tutu', 'female', '2013-08-15', '12 rue du bonbon rose', 'confiserie 2eme etage de l\'abris', 'amiens', '80000', 'sommalie', '0123456789 ', 'tutu@gmail.com ', 'développeur ', 15, 4),
(2, 'toto', '$2y$10$l/A5uVFRHBudAIMHzxQtEuKPQ8JSo/SlqBFVgWk./L6fpPh3kfxMO', '', '', '', NULL, '', '', '', '', '', '', 'toto@gmail.com', '', NULL, NULL),
(3, 'jiji', '$2y$10$hBwMY1zV.OPczToJ4oVfA.GTHsOutcxEAzqHguzOcTHl0cQzXv7r.', '', '', '', NULL, '', '', '', '', '', '', 'jiji@gmail.com', '', NULL, NULL),
(4, 'vivi', '$2y$10$oj5vbUejhOWXj9B61YW82OVw6GZM19rOPotn1IYz5p/C78gUSX1va', '', '', '', NULL, '', '', '', '', '', '', 'vivi@gmail.com', '', NULL, NULL),
(5, 'veve', '$2y$10$9FhUHevek1j/k2lYNUP2SecIEWG3KOSoVQlRaXXdEmM.9bDePPGr2', '', '', '', NULL, '', '', '', '', '', '', 'veve@gmail.com', '', NULL, NULL),
(6, 'coco', '$2y$10$/PfnWOJxJPuEfeyHaB2zF.l6ERxOwSmehFCx/bODi1fh6w2Gt9yf6', '', '', '', NULL, '', '', '', '', '', '', 'coco@gmail.com', '', NULL, NULL),
(7, 'flute', '$2y$10$B5g9BnzFDYfUzzhRSxI08eWmDmKuI8d565iBUjulRYZAjFjDHux7G', '', '', '', NULL, '', '', '', '', '', '', 'flute@gmail.com', '', NULL, NULL),
(8, 'flex', '$2y$10$zAMypGGY86B9kpYuICHCceFSpSV8slPg/mJxQsUi3YmhiG969lgky', '', '', '', NULL, '', '', '', '', '', '', 'flex@gmail.com', '', NULL, NULL),
(9, 'fifi', '$2y$10$6MNhCS80ZPWJ6zMTJ.9jCupQdhHODaRqL5Irkf/ktRiyz4h/XCawW', 'fifi', 'fifi', 'female', '2000-09-30', '12 rue de la bouclette', '', 'amiens', '80000', 'somme', '  0123456789', 'fifi@gmail.com  ', '  deve', 75, 22);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD PRIMARY KEY (`Soc_Id`,`Users_Id`),
  ADD KEY `Appartenir_Users0_FK` (`Users_Id`);

--
-- Index pour la table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`Country_id`);

--
-- Index pour la table `evidence`
--
ALTER TABLE `evidence`
  ADD PRIMARY KEY (`Evi_Id`),
  ADD UNIQUE KEY `Evidence_Users_AK` (`Evi_Users_Id`),
  ADD UNIQUE KEY `Evidence_Society0_AK` (`Evi_Soc_Id`);

--
-- Index pour la table `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`Nationality_Id`);

--
-- Index pour la table `society`
--
ALTER TABLE `society`
  ADD PRIMARY KEY (`Soc_Id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Users_Id`),
  ADD KEY `Users_Country_FK` (`Users_Country_id`),
  ADD KEY `Users_Nationality0_FK` (`Users_Nationality_Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `country`
--
ALTER TABLE `country`
  MODIFY `Country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT pour la table `evidence`
--
ALTER TABLE `evidence`
  MODIFY `Evi_Id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `nationality`
--
ALTER TABLE `nationality`
  MODIFY `Nationality_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT pour la table `society`
--
ALTER TABLE `society`
  MODIFY `Soc_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `Users_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `Appartenir_Society_FK` FOREIGN KEY (`Soc_Id`) REFERENCES `society` (`Soc_Id`),
  ADD CONSTRAINT `Appartenir_Users0_FK` FOREIGN KEY (`Users_Id`) REFERENCES `users` (`Users_Id`);

--
-- Contraintes pour la table `evidence`
--
ALTER TABLE `evidence`
  ADD CONSTRAINT `Evidence_Society0_FK` FOREIGN KEY (`Evi_Soc_Id`) REFERENCES `society` (`Soc_Id`),
  ADD CONSTRAINT `Evidence_Users_FK` FOREIGN KEY (`Evi_Users_Id`) REFERENCES `users` (`Users_Id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Users_Country_FK` FOREIGN KEY (`Users_Country_id`) REFERENCES `country` (`Country_id`),
  ADD CONSTRAINT `Users_Nationality0_FK` FOREIGN KEY (`Users_Nationality_Id`) REFERENCES `nationality` (`Nationality_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
