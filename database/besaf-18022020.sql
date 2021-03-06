-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2020 at 09:00 AM
-- Server version: 10.4.11-MariaDB-log
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `besaf`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `image` text NOT NULL COMMENT 'gambar_game',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `name`, `image`, `created_at`) VALUES
(1, 'Counter Terroris', '25554837-c6db-4492-a1e0-37b795ca163b.jpeg', '2020-02-18 02:38:13'),
(3, 'DOTA 2', 'ee420d1e-b73d-4e60-ac2e-46143c1d84f2.jpeg', '2020-02-18 02:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `komunitas`
--

CREATE TABLE `komunitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `game_id` int(11) NOT NULL,
  `nomor_telpon` tinyint(4) NOT NULL,
  `nomor_identitas` int(11) NOT NULL,
  `foto_identitas` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komunitas`
--

INSERT INTO `komunitas` (`id`, `nama`, `kategori`, `game_id`, `nomor_telpon`, `nomor_identitas`, `foto_identitas`, `deskripsi`) VALUES
(10, 'koamiasd', '2', 1, 127, 10200302, '70f0af40-9077-4ebf-b9e3-32047dc64be5.jpeg', 'sfio'),
(12, 'CSGO EVER', '1', 1, 127, 2147483647, '3ee37466-eff8-4804-893a-f42ad25eff51.jpeg', 'komunitas CSGO');

-- --------------------------------------------------------

--
-- Table structure for table `member_komunitas`
--

CREATE TABLE `member_komunitas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `komunitas_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_komunitas`
--

INSERT INTO `member_komunitas` (`id`, `user_id`, `komunitas_id`, `role_id`) VALUES
(1, 13, 10, 1),
(2, 3, 11, 1),
(3, 13, 12, 1),
(4, 76, 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `komunitas_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `user_id`, `type`, `pesan`, `komunitas_id`, `team_id`, `created_at`) VALUES
(1, 13, 1, '<a href=\"https://besaf-local.me/Besaf/profile/76\" class=\"text-dark\" style=\"text-decoration: none\">Tersedia member komunitas baru</a>', 12, 0, '2020-02-18 04:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `role_game`
--

CREATE TABLE `role_game` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `image` text NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_game`
--

INSERT INTO `role_game` (`id`, `name`, `image`, `game_id`) VALUES
(4, 'Boss', '', 1),
(5, 'Mid', '', 3),
(6, 'Top', '', 3),
(7, 'Roaming', '', 3),
(8, 'Bottom', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `alias` varchar(6) NOT NULL COMMENT 'nama alias tim',
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `status` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE `tournament` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `game_id` int(11) NOT NULL,
  `rules` text NOT NULL COMMENT 'aturan tournament',
  `hadiah` varchar(128) NOT NULL,
  `informasi` text NOT NULL,
  `how_to_join` text NOT NULL COMMENT 'cara mngikuti turnamen',
  `venue` enum('1','2') NOT NULL COMMENT '1 = online, 2 = offline ',
  `mode` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slots` int(128) NOT NULL,
  `time` time NOT NULL,
  `entry` varchar(12) NOT NULL COMMENT '1 = paid, 2 = free',
  `winner` varchar(128) NOT NULL,
  `date_start` date NOT NULL COMMENT 'waktu turnamen dimulai',
  `date_end` date NOT NULL COMMENT 'waktu turnamen berakhir',
  `komunitas_id` int(11) NOT NULL COMMENT 'id_komunitas',
  `cookies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tournament`
--

INSERT INTO `tournament` (`id`, `nama`, `game_id`, `rules`, `hadiah`, `informasi`, `how_to_join`, `venue`, `mode`, `image`, `slots`, `time`, `entry`, `winner`, `date_start`, `date_end`, `komunitas_id`, `cookies`) VALUES
(1, 'viba esport', 1, '<p><u>daDSAddasda</u></p>', '50000', 'info', 'belum tersedia.', '1', '1', '7bad1813-951e-4bb9-a6be-7b1dd65100f4.jpeg', 32, '13:11:00', '1', 'null', '2020-01-31', '2020-02-21', 11, 200),
(2, 'Newbie Open E-Sports', 1, '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt blandit nunc, ac vestibulum justo ultricies eu. Maecenas sed ipsum pretium tellus tincidunt ultricies. Phasellus eu sapien vel libero efficitur sollicitudin vel in urna. Maecenas est ante, mattis at diam eget, semper sodales dui. Phasellus convallis nunc justo, nec bibendum libero volutpat sed. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse laoreet ultricies nunc. Integer imperdiet varius tincidunt. Donec convallis ligula elit, vitae sollicitudin elit lobortis sit amet. Cras dignissim purus fermentum lorem imperdiet varius. Donec feugiat vulputate ante sit amet suscipit. Ut sodales ex ut nisi varius vehicula. Mauris viverra placerat facilisis. Cras aliquet eu neque sit amet aliquam. Fusce a quam ut erat rhoncus interdum. Aliquam vitae lacus viverra, efficitur elit quis, molestie orci.</b></span><br></p>', '10000000000', 'tidak jadi', 'belum tersedia.', '1', '2', '4a0f16c8-8c91-4637-af05-a24d0101e62d.jpeg', 90, '21:03:00', '1', 'null', '2020-05-28', '2020-02-21', 10, 500);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('1','2') NOT NULL COMMENT '1 = ''laki-laki'', 2 = ''perempuan''',
  `full_name` varchar(100) NOT NULL COMMENT 'nama pengguna',
  `image` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `country` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL COMMENT 'user_city',
  `adress` text NOT NULL,
  `birth_date` date NOT NULL,
  `phone_number` char(20) NOT NULL,
  `about_me` text NOT NULL COMMENT 'tentang',
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `gender`, `full_name`, `image`, `bio`, `country`, `city`, `adress`, `birth_date`, `phone_number`, `about_me`, `role_id`, `is_active`) VALUES
(13, 'user', 'user1@user.com', '$2y$10$9pMDy0chUWhWALYUnN4DfOjrRGMXdZkDrsUiB9nbPJy5xKEGeeF5G', '1', 'root', 'a28820e8-dbc3-4a3a-9fed-293bbfca6462.jpeg', '', 'Indonesia', 'JEMBER', 'BAGOREJO, GUMUKMAS, JEMBER', '2002-06-19', '09889900000999112222', 'kucing kucingan', 1, 1),
(74, 'admin', 'kaalwabedrizki13@gmail.com', '$2y$10$koWJn3VHR4sbZXMu/QP0i..JWtYyqzLK2oDAHyV6ievfd8eOQoFqK', '1', 'super admin', '517b8e5f-ed62-4553-a254-a2df21e6c070.jpeg', 'here we go again', 'Indonesia', '', '', '0000-00-00', '', '', 2, 1),
(76, 'yuser', 'yuser@yuse.use', '$2y$10$jL2hZBA2aIWyLP.Bl3x9zuzkHjMh4pEnUW0kKubxPioYTLlJubs3m', '1', 'yuser', '', '', 'Malaysia', '', '', '0000-00-00', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_achievement`
--

CREATE TABLE `user_achievement` (
  `id` int(11) NOT NULL,
  `role_game_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `date` date NOT NULL COMMENT 'tahun_penerimaaan_penghargaan',
  `image` text NOT NULL COMMENT 'gambar_penghargaan',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_career`
--

CREATE TABLE `user_career` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `teamname_or_solo_id` varchar(255) NOT NULL,
  `game_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `career_months` varchar(150) NOT NULL COMMENT 'bulan penerimaan penghargaan ',
  `career_years` year(4) NOT NULL COMMENT 'tahun penerimaan penghargaan',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_career`
--

INSERT INTO `user_career` (`id`, `type`, `teamname_or_solo_id`, `game_id`, `image`, `career_months`, `career_years`, `user_id`) VALUES
(5, 'fro fleyer', 'kulu id', 2, '5d60701e-e98d-4ef8-8d35-f7b029e03f64.jpeg', 'January', 2018, 2),
(6, 'iya', 'dd', 2, '6a29c4df-8a7d-453d-8117-d9a5a2e70890.jpeg', 'February', 2020, 2),
(7, 'ert', 'tyu', 4, '0a2eb78d-0484-4780-b24d-e30d93cd641e.jpeg', 'June', 2018, 2),
(8, 'anjayyyy', 'Kulu kulu id', 2, '1247af20-8f2a-4035-9dbd-c4ce8346be1c.jpeg', 'July', 2019, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu_nama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_post`
--

CREATE TABLE `user_post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `caption` text NOT NULL,
  `image` text NOT NULL,
  `likes` int(11) NOT NULL,
  `comment` text NOT NULL,
  `create_date` date NOT NULL COMMENT 'tanggal posting',
  `end_date` date NOT NULL COMMENT 'tanggal berakhir posting ',
  `komunitas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_post_and_comment`
--

CREATE TABLE `user_post_and_comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `like` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`) VALUES
(1, 'user'),
(2, 'super admin'),
(3, 'admin komunitas');

-- --------------------------------------------------------

--
-- Table structure for table `user_skill`
--

CREATE TABLE `user_skill` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `role_game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `info` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_skill`
--

INSERT INTO `user_skill` (`id`, `game_id`, `role_game_id`, `user_id`, `info`, `image`) VALUES
(1, 3, 7, 13, '', '4a81132b-1d44-48fb-a56c-d61969a5d549.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komunitas`
--
ALTER TABLE `komunitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `member_komunitas`
--
ALTER TABLE `member_komunitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `komunitas_id` (`komunitas_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_game`
--
ALTER TABLE `role_game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komunitas_id` (`komunitas_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_achievement`
--
ALTER TABLE `user_achievement`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `role_game_id` (`role_game_id`);

--
-- Indexes for table `user_career`
--
ALTER TABLE `user_career`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_post`
--
ALTER TABLE `user_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_post_and_comment`
--
ALTER TABLE `user_post_and_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_skill`
--
ALTER TABLE `user_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `role_game_id` (`role_game_id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komunitas`
--
ALTER TABLE `komunitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `member_komunitas`
--
ALTER TABLE `member_komunitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_game`
--
ALTER TABLE `role_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tournament`
--
ALTER TABLE `tournament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_career`
--
ALTER TABLE `user_career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_post`
--
ALTER TABLE `user_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_post_and_comment`
--
ALTER TABLE `user_post_and_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_skill`
--
ALTER TABLE `user_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
