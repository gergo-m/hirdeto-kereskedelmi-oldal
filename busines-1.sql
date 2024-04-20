-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Ápr 20. 11:28
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `hirdeto-kereskedelmi-oldal`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `busines`
--

CREATE TABLE `busines` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `year_of_foudation` date NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `service_price` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `service_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `busines`
--

INSERT INTO `busines` (`id`, `name`, `description`, `year_of_foudation`, `service_name`, `service_price`, `owner_id`, `service_description`) VALUES
(1, 'bolt', 'Itt tudsz vásárolni kenyeret.', '2024-04-20', 'Kenyéreladás', 100, 1, 'Finom kenyeret adunk.'),
(2, 'Fodrász', 'Itt le tudjuk vágni a hajadat.', '2024-04-01', 'Hajvágás', 200, 2, 'Profi fodrászat vagyuk.');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `busines`
--
ALTER TABLE `busines`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
