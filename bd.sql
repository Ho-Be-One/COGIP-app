-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 08, 2019 at 01:56 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cogip`
--
CREATE DATABASE IF NOT EXISTS `cogip` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cogip`;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `comp_name` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `vat_number` varchar(45) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `contacts_id_contacts` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id_contacts` int(11) NOT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `invoiced_date` date DEFAULT NULL,
  `service_date` date DEFAULT NULL,
  `company_id_company` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `type_comp` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `type_has_company`
--

CREATE TABLE `type_has_company` (
  `type_id_type` int(11) NOT NULL,
  `company_id_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `login` varchar(45) DEFAULT NULL,
  `mdp` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `token` varchar(250) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`),
  ADD KEY `fk_company_users2_idx` (`created_by`),
  ADD KEY `fk_company_contacts1_idx` (`contacts_id_contacts`),
  ADD KEY `fk_company_users1_idx` (`updated_by`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id_contacts`),
  ADD KEY `fk_contacts_users1_idx` (`created_by`),
  ADD KEY `fk_contacts_users2_idx` (`updated_by`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `fk_invoice_company1_idx` (`company_id_company`),
  ADD KEY `fk_invoice_users1_idx` (`updated_by`),
  ADD KEY `fk_invoice_users2_idx` (`created_by`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `type_has_company`
--
ALTER TABLE `type_has_company`
  ADD PRIMARY KEY (`type_id_type`,`company_id_company`),
  ADD KEY `fk_type_has_company_company1_idx` (`company_id_company`),
  ADD KEY `fk_type_has_company_type_idx` (`type_id_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id_contacts` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `fk_company_contacts1` FOREIGN KEY (`contacts_id_contacts`) REFERENCES `contacts` (`id_contacts`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_company_users1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_company_users2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `fk_contacts_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contacts_users2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fk_invoice_company1` FOREIGN KEY (`company_id_company`) REFERENCES `company` (`id_company`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invoice_users1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invoice_users2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `type_has_company`
--
ALTER TABLE `type_has_company`
  ADD CONSTRAINT `fk_type_has_company_company1` FOREIGN KEY (`company_id_company`) REFERENCES `company` (`id_company`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_type_has_company_type` FOREIGN KEY (`type_id_type`) REFERENCES `type` (`id_type`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;