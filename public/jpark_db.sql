-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 08:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jpark_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookid` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `vehicleid` int(11) NOT NULL,
  `spacerent` int(11) NOT NULL,
  `baris` int(11) NOT NULL,
  `kolom` int(11) NOT NULL,
  `datebook` timestamp NOT NULL DEFAULT current_timestamp(),
  `startrent` timestamp NULL DEFAULT NULL,
  `endrent` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookid`, `userid`, `vehicleid`, `spacerent`, `baris`, `kolom`, `datebook`, `startrent`, `endrent`) VALUES
('1-1-5202301060750', 1, 1, 5, 1, 4, '2023-01-05 07:45:32', '2023-01-06 00:50:00', '2023-01-06 01:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `booking_payment`
--

CREATE TABLE `booking_payment` (
  `bookid` varchar(25) NOT NULL,
  `total` int(11) NOT NULL,
  `metode` int(11) NOT NULL,
  `account` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_payment`
--

INSERT INTO `booking_payment` (`bookid`, `total`, `metode`, `account`, `status`) VALUES
('1-1-5202301060750', 5000, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `spaceid` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `prov` varchar(25) NOT NULL,
  `kab` varchar(25) NOT NULL,
  `kec` varchar(25) NOT NULL,
  `fulladdress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`spaceid`, `nama`, `prov`, `kab`, `kec`, `fulladdress`) VALUES
(1, 'Gedung Tedja Buana', 'DKI Jakarta', 'Jakarta Pusat', 'Menteng', 'Jl. Menteng Raya No.29, RT.1/RW.10, Kb. Sirih'),
(3, 'Menara Astra', 'DKI Jakarta', 'Jakarta Pusat', 'Tanah Abang', 'Jalan Jendral Sudirman Jl. Kav. P&K V No.6, RW.11, Karet Tengsin'),
(6, 'Gedung BNI46', 'Jakarta', 'Jakarta Pusat', 'Tanah Abang', 'Jl. Jenderal Sudirman No.Kav. 1, RT.1/RW.8, Karet Tengsin'),
(7, 'Menara BCA', 'Jakarta', 'Jakarta Pusat', 'Tanah Abang', 'Jl. M.H. Thamrin No.1, Kb. Melati');

-- --------------------------------------------------------

--
-- Table structure for table `building_level`
--

CREATE TABLE `building_level` (
  `levelid` int(11) NOT NULL,
  `buildcode` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `building_level`
--

INSERT INTO `building_level` (`levelid`, `buildcode`, `code`, `name`) VALUES
(1, 1, 'B1', 'Basement 1'),
(2, 1, 'B2', 'Basement 2'),
(5, 1, 'B3', 'Basement 3'),
(6, 1, 'B4', 'Basement 4'),
(7, 1, 'L1', 'Lobby 1'),
(8, 3, 'B1', 'Basement 1'),
(9, 3, 'B2', 'Basement 2'),
(12, 3, 'B3', 'Basement 3'),
(13, 3, 'B3', 'Basement 3'),
(14, 0, 'LB', 'Lobby Barat'),
(15, 6, 'B1', 'Basement 1');

-- --------------------------------------------------------

--
-- Table structure for table `building_section`
--

CREATE TABLE `building_section` (
  `secid` int(11) NOT NULL,
  `levelcode` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `totalrow` int(11) NOT NULL,
  `spacerow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `building_section`
--

INSERT INTO `building_section` (`secid`, `levelcode`, `code`, `name`, `totalrow`, `spacerow`) VALUES
(2, 7, 'LB', 'Lobby Barat', 1, 12),
(3, 7, 'LT', 'Lobby Timur', 1, 10),
(4, 15, 'A1', 'Area A1', 4, 8),
(5, 15, 'A2', 'Area A2', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `cardata`
--

CREATE TABLE `cardata` (
  `id` int(11) NOT NULL,
  `plate` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `owners` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cardata`
--

INSERT INTO `cardata` (`id`, `plate`, `type`, `name`, `brand`, `owners`) VALUES
(1, 'B 1121 UOT', 'MPV', 'ALL NEW XENIA', 'DAIHATSU', 1),
(2, 'B 3321 BAT', 'SUV', 'CX-5', 'MAZDA', 1),
(6, 'R 2112 LW', 'MPV', 'Sienta', 'Toyota', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `channel_service`
-- (See below for the actual view)
--
CREATE TABLE `channel_service` (
`id` int(11)
,`methodid` int(11)
,`nama_akun` varchar(50)
,`accountno` varchar(25)
,`methodname` varchar(25)
,`keterangan` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `gedung_parkir`
-- (See below for the actual view)
--
CREATE TABLE `gedung_parkir` (
`secid` int(11)
,`code` varchar(10)
,`name` varchar(25)
,`levelcode` int(11)
,`levelname` varchar(25)
,`gedungcode` int(11)
,`gedung` varchar(50)
,`prov` varchar(25)
,`kab` varchar(25)
,`kec` varchar(25)
,`alamat` text
,`ratepark` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `parking_rate`
--

CREATE TABLE `parking_rate` (
  `id` int(11) NOT NULL,
  `building` int(11) NOT NULL,
  `ratepark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking_rate`
--

INSERT INTO `parking_rate` (`id`, `building`, `ratepark`) VALUES
(1, 1, 3000),
(2, 3, 5000),
(3, 7, 3999),
(4, 6, 5000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `park_freq`
-- (See below for the actual view)
--
CREATE TABLE `park_freq` (
`userid` int(11)
,`frekuensi` bigint(21)
,`gedung` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `payment_channel`
--

CREATE TABLE `payment_channel` (
  `id` int(11) NOT NULL,
  `methodid` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `accountno` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_channel`
--

INSERT INTO `payment_channel` (`id`, `methodid`, `nama`, `accountno`) VALUES
(1, 1, 'Bank Mandiri', '123456'),
(2, 1, 'Bank BCA', '67890'),
(3, 2, 'Bank Permata', '2324123'),
(4, 2, 'Bank Mandiri', '382944'),
(5, 3, 'Flazz', '398247');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `nama`, `keterangan`) VALUES
(1, 'Bank Transfer', 'Pembayaran Melalui Transfer Perbankan'),
(2, 'Virtual Account', 'Pembayaran Melalui VA Perbankan'),
(3, 'eMoney', 'Pembayaran dengan Uang Elektronik');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `nama`, `alamat`, `telp`, `email`) VALUES
(1, 'Fakhri Rizal Santosa', 'Sunter II, Jakarta Utara', '9292834', 'rizals@student.mercubuana.ac.id'),
(7, 'Ronaldo', 'Portugal', '3892', 'arab@gmail.com');

-- --------------------------------------------------------

--
-- Stand-in structure for view `report_cost`
-- (See below for the actual view)
--
CREATE TABLE `report_cost` (
`userid` int(11)
,`tanggal` varchar(67)
,`biaya` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `tipe`, `profile_id`) VALUES
(5, 'Rizal', '88ce5085f12f6e120fcc65beeecf8b39760d2fe2', 'admin', 1),
(7, 'Ronaldo', '937bd95172cf13e51482fceaa4c77000bb8bbffb', 'user', 7);

-- --------------------------------------------------------

--
-- Structure for view `channel_service`
--
DROP TABLE IF EXISTS `channel_service`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `channel_service`  AS SELECT `pc`.`id` AS `id`, `pc`.`methodid` AS `methodid`, `pc`.`nama` AS `nama_akun`, `pc`.`accountno` AS `accountno`, `pm`.`nama` AS `methodname`, `pm`.`keterangan` AS `keterangan` FROM (`payment_channel` `pc` left join `payment_method` `pm` on(`pc`.`methodid` = `pm`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `gedung_parkir`
--
DROP TABLE IF EXISTS `gedung_parkir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `gedung_parkir`  AS SELECT `bs`.`secid` AS `secid`, `bs`.`code` AS `code`, `bs`.`name` AS `name`, `bl`.`levelid` AS `levelcode`, `bl`.`name` AS `levelname`, `bd`.`spaceid` AS `gedungcode`, `bd`.`nama` AS `gedung`, `bd`.`prov` AS `prov`, `bd`.`kab` AS `kab`, `bd`.`kec` AS `kec`, `bd`.`fulladdress` AS `alamat`, `pr`.`ratepark` AS `ratepark` FROM (((`building_section` `bs` left join `building_level` `bl` on(`bs`.`levelcode` = `bl`.`levelid`)) left join `building` `bd` on(`bl`.`buildcode` = `bd`.`spaceid`)) left join `parking_rate` `pr` on(`bd`.`spaceid` = `pr`.`building`))  ;

-- --------------------------------------------------------

--
-- Structure for view `park_freq`
--
DROP TABLE IF EXISTS `park_freq`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `park_freq`  AS SELECT `bk`.`userid` AS `userid`, count(`bk`.`spacerent`) AS `frekuensi`, `gp`.`gedung` AS `gedung` FROM (`booking` `bk` left join `gedung_parkir` `gp` on(`bk`.`spacerent` = `gp`.`secid`)) GROUP BY `bk`.`userid`, `bk`.`spacerent` ORDER BY `bk`.`datebook` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `report_cost`
--
DROP TABLE IF EXISTS `report_cost`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report_cost`  AS SELECT `bk`.`userid` AS `userid`, date_format(`bk`.`datebook`,'%M-%y') AS `tanggal`, sum(`bp`.`total`) AS `biaya` FROM (`booking` `bk` left join `booking_payment` `bp` on(`bk`.`bookid` = `bp`.`bookid`)) GROUP BY `bk`.`userid`, year(`bk`.`datebook`), month(`bk`.`datebook`) ORDER BY `bk`.`datebook` ASC  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `booking_payment`
--
ALTER TABLE `booking_payment`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`spaceid`);

--
-- Indexes for table `building_level`
--
ALTER TABLE `building_level`
  ADD PRIMARY KEY (`levelid`);

--
-- Indexes for table `building_section`
--
ALTER TABLE `building_section`
  ADD PRIMARY KEY (`secid`);

--
-- Indexes for table `cardata`
--
ALTER TABLE `cardata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plate` (`plate`);

--
-- Indexes for table `parking_rate`
--
ALTER TABLE `parking_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_channel`
--
ALTER TABLE `payment_channel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `spaceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `building_level`
--
ALTER TABLE `building_level`
  MODIFY `levelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `building_section`
--
ALTER TABLE `building_section`
  MODIFY `secid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cardata`
--
ALTER TABLE `cardata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parking_rate`
--
ALTER TABLE `parking_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_channel`
--
ALTER TABLE `payment_channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
