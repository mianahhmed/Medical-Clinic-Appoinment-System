CREATE DATABASE IF NOT EXISTS `medical_clinic`;
USE `medical_clinic`;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2025 at 02:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `Mail` varchar(100) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Mail`, `Password`) VALUES
(11, 'admin01@system.com', 'pass0011');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `AppointmentID` int(11) NOT NULL,
  `AdminID` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `Type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`AppointmentID`, `AdminID`, `Date`, `Time`, `Status`, `PatientID`, `DoctorID`, `Type`) VALUES
(1001, 11, '2025-07-01', '10:00:00', 'Completed', 111, 2001, 'In-Person'),
(1002, 11, '2025-06-30', '10:30:00', 'Canceled', 112, 2003, 'In-Person'),
(1003, 11, '2025-07-01', '11:30:00', 'Completed', 113, 2004, 'Online'),
(1004, 11, '2025-07-10', '02:00:00', 'Pending', 114, 2005, 'In-Person'),
(1005, 11, '2025-07-01', '01:00:00', 'Completed', 115, 2006, 'In-Person'),
(1006, 11, '2025-07-07', '03:30:00', 'Completed', 116, 2007, 'Online'),
(1007, 11, '2025-07-07', '03:30:00', 'Canceled', 117, 2008, 'In-Person'),
(1008, 11, '2025-07-16', '12:15:00', 'Pending', 118, 2007, 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `DoctorID` int(11) NOT NULL,
  `AdminID` int(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Specialty` varchar(100) DEFAULT NULL,
  `Mail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`DoctorID`, `AdminID`, `Name`, `Specialty`, `Mail`) VALUES
(2001, 11, 'Dr Ahmad Farooq', 'Cardiologist', 'drahmadfarooq@gmail.com'),
(2002, 11, 'Dr Mushtaq Bajwa', 'Orthopedic Surgeon', 'drmushtaqbajwa@gmail.com'),
(2003, 11, 'Dr Hasan Altaf', 'Dentist', 'drhasanaltaf@gmail.com'),
(2004, 11, 'Dr Sultana Dar', 'General Physician', 'drsultanadar@gmail.com'),
(2005, 11, 'Dr Hannan Ahmad', 'Dermatologist', 'drhannanahmad@gmail.com'),
(2006, 11, 'Dr Aisha Rahman', 'Physiotherapist', 'draisharahman@gmail.com'),
(2007, 11, 'Dr Burhan Mubashir', 'Neuro Surgeon', 'drburhanmubashir@gmail.com'),
(2008, 11, 'Dr Suleman Habib', 'Gastrologist', 'drsulemanhabib@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `PatientID` int(11) NOT NULL,
  `AdminID` int(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Address` varchar(300) DEFAULT NULL,
  `Contact` varchar(300) DEFAULT NULL,
  `Mail` varchar(200) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PatientID`, `AdminID`, `Name`, `Gender`, `Age`, `Address`, `Contact`, `Mail`, `Password`) VALUES
(111, 11, 'Momena Tanveer', 'Female', 21, 'Johar town-Lahore', '03256892946', 'momena@gmail.com', 'momena123'),
(112, 11, 'Ghous Jamil', 'Male', 47, 'Sialkot road-Gujranwala', '03456729456', 'jamil1@hotmail.com', 'jamil456'),
(113, 11, 'Ahmed Raza', 'Male', 32, 'Johar town-Lahore', '03267194528', 'ahmedraza@gmail.com', 'raza987'),
(114, 11, 'Zainab Arif', 'Female', 19, 'DHA phase 2-Lahore', '03116483589', 'zainab@yahoo.com', 'zainab369'),
(115, 11, 'Shumaila Faisal', 'Female', 51, 'Sialkot', '03285241748', 'shumilaFaisal@gmail.com', 'shumaila222'),
(116, 11, 'Arham Butt', 'Male', 10, 'Jehlum', '03214583526', 'arham@hotmail.com', 'butt009'),
(117, 11, 'Bushra Ansari', 'Female', 64, 'Wazirabad', '03361749553', 'bushra@hotmail.com', 'bushra777'),
(118, 11, 'Ali Mirza', 'Male', 33, 'Ratta Road-Gujranwala', '03451437597', 'mirza1@yahoo.com', 'mirza109');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `AdminID` int(11) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `AppointmentID` int(11) DEFAULT NULL,
  `PatientID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `AdminID`, `Amount`, `Date`, `Status`, `AppointmentID`, `PatientID`) VALUES
(3000, 11, 2000, '2025-07-01', 'Paid', 1001, 111),
(3001, 11, 2000, '2025-07-01', 'Paid', 1003, 113),
(3002, 11, 2000, '2025-07-10', 'Pending', 1004, 114),
(3003, 11, 2000, '2025-07-01', 'Paid', 1005, 115),
(3004, 11, 2000, '2025-07-07', 'Paid', 1006, 116),
(3005, 11, 2000, '2025-07-16', 'Pending', 1008, 118);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `AdminID` (`AdminID`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `DoctorID` (`DoctorID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`DoctorID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`PatientID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `AdminID` (`AdminID`),
  ADD KEY `AppointmentID` (`AppointmentID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `DoctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2009;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `PatientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3006;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`),
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`DoctorID`) REFERENCES `doctor` (`DoctorID`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`AppointmentID`) REFERENCES `appointment` (`AppointmentID`),
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
