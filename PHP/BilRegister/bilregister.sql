-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06. Mar, 2025 10:57 AM
-- Tjener-versjon: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bilregister`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `biler`
--

CREATE TABLE `biler` (
  `regNr` char(7) NOT NULL,
  `Merke` varchar(12) NOT NULL,
  `Farge` varchar(10) NOT NULL,
  `bilType` varchar(16) NOT NULL,
  `eierID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dataark for tabell `biler`
--

INSERT INTO `biler` (`regNr`, `Merke`, `Farge`, `bilType`, `eierID`) VALUES
('lj23564', 'Mazda', 'Sort', 'Mazda 6', 14),
('SU49502', 'Volkswagen', 'Svart', 'Stasjonsvogn', 10);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `brukere`
--

CREATE TABLE `brukere` (
  `id` int(11) NOT NULL,
  `brukernavn` varchar(14) NOT NULL,
  `passord` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dataark for tabell `brukere`
--

INSERT INTO `brukere` (`id`, `brukernavn`, `passord`) VALUES
(1, 'RootMats', 'Admin123');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `countrycodes`
--

CREATE TABLE `countrycodes` (
  `iso3` char(3) DEFAULT NULL,
  `name` varchar(15) NOT NULL,
  `id` int(11) NOT NULL,
  `phonecode` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dataark for tabell `countrycodes`
--

INSERT INTO `countrycodes` (`iso3`, `name`, `id`, `phonecode`) VALUES
('AFG', 'AFGHANISTAN', 1, '93'),
('ALB', 'ALBANIA', 2, '355'),
('DZA', 'ALGERIA', 3, '213'),
('ASM', 'AMERICAN SAMOA', 4, '168'),
('AND', 'ANDORRA', 5, '376'),
('AGO', 'ANGOLA', 6, '244'),
('AIA', 'ANGUILLA', 7, '126'),
(NULL, 'ANTARCTICA', 8, '0'),
('ATG', 'ANTIGUA AND BAR', 9, '126'),
('ARG', 'ARGENTINA', 10, '54'),
('ARM', 'ARMENIA', 11, '374'),
('ABW', 'ARUBA', 12, '297'),
('AUS', 'AUSTRALIA', 13, '61'),
('AUT', 'AUSTRIA', 14, '43'),
('AZE', 'AZERBAIJAN', 15, '994'),
('BHS', 'BAHAMAS', 16, '124'),
('BHR', 'BAHRAIN', 17, '973'),
('BGD', 'BANGLADESH', 18, '880'),
('BRB', 'BARBADOS', 19, '124'),
('BLR', 'BELARUS', 20, '375'),
('BEL', 'BELGIUM', 21, '32'),
('BLZ', 'BELIZE', 22, '501'),
('BEN', 'BENIN', 23, '229'),
('BMU', 'BERMUDA', 24, '144'),
('BTN', 'BHUTAN', 25, '975'),
('BOL', 'BOLIVIA', 26, '591'),
('BIH', 'BOSNIA AND HERZ', 27, '387'),
('BWA', 'BOTSWANA', 28, '267'),
(NULL, 'BOUVET ISLAND', 29, '0'),
('BRA', 'BRAZIL', 30, '55'),
(NULL, 'BRITISH INDIAN ', 31, '246'),
('BRN', 'BRUNEI DARUSSAL', 32, '673'),
('BGR', 'BULGARIA', 33, '359'),
('BFA', 'BURKINA FASO', 34, '226'),
('BDI', 'BURUNDI', 35, '257'),
('KHM', 'CAMBODIA', 36, '855'),
('CMR', 'CAMEROON', 37, '237'),
('CAN', 'CANADA', 38, '1'),
('CPV', 'CAPE VERDE', 39, '238'),
('CYM', 'CAYMAN ISLANDS', 40, '134'),
('CAF', 'CENTRAL AFRICAN', 41, '236'),
('TCD', 'CHAD', 42, '235'),
('CHL', 'CHILE', 43, '56'),
('CHN', 'CHINA', 44, '86'),
(NULL, 'CHRISTMAS ISLAN', 45, '61'),
(NULL, 'COCOS (KEELING)', 46, '672'),
('COL', 'COLOMBIA', 47, '57'),
('COM', 'COMOROS', 48, '269'),
('COG', 'CONGO', 49, '242'),
('COD', 'CONGO, THE DEMO', 50, '242'),
('COK', 'COOK ISLANDS', 51, '682'),
('CRI', 'COSTA RICA', 52, '506'),
('CIV', 'COTE D\'IVOIRE', 53, '225'),
('HRV', 'CROATIA', 54, '385'),
('CUB', 'CUBA', 55, '53'),
('CYP', 'CYPRUS', 56, '357'),
('CZE', 'CZECH REPUBLIC', 57, '420'),
('DNK', 'DENMARK', 58, '45'),
('DJI', 'DJIBOUTI', 59, '253'),
('DMA', 'DOMINICA', 60, '176'),
('DOM', 'DOMINICAN REPUB', 61, '180'),
('ECU', 'ECUADOR', 62, '593'),
('EGY', 'EGYPT', 63, '20'),
('SLV', 'EL SALVADOR', 64, '503'),
('GNQ', 'EQUATORIAL GUIN', 65, '240'),
('ERI', 'ERITREA', 66, '291'),
('EST', 'ESTONIA', 67, '372'),
('ETH', 'ETHIOPIA', 68, '251'),
('FLK', 'FALKLAND ISLAND', 69, '500'),
('FRO', 'FAROE ISLANDS', 70, '298'),
('FJI', 'FIJI', 71, '679'),
('FIN', 'FINLAND', 72, '358'),
('FRA', 'FRANCE', 73, '33'),
('GUF', 'FRENCH GUIANA', 74, '594'),
('PYF', 'FRENCH POLYNESI', 75, '689'),
(NULL, 'FRENCH SOUTHERN', 76, '0'),
('GAB', 'GABON', 77, '241'),
('GMB', 'GAMBIA', 78, '220'),
('GEO', 'GEORGIA', 79, '995'),
('DEU', 'GERMANY', 80, '49'),
('GHA', 'GHANA', 81, '233'),
('GIB', 'GIBRALTAR', 82, '350'),
('GRC', 'GREECE', 83, '30'),
('GRL', 'GREENLAND', 84, '299'),
('GRD', 'GRENADA', 85, '147'),
('GLP', 'GUADELOUPE', 86, '590'),
('GUM', 'GUAM', 87, '167'),
('GTM', 'GUATEMALA', 88, '502'),
('GIN', 'GUINEA', 89, '224'),
('GNB', 'GUINEA-BISSAU', 90, '245'),
('GUY', 'GUYANA', 91, '592'),
('HTI', 'HAITI', 92, '509'),
(NULL, 'HEARD ISLAND AN', 93, '0'),
('VAT', 'HOLY SEE (VATIC', 94, '39'),
('HND', 'HONDURAS', 95, '504'),
('HKG', 'HONG KONG', 96, '852'),
('HUN', 'HUNGARY', 97, '36'),
('ISL', 'ICELAND', 98, '354'),
('IND', 'INDIA', 99, '91'),
('IDN', 'INDONESIA', 100, '62'),
('IRN', 'IRAN, ISLAMIC R', 101, '98'),
('IRQ', 'IRAQ', 102, '964'),
('IRL', 'IRELAND', 103, '353'),
('ISR', 'ISRAEL', 104, '972'),
('ITA', 'ITALY', 105, '39'),
('JAM', 'JAMAICA', 106, '187'),
('JPN', 'JAPAN', 107, '81'),
('JOR', 'JORDAN', 108, '962'),
('KAZ', 'KAZAKHSTAN', 109, '7'),
('KEN', 'KENYA', 110, '254'),
('KIR', 'KIRIBATI', 111, '686'),
('PRK', 'KOREA, DEMOCRAT', 112, '850'),
('KOR', 'KOREA, REPUBLIC', 113, '82'),
('KWT', 'KUWAIT', 114, '965'),
('KGZ', 'KYRGYZSTAN', 115, '996'),
('LAO', 'LAO PEOPLE\'S DE', 116, '856'),
('LVA', 'LATVIA', 117, '371'),
('LBN', 'LEBANON', 118, '961'),
('LSO', 'LESOTHO', 119, '266'),
('LBR', 'LIBERIA', 120, '231'),
('LBY', 'LIBYAN ARAB JAM', 121, '218'),
('LIE', 'LIECHTENSTEIN', 122, '423'),
('LTU', 'LITHUANIA', 123, '370'),
('LUX', 'LUXEMBOURG', 124, '352'),
('MAC', 'MACAO', 125, '853'),
('MKD', 'MACEDONIA, THE ', 126, '389'),
('MDG', 'MADAGASCAR', 127, '261'),
('MWI', 'MALAWI', 128, '265'),
('MYS', 'MALAYSIA', 129, '60'),
('MDV', 'MALDIVES', 130, '960'),
('MLI', 'MALI', 131, '223'),
('MLT', 'MALTA', 132, '356'),
('MHL', 'MARSHALL ISLAND', 133, '692'),
('MTQ', 'MARTINIQUE', 134, '596'),
('MRT', 'MAURITANIA', 135, '222'),
('MUS', 'MAURITIUS', 136, '230'),
(NULL, 'MAYOTTE', 137, '269'),
('MEX', 'MEXICO', 138, '52'),
('FSM', 'MICRONESIA, FED', 139, '691'),
('MDA', 'MOLDOVA, REPUBL', 140, '373'),
('MCO', 'MONACO', 141, '377'),
('MNG', 'MONGOLIA', 142, '976'),
('MSR', 'MONTSERRAT', 143, '166'),
('MAR', 'MOROCCO', 144, '212'),
('MOZ', 'MOZAMBIQUE', 145, '258'),
('MMR', 'MYANMAR', 146, '95'),
('NAM', 'NAMIBIA', 147, '264'),
('NRU', 'NAURU', 148, '674'),
('NPL', 'NEPAL', 149, '977'),
('NLD', 'NETHERLANDS', 150, '31'),
('ANT', 'NETHERLANDS ANT', 151, '599'),
('NCL', 'NEW CALEDONIA', 152, '687'),
('NZL', 'NEW ZEALAND', 153, '64'),
('NIC', 'NICARAGUA', 154, '505'),
('NER', 'NIGER', 155, '227'),
('NGA', 'NIGERIA', 156, '234'),
('NIU', 'NIUE', 157, '683'),
('NFK', 'NORFOLK ISLAND', 158, '672'),
('MNP', 'NORTHERN MARIAN', 159, '167'),
('NOR', 'NORWAY', 160, '47'),
('OMN', 'OMAN', 161, '968'),
('PAK', 'PAKISTAN', 162, '92'),
('PLW', 'PALAU', 163, '680'),
(NULL, 'PALESTINIAN TER', 164, '970'),
('PAN', 'PANAMA', 165, '507'),
('PNG', 'PAPUA NEW GUINE', 166, '675'),
('PRY', 'PARAGUAY', 167, '595'),
('PER', 'PERU', 168, '51'),
('PHL', 'PHILIPPINES', 169, '63'),
('PCN', 'PITCAIRN', 170, '0'),
('POL', 'POLAND', 171, '48'),
('PRT', 'PORTUGAL', 172, '351'),
('PRI', 'PUERTO RICO', 173, '178'),
('QAT', 'QATAR', 174, '974'),
('REU', 'REUNION', 175, '262'),
('ROM', 'ROMANIA', 176, '40'),
('RUS', 'RUSSIAN FEDERAT', 177, '70'),
('RWA', 'RWANDA', 178, '250'),
('SHN', 'SAINT HELENA', 179, '290'),
('KNA', 'SAINT KITTS AND', 180, '186'),
('LCA', 'SAINT LUCIA', 181, '175'),
('SPM', 'SAINT PIERRE AN', 182, '508'),
('VCT', 'SAINT VINCENT A', 183, '178'),
('WSM', 'SAMOA', 184, '684'),
('SMR', 'SAN MARINO', 185, '378'),
('STP', 'SAO TOME AND PR', 186, '239'),
('SAU', 'SAUDI ARABIA', 187, '966'),
('SEN', 'SENEGAL', 188, '221'),
(NULL, 'SERBIA AND MONT', 189, '381'),
('SYC', 'SEYCHELLES', 190, '248'),
('SLE', 'SIERRA LEONE', 191, '232'),
('SGP', 'SINGAPORE', 192, '65'),
('SVK', 'SLOVAKIA', 193, '421'),
('SVN', 'SLOVENIA', 194, '386'),
('SLB', 'SOLOMON ISLANDS', 195, '677'),
('SOM', 'SOMALIA', 196, '252'),
('ZAF', 'SOUTH AFRICA', 197, '27'),
(NULL, 'SOUTH GEORGIA A', 198, '0'),
('ESP', 'SPAIN', 199, '34'),
('LKA', 'SRI LANKA', 200, '94'),
('SDN', 'SUDAN', 201, '249'),
('SUR', 'SURINAME', 202, '597'),
('SJM', 'SVALBARD AND JA', 203, '47'),
('SWZ', 'SWAZILAND', 204, '268'),
('SWE', 'SWEDEN', 205, '46'),
('CHE', 'SWITZERLAND', 206, '41'),
('SYR', 'SYRIAN ARAB REP', 207, '963'),
('TWN', 'TAIWAN, PROVINC', 208, '886'),
('TJK', 'TAJIKISTAN', 209, '992'),
('TZA', 'TANZANIA, UNITE', 210, '255'),
('THA', 'THAILAND', 211, '66'),
(NULL, 'TIMOR-LESTE', 212, '670'),
('TGO', 'TOGO', 213, '228'),
('TKL', 'TOKELAU', 214, '690'),
('TON', 'TONGA', 215, '676'),
('TTO', 'TRINIDAD AND TO', 216, '186'),
('TUN', 'TUNISIA', 217, '216'),
('TUR', 'TURKEY', 218, '90'),
('TKM', 'TURKMENISTAN', 219, '737'),
('TCA', 'TURKS AND CAICO', 220, '164'),
('TUV', 'TUVALU', 221, '688'),
('UGA', 'UGANDA', 222, '256'),
('UKR', 'UKRAINE', 223, '380'),
('ARE', 'UNITED ARAB EMI', 224, '971'),
('GBR', 'UNITED KINGDOM', 225, '44'),
('USA', 'UNITED STATES', 226, '1'),
(NULL, 'UNITED STATES M', 227, '1'),
('URY', 'URUGUAY', 228, '598'),
('UZB', 'UZBEKISTAN', 229, '998'),
('VUT', 'VANUATU', 230, '678'),
('VEN', 'VENEZUELA', 231, '58'),
('VNM', 'VIET NAM', 232, '84'),
('VGB', 'VIRGIN ISLANDS,', 233, '128'),
('VIR', 'VIRGIN ISLANDS,', 234, '134'),
('WLF', 'WALLIS AND FUTU', 235, '681'),
('ESH', 'WESTERN SAHARA', 236, '212'),
('YEM', 'YEMEN', 237, '967'),
('ZMB', 'ZAMBIA', 238, '260'),
('ZWE', 'ZIMBABWE', 239, '263');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `eiere`
--

CREATE TABLE `eiere` (
  `eierID` int(11) NOT NULL,
  `fornavn` varchar(16) NOT NULL,
  `etternavn` varchar(20) NOT NULL,
  `fodselsdato` date NOT NULL,
  `telefon` varchar(8) NOT NULL,
  `CountryCode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dataark for tabell `eiere`
--

INSERT INTO `eiere` (`eierID`, `fornavn`, `etternavn`, `fodselsdato`, `telefon`, `CountryCode`) VALUES
(1, 'Jonas', 'Magnussen', '2006-11-08', '12345678', 160),
(3, 'Lebron', 'James', '1990-01-04', '12345678', 226),
(5, 'Tyler ', 'Okonma', '1991-03-06', '27401649', 226),
(10, 'Jonas', 'Magnussen', '2006-11-08', '27401649', 160),
(13, 'Izuku', 'Midoriya', '2000-07-15', '34723984', 107),
(14, 'Sondre', 'Haugom', '2003-12-30', '47996515', 160),
(20, 'Sander', 'Rysjedal', '2001-12-14', '39402948', 160),
(21, 'Sindre Tofte', 'Giske', '2000-07-01', '89574378', 114);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biler`
--
ALTER TABLE `biler`
  ADD PRIMARY KEY (`regNr`),
  ADD KEY `EierFK` (`eierID`);

--
-- Indexes for table `brukere`
--
ALTER TABLE `brukere`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brukernavn` (`brukernavn`);

--
-- Indexes for table `countrycodes`
--
ALTER TABLE `countrycodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eiere`
--
ALTER TABLE `eiere`
  ADD PRIMARY KEY (`eierID`),
  ADD KEY `CountryCode` (`CountryCode`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brukere`
--
ALTER TABLE `brukere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countrycodes`
--
ALTER TABLE `countrycodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `eiere`
--
ALTER TABLE `eiere`
  MODIFY `eierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `biler`
--
ALTER TABLE `biler`
  ADD CONSTRAINT `EierFK` FOREIGN KEY (`eierID`) REFERENCES `eiere` (`eierID`) ON DELETE CASCADE;

--
-- Begrensninger for tabell `eiere`
--
ALTER TABLE `eiere`
  ADD CONSTRAINT `eiere_ibfk_1` FOREIGN KEY (`CountryCode`) REFERENCES `countrycodes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
