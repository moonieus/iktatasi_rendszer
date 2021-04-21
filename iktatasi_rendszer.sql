-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Ápr 20. 16:57
-- Kiszolgáló verziója: 10.4.14-MariaDB
-- PHP verzió: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `iktatasi_rendszer`
--
CREATE DATABASE IF NOT EXISTS `iktatasi_rendszer` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `iktatasi_rendszer`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `az` int(2) NOT NULL,
  `nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `jogosultsagok_az` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`az`, `nev`, `jelszo`, `jogosultsagok_az`) VALUES
(1, 'admin', '1', 1),
(3, 'Ambrus Zsolt', '1', 3),
(5, 'Kovács Zoltánné', '1', 2),
(13, 'Géza', '1', 2),
(22, 'Kati', '1', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jogosultsagok`
--

CREATE TABLE `jogosultsagok` (
  `az` int(2) NOT NULL,
  `nev` varchar(20) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `jogosultsagok`
--

INSERT INTO `jogosultsagok` (`az`, `nev`) VALUES
(1, 'admin'),
(2, 'iktatas'),
(3, 'igazolas');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `partnerek`
--

CREATE TABLE `partnerek` (
  `az` int(4) NOT NULL,
  `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `adoszam` bigint(11) NOT NULL,
  `varos` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `utca` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `irszam` int(4) NOT NULL,
  `kapcsolattarto` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `telszam` varchar(30) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `partnerek`
--

INSERT INTO `partnerek` (`az`, `nev`, `adoszam`, `varos`, `utca`, `irszam`, `kapcsolattarto`, `telszam`, `email`) VALUES
(2, 'Energia Zrt.', 12345229802, 'Budapest', 'Andrássy út 55.', 1532, 'Hegyi Valéria', '+36 30/555-9959', 'ugyfelszolgalat@energiazrt.hu'),
(4, 'Italgyártó Zrt.', 12345229801, 'Kecskemét', 'Felső tér 55.', 6000, 'Hosszú Pék Zoltán', '+36 30/556-9951', 'hpk@gmail.com'),
(8, 'Kiss Bt.', 21341129012, 'Kecskemét', 'Győzelem u. 5.', 6000, 'Fő Kázmér', '70/850-9612', 'valami@invitel.hu'),
(9, 'Nagy Kft.', 86733928021, 'Cegléd', 'Komáromi u. 45.', 5210, '', '', ''),
(22, 'Fekete Péter', 21474836409, 'Vác', 'Fő u. 56.', 2563, 'Fekete Péter', '', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szamlak`
--

CREATE TABLE `szamlak` (
  `iktatoszam` int(6) NOT NULL,
  `szamlaszam` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `partnerek_az` int(4) NOT NULL,
  `szla_kelte` date NOT NULL,
  `telj_dat` date NOT NULL,
  `fiz_hat` date NOT NULL,
  `netto` int(12) NOT NULL,
  `afa` int(12) NOT NULL,
  `brutto` int(12) NOT NULL,
  `status` char(1) COLLATE utf8_hungarian_ci NOT NULL,
  `kep` varchar(40) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szamlak`
--

INSERT INTO `szamlak` (`iktatoszam`, `szamlaszam`, `partnerek_az`, `szla_kelte`, `telj_dat`, `fiz_hat`, `netto`, `afa`, `brutto`, `status`, `kep`) VALUES
(1, 'SZ2021-00233', 2, '2021-04-01', '2021-04-01', '2021-04-22', 100, 27, 127, 'I', 'inpiro.pdf'),
(2, 'SZ2021-00235', 2, '2021-04-01', '2021-04-01', '2021-04-22', 100, 27, 127, 'N', 'Imagináció.pdf'),
(3, '2021/00144', 4, '2021-03-16', '2021-03-10', '2021-04-01', -10, -3, 13, 'V', 'Sárecz.pdf'),
(4, 'SZ2021-00250', 2, '2021-04-01', '2021-04-01', '2021-04-22', 100, 27, 127, 'I', 'inpiro.pdf'),
(18, 'k-23/2021', 22, '2021-12-31', '2021-12-31', '2021-12-31', 1, 2, 3, 'N', 'IPARI ELEKTRONIKA.pdf'),
(19, 'k1-34', 4, '2021-12-31', '2021-12-31', '2021-12-31', 5, 6, 7, 'N', 'IPARI ELEKTRONIKA.pdf'),
(23, '2021-5566', 22, '2021-03-29', '2021-03-31', '2021-05-06', 1, 2, 3, 'V', 'Sárecz.pdf'),
(24, '2021-45/6', 8, '2021-03-30', '2021-04-14', '2021-05-01', 1, 2, 6, 'N', 'IPARI ELEKTRONIKA.pdf'),
(25, 'r-45', 4, '2021-12-31', '2021-12-31', '2021-12-31', 2, 3, 8, 'N', 'IPARI ELEKTRONIKA.pdf'),
(26, 'wwrw', 2, '2021-12-31', '2021-12-31', '2021-12-31', 1, 7, 7, 'N', ''),
(27, 'qeqre', 22, '2021-12-31', '2021-12-31', '2021-12-31', -3, 0, 0, 'N', ''),
(28, 'eew', 2, '2021-12-31', '2021-12-31', '2021-12-31', -1, 0, 0, 'N', ''),
(29, '444', 22, '2021-12-31', '2021-12-31', '2021-12-31', 10, 0, 0, 'N', '');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`az`),
  ADD KEY `jogosultsagok_az` (`jogosultsagok_az`);

--
-- A tábla indexei `jogosultsagok`
--
ALTER TABLE `jogosultsagok`
  ADD PRIMARY KEY (`az`);

--
-- A tábla indexei `partnerek`
--
ALTER TABLE `partnerek`
  ADD PRIMARY KEY (`az`);

--
-- A tábla indexei `szamlak`
--
ALTER TABLE `szamlak`
  ADD PRIMARY KEY (`iktatoszam`),
  ADD KEY `partnerek_az` (`partnerek_az`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `az` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT a táblához `jogosultsagok`
--
ALTER TABLE `jogosultsagok`
  MODIFY `az` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `partnerek`
--
ALTER TABLE `partnerek`
  MODIFY `az` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT a táblához `szamlak`
--
ALTER TABLE `szamlak`
  MODIFY `iktatoszam` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD CONSTRAINT `felhasznalok_ibfk_1` FOREIGN KEY (`jogosultsagok_az`) REFERENCES `jogosultsagok` (`az`);

--
-- Megkötések a táblához `szamlak`
--
ALTER TABLE `szamlak`
  ADD CONSTRAINT `szamlak_ibfk_1` FOREIGN KEY (`partnerek_az`) REFERENCES `partnerek` (`az`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
