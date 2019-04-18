-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 12, 2019 at 01:53 PM
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
  `comp_type` enum('client','fournisseur') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `comp_name`, `country`, `vat_number`, `creation_date`, `comp_type`) VALUES
(5, 'BeCode', 'Belgique', 'BE0664802168', '2019-01-24 09:07:00', 'client'),
(6, 'Atoma', 'Belgique', 'BE0403523859', '2019-01-24 09:22:00', 'fournisseur'),
(7, 'Google', 'France', 'FR79799769987', '2019-02-14 13:12:00', 'client'),
(8, 'Eat Well', 'Belgique', 'BE0823234743', '2019-02-25 00:00:00', 'fournisseur'),
(9, 'Père-Noël', 'Islande', 'IS0679224821', '2019-03-06 09:16:00', 'fournisseur'),
(49, 'dsfs', 'France', 'DE34561234567', '2019-04-12 15:19:57', 'client');

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
  `company_id_company` int(11) NOT NULL,
  `Telephone` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

-- INSERT INTO `contacts` (`id_contacts`, `last_name`, `first_name`, `creation_date`, `mail`, `company_id_company`, `Telephone`) VALUES
-- (5, 'Flabat', 'Kevin', '2019-01-24 09:08:00', 'kevin.flabat@becode.com', 5, '+32487 44 80 49'),
-- (6, 'Favier', 'Sophie', '2019-01-24 09:26:00', 'soso.favier@atoma.be', 6, '+3223432887'),
-- (7, 'Page', 'Larry ', '2019-02-14 13:16:00', 'larry.p@gmail.com', 7, '+330811640017'),
-- (8, 'Brin', 'Sergey', '2019-02-14 13:28:00', 'brin.s@gmail.com', 7, '+330811640022'),
-- (9, 'Père', 'Noël', '2019-03-06 16:13:00', 'père_noël@cerfs.com', 9, '+35405639876128899'),
-- (10, 'Sunny', 'Sun', '2019-02-25 18:12:00', 'sunny@eatwell.be', 8, '+3224376595');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `invoice_numb` int(11) DEFAULT NULL,
  `invoiced_date` date DEFAULT NULL,
  `service_date` date DEFAULT NULL,
  `contacts_id_contacts` int(11) NOT NULL,
  `company_id_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `invoice_numb`, `invoiced_date`, `service_date`, `contacts_id_contacts`, `company_id_company`) VALUES
(2, 2019001, '2019-01-28', '2019-01-25', 5, 5),
(3, 2019002, '2019-01-28', '2019-04-28', 6, 6),
(4, 2019003, '2019-02-19', '2019-02-17', 7, 7),
(5, 2009004, '2019-02-27', '2019-03-26', 10, 8),
(6, 2019005, '2019-03-07', '2019-03-06', 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `mdp` varchar(250) DEFAULT NULL,
  `mail` varchar(250) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `token` varchar(250) DEFAULT NULL,
  `level` enum('godmode','modo','viewer') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `mdp`, `mail`, `last_name`, `first_name`, `token`, `level`) VALUES
(4, '$2y$10$FE0yhnLC5hU7727ggyHViOO3EyNtPgSDhIsmvACH5/idRlqNqhsLC', 'jean-christian.ranu@cogip.com', 'Ranu', 'Jean-Christian', NULL, 'godmode'),
(5, '$2y$10$G6JzAIoi4fylPWDTD3FoMuiI8BTWWwT5S.8auC1pTvt51i9IYUk/i', 'muriel.perrache@cogip.com', 'Perrache', 'Muriel', NULL, 'modo'),
(6, '$2y$10$KHhcpt6z.o6.V0GrSmb7Uu4/QEUXQAOGWJjFoUEVfjKqtSNI6Nfwm', 'elvis.presley@cogip.com', 'Presley', 'Elvis', NULL, 'viewer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id_contacts`),
  ADD KEY `fk_contacts_company1_idx` (`company_id_company`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `fk_invoice_contacts1_idx` (`contacts_id_contacts`),
  ADD KEY `fk_invoice_company1_idx` (`company_id_company`);

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
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id_contacts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `fk_contacts_company1` FOREIGN KEY (`company_id_company`) REFERENCES `company` (`id_company`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoice`
--
-- ALTER TABLE `invoice`
--   ADD CONSTRAINT `fk_invoice_company1` FOREIGN KEY (`company_id_company`) REFERENCES `company` (`id_company`) ON DELETE NO ACTION ON UPDATE NO ACTION,
--   ADD CONSTRAINT `fk_invoice_contacts1` FOREIGN KEY (`contacts_id_contacts`) REFERENCES `contacts` (`id_contacts`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
