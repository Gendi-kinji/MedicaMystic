-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2023 at 04:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_drug_dispense`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admins`
--

CREATE TABLE `tbl_admins` (
  `admin_id` int(15) UNSIGNED NOT NULL,
  `admin_name` varchar(45) NOT NULL,
  `admin_email` varchar(45) NOT NULL,
  `admin_pass` varchar(80) NOT NULL,
  `admin_reg_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admins`
--

INSERT INTO `tbl_admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_reg_date`) VALUES
(1, 'admin1', 'admin1@dispensary.com', '$2y$10$33KL6k1f0ngVIkPgkEP99.u6JV.ZhHV91yT5RNJ7gvvfBRkv10Sf.', '2023-06-27 07:22:14.914392'),
(2, 'admin2', 'admin2@gmail.com', '$2y$10$ry1xN4LpSTcJ.HbCgkIQNOuBaSxf/Uxdkt4hBtb4MKEyP44Zsq3Li', '2023-06-27 07:41:01.633347');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctors`
--

CREATE TABLE `tbl_doctors` (
  `doctor_ssn` int(15) UNSIGNED NOT NULL,
  `doctor_firstname` varchar(60) NOT NULL,
  `doctor_surname` varchar(60) NOT NULL,
  `doctor_dob` date NOT NULL,
  `doctor_address` varchar(150) NOT NULL,
  `doctor_email` varchar(40) NOT NULL,
  `years_of_exp` int(3) UNSIGNED NOT NULL,
  `doctor_phone` varchar(15) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_doctors`
--

INSERT INTO `tbl_doctors` (`doctor_ssn`, `doctor_firstname`, `doctor_surname`, `doctor_dob`, `doctor_address`, `doctor_email`, `years_of_exp`, `doctor_phone`, `reg_date`) VALUES
(3, 'Jane', 'Leo', '1998-06-08', '10100 - Nairobi, Kenya', 'janejuzi@gmail.com', 7, '+254799999999', '2023-06-17'),
(4, 'Yohanoy', 'Aweza', '1985-07-09', '10100 - Nairobi, Kenya', 'yoweza@gmail.com', 10, '+254777777777', '2023-06-17'),
(5, 'Bean', 'Bradson', '1978-09-20', '10100 - Nairobi, Kenya', 'beanson@gmail.com', 31, '+254711111111', '2023-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drugs`
--

CREATE TABLE `tbl_drugs` (
  `drug_id` int(9) UNSIGNED NOT NULL,
  `trade_name` varchar(30) NOT NULL,
  `drug_formula` varchar(30) NOT NULL,
  `administration_method` varchar(30) NOT NULL,
  `dosage_mg` int(10) UNSIGNED NOT NULL,
  `drug_quantity` int(15) UNSIGNED NOT NULL,
  `drug_price` float(10,2) UNSIGNED NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_drugs`
--

INSERT INTO `tbl_drugs` (`drug_id`, `trade_name`, `drug_formula`, `administration_method`, `dosage_mg`, `drug_quantity`, `drug_price`, `expiry_date`) VALUES
(7, 'Lipitor', 'Atorvastatin', 'Orally (tablets)', 200, 500, 300.00, '2027-12-20'),
(8, 'Dilantin', 'phenytoin', 'Orally', 150, 300, 250.00, '2027-09-13'),
(9, 'Dilantino', 'phenytoin', 'Orally (Mdomoni)', 35, 150, 250.00, '2027-09-29'),
(11, 'Drug E', 'Piperidine', 'Transdermal', 35, 50, 250.00, '2025-01-01'),
(12, 'Drug D', 'Methylene Blue', 'Inhalation', 25, 15, 230.00, '2025-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `invoice_id` int(15) NOT NULL,
  `patient_ssn` int(15) NOT NULL,
  `invoice_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`invoice_id`, `patient_ssn`, `invoice_date`) VALUES
(5, 7, '2023-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_items`
--

CREATE TABLE `tbl_invoice_items` (
  `item_id` int(15) NOT NULL,
  `invoice_id` int(15) NOT NULL,
  `drug_id` int(15) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total_price` float(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_invoice_items`
--

INSERT INTO `tbl_invoice_items` (`item_id`, `invoice_id`, `drug_id`, `quantity`, `total_price`) VALUES
(1, 5, 7, 1, 300.00),
(2, 5, 11, 7, 1750.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patients`
--

CREATE TABLE `tbl_patients` (
  `patient_ssn` int(9) UNSIGNED NOT NULL,
  `patient_firstname` varchar(30) NOT NULL,
  `patient_surname` varchar(30) NOT NULL,
  `patient_dob` date NOT NULL,
  `patient_address` varchar(60) NOT NULL,
  `patient_email` varchar(50) NOT NULL,
  `patient_phone` varchar(13) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_patients`
--

INSERT INTO `tbl_patients` (`patient_ssn`, `patient_firstname`, `patient_surname`, `patient_dob`, `patient_address`, `patient_email`, `patient_phone`, `reg_date`) VALUES
(1, 'Derrick', 'Dawson', '1987-10-08', '00200 - Nairobi, Kenya', 'doe002@gmail.com', '+254712345678', '2023-06-26 08:36:14'),
(3, 'Fred', 'Frederico', '0000-00-00', '10100 - Nyeri, Kenya', 'fredico23@yahoo.com', '+255347294058', '2023-05-17 05:34:02'),
(5, 'Johnson', 'Jericho', '0000-00-00', '10100 - Nairobi, Kenya', 'jjericho@gmail.com', '+255454545454', '2023-05-28 16:41:54'),
(7, 'Ben', 'Benson', '0000-00-00', '10100 - Nairobi, Kenya', 'bennison@gmail.com', '+254000001234', '2023-05-30 17:01:59'),
(8, 'Yani', 'Akaja', '0000-00-00', '00100 - Nairobi, Kenya', 'yakaja003@gmail.com', '+254712999999', '2023-05-30 17:15:27'),
(18, 'Joash', 'Tembo', '1996-06-20', '00100 - Nairobi, Kenya', 'tembojoash@gmail.com', '+254712333333', '2023-05-31 05:32:47'),
(19, 'Alpha', 'Kamau', '1975-09-17', '12345 - Townsville, Contryside', 'kamau.alpha@gmail.com', '+254577777777', '2023-06-01 10:56:52'),
(20, 'Musa', 'Juma', '2003-05-06', '10100 - Nairobi, Kenya', 'musajuma07@gmail.com', '+255343434343', '2023-06-08 06:18:58'),
(21, 'Fidel', 'Agade', '2000-10-12', '10100 - Nairobi, Kenya', 'fidel@gmail.com', '+255333333337', '2023-06-26 08:36:41'),
(22, 'Fidel', 'Isaboke', '2023-06-07', '10100 - Nairobi, Kenya', 'fidelagadeisaboke@gmail.com', '+255333333437', '2023-06-27 11:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pharmaceutical`
--

CREATE TABLE `tbl_pharmaceutical` (
  `company_id` int(15) UNSIGNED NOT NULL,
  `company_name` varchar(65) NOT NULL,
  `company_address` varchar(150) NOT NULL,
  `company_phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pharmaceutical`
--

INSERT INTO `tbl_pharmaceutical` (`company_id`, `company_name`, `company_address`, `company_phone`) VALUES
(1, 'Uchawe Pharmaceuticals', '10100 - Nairobi, Kenya', '+254101010101');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pharmacy`
--

CREATE TABLE `tbl_pharmacy` (
  `pharmacy_id` int(15) NOT NULL,
  `pharmacy_name` varchar(65) NOT NULL,
  `pharmacy_address` varchar(150) NOT NULL,
  `pharmacy_phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pharmacy`
--

INSERT INTO `tbl_pharmacy` (`pharmacy_id`, `pharmacy_name`, `pharmacy_address`, `pharmacy_phone`) VALUES
(1, 'Wacha Chemists', '10100 - Nairobi, Kenya', '+25530303030');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supervisors`
--

CREATE TABLE `tbl_supervisors` (
  `supervisor_id` int(15) NOT NULL,
  `supervisor_firstname` varchar(40) NOT NULL,
  `supervisor_lastname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_supervisors`
--

INSERT INTO `tbl_supervisors` (`supervisor_id`, `supervisor_firstname`, `supervisor_lastname`) VALUES
(1, 'Joshi', 'Bomboa'),
(2, 'Fidel', 'Agade'),
(3, 'Fidel', 'Agade');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_type` varchar(40) NOT NULL,
  `user_pass` varchar(80) NOT NULL,
  `user_reg_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_type`, `user_pass`, `user_reg_date`) VALUES
(20, 'fidel', 'fidel@gmail.com', 'supervisor', '$2y$10$IfEn8ZCQeSFwehO083OsZeOgUmrBL27Lgnf6Gk9U6EewOPmBN08E2', '2023-06-27 07:13:45.841654'),
(21, 'George', 'george@gmail.com', 'doctor', '$2y$10$S3xqOgnuaO6lIxyB75HBuusubFfgtUh1z2Al59XBs59ojA69Tb0XC', '2023-06-27 07:13:45.841654'),
(22, 'alvin', 'alvin@gmail.com', 'doctor', '$2y$10$pHSImATapTDld2OHntS7bOiZKuicG5KBq1CADFQOKH3kA1BtkqOsa', '2023-06-27 07:13:45.841654'),
(23, 'Melvin', 'melvin@gmail.com', 'doctor', '$2y$10$deUj7UxYhuQ3Cm31JOKZLOR9leAcBaCZTp5Vd0dkOk4tdWBdcvvDS', '2023-07-11 08:45:55.302860'),
(24, 'Fidelagade', 'agadeisaboke@gmail.com', 'pharmaceutical_company', '$2y$10$JZ3/0k/V/xEadQw/bVEj2.SKRnGXjPLvAilgh7dVUNsxIajVbKz0i', '2023-07-11 10:21:39.679725'),
(25, 'pharmacy1', 'pharmacy1@email.com', 'pharmacist', '$2y$10$.imyo2JkfYejyDA.dEYBQ.XYZjdg0HTwhOeESeRVfs8S38p.dUj02', '2023-07-18 13:31:24.455660');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `UNIQUE_ADMIN_NAME` (`admin_name`),
  ADD UNIQUE KEY `UNIQUE_ADMIN_EMAIL` (`admin_email`);

--
-- Indexes for table `tbl_doctors`
--
ALTER TABLE `tbl_doctors`
  ADD PRIMARY KEY (`doctor_ssn`);

--
-- Indexes for table `tbl_drugs`
--
ALTER TABLE `tbl_drugs`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `tbl_invoice_items`
--
ALTER TABLE `tbl_invoice_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  ADD PRIMARY KEY (`patient_ssn`),
  ADD UNIQUE KEY `patient_email` (`patient_email`,`patient_phone`);

--
-- Indexes for table `tbl_pharmaceutical`
--
ALTER TABLE `tbl_pharmaceutical`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `unique_company_name` (`company_name`);

--
-- Indexes for table `tbl_pharmacy`
--
ALTER TABLE `tbl_pharmacy`
  ADD PRIMARY KEY (`pharmacy_id`),
  ADD UNIQUE KEY `unique_company_name` (`pharmacy_name`);

--
-- Indexes for table `tbl_supervisors`
--
ALTER TABLE `tbl_supervisors`
  ADD PRIMARY KEY (`supervisor_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  MODIFY `admin_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_doctors`
--
ALTER TABLE `tbl_doctors`
  MODIFY `doctor_ssn` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_drugs`
--
ALTER TABLE `tbl_drugs`
  MODIFY `drug_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `invoice_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_invoice_items`
--
ALTER TABLE `tbl_invoice_items`
  MODIFY `item_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  MODIFY `patient_ssn` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_pharmaceutical`
--
ALTER TABLE `tbl_pharmaceutical`
  MODIFY `company_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pharmacy`
--
ALTER TABLE `tbl_pharmacy`
  MODIFY `pharmacy_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_supervisors`
--
ALTER TABLE `tbl_supervisors`
  MODIFY `supervisor_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
