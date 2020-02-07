-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 05 Feb 2020 pada 02.53
-- Versi server: 10.4.11-MariaDB-log
-- Versi PHP: 7.4.1

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
-- Struktur dari tabel `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL COMMENT 'gambar_game'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `game`
--

INSERT INTO `game` (`id`, `nama`, `image`) VALUES
(1, 'CSGO\r\n', ''),
(2, 'MOBILE LEGENDS BANG BANG', ''),
(3, 'PUBG MOBILE', ''),
(4, 'FIFA 2020', ''),
(5, 'FREE FIRE', ''),
(6, 'Point Blank', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komunitas`
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
-- Dumping data untuk tabel `komunitas`
--

INSERT INTO `komunitas` (`id`, `nama`, `kategori`, `game_id`, `nomor_telpon`, `nomor_identitas`, `foto_identitas`, `deskripsi`) VALUES
(10, 'koamiasd', '2', 1, 127, 10200302, '70f0af40-9077-4ebf-b9e3-32047dc64be5.jpeg', 'sfio');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member_komunitas`
--

CREATE TABLE `member_komunitas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `komunitas_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member_komunitas`
--

INSERT INTO `member_komunitas` (`id`, `user_id`, `komunitas_id`, `role_id`) VALUES
(1, 13, 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_game`
--

CREATE TABLE `role_game` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `alias` varchar(6) NOT NULL COMMENT 'nama alias tim'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `team_member`
--

CREATE TABLE `team_member` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tournament`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('1','2') NOT NULL COMMENT '1 = ''laki-laki'', 2 = ''perempuan''',
  `full_name` varchar(100) NOT NULL COMMENT 'nama pengguna',
  `image` varchar(255) NOT NULL,
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `gender`, `full_name`, `image`, `country`, `city`, `adress`, `birth_date`, `phone_number`, `about_me`, `role_id`, `is_active`) VALUES
(1, 'sunda lur', 'Akuraweroh@gmail.com', 'werea', '2', 'saddasdasdasdsa', '', 'Brunei Darussalam', 'MALANG', 'Pluto anf the mars electric\n', '1999-09-19', '0812345566789', 'isi', 2, 1),
(2, 'kaliwa', 'anjay.mabar@co.id', 'werea', '2', 'Anjay Mabarrr Kuyyy', '', 'Indonesia', 'Luar kota', 'Jalan MArs no 99999999', '2020-01-08', '089098890099', 'HAhahahahahhahhahahahahhahhahahahahahhahahaha', 1, 1),
(3, 'admin', 'teslur@jad.cop', '$2y$10$WkfnxBmJhtoCELw0bqu5iO83t3KN/y0RGesKXVjssG26UBD56g3yW', '1', 'tes', '', 'Indonesia', '', '', '0000-00-00', '', '', 2, 1),
(13, 'user', 'user1@gui.io', '$2y$10$9pMDy0chUWhWALYUnN4DfOjrRGMXdZkDrsUiB9nbPJy5xKEGeeF5G', '1', 'user', '', 'Indonesia', '', '', '0000-00-00', '', '', 1, 0),
(14, 'rizki', 'rizki@rizki.op', '$2y$10$bbVcGRjwlDF4aFBkA1YbI.iy17wc4B7Ti11k/m.KraLl5MSA/yGJa', '1', 'rizki', '', 'Malaysia', '', '', '0000-00-00', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access`
--

CREATE TABLE `user_access` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_achievement`
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
-- Struktur dari tabel `user_career`
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
-- Dumping data untuk tabel `user_career`
--

INSERT INTO `user_career` (`id`, `type`, `teamname_or_solo_id`, `game_id`, `image`, `career_months`, `career_years`, `user_id`) VALUES
(5, 'fro fleyer', 'kulu id', 2, '5d60701e-e98d-4ef8-8d35-f7b029e03f64.jpeg', 'January', 2018, 2),
(6, 'iya', 'dd', 2, '6a29c4df-8a7d-453d-8117-d9a5a2e70890.jpeg', 'February', 2020, 2),
(7, 'ert', 'tyu', 4, '0a2eb78d-0484-4780-b24d-e30d93cd641e.jpeg', 'June', 2018, 2),
(8, 'anjayyyy', 'Kulu kulu id', 2, '1247af20-8f2a-4035-9dbd-c4ce8346be1c.jpeg', 'July', 2019, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu_nama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_post`
--

CREATE TABLE `user_post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `caption` text NOT NULL,
  `image` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `comment` text NOT NULL,
  `create_date` date NOT NULL COMMENT 'tanggal posting',
  `end_date` date NOT NULL COMMENT 'tanggal berakhir posting ',
  `komunitas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_post_and_comment`
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
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `name`) VALUES
(1, 'Super admin'),
(2, 'user\r\n'),
(3, 'admin komunitas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_skill`
--

CREATE TABLE `user_skill` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `role_game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`) VALUES
(1, 'teslur@jad.cop', 0),
(2, 'kaliwa@era.co', 0),
(3, 'kaliwa@era.co', 0),
(4, 'aasd@dad.hjj', 0),
(5, 'assda@dada.hb', 0),
(6, 'assda@dada.hb', 0),
(7, 'assda@dada.hb', 0),
(8, 'adas@adsda.hb', 0),
(9, 'asdsad@dasd.hv', 0),
(10, 'asdd@das.chc', 0),
(11, 'user1@gui.io', 0),
(12, 'rizki@rizki.op', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komunitas`
--
ALTER TABLE `komunitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indeks untuk tabel `member_komunitas`
--
ALTER TABLE `member_komunitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `komunitas_id` (`komunitas_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `role_game`
--
ALTER TABLE `role_game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indeks untuk tabel `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indeks untuk tabel `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komunitas_id` (`komunitas_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `user_achievement`
--
ALTER TABLE `user_achievement`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `role_game_id` (`role_game_id`);

--
-- Indeks untuk tabel `user_career`
--
ALTER TABLE `user_career`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_post`
--
ALTER TABLE `user_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `user_post_and_comment`
--
ALTER TABLE `user_post_and_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_skill`
--
ALTER TABLE `user_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `role_game_id` (`role_game_id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `komunitas`
--
ALTER TABLE `komunitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `member_komunitas`
--
ALTER TABLE `member_komunitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `role_game`
--
ALTER TABLE `role_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `team_member`
--
ALTER TABLE `team_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tournament`
--
ALTER TABLE `tournament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_career`
--
ALTER TABLE `user_career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_post`
--
ALTER TABLE `user_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_post_and_comment`
--
ALTER TABLE `user_post_and_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_skill`
--
ALTER TABLE `user_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `komunitas`
--
ALTER TABLE `komunitas`
  ADD CONSTRAINT `komunitas_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `member_komunitas`
--
ALTER TABLE `member_komunitas`
  ADD CONSTRAINT `member_komunitas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `member_komunitas_ibfk_2` FOREIGN KEY (`komunitas_id`) REFERENCES `komunitas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_game`
--
ALTER TABLE `role_game`
  ADD CONSTRAINT `role_game_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `team_member`
--
ALTER TABLE `team_member`
  ADD CONSTRAINT `team_member_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `team_member_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tournament`
--
ALTER TABLE `tournament`
  ADD CONSTRAINT `tournament_ibfk_1` FOREIGN KEY (`komunitas_id`) REFERENCES `komunitas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tournament_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_access`
--
ALTER TABLE `user_access`
  ADD CONSTRAINT `user_access_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `user_access_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_achievement`
--
ALTER TABLE `user_achievement`
  ADD CONSTRAINT `user_achievement_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `user_achievement_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `user_achievement_ibfk_3` FOREIGN KEY (`role_game_id`) REFERENCES `role_game` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_career`
--
ALTER TABLE `user_career`
  ADD CONSTRAINT `user_career_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `user_career_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_post`
--
ALTER TABLE `user_post`
  ADD CONSTRAINT `user_post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_post_and_comment`
--
ALTER TABLE `user_post_and_comment`
  ADD CONSTRAINT `user_post_and_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `user_post_and_comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `user_post` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_skill`
--
ALTER TABLE `user_skill`
  ADD CONSTRAINT `user_skill_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `user_skill_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `user_skill_ibfk_3` FOREIGN KEY (`role_game_id`) REFERENCES `role_game` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
