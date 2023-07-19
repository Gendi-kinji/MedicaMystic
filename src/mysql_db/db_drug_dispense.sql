-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 04:38 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `invoice_id` int(15) NOT NULL,
  `prescription_id` int(15) NOT NULL,
  `invoice_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_items`
--

CREATE TABLE `tbl_invoice_items` (
  `invoice_item_id` int(15) NOT NULL,
  `invoice_id` int(15) NOT NULL,
  `drug_id` int(15) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total_price` float(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescriptions`
--

CREATE TABLE `tbl_prescriptions` (
  `prescription_id` int(15) UNSIGNED NOT NULL,
  `patient_ssn` int(15) UNSIGNED NOT NULL,
  `presc_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescription_items`
--

CREATE TABLE `tbl_prescription_items` (
  `presc_item_id` int(15) UNSIGNED NOT NULL,
  `prescription_id` int(15) UNSIGNED NOT NULL,
  `quantity` int(15) UNSIGNED NOT NULL,
  `dosage_schedule` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supervisors`
--

CREATE TABLE `tbl_supervisors` (
  `supervisor_id` int(15) NOT NULL,
  `supervisor_firstname` varchar(40) NOT NULL,
  `supervisor_lastname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD PRIMARY KEY (`invoice_item_id`);

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
-- Indexes for table `tbl_prescriptions`
--
ALTER TABLE `tbl_prescriptions`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `tbl_prescription_items`
--
ALTER TABLE `tbl_prescription_items`
  ADD PRIMARY KEY (`presc_item_id`);

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
  MODIFY `invoice_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_invoice_items`
--
ALTER TABLE `tbl_invoice_items`
  MODIFY `invoice_item_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `tbl_prescriptions`
--
ALTER TABLE `tbl_prescriptions`
  MODIFY `prescription_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_prescription_items`
--
ALTER TABLE `tbl_prescription_items`
  MODIFY `presc_item_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_supervisors`
--
ALTER TABLE `tbl_supervisors`
  MODIFY `supervisor_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
