-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Cze 2021, 00:35
-- Wersja serwera: 10.4.19-MariaDB
-- Wersja PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `biblioteka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `czytelnik`
--

CREATE TABLE `czytelnik` (
  `PESEL` varchar(11) NOT NULL,
  `Imie` varchar(20) NOT NULL,
  `Nazwisko` varchar(20) NOT NULL,
  `e-mail` varchar(30) NOT NULL,
  `telefon` int(9) NOT NULL,
  `haslo` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `czytelnik`
--

INSERT INTO `czytelnik` (`PESEL`, `Imie`, `Nazwisko`, `e-mail`, `telefon`, `haslo`) VALUES
('12345678912', 'Adam', 'Nowak', 'admin@biblioteka.example', 123456789, '1qazXSW@'),
('96050982656', 'Jan', 'Kowalski', 'jkowalski@mail.com', 197364528, 'haslo1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kopia`
--

CREATE TABLE `kopia` (
  `ISBN` varchar(13) NOT NULL,
  `nr_kopii` int(11) NOT NULL,
  `Dostepna` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `kopia`
--

INSERT INTO `kopia` (`ISBN`, `nr_kopii`, `Dostepna`) VALUES
('9788301203610', 0, 1),
('9788301217358', 0, 1),
('9788306010893', 0, 1),
('9788328374089', 0, 1),
('9788328485693', 0, 1),
('9788328498105', 0, 1),
('9788362884629', 0, 1),
('9788366272897', 0, 1),
('9788366839380', 0, 1),
('9788373116573', 0, 1),
('9788377313077', 0, 1),
('9788381962414', 0, 1),
('9788381962414', 1, 0),
('9788381962414', 2, 1),
('9788381962506', 0, 1),
('9788381962865', 0, 1),
('9788381962865', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazka`
--

CREATE TABLE `ksiazka` (
  `ISBN` varchar(13) NOT NULL,
  `Tytul` varchar(55) NOT NULL,
  `Autor` varchar(40) NOT NULL,
  `Wydawca` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ksiazka`
--

INSERT INTO `ksiazka` (`ISBN`, `Tytul`, `Autor`, `Wydawca`) VALUES
('9788301203610', 'Terapia Gestalt', 'Frederick S. Perls', 'Wydawnictwo Naukowe PWN'),
('9788301217358', 'Biochemia', 'David Hames, Nigel Hooper', 'Wydawnictwo Naukowe PWN'),
('9788306010893', 'Dzika kaczka', 'Henrik Ibsen', 'Państwowy Instytut Wydawniczy'),
('9788328374089', 'Machine learning, Python i data science. Wprowadzenie', 'Sarah Guido, Andreas C. Müller', ' Helion'),
('9788328485693', 'Kruk', 'Edgar Allan Poe', ' NetPress Digital Sp. z o.o.'),
('9788328498105', 'Król w Nieświeżu 1784. Obrazek z przeszłości', 'Józef Ignacy Kraszewski', 'NetPress Digital Sp. z o.o.'),
('9788362884629', 'Ekonomik', 'Ksenofont', 'Państwowy Instytut Wydawniczy'),
('9788366272897', 'Tragedie', 'Jean Racine', ' Państwowy Instytut Wydawniczy'),
('9788366839380', 'Szarady', 'Knut Hamsun', 'Wydawnictwo Poznańskie'),
('9788373116573', '49 opowiadań', 'Ernest Hemingway', 'Świat Książki'),
('9788377313077', 'Miasto w morzu i inne utwory poetyckie', 'Edgar Allan Poe', 'Vesper'),
('9788381962414', 'Grzegorz VII', 'Glauco Maria Cantarella', 'Państwowy Instytut Wydawniczy'),
('9788381962506', 'Literatura jako kłamstwo', 'Giorgio Manganelli', 'Państwowy Instytut Wydawniczy'),
('9788381962865', 'Dezintegracja pozytywna', 'Kazimierz Dąbrowski', 'Państwowy Instytut Wydawniczy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacje`
--

CREATE TABLE `rezerwacje` (
  `ISBN` varchar(13) NOT NULL,
  `nr_kopii` int(11) NOT NULL,
  `PESEL` varchar(11) NOT NULL,
  `Data_rezerwacji` date NOT NULL,
  `Data_odbioru` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `rezerwacje`
--

INSERT INTO `rezerwacje` (`ISBN`, `nr_kopii`, `PESEL`, `Data_rezerwacji`, `Data_odbioru`) VALUES
('9788301203610', 0, '96050982656', '2021-06-01', '2021-06-14');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenia`
--

CREATE TABLE `wypozyczenia` (
  `ISBN` varchar(13) NOT NULL,
  `nr_kopii` int(11) NOT NULL,
  `PESEL` varchar(11) NOT NULL,
  `Data_pozyczenia` date NOT NULL,
  `Data_zwrotu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `wypozyczenia`
--

INSERT INTO `wypozyczenia` (`ISBN`, `nr_kopii`, `PESEL`, `Data_pozyczenia`, `Data_zwrotu`) VALUES
('9788301203610', 0, '96050982656', '2021-06-14', '2021-06-20'),
('9788301217358', 0, '96050982656', '2021-06-19', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `czytelnik`
--
ALTER TABLE `czytelnik`
  ADD PRIMARY KEY (`PESEL`);

--
-- Indeksy dla tabeli `kopia`
--
ALTER TABLE `kopia`
  ADD PRIMARY KEY (`ISBN`,`nr_kopii`);

--
-- Indeksy dla tabeli `ksiazka`
--
ALTER TABLE `ksiazka`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indeksy dla tabeli `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD KEY `ISBN` (`ISBN`,`nr_kopii`),
  ADD KEY `PESEL` (`PESEL`);

--
-- Indeksy dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD KEY `ISBN` (`ISBN`,`nr_kopii`),
  ADD KEY `PESEL` (`PESEL`);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `kopia`
--
ALTER TABLE `kopia`
  ADD CONSTRAINT `kopia_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `ksiazka` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD CONSTRAINT `rezerwacje_ibfk_3` FOREIGN KEY (`PESEL`) REFERENCES `czytelnik` (`PESEL`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezerwacje_ibfk_4` FOREIGN KEY (`ISBN`,`nr_kopii`) REFERENCES `kopia` (`ISBN`, `nr_kopii`) ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD CONSTRAINT `wypozyczenia_ibfk_2` FOREIGN KEY (`PESEL`) REFERENCES `czytelnik` (`PESEL`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wypozyczenia_ibfk_3` FOREIGN KEY (`ISBN`,`nr_kopii`) REFERENCES `kopia` (`ISBN`, `nr_kopii`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
