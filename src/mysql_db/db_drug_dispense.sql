-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 07:54 PM
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
  `user_id` int(15) UNSIGNED NOT NULL,
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
  `drug_category` varchar(30) NOT NULL,
  `administration_method` varchar(30) NOT NULL,
  `dosage_mg` int(10) UNSIGNED NOT NULL,
  `drug_quantity` int(15) UNSIGNED NOT NULL,
  `drug_price` float(10,2) UNSIGNED NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drug_images`
--

CREATE TABLE `tbl_drug_images` (
  `drug_img_id` int(15) UNSIGNED NOT NULL,
  `drug_id` int(9) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `invoice_id` int(15) UNSIGNED NOT NULL,
  `prescription_id` int(15) UNSIGNED NOT NULL,
  `invoice_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_items`
--

CREATE TABLE `tbl_invoice_items` (
  `invoice_item_id` int(15) UNSIGNED NOT NULL,
  `invoice_id` int(15) UNSIGNED NOT NULL,
  `drug_id` int(15) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `total_price` float(15,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patients`
--

CREATE TABLE `tbl_patients` (
  `patient_ssn` int(15) UNSIGNED NOT NULL,
  `user_id` int(15) UNSIGNED NOT NULL,
  `patient_firstname` varchar(30) NOT NULL,
  `patient_surname` varchar(30) NOT NULL,
  `patient_dob` date NOT NULL,
  `patient_address` varchar(60) NOT NULL,
  `patient_email` varchar(50) NOT NULL,
  `patient_phone` varchar(13) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pharmaceutical`
--

CREATE TABLE `tbl_pharmaceutical` (
  `company_id` int(15) UNSIGNED NOT NULL,
  `user_id` int(15) UNSIGNED NOT NULL,
  `company_name` varchar(65) NOT NULL,
  `company_address` varchar(150) NOT NULL,
  `company_phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pharmacy`
--

CREATE TABLE `tbl_pharmacy` (
  `pharmacy_id` int(15) UNSIGNED NOT NULL,
  `user_id` int(15) UNSIGNED NOT NULL,
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
  `drug_id` int(15) UNSIGNED NOT NULL,
  `quantity` int(15) UNSIGNED NOT NULL,
  `dosage_schedule` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supervisors`
--

CREATE TABLE `tbl_supervisors` (
  `supervisor_id` int(15) UNSIGNED NOT NULL,
  `user_id` int(15) UNSIGNED DEFAULT NULL,
  `pharmacy_id` int(15) UNSIGNED DEFAULT NULL,
  `supervisor_firstname` varchar(40) NOT NULL,
  `supervisor_lastname` varchar(40) NOT NULL,
  `supervisor_phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(15) UNSIGNED NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_type` varchar(40) NOT NULL,
  `user_pass` varchar(80) NOT NULL,
  `user_reg_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_invoices`
-- (See below for the actual view)
--
CREATE TABLE `view_invoices` (
`invoice_id` int(15) unsigned
,`prescription_id` int(15) unsigned
,`invoice_date` date
,`invoice_item_id` int(15) unsigned
,`drug_id` int(15) unsigned
,`quantity` int(10) unsigned
,`total_price` float(15,2) unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_prescriptions`
-- (See below for the actual view)
--
CREATE TABLE `view_prescriptions` (
`prescription_id` int(15) unsigned
,`patient_ssn` int(15) unsigned
,`presc_date` date
,`presc_item_id` int(15) unsigned
,`drug_id` int(15) unsigned
,`quantity` int(15) unsigned
,`dosage_schedule` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `view_invoices`
--
DROP TABLE IF EXISTS `view_invoices`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_invoices`  AS SELECT `i`.`invoice_id` AS `invoice_id`, `i`.`prescription_id` AS `prescription_id`, `i`.`invoice_date` AS `invoice_date`, `ii`.`invoice_item_id` AS `invoice_item_id`, `ii`.`drug_id` AS `drug_id`, `ii`.`quantity` AS `quantity`, `ii`.`total_price` AS `total_price` FROM (`tbl_invoice` `i` join `tbl_invoice_items` `ii` on(`i`.`invoice_id` = `ii`.`invoice_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_prescriptions`
--
DROP TABLE IF EXISTS `view_prescriptions`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_prescriptions`  AS SELECT `p`.`prescription_id` AS `prescription_id`, `p`.`patient_ssn` AS `patient_ssn`, `p`.`presc_date` AS `presc_date`, `pi`.`presc_item_id` AS `presc_item_id`, `pi`.`drug_id` AS `drug_id`, `pi`.`quantity` AS `quantity`, `pi`.`dosage_schedule` AS `dosage_schedule` FROM (`tbl_prescriptions` `p` join `tbl_prescription_items` `pi` on(`p`.`prescription_id` = `pi`.`prescription_id`)) ;

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
  ADD PRIMARY KEY (`doctor_ssn`),
  ADD KEY `tbl_doctors_ibfk_1` (`user_id`);

--
-- Indexes for table `tbl_drugs`
--
ALTER TABLE `tbl_drugs`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `tbl_drug_images`
--
ALTER TABLE `tbl_drug_images`
  ADD PRIMARY KEY (`drug_img_id`),
  ADD UNIQUE KEY `image` (`image`) USING HASH;

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `prescription_id` (`prescription_id`);

--
-- Indexes for table `tbl_invoice_items`
--
ALTER TABLE `tbl_invoice_items`
  ADD PRIMARY KEY (`invoice_item_id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  ADD PRIMARY KEY (`patient_ssn`),
  ADD UNIQUE KEY `patient_email` (`patient_email`,`patient_phone`),
  ADD KEY `tbl_patients_ibfk_1` (`user_id`);

--
-- Indexes for table `tbl_pharmaceutical`
--
ALTER TABLE `tbl_pharmaceutical`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `unique_company_name` (`company_name`),
  ADD KEY `tbl_pharmaceutical_ibfk_1` (`user_id`);

--
-- Indexes for table `tbl_pharmacy`
--
ALTER TABLE `tbl_pharmacy`
  ADD PRIMARY KEY (`pharmacy_id`),
  ADD UNIQUE KEY `unique_company_name` (`pharmacy_name`),
  ADD KEY `tbl_pharmacy_ibfk_1` (`user_id`);

--
-- Indexes for table `tbl_prescriptions`
--
ALTER TABLE `tbl_prescriptions`
  ADD PRIMARY KEY (`prescription_id`),
  ADD KEY `patient_ssn` (`patient_ssn`);

--
-- Indexes for table `tbl_prescription_items`
--
ALTER TABLE `tbl_prescription_items`
  ADD PRIMARY KEY (`presc_item_id`),
  ADD KEY `drug_id` (`drug_id`),
  ADD KEY `prescription_id` (`prescription_id`);

--
-- Indexes for table `tbl_supervisors`
--
ALTER TABLE `tbl_supervisors`
  ADD PRIMARY KEY (`supervisor_id`),
  ADD KEY `pharmacy_id` (`pharmacy_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `admin_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_doctors`
--
ALTER TABLE `tbl_doctors`
  MODIFY `doctor_ssn` int(15) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_drugs`
--
ALTER TABLE `tbl_drugs`
  MODIFY `drug_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_drug_images`
--
ALTER TABLE `tbl_drug_images`
  MODIFY `drug_img_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `invoice_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_invoice_items`
--
ALTER TABLE `tbl_invoice_items`
  MODIFY `invoice_item_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  MODIFY `patient_ssn` int(15) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pharmaceutical`
--
ALTER TABLE `tbl_pharmaceutical`
  MODIFY `company_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pharmacy`
--
ALTER TABLE `tbl_pharmacy`
  MODIFY `pharmacy_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_prescriptions`
--
ALTER TABLE `tbl_prescriptions`
  MODIFY `prescription_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_prescription_items`
--
ALTER TABLE `tbl_prescription_items`
  MODIFY `presc_item_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_supervisors`
--
ALTER TABLE `tbl_supervisors`
  MODIFY `supervisor_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_doctors`
--
ALTER TABLE `tbl_doctors`
  ADD CONSTRAINT `tbl_doctors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD CONSTRAINT `tbl_invoice_ibfk_1` FOREIGN KEY (`prescription_id`) REFERENCES `tbl_prescriptions` (`prescription_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_invoice_items`
--
ALTER TABLE `tbl_invoice_items`
  ADD CONSTRAINT `tbl_invoice_items_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `tbl_invoice` (`invoice_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  ADD CONSTRAINT `tbl_patients_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pharmaceutical`
--
ALTER TABLE `tbl_pharmaceutical`
  ADD CONSTRAINT `tbl_pharmaceutical_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pharmacy`
--
ALTER TABLE `tbl_pharmacy`
  ADD CONSTRAINT `tbl_pharmacy_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_prescriptions`
--
ALTER TABLE `tbl_prescriptions`
  ADD CONSTRAINT `tbl_prescriptions_ibfk_1` FOREIGN KEY (`patient_ssn`) REFERENCES `tbl_patients` (`patient_ssn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_prescription_items`
--
ALTER TABLE `tbl_prescription_items`
  ADD CONSTRAINT `tbl_prescription_items_ibfk_1` FOREIGN KEY (`drug_id`) REFERENCES `tbl_drugs` (`drug_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_prescription_items_ibfk_2` FOREIGN KEY (`prescription_id`) REFERENCES `tbl_prescriptions` (`prescription_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_supervisors`
--
ALTER TABLE `tbl_supervisors`
  ADD CONSTRAINT `tbl_supervisors_ibfk_1` FOREIGN KEY (`pharmacy_id`) REFERENCES `tbl_pharmacy` (`pharmacy_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_supervisors_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
