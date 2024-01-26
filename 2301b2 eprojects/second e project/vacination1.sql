-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 01:07 PM
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
-- Database: `vacination1`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminregister`
--

CREATE TABLE `adminregister` (
  `id` int(11) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminregister`
--

INSERT INTO `adminregister` (`id`, `picture`, `name`, `email`, `password`) VALUES
(14, 'uploads/doctor-08.jpg', 'MOHSIN ', 'admin@gmail.com', '$2y$10$mFoHWgL7w8ODfVf8aWKafuCidP0a9olpfPBqqJyaw.M82sA2mXAZO');

-- --------------------------------------------------------

--
-- Table structure for table `contact us`
--

CREATE TABLE `contact us` (
  `id` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Suggestions` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact us`
--

INSERT INTO `contact us` (`id`, `Name`, `Email`, `Suggestions`) VALUES
(1, 'mohsin', 'mohsin@gmail.com', 'GJKHN/');

-- --------------------------------------------------------

--
-- Table structure for table `hospitalregister`
--

CREATE TABLE `hospitalregister` (
  `id` int(11) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `Hospitalname` varchar(300) NOT NULL,
  `Hospital city` varchar(200) NOT NULL,
  `Hospitallocation` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `verification` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospitalregister`
--

INSERT INTO `hospitalregister` (`id`, `picture`, `Hospitalname`, `Hospital city`, `Hospitallocation`, `email`, `password`, `verification`) VALUES
(79, 'h1.jpeg', 'Mayo Clinic Hospital', 'Rochester', 'Minnesota', 'info@mayo.edu', '$2y$10$0pYVtsuokFdB3.kYowjHKuL5jgT.cQ6E2F298y9t9JSILpRoYDcKC', 'not verified by admin'),
(80, 'h2.jpeg', 'Johns Hopkins Hospital ', 'Baltimore', 'Maryland', 'JHHcontact@jhmi.edu', '$2y$10$aCSHkY2.QngGtSYjRW1B1uw79sSkTo2S.3eoS8wNVBltmF6vg4cae', 'verified'),
(81, 'h3.jpeg', 'Massachusetts General Hospital', 'Boston', 'Massachusetts', 'mgh@partners.org', '$2y$10$5.xHDyGi5XK5sOFuNXYNkuJ1twzxMzxZRvBUaAcfNoeJJQXrcQ09S', 'verified'),
(82, 'h4.jpeg', 'Cleveland Clinic', 'Cleveland', 'Ohio', 'contact@ccf.org', '$2y$10$ZcAkQFLlIh5cVqrZ0HvfzOzMnWJ82WDfMDbvUYRytIHR9FW2HnlUy', 'verified'),
(83, 'h6.jpg', 'Stanford Health Care', 'Stanford', 'California', 'contactus@stanfordhealthcare.org', '$2y$10$0VSO.CWS8y2bV2AzG8MmzurMGLsoPej/wpM1ekQKZ4FT.TOFp6Sma', 'verified'),
(84, 'h7.jpg', 'Mount Sinai Hospital', 'New York', 'New York', 'info@mssm.edu', '$2y$10$chTmTtsnIB8kr5N03eCD5OKdGi.i7.IpL/jQWxnnibOaB6YTMuJ4i', 'not verified by admin'),
(85, 'h8.jpg', 'University of Michigan Hospitals-Michigan Medicine', 'Ann Arbor', 'Michigan', 'michigan.medicine@umich.edu', '$2y$10$LBH91sIcoWN6mkJskUmtIeMY7OlH15Gula3oTR46i6fsgWjYiMKqu', 'verified'),
(86, 'h9.jpg', 'Duke University Hospital', 'Durham', 'North Carolina', 'prmc.duhs@duke.edu', '$2y$10$3KzHBZgZTB79yTK.Rn99kehO8DKA3qg.81P2z9GD1j3RtLXyVY7H2', 'verified'),
(87, 'h10.jpg', 'UPMC Presbyterian Shadyside', 'Pittsburgh', 'Pennsylvania', 'info@upmc.edu', '$2y$10$MqaB0tN9bhIvv6o7Ifm44OoJ7Uqi1MnnqHldYyb9Y1Y68lIQ/hxbm', 'verified'),
(88, 'feature-01.jpg', 'Cedars-Sinai Medical Center', ' Los Angeles', 'California', 'cedarswebmaster@cshs.org', '$2y$10$1uOhtNAYgo5fJg3aFKzCqe9eZEzC1wkwJrk4lptcQhmHbvVpj0WZu', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `patientregister`
--

CREATE TABLE `patientregister` (
  `id` int(11) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `patient_name` varchar(300) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patientregister`
--

INSERT INTO `patientregister` (`id`, `picture`, `patient_name`, `email`, `password`) VALUES
(25, 'uploads/patient8.jpg', 'mohsin', 'MOSHINMUKHTAR81@GMAIL.COM', '$2y$10$T0alV3e1pUbAG'),
(27, 'uploads/Snapchat-376013489.jpg', 'james', 'james@gmail.com', '$2y$10$7ojPTSo7deuANwZW3hHj7ux76pZdpa7v05KslMLENCCRKQsjHP9PO');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_appointments`
--

CREATE TABLE `vaccination_appointments` (
  `id` int(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `parent_email` varchar(255) NOT NULL,
  `Child Name` varchar(200) NOT NULL,
  `date of birth` date NOT NULL,
  `Vaccine` varchar(300) NOT NULL,
  `preferred_time` datetime NOT NULL,
  `hospital` varchar(255) NOT NULL,
  `Status` varchar(200) NOT NULL,
  `patientid` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccination_appointments`
--

INSERT INTO `vaccination_appointments` (`id`, `parent_name`, `phone_number`, `parent_email`, `Child Name`, `date of birth`, `Vaccine`, `preferred_time`, `hospital`, `Status`, `patientid`) VALUES
(36, 'owais', '03012119368', 'mosin@gmail.com', 'WILLIAM', '2005-01-22', '', '0000-00-00 00:00:00', '', 'completed', 25),
(37, 'john doe', '03012119368', 'owais@gmail.com', 'WILLIAM', '2004-01-12', 'Varicella (Chickenpox) Vaccine', '2024-01-11 14:15:00', 'hh hospital', 'pending', 26);

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `vaccine_id` int(11) NOT NULL,
  `vaccine_name` varchar(255) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `stock` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`vaccine_id`, `vaccine_name`, `picture`, `stock`, `description`) VALUES
(64, 'Pfhizer', 'uploads/v1.jpeg', 'out of stock', 'for corona virus'),
(66, ' (HepB) Vaccine', 'uploads/v2.jpeg', 'out of stock', ' Protects against hepatitis B virus, a contagious liver infection. Given in a series of three doses, with the first dose typically administered at birth.'),
(67, 'Varicella (Chickenpox) Vaccine', 'uploads/v3.jpeg', 'Available', ' Provides immunity against the varicella-zoster virus, which causes chickenpox. Administered in two doses, generally given at 12-15 months and 4-6 years of age.'),
(68, ' (Hib) Vaccine', 'uploads/v5.jpeg', 'Available', 'Prevents Haemophilus influenzae type b, a bacterium that can cause severe infections like meningitis and pneumonia. Administered as several doses starting at 2 months of age.'),
(69, 'Poliovirus Vaccine', 'uploads/v8.jpeg', 'Available', 'Immunizes against poliovirus, which causes polio, a highly infectious disease that primarily affects young children. Given in a series of four doses, typically starting at 2 months of age.\r\n\r\n'),
(70, ' (Tdap) Vaccine', 'uploads/v7.jpeg', 'Available', ' Protects against tetanus, diphtheria, and whooping cough (pertussis). Usually given at ages 11-12, with a booster dose (Tdap) recommended at age 16.\r\n\r\n'),
(71, '(HPV) Vaccine', 'uploads/v9.jpeg', 'Available', 'Guards against certain strains of HPV, which can lead to cervical, anal, and other cancers. Administered in two or three doses, typically starting at ages 11-12.\r\n\r\n'),
(72, 'Pneumococcal Conjugate Vaccine (PCV)', 'uploads/v10.jpeg', '(not verified by admin)', ' Helps prevent infections caused by Streptococcus pneumoniae, including pneumonia and meningitis. Given in a series of doses starting at 2 months of age.\r\n\r\n'),
(73, 'Meningococcal Conjugate Vaccine', 'uploads/v11.jpeg', 'Available', 'Protects against meningococcal disease, which causes meningitis and bloodstream infections. Given as two doses, typically at age 11-12, with a booster dose at age 16.'),
(74, '(HepC) Vaccine', 'uploads/v6.jpeg', '(not verified by admin)', 'Protects against meningococcal disease, which causes meningitis and bloodstream infections. Given as two doses, typically at age 11-12, with a booster dose at age 16.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminregister`
--
ALTER TABLE `adminregister`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact us`
--
ALTER TABLE `contact us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitalregister`
--
ALTER TABLE `hospitalregister`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientregister`
--
ALTER TABLE `patientregister`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccination_appointments`
--
ALTER TABLE `vaccination_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`vaccine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminregister`
--
ALTER TABLE `adminregister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact us`
--
ALTER TABLE `contact us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospitalregister`
--
ALTER TABLE `hospitalregister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `patientregister`
--
ALTER TABLE `patientregister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `vaccination_appointments`
--
ALTER TABLE `vaccination_appointments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `vaccine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
