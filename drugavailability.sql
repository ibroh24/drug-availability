-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2019 at 06:11 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drugavailability`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblapproveddrug`
--

CREATE TABLE `tblapproveddrug` (
  `id` int(11) NOT NULL,
  `DoctorsName` varchar(36) DEFAULT NULL,
  `PatientName` varchar(36) DEFAULT NULL,
  `DrugName` varchar(36) DEFAULT NULL,
  `DrugDescription` varchar(100) DEFAULT NULL,
  `PharmacyNumber` varchar(36) DEFAULT NULL,
  `StoreName` varchar(36) DEFAULT NULL,
  `StoreAddress` varchar(36) DEFAULT NULL,
  `DrugPrice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblapproveddrug`
--

INSERT INTO `tblapproveddrug` (`id`, `DoctorsName`, `PatientName`, `DrugName`, `DrugDescription`, `PharmacyNumber`, `StoreName`, `StoreAddress`, `DrugPrice`) VALUES
(0, '', 'ade', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbldoctor`
--

CREATE TABLE `tbldoctor` (
  `doctorID` varchar(50) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldoctor`
--

INSERT INTO `tbldoctor` (`doctorID`, `firstname`, `lastname`, `username`, `password`, `email`, `phone`) VALUES
('DR-1729', 'Oladele', 'Azeez', 'Azeez', '$2y$10$sF3/tu/7QHHELtWtF3SZWeZjY06tSahwX91D5DGjYR6akSRcwXS7G', 'oladele@gmail.com', ''),
('DR-1732', 'Idris', 'Bello', 'Bello', 'cGFzc3dvcmQ=', 'bello@g.com', '123456'),
('DR-1878', 'Ibrahim', 'Salami', 'ibrahim', 'cGFzc3dvcmQ=', 'ib@g.com', '123456789'),
('DR-1978', 'abdullah', 'sulaymon', 'abdullah', 'cGFzc3dvcmQ=', 'abd@gm.com', '124587963'),
('DR-2021', 'Adeogun', 'Adeogo', 'adeigo', '$2y$10$lbxl8vp6HlQ2wtQ901xxjuQNTxSFreesVWZSYGhG6uX6zxqhvAb.O', 'ad@g.com', '0708245789');

-- --------------------------------------------------------

--
-- Table structure for table `tbldrug`
--

CREATE TABLE `tbldrug` (
  `drugID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `pharmacystore` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldrug`
--

INSERT INTO `tbldrug` (`drugID`, `name`, `description`, `price`, `pharmacystore`, `address`, `phone`) VALUES
(1, 'Adalimumab', 'Pain killer', 2000, 'Kunle Ara Pharm Store', 'UCH, Ibadan', '908786543'),
(2, 'Insulin Glargine', 'Cancer', 1800, 'Oni & Son Pharmacy Ltd', 'Sango, Poly Junction', '01247896'),
(3, 'Paracentamol', 'For Headache and Body Pain', 500, 'JetPharm Store', 'Koloko area, Ibadan', '070987809'),
(4, 'Ibucap', 'for body pain and chest pain', 400, 'JetPharm Store', 'Koloko area, Ibadan', '070987809'),
(5, 'Chloraphenicol', 'for ear and eye pains', 1200, 'JetPharm Store', 'Koloko area, Ibadan', '070987809'),
(6, 'Ibuprofen', 'Body pain and joint pain', 700, 'JetPharm Store', 'Koloko area, Ibadan', '070987809');

-- --------------------------------------------------------

--
-- Table structure for table `tblpharmacy`
--

CREATE TABLE `tblpharmacy` (
  `pharmacyID` varchar(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `license` varchar(255) NOT NULL,
  `pharmacystore` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpharmacy`
--

INSERT INTO `tblpharmacy` (`pharmacyID`, `firstname`, `lastname`, `username`, `password`, `email`, `license`, `pharmacystore`, `phone`, `address`) VALUES
('PHY-1615', 'Oni', 'Babatunde', 'oni', 'UGFzc3dvcmQ=', 'oni1@g.com', 'PH675489', 'Oni & Son Pharmacy Ltd', '01247896', 'Sango, Poly Junction'),
('PHY-1734', 'Jet', 'Pharm', 'jet', 'cGFzc3dvcmQ=', 'jetpharm@gmail.com', 'LN12345', 'JetPharm Store', '070987809', 'Koloko area, Ibadan'),
('PHY-1802', 'Zakariya', 'Suleiman', 'Zaka', 'MTIzNDU2', 'Zaka@gmail.com', 'LI098765', 'Kunle Ara Pharm Store', '908786543', 'UCH, Ibadan');

-- --------------------------------------------------------

--
-- Table structure for table `tblselecteddrug`
--

CREATE TABLE `tblselecteddrug` (
  `drugID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `pharmacystore` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbluserlogin`
--

CREATE TABLE `tbluserlogin` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `pharmacyID` varchar(50) NOT NULL,
  `doctorID` varchar(50) NOT NULL,
  `activationStatus` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluserlogin`
--

INSERT INTO `tbluserlogin` (`ID`, `username`, `password`, `usertype`, `pharmacyID`, `doctorID`, `activationStatus`) VALUES
(0, 'oni', 'UGFzc3dvcmQ=', 'pharmacy', '', 'DEFAULT', b'1'),
(9, 'abdullah', 'cGFzc3dvcmQ=', 'doctor', 'Default', 'DR-1978', b'0'),
(14, 'Zaka', 'MTIzNDU2', 'pharmacy', 'PHY-1802', 'default', b'0'),
(15, 'jet', 'cGFzc3dvcmQ=', 'pharmacy', 'PHY-1734', 'default', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblapproveddrug`
--
ALTER TABLE `tblapproveddrug`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldoctor`
--
ALTER TABLE `tbldoctor`
  ADD PRIMARY KEY (`doctorID`);

--
-- Indexes for table `tbldrug`
--
ALTER TABLE `tbldrug`
  ADD PRIMARY KEY (`drugID`);

--
-- Indexes for table `tblpharmacy`
--
ALTER TABLE `tblpharmacy`
  ADD PRIMARY KEY (`pharmacyID`);

--
-- Indexes for table `tblselecteddrug`
--
ALTER TABLE `tblselecteddrug`
  ADD PRIMARY KEY (`drugID`);

--
-- Indexes for table `tbluserlogin`
--
ALTER TABLE `tbluserlogin`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbldrug`
--
ALTER TABLE `tbldrug`
  MODIFY `drugID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblselecteddrug`
--
ALTER TABLE `tblselecteddrug`
  MODIFY `drugID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluserlogin`
--
ALTER TABLE `tbluserlogin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
