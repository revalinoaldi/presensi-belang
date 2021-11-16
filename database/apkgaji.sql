-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 07:41 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apkgaji`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detil_tunjangan_setting`
--

CREATE TABLE `tbl_detil_tunjangan_setting` (
  `id_detil` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_tunjangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detil_tunjangan_setting`
--

INSERT INTO `tbl_detil_tunjangan_setting` (`id_detil`, `id_jabatan`, `id_tunjangan`) VALUES
(1, 1, 3),
(2, 1, 2),
(3, 1, 1),
(5, 2, 3),
(6, 2, 2),
(7, 2, 1),
(10, 0, 4),
(11, 0, 3),
(12, 13, 3),
(14, 0, 1),
(16, 3, 3),
(17, 3, 1),
(20, 4, 4),
(21, 4, 3),
(23, 5, 5),
(24, 5, 4),
(25, 5, 3),
(27, 6, 5),
(28, 6, 4),
(29, 6, 3),
(31, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gaji_kotor`
--

CREATE TABLE `tbl_gaji_kotor` (
  `id_gaji` int(11) NOT NULL,
  `id_pendapatan` int(11) NOT NULL,
  `tgl_terima_gaji` date NOT NULL,
  `gp` int(11) NOT NULL,
  `total_tunjangan` int(11) NOT NULL,
  `total_lemburan` int(11) NOT NULL,
  `total_gaji` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gaji_kotor`
--

INSERT INTO `tbl_gaji_kotor` (`id_gaji`, `id_pendapatan`, `tgl_terima_gaji`, `gp`, `total_tunjangan`, `total_lemburan`, `total_gaji`) VALUES
(2439618, 34, '2021-11-16', 6200000, 300000, 281792, 6781792),
(6489132, 29, '2021-11-16', 7300000, 375000, 0, 7675000),
(19832074, 28, '2021-11-16', 7300000, 375000, 0, 7675000),
(27406519, 44, '2021-11-16', 5100000, 126000, 280058, 5506058),
(34056287, 40, '2021-11-16', 5500000, 70000, 0, 5570000),
(36581279, 42, '2021-11-16', 5100000, 70000, 103179, 5273179),
(45812690, 45, '2021-11-16', 5100000, 266000, 280058, 5646058),
(67120534, 27, '2021-11-16', 7300000, 375000, 421460, 8096460),
(82036794, 41, '2021-11-16', 5120000, 70000, 281156, 5471156),
(89246375, 43, '2021-11-16', 5100000, 70000, 442197, 5612197),
(89752340, 32, '2021-11-16', 7300000, 375000, 0, 7675000),
(92370548, 37, '2021-11-16', 5500000, 0, 174855, 5674855),
(93482675, 35, '2021-11-16', 6200000, 300000, 0, 6500000);

--
-- Triggers `tbl_gaji_kotor`
--
DELIMITER $$
CREATE TRIGGER `delete_gaji` BEFORE DELETE ON `tbl_gaji_kotor` FOR EACH ROW BEGIN
DELETE FROM tbl_tunjangan_karyawan WHERE id_gaji = OLD.id_gaji;	
DELETE FROM tbl_lemburan WHERE id_gaji = OLD.id_gaji;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jns_tunjangan`
--

CREATE TABLE `tbl_jns_tunjangan` (
  `id_tunjangan` int(11) NOT NULL,
  `jns_tunjangan` varchar(20) NOT NULL,
  `tipe_tunjangan` enum('tetap','opsional') NOT NULL,
  `total_tunjangan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jns_tunjangan`
--

INSERT INTO `tbl_jns_tunjangan` (`id_tunjangan`, `jns_tunjangan`, `tipe_tunjangan`, `total_tunjangan`) VALUES
(1, 'Tunjangan Jabatan', 'tetap', 300000),
(2, 'Tunjangan Rumah', 'tetap', 75000),
(3, 'Tunjangan kerjapenuh', 'opsional', 30000),
(4, 'Tunjangan shift2', 'opsional', 14000),
(5, 'Tunjangan shift3', 'opsional', 17000);

--
-- Triggers `tbl_jns_tunjangan`
--
DELIMITER $$
CREATE TRIGGER `delete_jnsTunjangan` BEFORE DELETE ON `tbl_jns_tunjangan` FOR EACH ROW BEGIN
DELETE FROM tbl_detil_tunjangan_setting WHERE id_tunjangan = OLD.id_tunjangan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lemburan`
--

CREATE TABLE `tbl_lemburan` (
  `id_lembur` int(11) NOT NULL,
  `id_lemburan` int(11) DEFAULT NULL,
  `id_gaji` int(11) NOT NULL,
  `total_jam` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lemburan`
--

INSERT INTO `tbl_lemburan` (`id_lembur`, `id_lemburan`, `id_gaji`, `total_jam`) VALUES
(37, 8, 82036794, 9.5),
(38, 4, 2439618, 7.5),
(39, 13, 67120534, 9.5),
(40, 10, 27406519, 9.5),
(41, 1, 36581279, 3.5),
(42, 2, 89246375, 5.5),
(43, 9, 89246375, 9.5),
(44, 11, 45812690, 9.5),
(45, 6, 92370548, 5.5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendapatan_karyawan`
--

CREATE TABLE `tbl_pendapatan_karyawan` (
  `id_pendapatan` int(11) NOT NULL,
  `nip` char(14) NOT NULL,
  `total_gp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendapatan_karyawan`
--

INSERT INTO `tbl_pendapatan_karyawan` (`id_pendapatan`, `nip`, `total_gp`) VALUES
(1, '54304966517250', 7300000),
(2, '30337399577372', 7300000),
(3, '46025989483657', 7300000),
(4, '63859172038847', 7300000),
(5, '15540785367856', 6200000),
(6, '85985190568974', 6200000),
(7, '34708717746000', 5500000),
(8, '81265310384466', 5500000),
(9, '15125526856615', 5120000),
(10, '45845804320283', 5125000),
(11, '88437287706797', 5120000),
(12, '36501273559376', 5120000),
(13, '38542213949551', 5100000),
(14, '57977240097927', 5100000),
(15, '12399812381', 5100000),
(16, '29854269002861', 7300000),
(17, '28024081139359', 7300000),
(18, '46095649958735', 7300000),
(19, '87619125233598', 6200000),
(20, '44987520599955', 5500000),
(21, '20858453880714', 5120000),
(22, '99133882086972', 5120000),
(23, '81021868687587', 5100000),
(24, '47392881303153', 5100000),
(25, '1239981231237', 7300000),
(26, '63798072668246', 7300000),
(27, '32850102056636', 7300000),
(28, '48558269869854', 7300000),
(29, '49637722541079', 7300000),
(30, '36373371158434', 7300000),
(31, '1239981238438', 7300000),
(32, '15298292174019', 7300000),
(33, '25443063754468', 7300000),
(34, '20218028201059', 6200000),
(35, '1239981238138', 6200000),
(36, '18958126114347', 6200000),
(37, '90457975788358', 5500000),
(38, '123998123890', 5500000),
(39, '35750908958441', 5500000),
(40, '87121134048323', 5500000),
(41, '1440192311', 5120000),
(42, '51968375298148', 5100000),
(43, '59938576800710', 5100000),
(44, '50257955967610', 5100000),
(45, '86036064588824', 5100000),
(46, '20498378939205', 7300000),
(47, '31988561631592', 7300000),
(48, '83174107418541', 7300000),
(49, '85466399127350', 7300000),
(50, '76504780786222', 7300000),
(51, '96107230621787', 7300000),
(52, '93617232466145', 6200000),
(53, '98857667080213', 6200000),
(54, '53514831180396', 5500000),
(55, '28310921914265', 5500000),
(56, '42703179462524', 5500000),
(57, '55499139318997', 5100000),
(58, '48982611396175', 5100000),
(59, '70956184804452', 5100000),
(60, '64228681931764', 7300000),
(61, '61344723400004', 7300000),
(62, '72476208555307', 6200000),
(63, '68206519442243', 6200000),
(64, '68572014081942', 5500000),
(65, '78589870227208', 5500000),
(66, '89580365258052', 5120000),
(67, '33853016880765', 5120000),
(68, '54463171137182', 5120000),
(69, '44245965298619', 5100000),
(70, '16200485954172', 5100000),
(71, '14085853601973', 5100000),
(72, '84874764319246', 5100000),
(73, '12453880103001', 7300000),
(74, '26127519787818', 7300000),
(75, '59398487249361', 7300000),
(76, '93658737485913', 6200000),
(77, '72828429537957', 5500000),
(78, '70608609242524', 5500000),
(79, '78345459457877', 5500000),
(80, '81743989576312', 5120000),
(81, '72538674277691', 5120000),
(82, '39339537964482', 5120000),
(83, '81262024614021', 5120000),
(84, '94020448385018', 5100000),
(85, '16717162827852', 7300000),
(86, '57846938794874', 7300000),
(87, '81390353903739', 6200000),
(88, '32069698498412', 6200000),
(89, '84365051580338', 6200000),
(90, '16038046353390', 6200000),
(91, '86951239052510', 5500000),
(92, '26236958963912', 5120000),
(93, '19841311596103', 5100000),
(94, '65230294067558', 7300000),
(95, '29152983985224', 7300000),
(96, '64923777656426', 6200000),
(97, '71540171019882', 5120000),
(98, '25484558325464', 5120000),
(99, '20586903025917', 5120000),
(100, '91225168124912', 5100000),
(101, '89057448981819', 5100000),
(102, '78949364373070', 5100000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tunjangan_karyawan`
--

CREATE TABLE `tbl_tunjangan_karyawan` (
  `id_tk` int(11) NOT NULL,
  `id_gaji` int(11) NOT NULL,
  `id_tunjangan` int(11) DEFAULT NULL,
  `total_tunjangan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tunjangan_karyawan`
--

INSERT INTO `tbl_tunjangan_karyawan` (`id_tk`, `id_gaji`, `id_tunjangan`, `total_tunjangan`) VALUES
(151, 93482675, 3, 0),
(152, 93482675, 1, 300000),
(153, 82036794, 5, 0),
(154, 82036794, 4, 70000),
(155, 82036794, 3, 0),
(156, 89752340, 3, 0),
(157, 89752340, 2, 75000),
(158, 89752340, 1, 300000),
(159, 2439618, 3, 0),
(160, 2439618, 1, 300000),
(161, 67120534, 3, 0),
(162, 67120534, 2, 75000),
(163, 67120534, 1, 300000),
(164, 19832074, 3, 0),
(165, 19832074, 2, 75000),
(166, 19832074, 1, 300000),
(167, 6489132, 3, 0),
(168, 6489132, 2, 75000),
(169, 6489132, 1, 300000),
(170, 27406519, 5, 0),
(171, 27406519, 4, 126000),
(172, 27406519, 3, 0),
(173, 36581279, 5, 0),
(174, 36581279, 4, 70000),
(175, 36581279, 3, 0),
(176, 89246375, 5, 0),
(177, 89246375, 4, 70000),
(178, 89246375, 3, 0),
(179, 45812690, 5, 68000),
(180, 45812690, 4, 168000),
(181, 45812690, 3, 30000),
(182, 34056287, 4, 70000),
(183, 34056287, 3, 0),
(184, 92370548, 4, 0),
(185, 92370548, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(225) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `username`, `password`, `avatar`, `is_active`, `created_at`, `last_login`) VALUES
(1, 'via', 'viaardiani507@gmail.com', 'viaardiani507', '$2y$10$BMNra/uQGHE7IC00W/oVgesSM6Vevlp88Nb0G5A1Y0ZmTdg/do88i', '', 1, '2021-10-05 06:14:21', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_gaji`
-- (See below for the actual view)
--
CREATE TABLE `v_gaji` (
`id_gaji` int(11)
,`id_pendapatan` int(11)
,`nip` char(14)
,`tgl_terima_gaji` date
,`gp` int(11)
,`total_tunjangan` int(11)
,`total_lemburan` int(11)
,`total_gaji` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_tunjangan`
-- (See below for the actual view)
--
CREATE TABLE `v_tunjangan` (
`id_detil` int(11)
,`id_jabatan` int(11)
,`id_tunjangan` int(11)
,`jns_tunjangan` varchar(20)
,`tipe_tunjangan` enum('tetap','opsional')
,`total_tunjangan` double
);

-- --------------------------------------------------------

--
-- Structure for view `v_gaji`
--
DROP TABLE IF EXISTS `v_gaji`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_gaji`  AS SELECT `g`.`id_gaji` AS `id_gaji`, `g`.`id_pendapatan` AS `id_pendapatan`, `p`.`nip` AS `nip`, `g`.`tgl_terima_gaji` AS `tgl_terima_gaji`, `g`.`gp` AS `gp`, `g`.`total_tunjangan` AS `total_tunjangan`, `g`.`total_lemburan` AS `total_lemburan`, `g`.`total_gaji` AS `total_gaji` FROM (`tbl_gaji_kotor` `g` join `tbl_pendapatan_karyawan` `p` on(`g`.`id_pendapatan` = `p`.`id_pendapatan`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_tunjangan`
--
DROP TABLE IF EXISTS `v_tunjangan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tunjangan`  AS SELECT `d`.`id_detil` AS `id_detil`, `d`.`id_jabatan` AS `id_jabatan`, `d`.`id_tunjangan` AS `id_tunjangan`, `t`.`jns_tunjangan` AS `jns_tunjangan`, `t`.`tipe_tunjangan` AS `tipe_tunjangan`, `t`.`total_tunjangan` AS `total_tunjangan` FROM (`tbl_detil_tunjangan_setting` `d` join `tbl_jns_tunjangan` `t` on(`d`.`id_tunjangan` = `t`.`id_tunjangan`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detil_tunjangan_setting`
--
ALTER TABLE `tbl_detil_tunjangan_setting`
  ADD PRIMARY KEY (`id_detil`),
  ADD KEY `id_tunjangan` (`id_tunjangan`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `tbl_gaji_kotor`
--
ALTER TABLE `tbl_gaji_kotor`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id_pendapatan` (`id_pendapatan`);

--
-- Indexes for table `tbl_jns_tunjangan`
--
ALTER TABLE `tbl_jns_tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`);

--
-- Indexes for table `tbl_lemburan`
--
ALTER TABLE `tbl_lemburan`
  ADD PRIMARY KEY (`id_lembur`),
  ADD KEY `id_gaji` (`id_gaji`);

--
-- Indexes for table `tbl_pendapatan_karyawan`
--
ALTER TABLE `tbl_pendapatan_karyawan`
  ADD PRIMARY KEY (`id_pendapatan`);

--
-- Indexes for table `tbl_tunjangan_karyawan`
--
ALTER TABLE `tbl_tunjangan_karyawan`
  ADD PRIMARY KEY (`id_tk`),
  ADD KEY `id_gaji` (`id_gaji`),
  ADD KEY `id_tunjangan` (`id_tunjangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detil_tunjangan_setting`
--
ALTER TABLE `tbl_detil_tunjangan_setting`
  MODIFY `id_detil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_gaji_kotor`
--
ALTER TABLE `tbl_gaji_kotor`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98623042;

--
-- AUTO_INCREMENT for table `tbl_jns_tunjangan`
--
ALTER TABLE `tbl_jns_tunjangan`
  MODIFY `id_tunjangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_lemburan`
--
ALTER TABLE `tbl_lemburan`
  MODIFY `id_lembur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_pendapatan_karyawan`
--
ALTER TABLE `tbl_pendapatan_karyawan`
  MODIFY `id_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tbl_tunjangan_karyawan`
--
ALTER TABLE `tbl_tunjangan_karyawan`
  MODIFY `id_tk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detil_tunjangan_setting`
--
ALTER TABLE `tbl_detil_tunjangan_setting`
  ADD CONSTRAINT `tbl_detil_tunjangan_setting_ibfk_1` FOREIGN KEY (`id_tunjangan`) REFERENCES `tbl_jns_tunjangan` (`id_tunjangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_gaji_kotor`
--
ALTER TABLE `tbl_gaji_kotor`
  ADD CONSTRAINT `tbl_gaji_kotor_ibfk_1` FOREIGN KEY (`id_pendapatan`) REFERENCES `tbl_pendapatan_karyawan` (`id_pendapatan`);

--
-- Constraints for table `tbl_lemburan`
--
ALTER TABLE `tbl_lemburan`
  ADD CONSTRAINT `tbl_lemburan_ibfk_1` FOREIGN KEY (`id_gaji`) REFERENCES `tbl_gaji_kotor` (`id_gaji`);

--
-- Constraints for table `tbl_tunjangan_karyawan`
--
ALTER TABLE `tbl_tunjangan_karyawan`
  ADD CONSTRAINT `tbl_tunjangan_karyawan_ibfk_1` FOREIGN KEY (`id_gaji`) REFERENCES `tbl_gaji_kotor` (`id_gaji`),
  ADD CONSTRAINT `tbl_tunjangan_karyawan_ibfk_2` FOREIGN KEY (`id_tunjangan`) REFERENCES `tbl_jns_tunjangan` (`id_tunjangan`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
