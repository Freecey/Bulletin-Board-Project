-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2020 at 10:56 AM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BCBB`
--

-- --------------------------------------------------------

--
-- Table structure for table `announce`
--

CREATE TABLE `announce` (
  `ann_id` int NOT NULL,
  `ann_subject` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ann_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `ann_type` varchar(64) DEFAULT NULL,
  `ann_date` datetime NOT NULL,
  `ann_date_update` datetime DEFAULT NULL,
  `ann_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `ann_by` int NOT NULL,
  `ann_pin` tinyint(1) NOT NULL DEFAULT '0',
  `ann_views` mediumint DEFAULT '0',
  `ann_status` tinyint(1) NOT NULL DEFAULT '1',
  `ann_upd_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `board_id` int NOT NULL,
  `board_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `board_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `board_image` varchar(255) NOT NULL,
  `board_creat_date` datetime DEFAULT NULL,
  `board_creat_by` int NOT NULL,
  `board_status` tinyint NOT NULL,
  `board_views` int DEFAULT NULL,
  `board_upd_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logattempts`
--

CREATE TABLE `logattempts` (
  `logattempt_id` int NOT NULL,
  `logattempt_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `logattempt_browser` varchar(255) NOT NULL,
  `logattempt_urlfrom` varchar(255) DEFAULT NULL,
  `logattempt_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logattempt_email` varchar(128) NOT NULL,
  `logattempt_pwd` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loginok`
--

CREATE TABLE `loginok` (
  `loginok_id` int NOT NULL,
  `loginok_user_id` int NOT NULL,
  `loginok_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `loginok_browser` varchar(255) NOT NULL,
  `loginok_urlfrom` varchar(255) DEFAULT NULL,
  `loginok_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `postreact`
--

CREATE TABLE `postreact` (
  `postreact_id` int NOT NULL,
  `postreact_post` int NOT NULL,
  `postreact_user` int NOT NULL,
  `postreact_content` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int NOT NULL,
  `post_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `post_date` datetime NOT NULL,
  `post_date_update` datetime DEFAULT NULL,
  `post_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `post_topic` int NOT NULL,
  `post_by` int NOT NULL,
  `post_pin` tinyint(1) NOT NULL DEFAULT '0',
  `post_vote` mediumint DEFAULT NULL,
  `post_exclsearch` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post_vote`
--

CREATE TABLE `post_vote` (
  `postvote_id` int NOT NULL,
  `votepost_postid` int NOT NULL,
  `postvote_by` int NOT NULL,
  `postvote_ok` int NOT NULL,
  `postvote_touser` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pvmsg`
--

CREATE TABLE `pvmsg` (
  `pvmsg_id` int NOT NULL,
  `pvmsg_action` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `pvmsg_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `pvmsg_from` int NOT NULL,
  `pvmsg_to` int NOT NULL,
  `pvmsg_read` tinyint(1) NOT NULL DEFAULT '0',
  `pvmsg_disc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `pvmsg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pvmsg_inbox` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sitesetting`
--

CREATE TABLE `sitesetting` (
  `set_id` int NOT NULL,
  `set_sitename` varchar(128) NOT NULL,
  `set_headername` varchar(128) NOT NULL,
  `set_emailenable` tinyint(1) NOT NULL DEFAULT '1',
  `set_emailmgr` varchar(128) NOT NULL,
  `set_emailsite` varchar(128) NOT NULL,
  `set_stmpsrv` varchar(128) NOT NULL,
  `set_stmpport` int NOT NULL,
  `set_stmpusr` varchar(64) NOT NULL,
  `set_stmppass` varchar(255) NOT NULL,
  `set_announce_en` int NOT NULL,
  `set_site_url` varchar(255) NOT NULL,
  `set_email_smtpauth` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `set_email_authtype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `set_email_smtpsecure` varchar(255) NOT NULL,
  `set_email_smtpautotls` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int NOT NULL,
  `topic_subject` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `topic_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'https://bbs-queen.neant.be/assets/topic_status/00-open-padlock.svg',
  `topic_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `topic_date_upd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `topic_board` int NOT NULL,
  `topic_by` int NOT NULL,
  `topic_approved` tinyint UNSIGNED DEFAULT NULL,
  `topic_status` tinyint NOT NULL DEFAULT '0',
  `topic_views` mediumint DEFAULT '0',
  `topics_exclsearch` int NOT NULL DEFAULT '0',
  `topic_pin` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userimg`
--

CREATE TABLE `userimg` (
  `userimg_id` int NOT NULL,
  `userimg_userid` int NOT NULL,
  `userimg_filename` varchar(255) NOT NULL,
  `userimg_image` mediumblob NOT NULL,
  `userimg_mime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userlevel`
--

CREATE TABLE `userlevel` (
  `userlevel_index` int NOT NULL,
  `userlevel_id` int NOT NULL,
  `userlevel_name` varchar(32) NOT NULL,
  `userlevel_desciption` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_fname` varchar(64) NOT NULL,
  `user_lname` varchar(64) NOT NULL,
  `user_email` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_sign` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `user_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'https://bbs-queen.neant.be/assets/avatar/alien.jpg',
  `user_imgdata` mediumblob NOT NULL,
  `user_gravatar` varchar(255) DEFAULT NULL,
  `user_imglocal` varchar(255) DEFAULT NULL,
  `user_online` tinyint(1) NOT NULL DEFAULT '0',
  `user_date` datetime NOT NULL,
  `user_level` int NOT NULL DEFAULT '1',
  `user_token` varchar(255) DEFAULT NULL,
  `user_token2` varchar(255) DEFAULT NULL,
  `user_datebirthday` date DEFAULT NULL,
  `user_datelastlog` datetime DEFAULT NULL,
  `user_secquest` varchar(255) DEFAULT NULL,
  `user_secansw` varchar(255) DEFAULT NULL,
  `user_active` tinyint(1) NOT NULL DEFAULT '1',
  `user_ban_by` int DEFAULT NULL,
  `user_last_ip` varchar(255) DEFAULT NULL,
  `user_theme` int DEFAULT '0',
  `user_imgtype` varchar(25) NOT NULL DEFAULT '',
  `user_lastsee` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announce`
--
ALTER TABLE `announce`
  ADD PRIMARY KEY (`ann_id`),
  ADD KEY `ann_by` (`ann_by`),
  ADD KEY `ann_upd_by` (`ann_upd_by`);

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`board_id`),
  ADD UNIQUE KEY `board_name_unique` (`board_name`),
  ADD KEY `board_creat_by` (`board_creat_by`);

--
-- Indexes for table `logattempts`
--
ALTER TABLE `logattempts`
  ADD PRIMARY KEY (`logattempt_id`);

--
-- Indexes for table `loginok`
--
ALTER TABLE `loginok`
  ADD PRIMARY KEY (`loginok_id`),
  ADD KEY `loginok_user_id` (`loginok_user_id`);

--
-- Indexes for table `postreact`
--
ALTER TABLE `postreact`
  ADD PRIMARY KEY (`postreact_id`),
  ADD KEY `postreact_user` (`postreact_user`),
  ADD KEY `postreact_post` (`postreact_post`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_topic` (`post_topic`),
  ADD KEY `post_by` (`post_by`);

--
-- Indexes for table `post_vote`
--
ALTER TABLE `post_vote`
  ADD PRIMARY KEY (`postvote_id`),
  ADD KEY `postvote_by` (`postvote_by`),
  ADD KEY `votepost_postid` (`votepost_postid`),
  ADD KEY `postvote_touser` (`postvote_touser`);

--
-- Indexes for table `pvmsg`
--
ALTER TABLE `pvmsg`
  ADD PRIMARY KEY (`pvmsg_id`),
  ADD KEY `pvmsg_from` (`pvmsg_from`),
  ADD KEY `pvmsg_to` (`pvmsg_to`),
  ADD KEY `pvmsg_inbox` (`pvmsg_inbox`);

--
-- Indexes for table `sitesetting`
--
ALTER TABLE `sitesetting`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD UNIQUE KEY `topic_subject` (`topic_subject`),
  ADD KEY `topic_board` (`topic_board`),
  ADD KEY `topic_by` (`topic_by`);

--
-- Indexes for table `userimg`
--
ALTER TABLE `userimg`
  ADD PRIMARY KEY (`userimg_id`),
  ADD UNIQUE KEY `userimg_userid` (`userimg_userid`);

--
-- Indexes for table `userlevel`
--
ALTER TABLE `userlevel`
  ADD PRIMARY KEY (`userlevel_index`),
  ADD UNIQUE KEY `userlevel_id` (`userlevel_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name_unique` (`user_name`),
  ADD UNIQUE KEY `user_email_unique` (`user_email`),
  ADD KEY `user_level` (`user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announce`
--
ALTER TABLE `announce`
  MODIFY `ann_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `board_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logattempts`
--
ALTER TABLE `logattempts`
  MODIFY `logattempt_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loginok`
--
ALTER TABLE `loginok`
  MODIFY `loginok_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postreact`
--
ALTER TABLE `postreact`
  MODIFY `postreact_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_vote`
--
ALTER TABLE `post_vote`
  MODIFY `postvote_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pvmsg`
--
ALTER TABLE `pvmsg`
  MODIFY `pvmsg_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sitesetting`
--
ALTER TABLE `sitesetting`
  MODIFY `set_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userimg`
--
ALTER TABLE `userimg`
  MODIFY `userimg_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlevel`
--
ALTER TABLE `userlevel`
  MODIFY `userlevel_index` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announce`
--
ALTER TABLE `announce`
  ADD CONSTRAINT `announce_ibfk_1` FOREIGN KEY (`ann_by`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `announce_ibfk_2` FOREIGN KEY (`ann_upd_by`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `boards`
--
ALTER TABLE `boards`
  ADD CONSTRAINT `boards_ibfk_1` FOREIGN KEY (`board_creat_by`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `loginok`
--
ALTER TABLE `loginok`
  ADD CONSTRAINT `loginok_ibfk_1` FOREIGN KEY (`loginok_user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `postreact`
--
ALTER TABLE `postreact`
  ADD CONSTRAINT `postreact_ibfk_1` FOREIGN KEY (`postreact_user`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `postreact_ibfk_2` FOREIGN KEY (`postreact_post`) REFERENCES `posts` (`post_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_by`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `post_vote`
--
ALTER TABLE `post_vote`
  ADD CONSTRAINT `post_vote_ibfk_1` FOREIGN KEY (`postvote_by`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `post_vote_ibfk_2` FOREIGN KEY (`postvote_by`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `post_vote_ibfk_3` FOREIGN KEY (`votepost_postid`) REFERENCES `posts` (`post_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `post_vote_ibfk_4` FOREIGN KEY (`postvote_touser`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `pvmsg`
--
ALTER TABLE `pvmsg`
  ADD CONSTRAINT `pvmsg_ibfk_1` FOREIGN KEY (`pvmsg_from`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pvmsg_ibfk_2` FOREIGN KEY (`pvmsg_to`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pvmsg_ibfk_3` FOREIGN KEY (`pvmsg_inbox`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_board`) REFERENCES `boards` (`board_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_by`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `userimg`
--
ALTER TABLE `userimg`
  ADD CONSTRAINT `userimg_ibfk_1` FOREIGN KEY (`userimg_userid`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_level`) REFERENCES `userlevel` (`userlevel_id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
