-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2025 at 10:06 AM
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
-- Database: `przedmioty`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `prze`
--

CREATE TABLE `prze` (
  `IDP` int(11) NOT NULL,
  `przedmiot` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prze`
--

INSERT INTO `prze` (`IDP`, `przedmiot`) VALUES
(1, 'matematyka'),
(2, 'fizyka'),
(3, 'chemia'),
(4, 'wf');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wybrane_przedmioty`
--

CREATE TABLE `wybrane_przedmioty` (
  `id` int(11) NOT NULL,
  `nazwa_przedmiotu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wybrane_przedmioty`
--

INSERT INTO `wybrane_przedmioty` (`id`, `nazwa_przedmiotu`) VALUES
(1, 'matematyka'),
(2, 'fizyka'),
(3, 'matematyka'),
(4, 'fizyka'),
(5, 'matematyka'),
(6, 'fizyka'),
(7, 'matematyka'),
(8, 'matematyka'),
(9, 'fizyka'),
(10, 'matematyka'),
(11, 'fizyka');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `prze`
--
ALTER TABLE `prze`
  ADD PRIMARY KEY (`IDP`);

--
-- Indeksy dla tabeli `wybrane_przedmioty`
--
ALTER TABLE `wybrane_przedmioty`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prze`
--
ALTER TABLE `prze`
  MODIFY `IDP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wybrane_przedmioty`
--
ALTER TABLE `wybrane_przedmioty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
