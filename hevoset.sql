-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16.04.2019 klo 12:11
-- Palvelimen versio: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hevoset`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `hevoset`
--

CREATE TABLE `hevoset` (
  `id` int(11) NOT NULL,
  `nimi` varchar(30) NOT NULL,
  `rotu` varchar(30) NOT NULL,
  `omistaja` int(3) NOT NULL,
  `isa` varchar(30) NOT NULL,
  `ema` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `hevoset`
--

INSERT INTO `hevoset` (`id`, `nimi`, `rotu`, `omistaja`, `isa`, `ema`) VALUES
(1, 'Aatamin Helmi', 'Suomenhevonen', 19, 'Aatami', 'H.V.Heluriina'),
(2, 'Asten Pride', 'Lämminverinen', 18, 'Cody', 'Frossa'),
(3, 'Vinhatuuri', 'Suomenhevonen', 17, 'Tähentuuri', 'Viikales'),
(4, 'Tähentuuri', 'Suomenhevonen', 16, 'Viesker', 'Tähden Satu'),
(5, 'Corinna', 'Suomenhevonen', 15, 'Liising', 'Tarjatar'),
(6, 'Tarjatar', 'Suomenhevonen', 14, 'Turo', 'Tunteva'),
(7, 'Aronin Muisto', 'Suomenhevonen', 13, 'Fannin Muisto', 'Aronin Mirkku'),
(8, 'Aronin Mirkku', 'Suomenhevonen', 12, 'Viesker', 'Aroni'),
(9, 'Fancy Greek', 'Lämminverinen', 11, 'The Bosses Lindy ', 'Val Capone '),
(10, 'Val Capone', 'Lämminverinen', 10, 'Muscles Yankee', 'Striking Val'),
(11, 'Sundsvik Real Love', 'Lämminverinen', 9, 'David Raymond ', 'Andrea Hir'),
(12, 'Religious', 'Lämminverinen', 8, 'Pastor Stephen', 'Pepita Zet'),
(13, 'Singer', 'Suomenhevonen', 7, 'Suikun Ero', 'Rinkeli'),
(14, 'Mamacita', 'Lämminverinen', 6, 'Zola Boko', 'Ukunora'),
(15, 'Fair Boost', 'Lämminverinen', 5, 'Broke Even', 'Baggage Boost '),
(17, 'Broke Even', 'Lämminverinen', 3, 'Valley Victory', 'Almost An Angel'),
(18, 'Turbo Olli', 'Suomenhevonen', 2, 'Tutuari', 'Aiheen Sinkaus '),
(19, 'Tutuari', 'Suomenhevonen', 1, 'Hovi-Ari ', 'Simolan Tutu'),
(20, 'Eli Wallach', 'Lämminverinen', 18, 'Pato', 'Conehills Natalia '),
(21, 'Marsello', 'Suomenhevonen', 17, 'Tutuari', 'Marinelli'),
(22, 'Jiminy Cricket M', 'Puoliverinen', 16, 'Fiance Noir 135', 'Zee Easy'),
(23, 'Chisu M', 'Puoliverinen', 15, 'Chacoon Blue', 'Quite Easy'),
(24, 'BIRCHCAPE\'S WONDERLAND', 'Puoliverinen', 14, 'Wizzerd', '-'),
(31, 'htdgf', 'dgn', 0, 'b', 'fdb'),
(33, 'Dolopan', 'Shetlanninponi', 0, 'Zorro', 'Dolly'),
(34, 'jgfi 876', '76r8 ', 76, '768', ' 687t '),
(35, 'ytr76', '65e8u', 0, '654e87u', '6587'),
(36, '52', '3q526', 3, 'whert7y', 'trwhs');

-- --------------------------------------------------------

--
-- Rakenne taululle `kayttajat`
--

CREATE TABLE `kayttajat` (
  `ID` int(11) NOT NULL,
  `NIMI` varchar(10) NOT NULL,
  `SALASANA` varchar(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `kuva` blob NOT NULL,
  `kuvaus` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `kayttajat`
--

INSERT INTO `kayttajat` (`ID`, `NIMI`, `SALASANA`, `kuva`, `kuvaus`, `email`) VALUES
(1, 'Testaaja', 'salasana', '', '', 'testi@kayttaja.fi'),
(2, 'emppu', 'emppu', '', '    Oon 12v heppatyttö ja tykkään shettiksistä, olis kiva saada uusia kavereita.', 'emilia@matikainen.fi'),
(3, 'ansku', 'ansku', '', '', 'anna@heppaset.fi'),
(6, 'Minni', 'minnihiiri', '', '', 'minnihiiri@gmail.com'),
(7, 'Minni', 'minnihiiri', '', '', 'minnihiiri@gmail.com'),
(8, 'minni', 'minnihiiri', '', '', 'minnihiiri@gmail.com');

-- --------------------------------------------------------

--
-- Rakenne taululle `keskustelu`
--

CREATE TABLE `keskustelu` (
  `id` int(11) NOT NULL,
  `aihe` text NOT NULL,
  `teksti` varchar(200) NOT NULL,
  `nikki` text NOT NULL,
  `vastaus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `keskustelu`
--

INSERT INTO `keskustelu` (`id`, `aihe`, `teksti`, `nikki`, `vastaus`) VALUES
(1, 'Nuori sh-tamma raviliisinkiin? ', 'Noniin, kysytäämpäs täältä. Minulla nuori (s. 2015) suomenhevostamma jota olen rauhakseen laitellut, paljon ajettu ja on reipas mutta kuuliainen ajettava. Hyvä tapainen yksin ja laumassa. Sukua löytyy', 'Jaana', 0),
(2, 'Tänään kaikki Kuopioon raveihin! ', 'Tai ainakin melkein kaikki mielellään kaikki!', 'Jokuvaan', 0),
(3, ' Pääsylipun hinta Seinäjoki Race ', 'Onko täällä tietoa minkä hintaiset ovat pääsylipun hinnat kyseiseen tapahtumaan?', 'Heikki', 0),
(4, 'Lämmitys kilpailusuuntaan ', 'Olen lopettelemassa lämmitystä kilpailusuuntaan ja haluaisin hiljentää ja kääntää hevosen ympäri, mutta takaa tulee kahta rataa muita valjakoita. Miten toimia?', 'kyselijä', 0),
(5, 'Huomiset kisat', 'Moi! Onko kukaan menossa huomenna Kainuun estekisoihin?', 'Terhi', 0),
(6, 'Ratsastuskisat', 'Onko kukaan menossa huomenna Kainuus estekisoihin?', 'emppu', 0),
(7, 'moikka', 'olen uusi käyttäjä täällä.', 'emppu', 0);

-- --------------------------------------------------------

--
-- Rakenne taululle `omistaja`
--

CREATE TABLE `omistaja` (
  `id` int(11) NOT NULL,
  `nimi` varchar(30) NOT NULL,
  `paikkakunta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `omistaja`
--

INSERT INTO `omistaja` (`id`, `nimi`, `paikkakunta`) VALUES
(1, 'Annemari Sipilä', 'Kainuu'),
(2, 'Diamond Farm', 'Helsinki'),
(3, 'Eero Eljanko', 'Loimaa'),
(4, 'Hannu Nivola', 'Tampere'),
(5, 'Harri Puutio', 'Helsinki'),
(6, 'J.J.R-Talli & Rösch Minna', 'Tampere'),
(7, 'Jukka Leinonen', 'Mäntyharju'),
(8, 'Jenni Hämäläinen', 'Inari'),
(9, 'Jonna Irri', 'Äänekoski'),
(10, 'Kari Harju', 'Helsinki'),
(11, 'Kinnunen Heikki&Heli&Venla', 'Jyväskylä'),
(12, 'Maatalousyhtymä Niemelä&Sorv', 'Loimaa'),
(13, 'Marle Pärssinen', 'Äänekoski'),
(14, 'MF-Horsemanship', 'Äänekoski'),
(15, 'Pauliina Moisio', 'Sammatti'),
(16, 'Ravitalli Moukantuuri Oy', 'Tuuri'),
(17, 'Tapio Nurmi', 'Hämeenlinna'),
(18, 'Tiimi Rellulla Raveihin', 'Helsinki'),
(19, 'Vesa Kivinen', 'Valkeala');

-- --------------------------------------------------------

--
-- Rakenne taululle `ratsastussijotukset`
--

CREATE TABLE `ratsastussijotukset` (
  `pvm` date NOT NULL,
  `hevosen_id` int(11) NOT NULL,
  `sijoitus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `ratsastussijotukset`
--

INSERT INTO `ratsastussijotukset` (`pvm`, `hevosen_id`, `sijoitus`) VALUES
('2017-02-05', 22, 1),
('2017-02-05', 23, 2),
('2017-02-05', 24, 5),
('2018-06-02', 22, 3),
('2019-01-02', 23, 2),
('2019-01-02', 22, 2),
('2019-03-03', 24, 5);

-- --------------------------------------------------------

--
-- Rakenne taululle `ravisijoitukset`
--

CREATE TABLE `ravisijoitukset` (
  `sijoitus` int(11) NOT NULL,
  `pvm` date NOT NULL,
  `hevosen_id` int(11) NOT NULL,
  `aika` float NOT NULL,
  `lahto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `ravisijoitukset`
--

INSERT INTO `ravisijoitukset` (`sijoitus`, `pvm`, `hevosen_id`, `aika`, `lahto`) VALUES
(1, '0000-00-00', 2, 27.3, 6),
(2, '2017-05-04', 3, 28.9, 6),
(3, '2017-05-04', 6, 30.05, 6),
(1, '2017-04-02', 2, 14.15, 1),
(2, '2017-05-02', 9, 15.02, 1),
(3, '2017-05-02', 12, 15.1, 1),
(1, '2017-05-02', 18, 27.6, 3),
(2, '2018-03-03', 6, 29.6, 3),
(1, '2019-01-01', 6, 28, 9),
(3, '2017-05-04', 6, 30.05, 6),
(1, '2017-04-02', 2, 14.15, 1),
(2, '2017-05-02', 9, 15.02, 1),
(3, '2017-05-02', 12, 15.1, 1),
(1, '2017-05-02', 18, 27.6, 3),
(2, '2018-03-03', 6, 29.6, 3),
(1, '2019-01-01', 6, 28.5, 9),
(3, '2017-05-04', 6, 30.05, 6),
(1, '2017-04-02', 2, 14.15, 1),
(2, '2017-05-02', 9, 15.02, 1),
(3, '2017-05-02', 12, 15.1, 1),
(1, '2017-05-02', 18, 27.6, 3),
(2, '2018-03-03', 6, 29.6, 3),
(1, '2019-01-01', 6, 28.5, 9),
(3, '2017-05-04', 6, 30.05, 6),
(1, '2017-04-02', 2, 14.15, 1),
(2, '2017-05-02', 9, 15.02, 1),
(3, '2017-05-02', 12, 15.1, 1),
(1, '2017-05-02', 18, 27.6, 3),
(2, '2018-03-03', 6, 29.6, 3),
(1, '2019-01-01', 6, 28.5, 9),
(9, '2019-01-01', 19, 38.65, 9),
(7, '2018-05-05', 19, 37.37, 6),
(5, '2018-05-05', 17, 16.16, 6);

-- --------------------------------------------------------

--
-- Rakenne taululle `vastaus`
--

CREATE TABLE `vastaus` (
  `id` int(11) NOT NULL,
  `aiheid` int(11) NOT NULL,
  `vastaus` varchar(200) NOT NULL,
  `nimimerkki` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `vastaus`
--

INSERT INTO `vastaus` (`id`, `aiheid`, `vastaus`, `nimimerkki`) VALUES
(1, 1, 'Voi kiinnostaakin. Liisajalle kulut ja palkintorahoista 70 %n sulle 30 %. Prosentit voi olla myös 80/20 tai ihan mitä sovitte.', 'Seija'),
(2, 1, 'liisaaja täytyy olla jo ennestään tuttu. Oikeudessa tai muissa riita-asioissa kyllä tutustutte. Vältä ne hyvät puhujat vaan anna tilastojen kertoa millainen kuka on kuka hevosmiestaidoissa.', 'Nella'),
(3, 2, 'tännään kaakki Kuopijjoon ja tulossa ollaan vaekka onnii vesjkeli', 'hönö'),
(4, 4, 'Menet kotiin ja lämmität saunan, vai.', 'Saunoja'),
(5, 4, 'Ajat riittävän aikaisin ulos ja jos et ehdi pysyt sisällä ja annat niiden ohittaa , tietty', 'Minävain'),
(6, 0, 'hedztgjn', 'emppu'),
(7, 0, '25 euroa maksaa tänä vuonna, aika kalliit.', 'emppu'),
(8, 0, 'Itsekkin kysyin juuri samaa, täältä Tampereelta ainakin lähdössä yksi.', 'emppu'),
(18, 3, '25 euroa maksaa tänä vuonna, taas on hinnat noussu!', 'emppu');

-- --------------------------------------------------------

--
-- Rakenne taululle `viestit`
--

CREATE TABLE `viestit` (
  `id` int(11) NOT NULL,
  `lahettaja` int(11) NOT NULL,
  `viesti` int(11) NOT NULL,
  `sahkoposti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hevoset`
--
ALTER TABLE `hevoset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kayttajat`
--
ALTER TABLE `kayttajat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `keskustelu`
--
ALTER TABLE `keskustelu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `omistaja`
--
ALTER TABLE `omistaja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vastaus`
--
ALTER TABLE `vastaus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viestit`
--
ALTER TABLE `viestit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hevoset`
--
ALTER TABLE `hevoset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `kayttajat`
--
ALTER TABLE `kayttajat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keskustelu`
--
ALTER TABLE `keskustelu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `omistaja`
--
ALTER TABLE `omistaja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vastaus`
--
ALTER TABLE `vastaus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `viestit`
--
ALTER TABLE `viestit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
