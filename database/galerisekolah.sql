-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 08:14 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galerisekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(3, 'thoriq', 'thor', 'tor123', '0895383268345', 'tor@gmail.com', 'suka suka jonggol');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(14, 'Kegiatan Sekolah'),
(16, 'Ekstrakulikuler'),
(17, 'Jurusan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_image`
--

CREATE TABLE `tb_image` (
  `image_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_image`
--

INSERT INTO `tb_image` (`image_id`, `category_id`, `category_name`, `admin_id`, `admin_name`, `image_name`, `image_description`, `image`, `image_status`, `date_created`) VALUES
(43, 16, 'Ekstrakulikuler', 3, 'Diana', 'pramuka', '<p>eskul pramuka</p>\r\n', 'foto1713926560.jpg', 1, '2024-04-24 02:50:15'),
(44, 17, 'Jurusan', 3, 'Diana', 'RPL', '<p>JURUSAN RPL</p>\r\n', 'foto1713926603.jpg', 1, '2024-04-24 02:50:23'),
(45, 14, 'Kegiatan Sekolah', 3, 'Diana', 'kegiatan', '<p>acara pentas tari sekolah</p>\r\n', 'foto1713926976.jpg', 1, '2024-04-24 02:50:29'),
(48, 16, 'Ekstrakulikuler', 3, 'Diana', 'futsal', 'ini adalah foto saat kita lagi main bola di lapangan basket\r\n', 'foto1714010817.jpg', 1, '2024-04-25 02:06:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_image`
--
ALTER TABLE `tb_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD CONSTRAINT `tb_image_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tb_admin` (`admin_id`),
  ADD CONSTRAINT `tb_image_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
