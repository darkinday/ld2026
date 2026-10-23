SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `aktorzy` (
  `id_aktora` int(11) NOT NULL,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL,
  `ocena` tinyint(4) NOT NULL DEFAULT 0,
  `plik_awatara` varchar(255) NOT NULL DEFAULT 'awatar_nieznany.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `aktorzy` (`id_aktora`, `imie`, `nazwisko`, `ocena`, `plik_awatara`) VALUES
(1, 'Baptiste', 'Lemoine', 3, 'awatar_2.jpg'),
(2, 'Élodie', 'Laurent', 4, 'awatar_1.jpg'),
(3, 'Jerzy', 'Pasek', 4, 'awatar_3.jpg'),
(4, 'Mathilde', 'Anaïs', 5, 'awatar_8.jpg'),
(5, 'Pablo', 'Gallo', 4, 'awatar_4.jpg'),
(6, 'Matteo', 'Jímenez', 3, 'awatar_5.jpg'),
(7, 'Davide', 'Costaluca', 2, 'awatar_6.jpg'),
(8, 'Lorenzo', 'Di Romano', 5, 'awatar_7.jpg'),
(9, 'Sobiesław', 'Kubiszyn', 4, 'awatar_10.jpg'),
(10, 'Pinto', 'Teixeira', 3, 'awatar_9.jpg');

CREATE TABLE `filmy` (
  `id_filmu` int(11) NOT NULL,
  `tytul` varchar(255) NOT NULL,
  `rok_produkcji` year(4) NOT NULL,
  `czas_trwania` tinyint(3) UNSIGNED NOT NULL,
  `rezyser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `filmy` (`id_filmu`, `tytul`, `rok_produkcji`, `czas_trwania`, `rezyser`) VALUES
(1, 'Podróż do Gwiazdorii', '2020', 120, 'Smithson J.'),
(2, 'Tajemnica Zaginionego Klucza', '2015', 95, 'Anderson K.'),
(3, 'Skradzione Sny', '2018', 110, 'Johnson R.'),
(4, 'Echo Czasu', '2012', 80, 'Williams S.'),
(5, 'Labirynt Mrocznych Dróg', '2010', 130, 'Miller T.'),
(6, 'Złodziejka Czasu', '2017', 105, 'Clarkson L.'),
(7, 'Gwiazda na Dnie Oceanu', '2019', 115, 'Roberts M.'),
(8, 'Nocne Opowieści', '2014', 100, 'Evans B.'),
(9, 'Skrywana Prawda', '2016', 125, 'Adams W.'),
(10, 'Księżycowy Ogień', '2013', 90, 'Turner P.'),
(11, 'Wyspa Fantazji', '2011', 135, 'Harrison Q.'),
(12, 'Zagubiona Melodia', '2009', 70, 'Stewart D.'),
(13, 'Aniołowie Stróżowie', '2008', 140, 'Cooper A.'),
(14, 'Zaklęty Las', '2007', 150, 'Grayson E.'),
(15, 'Obłoki Nadziei', '2006', 115, 'Bennett H.');

CREATE TABLE `filmy_aktorzy` (
  `id_aktora` int(11) NOT NULL,
  `id_filmu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `filmy_aktorzy` (`id_aktora`, `id_filmu`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(1, 10),
(1, 11),
(1, 14),
(1, 15),
(2, 1),
(2, 5),
(2, 6),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(3, 2),
(3, 4),
(3, 5),
(3, 6),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 15),
(4, 2),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 15),
(5, 1),
(5, 2),
(5, 3),
(5, 5),
(5, 8),
(5, 10),
(5, 11),
(5, 13),
(5, 14),
(6, 1),
(6, 3),
(6, 5),
(6, 9),
(6, 12),
(6, 13),
(6, 14),
(6, 15),
(7, 1),
(7, 3),
(7, 4),
(7, 6),
(7, 7),
(7, 8),
(7, 9),
(7, 10),
(7, 11),
(7, 13),
(7, 15),
(9, 1),
(9, 2),
(9, 3),
(9, 5),
(9, 6),
(9, 8),
(9, 9),
(9, 10),
(9, 12),
(9, 13),
(9, 14),
(10, 3),
(10, 8),
(10, 9),
(10, 10),
(10, 12),
(10, 13),
(10, 15);

ALTER TABLE `aktorzy`
  ADD PRIMARY KEY (`id_aktora`);

ALTER TABLE `filmy`
  ADD PRIMARY KEY (`id_filmu`);

ALTER TABLE `filmy_aktorzy`
  ADD PRIMARY KEY (`id_aktora`,`id_filmu`),
  ADD KEY `filmy_aktorzy_ibfk_2` (`id_filmu`);

ALTER TABLE `aktorzy`
  MODIFY `id_aktora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `filmy`
  MODIFY `id_filmu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

ALTER TABLE `filmy_aktorzy`
  ADD CONSTRAINT `filmy_aktorzy_ibfk_1` FOREIGN KEY (`id_aktora`) REFERENCES `aktorzy` (`id_aktora`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `filmy_aktorzy_ibfk_2` FOREIGN KEY (`id_filmu`) REFERENCES `filmy` (`id_filmu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
