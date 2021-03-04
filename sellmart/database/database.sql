-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 07:30 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(150) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `deskripsi`, `price`, `photo`, `stok`) VALUES
(1, 'Selada', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do eiusmod teme.', 10000, 'images/selada.jpg', 10),
(2, 'Sawi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do eiusmod teme.', 8000, 'images/sawi.jpg', 8),
(3, 'Kangkung', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do eiusmod teme.', 5000, 'images/kangkung.jpg', 6),
(4, 'Cabai', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do eiusmod teme.', 12000, 'images/cabai.jpg', 2),
(9, 'Daun Bawang', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do eiusmod teme.', 7000, 'images/hydro1.jpg', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
