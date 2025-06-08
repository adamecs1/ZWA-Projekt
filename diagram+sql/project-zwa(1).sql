-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 08. čen 2025, 13:49
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `project-zwa`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `objednavky`
--

CREATE TABLE `objednavky` (
  `kod_objednavky` int(11) NOT NULL,
  `nazev_objednavky` varchar(45) NOT NULL,
  `stav_objednavky` varchar(45) NOT NULL,
  `cas_vytvoreni` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `produkty_kod_produktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `produkty`
--

CREATE TABLE `produkty` (
  `kod_produktu` int(11) NOT NULL,
  `nazev_produktu` varchar(45) NOT NULL,
  `cena` int(11) NOT NULL,
  `hmotnost` int(11) NOT NULL,
  `doba_doruceni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `recenze`
--

CREATE TABLE `recenze` (
  `id_recenze` int(11) NOT NULL,
  `popis` varchar(100) NOT NULL,
  `pocet_hvezd` int(11) NOT NULL,
  `koupim_priste` varchar(3) NOT NULL,
  `uzivatelske_jmeno` varchar(45) DEFAULT NULL,
  `users_uzivatelske_jmeno` varchar(50) NOT NULL,
  `objednavky_kod_objednavky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `uzivatelske_jmeno` varchar(50) NOT NULL,
  `heslo` varchar(100) NOT NULL,
  `tel_cislo` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `psc` int(11) NOT NULL,
  `is_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `objednavky`
--
ALTER TABLE `objednavky`
  ADD PRIMARY KEY (`kod_objednavky`),
  ADD KEY `fk_objednavky_produkty_idx` (`produkty_kod_produktu`);

--
-- Indexy pro tabulku `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`kod_produktu`);

--
-- Indexy pro tabulku `recenze`
--
ALTER TABLE `recenze`
  ADD PRIMARY KEY (`id_recenze`,`objednavky_kod_objednavky`),
  ADD KEY `fk_recenze_users1_idx` (`users_uzivatelske_jmeno`),
  ADD KEY `fk_recenze_objednavky1_idx` (`objednavky_kod_objednavky`);

--
-- Indexy pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uzivatelske_jmeno`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `objednavky`
--
ALTER TABLE `objednavky`
  MODIFY `kod_objednavky` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `produkty`
--
ALTER TABLE `produkty`
  MODIFY `kod_produktu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `recenze`
--
ALTER TABLE `recenze`
  MODIFY `id_recenze` int(11) NOT NULL AUTO_INCREMENT;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `objednavky`
--
ALTER TABLE `objednavky`
  ADD CONSTRAINT `fk_objednavky_produkty` FOREIGN KEY (`produkty_kod_produktu`) REFERENCES `produkty` (`kod_produktu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `recenze`
--
ALTER TABLE `recenze`
  ADD CONSTRAINT `fk_recenze_objednavky1` FOREIGN KEY (`objednavky_kod_objednavky`) REFERENCES `objednavky` (`kod_objednavky`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recenze_users1` FOREIGN KEY (`users_uzivatelske_jmeno`) REFERENCES `users` (`uzivatelske_jmeno`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
