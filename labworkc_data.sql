-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2022 at 05:13 AM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labworkc_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

CREATE TABLE `tbl_report` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `report_name` varchar(50) DEFAULT NULL,
  `instrument` varchar(50) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `evaluation_date` date DEFAULT NULL,
  `uploads` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_report`
--

INSERT INTO `tbl_report` (`id`, `user_id`, `report_name`, `instrument`, `report_date`, `evaluation_date`, `uploads`) VALUES
(653047, 5, '2021-CT-03031 â€¢ GPI-1544', 'Controlador de Temperatura', '2022-03-17', '2022-03-23', '2021-CT-03031 â€¢ GPI-1544.pdf'),
(653048, 57, '2021-IV-09044 â€¢ M17-015', 'Indicador de VazÃ£o', '2021-09-16', '2022-09-16', '2021-IV-09044 â€¢ M17-015.pdf'),
(653049, 57, '2021-IV-09045 â€¢ M17-014', 'Indicador de VazÃ£o', '2021-09-16', '2022-09-16', '2021-IV-09045 â€¢ M17-014.pdf'),
(653050, 57, '2021-MV-09046 â€¢ 401017', 'Medidor de VazÃ£o', '2021-09-24', '2022-09-24', '2021-MV-09046 â€¢ 401017.pdf'),
(653051, 57, '2022-BC-03048  B01-047', 'Banco Ar Cond.', '2022-03-11', '2023-03-11', '2022-BC-03048  B01-047.pdf'),
(653052, 57, '2022-RT-02047-R07-002', 'Registrador de Temperatura', '2022-03-11', '2023-03-11', '2022-RT-02047-R07-002.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `pass`, `role`) VALUES
(35, 'Labadmin', 'contato@labwork.com.br', 'VXBCcmF2bzIx', 1),
(38, 'qw', 'qw@qw.com', 'YXNhc2Fz', 1),
(54, 'Grupo GP', 'gp@grupogp.com.br', 'R1BJMTIwMg==', NULL),
(57, 'HelibrÃ¡s', 'helibras@helibras.com.br', 'SEJJVEoxMjAy', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_report`
--
ALTER TABLE `tbl_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_report`
--
ALTER TABLE `tbl_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=653055;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
