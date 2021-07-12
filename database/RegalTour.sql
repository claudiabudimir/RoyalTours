-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 06:12 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop2`
--

-- --------------------------------------------------------

--
-- Table structure for table `abonat`
--

CREATE TABLE `abonat` (
  `id_abonat` int(11) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abonat`
--

INSERT INTO `abonat` (`id_abonat`, `email`) VALUES
(2, 'adinaradu@gmail.com'),
(4, 'iris28@gmail.com'),
(7, 'daria@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_utilizator` int(11) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `functie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_utilizator`, `nume`, `functie`) VALUES
(6, 39, 'Maria Martin', 'manager'),
(7, 45, 'Criastian Doris', 'manager vas');

-- --------------------------------------------------------

--
-- Table structure for table `camera`
--

CREATE TABLE `camera` (
  `id_camera` int(11) NOT NULL,
  `id_tipcamera` int(11) NOT NULL,
  `id_locatiecamera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camera`
--

INSERT INTO `camera` (`id_camera`, `id_tipcamera`, `id_locatiecamera`) VALUES
(1, 1, 1),
(2, 9, 1),
(3, 3, 3),
(4, 7, 2),
(5, 8, 2),
(6, 3, 4),
(7, 10, 5),
(8, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `id_utilizator` int(11) NOT NULL,
  `id_vas` int(11) NOT NULL,
  `id_camera` int(11) NOT NULL,
  `nume` varchar(150) NOT NULL,
  `cnp` bigint(20) NOT NULL,
  `data_sosire` date NOT NULL,
  `data_plecare` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `id_utilizator`, `id_vas`, `id_camera`, `nume`, `cnp`, `data_sosire`, `data_plecare`) VALUES
(14, 37, 3, 2, 'Claudia Rus', 2981010115178, '2021-06-01', '2021-06-19'),
(15, 38, 4, 6, 'Andrei Marcu', 1781020115789, '2021-05-23', '2021-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `valoare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factura`
--

INSERT INTO `factura` (`id_factura`, `id_client`, `valoare`) VALUES
(18, 14, 102),
(23, 14, 62),
(24, 14, 60);

-- --------------------------------------------------------

--
-- Table structure for table `locatiecamera`
--

CREATE TABLE `locatiecamera` (
  `id_locatiecamera` int(11) NOT NULL,
  `locatie` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locatiecamera`
--

INSERT INTO `locatiecamera` (`id_locatiecamera`, `locatie`) VALUES
(1, 'partea frontala a vasului'),
(2, 'partea mediana a vasului'),
(3, 'partea stanga a vasului'),
(4, 'partea dreapta a vasului'),
(5, 'partea din spate a vasului');

-- --------------------------------------------------------

--
-- Table structure for table `produs`
--

CREATE TABLE `produs` (
  `id_produs` int(11) NOT NULL,
  `id_tipserviciu` int(11) NOT NULL,
  `id_vas` int(11) NOT NULL,
  `nume` varchar(200) NOT NULL,
  `pret` int(11) NOT NULL,
  `descriere` varchar(10000) NOT NULL,
  `poza` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produs`
--

INSERT INTO `produs` (`id_produs`, `id_tipserviciu`, `id_vas`, `nume`, `pret`, `descriere`, `poza`) VALUES
(3, 1, 3, 'Turul orasului Genoa', 40, 'Turul va incepe la ora 9:00. De la ora 8:45 se vor prezenta rezervarile. Itinerariu va cuprinde vizita celor mai cunoscute monumente din oras. In timpul turului se va face o oprire la un restaurant pentru a lua masa de pranz. Dupa aceasta, se continua vizita in locuri istorice pana la starsitul programului.', './assets/Genoa.png'),
(4, 1, 3, 'Turul orasului Naples', 50, 'Turul va incepe la ora 9:00. De la ora 8:45 se vor prezenta rezervarile. Itinerariu va cuprinde vizita celor mai cunoscute monumente din oras. In timpul turului se va face o oprire la un restaurant pentru a lua masa de pranz. Dupa aceasta, se continua vizita in locuri istorice pana la starsitul programului.', './assets/Naples.png'),
(5, 3, 3, 'Clasa de yoga', 10, 'Rezervarea este valabila pentru oricare sedinta de luni pana vineri de la 8:00 am.', './assets/yoga.png'),
(6, 2, 3, 'Spectacolul saptamanal de teatru', 12, 'O poveste noua readusa pe scena in fiecare saptamana. Vin-o si bucura-te de o noua experienta culturala pe vasul nostru.', './assets/teatru.png'),
(8, 2, 3, 'Bachata ring', 10, 'Seara de dans bachata are loc joi de la 20:00 pm si dureazÄƒ pÃ¢nÄƒ la 4 am.', './assets/bachata.jpg'),
(10, 2, 4, 'Ore de vals pentru incepatori', 5, 'Seara de vals are loc joi de la 20:00 pm si dureazÄƒ pÃ¢nÄƒ la 4am.', './assets/bachata.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rezervare`
--

CREATE TABLE `rezervare` (
  `id_rezervare` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rezervare`
--

INSERT INTO `rezervare` (`id_rezervare`, `id_client`, `id_produs`) VALUES
(48, 14, 4),
(50, 14, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tipcamera`
--

CREATE TABLE `tipcamera` (
  `id_tipcamera` int(11) NOT NULL,
  `tip` varchar(100) NOT NULL,
  `nr_persoane` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipcamera`
--

INSERT INTO `tipcamera` (`id_tipcamera`, `tip`, `nr_persoane`) VALUES
(1, 'interior', 5),
(2, 'ocean view', 5),
(3, 'balcony', 5),
(4, 'suite', 5),
(7, 'family harbor', 7),
(8, 'cloud 9 spa', 7),
(9, 'double', 2),
(10, 'twin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tipserviciu`
--

CREATE TABLE `tipserviciu` (
  `id_tipserviciu` int(11) NOT NULL,
  `denumire` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipserviciu`
--

INSERT INTO `tipserviciu` (`id_tipserviciu`, `denumire`) VALUES
(1, 'tururi'),
(2, 'entertainment'),
(3, 'wellness');

-- --------------------------------------------------------

--
-- Table structure for table `utilizator`
--

CREATE TABLE `utilizator` (
  `id_utilizator` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tip_utilizator` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilizator`
--

INSERT INTO `utilizator` (`id_utilizator`, `username`, `password`, `tip_utilizator`) VALUES
(37, 'claudia', 'claudia', 'user'),
(38, 'andrei', 'andrei', 'user'),
(39, 'maria', 'maria', 'admin'),
(40, 'adi', 'adi', 'user'),
(45, 'cristian', 'criatian', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vas`
--

CREATE TABLE `vas` (
  `id_vas` int(11) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `capacitate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vas`
--

INSERT INTO `vas` (`id_vas`, `nume`, `capacitate`) VALUES
(1, 'Majestic', 3000),
(2, 'Azur', 2500),
(3, 'Diemon', 2800),
(4, 'Breeze', 3200),
(5, 'Bellas', 2700),
(6, 'Raris', 2700);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abonat`
--
ALTER TABLE `abonat`
  ADD PRIMARY KEY (`id_abonat`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_utilizator` (`id_utilizator`);

--
-- Indexes for table `camera`
--
ALTER TABLE `camera`
  ADD PRIMARY KEY (`id_camera`),
  ADD KEY `id_tipcamera` (`id_tipcamera`),
  ADD KEY `id_locatiecamera` (`id_locatiecamera`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `id_utilizator` (`id_utilizator`),
  ADD KEY `id_vas` (`id_vas`),
  ADD KEY `id_camera` (`id_camera`);

--
-- Indexes for table `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_utilizator` (`id_client`);

--
-- Indexes for table `locatiecamera`
--
ALTER TABLE `locatiecamera`
  ADD PRIMARY KEY (`id_locatiecamera`);

--
-- Indexes for table `produs`
--
ALTER TABLE `produs`
  ADD PRIMARY KEY (`id_produs`),
  ADD KEY `id_tipserviciu` (`id_tipserviciu`),
  ADD KEY `id_vas` (`id_vas`);

--
-- Indexes for table `rezervare`
--
ALTER TABLE `rezervare`
  ADD PRIMARY KEY (`id_rezervare`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_produs` (`id_produs`);

--
-- Indexes for table `tipcamera`
--
ALTER TABLE `tipcamera`
  ADD PRIMARY KEY (`id_tipcamera`);

--
-- Indexes for table `tipserviciu`
--
ALTER TABLE `tipserviciu`
  ADD PRIMARY KEY (`id_tipserviciu`);

--
-- Indexes for table `utilizator`
--
ALTER TABLE `utilizator`
  ADD PRIMARY KEY (`id_utilizator`);

--
-- Indexes for table `vas`
--
ALTER TABLE `vas`
  ADD PRIMARY KEY (`id_vas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abonat`
--
ALTER TABLE `abonat`
  MODIFY `id_abonat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `camera`
--
ALTER TABLE `camera`
  MODIFY `id_camera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `locatiecamera`
--
ALTER TABLE `locatiecamera`
  MODIFY `id_locatiecamera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produs`
--
ALTER TABLE `produs`
  MODIFY `id_produs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rezervare`
--
ALTER TABLE `rezervare`
  MODIFY `id_rezervare` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tipcamera`
--
ALTER TABLE `tipcamera`
  MODIFY `id_tipcamera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tipserviciu`
--
ALTER TABLE `tipserviciu`
  MODIFY `id_tipserviciu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilizator`
--
ALTER TABLE `utilizator`
  MODIFY `id_utilizator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `vas`
--
ALTER TABLE `vas`
  MODIFY `id_vas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_utilizator`) REFERENCES `utilizator` (`id_utilizator`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `camera`
--
ALTER TABLE `camera`
  ADD CONSTRAINT `camera_ibfk_1` FOREIGN KEY (`id_locatiecamera`) REFERENCES `locatiecamera` (`id_locatiecamera`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `camera_ibfk_2` FOREIGN KEY (`id_tipcamera`) REFERENCES `tipcamera` (`id_tipcamera`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`id_vas`) REFERENCES `vas` (`id_vas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`id_utilizator`) REFERENCES `utilizator` (`id_utilizator`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_ibfk_3` FOREIGN KEY (`id_camera`) REFERENCES `camera` (`id_camera`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Constraints for table `produs`
--
ALTER TABLE `produs`
  ADD CONSTRAINT `produs_ibfk_1` FOREIGN KEY (`id_vas`) REFERENCES `vas` (`id_vas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produs_ibfk_2` FOREIGN KEY (`id_tipserviciu`) REFERENCES `tipserviciu` (`id_tipserviciu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rezervare`
--
ALTER TABLE `rezervare`
  ADD CONSTRAINT `rezervare_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rezervare_ibfk_2` FOREIGN KEY (`id_produs`) REFERENCES `produs` (`id_produs`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
