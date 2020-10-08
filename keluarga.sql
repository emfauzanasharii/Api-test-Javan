-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 05:14 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `keluarga`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keluarga`
--

CREATE TABLE IF NOT EXISTS `tbl_keluarga` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL COMMENT '1=Laki, 2=Perempuan',
  `status` int(11) NOT NULL,
  `ortu_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keluarga`
--

INSERT INTO `tbl_keluarga` (`id`, `nama`, `jenis_kelamin`, `status`, `ortu_id`) VALUES
(1, 'Budi', 1, 0, 0),
(2, 'Dedi', 1, 1, 1),
(3, 'Dodi', 1, 1, 1),
(4, 'Dede', 1, 1, 1),
(5, 'Dewi', 2, 1, 1),
(6, 'Feri', 1, 2, 2),
(7, 'Farah', 2, 2, 2),
(8, 'Gugus', 1, 2, 3),
(9, 'Gandi', 1, 2, 3),
(10, 'Hani', 2, 2, 4),
(11, 'Hana', 2, 2, 4),
(12, 'Desi', 2, 2, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_keluarga`
--
ALTER TABLE `tbl_keluarga`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_keluarga`
--
ALTER TABLE `tbl_keluarga`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
