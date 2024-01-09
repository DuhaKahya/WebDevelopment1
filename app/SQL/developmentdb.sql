-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Gegenereerd op: 09 jan 2024 om 13:03
-- Serverversie: 11.1.3-MariaDB-1:11.1.3+maria~ubu2204
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developmentdb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(9999) NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `price`, `stock`, `category`) VALUES
(1, 'Galatasaray Soccer Ball', 'Elevate your game with the official Galatasaray football.', 29.99, 50, 'Merchandise'),
(2, 'Galatasaray Home Kit', 'Elevate your football fandom with the Galatasaray Home Kit.', 60, 50, 'Merchandise'),
(3, 'Galatasaray Away Kit', 'Dress in style and showcase your allegiance with the Galatasaray Away Kit.', 60, 50, 'Merchandise'),
(4, 'Galatasaray Hoodie', 'Elevate your street-style game and exhibit your unwavering support with the Galatasaray Hoodie.', 50, 50, 'Merchandise'),
(5, 'Galatasaray Shirt', 'Make a bold statement and represent your devotion to Galatasaray with the Galatasaray Shirt.', 35, 50, 'Merchandise'),
(6, 'Galatasaray Shoes', 'Step into the game with the Galatasaray Shoes.', 99.99, 50, 'Merchandise'),
(7, 'Galatasaray Limited Edition Watch', 'Capture every moment in time with the Galatasaray Limited Edition Watch.', 149.99, 20, 'Merchandise'),
(8, 'Galatasaray Third Kit', 'Dress in style and showcase your allegiance with the Galatasaray Away Kit.', 60, 50, 'Merchandise'),
(9, 'Galatasaray - Fenerbahce', '29-12-2023 / 19:00', 99.99, 20000, 'Ticket'),
(10, ' Ajax - Galatasaray', '21-02-2024 / 21:00', 79.99, 15000, 'Ticket'),
(11, 'Galatasaray - RealMadrid', '09-04-2024 / 20:15', 199.99, 40000, 'Ticket');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contactPage`
--

CREATE TABLE `contactPage` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(9999) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `contactPage`
--

INSERT INTO `contactPage` (`id`, `name`, `email`, `subject`, `message`, `date`) VALUES
(1, 'duha', 'dhudwhuds@dsbdu.nl', 'dhuduhd', 'cudubd', '2023-12-26 13:39:25'),
(2, 'Duha', 'duhakxbuwud@nuacuna.nl', 'huufeu', 'enesnusu', '2023-12-31 11:34:51'),
(3, 'Duha', 'duhakxbuwud@nuacuna.nl', 'huufeu', 'enesnusu', '2023-12-31 11:35:23'),
(4, 'Duha', 'duha122@yaehed.esbyes', 'csundsuds', 'esee', '2023-12-31 11:35:41'),
(5, 'test', 'test@ne.nl', 'test', 'test', '2023-12-31 11:39:23'),
(6, 'dsds', 'dssdds@axsbyads.bl', 'sfdsf', 'sfdsf', '2023-12-31 11:42:57'),
(7, 'test', 'test@test.nl', 'test', 'tesssss', '2024-01-02 17:32:43'),
(8, 'duha', 'testduha@ayabyas.nl', 'sacundanu', 'ndsdsvn', '2024-01-02 18:08:57');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `shoppingcartid` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `orders`
--

INSERT INTO `orders` (`id`, `shoppingcartid`, `date`) VALUES
(1, 5, '2024-01-03 11:30:28'),
(2, 5, '2024-01-03 11:31:07'),
(3, 5, '2024-01-03 11:31:50'),
(4, 58, '2024-01-03 11:42:30'),
(5, 59, '2024-01-03 11:43:18'),
(6, 60, '2024-01-03 11:45:08'),
(7, 61, '2024-01-03 11:49:02'),
(8, 65, '2024-01-03 12:00:11'),
(9, 70, '2024-01-03 12:20:08'),
(10, 72, '2024-01-03 15:33:14'),
(11, 72, '2024-01-03 15:34:12'),
(12, 76, '2024-01-03 15:40:41'),
(13, 87, '2024-01-03 17:16:02'),
(14, 90, '2024-01-03 19:23:25'),
(15, 95, '2024-01-07 13:24:10'),
(16, 97, '2024-01-07 18:38:41'),
(17, 98, '2024-01-07 19:08:36'),
(18, 98, '2024-01-07 19:10:23'),
(19, 98, '2024-01-07 19:11:13'),
(20, 98, '2024-01-07 19:13:47'),
(21, 99, '2024-01-07 19:22:06'),
(22, 99, '2024-01-07 19:22:18'),
(23, 99, '2024-01-07 19:42:07'),
(24, 100, '2024-01-07 19:56:38'),
(25, 100, '2024-01-07 19:56:55'),
(26, 101, '2024-01-07 19:59:00'),
(27, 102, '2024-01-07 20:03:50'),
(28, 103, '2024-01-07 20:05:02'),
(29, 104, '2024-01-07 20:05:24'),
(30, 105, '2024-01-07 20:06:04'),
(31, 106, '2024-01-07 20:06:50'),
(32, 107, '2024-01-07 20:07:29'),
(33, 108, '2024-01-07 20:08:39'),
(34, 108, '2024-01-07 20:09:13'),
(35, 108, '2024-01-07 20:09:20'),
(36, 109, '2024-01-07 20:11:22'),
(37, 110, '2024-01-07 20:13:20'),
(38, 111, '2024-01-07 20:14:44'),
(39, 112, '2024-01-09 10:02:18'),
(40, 113, '2024-01-09 10:12:47'),
(41, 113, '2024-01-09 10:13:03');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `id` int(100) NOT NULL,
  `userid` int(255) NOT NULL,
  `articleid` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` float NOT NULL,
  `totalprice` float NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adres` varchar(9999) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `registrationdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `adres`, `phonenumber`, `registrationdate`) VALUES
(1, 'd.kahya', '$2y$10$KGLMkB49AYFdLfP8L23TqO2o7eZtRCWWyyftm5RolnJ.NeCtdM.v2', 'duhakahya@gmail.com', 'Duha Kahya', 'Spuistraat 99, 2000LX Amsterdam', '0616275261', '2023-12-24 20:15:26'),
(2, 'u.can', '$2y$10$MTaXUIdfsejgifrLyXhkjeWtNhi85yA2RhCtDITbkHbQoN8pOkmKy', 'u.can@gmail.com', 'Umit Can', 'Lange Begijnestraat 24, 2011HH Haarlem', '0615263458', '2023-12-24 20:20:38'),
(3, 'l.pecotic', '$2y$10$Ex81yVC97o9tLRvT0ECTj.AUKuz88oG8nmTXd0.dYcL7up7FjGufy', 'l.pecotic@gmail.com', 'Luko Pecotic', 'Tesselschadestraat 56, 2026RN Haarlem', '0639525175', '2023-12-24 20:22:32'),
(7, 'test1', '$2y$10$O6vCzeSyBc7aTnD6VeOo5ObSYLnjmmjyGgYk60kg8vkTpdR1k7s2e', 'test1@gmail.com', 'Test', 'Test', '0625152462', '2023-12-31 15:02:09'),
(8, 'test4', '$2y$10$nfUEBxp9.LSPPENMTcwL6eDh8EGiXu6Zadz/Mh8K30S4uSX70zLZi', 'ewwfe@adsiasdm.fsdf', 'sdfsdf', 'dsfsdf', '062825', '2024-01-07 14:47:10');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `contactPage`
--
ALTER TABLE `contactPage`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FOREIGNKEY-Article` (`articleid`),
  ADD KEY `FOREIGNKEY-User` (`userid`) USING BTREE;

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `contactPage`
--
ALTER TABLE `contactPage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT voor een tabel `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD CONSTRAINT `FOREIGNKEY-Article` FOREIGN KEY (`articleid`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `FOREIGNKEY-User` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
