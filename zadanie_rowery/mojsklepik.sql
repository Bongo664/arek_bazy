-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2025 at 05:29 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mojsklepik`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `kategoria` varchar(50) NOT NULL,
  `src` text NOT NULL,
  `opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id`, `kategoria`, `src`, `opis`) VALUES
(1, '1', 'https://kross.pl/media/catalog/product/cache/95a480c323a36b77b1ea03f80f97aed2/K/R/KRHE5Z29X17M008544_KR_Hexagon_5.0_LTD_M_29_M_grf_sza_p_1_3fb7.jpg', 'Rower górski 1'),
(2, '1', 'https://kross.pl/media/catalog/product/cache/95a480c323a36b77b1ea03f80f97aed2/K/R/KRHE3U29X17M008789_KR_Hexagon_3.0_ULT.RA_M_29_M_grf_hol_p_1_6b0e.jpg', 'Rower górski 2'),
(3, '1', 'https://kross.pl/media/catalog/product/cache/95a480c323a36b77b1ea03f80f97aed2/K/R/KRLE3U29X17W008796_KR_Lea_3.0_ULT.RA_D_29_M_roz_hol_p_1_5210.jpg', 'Rower górski 3'),
(4, '2', 'https://kross.pl/media/catalog/product/cache/95a480c323a36b77b1ea03f80f97aed2/K/R/KRVE9Z28X19M007383_KR_Vento_9.0_M_28_M_zie_kam_p_57_81c7.jpg', 'Rower szosowy 1'),
(5, '2', 'https://kross.pl/media/catalog/product/cache/95a480c323a36b77b1ea03f80f97aed2/K/R/KRVE8Z28X19M007379_KR_Vento_8.0_M_28_M_per_p_53_1225.jpg', 'Rower szosowy 2'),
(6, '2', 'https://kross.pl/media/catalog/product/cache/95a480c323a36b77b1ea03f80f97aed2/K/R/KRVD8Z28X19M002639_KR_Vento_8.0_M_28_M_cza_sza_m_1_9e88.jpg', 'Rower szosowy 3'),
(7, '3', 'https://kross.pl/media/catalog/product/cache/95a480c323a36b77b1ea03f80f97aed2/K/R/KRTR5U28X21M008763_KR_Trans_5.0_ULT.RA_M_28_L_cza_hol_m_1_8109.jpg', 'Rower miejski 1'),
(8, '3', 'https://kross.pl/media/catalog/product/cache/95a480c323a36b77b1ea03f80f97aed2/K/R/KRTR5U28X19W008766_KR_Trans_5.0_ULT.RA_D_28_L_sre_hol_m_1_78f9.jpg', 'Rower miejski 2'),
(9, '3', 'https://kross.pl/media/catalog/product/cache/95a480c323a36b77b1ea03f80f97aed2/K/R/KRTR3U28X21M008770_KR_Trans_3.0_ULT.RA_M_28_L_sre_hol_p_1_905d.jpg', 'Rower miejski 3');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
