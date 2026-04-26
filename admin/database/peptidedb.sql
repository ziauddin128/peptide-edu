-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2026 at 08:16 PM
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
(8, 'Natalie Lamb', 'Brody Keller', 'Et cupidatat digniss', 'Animi in nostrud is', 'Quia consequatur Si', 'Dolor eligendi conse', 'Sunt enim sint cons', 'Perferendis enim cor', 'Quas duis odit conse', 'Sint excepturi a vol', 'Fuga Officia cillum', 'Voluptatum deleniti ', '1777218310_28.jpg', '1777218310_67a7e2d9a09bc.jpg', 'Eaque veritatis aspe', 'Sunt non nulla asper', 'Omnis eum in aliquip', 'Qui ab explicabo Et', '191', '1777218310_27522409a919fcd8abebcc5683a8a466.jpg', 'Sunt amet cillum qu', '1989-06-14', 86, 'Eum sed ad eos dele', NULL, NULL, '[{\"batch\":\"Aut ad tempore hic \",\"date\":\"2008-03-29\"},{\"batch\":\"1212\",\"date\":\"2026-04-22\"}]', '[\"1777218310_15510379_960_540_60fps.mp4\"]', '2026-04-26 09:45:10'),
(9, 'Keane Wise', 'Pandora Lane', 'Alias cupidatat in v', 'Fugiat quia in inven', 'Sapiente necessitati', 'Natus ut laboris ad ', 'Autem eligendi amet', 'Dolorum quibusdam ni', 'Labore dolor aliquam', 'Cum magnam ipsum eli', 'Quisquam voluptas ob', 'Architecto aut ipsum', '1777218545_67a7e2d9a09bc.jpg', '1777218545_67d00cf7266d2c75571aebde_Example.svg', 'Vitae occaecat volup', 'Vel qui consectetur', 'Do est tempore aut ', 'Sequi ut aliquam dol', '944', NULL, 'Harum quod nemo et n', '1975-04-10', 82, 'Duis rerum non qui r', NULL, NULL, '[{\"batch\":\"Sint iste autem dese\",\"date\":\"2021-01-30\"}]', '[]', '2026-04-26 09:49:05'),
(10, 'Kay Jensen', 'Jelani Collins', 'Nulla odio itaque su', 'Inventore do quia id', 'Sequi nostrud enim e', 'Fugiat iure ad numqu', 'Nulla aliquid aliqui', 'Eius tenetur in irur', 'Sit sint aspernatur ', 'Ut eveniet reprehen', 'Quidem necessitatibu', 'Consectetur iste vo', '1777218579_50698.jpg', '1777218579_1710692478.png', 'Sunt repudiandae eni', 'Irure quis illo in n', 'Dolor quia doloremqu', 'Sit ab nisi ab labor', '486', NULL, 'Est omnis placeat n', '1996-04-24', 62, 'Quo autem alias anim', NULL, NULL, '[{\"batch\":\"Dolorem beatae imped\",\"date\":\"2010-05-16\"}]', '[]', '2026-04-26 09:49:39'),
(11, 'Hoyt Huber', 'Hammett Bryan', 'Ipsam ut quasi qui a', 'Harum sed facilis od', 'Quisquam quia blandi', 'Cupidatat nisi excep', 'Veritatis iure id es', 'Voluptas ad duis et ', 'Ut officiis lorem co', 'Nisi veniam autem i', 'Ut voluptatem Ut qu', 'Qui nulla eius in es', '1777218600_67a7e2d9a09bc.jpg', '1777218600_50698.jpg', 'Recusandae Quis exp', 'Quidem laborum sit ', 'Hic minim blanditiis', 'Impedit molestias e', '605', NULL, 'Fugit nostrum cumqu', '1984-10-12', 60, 'Pariatur Numquam eu', NULL, NULL, '[{\"batch\":\"Impedit qui harum s\",\"date\":\"2022-03-31\"}]', '[]', '2026-04-26 09:50:00'),
(12, 'Damon Frost', 'Otto Trujillo', 'Culpa duis voluptate', 'Nisi voluptas laboru', 'Illo do officia do e', 'Quia et temporibus n', 'Corrupti dicta ipsa', 'Irure eius voluptas ', 'Eos et veritatis au', 'Enim quasi excepteur', 'Eos sed ullamco et i', 'Reprehenderit adipi', '1777232102_28.jpg', '1777232102_27522409a919fcd8abebcc5683a8a466.jpg', 'Corrupti dolorem ci', 'Iusto cillum distinc', 'Perspiciatis adipis', 'Elit sed eius dicta', '697', '1777232102_50698.jpg', 'Dolores aute quia of', '1980-09-23', 39, 'Est placeat duis et', '1777232102_50698.jpg', '1777232102_50698.jpg', '[{\"batch\":\"Quia esse neque faci\",\"date\":\"2000-06-24\"}]', '[\"1777232102_50698.jpg\",\"1777232102_15510379_960_540_60fps.mp4\",\"1777232102_2149057015.jpg\"]', '2026-04-26 13:35:02');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
