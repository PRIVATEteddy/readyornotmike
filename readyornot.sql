-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 16 jun 2025 om 00:02
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `readyornot`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `id` int(11) NOT NULL,
  `NaamOfEmail` varchar(255) DEFAULT NULL,
  `Wachtwoord` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`id`, `NaamOfEmail`, `Wachtwoord`) VALUES
(2, 'gamerxbox2007@gmail.com', '$2y$10$WWG./XVTYkoHI/DOL0lei.RMnByeav/pmzFmAvjwe2rkzEfhSTdVK'),
(7, 'halo', '$2y$10$oab6hRzRNI.b7VCis9JbAu1Sod523K2.C7CZXfKbmHEnlesyrSrt2'),
(8, '123', '$2y$10$3yQrrXk70NLuYF0u93TRGOUbj5TYITCGpkcexzLLVy6k46Z2SnzNK'),
(9, '1234', '$2y$10$BcbAsSx1ZlY5fevUiFLrsetgQMGwPaDmibGGKRWgTbI9I5jEDNIh2');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `is_done` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `title`, `description`, `deadline`, `is_done`, `created_at`) VALUES
(1, 8, 'd', NULL, NULL, 0, '2025-06-12 17:19:36'),
(2, 8, 'dasdasd', NULL, NULL, 0, '2025-06-12 17:19:39'),
(3, 8, 'dasda', NULL, NULL, 0, '2025-06-12 17:19:41'),
(4, 9, 'tast', NULL, NULL, 0, '2025-06-12 17:20:20'),
(5, 9, '123', NULL, NULL, 0, '2025-06-12 17:26:52'),
(6, 9, '12', '212ewads', '0002-02-22', 0, '2025-06-12 17:30:43'),
(7, 8, 'Dada', '12wdas', '0121-02-21', 0, '2025-06-13 10:47:38');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NaamOfEmail` (`NaamOfEmail`),
  ADD UNIQUE KEY `NaamOfEmail_2` (`NaamOfEmail`);

--
-- Indexen voor tabel `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `gebruiker` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
