-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 06:19 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menternship`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'kartheeshreddy', 'menternship');

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetails`
--

CREATE TABLE `bookingdetails` (
  `id` bigint(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `mobile` bigint(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingdetails`
--

INSERT INTO `bookingdetails` (`id`, `username`, `customer`, `mobile`, `email`, `address`, `date`, `time`, `status`) VALUES
(1820758113, 'abc', 'abc', 9456231864, 'abc@gmail.com', 'B-73,Ghatkesar,Yamnampet,Hyderabad', '2020-09-06', '4:00PM-5:00PM', NULL),
(745288381, 'xyz', 'xyz', 8790435217, 'xyz@yahoo.com', '23/1-4,Dilshukhnagar,Hyderabad', '2020-09-04', '9:00AM-10:00AM', NULL),
(1887978114, 'lmn', 'lmn', 9647153905, 'lmn@outlook.com', '8-4-1,Jaihind Enclave,Madhapur,Hyderabad', '2020-09-02', '11:00AM-12:00PM', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newbookingpage`
--

CREATE TABLE `newbookingpage` (
  `id` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `test` varchar(30) NOT NULL,
  `prescription` varchar(100) NOT NULL,
  `lab` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newbookingpage`
--

INSERT INTO `newbookingpage` (`id`, `username`, `test`, `prescription`, `lab`) VALUES
(1820758113, 'abc', 'Electrocardiogram (ECG)', 'uploads/prescription1.jpg', 'Lab2'),
(745288381, 'xyz', 'MRI Scans', 'uploads/prescription2.jpg', 'Lab2'),
(1887978114, 'lmn', 'Electrocardiogram (ECG)', 'uploads/prescription3.jpg', 'Lab1');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`username`, `password`) VALUES
('abc', '123'),
('xyz', '456'),
('lmn', '789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
