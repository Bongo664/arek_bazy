-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 26, 2024 at 10:44 PM
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
-- Database: `samochody`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontakt`
--

CREATE TABLE `kontakt` (
  `idk` int(11) NOT NULL,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochody`
--

CREATE TABLE `samochody` (
  `IDS` int(11) NOT NULL,
  `Nazwa` text NOT NULL,
  `opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `samochody`
--

INSERT INTO `samochody` (`IDS`, `Nazwa`, `opis`) VALUES
(1, 'Opel', 'niemiecki samochód osobowych, sportowych i dostawczych z siedzibą w Rüsselsheim am Main działający od 2000 roku.'),
(2, 'nissan', 'Nissan to japoński producent samochodów założony w 1933 roku. Firma znana jest z produkcji szerokiej gamy pojazdów, od małych samochodów miejskich po duże SUV-y i pickupy.\r\n\r\nNissan jest również pionierem w dziedzinie technologii elektrycznych i hybrydowych, oferując szeroką gamę modeli z napędem elektrycznym i hybrydowym. Firma jest obecna w ponad 160 krajach na całym świecie i zatrudnia ponad 130 000 pracowników.'),
(3, 'toyota', 'Toyota to japoński gigant motoryzacyjny założony w 1937 roku. Słynie z produkcji niezawodnych i ekonomicznych aut, obejmujących szeroką gamę modeli - od kompaktowych hatchbacków po luksusowe sedany i terenowe SUV-y.\r\n\r\nToyota jest liderem w dziedzinie technologii hybrydowych, oferując jedne z najbardziej popularnych modeli hybrydowych na świecie. Firma działa w ponad 180 krajach, zatrudniając globalnie około 360 000 pracowników.'),
(4, 'Mercedes', 'Mercedes-Benz to niemiecka firma motoryzacyjna z bogatą historią sięgającą 1926 roku. Marka słynie z produkcji luksusowych samochodów, które łączą w sobie najwyższą jakość wykonania, zaawansowaną technologię i ponadczasowy design.\r\n\r\nOferuje szeroką gamę modeli, od kompaktowych aut miejskich po limuzyny i sportowe samochody, a także SUV-y i auta terenowe. Mercedes-Benz jest synonimem prestiżu, komfortu i innowacji, ciesząc się uznaniem na całym świecie.'),
(5, 'BMW', 'BMW to niemiecka firma motoryzacyjna założona w 1916 roku. Znana jest z produkcji luksusowych aut sportowych i sedanów, które słyną z doskonałych osiągów, precyzyjnego prowadzenia i eleganckiego designu.\r\n\r\nOferuje szeroką gamę modeli, od kompaktowych aut sportowych po luksusowe limuzyny i SUV-y. BMW kojarzone jest z radością z jazdy, innowacyjnymi technologiami i niepowtarzalnym stylem, co czyni je jedną z najbardziej pożądanych marek samochodowych na świecie.');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`idk`);

--
-- Indeksy dla tabeli `samochody`
--
ALTER TABLE `samochody`
  ADD PRIMARY KEY (`IDS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `idk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `samochody`
--
ALTER TABLE `samochody`
  MODIFY `IDS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
