-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2017 at 06:33 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `votepool`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `userName`, `password`) VALUES
(1, 'buddhika priyabhashana', 'buddhika', '$2y$10$bLHY.8NDSuadq7/03OHX.eeb1Ab3yJVy9xL/9pGRUBCOoDdiPqkBW');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `pollingDivision` varchar(20) NOT NULL,
  `electrolDistrictId` varchar(20) NOT NULL,
  PRIMARY KEY (`pollingDivision`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`pollingDivision`, `electrolDistrictId`) VALUES
('Agalawatte', 'KAL'),
('Akmeemana ', 'GAl'),
('Akuressa', 'MTR'),
('Ambalangoda', 'GAl'),
('Ampara', 'AMP'),
('Anamaduwa', 'PUT'),
('Anuradhapura-east', 'ANU'),
('Anuradhapura-west', 'ANU'),
('Aranayake', 'KEG'),
('Attanagalla', 'GAM'),
('Avissawella', 'COL'),
('Baddegama', 'GAl'),
('Badulla', 'BAD'),
('Balangoda', 'RAT'),
('Balapitiya', 'GAl'),
('Bandaragama', 'KAL'),
('Bandarawela ', 'BAD'),
('Batticaloa ', 'BAT'),
('Beliatta', 'HAM'),
('Bentara-Elpitiya', 'GAl'),
('Beruwela', 'KAL'),
('Bibile', 'MON'),
('Bingiriya', 'KUR'),
('Biyagama ', 'GAM'),
('Borella', 'COL'),
('Bulathsinhala', 'KAL'),
('Chilaw', 'PUT'),
('Colombo Central', 'COL'),
('Colombo East', 'COL'),
('Colombo North', 'COL'),
('Colombo West', 'COL'),
('Dambadeniya', 'KUR'),
('Dambulla', 'MTL'),
('Dedigama', 'KEG'),
('Dehiwela', 'COL'),
('Deniyaya', 'MTR'),
('Deraniyagala', 'KEG'),
('Devinuwara', 'MTR'),
('Divulapitiya', 'GAM'),
('Dodangaslanda', 'KUR'),
('Dompe', 'GAM'),
('Eheliyagoda', 'RAT'),
('Galagedara', 'KAN'),
('Galgamuwa', 'KUR'),
('Galigamuwa', 'KEG'),
('Galle', 'GAl'),
('Gampaha', 'GAM'),
('Gampola ', 'KAN'),
('Habaraduwa', 'GAl'),
('Hakmana', 'MTR'),
('Hali-ela', 'BAD'),
('Hanguranketa ', 'NUW'),
('Haputale', 'BAD'),
('Harispattuwa', 'KAN'),
('havakachcheri', 'JAF'),
('Hewaheta', 'KAN'),
('Hiniduma', 'GAl'),
('Hiriyala', 'KUR'),
('Homagama', 'COL'),
('Horana', 'KAL'),
('Horowupotana', 'ANU'),
('Ja-ela', 'GAM'),
('Jaffna ', 'JAF'),
('Kaduwela', 'COL'),
('Kalawana ', 'RAT'),
('Kalawewa', 'ANU'),
('Kalkudah', 'BAT'),
('Kalmunai', 'AMP'),
('Kalutara', 'KAL'),
('Kamburupitiya', 'MTR'),
('Kankesanturai', 'JAF'),
('Karandeniya', 'GAl'),
('Katana', 'GAM'),
('Katugampola', 'KUR'),
('Kayts', 'JAF'),
('Kegalle', 'KEG'),
('Kekirawa', 'ANU'),
('Kelaniya', 'GAM'),
('Kesbewa ', 'COL'),
('Kilinochchi', 'JAF'),
('Kolonna', 'RAT'),
('Kolonnawa', 'COL'),
('Kopay', 'JAF'),
('Kotmale', 'NUW'),
('Kotte', 'COL'),
('Kuliyapitiya', 'KUR'),
('Kundasale', 'KAN'),
('Kurunegala', 'KUR'),
('Laggala', 'MTL'),
('Mahanuwara', 'KAN'),
('Mahara', 'GAM'),
('Maharagama', 'COL'),
('Mahiyangane', 'BAD'),
('Manipay', 'JAF'),
('Mannar', 'VAN'),
('Matale ', 'MTL'),
('Matara ', 'MTR'),
('Matugama', 'KAL'),
('Mawanella', 'KEG'),
('Mawathagama', 'KUR'),
('Medirigiriya ', 'POL'),
('Mihintale ', 'ANU'),
('Minneriya', 'POL'),
('Minuwangoda', 'GAM'),
('Mirigama', 'GAM'),
('Moneragala ', 'MON'),
('Moratuwa', 'COL'),
('Mulkirigala', 'HAM'),
('Mullaitivu', 'VAN'),
('Mutur', 'TRI'),
('Nallur', 'JAF'),
('Nattandiya ', 'PUT'),
('Nawalapitiya', 'KAN'),
('Negombo', 'GAM'),
('Nikaweratiya', 'KUR'),
('Nivitigala', 'RAT'),
('Nuwara Eliya-Maskeli', 'NUW'),
('Padiruppu', 'BAT'),
('Panadura', 'KAL'),
('Panduwasnuwara', 'KUR'),
('Passara', 'BAD'),
('Patha-dumbara', 'KAN'),
('Pelmadulla', 'RAT'),
('Point Pedro', 'JAF'),
('Polgahawela', 'KUR'),
('Polonnaruwa', 'POL'),
('Potuvil ', 'AMP'),
('Puttalam', 'PUT'),
('Rakwana', 'RAT'),
('Rambukkana', 'KEG'),
('Ratgama', 'GAl'),
('Ratmalana', 'COL'),
('Ratnapura', 'RAT'),
('Rattota', 'MTL'),
('Ruwanwella ', 'KEG'),
('Sammanturai', 'AMP'),
('Senkadagala', 'KAN'),
('Seruwila', 'TRI'),
('Tangalle ', 'HAM'),
('Teldeniya', 'KAN'),
('Tissamaharama', 'HAM'),
('Trincomalee ', 'TRI'),
('Uda-dumbara', 'KAN'),
('Udunuwara', 'KAN'),
('Udupiddy', 'JAF'),
('Uva-paranagama', 'BAD'),
('Vaddukkodai', 'JAF'),
('Vavuniya ', 'VAN'),
('Walapane', 'NUW'),
('Wariyapola', 'KUR'),
('Wattala', 'GAM'),
('Weligama', 'MTR'),
('Welimada', 'BAD'),
('Wellawaya', 'MON'),
('Wennappuwa', 'PUT'),
('Wiyaluwa', 'BAD'),
('Yapahuwa', 'KUR'),
('Yatinuwara', 'KAN'),
('Yatiyantota', 'KEG');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `candidateNumber` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `province` varchar(20) NOT NULL,
  `electrolDistrictId` varchar(20) NOT NULL,
  `partyId` varchar(20) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `votes` int(10) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`no`, `candidateNumber`, `name`, `province`, `electrolDistrictId`, `partyId`, `photo`, `votes`) VALUES
(4, 3, 'nishan', 'North Western', 'BAT', 'UNP', '2.jpg', NULL),
(5, 1, 'amal', 'Western', 'COL', 'KFC', '1.Shamsul Alam ( Team Leader ).jpg', NULL),
(6, 2, 'kamal', 'Western', 'COL', 'BCC', '2. Mohammad Tajuddin Pappu.jpg', NULL),
(7, 3, 'sunil', 'Western', 'COL', 'ABC', '3. Md Hafizur Rahman ( Int  Umpire).jpg', NULL),
(8, 4, 'ranil', 'Western', 'COL', 'UNP', '4. Kh Al Mostafa Billah ( Coach  ).jpg', NULL),
(9, 5, 'rukshan', 'Western', 'COL', 'ABC', '5. Md. Imran Hossain(Player  U-18).jpg', NULL),
(10, 6, 'john', 'Western', 'COL', 'KFC', '6. Md Rifat Mahmud ( U-18 ).jpg', NULL),
(11, 7, 'dayasiri', 'Western', 'COL', 'UNP', '7. Antu Hossain.jpg', NULL),
(12, 8, 'ravi', 'Western', 'COL', 'ABC', '8. Mohutasin Ahmed ( U-15 ).jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districtinspectors`
--

CREATE TABLE IF NOT EXISTS `districtinspectors` (
  `id` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `electrolDistrictId` varchar(20) NOT NULL,
  PRIMARY KEY (`electrolDistrictId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districtinspectors`
--

INSERT INTO `districtinspectors` (`id`, `name`, `password`, `electrolDistrictId`) VALUES
('825271419v', 'nimal', '$2y$10$vOG2AyZnBgHzL2atBUu4fuyZZROyxuUUhGu7CSkei8u7JXZdofzvW', 'AMP'),
('789456123v', 'kamal', '0', 'ANU'),
('789456121v', 'sunil', '0', 'BAD'),
('862457962v', 'rajitha', '0', 'BAT'),
('123456789v', 'nishantha', '$2y$10$KEJPho406Jo6.XH8xihPjOtxnGZaV1S5N7nsz2eK5fqQkpyzuY/Dq', 'COL'),
('489156256v', 'nimesh', '0', 'GAL'),
('741852963v', 'godagama', '0', 'GAM'),
('478962547v', 'chinthaka', '0', 'HAM'),
('478963254v', 'suresh', '0', 'JAF'),
('856321475v', 'prabath', '0', 'KAL'),
('864795236v', 'kushantha', '0', 'KAN'),
('478562145v', 'shehan', '0', 'KEG'),
('478963254v', 'janaka', '$2y$10$iP6CwaUEXajSEoJI6Lbv.uYJv/o5lO5sB6FIrm56v.4UR/fKOnAMq', 'KUR'),
('473582152v', 'isuru', '0', 'MON'),
('479652358v', 'liyon', '0', 'MTL'),
('741265894v', 'hasitha', '0', 'MTR'),
('479658214v', 'deeptha', '0', 'NUW'),
('496582314v', 'rumesh', '0', 'POL'),
('752478952v', 'yasindu', '0', 'PUT'),
('478965234v', 'srinath', '0', 'RAT'),
('478356485v', 'darshan', '0', 'TRI'),
('654789652v', 'suranga', '0', 'VAN');

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE IF NOT EXISTS `election` (
  `type` varchar(50) NOT NULL,
  `eday` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`type`, `eday`, `startTime`, `endTime`) VALUES
('Parliamentary Election', '2017-08-15', '08:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE IF NOT EXISTS `party` (
  `partyId` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `electrolDistrictId` varchar(20) NOT NULL,
  `logo` varchar(200) NOT NULL,
  PRIMARY KEY (`partyId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`partyId`, `name`, `electrolDistrictId`, `logo`) VALUES
('ABC', 'Supahan', 'COL', '2.jpg'),
('BCC', 'Samagi', 'COL', '500010432f40b4b92ceef9631ca25a64--christmas-graphic-design-christmas-tree-design.jpg'),
('HCC', 'horizon', 'COL', '1.jpg'),
('KFC', 'Freedom', 'COL', '683911_weather_512x512.png'),
('SLNP', 'sri lnka nidahas pakshaya', 'ANU', '2.jpg'),
('UNP', 'united national party', 'COL', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE IF NOT EXISTS `seats` (
  `electrolDistrictId` varchar(20) NOT NULL,
  `electrolDistrict` varchar(20) NOT NULL,
  `province` varchar(20) NOT NULL,
  `count` int(3) NOT NULL,
  PRIMARY KEY (`electrolDistrictId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`electrolDistrictId`, `electrolDistrict`, `province`, `count`) VALUES
('AMP', 'Ampara', 'Eastern', 7),
('ANU', 'Anuradhapura', 'North Central', 9),
('BAD', 'Badulla', 'Uva', 8),
('BAT', 'Batticaloa', 'Eastern', 5),
('COL', 'Colombo', 'Western', 19),
('GAL', 'Galle', 'Southern', 10),
('GAM', 'Gampaha', 'Western', 18),
('HAM', 'Hambantota', 'Southern', 7),
('JAF', 'Jafna', 'Northern', 7),
('KAL', 'Kalutara', 'Western', 10),
('KAN', 'Kandy', 'Central', 12),
('KEG', 'Kegalla', 'Sabaragamuwa', 9),
('KUR', 'Kurunegala', 'North Western', 15),
('MON', 'Monaragala', 'Uva', 5),
('MTL', 'Matale', 'Central', 5),
('MTR', 'Matara', 'Southern', 8),
('NUW', 'Nuwara Eliya', 'Central', 8),
('POL', 'Polonnaruwa', 'North Central', 5),
('PUT', 'Puttalam', 'North Western', 8),
('RAT', 'Ratnapura', 'Sabaragamuwa', 11),
('TRI', 'Trincomalee', 'Eastern', 4),
('VAN', 'Vanni', 'Northern', 6);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE IF NOT EXISTS `station` (
  `pollingDistrict` varchar(20) NOT NULL,
  `pollingDivision` varchar(20) NOT NULL,
  PRIMARY KEY (`pollingDistrict`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`pollingDistrict`, `pollingDivision`) VALUES
('Angulaana', 'Moratuwa'),
('Borupana', 'Moratuwa'),
('Dahampura', 'Moratuwa'),
('egodauyana', 'Moratuwa'),
('Idibadda', 'Moratuwa'),
('Katubadda', 'Moratuwa'),
('katukurunda', 'Moratuwa'),
('Koralawella', 'Moratuwa'),
('Moratumulla', 'Moratuwa'),
('Moratuwa', 'Moratuwa'),
('Rawatawaththa', 'Moratuwa'),
('Soisapura', 'Moratuwa'),
('Uyana', 'Moratuwa'),
('Villurawaththa', 'Moratuwa');

-- --------------------------------------------------------

--
-- Table structure for table `stationinspectors`
--

CREATE TABLE IF NOT EXISTS `stationinspectors` (
  `id` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `electrolDistrictId` varchar(20) DEFAULT NULL,
  `pollingDistrictId` varchar(20) NOT NULL,
  PRIMARY KEY (`pollingDistrictId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stationinspectors`
--

INSERT INTO `stationinspectors` (`id`, `name`, `password`, `electrolDistrictId`, `pollingDistrictId`) VALUES
('123456789v', 'nishan', '$2y$10$t44RqUeVBiDKPkXnCHL1H.J0zJ.IRkN6ELkb.GlY4S2Iy7rIpR0A2', 'COL', 'Angulaana'),
('123456789v', 'kamal', '$2y$10$u1uTFzDaBo4UJ4EtYQGFQu3MuQEeiD8NcEIYSeKp4j6C/LUbByGAO', 'COL', 'Borupana'),
('123456789v', 'kamal', '$2y$10$6zjkTizFWWQIUBh0eekor.thtGX0N0j4zETaZtrEllpvGBputVZr2', 'COL', 'Katubadda'),
('123456789v', 'nishan', '$2y$10$lK76DJwOW0FeJefWRqoEMeTezXOlpA3SaGEuhveFfhNjof8Q.2PNa', 'COL', 'Moratuwa'),
('123454321v', 'kasun', '$2y$10$ZZKabDZV4JcYfRlGPmaGwe92zZF3hI4EcKNx.lnHLdzB/BHGQrjGa', 'COL', 'Soisapura');

-- --------------------------------------------------------

--
-- Table structure for table `tempcandidate`
--

CREATE TABLE IF NOT EXISTS `tempcandidate` (
  `candidateNumber` int(10) NOT NULL,
  `electrolDistrictId` varchar(20) NOT NULL,
  `partyId` varchar(20) NOT NULL,
  `votes` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempcandidate`
--

INSERT INTO `tempcandidate` (`candidateNumber`, `electrolDistrictId`, `partyId`, `votes`) VALUES
(3, 'BAT', 'UNP', 3),
(1, 'COL', 'KFC', 4),
(2, 'COL', 'BCC', 2),
(3, 'COL', 'ABC', 3),
(4, 'COL', 'UNP', 11),
(5, 'COL', 'ABC', 3),
(6, 'COL', 'KFC', 2),
(7, 'COL', 'UNP', 11),
(8, 'COL', 'ABC', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tempparties`
--

CREATE TABLE IF NOT EXISTS `tempparties` (
  `partyId` varchar(20) NOT NULL,
  `AMP` int(10) DEFAULT NULL,
  `ANU` int(10) DEFAULT NULL,
  `BAD` int(10) DEFAULT NULL,
  `BAT` int(10) DEFAULT NULL,
  `COL` int(10) DEFAULT NULL,
  `GAL` int(10) DEFAULT NULL,
  `GAM` int(10) DEFAULT NULL,
  `HAM` int(10) DEFAULT NULL,
  `JAF` int(10) DEFAULT NULL,
  `KAL` int(10) DEFAULT NULL,
  `KAN` int(10) DEFAULT NULL,
  `KEG` int(10) DEFAULT NULL,
  `KUR` int(10) DEFAULT NULL,
  `MTL` int(10) DEFAULT NULL,
  `MTR` int(10) DEFAULT NULL,
  `MON` int(10) DEFAULT NULL,
  `NUW` int(10) DEFAULT NULL,
  `POL` int(10) DEFAULT NULL,
  `PUT` int(10) DEFAULT NULL,
  `RAT` int(10) DEFAULT NULL,
  `TRI` int(10) DEFAULT NULL,
  `VAN` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempparties`
--

INSERT INTO `tempparties` (`partyId`, `AMP`, `ANU`, `BAD`, `BAT`, `COL`, `GAL`, `GAM`, `HAM`, `JAF`, `KAL`, `KAN`, `KEG`, `KUR`, `MTL`, `MTR`, `MON`, `NUW`, `POL`, `PUT`, `RAT`, `TRI`, `VAN`) VALUES
('ABC', NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('BCC', NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('HCC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('KFC', NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('SLNP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('UNP', NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tempvoters`
--

CREATE TABLE IF NOT EXISTS `tempvoters` (
  `nic` varchar(10) NOT NULL,
  `approveStatus` int(1) DEFAULT NULL,
  `votedStatus` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempvoters`
--

INSERT INTO `tempvoters` (`nic`, `approveStatus`, `votedStatus`) VALUES
('123456781v', 1, 1),
('123456782v', 1, NULL),
('123456783v', 1, 1),
('123456784v', 1, NULL),
('123456785v', 1, NULL),
('123456786v', 1, NULL),
('1234567878', NULL, NULL),
('123456787v', NULL, NULL),
('123456789v', 1, NULL),
('7894556123', NULL, NULL),
('841730810v', NULL, NULL),
('876543219v', NULL, NULL),
('987654321v', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE IF NOT EXISTS `voters` (
  `nic` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `electrolDistrictId` varchar(20) NOT NULL,
  `pollingDivision` varchar(20) NOT NULL,
  `pollingDistrict` varchar(20) NOT NULL,
  `photo` varchar(200) NOT NULL,
  PRIMARY KEY (`nic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`nic`, `name`, `electrolDistrictId`, `pollingDivision`, `pollingDistrict`, `photo`) VALUES
('123456781v', 'rathnayaka', 'COL', 'Moratuwa', 'Soisapura', '6c1036955b9f3caed2a6da8cbf978742.jpg'),
('123456782v', 'kamal', 'COL', 'Moratuwa', 'Soisapura', '323.jpg'),
('123456783v', 'krishanth', 'COL', 'Moratuwa', 'Soisapura', '135525684.jpg'),
('123456784v', 'sushain', 'COL', 'Moratuwa', 'Soisapura', 'mig.jpg'),
('123456785v', 'dilshan', 'COL', 'Moratuwa', 'Soisapura', 'mig.jpg'),
('123456786v', 'tharaka', 'COL', 'Moratuwa', 'Soisapura', 'passport2.png'),
('1234567878v', 'jayalath', 'COL', 'Moratuwa', 'Soisapura', 'download.jpg'),
('123456787v', 'frank', 'COL', 'Moratuwa', 'Soisapura', 'tomasbig@2x.gif'),
('123456789v', 'rumesh', 'COL', 'Moratuwa', 'Angulaana', '030117_connected_life.jpg'),
('7894556123v', 'aparna', 'MON', 'Balapitiya', 'thumpane', '19990199_2072305336129062_4084465294652884388_n.jpg'),
('841730810v', 'chulaka attanayake', 'GAM', 'Gampaha', 'yakkala', '2.jpg'),
('876543219v', 'kalhara', 'COL', 'Moratuwa', 'Soisapura', 'Data-communication.jpg'),
('987654321v', 'rukshan', 'COL', 'Moratuwa', 'Soisapura', 'computer-networks-08-2v7ejockrp8awypzfj65fu.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
