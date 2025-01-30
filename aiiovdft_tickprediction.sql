-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2025 at 07:40 AM
-- Server version: 10.5.27-MariaDB
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aiiovdft_tickprediction`
--

-- --------------------------------------------------------

--
-- Table structure for table `collaborators`
--

CREATE TABLE `collaborators` (
  `id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `imagePath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `featureInputSize` int(5) NOT NULL,
  `accuracy` varchar(10) NOT NULL,
  `metrics` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `dateTrained` varchar(50) NOT NULL,
  `filesize` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `name`, `filename`, `type`, `featureInputSize`, `accuracy`, `metrics`, `dateTrained`, `filesize`) VALUES
('fd9f935nd', 'VARA00z', 'VGG16_VARA00z_128x128_EP30_ACCU99_56_24-06-2024.keras', 'VGG16', 32, '99.52', NULL, '24/06/2024', '781MB'),
('if204en', 'VARA00z', 'CNN_VARA00z_128x128_EP30_ACCU95.71_25-06-2024.keras', 'CNN', 128, '95.71', NULL, '25/06/24', '4.2MB'),
('j2045hf34', 'VARA00z', 'RESNET50_VARA00z_128x128_EP30_ACCU98.98_24-06-2024.keras', 'RESNET50', 128, '98.98', NULL, '24/06/24', '283.6');

-- --------------------------------------------------------

--
-- Table structure for table `modelSettings`
--

CREATE TABLE `modelSettings` (
  `id` varchar(50) NOT NULL,
  `userID` varchar(50) NOT NULL,
  `modelID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `modelSettings`
--

INSERT INTO `modelSettings` (`id`, `userID`, `modelID`) VALUES
('default', 'default', 'resnet50-001');

-- --------------------------------------------------------

--
-- Table structure for table `predictions`
--

CREATE TABLE `predictions` (
  `id` varchar(50) NOT NULL,
  `userID` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `modelID` varchar(50) NOT NULL,
  `result` varchar(100) NOT NULL,
  `imageName` varchar(100) NOT NULL,
  `fileSize` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `predictions`
--

INSERT INTO `predictions` (`id`, `userID`, `date`, `modelID`, `result`, `imageName`, `fileSize`) VALUES
('m0de9mjx', '3333434', '2024-08-28T05:07:09.666Z', 'jsjfirwg934', 'monkeypox', '1724821629.png', '0.55MB'),
('m0deb383', '3333434', '2024-08-28T05:08:13.602Z', 'jsjfirwg934', 'chickenpox', '1724821693.png', '0.36MB'),
('m0decujp', '3333434', '2024-08-28T05:09:41.887Z', 'jsjfirwg934', 'chickenpox', '1724821782.png', '0.36MB'),
('m0dmfb5h', '3333434', '2024-08-28T08:55:26.544Z', 'jsjfirwg934', 'monkeypox', '1724835326.JPG', '1.81MB'),
('m0f9t13z', '3333434', '2024-08-29T12:37:43.981Z', 'jsjfirwg934', 'healthy', '1724935062.jpg', '0.14MB'),
('m0ggnr8z', '3333434', '2024-08-30T08:37:29.257Z', 'jsjfirwg934', 'monkeypox', '1725007047.jpeg', '2.73MB'),
('m0j1oye6', '3333434', '2024-09-01T04:01:45.427Z', 'jsjfirwg934', 'chickenpox', '1725163303.jpg', '2.03MB'),
('m0j1s6vh', '3333434', '2024-09-01T04:04:16.985Z', 'jsjfirwg934', 'monkeypox', '1725163455.jpg', '2.26MB'),
('m0jk0bm1', '3333434', '2024-09-01T12:34:30.546Z', 'jsjfirwg934', 'monkeypox', '1725194069.jpg', '0.14MB'),
('m0jk2hca', '3333434', '2024-09-01T12:36:12.273Z', 'jsjfirwg934', 'monkeypox', '1725194171.jpg', '0.14MB'),
('m0jk3279', '3333434', '2024-09-01T12:36:35.627Z', 'jsjfirwg934', 'monkeypox', '1725194195.jpg', '0.04MB'),
('m0jk3kub', '3333434', '2024-09-01T12:37:04.759Z', 'jsjfirwg934', 'monkeypox', '1725194224.jpg', '0.04MB'),
('m0jk58xk', '3333434', '2024-09-01T12:38:24.061Z', 'jsjfirwg934', 'monkeypox', '1725194303.jpg', '0.07MB'),
('m0jk5tlz', '3333434', '2024-09-01T12:38:41.720Z', 'jsjfirwg934', 'monkeypox', '1725194321.jpg', '0.01MB'),
('m0jk62y5', '3333434', '2024-09-01T12:38:59.757Z', 'jsjfirwg934', 'monkeypox', '1725194339.jpg', '0.01MB'),
('m0jkhk7k', '3333434', '2024-09-01T12:47:55.038Z', 'jsjfirwg934', 'normal', '1725194866.jpg', '2.24MB'),
('m0jlx6uz', '3333434', '2024-09-01T13:28:02.669Z', 'jsjfirwg934', 'normal', '1725197274.jpg', '2.72MB'),
('m0jlz5ts', '3333434', '2024-09-01T13:29:38.711Z', 'jsjfirwg934', 'normal', '1725197370.jpg', '2.37MB'),
('m0jm3pmk', '3333434', '2024-09-01T13:33:08.838Z', 'jsjfirwg934', 'normal', '1725197581.jpg', '2.83MB'),
('m0jm5m91', '3333434', '2024-09-01T13:34:33.928Z', 'jsjfirwg934', 'normal', '1725197666.jpg', '3.06MB'),
('m0jq66kn', '3333434', '2024-09-01T15:26:57.150Z', 'jsjfirwg934', 'chickenpox', '1725204416.jpeg', '0.68MB'),
('m0jq7ud4', '3333434', '2024-09-01T15:28:21.231Z', 'jsjfirwg934', 'normal', '1725204499.jpeg', '0.51MB'),
('m0jqakd7', '3333434', '2024-09-01T15:30:21.224Z', 'jsjfirwg934', 'monkeypox', '1725204620.jpeg', '0.39MB'),
('m0jqbjus', '3333434', '2024-09-01T15:31:08.635Z', 'jsjfirwg934', 'chickenpox', '1725204667.jpeg', '0.68MB'),
('m0kezo24', '3333434', '2024-09-02T03:01:51.950Z', 'jsjfirwg934', 'normal', '1725246110.jpeg', '0.51MB'),
('m0kf0klu', '3333434', '2024-09-02T03:02:33.523Z', 'jsjfirwg934', 'chickenpox', '1725246152.jpeg', '0.68MB'),
('m0ko1ejw', '3333434', '2024-09-02T07:15:08.988Z', 'jsjfirwg934', 'normal', '1725261308.jpg', '0.01MB'),
('m0ko1xcp', '3333434', '2024-09-02T07:15:34.155Z', 'jsjfirwg934', 'monkeypox', '1725261334.jpg', '0.01MB'),
('m0ko2wcd', '3333434', '2024-09-02T07:16:10.691Z', 'jsjfirwg934', 'monkeypox', '1725261370.png', '0.33MB'),
('m0konqph', '3333434', '2024-09-02T07:32:24.945Z', 'jsjfirwg934', 'normal', '1725262344.jpg', '0.01MB'),
('m13d64bk', '3333434', '2024-09-15T09:18:30.461Z', 'jsjfirwg934', 'monkeypox', '1726391909.jpeg', '0.39MB'),
('m13dmrzi', '3333434', '2024-09-15T09:31:23.680Z', 'jsjfirwg934', 'normal', '1726392681.jpg', '0.73MB'),
('m13dntkz', '3333434', '2024-09-15T09:32:10.376Z', 'jsjfirwg934', 'monkeypox', '1726392728.png', '4.32MB'),
('m13dola7', '3333434', '2024-09-15T09:32:46.112Z', 'jsjfirwg934', 'monkeypox', '1726392765.png', '0.03MB'),
('m13dp2o7', '3333434', '2024-09-15T09:33:07.016Z', 'jsjfirwg934', 'normal', '1726392787.jpg', '0.01MB'),
('m13ef02y', '3333434', '2024-09-15T09:53:20.502Z', 'jsjfirwg934', 'chickenpox', '1726393999.jpeg', '0.68MB'),
('m13eft3u', '3333434', '2024-09-15T09:54:03.099Z', 'jsjfirwg934', 'normal', '1726394041.jpeg', '0.51MB'),
('m17vvjfa', '3333434', '2024-09-18T13:13:06.158Z', 'resnet50-001', 'monkeypox', '1726665178.png', '0.98MB'),
('m1ds04es', '3333434', '2024-09-22T16:11:24.736Z', 'fd9f935nd', 'Rhipicephalus', '1727021479.webp', '0.19MB'),
('m1ds0nxs', '3333434', '2024-09-22T16:11:45.128Z', 'fd9f935nd', 'Unidentified', '1727021499.png', '1.35MB'),
('m1dxl239', '3333434', '2024-09-22T18:47:42.052Z', 'fd9f935nd', 'Unidentified', '1727030856.png', '1.35MB'),
('m2mywgty', '3333434', '2024-10-24T07:14:07.318Z', 'fd9f935nd', 'Rhipicephalus', '1729754033.jpeg', '0.09MB'),
('m2nn22gh', '3333434', '2024-10-24T18:30:20.195Z', 'fd9f935nd', 'Unidentified', '1729794608.png', '1.08MB'),
('m2nn3iyy', '3333434', '2024-10-24T18:31:26.608Z', 'fd9f935nd', 'Hyalomma', '1729794678.png', '0.64MB'),
('m2nn4oqr', '3333434', '2024-10-24T18:32:26.399Z', 'fd9f935nd', 'Hyalomma', '1729794737.png', '0.64MB'),
('m2nn6fml', '3333434', '2024-10-24T18:33:47.853Z', 'fd9f935nd', 'Hyalomma', '1729794820.png', '0.64MB'),
('m2no0y46', '3333434', '2024-10-24T18:57:31.180Z', 'fd9f935nd', 'Rhipicephalus', '1729796232.jpg', '2.49MB'),
('m2no710g', '3333434', '2024-10-24T19:02:10.496Z', 'fd9f935nd', 'Unidentified', '1729796520.jpg', '0.91MB');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collaborators`
--
ALTER TABLE `collaborators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modelSettings`
--
ALTER TABLE `modelSettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predictions`
--
ALTER TABLE `predictions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
