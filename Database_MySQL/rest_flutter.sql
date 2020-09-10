-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2020 at 02:33 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rest_flutter`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_hadiah`
--

CREATE TABLE `table_hadiah` (
  `id_hadiah` int(6) NOT NULL,
  `nama_hadiah` varchar(30) NOT NULL,
  `point_hadiah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_transaksi`
--

CREATE TABLE `table_transaksi` (
  `id_transaksi` int(6) NOT NULL,
  `id_user` int(6) NOT NULL,
  `total_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `id_user` int(6) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `point_user` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_user_hadiah`
--

CREATE TABLE `table_user_hadiah` (
  `id_user` int(6) NOT NULL,
  `id_hadiah` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_hadiah`
--
ALTER TABLE `table_hadiah`
  ADD PRIMARY KEY (`id_hadiah`);

--
-- Indexes for table `table_transaksi`
--
ALTER TABLE `table_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `table_user_hadiah`
--
ALTER TABLE `table_user_hadiah`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_hadiah` (`id_hadiah`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_transaksi`
--
ALTER TABLE `table_transaksi`
  ADD CONSTRAINT `table_transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `table_user` (`id_user`);

--
-- Constraints for table `table_user_hadiah`
--
ALTER TABLE `table_user_hadiah`
  ADD CONSTRAINT `table_user_hadiah_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `table_user` (`id_user`),
  ADD CONSTRAINT `table_user_hadiah_ibfk_2` FOREIGN KEY (`id_hadiah`) REFERENCES `table_hadiah` (`id_hadiah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
