-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2026 at 08:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peptidedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `peptides`
--

CREATE TABLE `peptides` (
  `id` int(11) NOT NULL,
  `name1` varchar(255) DEFAULT NULL,
  `name2` varchar(255) DEFAULT NULL,
  `category1` varchar(255) DEFAULT NULL,
  `category2` varchar(255) DEFAULT NULL,
  `short_desc1` text DEFAULT NULL,
  `short_desc2` text DEFAULT NULL,
  `long_desc1` text DEFAULT NULL,
  `long_desc2` text DEFAULT NULL,
  `appearance1` varchar(255) DEFAULT NULL,
  `appearance2` varchar(255) DEFAULT NULL,
  `storage1` varchar(255) DEFAULT NULL,
  `storage2` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `coa` varchar(255) DEFAULT NULL,
  `sequence` text DEFAULT NULL,
  `formula` varchar(255) DEFAULT NULL,
  `mole_wight` varchar(100) DEFAULT NULL,
  `pubchem_id` varchar(100) DEFAULT NULL,
  `cas_number` varchar(100) DEFAULT NULL,
  `chemical_structure` varchar(255) DEFAULT NULL,
  `current_batch` varchar(100) DEFAULT NULL,
  `test_date` date DEFAULT NULL,
  `purity` float DEFAULT NULL,
  `avg_weight` varchar(100) DEFAULT NULL,
  `endotoxins` varchar(255) DEFAULT NULL,
  `sterility` varchar(255) DEFAULT NULL,
  `prev_batch` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`prev_batch`)),
  `media_files` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`media_files`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peptides`
--

INSERT INTO `peptides` (`id`, `name1`, `name2`, `category1`, `category2`, `short_desc1`, `short_desc2`, `long_desc1`, `long_desc2`, `appearance1`, `appearance2`, `storage1`, `storage2`, `thumbnail`, `coa`, `sequence`, `formula`, `mole_wight`, `pubchem_id`, `cas_number`, `chemical_structure`, `current_batch`, `test_date`, `purity`, `avg_weight`, `endotoxins`, `sterility`, `prev_batch`, `media_files`, `created_at`) VALUES
(15, 'Hop Bryan', 'Stone Brock', 'All', 'All', 'Incidunt qui ipsum', 'In ipsum laboriosam', 'Laudantium repellen', 'Et nulla ab debitis ', 'Beatae totam facere ', 'Nobis deleniti volup', 'Necessitatibus quis ', 'Voluptatibus velit a', '1778002071_1034769_6484.jpg', '1778002071_dna-strand.jpg', 'Perferendis error el', 'Velit veritatis fug', 'Aliquip facilis Nam ', 'Minus itaque in itaq', '339', NULL, 'Laborum Necessitati', '2006-01-02', 54, 'Inventore natus pari', NULL, NULL, '[{\"batch\":\"Et qui ullam enim su\",\"date\":\"2013-05-14\"}]', '[]', '2026-05-05 11:27:51'),
(16, 'Lavinia Lyons', 'Chadwick Shaw', 'Peptide Blends', 'Peptide Blends', 'Do voluptatem sunt s', 'Amet minima ea quod', 'Ipsum esse harum ra', 'Sed harum magnam vol', 'Dolorem laudantium ', 'Est autem laborum ', 'Sequi fugit minus s', 'Enim commodi nihil r', '1778002126_1034769_6484.jpg', '1778002126_molecule.png', 'Tempora velit qui an', 'Voluptas quia cumque', 'Quo assumenda qui ad', 'Ad deserunt esse vo', '300', '1778002126_molecule.png', 'Aliquam recusandae ', '1975-01-27', 80, 'Est dolor illo culpa', '1778002126_molecule.png', '1778002126_peptides.png', '[{\"batch\":\"Pariatur Ullam quae\",\"date\":\"1986-01-21\"}]', '[\"1778002126_molecule.png\",\"1778002126_hero-img.png\"]', '2026-05-05 11:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `sds`
--

CREATE TABLE `sds` (
  `id` int(11) NOT NULL,
  `peptide_id` int(50) NOT NULL,
  `sds_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`sds_data`)),
  `pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sds`
--

INSERT INTO `sds` (`id`, `peptide_id`, `sds_data`, `pdf`) VALUES
(2, 16, '{\"section_1\":\"<span style=\\\"margin: 0px; padding: 0px; box-shadow: none; font-family: &quot;Work Sans&quot;, sans-serif; font-weight: bolder; color: rgb(33, 37, 41);\\\">Product Use:<\\/span><span style=\\\"color: rgb(33, 37, 41); font-family: &quot;Work Sans&quot;, sans-serif;\\\">&nbsp;Laboratory Reagent for Research Use Only.<\\/span>\",\"section_2\":\"<p><b>Signal Word:<\\/b> Warning<\\/p><p><b>Hazard Solution:<\\/b> Hello<\\/p>\",\"section_3\":\"<p style=\\\"margin: 0px; padding: 0px; box-shadow: none; font-family: &quot;Work Sans&quot;, sans-serif; font-size: 14px; color: rgb(33, 37, 41);\\\"><span style=\\\"margin: 0px; padding: 0px; box-shadow: none; font-weight: bolder;\\\">Molecular Formula:&nbsp;<\\/span><span style=\\\"font-weight: initial;\\\">1234<\\/span><\\/p><p style=\\\"margin: 0px; padding: 0px; box-shadow: none; font-family: &quot;Work Sans&quot;, sans-serif; font-size: 14px; color: rgb(33, 37, 41);\\\"><span style=\\\"margin: 0px; padding: 0px; box-shadow: none; font-weight: bolder;\\\">Molecular Weight:&nbsp;<\\/span><span style=\\\"font-weight: initial;\\\">1234<\\/span><\\/p><p style=\\\"margin: 0px; padding: 0px; box-shadow: none; font-family: &quot;Work Sans&quot;, sans-serif; font-size: 14px; color: rgb(33, 37, 41);\\\"><span style=\\\"margin: 0px; padding: 0px; box-shadow: none; font-weight: bolder;\\\">CAS Number:&nbsp;<\\/span><span style=\\\"font-weight: initial;\\\">1234<\\/span><\\/p><p style=\\\"margin: 0px; padding: 0px; box-shadow: none; font-family: &quot;Work Sans&quot;, sans-serif; font-size: 14px; color: rgb(33, 37, 41);\\\"><br><\\/p>\",\"section_4\":\"<ul><li><b>Inhalation:<\\/b>&nbsp;Move to fresh air<\\/li><li><b>Skin Contact:<\\/b>&nbsp;Wash off immediately with soap and plenty of water.<\\/li><li><b>Eye Contact:<\\/b> Rinse thoroughly with plenty of water for at least 15 minutes.<\\/li><li><b>Ingestion:<\\/b> Never give anything by mouth to an unconscious person. Rinse mouth with water.<\\/li><\\/ul>\",\"section_5\":\"Use water spray, alcohol-resistant foam, dry chemical or carbon dioxide. War self-contained breathing apparatus for firefighting if necessary.\",\"section_6\":\"Avoid dust formation. Avoid breathing vapors, mist or gas. Ensure adequate ventilation. Do not let product enter drains. Pick up and arrange disposal without creating dust.\",\"section_7\":\"<p><b>Handling:<\\/b><\\/p><p><b>Storage:<\\/b>&nbsp;Keep container tightly closed in a dry well-ventilated place. Recommended storage temperature: -20°C<\\/p>\",\"section_8\":\"Ensure adequate ventilation. Wear appropriate personal protective equipment including lab coat, safety glasses, and gloves.\",\"section_9\":\"From: Solid (Lyophilized and Reactivity)\",\"section_10\":\"Stable under recommended storage conditions.\",\"section_11\":\"Refer to section 2 for available hazard information.\",\"section_12\":\"No specific data available or this sections. Dispose of accordance with local regulation. Not regulated as dangerous good for transport.\",\"section_16\":\"For research Use Only. Not for use in diagnostic procedures.\"}', '1778270116_what-are-peptide-black.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peptides`
--
ALTER TABLE `peptides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sds`
--
ALTER TABLE `sds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peptides`
--
ALTER TABLE `peptides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sds`
--
ALTER TABLE `sds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
