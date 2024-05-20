-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 05:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `respawn_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `adminID` int(11) NOT NULL,
  `uaID` int(11) DEFAULT NULL,
  `oaID` int(11) DEFAULT NULL,
  `uaPostID` int(11) DEFAULT NULL,
  `oaPostID` int(11) DEFAULT NULL,
  `adminEmail` varchar(45) DEFAULT NULL,
  `adminPassword` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `comment_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ucID` int(11) DEFAULT NULL,
  `ocID` int(11) DEFAULT NULL,
  `ocPostID` int(11) DEFAULT NULL,
  `ucPostID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `comment`, `comment_created_at`, `ucID`, `ocID`, `ocPostID`, `ucPostID`) VALUES
(237, 'hello I saw her ....', '2024-05-18 08:04:25', 13, NULL, NULL, 61),
(238, 'hello this is animal org..', '2024-05-18 08:05:25', 13, NULL, NULL, 61),
(239, 'ronarizz', '2024-05-18 10:00:57', 16, NULL, NULL, 62),
(240, 'pahanap nyo po sa paw patrols', '2024-05-18 10:01:24', 16, NULL, NULL, 62),
(241, 'Yay', '2024-05-18 10:37:40', 18, NULL, NULL, 65),
(242, 'puyat ka lang, matulog ka na ', '2024-05-19 15:05:30', NULL, 5, 71, NULL),
(243, 'mali pa spelling ng hackathon mo teh matulog ka na may exam ka pa', '2024-05-19 22:55:59', 27, NULL, NULL, 82);

-- --------------------------------------------------------

--
-- Table structure for table `org_tb`
--

CREATE TABLE `org_tb` (
  `orgID` int(11) NOT NULL,
  `orgUsername` varchar(45) DEFAULT NULL,
  `orgPassword` varchar(45) DEFAULT NULL,
  `orgName` varchar(45) DEFAULT NULL,
  `orgEmail` varchar(45) DEFAULT NULL,
  `orgContact` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_tb`
--

INSERT INTO `org_tb` (`orgID`, `orgUsername`, `orgPassword`, `orgName`, `orgEmail`, `orgContact`) VALUES
(1, 'animalorg', '1', 'animal org', 'o@gmail.com', '123'),
(2, 'petplace', 'pet', 'pet place', 'pet@gmail.com', '976'),
(3, 'pp', 'pet', 'puppy place', 'pp@gmail.com', '976'),
(4, 'Helping_APet', '222', 'Helping A Pet', 'HelpingAPet@gmail.com', '0912-345-67'),
(5, 'AnimalOrgPH', '111', 'Animal Organization PH', 'animalorg@gmail.com', '0912-345-67'),
(6, 'salaminSalamin', '123', 'Salamin Salamin Organization', 'salamin@gmail.com', NULL),
(7, 'PetOrgPH123', '1234', 'Pet Organization PH', 'petorgph123@gmail.com', NULL),
(8, 'Helping_APet1', '111', 'Helping A Pet', 'HelpingAPet1@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `postorg`
--

CREATE TABLE `postorg` (
  `orgPostID` int(11) NOT NULL,
  `oID` int(11) DEFAULT NULL,
  `orgLocation` varchar(100) DEFAULT NULL,
  `orgCaption` varchar(500) DEFAULT NULL,
  `orgImage` varchar(45) DEFAULT NULL,
  `orgStatus` varchar(45) DEFAULT NULL,
  `org_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `statusofPost` enum('Pending','Approved','Rejected','') NOT NULL DEFAULT 'Pending',
  `type` enum('User','Animal Organization','','') NOT NULL DEFAULT 'Animal Organization',
  `uploadTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postorg`
--

INSERT INTO `postorg` (`orgPostID`, `oID`, `orgLocation`, `orgCaption`, `orgImage`, `orgStatus`, `org_created_at`, `statusofPost`, `type`, `uploadTime`) VALUES
(39, 1, 'sampaloc', 'pusakal', 'cat.png', 'needs help', '2024-05-16 23:03:27', 'Pending', 'Animal Organization', '2024-05-20 00:25:24'),
(40, 4, 'UST MAIN BUILDING', 'Hey furparents! We are Helping A Pet and we a', 'uploads/dogs.jpg', 'open_for_adoption', '2024-05-18 04:23:08', 'Pending', 'Animal Organization', '2024-05-20 00:25:24'),
(41, 5, 'UST MAIN BUILDING', 'Attention! we are currently looking for new furparents ', 'uploads/dog ni joyce.jpg', 'Open for Adoption', '2024-05-18 08:12:02', 'Pending', 'Animal Organization', '2024-05-20 00:25:24'),
(42, 5, 'UP Diliman', 'Attention! we are currently looking for new furparents ', 'uploads/dogs1.jpg', 'Open for Adoption', '2024-05-19 15:02:19', 'Pending', 'Animal Organization', '2024-05-20 00:25:24'),
(43, 5, 'THE Ateneo', 'Attention! we are currently looking for new furparents ', 'uploads/stray dogs.jpg', 'Open for Adoption', '2024-05-19 15:14:42', 'Pending', 'Animal Organization', '2024-05-20 00:25:24'),
(47, 7, 'Nasa kama natutulog ', 'yung eye bags kooo T^T', 'uploads/eyebags.jpg', 'Open for Adoption', '2024-05-19 23:52:27', 'Rejected', 'Animal Organization', '2024-05-20 07:52:14'),
(48, 7, 'UP Diliman', 'Attention! we are currently looking for new furparents ', 'uploads/UP diliman.jpeg', 'Open for Adoption', '2024-05-19 23:56:55', 'Approved', 'Animal Organization', '2024-05-20 07:56:31'),
(49, 8, 'Malate Manila ', 'Hello we are Helping A Pet Organization, we provide food and shelter for stray dogs and cats. We are also open for Adoption. Have a good day everyone!', 'uploads/dog shelter.jpg', 'Open for Adoption', '2024-05-20 03:36:13', 'Approved', 'Animal Organization', '2024-05-20 11:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `postuser`
--

CREATE TABLE `postuser` (
  `userPostID` int(11) NOT NULL,
  `uID` int(11) DEFAULT NULL,
  `userLocation` varchar(100) DEFAULT NULL,
  `userCaption` varchar(500) DEFAULT NULL,
  `userImage` varchar(45) DEFAULT NULL,
  `userStatus` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `statusofPost` enum('Pending','Approved','Rejected','') NOT NULL DEFAULT 'Pending',
  `type` enum('User','Animal Organization','','') NOT NULL DEFAULT 'User',
  `uploadTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postuser`
--

INSERT INTO `postuser` (`userPostID`, `uID`, `userLocation`, `userCaption`, `userImage`, `userStatus`, `created_at`, `statusofPost`, `type`, `uploadTime`) VALUES
(3, 2, 'kyusi', 'askal missing dito', 'askal.png', 'missing', '2024-05-19 16:38:59', 'Rejected', 'User', '2024-05-20 00:24:25'),
(17, 3, 'pearl drive', 'saklolo yung pusa ko nawawala', 'pusako.png', 'missing', '2024-05-19 21:08:55', 'Rejected', 'User', '2024-05-20 00:24:25'),
(35, 3, 'gumana ka na', 'gumana ka na', 'gumana ka na', 'gumana ka na', '2024-05-19 21:22:00', 'Rejected', 'User', '2024-05-20 00:24:25'),
(36, 3, 'plswork', 'plswork', 'plswork', 'plswork', '2024-05-19 21:22:21', 'Rejected', 'User', '2024-05-20 00:24:25'),
(37, 3, 'work', 'work', 'work', 'work', '2024-05-19 21:22:24', 'Rejected', 'User', '2024-05-20 00:24:25'),
(38, 1, 'WORK', 'WORK', 'WORK', 'WORK', '2024-05-19 21:22:26', 'Rejected', 'User', '2024-05-20 00:24:25'),
(39, 1, 'MORATO', 'MAY ASO DITO', 'ASO.PNG', 'MISSING', '2024-05-19 21:22:28', 'Rejected', 'User', '2024-05-20 00:24:25'),
(42, 3, 'city', 'city girl', 'citygirl', 'siyudad', '2024-05-19 21:22:31', 'Rejected', 'User', '2024-05-20 00:24:25'),
(45, 1, '143', '143', '143', '143', '2024-05-19 21:22:33', 'Rejected', 'User', '2024-05-20 00:24:25'),
(49, 1, 'UST FRASSATI', 'ganda ni bini aiah', 'bini aiah.jpg', 'rescued', '2024-05-19 21:25:17', 'Rejected', 'User', '2024-05-20 00:24:25'),
(50, 1, 'UST FRASSATI', 'ganda ni bini aiah', 'uploads/bini aiah.jpg', 'missing', '2024-05-19 21:25:18', 'Rejected', 'User', '2024-05-20 00:24:25'),
(51, 1, 'UST FRASSATI', 'ganda ni bini aiah', 'uploads/bini aiah1.jpg', 'missing', '2024-05-19 21:25:20', 'Rejected', 'User', '2024-05-20 00:24:25'),
(52, 1, 'UST FRASSATI', 'ganda ni bini aiah', 'uploads/bini aiah2.jpg', 'missing', '2024-05-19 21:25:21', 'Rejected', 'User', '2024-05-20 00:24:25'),
(53, 1, 'SA PUSO KO', 'may problema na yata ako', 'uploads/66480f463169d6.83931469.jpg', 'needs_help', '2024-05-19 21:25:24', 'Rejected', 'User', '2024-05-20 00:24:25'),
(54, 1, 'SA PUSO KO', 'may problema na yata ako', 'uploads/66480f605de829.33680072.jpg', 'missing', '2024-05-19 21:25:25', 'Rejected', 'User', '2024-05-20 00:24:25'),
(55, 1, 'SA PUSO KO', 'ganda ni bini aiah', 'bini aiah2.jpg', 'missing', '2024-05-19 21:25:26', 'Rejected', 'User', '2024-05-20 00:24:25'),
(56, 1, 'SA PUSO KO', 'may problema na yata ako', 'uploads/PBURGOS.jpg', 'missing', '2024-05-19 21:25:27', 'Rejected', 'User', '2024-05-20 00:24:25'),
(57, 13, 'UST FRASSATI', 'ganda ni bini aiah', 'uploads/bini aiah2.jpg', 'needs_help', '2024-05-19 21:12:17', 'Rejected', 'User', '2024-05-20 00:24:25'),
(58, 13, 'UST FRASSATI', 'Attention Fellow Furparents, we saw this dog ', 'uploads/dogs.jpg', 'Needs Help', '2024-05-19 21:25:29', 'Approved', 'User', '2024-05-20 00:24:25'),
(59, 13, 'Paredes Street, Manila, near FEU', 'Hello fellow furparents and orgs I recently h', 'uploads/436602528_2361773370659527_4371824762', 'Missing', '2024-05-19 21:25:43', 'Rejected', 'User', '2024-05-20 00:24:25'),
(60, 13, 'Paredes Street, Manila, near FEU', 'Hello fellow furparents and orgs I recently h', 'uploads/436602528_2361773370659527_4371824762', 'Missing', '2024-05-19 21:25:42', 'Rejected', 'User', '2024-05-20 00:24:25'),
(61, 13, 'Paredes Street, Manila, near FEU', 'Helloooo I need help looking for my dog, I lo', 'uploads/dog ni bella.jpg', 'Missing', '2024-05-19 21:25:40', 'Rejected', 'User', '2024-05-20 00:24:25'),
(62, 16, 'UST FRASSATI', 'Hello fellow furparents and orgs I recently have lost my pet near FEU sa tabi ng mad brews. pls help me find her ', 'uploads/dog ni joyce.jpg', 'Missing', '2024-05-19 21:12:03', 'Approved', 'User', '2024-05-20 00:24:25'),
(63, 17, 'Paredes Street, Manila, near FEU', 'Hello fellow furparents and orgs I recently have lost my pet near FEU sa tabi ng mad brews. pls help me find her ', 'uploads/dog ni bella.jpg', 'Missing', '2024-05-19 21:25:39', 'Approved', 'User', '2024-05-20 00:24:25'),
(64, 18, 'UST FRASSATI', 'Hello fellow furparents and orgs I recently have lost my pet near FEU sa tabi ng mad brews. pls help me find her ', 'uploads/dog ni joyce 2.jpg', 'Missing', '2024-05-18 10:36:51', 'Pending', 'User', '2024-05-20 00:24:25'),
(65, 18, 'UST FRASSATI', 'test', 'uploads/dog ni joyce 2.jpg', 'Found', '2024-05-18 10:37:25', 'Pending', 'User', '2024-05-20 00:24:25'),
(66, 19, 'UST FRASSATI', 'Hey this is bini maloi! I\'m looking for an animal organization that is open for adoption ', 'uploads/dog ni joyce 2.jpg', 'Needs Help', '2024-05-19 21:09:50', 'Approved', 'User', '2024-05-20 00:24:25'),
(67, 19, 'UST FRASSATI', 'may problema na yata ako', 'uploads/dogs.jpg', 'Missing', '2024-05-19 11:14:55', 'Pending', 'User', '2024-05-20 00:24:25'),
(68, 13, 'UST FRASSATI', 'may problema na yata ako', 'uploads/dog ni joyce 3.jpg', 'Missing', '2024-05-19 12:23:23', 'Pending', 'User', '2024-05-20 00:24:25'),
(69, 13, 'Paredes Street, Manila, near FEU', 'Helloooo I need help looking for my dog, I lost her near ust pnoval street', 'uploads/dog ni joyce 3.jpg', 'Missing', '2024-05-19 12:29:34', 'Pending', 'User', '2024-05-20 00:24:25'),
(70, 13, 'Paredes Street, Manila, near FEU', 'Helloooo I need help looking for my dog, I lost her near ust pnoval street', 'uploads/dog ni joyce 3.jpg', 'Missing', '2024-05-19 12:47:50', 'Pending', 'User', '2024-05-20 00:24:25'),
(71, 13, 'SA PUSO KO', 'may problema na yata ako', 'uploads/dog ni joyce 3.jpg', 'Missing', '2024-05-19 13:01:57', 'Approved', 'User', '2024-05-20 00:24:25'),
(72, 13, 'Paredes Street, Manila, near FEU', 'Hello fellow furparents and orgs I recently have lost my pet near FEU sa tabi ng mad brews. pls help me find her ', 'uploads/dog ni joyce 3.jpg', 'Missing', '2024-05-19 14:22:43', 'Pending', 'User', '2024-05-20 00:24:25'),
(73, 13, 'SA PUSO KO', 'may problema na yata ako', 'uploads/bini aiah3.jpg', 'Missing', '2024-05-19 14:27:17', 'Pending', 'User', '2024-05-20 00:24:25'),
(74, 13, 'Paredes Street, Manila, near FEU', 'Hello fellow furparents and orgs I recently have lost my pet near FEU sa tabi ng mad brews. pls help me find her ', 'uploads/dog ni joyce 1.jpg', 'Missing', '2024-05-19 14:29:52', 'Pending', 'User', '2024-05-20 00:24:25'),
(75, 13, 'SA PUSO KO', 'may problema na yata ako', 'uploads/PBURGOS.jpg', 'Needs Help', '2024-05-19 14:46:08', 'Pending', 'User', '2024-05-20 00:24:25'),
(76, 13, 'McLaren\'s Pub', 'How I Met Your Mother', 'uploads/068c6516d4b1bbe4a324edad41e7d58d.jpg', 'Needs Help', '2024-05-19 14:49:26', 'Pending', 'User', '2024-05-20 00:24:25'),
(77, 13, 'SA PUSO KO', 'ganda ni bini aiah', 'uploads/bini aiah3.jpg', 'Rescued', '2024-05-19 16:05:08', 'Pending', 'User', '2024-05-20 00:24:25'),
(78, 13, 'Paredes Street, Manila, near FEU', 'Hello fellow furparents and orgs I recently have lost my pet near FEU sa tabi ng mad brews. pls help me find her ', 'uploads/dog ni joyce 1.jpg', 'Missing', '2024-05-19 16:27:28', 'Pending', 'User', '2024-05-20 00:27:28'),
(79, 13, 'SA PUSO KO', 'may problema na yata ako', 'uploads/PBURGOS.jpg', 'Needs Help', '2024-05-19 16:39:05', 'Rejected', 'User', '2024-05-20 00:38:19'),
(80, 24, 'Islang Pantropiko', 'Hello blooms! We are currently looking for an animal organization that is open for adoption. Thank youuu', 'uploads/PAWs.jpg', 'Needs Help', '2024-05-19 22:33:17', 'Approved', 'User', '2024-05-20 06:30:35'),
(81, 24, 'Cornelia Street', 'Pagod na q taena gusto ko na ma... mag-gupit ng bangs ko ', 'uploads/bangs.jpg', 'Needs Help', '2024-05-19 22:33:29', 'Rejected', 'User', '2024-05-20 06:32:55'),
(82, 27, 'sa bahay', 'grabe para akong naghakathon', 'uploads/puyat.jpg', 'Missing', '2024-05-19 22:55:19', 'Approved', 'User', '2024-05-20 06:54:23'),
(83, 25, 'McLaren\'s Pub', 'may problema na yata ako', 'uploads/eyebags.jpg', 'Missing', '2024-05-19 23:17:41', 'Rejected', 'User', '2024-05-20 07:17:23'),
(84, 30, 'Islang Pantropiko', 'Hello', 'uploads/dog ni joyce 3.jpg', 'Needs Help', '2024-05-20 03:28:15', 'Rejected', 'User', '2024-05-20 11:27:59'),
(85, 30, 'UST FRASSATI', 'Help! I just lost my dog near the frassati building. This is her picture please help me find her', 'uploads/dog ni joyce 3.jpg', 'Missing', '2024-05-20 03:30:17', 'Approved', 'User', '2024-05-20 11:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `userID` int(11) NOT NULL,
  `userUsername` varchar(45) DEFAULT NULL,
  `userPassword` varchar(45) DEFAULT NULL,
  `userFirstName` varchar(45) DEFAULT NULL,
  `userLastName` varchar(45) DEFAULT NULL,
  `userEmail` varchar(45) DEFAULT NULL,
  `userContact` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`userID`, `userUsername`, `userPassword`, `userFirstName`, `userLastName`, `userEmail`, `userContact`) VALUES
(1, 'lilmarcy', '143', 'marceline', 'little', 'marcy@gmail.com', '123'),
(2, 'kathy', '1010', 'kathryn', 'bernardo', 'kb@gmail.com', '234'),
(3, 'hevabi', '00', 'hev', 'abi', 'ha@gmail.com', '1103'),
(4, 'cerabhie', 'anakngbayan', 'alyzza', 'castillo', 'aj@gmail.com', '378430'),
(5, 'charhashi', 'afam', 'bianca', 'tinsay', 'bt@gmail.com', '289380'),
(6, 'binini', 'bhdsj', 'nini', 'bini', 'nini@gmail.com', '128193'),
(7, 'jeaisbusy', '09309', 'jea', 'ant', 'langgam@gmail.com', '19201'),
(8, 'langgam', 'ant', 'ant', 'sad', 'ant@gmail.com', '128932'),
(9, 'antyyy', '3872', 'langg', 'am', 'anttt@gmail.com', '12819'),
(10, 'ysa', '4686', 'ysabella', 'agb', 'ya@gmail.com', '381'),
(11, 'newuser', 'new', 'new', 'user', 'new@gmail.com', '989'),
(12, 'sd', 'sd', 'shanti', 'dope', 'sd@gmail.com', '1233'),
(13, 'Bini_aiah', '111', 'Aiah', 'Bini', 'biniaiah@gmail.com', '0999-999-99'),
(14, 'Bini', '111', 'Aiah', 'Bini', 'biniaiah1@gmail.com', '0912-345-67'),
(15, 'Bini_Jhoanna ', '222', 'Jhoanna', 'Bini', 'binijhoanna@gmail.com', '0912-345-67'),
(16, 'Bini_jea1', '111', 'jea', 'bini', 'binijea@gmail.com', '0912-345-67'),
(17, 'bini_nikole', '111', 'Nikole', 'Bini', 'biniNikole@gmail.com', '0912-345-67'),
(18, 'bini_bianca1', '123', 'Juan', 'Dela Cruz', 'juandela@gmail.com', '0912-345-67'),
(19, 'Bini_maloi', '111', 'Maloi', 'Bini', 'binimaloi@gmail.com', '0912-345-67'),
(20, 'Bini_maloi1', '111', 'Maloi', 'Bini', 'binimaloi1@gmail.com', '0999-999-9999'),
(21, 'bini_colet', '123', 'Colet', 'Bini', 'bini_colet@gmail.com', '1111-111-1111'),
(22, 'Bini_sheena', '111', 'Sheena', 'Bini', 'binisheena@gmail.com', '0999-999-9999'),
(23, 'Bini_stacey', '123', 'Stacey', 'Bini', 'binistacey@gmail.com', '0999-999-9999'),
(24, 'Bini_mikha', '123', 'Mikha', 'Bini', 'binimikha@gmail.com', '0999-999-9999'),
(25, 'bini_newton', '123', 'Newton', 'Bini', 'bininewton@gmail.com', '1111-111-1111'),
(26, 'paligoy-ligoy12', '123', 'Nadine', 'Lustre', 'paligoyligoy@gmail.com', '0999-999-9999'),
(27, 'taylorSwiftBatumbakal', '123', 'Taylor', 'Swift', 'taylorbatumbakal@gmail.com', '0999-999-9999'),
(28, 'UpDharmaDown', '111', 'Up', 'Down', 'updharmadown@gmail.com', '0999-999-9999'),
(29, 'MrPerfectlyFine', '123', 'Perfectly', 'Fine', 'mrperfectlyfine@gmail.com', '1111-111-1111'),
(30, 'nikoledimagiba', '111', 'Nikole', 'Kageyama', 'nikoledimagiba@gmail.com', '0999-999-9999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `adding_fk_admin_tb` (`uaID`),
  ADD KEY `adding_fk_admin_tb2` (`oaID`),
  ADD KEY `adding_fk_admin_tb3` (`uaPostID`),
  ADD KEY `adding_fk_admin_tb4` (`oaPostID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `adding_fk_user_tb_c` (`ucID`),
  ADD KEY `adding_fk_org_tb_c` (`ocID`),
  ADD KEY `adding_fk_postuser_c` (`ucPostID`),
  ADD KEY `adding_fk_postorg_c` (`ocPostID`);

--
-- Indexes for table `org_tb`
--
ALTER TABLE `org_tb`
  ADD PRIMARY KEY (`orgID`);

--
-- Indexes for table `postorg`
--
ALTER TABLE `postorg`
  ADD PRIMARY KEY (`orgPostID`),
  ADD KEY `adding_fk_org_tb` (`oID`);

--
-- Indexes for table `postuser`
--
ALTER TABLE `postuser`
  ADD PRIMARY KEY (`userPostID`),
  ADD KEY `adding_fk_user_tb` (`uID`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `org_tb`
--
ALTER TABLE `org_tb`
  MODIFY `orgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `postorg`
--
ALTER TABLE `postorg`
  MODIFY `orgPostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `postuser`
--
ALTER TABLE `postuser`
  MODIFY `userPostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD CONSTRAINT `adding_fk_admin` FOREIGN KEY (`uaID`) REFERENCES `user_tb` (`userID`),
  ADD CONSTRAINT `adding_fk_admin2` FOREIGN KEY (`oaID`) REFERENCES `org_tb` (`orgID`),
  ADD CONSTRAINT `adding_fk_admin3` FOREIGN KEY (`uaPostID`) REFERENCES `postuser` (`userPostID`),
  ADD CONSTRAINT `adding_fk_admin4` FOREIGN KEY (`oaPostID`) REFERENCES `postorg` (`orgPostID`),
  ADD CONSTRAINT `adding_fk_admin_tb` FOREIGN KEY (`uaID`) REFERENCES `user_tb` (`userID`),
  ADD CONSTRAINT `adding_fk_admin_tb2` FOREIGN KEY (`oaID`) REFERENCES `org_tb` (`orgID`),
  ADD CONSTRAINT `adding_fk_admin_tb3` FOREIGN KEY (`uaPostID`) REFERENCES `postuser` (`userPostID`),
  ADD CONSTRAINT `adding_fk_admin_tb4` FOREIGN KEY (`oaPostID`) REFERENCES `postorg` (`orgPostID`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `adding_fk_org_tb_c` FOREIGN KEY (`ocID`) REFERENCES `org_tb` (`orgID`),
  ADD CONSTRAINT `adding_fk_user_tb_c` FOREIGN KEY (`ucID`) REFERENCES `user_tb` (`userID`);

--
-- Constraints for table `postorg`
--
ALTER TABLE `postorg`
  ADD CONSTRAINT `adding_fk_org` FOREIGN KEY (`oID`) REFERENCES `org_tb` (`orgID`),
  ADD CONSTRAINT `adding_fk_org_tb` FOREIGN KEY (`oID`) REFERENCES `org_tb` (`orgID`);

--
-- Constraints for table `postuser`
--
ALTER TABLE `postuser`
  ADD CONSTRAINT `adding_fk_user` FOREIGN KEY (`uID`) REFERENCES `user_tb` (`userID`),
  ADD CONSTRAINT `adding_fk_user_tb` FOREIGN KEY (`uID`) REFERENCES `user_tb` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
