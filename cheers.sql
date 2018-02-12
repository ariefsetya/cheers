-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2018 at 05:02 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doorprize`
--

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `key`, `content`, `created_at`, `updated_at`) VALUES
(1, 'background', 'http://localhost/cheers/public/background/20180127091509.jpg', '2018-01-27 02:15:09', '2018-01-27 02:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `hadiah_undians`
--

CREATE TABLE `hadiah_undians` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_undian` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `hadiah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hadiah_undians`
--

INSERT INTO `hadiah_undians` (`id`, `id_undian`, `active`, `hadiah`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '1 Unit Sepeda Motor', '2018-01-24 02:07:25', '2018-01-28 07:37:55'),
(3, 1, 0, '1 Unit Kulkas', '2018-01-24 02:07:57', '2018-01-28 07:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_18_133839_create_undians_table', 1),
(4, '2018_01_18_133908_create_peserta_undians_table', 1),
(5, '2018_01_18_133934_create_riwayat_undians_table', 1),
(6, '2018_01_24_030616_create_hadiah_undians_table', 2),
(7, '2018_01_24_031647_create_configurations_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peserta_undians`
--

CREATE TABLE `peserta_undians` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_undian` int(11) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peserta_undians`
--

INSERT INTO `peserta_undians` (`id`, `id_undian`, `code`, `name`, `position`, `department`, `seat_number`, `created_at`, `updated_at`) VALUES
(1473, 1, '10007', 'HENDRO KRISCAHYONO', 'Regional Manager - Region E', '', '', NULL, NULL),
(1474, 1, '90857', 'TIRTA SASMITA', 'Regional Manager - Region C', '', '', NULL, NULL),
(1475, 1, '101185', 'ANTON', 'Regional Manager - Region D', '', '', NULL, NULL),
(1476, 1, '101462', 'FERDIAN', 'Regional Manager - Region A', '', '', NULL, NULL),
(1477, 1, '70605', 'SANTOSO', 'Regional Manager - Region B', '', '', NULL, NULL),
(1478, 1, '101665', 'YANIS LILIE SUMANTRI', 'Branch Manager', '', '', NULL, NULL),
(1479, 1, '144536', 'BERLIN BARLIAN PURNOMO', 'Branch Manager', '', '', NULL, NULL),
(1480, 1, '40258', 'AHMAD GOJALI', 'Area Collection Manager Region C', '', '', NULL, NULL),
(1481, 1, '144317', 'DHONY WIBOWO', 'Middle Credit & Marketing Officer', '', '', NULL, NULL),
(1482, 1, '155480', 'SONY IRAWAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1483, 1, '91013', 'SUPENDY', 'Branch Manager', '', '', NULL, NULL),
(1484, 1, '166000', 'MUHAMAD RIZKY KURNIAWAN', 'Administration Head', '', '', NULL, NULL),
(1485, 1, '101558', 'ARIE MULYADI', 'Marketing - Supervisor', '', '', NULL, NULL),
(1486, 1, '122338', 'IMRAN AZWAR', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1487, 1, '176498', 'VERIE NUGRAHA SAPUTRA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1488, 1, '133222', 'ASEP SUHERMAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1489, 1, '155063', 'SASMITO KIRONO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1490, 1, '166358', 'MIKE TYSON SIMANJUNTAK', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1491, 1, '155406', 'FAHRUROJI', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1492, 1, '176570', 'RISKI YANARO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1493, 1, '165973', 'TRIJOKO PRASETYO UTAMI', 'Middle Credit & Marketing Officer', '', '', NULL, NULL),
(1494, 1, '166036', 'MANGIHUT TUA ISMAEL', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1495, 1, '166130', 'YOSHUA ADOLF NAULI SINAGA', 'Senior Credit & Marketing Officer', '', '', NULL, NULL),
(1496, 1, '176925', 'BAYU PRIHARANTO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1497, 1, '176952', 'ANDRI MULYADI', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1498, 1, '176980', 'CHAIRUL MUTTAQIN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1499, 1, '186996', 'GALIH EDWIN HIDAYAT', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1500, 1, '101246', 'ALEX DIONYSIUS JONATAN', 'Branch Manager', '', '', NULL, NULL),
(1501, 1, '144603', 'VICKY VICTORIA TIMORASON', 'Administration Head', '', '', NULL, NULL),
(1502, 1, '112244', 'VICTOR CAHYA KUSUMA', 'Marketing - Supervisor', '', '', NULL, NULL),
(1503, 1, '176644', 'R B LAURENTIUS H WIBOWO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1504, 1, '176661', 'MOCHAMAD PUTRA ARIA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1505, 1, '176670', 'PRAFITRA APRIALDY', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1506, 1, '176674', 'ZEFRI HARYANTO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1507, 1, '176682', 'OKTOGUNAWAN LAOLI', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1508, 1, '176706', 'IRFAN DWI SATRIO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1509, 1, '176769', 'ABDILAH AZIS ASKAR', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1510, 1, '101528', 'OKTAVIANUS', 'Branch Manager Pjs.', '', '', NULL, NULL),
(1511, 1, '123134', 'FALDY BAHANA RINALDY', 'Field Collector', '', '', NULL, NULL),
(1512, 1, '165882', 'YAZIDEN BUSTOMI', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1513, 1, '101309', 'HENDRA', 'Branch Manager', '', '', NULL, NULL),
(1514, 1, '166022', 'EKO SATRIANI PUTRA', 'Field Collector', '', '', NULL, NULL),
(1515, 1, '165909', 'FERRY SETIAWAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1516, 1, '112307', 'HARRY ANDRA', 'Branch Manager', '', '', NULL, NULL),
(1517, 1, '101262', 'RATU INTAN WULAN SARI', 'Administration Head', '', '', NULL, NULL),
(1518, 1, '155420', 'RICKY EFFENDI S.', 'Marketing - Supervisor', '', '', NULL, NULL),
(1519, 1, '154881', 'INDRA UTAMA NASUTION', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1520, 1, '176585', 'ANDRE SATRIA ORCANS', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1521, 1, '166272', 'RIZKI KARYA NUGRAHA K', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1522, 1, '155434', 'ANGGA ABDUR ROHMAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1523, 1, '165729', 'ARI LESMANA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1524, 1, '165918', 'FANNY PRAMUJIE MULYANA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1525, 1, '176590', 'RAFHAEL NABOYA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1526, 1, '80729', 'DEDI SUPRIADI', 'Field Collector', '', '', NULL, NULL),
(1527, 1, '176717', 'EKI SUBASTIAN', 'Field Collector', '', '', NULL, NULL),
(1528, 1, '176710', 'SAEPUL ALAM', 'Field Collector', '', '', NULL, NULL),
(1529, 1, '70655', 'PRIYO SUBONDO', 'Branch Manager', '', '', NULL, NULL),
(1530, 1, '101297', 'EKA SETIYANINGSIH', 'Administration Head', '', '', NULL, NULL),
(1531, 1, '122514', 'GOKMA TUA SIMBOLON', 'Marketing - Supervisor', '', '', NULL, NULL),
(1532, 1, '144860', 'NUR MU\'MIN A. MUKTI', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1533, 1, '155193', 'ARSA WIJAYA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1534, 1, '144558', 'RAYMOND GANDY', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1535, 1, '165757', 'BANGKIT SETIAWAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1536, 1, '155448', 'ARFAN PRILIANSYAH', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1537, 1, '155449', 'SULIYANTO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1538, 1, '176725', 'MUHAMAD ALI HUSAIN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1539, 1, '176770', 'KEVIN SEAN GILBERT', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1540, 1, '101500', 'TOPAN INDRAJAYA', 'Branch Manager', '', '', NULL, NULL),
(1541, 1, '122604', 'GILANG SAKABUANA PUTRA', 'Marketing - Supervisor', '', '', NULL, NULL),
(1542, 1, '154996', 'SAEFUDIN', 'Middle Credit & Marketing Officer', '', '', NULL, NULL),
(1543, 1, '112049', 'I MADE SUARSA', 'Branch Manager', '', '', NULL, NULL),
(1544, 1, '122471', 'IVAN AWIGRA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1545, 1, '144526', 'TONI BUN', 'Branch Manager', '', '', NULL, NULL),
(1546, 1, '122879', 'AMIN SUTRISNO', 'Administration Head', '', '', NULL, NULL),
(1547, 1, '144800', 'BUGI DERMAWAN', 'Marketing - Supervisor', '', '', NULL, NULL),
(1548, 1, '176805', 'IRFANSAH', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1549, 1, '144114', 'RIZKY FEBIOLA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1550, 1, '166329', 'AHMAD RAMADANY', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1551, 1, '155073', 'TAUFIK MUHAMAD', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1552, 1, '155151', 'ALI IMRON', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1553, 1, '166037', 'JIMMY WAHYU BATUBARA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1554, 1, '176761', 'JUFRI FALMER', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1555, 1, '176909', 'KAFIN ASFARI', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1556, 1, '90997', 'ARMAN WIJAYA', 'Branch Manager', '', '', NULL, NULL),
(1557, 1, '112207', 'MARISKA SRIKANDI', 'Administration Head', '', '', NULL, NULL),
(1558, 1, '144789', 'CHAERUL UMAM', 'Marketing - Supervisor', '', '', NULL, NULL),
(1559, 1, '91092', 'VICTOR TANDRA', 'Marketing - Supervisor', '', '', NULL, NULL),
(1560, 1, '133282', 'DJAMIL ASRHI', 'Marketing - Supervisor', '', '', NULL, NULL),
(1561, 1, '133157', 'A. RAPIUDIN R.', 'Middle Credit & Marketing Officer', '', '', NULL, NULL),
(1562, 1, '133361', 'AINUL KHOLIS', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1563, 1, '176876', 'SUARDILANI RIDWAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1564, 1, '155268', 'RIDWAN PURBA TAMBAK', 'Middle Credit & Marketing Officer', '', '', NULL, NULL),
(1565, 1, '165959', 'RAHMAN TAUFIK', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1566, 1, '165681', 'BANI SHIDEK', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1567, 1, '165892', 'DODY SURYADI', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1568, 1, '165939', 'WAHYUDI', 'Middle Credit & Marketing Officer', '', '', NULL, NULL),
(1569, 1, '165961', 'CHUANDATA DERMAWAN', 'Middle Credit & Marketing Officer', '', '', NULL, NULL),
(1570, 1, '166040', 'SUMANDO EKO HUTAURUK', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1571, 1, '166140', 'AHMAD FANSURI', 'Middle Credit & Marketing Officer', '', '', NULL, NULL),
(1572, 1, '176507', 'ANDY', 'Senior Credit & Marketing Officer', '', '', NULL, NULL),
(1573, 1, '176912', 'YUSUF MAULANA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1574, 1, '176938', 'DONI HERMAWAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1575, 1, '176963', 'KHOIRI', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1576, 1, '176967', 'KEVIN RIAN RAVELLY', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1577, 1, '70583', 'MAHMUDIN', 'Fiducia Administration - Staff', '', '', NULL, NULL),
(1578, 1, '80710', 'LIONARTO', 'Branch Manager', '', '', NULL, NULL),
(1579, 1, '101611', 'AMAN HENDRI', 'Administration Head', '', '', NULL, NULL),
(1580, 1, '144792', 'SIN MUK', 'Marketing - Supervisor', '', '', NULL, NULL),
(1581, 1, '133713', 'DENNY SETIAWAN', 'Marketing - Supervisor Pjs.', '', '', NULL, NULL),
(1582, 1, '90830', 'MARIO TAKAIN', 'Marketing - Supervisor', '', '', NULL, NULL),
(1583, 1, '165810', 'AJI PUTRA PERDANA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1584, 1, '166156', 'WONG IWAN HENDRAWAN', 'Middle Credit & Marketing Officer', '', '', NULL, NULL),
(1585, 1, '144251', 'AGI KHAUSAR', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1586, 1, '144300', 'ANDRI DERMAWAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1587, 1, '176702', 'BAYU ANDRI KURNIAWAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1588, 1, '166169', 'SAHRUL RISDIANSYAH', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1589, 1, '166283', 'IRVAN HARYADI', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1590, 1, '176408', 'EDUARDO IAN ABADIA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1591, 1, '176894', 'ADISAH PUTRA SITOHANG', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1592, 1, '166119', 'LUDFY HAJIHY RHOBY', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1593, 1, '176860', 'ROY', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1594, 1, '176882', 'ANDI', 'Middle Credit & Marketing Officer', '', '', NULL, NULL),
(1595, 1, '176905', 'STEVIE RIANDHI', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1596, 1, '176964', 'RYAN SEPTIAN HERMAWAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1597, 1, '176969', 'HIZKIA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1598, 1, '176977', 'WISNU SAPUTRA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1599, 1, '70544', 'HENDRI', 'Branch Manager', '', '', NULL, NULL),
(1600, 1, '101184', 'EKA SEPTIANI GAYATRI', 'Administration Head', '', '', NULL, NULL),
(1601, 1, '111708', 'SURYO PRANOTO SIDIK PRAMONO', 'Marketing - Supervisor', '', '', NULL, NULL),
(1602, 1, '155667', 'ANDI AKBAR', 'Marketing - Supervisor', '', '', NULL, NULL),
(1603, 1, '166315', 'FITRA RIDWAN HARIRI', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1604, 1, '176899', 'DEDDY RACHMAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1605, 1, '166247', 'FADLY', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1606, 1, '176543', 'EKO SYAHPUTRA SIHOTANG', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1607, 1, '176552', 'KHAIRUDDIN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1608, 1, '176833', 'IMRAN DONNY ARUAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1609, 1, '176862', 'MUHAMMAD ILHAM RIZKY', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1610, 1, '176920', 'CHRISTIAN EMERSON SULISTIYO P', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1611, 1, '176937', 'DIMAS PUTRA RUSMANTO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1612, 1, '176945', 'SABUNGAN SILALAHI', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1613, 1, '176954', 'ABDUL AZIZ', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1614, 1, '176989', 'ANANG HARIYADI', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1615, 1, '112308', 'STEVEN', 'Branch Manager', '', '', NULL, NULL),
(1616, 1, '111744', 'FIRDA DWIYANI', 'Administration Head', '', '', NULL, NULL),
(1617, 1, '123028', 'MUHAMMAD TAUFIK', 'Marketing - Supervisor', '', '', NULL, NULL),
(1618, 1, '166227', 'FERNANDES', 'Marketing - Supervisor Pjs', '', '', NULL, NULL),
(1619, 1, '144780', 'MICHAEL', 'Marketing - Supervisor', '', '', NULL, NULL),
(1620, 1, '90828', 'HENRY', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1621, 1, '165997', 'FAUZI SAID THOHA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1622, 1, '176804', 'IWI YUNANTO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1623, 1, '144235', 'HARLAND TRI SETYA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1624, 1, '176931', 'ANDOKO HADI NURSITO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1625, 1, '176407', 'SULAIMAN SURYA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1626, 1, '176434', 'TITIS PUTRA HARDIYANTO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1627, 1, '144737', 'PRASTIO RIZKI SAPUTRA', 'Middle Credit & Marketing Officer', '', '', NULL, NULL),
(1628, 1, '155440', 'HARRY PUTRAWAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1629, 1, '155669', 'YHUSUP ADIK SUPRIYANTO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1630, 1, '165742', 'MUSLIM ARIPIN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1631, 1, '165945', 'ANDRIANUS TITO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1632, 1, '166060', 'FERNANDO HUTASOIT', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1633, 1, '166264', 'BAFADDAL SYAHADAT', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1634, 1, '166288', 'DESNA EKA SAPUTRA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1635, 1, '176479', 'ROBIN HOTDO MANALU', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1636, 1, '176540', 'JOKO SUPRIYANTO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1637, 1, '176828', 'ANDRY GUNAWAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1638, 1, '176926', 'MUHAMMARD YOGIE', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1639, 1, '70635', 'ZULKIFAR RAHMAN', 'Messenger', '', '', NULL, NULL),
(1640, 1, '90861', 'INDRA HERDIANSYAH', 'Branch Manager', '', '', NULL, NULL),
(1641, 1, '165884', 'OMAT ROHMAT', 'Field Collector', '', '', NULL, NULL),
(1642, 1, '112211', 'WAHYU SATYA KUSUMA', 'Marketing - Supervisor', '', '', NULL, NULL),
(1643, 1, '155436', 'DENI NURHIDAYAT', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1644, 1, '144691', 'SIAU LUNG', 'Branch Manager', '', '', NULL, NULL),
(1645, 1, '166304', 'NOVIAN SABKI', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1646, 1, '155289', 'ANDRIAN CHANDRA PRASETYA', 'Branch Manager', '', '', NULL, NULL),
(1647, 1, '122587', 'HERMAN MUSTAQIM', 'Middle Credit & Marketing Officer', '', '', NULL, NULL),
(1648, 1, '101231', 'HAPPY TUA MALAU', 'Branch Manager', '', '', NULL, NULL),
(1649, 1, '155204', 'SUBHAN ASSI', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1650, 1, '90956', 'ANDRY TAN', 'Branch Manager', '', '', NULL, NULL),
(1651, 1, '176400', 'STEVEN ANDRIKO', 'Middle Credit & Marketing Officer', '', '', NULL, NULL),
(1652, 1, '165793', 'FERDINAN SITOMPUL', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1653, 1, '176516', 'SUDIANTO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1654, 1, '111807', 'SUWANDY', 'Marketing - Supervisor', '', '', NULL, NULL),
(1655, 1, '111808', 'TOTO RUTAN GUNAWAN', 'Marketing - Supervisor', '', '', NULL, NULL),
(1656, 1, '165894', 'AULIA QODRI LUBIS', 'Branch Manager', '', '', NULL, NULL),
(1657, 1, '176588', 'ADI SAPUTRA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1658, 1, '90933', 'R.M FARIS DENCIK', 'Branch Manager', '', '', NULL, NULL),
(1659, 1, '70569', 'MUTIARA WULANSARI', 'Credit Analyst - Staff', '', '', NULL, NULL),
(1660, 1, '166059', 'ANDY CHRISTANTO ARIFIN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1661, 1, '166032', 'SATRIADY OH', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1662, 1, '165768', 'MOHAMMAD RESTU FAJRIN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1663, 1, '144516', 'SYUGIANTO', 'Branch Manager', '', '', NULL, NULL),
(1664, 1, '122502', 'FITRAN MANOTAS SILABAN', 'Area Collection Manager Region D', '', '', NULL, NULL),
(1665, 1, '165804', 'SATRIA WASKITA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1666, 1, '166028', 'RAHMAT SAPUTRA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1667, 1, '155679', 'DAFRI FARDIAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1668, 1, '176763', 'RAHMAT ZULFANI', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1669, 1, '70592', 'HERIBERTUS SRI WIDADA', 'Marketing - Supervisor Pjs.', '', '', NULL, NULL),
(1670, 1, '90974', 'GUNTUR NOVIZAL', 'Branch Manager', '', '', NULL, NULL),
(1671, 1, '70595', 'RIKA SULISTYOWATI', 'Credit Administration - Staff', '', '', NULL, NULL),
(1672, 1, '165862', 'AHMAD BAHA UDDIN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1673, 1, '176614', 'FRANCO PRANOTO', 'Marketing - Supervisor', '', '', NULL, NULL),
(1674, 1, '176415', 'THARIQ TSAQIB', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1675, 1, '122983', 'IMAN PUTRA', 'Marketing - Supervisor', '', '', NULL, NULL),
(1676, 1, '176947', 'RAMADHONI PRADIPTO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1677, 1, '122572', 'OKTARIANSYAH', 'Marketing - Supervisor', '', '', NULL, NULL),
(1678, 1, '133454', 'KIM SIAU', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1679, 1, '101195', 'MOHAMAD RIDWAN', 'Marketing - Supervisor', '', '', NULL, NULL),
(1680, 1, '166380', 'MUHAMAD SYAHRIAL', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1681, 1, '166296', 'SANDY RICHARD NOVERY SIAHAAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1682, 1, '176934', 'CECEP AGUSTIYAH', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1683, 1, '90899', 'MA\'MUN SOLEH SOBIRIN', 'Marketing - Supervisor', '', '', NULL, NULL),
(1684, 1, '166294', 'MUHTADI KURNIAWAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1685, 1, '166101', 'RIZKY FACHRU ROZY', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1686, 1, '166118', 'RISKI PRATAMA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1687, 1, '176733', 'ADE  FATHUL BASIT', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1688, 1, '101485', 'SAHAT MALINDO SITUMORANG', 'Marketing - Supervisor', '', '', NULL, NULL),
(1689, 1, '165753', 'RIO FERNANDA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1690, 1, '144054', 'OVAL FADHILAH', 'Marketing - Supervisor', '', '', NULL, NULL),
(1691, 1, '155379', 'ABD.THALIB DULLAH', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1692, 1, '154878', 'MUHAMMAD ARIF', 'Marketing - Supervisor', '', '', NULL, NULL),
(1693, 1, '166175', 'BUDI KURNIAWAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1694, 1, '166155', 'ARDI KURNIA PUTRA TAMZIL', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1695, 1, '101390', 'YULI HARDYANTO', 'Marketing - Supervisor Pjs.', '', '', NULL, NULL),
(1696, 1, '176762', 'WIWIT ANGGA BASKORO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1697, 1, '155324', 'YOGI SOLEH MULYANA', 'Marketing - Supervisor', '', '', NULL, NULL),
(1698, 1, '165938', 'EDY CHANDRA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1699, 1, '111731', 'MUNIR ICHWAN', 'Marketing - Supervisor', '', '', NULL, NULL),
(1700, 1, '176638', 'ELIEZER', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1701, 1, '155283', 'AHMAD EET SYAHRANI', 'Marketing - Supervisor', '', '', NULL, NULL),
(1702, 1, '176773', 'SUFIAN AKBAR', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1703, 1, '166146', 'TH ANGGA YUDHA IRIAWAN', 'Marketing - Supervisor', '', '', NULL, NULL),
(1704, 1, '176617', 'ABET NIGO JANUBUDI RISTANTO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1705, 1, '30199', 'ANDREAS KURNIAWAN S.', 'Branch Manager', '', '', NULL, NULL),
(1706, 1, '60414', 'SUSANTO WIJOYO', 'Branch Manager', '', '', NULL, NULL),
(1707, 1, '20076', 'SUGENG HARYANTO', 'Area Collection Manager Region E1 & E2', '', '', NULL, NULL),
(1708, 1, '70523', 'SLAMET RUDIANTO', 'Credit Administration (BKPB Custodian) - Staff', '', '', NULL, NULL),
(1709, 1, '70542', 'SUPRIYATNO', 'Middle Credit & Marketing Officer', '', '', NULL, NULL),
(1710, 1, '155576', 'ELHAM TUMARSA', 'Field Collector', '', '', NULL, NULL),
(1711, 1, '166153', 'FEBRI SHANDY KASATRIAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1712, 1, '165957', 'ERDIAN RAHMAT HIDAYAT', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1713, 1, '90859', 'SAN BONO PRATIKTO', 'Branch Manager', '', '', NULL, NULL),
(1714, 1, '101226', 'FENDY LIMANTO', 'Branch Manager', '', '', NULL, NULL),
(1715, 1, '101403', 'LARAS DWIALVIRINA', 'Administration Head', '', '', NULL, NULL),
(1716, 1, '112213', 'SITI MAITRI KARUNA MUDITA', 'Administration Head', '', '', NULL, NULL),
(1717, 1, '154986', 'DEDY', 'Marketing - Supervisor', '', '', NULL, NULL),
(1718, 1, '122613', 'ARDIANSYAH', 'Marketing - Supervisor', '', '', NULL, NULL),
(1719, 1, '155162', 'HASAN BASRI', 'Marketing - Supervisor', '', '', NULL, NULL),
(1720, 1, '144847', 'IBNI FARIZ', 'Marketing - Supervisor', '', '', NULL, NULL),
(1721, 1, '133850', 'MOKHAMAD SOFYAN LAKSONO', 'Middle Credit & Marketing Officer', '', '', NULL, NULL),
(1722, 1, '176850', 'MUHAMMAD ZAIN ARIWIBOWO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1723, 1, '144817', 'ADI KRISTANTO', 'Middle Credit & Marketing Officer', '', '', NULL, NULL),
(1724, 1, '166077', 'AKHMED SANGAJI', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1725, 1, '154997', 'DERI HERMAWAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1726, 1, '154942', 'PURWANTO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1727, 1, '166071', 'REDIYANSYAH', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1728, 1, '155090', 'GUNTUR SANJOYO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1729, 1, '166123', 'MUHAMAD RIDWAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1730, 1, '165703', 'CLAUDIUS CECAR', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1731, 1, '166063', 'FAISAL HADI NUGRAHA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1732, 1, '166076', 'RULLY SAKTIAN PUTRA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1733, 1, '166258', 'FAJAR KURNIAWAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1734, 1, '166337', 'HARI ZULHIYANSAH', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1735, 1, '176505', 'INGRID AUDINA', 'Senior Credit & Marketing Officer', '', '', NULL, NULL),
(1736, 1, '176550', 'BAYU DWI PRASETYO', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1737, 1, '176646', 'FEBRI SAPUTRA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1738, 1, '176814', 'ABDUL RAHMAN SINAGA', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1739, 1, '176863', 'IMAMUL MUFARRIDUN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1740, 1, '176900', 'FAJRIANSYAH', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1741, 1, '176914', 'GRENDY AGUSTINUS', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1742, 1, '176951', 'ARIS HIDAYATULLAH', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1743, 1, '70588', 'ANATAURISIA EKA J', 'Credit Analyst - Staff', '', '', NULL, NULL),
(1744, 1, '60377', 'BAGUS SUGIARTO', 'Branch Manager', '', '', NULL, NULL),
(1745, 1, '166145', 'ANDI KURNIAWAN', 'Junior Credit & Marketing Officer', '', '', NULL, NULL),
(1746, 1, '144439', 'ROLLAND WAROUW', 'Area Collection Manager Region AB', '', '', NULL, NULL),
(1747, 1, '122664', 'ARFAND BACHTIAR', 'National Remedial Head', '', '', NULL, NULL),
(1748, 1, '144258', 'TEGUH P. PANJAITAN', 'Remedial Coordinator - Region ABCD', '', '', NULL, NULL),
(1749, 1, '155390', 'CARLOS DOMINGGO', 'Remedial Coordinator - Region E', '', '', NULL, NULL),
(1750, 1, '10033', 'MUHAMMAD ENJEN', 'Collection - Supervisor', '', '', NULL, NULL),
(1751, 1, '101270', 'SUPRIYATNA', 'Collection - Supervisor', '', '', NULL, NULL),
(1752, 1, '155555', 'JANUAR HASIHOLAN', 'Collection - Supervisor', '', '', NULL, NULL),
(1753, 1, '144257', 'HIDAYAT', 'Collection - Supervisor', '', '', NULL, NULL),
(1754, 1, '165739', 'JACKSON YOSEPH', 'Collection - Supervisor', '', '', NULL, NULL),
(1755, 1, '144602', 'R HASTOMI SURYADI S.', 'Collection - Supervisor', '', '', NULL, NULL),
(1756, 1, '176597', 'FAISAL YUSUF', 'Remedial Officer Region AB', '', '', NULL, NULL),
(1757, 1, '166266', 'INDRA RAGA PATI', 'Remedial Officer Region AB', '', '', NULL, NULL),
(1758, 1, '176489', 'JEMMY DAVID LEWERISSA', 'Remedial Officer Region AB', '', '', NULL, NULL),
(1759, 1, '176713', 'MAXIE CARLOS MELATUNAN', 'Remedial Officer Region AB', '', '', NULL, NULL),
(1760, 1, '10012', 'SURANTO', 'Field Collector', '', '', NULL, NULL),
(1761, 1, '20081', 'FATONI', 'Field Collector', '', '', NULL, NULL),
(1762, 1, '30143', 'NURSIWAN', 'Field Collector', '', '', NULL, NULL),
(1763, 1, '90838', 'AGUS SUSANTO', 'Field Collector', '', '', NULL, NULL),
(1764, 1, '90867', 'RAHMAD JULIANSYAH', 'Field Collector', '', '', NULL, NULL),
(1765, 1, '101223', 'DENY FRIANDI', 'Field Collector', '', '', NULL, NULL),
(1766, 1, '101355', 'YUDHA SOFWAN SIGIT ADILUHUR', 'Field Collector', '', '', NULL, NULL),
(1767, 1, '176587', 'MUH ARIF PRATAMA', 'Field Collector', '', '', NULL, NULL),
(1768, 1, '144768', 'ELGEDDY TIMOTEUS', 'Field Collector', '', '', NULL, NULL),
(1769, 1, '154947', 'JULIADI PRANANTA', 'Field Collector', '', '', NULL, NULL),
(1770, 1, '112163', 'RULI FIRMAN', 'Field Collector', '', '', NULL, NULL),
(1771, 1, '166091', 'BOY MAULANA SAAD', 'Field Collector', '', '', NULL, NULL),
(1772, 1, '166172', 'JANI FRENGKI', 'Field Collector', '', '', NULL, NULL),
(1773, 1, '144777', 'ABDUL AZIS', 'Field Collector', '', '', NULL, NULL),
(1774, 1, '176493', 'MUHAMAD IQBAL FADILLA', 'Field Collector', '', '', NULL, NULL),
(1775, 1, '144686', 'ACHMAD IRFAN MAULANA', 'Field Collector', '', '', NULL, NULL),
(1776, 1, '166161', 'MARWOKO', 'Field Collector', '', '', NULL, NULL),
(1777, 1, '166248', 'SLAMET RIYADI', 'Field Collector', '', '', NULL, NULL),
(1778, 1, '144795', 'RISDA ILHAMI', 'Field Collector', '', '', NULL, NULL),
(1779, 1, '176484', 'ERWIN SUDIRJA', 'Field Collector', '', '', NULL, NULL),
(1780, 1, '176494', 'MOCHAMAD SYAMSURIZAL', 'Field Collector', '', '', NULL, NULL),
(1781, 1, '176821', 'MUHAMAD NUR', 'Field Collector', '', '', NULL, NULL),
(1782, 1, '144296', 'ADI WIJAYA', 'Field Collector', '', '', NULL, NULL),
(1783, 1, '165870', 'BUDHI DELFIANTO', 'Field Collector', '', '', NULL, NULL),
(1784, 1, '176981', 'SUBARDIAN', 'Field Collector', '', '', NULL, NULL),
(1785, 1, '176669', 'FERA GUNAWAN', 'Field Collector', '', '', NULL, NULL),
(1786, 1, '176433', 'MUSA BINSAR SILAEN', 'Field Collector', '', '', NULL, NULL),
(1787, 1, '166085', 'ABDUL ROZAK', 'Field Collector', '', '', NULL, NULL),
(1788, 1, '176532', 'SURAHMAT', 'Field Collector', '', '', NULL, NULL),
(1789, 1, '166327', 'MOCH ABDULLAH', 'Field Collector', '', '', NULL, NULL),
(1790, 1, '165858', 'LERA ROMBE PAYUNG', 'Field Collector', '', '', NULL, NULL),
(1791, 1, '165859', 'AIMON MALAU', 'Field Collector', '', '', NULL, NULL),
(1792, 1, '165860', 'DENNY L FRANKLIN', 'Field Collector', '', '', NULL, NULL),
(1793, 1, '165951', 'ADRIAN RONALDI TUAN KOTTA', 'Field Collector', '', '', NULL, NULL),
(1794, 1, '166030', 'HADI ISMAWAN', 'Field Collector', '', '', NULL, NULL),
(1795, 1, '166064', 'BUDHI ARIFIN', 'Field Collector', '', '', NULL, NULL),
(1796, 1, '166069', 'ROTUA SITORUS', 'Field Collector', '', '', NULL, NULL),
(1797, 1, '166197', 'RAMOS MANIK', 'Field Collector', '', '', NULL, NULL),
(1798, 1, '166368', 'INDON WIRA WINARDI SIMANULANG', 'Field Collector', '', '', NULL, NULL),
(1799, 1, '176453', 'JOHAN AKHMAD FAISAL', 'Field Collector', '', '', NULL, NULL),
(1800, 1, '176853', 'REZA BRIAN XEROX SALAMPESSY', 'Field Collector', '', '', NULL, NULL),
(1801, 1, '176857', 'AJI AKHMAD FARABI', 'Field Collector', '', '', NULL, NULL),
(1802, 1, '70499', 'DENNY HERDIAN', 'Field Collector', '', '', NULL, NULL),
(1803, 1, '70629', 'PERMADI SEKTIOKO NUGROHO', 'Field Collector', '', '', NULL, NULL),
(1804, 1, '50340', 'ALEXANDER', 'President & CEO', '', '', NULL, NULL),
(1805, 1, '20087', 'ARIEF SOERENDRO', 'Managing Director', '', '', NULL, NULL),
(1806, 1, '60449', 'MIKI EFFENDI', 'Managing Director', '', '', NULL, NULL),
(1807, 1, '10022', 'MAMAN SUPRIYATNA', 'Chief Audit Officer', '', '', NULL, NULL),
(1808, 1, '20100', 'SUFIANA', 'Finance & Accounting - Division Head', '', '', NULL, NULL),
(1809, 1, '60380', 'ARYANTO', 'Marketing - Division Head', '', '', NULL, NULL),
(1810, 1, '80783', 'FELIX ALEXANDER IRIANTO SUNDAH', 'Information & Communication Technology and Operations - Division Head', '', '', NULL, NULL),
(1811, 1, '90895', 'ARTHUR OKTAVIANUS SENDUK', 'Risk Management - Division Head', '', '', NULL, NULL),
(1812, 1, '112050', 'IKA SETIAWATI GUNAWAN', 'Human Resources & General Affairs - Division Head', '', '', NULL, NULL),
(1813, 1, '144208', 'BONNY PERMEDI MANOEROE', 'Collection & Remedial - Division Head', '', '', NULL, NULL),
(1814, 1, '165800', 'NATALIA', 'Fleet and Heavy Equipment & Machinery - Division Head', '', '', NULL, NULL),
(1815, 1, '70510', 'RICKY HERTANU', 'Business Development - Division Head', '', '', NULL, NULL),
(1816, 1, '111743', 'PERDANA PUTERA', 'Finance - Department Head', '', '', NULL, NULL),
(1817, 1, '111779', 'RHEZA SEFRIYANDHANI', 'General Affairs Operational - Department Head', '', '', NULL, NULL),
(1818, 1, '133627', 'JEFFY EUGENE ANGGRIANTO', 'Accounting - Department Head', '', '', NULL, NULL),
(1819, 1, '166006', 'SITI NURJANAH', 'Operations - Department Head ', '', '', NULL, NULL),
(1820, 1, '166099', 'HENRY SUDARMA', 'Information & Communication Technology - Department Head', '', '', NULL, NULL),
(1821, 1, '166206', 'SELIANA', 'Fleet and Heavy Equipment & Machinery - Department Head', '', '', NULL, NULL),
(1822, 1, '176777', 'INTAN DEWI ANANDA YUDHA', 'Human Resources - Department Head', '', '', NULL, NULL),
(1823, 1, '186992', 'HENDRA SATIA DITAMA', 'Legal - Department Head', '', '', NULL, NULL),
(1824, 1, '70590', 'ZAHRIL', 'Internal Control - Department Head', '', '', NULL, NULL),
(1825, 1, '165718', 'MOHAMMAD REZA SURYADINATA', 'Fleet and Heavy Equipment & Machinery - Team Leader A Pjs.', '', '', NULL, NULL),
(1826, 1, '176431', 'CORWYN TASEK', 'Fleet and Heavy Equipment & Machinery - Team Leader B Pjs.', '', '', NULL, NULL),
(1827, 1, '166132', 'SONIA GABRIELLA', 'Fleet and Heavy Equipment & Machinery - Senior Account Officer Team A', '', '', NULL, NULL),
(1828, 1, '166212', 'LENAWATI TRI WINDANI PURWANINGSIH', 'Fleet and Heavy Equipment & Machinery - Senior Account Officer Team B', '', '', NULL, NULL),
(1829, 1, '176509', 'YEMIMA HASIDITYANA', 'Fleet and Heavy Equipment & Machinery - Senior Account Officer Team B', '', '', NULL, NULL),
(1830, 1, '70508', 'PRIBADI', 'BPKB Verificator - Staff', '', '', NULL, NULL),
(1831, 1, '70626', 'ANDRY SANTOSO', 'Document Custodian - Staff', '', '', NULL, NULL),
(1832, 1, '155114', 'PRIYADI NUR QODRI', 'MIS - Supervisor', '', '', NULL, NULL),
(1833, 1, '165966', 'FANDRA HENDARTO', 'Marketing Comunication - Supervisor', '', '', NULL, NULL),
(1834, 1, '166147', 'AHMAD F', 'Business Development - Supervisor', '', '', NULL, NULL),
(1835, 1, '176506', 'CASSANDRA', 'Business Relationship - Supervisor Pjs.', '', '', NULL, NULL),
(1836, 1, '176596', 'ANTHONIUS ADNAN', 'Business Development - Staff', '', '', NULL, NULL),
(1837, 1, '176680', 'MUHAMMAD IQBAL GUSTIANDY', 'MIS - Staff', '', '', NULL, NULL),
(1838, 1, '176835', 'AKRIM DESMAN', 'Business Development - Staff', '', '', NULL, NULL),
(1839, 1, '176932', 'DEDE ANUGRAH PERMANA', 'Business Relationship - Staff', '', '', NULL, NULL),
(1840, 1, '187005', 'ENDAH DESY', 'Business Relationship - Staff', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_undians`
--

CREATE TABLE `riwayat_undians` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_undian` int(11) NOT NULL,
  `id_hadiah` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `undians`
--

CREATE TABLE `undians` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stops` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_running` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `running_status` int(11) NOT NULL,
  `configuration` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `undians`
--

INSERT INTO `undians` (`id`, `name`, `stops`, `max_running`, `duration`, `status`, `running_status`, `configuration`, `created_at`, `updated_at`) VALUES
(1, 'Doorprize Utama', 'manual', 0, 10, 2, 1, '', NULL, '2018-01-28 07:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Arief Setya', 'ariefsetya@live.com', '$2y$10$mnJ0uC7qMncdABG.4uABw.HnYVcclLRNELGWiH0Y5rLAXNBrAbqA.', 'IIypukMTN9QxPaL44J7SJJASFMTjkKCld4MFDOZ8rNzBBfCPLEadzs7piO62', '2018-01-19 09:59:44', '2018-01-19 09:59:44'),
(2, 'Admin', 'admin@cheers.com', '$2y$10$llgKyspbJ.V/ojEnTksSDeE48mKSn/.WU0wBIJxp59GuCdLIbuksu', NULL, '2018-01-21 08:00:40', '2018-01-21 08:00:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hadiah_undians`
--
ALTER TABLE `hadiah_undians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `peserta_undians`
--
ALTER TABLE `peserta_undians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_undians`
--
ALTER TABLE `riwayat_undians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `undians`
--
ALTER TABLE `undians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hadiah_undians`
--
ALTER TABLE `hadiah_undians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `peserta_undians`
--
ALTER TABLE `peserta_undians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1841;
--
-- AUTO_INCREMENT for table `riwayat_undians`
--
ALTER TABLE `riwayat_undians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
--
-- AUTO_INCREMENT for table `undians`
--
ALTER TABLE `undians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
