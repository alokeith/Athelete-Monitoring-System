-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 04:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `event_contact`) VALUES
(1, 'archery boys secondary', '09606165958'),
(2, 'archery girls secondary', '09606165958'),
(3, 'arnis boys elementary', '09554353213'),
(4, 'arnis boys halfweight', '09759407912'),
(5, 'arnis boys secondary', '09759407912'),
(6, 'arnis girls elementary', '09356559070'),
(7, 'arnis girls secondary', '09950734323'),
(8, 'athletics boys elementary', '09365409340'),
(9, 'athletics boys secondary', '09978026046'),
(10, 'athletics girls elementary', '09657927695'),
(11, 'athletics girls secondary', '09751175030'),
(12, 'badminton boys elementary', '09173394821'),
(13, 'badminton boys secondary', '09350792788'),
(14, 'badminton girls elementary', '09276444331'),
(15, 'badminton girls secondary', '09360454833'),
(16, 'special athletics boys', '09981794641'),
(17, 'basketball boys secondary', '09268320042'),
(18, 'special athletics girls', '09557769994'),
(19, 'billiard boys secondary', '09652043992'),
(20, 'billiard girls secondary', '09606169946'),
(21, 'boxing boys secondary', '09272360201'),
(22, 'chess boys elementary', '09606169975'),
(23, 'chess boys secondary', '09606169556'),
(24, 'chess girls elementary', '09559781332'),
(25, 'chess girls secondary', '09171549729'),
(26, 'football boys elementary', '09383729143'),
(27, 'football boys secondary', '09261180320'),
(28, 'futsal girls secondary', '09606169621'),
(29, 'lawn tennis boys elementary', ''),
(30, 'lawn tennis boys secondary', ''),
(31, 'lawn tennis girls secondary', ''),
(32, 'pencak silat boys secondary', '09753761804'),
(33, 'pencak silat girls secondary', '09559326163'),
(34, 'sepak takraw boys elementary', '09317527318'),
(35, 'sepak takraw boys secondary', '09606768126'),
(36, 'sepak takraw girls secondary', '09606169969'),
(37, 'swimming boys secondary', '09066768786'),
(38, 'swimming girls secondary', '09759407961'),
(39, 'special events booce sped', '09175708658'),
(40, 'table tennis boys elementary', '09056195363'),
(41, 'table tennis boys secondary', '09177498694'),
(42, 'table tennis girls elementary', '09606164674'),
(43, 'table tennis girls secondary', '09979902602'),
(44, 'taekwondo boys secondary', '09773375734'),
(45, 'taekwondo girls secondary', '09453677272'),
(46, 'volleyball boys elementary', '09675742659'),
(47, 'volleyball boys secondary', '09558521150'),
(48, 'volleyball girls elementary', '09268315481'),
(49, 'volleyball girls secondary', '09559780227'),
(50, 'wrestling boys secondary', '09651539485'),
(51, 'wrestling girls secondary', '09750189582'),
(52, 'basketball boys 3x3 secondary', '09606770665'),
(53, 'Committee', ''),
(54, 'Basketball Boys 3x3 Elementary', '09677333868');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `log_date` varchar(20) NOT NULL,
  `log_time` varchar(20) NOT NULL,
  `log_status` int(1) NOT NULL,
  `person_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meal_log`
--

CREATE TABLE `meal_log` (
  `meal_id` int(11) NOT NULL,
  `person_id` int(20) NOT NULL,
  `meal_type` int(1) NOT NULL,
  `meal_date` varchar(15) NOT NULL,
  `meal_time` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meal_reserve`
--

CREATE TABLE `meal_reserve` (
  `reserv_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `meal_types` varchar(20) NOT NULL,
  `reserv_date` varchar(20) NOT NULL,
  `reserv_ath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `person_id` int(11) NOT NULL,
  `person_name` varchar(100) NOT NULL,
  `person_gender` varchar(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `person_status` varchar(11) NOT NULL,
  `meal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`person_id`, `person_name`, `person_gender`, `role_id`, `event_id`, `person_status`, `meal`) VALUES
(16, 'GODSENT KOBE DUSTIN E. MARTINEZ', 'M', 1, 1, '0', 0),
(17, 'VAUGHN ADRIENNE GERONA', 'M', 1, 1, '0', 0),
(18, 'RALPH IVOH D. PEROCHO', 'M', 1, 1, '0', 0),
(19, 'MARLYN A. SONTOSIDAD', 'F', 2, 2, '0', 0),
(20, 'PENELOPE J. ALDIANO', 'F', 1, 2, '0', 0),
(21, 'DENISE MAE E. MEDICIELO', 'F', 1, 2, '0', 0),
(22, 'LARA DELL E. MAGTOLIS', 'F', 4, 2, '0', 0),
(23, 'REX ANGELO B. BARCENAS', 'M', 1, 3, '0', 0),
(24, 'ELIJAH KENT T. VALENZUELA', 'M', 1, 3, '0', 0),
(25, 'IVAN KHURT D. OCCEñA', 'M', 1, 3, '0', 0),
(26, 'JANETH B. BUENAVISTA', 'F', 2, 3, '0', 0),
(27, 'MJ S. ABING', 'M', 1, 3, '0', 0),
(28, 'REMUIL JUNE RIVERA', 'M', 1, 4, '0', 0),
(29, 'JOBERT V. PORDALIZA', 'M', 1, 5, '0', 0),
(30, 'PETER S. RIVERA', 'M', 1, 5, '0', 0),
(31, 'ANGELO T. ARROYO', 'M', 1, 5, '0', 0),
(32, 'ARCHER F. TOMALES', 'M', 1, 5, '0', 0),
(33, 'RIZALDY D. PEPITO', 'M', 2, 5, '0', 0),
(34, 'LOUISE B. CHU', 'F', 1, 6, '0', 0),
(35, 'MA. CHANEL KAYE T. SALES', 'F', 1, 6, '0', 0),
(36, 'RITCHEL L. VILLANUEVA', 'F', 2, 6, '0', 0),
(37, 'PRECIOUS LIANMAE D. BAJAS', 'F', 1, 6, '0', 0),
(38, 'ANNA MARIE A. SARITA', 'F', 1, 7, '0', 0),
(39, 'KISSHA MAE A. ERRY', 'F', 1, 7, '0', 0),
(40, 'CHRISTEL JOY C. REDULA', 'F', 1, 7, '0', 0),
(41, 'QUEENIE MIRL L. VILLANUEVA', 'F', 1, 7, '0', 0),
(42, 'MIKA ELLA C. DELCO', 'F', 1, 7, '0', 0),
(43, 'PAMELA V. MEJICA', 'F', 2, 7, '0', 0),
(44, 'RONALD FUENTEVILLA', 'M', 1, 8, '0', 0),
(45, 'ARNOLD ANTONIO GOTLADERA III', 'M', 3, 8, '0', 0),
(46, 'JOMEL B. SALIBIO', 'M', 1, 8, '0', 0),
(47, 'JIAN PATRICK I. NARCISO', 'M', 1, 8, '0', 0),
(48, 'JANRIEL P. IGNACIO', 'M', 1, 8, '0', 0),
(49, 'MARIO L. TELIRON', 'M', 1, 8, '0', 0),
(50, 'MEICHAN JR K. CADIVIDA', 'M', 1, 8, '0', 0),
(51, 'ARNEL D. ARAGON', 'M', 3, 8, '0', 0),
(52, 'JHON LOUISE A. VARQUEZ', 'M', 1, 8, '0', 0),
(53, 'JHON CARL C. CABUGNASON', 'M', 1, 8, '0', 0),
(54, 'JANJEY C. GARCIA', 'M', 1, 8, '0', 0),
(55, 'BERNABE S. CANDEDEIR', 'M', 2, 8, '0', 0),
(56, 'ROMMEL T. LETANIA', 'M', 2, 8, '0', 0),
(57, 'KYNE T. AZUELO', 'M', 1, 8, '0', 0),
(58, 'KHIM JAY P. ABILAY', 'M', 1, 8, '0', 0),
(59, 'JOHN CARLO C. CADELIñA', 'M', 1, 8, '0', 0),
(60, 'AYAN C. PATOC', 'M', 1, 9, '0', 0),
(61, 'ALDRID O. ABRASALDO', 'M', 1, 9, '0', 0),
(62, 'JAFAITH J. BENITEZ', 'M', 1, 9, '0', 0),
(63, 'DANILO T. TULAYBA', 'M', 3, 9, '0', 0),
(64, 'VICENTE S. EROSEDO JR.', 'M', 2, 9, '0', 0),
(65, 'MARK ADRIAN D. MEMIS', 'M', 1, 9, '0', 0),
(66, 'USAIN DWYANE T. NAVARRO', 'M', 1, 9, '0', 0),
(67, 'MERSHAYNE DENVER S. LEGAJE', 'M', 1, 9, '0', 0),
(68, 'JHAY RHALP G. TAYAB', 'M', 1, 9, '0', 0),
(69, 'SEAN PAUL M. REYES', 'M', 1, 9, '0', 0),
(70, 'QUID LEANDER O. VALE', 'M', 1, 9, '0', 0),
(71, 'JESTONY G. GUEBAN', 'M', 1, 9, '0', 0),
(72, 'EUMAR D. MAMUGAY', 'M', 1, 9, '0', 0),
(73, 'ARWEN JHON G. VERGARA', 'M', 1, 9, '0', 0),
(74, 'JEAL S. CADAYDAY', 'M', 1, 9, '0', 0),
(75, 'KEZIAH RUNETH G. BARUTAG', 'F', 1, 10, '0', 0),
(76, 'JELLIAN E. BABOR', 'F', 1, 10, '0', 0),
(77, 'JESSA E. TOMACMOL', 'F', 1, 10, '0', 0),
(78, 'RICA MAE B. PABALINAS', 'F', 1, 10, '0', 0),
(79, 'LIANA SHEAN E. IGLESIAS', 'F', 1, 10, '0', 0),
(80, 'NANETTE N. IGNACIO', 'F', 7, 10, '0', 0),
(81, 'NENIA B. DELOS SANTOS', 'F', 1, 10, '0', 0),
(82, 'ROGELYN A. ALBA', 'F', 1, 10, '0', 0),
(83, 'KATHRYN CHANDRIA A. LENTORIO', 'F', 1, 10, '0', 0),
(84, 'EUMAE MILLA', 'F', 1, 10, '0', 0),
(85, 'MA-CECILE G. SANOY', 'F', 3, 10, '0', 0),
(86, 'GHINEA E. NABALITAN', 'F', 1, 10, '0', 0),
(87, 'BREATHNEY M. VERGARA', 'F', 1, 10, '0', 0),
(88, 'JEZIL R. DIAZ', 'F', 1, 10, '0', 0),
(89, 'EMY ROSE L. OGATIS', 'F', 1, 11, '0', 0),
(90, 'EIAIZA L. OGATIS', 'F', 1, 11, '0', 0),
(91, 'RECHELLE S. SANCHEZ', 'F', 1, 11, '0', 0),
(92, 'LILY GRACE C. LABRADOR', 'F', 3, 11, '0', 0),
(93, 'SHAIRA B. OMAGAD', 'F', 1, 11, '0', 0),
(94, 'ANGEL B. CANUGORAN', 'F', 1, 11, '0', 0),
(95, 'BEVELYN F. REYES', 'F', 1, 11, '0', 0),
(96, 'EVA C. BELNAS', 'F', 2, 11, '0', 0),
(97, 'JEMAIKHA L. PIEDAD', 'F', 1, 11, '0', 0),
(98, 'ALMA MAE A. DIVINAGRACIA', 'F', 1, 11, '0', 0),
(99, 'RESHIL S. LOPETO', 'F', 1, 11, '0', 0),
(100, 'JANROSE Q. SUBIATE', 'F', 1, 11, '0', 0),
(101, 'ESTRELLITA Q. LIZADA', 'F', 2, 11, '0', 0),
(102, 'GERALDINE L. CALUMAG', 'F', 3, 11, '0', 0),
(103, 'SEAN JOHN A. MENDOZA', 'M', 1, 12, '0', 0),
(104, 'TRAVES JASON D. CARABOT', 'M', 1, 12, '0', 0),
(105, 'JAR AR R. LADO', 'M', 2, 12, '0', 0),
(106, 'TANGON, AIKO REINHART JR. L.', 'M', 1, 12, '0', 0),
(107, 'ALDRIN M. EPAGO', 'M', 3, 12, '0', 0),
(108, 'BRIX CHARLIEMAGNE A. CADIENTE', 'M', 1, 12, '0', 0),
(109, 'KHARI ANGELOU QUIñANOLA', 'M', 1, 13, '0', 0),
(110, 'JOHN JERZEES JAYVE C. TAMPIOC', 'M', 1, 13, '0', 0),
(111, 'BALANSAG, BRYLE G.', 'M', 1, 13, '0', 0),
(112, 'JIMBO T. TEKSIO', 'M', 2, 13, '0', 0),
(113, 'ADRIAN V. MARCELO', 'M', 3, 13, '0', 0),
(114, 'FRITZ RAIVIN DIMPAS', 'M', 1, 13, '0', 0),
(115, 'RYNA SUZANE E. VEDAJA', 'F', 1, 14, '0', 0),
(116, 'JOSSIE A. SUMAGASAY', 'F', 1, 14, '0', 0),
(117, 'ANN HARRIETTE V. TOLEDO', 'F', 3, 14, '0', 0),
(118, 'JESSAMAE E. ESTREBELLA', 'F', 1, 14, '0', 0),
(119, 'JESSICA P. YBAñEZ', 'F', 2, 14, '0', 0),
(120, 'ANGELIN B. GECONCILLO', 'F', 1, 14, '0', 0),
(121, 'FE MARIE G. RUBIA', 'F', 4, 14, '0', 0),
(122, 'APRIL RUBIA MARIE T. HISUGAN', 'F', 1, 15, '0', 0),
(123, 'JESLYN JANE O. LINGCO', 'F', 1, 15, '0', 0),
(124, 'LANIE J. GARNIZO', 'F', 2, 15, '0', 0),
(125, 'ROBIE S. CABEL', 'F', 2, 15, '0', 0),
(126, 'ESTELLA MARIE T. VECINAL', 'F', 1, 15, '0', 0),
(127, 'CHRISTINE JANE Q. BERGABERA', 'F', 1, 15, '0', 0),
(128, 'VALJACOB B. MANLUCOT', 'M', 1, 52, '0', 0),
(129, 'EMMANUEL L. TOLEDO', 'M', 1, 52, '0', 0),
(130, 'FERNANDO G. BAYOT JR.', 'M', 2, 52, '0', 0),
(131, 'JAYKENNE V. LACSON', 'M', 1, 52, '0', 0),
(132, 'KENT JOHN L. NEROSA', 'M', 1, 52, '0', 0),
(133, 'FEDENCIO JR. N. AUSTERO', 'M', 4, 17, '0', 0),
(134, 'FRANCO L. BAMAN', 'M', 2, 17, '0', 0),
(135, 'JOHNNALD A. BAñAS', 'M', 1, 17, '0', 0),
(136, 'WILHEM KHIRL Y. CADALSO', 'M', 1, 17, '0', 0),
(137, 'CARYK CRIS C. CARO', 'M', 1, 17, '0', 0),
(138, 'LORENCE D. DUMAT-OL', 'M', 1, 17, '0', 0),
(139, 'JOHN LENARD T. GARNICA', 'M', 1, 17, '0', 0),
(140, 'LANCE KIRBY R. INTAS', 'M', 1, 17, '0', 0),
(141, 'CLIGHT D. MORADOS', 'M', 1, 17, '0', 0),
(142, 'KIT M. PACARAT', 'M', 1, 17, '0', 0),
(143, 'KEVIN C. RECOMONO', 'M', 1, 17, '0', 0),
(144, 'JOHN PAUL V. RENDOQUE', 'M', 1, 17, '0', 0),
(145, 'KURT O. SABOCOHAN', 'M', 1, 17, '0', 0),
(146, 'EJAY PAUL TERANIA', 'M', 1, 17, '0', 0),
(147, 'CLIFT JUSTINE JHON P. TORRES', 'M', 1, 17, '0', 0),
(148, 'REYNALD M. LUMAPAY', 'M', 1, 19, '0', 0),
(149, 'LEOMIL G. NAMA', 'M', 1, 19, '0', 0),
(150, 'EDEZA M. TUMLAD', 'F', 2, 19, '0', 0),
(151, 'EMMANUEL D. GILPO', 'M', 2, 20, '0', 0),
(152, 'GIAISSA P. RAMIREZ', 'F', 1, 20, '0', 0),
(153, 'CARLOTA V. PARBA', 'F', 7, 20, '0', 0),
(154, 'PRINCESS KIARA C. LANORIAS', 'F', 1, 20, '0', 0),
(155, 'MAY JOHN B. ENEMIDO', 'M', 1, 21, '0', 0),
(156, 'MERCITO B. ENEMIDO', 'M', 1, 21, '0', 0),
(157, 'RYAN P. DOROMAL', 'M', 1, 21, '0', 0),
(158, 'ALDRYNE M. GONZALES', 'M', 1, 21, '0', 0),
(159, 'JAYKER F. PROVIDO', 'M', 1, 21, '0', 0),
(160, 'ABELARDO N. ARMENIA', 'M', 3, 21, '0', 0),
(161, 'CHRISTIAN H. ORTEGA', 'M', 1, 21, '0', 0),
(162, 'MARVIN V. AMAR', 'M', 2, 21, '0', 0),
(163, 'ARNOLD N. AREVALO', 'M', 3, 21, '0', 0),
(164, 'KENT ANDRE A. TEVES', 'M', 1, 21, '0', 0),
(165, 'GLEINN G. PORLAS', 'M', 1, 21, '0', 0),
(166, 'JOHN JOVEL O. MAHINAY', 'M', 1, 21, '0', 0),
(167, 'FERNEL JHON C. PADILLA', 'M', 1, 21, '0', 0),
(168, 'DOMINADOR C. CULAGBANG', 'M', 2, 22, '0', 0),
(169, 'CHRIS ANTHONY J. MARINO', 'M', 1, 22, '0', 0),
(170, 'CEDRICK JAYDEN T. NG', 'M', 1, 22, '0', 0),
(171, 'AMBERLY RUBI M. PAGLINAWAN', 'F', 1, 24, '0', 0),
(172, 'FEMIA NADINE O. TIZON', 'F', 2, 24, '0', 0),
(173, 'PRINCESS JEAN D. MAALA', 'F', 1, 24, '0', 0),
(174, 'NIñO JANN MOSES F. DURAN', 'M', 1, 23, '0', 0),
(175, 'MICHAEL R. INIGO', 'M', 1, 23, '0', 0),
(176, 'MEMIA S. BITO-ON', 'F', 2, 25, '0', 0),
(177, 'SHARON S. AREVALO', 'F', 2, 25, '0', 0),
(178, 'ABBY VALE M. EBRO', 'F', 1, 25, '0', 0),
(179, 'ANGEL L. EBOGON', 'F', 1, 25, '0', 0),
(180, 'ROMER WENZU A. SARA', 'M', 1, 26, '0', 0),
(181, 'CJ PAUL P. SA-AVEDRA', 'M', 1, 26, '0', 0),
(182, 'HARRIT JADEN BACARAT', 'M', 1, 26, '0', 0),
(183, 'ROYLIEGH GODSENT D. SIACOR', 'M', 1, 26, '0', 0),
(184, 'JOHN LEND PAONER', 'M', 1, 26, '0', 0),
(185, 'ALWYN O. MONTON', 'M', 1, 26, '0', 0),
(186, 'ERNEST JOHN TAN', 'M', 1, 26, '0', 0),
(187, 'ZHIAN XHIAN B. MACA', 'M', 1, 26, '0', 0),
(188, 'RR THOMAS R. ERLINA', 'M', 1, 26, '0', 0),
(189, 'VICTORIANO MABATID', 'M', 1, 26, '0', 0),
(190, 'EUSUNGEL LEOMAR G. VILLACAMPA', 'M', 1, 26, '0', 0),
(191, 'CHAUNCEY A. PAROLLINA', 'M', 1, 26, '0', 0),
(192, 'YAZZER MAHATMA ROHULLAH A. GABAY', 'M', 1, 26, '0', 0),
(193, 'JAN ROBIE M. SOJOR', 'M', 1, 26, '0', 0),
(194, 'JOHN DAVID M. PABOL', 'M', 1, 26, '0', 0),
(195, 'MARICAR F. JAKOSALEM', 'F', 2, 26, '0', 0),
(196, 'RENZ JOSEPH T. TULAYBA', 'M', 2, 26, '0', 0),
(197, 'LOYD STEVE L. ABARE', 'M', 2, 26, '0', 0),
(198, 'PHILIPPE DAYONO', 'M', 1, 26, '0', 0),
(199, 'CYRUS DANIELL PALMA', 'M', 1, 26, '0', 0),
(200, 'YITZHAK BENEDICT RASHAED A. GABAY', 'M', 1, 27, '0', 0),
(201, 'VINCENT EMMARB A. SARA', 'M', 1, 27, '0', 0),
(202, 'JON EMMANUEL E. ACIBO', 'M', 1, 27, '0', 0),
(203, 'FLITZ JHANN A. BORRES', 'M', 1, 27, '0', 0),
(204, 'JOHN LLOYD C. MAHUSAY', 'M', 1, 27, '0', 0),
(205, 'MICHAEL JUSTIN M. MIRADOR', 'M', 1, 27, '0', 0),
(206, 'ARNOLD H. DAUIS', 'M', 1, 27, '0', 0),
(207, 'GEORGE VINCENT T. TULAYBA', 'M', 2, 27, '0', 0),
(208, 'JAMES LLOYD P. MARIMON', 'M', 1, 27, '0', 0),
(209, 'RIAN JAY E. RAFALES', 'M', 1, 27, '0', 0),
(210, 'ZYDEL JOE R. BARNIDO', 'M', 1, 27, '0', 0),
(211, 'ETHAN MATTHEW CACAS', 'M', 1, 27, '0', 0),
(212, 'JUSTINE M. ELTHANAL', 'M', 1, 27, '0', 0),
(213, 'JAMES M. JORDAN', 'M', 1, 27, '0', 0),
(214, 'JOSE CZAR A. AGUILAR', 'M', 1, 27, '0', 0),
(215, 'VINCE G. PINANONANG', 'M', 1, 27, '0', 0),
(216, 'JAMES A. AMPARADO', 'M', 1, 27, '0', 0),
(217, 'RITCHIE JOSHUA A. PILARES', 'M', 1, 27, '0', 0),
(218, 'HUGH LUIGI L. ZAMORA', 'M', 1, 27, '0', 0),
(219, 'MATT ANDREW C. MAASIN', 'M', 1, 27, '0', 0),
(220, 'RODGE A. SANDOVAL', 'M', 1, 27, '0', 0),
(221, 'JAYKO M. JORDAN', 'M', 1, 27, '0', 0),
(222, 'CRIDEM N. GAGA-A', 'M', 2, 28, '0', 0),
(223, 'SHEKAINE MARIE E. TOLENTINO', 'F', 1, 28, '0', 0),
(224, 'UNNAH KHARYLLE B. AGCOPRA', 'F', 1, 28, '0', 0),
(225, 'JERAH B. LARGO', 'F', 1, 28, '0', 0),
(226, 'JIEZEL M. TRAYVILLA', 'F', 1, 28, '0', 0),
(227, 'CRIS JOZL G. ELENTORIO', 'F', 1, 28, '0', 0),
(228, 'SAMANTHA T. JAUGAN', 'F', 1, 28, '0', 0),
(229, 'XYKIRAH GOLDEN DAWN BENEDICTO', 'F', 1, 28, '0', 0),
(230, 'DANARECCA L. HOBRO', 'F', 1, 28, '0', 0),
(231, 'RAMLYN T. AUSTIAL', 'F', 1, 28, '0', 0),
(232, 'FHEUNA ADNEROLF S. TAN', 'F', 1, 28, '0', 0),
(233, 'ALTHEA T. MARAVILLAS', 'F', 1, 28, '0', 0),
(234, 'UNICE CLAIRE B. AGCOPRA', 'F', 1, 28, '0', 0),
(235, 'MARY GRACE E. JALBUNA', 'F', 3, 28, '0', 0),
(236, 'JEDDAH KIETH N. PAJUNAR', 'F', 1, 28, '0', 0),
(237, 'JEZAN R. TAGABUHIN', 'M', 1, 29, '0', 0),
(238, 'XYZIA SAZON', 'M', 1, 29, '0', 0),
(239, 'PAUL IAN B. CERRADO', 'M', 1, 29, '0', 0),
(240, 'JACKILY A. RUBI', 'M', 2, 29, '0', 0),
(241, 'JEZAN R. BANGUIRAN', 'M', 1, 29, '0', 0),
(242, 'MARLON V. ANOCHE', 'M', 2, 30, '0', 0),
(243, 'KYL NICHOLAS V. DELGADO', 'M', 1, 30, '0', 0),
(244, 'NIñO JAY G. NUÑES', 'M', 1, 30, '0', 0),
(245, 'BEDA CAñAMAQUE II', 'M', 1, 30, '0', 0),
(246, 'JHON CARLO O. PASCO', 'M', 1, 30, '0', 0),
(247, 'INA GRACEWYNN G. JORDAN', 'F', 1, 31, '0', 0),
(248, 'MAE THERESE C. CABIJE', 'F', 1, 31, '0', 0),
(249, 'AVERILL L. BOLLOS', 'F', 1, 31, '0', 0),
(250, 'MARIA VICTORIA G. DULAPO', 'F', 2, 31, '0', 0),
(251, 'NIñA V. BENDIJO', 'F', 1, 31, '0', 0),
(252, 'CHARLES EMMANUEL A. CADIENTE', 'M', 1, 32, '0', 0),
(253, 'JUAN CARLO C. CASTILLO', 'M', 1, 32, '0', 0),
(254, 'JOREM C. CATUBIG', 'M', 1, 32, '0', 0),
(255, 'MC CLARK R. LUCERO', 'M', 1, 32, '0', 0),
(256, 'WINSTON JOHN R. LUCERO', 'M', 1, 32, '0', 0),
(257, 'LEO O. MELENDRES', 'M', 2, 32, '0', 0),
(258, 'NEAH C. SANTIAGO', 'F', 2, 33, '0', 0),
(259, 'ROCHELLE ANN VALOR', 'F', 1, 33, '0', 0),
(260, 'DANICA L. ESONA', 'F', 2, 33, '0', 0),
(261, 'ISABEL C. TORAJA KEA', 'F', 1, 33, '0', 0),
(262, 'ATHENA KATHLAINE MAGBANUA', 'F', 1, 33, '0', 0),
(263, 'MAE NOREEN A. COLENTAVA', 'F', 1, 33, '0', 0),
(264, 'AIRISH V. ESCORA', 'F', 1, 33, '0', 0),
(265, 'JOHN BETH S. FIGURA', 'F', 1, 33, '0', 0),
(266, 'JOANA MAE B. MAGBANUA', 'F', 1, 33, '0', 0),
(267, 'JEZZREL A. CALO-OY', 'M', 1, 34, '0', 0),
(268, 'NEMISIO B. VALNADRES JR.', 'M', 1, 34, '0', 0),
(269, 'JAMERICH IAN Z. INTONG', 'M', 1, 34, '0', 0),
(270, 'REYAN C. CATALAN', 'M', 1, 34, '0', 0),
(271, 'JOHNMARK G. VILLACERAN', 'M', 1, 34, '0', 0),
(272, 'KARENJOY J. MAGLANGIT', 'M', 2, 34, '0', 0),
(273, 'CANDIES JOY D. GAUDIA', 'F', 1, 36, '0', 0),
(274, 'BERNALYN L. IB-IB', 'F', 1, 36, '0', 0),
(275, 'MERY JOY D. GONZALES', 'F', 1, 36, '0', 0),
(276, 'RINALYN V. LIPAOPAO', 'F', 1, 36, '0', 0),
(277, 'MARY JOY R. JALBUNA', 'F', 2, 36, '0', 0),
(278, 'KIMLEY JERKS P. TAMONANG', 'M', 2, 35, '0', 0),
(279, 'ALVIN G. EMIT', 'M', 1, 35, '0', 0),
(280, 'SHEMUEL L. SIASON', 'M', 1, 35, '0', 0),
(281, 'LANCE RYAN B. SANTIAGO', 'M', 1, 35, '0', 0),
(282, 'RAYMART C. VILANDO', 'M', 1, 35, '0', 0),
(283, 'JOELMAR C. SECOR', 'M', 1, 35, '0', 0),
(284, 'JHON ALFRED T. BAGUIO', 'M', 1, 35, '0', 0),
(285, 'JOHN KIRT R. TAMONANG', 'M', 1, 35, '0', 0),
(286, 'RAYLAN M. MACAHUSAY', 'M', 1, 35, '0', 0),
(287, 'HARLPH JHANDYR S. ABUSO', 'M', 1, 35, '0', 0),
(288, 'JOHN MARK A. SUETO', 'M', 1, 35, '0', 0),
(289, 'REY D. REBAYLE JR.', 'M', 1, 35, '0', 0),
(290, 'ROBIN S. BALDEVINO', 'F', 2, 35, '0', 0),
(291, 'REXIE D. OMBOY', 'F', 2, 35, '0', 0),
(292, 'MERWIN V. POMADA', 'M', 2, 39, '0', 0),
(293, 'JOHANN KATE LAWRENCE K. VIOLA', 'F', 3, 39, '0', 0),
(294, 'GERLYN Q. CARVASAL', 'F', 1, 39, '0', 0),
(295, 'RENEBOY Q. VILLAMERA', 'M', 1, 39, '0', 0),
(296, 'DAN MARK L. SAMSON', 'M', 1, 39, '0', 0),
(297, 'NOEL D. BERGORIO', 'M', 1, 16, '0', 0),
(298, 'JOHN LLOYD C. LABATETE', 'M', 1, 16, '0', 0),
(299, 'ESTER JOY Q. TUBESA', 'F', 2, 16, '0', 0),
(300, 'GEMME G. TAVEROS', 'M', 1, 16, '0', 0),
(301, 'MATTHEW C. ESPINOSA', 'M', 1, 16, '0', 0),
(302, 'ZYñA DYN M. INGAN', 'F', 2, 16, '0', 0),
(303, 'LEAH A. SALUMAG', 'F', 2, 16, '0', 0),
(304, 'MA. JESSA FEBRA L. ABUGAN', 'M', 2, 16, '0', 0),
(305, 'MARJON AVILA', 'M', 1, 16, '0', 0),
(306, 'EDGAR A. GUARDIANO', 'M', 1, 16, '0', 0),
(307, 'KENDRIC G. ROTONE', 'M', 1, 16, '0', 0),
(308, 'FIER PAOLO N. BARRERA', 'M', 1, 16, '0', 0),
(309, 'ARGIE P. PABALINAS', 'M', 1, 16, '0', 0),
(310, 'MARK ANTHONY E. DEVERA', 'M', 1, 16, '0', 0),
(311, 'HARLINE A. BOHOL', 'F', 3, 16, '0', 0),
(312, 'JONNA B. VILLAZOR', 'F', 1, 18, '0', 0),
(313, 'JOYLYN Q. VILLAMERA', 'F', 1, 18, '0', 0),
(314, 'EVANGELINE L. QUINDO', 'M', 1, 18, '0', 0),
(315, 'BONITA M. CLAUDEL', 'F', 2, 18, '0', 0),
(316, 'RITCHELLE A. EREDERA', 'F', 2, 18, '0', 0),
(317, 'LUTCHIE P. PEREGIL', 'F', 3, 18, '0', 0),
(318, 'RUDYMER M. NABALITAN', 'M', 1, 37, '0', 0),
(319, 'MIKE D. MEMIS', 'M', 1, 37, '0', 0),
(320, 'ERWIN EWAYAN', 'M', 1, 37, '0', 0),
(321, 'WELKIN JAY S. BALINGIT', 'M', 2, 37, '0', 0),
(322, 'CONDRAD VINCENT A. PAYOT', 'M', 1, 37, '0', 0),
(323, 'JENNY ROSE E. GEMINA', 'F', 1, 38, '0', 0),
(324, 'LOUIEN FAITH J. CAYANG', 'F', 1, 38, '0', 0),
(325, 'JENNIBETH T. CABUROBIAS', 'F', 2, 38, '0', 0),
(326, 'JOSHEPINE SA-AVEDRA', 'F', 2, 40, '0', 0),
(327, 'JOE D. NESNIA', 'M', 1, 40, '0', 0),
(328, 'JOHN LOYD KENT O. GUILAS', 'M', 1, 40, '0', 0),
(329, 'VINCENT NIKKULLAZ B. ELNAR', 'M', 1, 40, '0', 0),
(330, 'JOSHUA D. NESNIA', 'M', 1, 40, '0', 0),
(331, 'JOHANNE LOUISE TUALA', 'F', 1, 42, '0', 0),
(332, 'KEISHA M. PANOGAN', 'F', 1, 42, '0', 0),
(333, 'RHAZELLE QUEEN CABASAG', 'F', 1, 42, '0', 0),
(334, 'LEAF LAIGEN G. MENDEZABAL', 'F', 1, 42, '0', 0),
(335, 'JEANA G. MENDEZABAL', 'F', 2, 42, '0', 0),
(336, 'RAY LORD F. CASIPONG', 'M', 1, 41, '0', 0),
(337, 'RENGELYN S. MILLONDAGA', 'F', 2, 41, '0', 0),
(338, 'CHIL JUN R. AñASCO', 'M', 1, 41, '0', 0),
(339, 'WELJUN A. BLANCO', 'M', 1, 41, '0', 0),
(340, 'JOHN DANNIEL L. GUMAHAD', 'M', 1, 41, '0', 0),
(341, 'KAREN TIMBANGAN', 'F', 1, 43, '0', 0),
(342, 'PRINCESS DAWN O. MANAGAYTAY', 'F', 1, 43, '0', 0),
(343, 'ROSE LALINE L. GALVEZ', 'F', 1, 43, '0', 0),
(344, 'HAZEL A. ABU-RUMMAN', 'F', 2, 43, '0', 0),
(345, 'JEAH JEAN G. MENDEZABAL', 'F', 1, 43, '0', 0),
(346, 'ALLIANA JOVE N. TORINO', 'F', 1, 45, '0', 0),
(347, 'APPLE O. SIACOR', 'F', 1, 45, '0', 0),
(348, 'SHEILA P. BARON', 'F', 1, 45, '0', 0),
(349, 'ASHLEAH ALLEXA JANE K. YGUINTO', 'F', 1, 45, '0', 0),
(350, 'ASHLEY BABE O. ASEñAS', 'F', 1, 45, '0', 0),
(351, 'EDHIELYN L. RUELO', 'F', 1, 45, '0', 0),
(352, 'ELLA KRISHA L. TAMAYO', 'F', 1, 45, '0', 0),
(353, 'EVA R. LEQUIN', 'F', 2, 45, '0', 0),
(354, 'KATE ROZZAINE L. TAMAYO', 'F', 1, 45, '0', 0),
(355, 'KEN CHEZZCA V. JALAPA', 'F', 1, 45, '0', 0),
(356, 'MARY GRACE A. OBANG', 'F', 2, 44, '0', 0),
(357, 'NEIL BRYAN H. JARNAIZ', 'M', 1, 44, '0', 0),
(358, 'NESTIE JOHN KENNETH ADELA', 'M', 1, 44, '0', 0),
(359, 'NETHANIEL T. GARSULA', 'M', 1, 44, '0', 0),
(360, 'ARIN T. BINONDO', 'M', 1, 44, '0', 0),
(361, 'ASHDRAKE JAY JOSHJEAN K. YGUINTO', 'M', 1, 44, '0', 0),
(362, 'JANREL F. CARBONILLA', 'M', 1, 44, '0', 0),
(363, 'JERIC G. LOPEZ', 'M', 1, 44, '0', 0),
(364, 'ACE FRANCIS V. BACONGALLIO', 'M', 1, 46, '0', 0),
(365, 'CATHERINE B. ESCORA', 'F', 3, 46, '0', 0),
(366, 'EPHREIN REY R. ARANAS', 'M', 1, 46, '0', 0),
(367, 'IAN KHYLE E. MACABINGUIL', 'M', 1, 46, '0', 0),
(368, 'JAMES EDRIAN G. ARNAIZ', 'M', 1, 46, '0', 0),
(369, 'JANSSEN CAYL S. MARYFIEL', 'M', 1, 46, '0', 0),
(370, 'JAYLORD T. VALOR', 'M', 1, 46, '0', 0),
(371, 'JENNIFER T. PEñAS', 'F', 2, 46, '0', 0),
(372, 'JOHN BRAYDEN GALON', 'M', 1, 46, '0', 0),
(373, 'JOHN MARK P. MARIBAO', 'M', 1, 46, '0', 0),
(374, 'LENNARD PHILIP T. ALILING', 'M', 1, 46, '0', 0),
(375, 'PHRINCE KIO E. MACABINGUIL', 'M', 1, 46, '0', 0),
(376, 'ROD JUPITH S. TEJE', 'M', 1, 46, '0', 0),
(377, 'VINCE E. MACABINGUIL', 'M', 1, 46, '0', 0),
(378, 'RACHEL E. PAL-ING', 'F', 4, 46, '0', 0),
(379, 'CRESHA MAE T. VILLACERAN', 'F', 1, 48, '0', 0),
(380, 'DENNIS A. BORRES', 'M', 2, 48, '0', 0),
(381, 'BABY ZYLA S. CADUCOY', 'F', 1, 48, '0', 0),
(382, 'ALEZANDRA C. CABEL', 'F', 1, 48, '0', 0),
(383, 'JESAIRA MARIE A. CANOY', 'F', 1, 48, '0', 0),
(384, 'JESSEL MAE M. NESNIA', 'F', 1, 48, '0', 0),
(385, 'SARAH JANE LAPIS', 'F', 1, 48, '0', 0),
(386, 'TRISHA MARIE P. MAGBANUA', 'F', 1, 48, '0', 0),
(387, 'TRISHA P. ALPUERTO', 'F', 1, 48, '0', 0),
(388, 'RICO G. DISLAG JR.', 'M', 1, 48, '0', 0),
(389, 'KIEL LAINE G. YBAñEZ', 'F', 7, 48, '0', 0),
(390, 'IRISH JANE M. GERIAN', 'F', 1, 48, '0', 0),
(391, 'IVY M. CADIZ', 'F', 1, 48, '0', 0),
(392, 'JAMES EDWARD P. PATANAO', 'M', 3, 48, '0', 0),
(393, 'NICA S. MANUNTAG', 'F', 1, 48, '0', 0),
(394, 'NICOLE C. VILLANUEVA', 'F', 1, 48, '0', 0),
(395, 'KATY MILES T. CARLON', 'F', 1, 48, '0', 0),
(396, 'KARLA CASSANDRA J. LAPIS', 'F', 1, 48, '0', 0),
(397, 'ANNA MARIE C. PINANONANG', 'F', 3, 47, '0', 0),
(398, 'BRIAN RIE F. OMAGTANG', 'M', 1, 47, '0', 0),
(399, 'ALEMAR JOHN M. PAIRA', 'M', 1, 47, '0', 0),
(400, 'CHAZZ ANTHONY RAKIM T. ORACION', 'M', 1, 47, '0', 0),
(401, 'CHRISTIAN N. CASTRO', 'M', 2, 47, '0', 0),
(402, 'REY STEPHEN T. BANOGON', 'M', 1, 47, '0', 0),
(403, 'DAVE LAWRENCE J. MANGANDOG', 'M', 1, 47, '0', 0),
(404, 'JOHN LORENZ Y. PAMPILO', 'M', 1, 47, '0', 0),
(405, 'JOHN LUIS B. ANDAL', 'M', 1, 47, '0', 0),
(406, 'JOHN AXCEL REYES', 'M', 1, 47, '0', 0),
(407, 'KARL VINCENT T. CATENZA', 'M', 1, 47, '0', 0),
(408, 'KERTH D. BAYOGUIñA', 'M', 1, 47, '0', 0),
(409, 'MARIUS G. CALIJAN', 'M', 1, 47, '0', 0),
(410, 'KARLU RESTE T. ANITO', 'M', 1, 47, '0', 0),
(411, 'KING EDGY G. BARROCA', 'M', 1, 47, '0', 0),
(412, 'JEIANNE A. BASCAR', 'F', 1, 49, '0', 0),
(413, 'JENELLE T. PONCE', 'F', 1, 49, '0', 0),
(414, 'ALLIYAH V. APOSTOL', 'F', 1, 49, '0', 0),
(415, 'ALMABELLE C. DEPOSOY', 'T', 3, 49, '0', 0),
(416, 'ALYZA MAE A. MARIMLA', 'F', 1, 49, '0', 0),
(417, 'APRIL MAE E. CADIENTE', 'F', 1, 49, '0', 0),
(418, 'CRISTEL MAE L. PABLE', 'F', 1, 49, '0', 0),
(419, 'DONNA MAE Q. CABALLERO', 'F', 1, 49, '0', 0),
(420, 'ERICH CHRYSSELLE M. TOLENTINO', 'F', 1, 49, '0', 0),
(421, 'FEYACINT B. APOSTOL', 'F', 1, 49, '0', 0),
(422, 'JOHN HARVEY R. MANUEL', 'M', 2, 49, '0', 0),
(423, 'LYCA BORRES', 'F', 1, 49, '0', 0),
(424, 'QUEENIE CLAIRE Q. CABALLERO', 'F', 1, 49, '0', 0),
(425, 'AIRA S. TAñAMOR', 'F', 1, 49, '0', 0),
(426, 'RAYMOND B. AMBO', 'M', 4, 49, '0', 0),
(427, 'JEJIE B. DACULA', 'M', 1, 50, '0', 0),
(428, 'KLUNT GLADNER G. MACASLING', 'M', 1, 50, '0', 0),
(429, 'GHAVY ANILOV A. QUIANZO', 'M', 1, 50, '0', 0),
(430, 'RUEL JAY D. REBUTAZO', 'M', 1, 50, '0', 0),
(431, 'DESTINE SEAN M. ALIABO', 'M', 1, 50, '0', 0),
(432, 'RENE C. MACAY JR.', 'M', 1, 50, '0', 0),
(433, 'JOHN CARLO A. TOMEDO', 'M', 1, 50, '0', 0),
(434, 'PAUL T. LEGASPI', 'M', 1, 50, '0', 0),
(435, 'EMMANUEL D. MANLUN-UYAN', 'M', 2, 50, '0', 0),
(436, 'ALFIE T. HERRERA', 'M', 2, 50, '0', 0),
(437, 'NOEL S. TONOGBANUA JR.', 'M', 1, 50, '0', 0),
(438, 'CRICHEL HAYDEE MICHAELA C. GAGA-A', 'F', 1, 51, '0', 0),
(439, 'JURLIE MAE L. SANOY', 'F', 1, 51, '0', 0),
(440, 'SWEET VALLERY M. TUMALE', 'F', 1, 51, '0', 0),
(441, 'ANTONETTE L. TORREGUE', 'F', 1, 51, '0', 0),
(442, 'GLIA HEART PAHULAYAN', 'F', 1, 51, '0', 0),
(443, 'KATE LEISLY C. CABASAG', 'F', 1, 51, '0', 0),
(444, 'KHRYSTAL MYRRH M. CLAUDEL', 'F', 1, 51, '0', 0),
(445, 'CHLOIE DAWN C. SAGANG', 'F', 1, 51, '0', 0),
(446, 'MARISOL M. MASAYON', 'F', 2, 51, '0', 0),
(447, 'DR. ANELITO A. BONGCAWIL', 'M', 6, 53, '0', 0),
(448, 'DR. JULIET J. TUALA', 'F', 6, 53, '0', 0),
(449, 'DR. EDUARDO L. LAGOS', 'M', 6, 53, '0', 0),
(450, 'DR. ADONIS S. RIVERA', 'M', 6, 53, '0', 0),
(451, 'ANDRITO Q. BAJARDO', 'M', 6, 53, '0', 0),
(452, 'MRS. MARY ANN L. BOLLOS', 'F', 6, 53, '0', 0),
(453, 'Christopher U. Bantug', 'M', 6, 53, '0', 0),
(454, 'Apple Mae C. Ridad', 'F', 6, 53, '0', 0),
(455, 'Roger Lagarde', 'M', 6, 53, '0', 0),
(456, 'Argene Rose Glodove', 'F', 6, 53, '0', 0),
(457, 'Emma Artes', 'F', 6, 53, '0', 0),
(458, 'Engr. Kurt Calijan', 'M', 6, 53, '0', 0),
(459, 'Albert E. Sarsuelo', 'M', 6, 53, '0', 0),
(460, 'Jose Marie Queen Bee Libe', 'F', 6, 53, '0', 0),
(461, 'Noemi A. Baldado', 'F', 6, 53, '0', 0),
(462, 'Wicko S. Santiago', 'M', 6, 53, '0', 0),
(463, 'Jessil Faburada', 'F', 6, 53, '0', 0),
(464, 'Milon Nama', 'M', 6, 53, '0', 0),
(465, 'Gilbert Morata', 'M', 6, 53, '0', 0),
(466, 'Ms. Luisa Igos', 'F', 6, 53, '0', 0),
(467, 'Mrs. Emma G. Apdian', 'F', 6, 53, '0', 0),
(468, 'Annabella P. Eva', 'F', 6, 53, '0', 0),
(469, 'Gerlie Paglinawan', 'F', 6, 53, '0', 0),
(470, 'Mrs. Ruby Yparosa', 'F', 6, 53, '0', 0),
(471, 'Mrs. Hilda Gotladera', 'F', 6, 53, '0', 0),
(472, 'Dr. Christille Cynth T. Pomada', 'F', 6, 53, '0', 0),
(473, 'Dr. Jay Garry Tangente', 'M', 6, 53, '0', 0),
(474, 'Mary Grace N. Guerrero', 'F', 6, 53, '0', 0),
(475, 'Joann Terania', 'F', 6, 53, '0', 0),
(476, 'Dr. Cherryl Mae Hongcuay', 'F', 6, 53, '0', 0),
(477, 'Stanley Secong', 'M', 6, 53, '0', 0),
(478, 'Francisco Tomong Jr.', 'M', 6, 53, '0', 0),
(479, 'Roy F. Divinagracia', 'M', 6, 53, '0', 0),
(480, 'Rolex Rocky T. Anito', 'M', 6, 53, '0', 0),
(481, 'Diophil T. Valde', 'M', 6, 53, '0', 0),
(482, 'Johnyrie B. Empeynado', 'M', 6, 53, '0', 0),
(483, 'Lelian D. Gutib', 'F', 6, 53, '0', 0),
(484, 'Fretzie S. Dela Cruz', 'F', 6, 53, '0', 0),
(485, 'Rey G. Torremoro', 'M', 6, 53, '0', 0),
(486, 'Soliman Cabugnason', 'M', 6, 53, '0', 0),
(487, 'Joe Alexis Cabonelas', 'M', 6, 53, '0', 0),
(488, 'Cerilo Taburada', 'M', 6, 53, '0', 0),
(489, 'Quenie Kim Diabo', 'F', 6, 53, '0', 0),
(490, 'Charlie Alfetche', 'M', 6, 53, '0', 0),
(491, 'Christy Sarita Gumana', 'F', 6, 53, '0', 0),
(492, 'Richard Lungcob', 'M', 6, 53, '0', 0),
(493, 'Nino Rey Cervantes', 'M', 6, 53, '0', 0),
(494, 'Emily Llandres', 'F', 6, 53, '0', 0),
(495, 'John Rey Tajanlangit', 'M', 6, 53, '0', 0),
(496, 'Dr. Sheena Leonore Parreño', 'F', 6, 53, '0', 0),
(497, 'Jerry A. Baclaan', 'M', 6, 53, '0', 0),
(498, 'Hazel V. Rivera', 'F', 6, 53, '0', 0),
(499, 'Persee James R. Baybay', 'M', 6, 53, '0', 0),
(500, 'Herlany Cadiz', 'F', 6, 53, '0', 0),
(501, 'Emmylane Fabores', 'F', 6, 53, '0', 0),
(502, 'Mrs. Gerah Valle', 'F', 6, 53, '0', 0),
(503, 'Emmanuel Pomada', 'M', 6, 53, '0', 0),
(504, 'Napoleon C. Sanoy', 'M', 6, 53, '0', 0),
(505, 'Symond Maglasang', 'M', 6, 53, '0', 0),
(506, 'Rey Ningasca', 'M', 6, 53, '0', 0),
(507, 'Jurg Patrimonio', 'M', 6, 53, '0', 0),
(508, 'Lorenzo Ybanez', 'M', 6, 53, '0', 0),
(509, 'Johnrey Garay', 'M', 6, 53, '0', 0),
(510, 'Nelson Masayon', 'M', 6, 53, '0', 0),
(511, 'Rodel Ferrater', 'M', 6, 53, '0', 0),
(512, 'Dumptruck 1', 'M', 6, 53, '0', 0),
(513, 'Dumptruck 2', 'M', 6, 53, '0', 0),
(514, 'Joefil Tejero', 'M', 6, 53, '0', 0),
(515, 'helper DT2', 'M', 6, 53, '0', 0),
(516, 'Jedidah B. Bordios', 'F', 6, 53, '0', 0),
(517, 'Philip A. Bencalo', 'M', 6, 53, '0', 0),
(518, 'Noelle Faith Oracion', 'F', 6, 53, '0', 0),
(519, 'GM Duhaylungsod', 'M', 6, 53, '0', 0),
(520, 'Rex Anthony S. Camoro', 'M', 6, 53, '0', 0),
(521, 'Rosalina Lebrilla', 'F', 6, 53, '0', 0),
(522, 'Juliet G. Alanano', 'M', 6, 53, '0', 0),
(523, 'Enriquita Bison', 'F', 6, 53, '0', 0),
(524, 'Joanie F. Octaviano', 'M', 6, 53, '0', 0),
(525, 'Christine Sornillo', 'M', 6, 53, '0', 0),
(526, 'Angeles B. Graciadas', 'F', 6, 53, '0', 0),
(527, 'Necyl S. Galicia', 'F', 6, 53, '0', 0),
(528, 'Emelyn Salazar', 'F', 6, 53, '0', 0),
(529, 'Lovely Heart Torres', 'F', 6, 53, '0', 0),
(530, 'Leah Marie V. Palmero', 'F', 6, 53, '0', 0),
(531, 'Maribeck Rubia', 'F', 6, 53, '0', 0),
(532, 'Naomi D. Truita', 'F', 6, 53, '0', 0),
(533, 'Limer Arevalo', 'M', 6, 53, '0', 0),
(534, 'Marlon Dequillo', 'M', 6, 53, '0', 0),
(535, 'Fe Ivy Tangon', 'F', 6, 53, '0', 0),
(536, 'Reggie Obanana, Jr.', 'M', 6, 53, '0', 0),
(537, 'Lilibeth Feril', 'F', 6, 53, '0', 0),
(538, 'Emily Llandres', 'F', 6, 53, '0', 0),
(539, 'Julie Espares', 'M', 6, 53, '0', 0),
(540, 'Armando Pasco', 'M', 6, 53, '0', 0),
(541, 'Jhonrey Bendijo', 'M', 6, 53, '0', 0),
(542, 'Jay Paul Maraya', 'M', 6, 53, '0', 0),
(543, 'Espedito Reyes Jr.', 'M', 6, 53, '0', 0),
(544, 'Marvin Jamandron', 'M', 6, 53, '0', 0),
(545, 'Roberto Taburda', 'M', 6, 53, '0', 0),
(546, 'Ryan Garilao', 'M', 6, 53, '0', 0),
(547, 'Lemar Patanao', 'M', 6, 53, '0', 0),
(548, 'Melvin Yurong', 'M', 6, 53, '0', 0),
(549, 'Esmole Canete', 'M', 6, 53, '0', 0),
(550, 'Christine Lorraine T. Tijing', 'F', 6, 53, '0', 0),
(551, 'Marichel M. Carope', 'F', 6, 53, '0', 0),
(552, 'Daryll May B. Nario', 'F', 6, 53, '0', 0),
(553, 'Rene Cervantes', 'M', 6, 53, '0', 0),
(554, 'John Mark Platil', 'M', 6, 53, '0', 0),
(555, 'Flor Millan', 'F', 6, 53, '0', 0),
(556, 'Dr. Verna Saldo', 'F', 6, 53, '0', 0),
(557, 'Kulafu Seballos', 'M', 6, 53, '0', 0),
(558, 'Jeger E. Zamora', 'M', 6, 53, '0', 0),
(559, 'Jeffrey Cadeliña', 'M', 6, 53, '0', 0),
(560, 'Eric Elloremo', 'M', 6, 53, '0', 0),
(561, 'Noel Lalamonan', 'M', 6, 53, '0', 0),
(562, 'Brian Truita', 'M', 6, 53, '0', 0),
(563, 'Bryan Mark Fausto', 'M', 6, 53, '0', 0),
(564, 'Roger Ajugar', 'M', 6, 53, '0', 0),
(565, 'Mr. Emann Ygot', 'M', 6, 53, '0', 0),
(566, 'Mrs. Jerijah B. Cordero', 'F', 6, 53, '0', 0),
(567, 'Mr. Rolando Celes', 'M', 6, 53, '0', 0),
(568, 'Jo Ann P. Roda', 'F', 6, 53, '0', 0),
(569, 'Jonathanael Manansala', 'M', 6, 53, '0', 0),
(570, 'Kresa Nuico', 'F', 6, 53, '0', 0),
(571, 'Samuel B. Masayon', 'M', 6, 53, '0', 0),
(572, 'Ricardo Raging', 'M', 6, 53, '0', 0),
(573, 'Nida Barot', 'F', 6, 53, '0', 0),
(574, 'Elmo Labrador', 'M', 6, 53, '0', 0),
(575, 'Rovan Kit Zamora', 'M', 6, 53, '0', 0),
(576, 'Jeboy Dimalig', 'M', 6, 53, '0', 0),
(577, 'Godwin Enolpe', 'M', 6, 53, '0', 0),
(578, 'Robert Blooms Bagas', 'M', 6, 53, '0', 0),
(579, 'Ernesto Umali', 'M', 6, 53, '0', 0),
(580, 'Curtis Calumpang', 'M', 6, 53, '0', 0),
(581, 'Benedicta Diao', 'F', 6, 53, '0', 0),
(582, 'Roselene Tizon', 'F', 6, 53, '0', 0),
(583, 'Mark JM C. Miñoza', 'm', 6, 53, '0', 0),
(584, 'Carl Dave A. Barbadillo', 'm', 6, 53, '0', 0),
(585, 'Earl Anthony T. Llera', 'm', 6, 53, '0', 0),
(586, 'Milven Cardaño', 'm', 6, 53, '0', 0),
(587, 'Joshua D. Alcontin', 'm', 6, 53, '0', 0),
(588, 'Rowen Jay D. Barcenas', 'm', 6, 53, '0', 0),
(589, 'Jury Mark B. Empinado', 'm', 6, 53, '0', 0),
(590, 'Javc A. Obiso', 'm', 6, 53, '0', 0),
(591, 'Joseph Cardano', 'm', 6, 53, '0', 0),
(592, 'Teodoro Ernesto Amor', 'm', 6, 53, '0', 0),
(593, 'Haydee Bacuño', 'f', 6, 53, '0', 0),
(594, 'Albert Mercolita', 'm', 6, 53, '0', 0),
(595, 'MA. ROSE D. YUNTING', 'F', 5, 39, '0', 0),
(596, 'MIGUEL D. FLORES', 'M', 2, 21, '0', 0),
(597, 'MARK JOSEPH RETES', 'M', 1, 21, '0', 0),
(598, 'JOHN MARK F. PRESTIN', 'm', 2, 54, '0', 0),
(599, 'NITHAN C. TELMO', 'm', 1, 54, '0', 0),
(600, 'K-IAN B. NEPOMUCENO ', 'm', 1, 54, '0', 0),
(601, 'PSALM ANDRIE C. LOBATON', 'm', 1, 54, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quarter`
--

CREATE TABLE `quarter` (
  `quar_id` int(11) NOT NULL,
  `quar_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quarter`
--

INSERT INTO `quarter` (`quar_id`, `quar_desc`) VALUES
(1, 'Elementary Quarter'),
(2, 'Secondary Quarter');

-- --------------------------------------------------------

--
-- Table structure for table `reg_personnel`
--

CREATE TABLE `reg_personnel` (
  `regperson_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `quar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` varchar(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
('1', 'athlete'),
('2', 'coach'),
('3', 'assistant coach'),
('4', 'trainer'),
('5', 'officiating official'),
('6', 'Committee'),
('7', 'chaperone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`) USING BTREE;

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `meal_log`
--
ALTER TABLE `meal_log`
  ADD PRIMARY KEY (`meal_id`);

--
-- Indexes for table `meal_reserve`
--
ALTER TABLE `meal_reserve`
  ADD PRIMARY KEY (`reserv_id`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `quarter`
--
ALTER TABLE `quarter`
  ADD PRIMARY KEY (`quar_id`);

--
-- Indexes for table `reg_personnel`
--
ALTER TABLE `reg_personnel`
  ADD PRIMARY KEY (`regperson_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meal_log`
--
ALTER TABLE `meal_log`
  MODIFY `meal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meal_reserve`
--
ALTER TABLE `meal_reserve`
  MODIFY `reserv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=602;

--
-- AUTO_INCREMENT for table `quarter`
--
ALTER TABLE `quarter`
  MODIFY `quar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reg_personnel`
--
ALTER TABLE `reg_personnel`
  MODIFY `regperson_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
