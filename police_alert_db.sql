-- phpMypolice SQL Dump
-- version 5.0.4
-- https://www.phpmypolice.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 11:19 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+02:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `police_alert_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(14) NOT NULL,
  `idNo` varchar(14) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`id`, `first_name`, `last_name`, `email`, `mobile`, `idNo`, `gender`, `password`) VALUES
(1, 'police', 'first', 'police@gmail.com', '', '5501025555555', 'male', '1234@Abc'),
(2, 'police', 'second', 'police3@gmail.com', '02225555555', '9911111111115', '', '1234@Abc'),
(3, 'animal', 'third', 'animal@gmail.ac.za', '0688888888', '0101055555555', 'male', '1234@Abc');

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `case_number` varchar(11) NOT NULL,
  `fugitive_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(25) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alert`
--

INSERT INTO `alert` (`case_number`, `fugitive_id`, `user_id`, `type`, `lat`, `lng`, `date`) VALUES
('103185', 6, 0, NULL, '-25.7539303', '28.1963248', '2021-05-31 15:01:02'),
('107669', 5, 0, NULL, '-74.00594130000002', '40.7127837', '2021-05-31 13:15:21'),
('978599', 3, 0, NULL, '-25.7539303', '28.1963248', '2021-05-31 15:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `fugitive`
--

CREATE TABLE `fugitive` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `gender` varchar(9) NOT NULL,
  `image` varchar(30) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fugitive`
--

INSERT INTO `fugitive` (`id`, `first_name`, `last_name`, `gender`, `image`, `status`) VALUES
(1, 'kekenths', 'math', 'Male', 'profile.png', 'reported'),
(2, 'vick', 'thesecond', 'Female', 'crime-stop.png', '0'),
(3, 'vick', 'math', 'Male', '', '0'),
(4, 'vick', 'math', 'male', 'profile.png', '0'),
(5, 'vick', 'math', 'male', 'profile.png', '0'),
(8, 'john', 'math', 'Female', 'prof.png', NULL),
(18, 'test', 'fugitive', 'Male', 'crime-thailand22.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(0, 'inactive'),
(1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(14) NOT NULL,
  `idNo` varchar(14) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `mobile`, `idNo`, `gender`, `image`, `status`, `password`) VALUES
(9, 'last', 'bila', 'last@gmail.com', '0610214444', '0202021111111', 'female', NULL, '1', '1234@abc'),
(10, 'ccc', 'ccc', 'name@gmail.com', '0022222220', '0202144444444', 'female', NULL, '0', '1234@Abc'),
(11, 'tickele', 'meee', 'test@gmail.com', '0822222222', '0202144444444', 'female', NULL, '0', '1234@Abc'),
(12, 'animal', 'third', 'animal2@gmail.ac.za', '0688888885', '0101055555554', 'male', NULL, NULL, '1234@Abc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`case_number`);

--
-- Indexes for table `fugitive`
--
ALTER TABLE `fugitive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
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
-- AUTO_INCREMENT for table `police`
--
ALTER TABLE `police`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fugitive`
--
ALTER TABLE `fugitive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
