-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 05. Mrz 2020 um 20:07
-- Server-Version: 8.0.19
-- PHP-Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cms`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE `categories` (
  `cat_id` int NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(33, 'PHP'),
(34, 'Javascript'),
(35, 'Kotlin'),
(36, 'GoLang'),
(37, 'HTML5'),
(38, 'CSS3');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `comment_post_id` int NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` date NOT NULL,
  `comment_status` varchar(255) NOT NULL DEFAULT 'Unapproved'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_date`, `comment_status`) VALUES
(32, 8, 'asljdf', 'ex@mp.le', 'sdgsadgsadg', '2020-01-09', 'approved'),
(34, 11, 'Ahmed', 'ahmed@gmail.com', 'nice post keep going !', '2020-01-12', 'approved'),
(35, 7, 'Fadia M. Al-Shabrwi', 'paradises_scent1996@gmail.com', 'Keep going My Hero Ahmed', '2020-01-14', 'approved');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

CREATE TABLE `posts` (
  `post_id` int NOT NULL,
  `post_category_id` varchar(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(8, '35', '1914 translation by H. Rackham', 'Ahmed Z. Fouad', '2020-01-08', 'image_2.jpg', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to them claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>', 'Java, Kotlin, javascript, google', 1, 'published'),
(9, '33', 'imperdiet dui accumsan sit amet', 'Mohamed A. Zahi', '2020-01-09', 'cms_image_1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Neque gravida in fermentum et sollicitudin ac orci phasellus. Nisi est sit amet facilisis magna. In ornare quam viverra orci. Nunc sed id semper risus. Aliquam purus sit amet luctus. Volutpat est velit egestas dui. Ultrices gravida dictum fusce ut. Morbi leo urna molestie at. Amet nisl suscipit adipiscing bibendum est ultricies integer. Etiam tempor orci eu lobortis. Facilisis magna etiam tempor orci eu lobortis elementum nibh tellus. Ultrices tincidunt arcu non sodales neque. Neque gravida in fermentum et sollicitudin ac orci. Pretium viverra suspendisse potenti nullam ac tortor vitae purus. Vulputate dignissim suspendisse in est ante in nibh mauris cursus. Eu nisl nunc mi ipsum faucibus vitae aliquet.                        ', 'PHP, object orianted programming', 0, 'published'),
(10, '34', 'The standard Lorem Ipsum passage, used since the 1500s', 'Ahmed M. Zaky', '2020-01-11', 'cms_image_2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n', 'javascript, java, php, programming', 0, 'draft'),
(11, '34', 'etiam dignissim diam quis enim', 'Mahmoud M. Mostafa', '2020-01-11', 'image_2.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'etiam dignissim diam quis enim', 5, 'draft'),
(12, '36', 'feugiat sed lectus vestibulum mattis', 'Mohaned S. Abboud', '2020-01-12', 'cms_image_2.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum leo vel orci porta non pulvinar. Enim eu turpis egestas pretium aenean. In ante metus dictum at tempor commodo ullamcorper a. Vel risus commodo viverra maecenas accumsan. Ut etiam sit amet nisl purus in mollis. Amet volutpat consequat mauris nunc congue nisi vitae suscipit tellus. Ac turpis egestas maecenas pharetra convallis. Aliquam malesuada bibendum arcu vitae. Sem nulla pharetra diam sit amet nisl. Blandit massa enim nec dui nunc mattis enim ut. Sit amet facilisis magna etiam tempor. Quis varius quam quisque id diam vel quam elementum. Donec ac odio tempor orci dapibus. Donec et odio pellentesque diam volutpat commodo sed egestas egestas. Mi sit amet mauris commodo quis imperdiet massa tincidunt. Euismod nisi porta lorem mollis aliquam ut. Eros in cursus turpis massa. Mauris commodo quis imperdiet massa tincidunt nunc pulvinar.</p>', 'javascript, php, java, programming, GoLang', 0, 'draft'),
(13, '36', 'feugiat sed lectus vestibulum mattis', 'Mohaned S. Abboud', '2020-01-12', 'cms_image_2.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum leo vel orci porta non pulvinar. Enim eu turpis egestas pretium aenean. In ante metus dictum at tempor commodo ullamcorper a. Vel risus commodo viverra maecenas accumsan. Ut etiam sit amet nisl purus in mollis. Amet volutpat consequat mauris nunc congue nisi vitae suscipit tellus. Ac turpis egestas maecenas pharetra convallis. Aliquam malesuada bibendum arcu vitae. Sem nulla pharetra diam sit amet nisl. Blandit massa enim nec dui nunc mattis enim ut. Sit amet facilisis magna etiam tempor. Quis varius quam quisque id diam vel quam elementum. Donec ac odio tempor orci dapibus. Donec et odio pellentesque diam volutpat commodo sed egestas egestas. Mi sit amet mauris commodo quis imperdiet massa tincidunt. Euismod nisi porta lorem mollis aliquam ut. Eros in cursus turpis massa. Mauris commodo quis imperdiet massa tincidunt nunc pulvinar.</p>', 'javascript, php, java, programming, GoLang', 0, 'draft'),
(14, '36', 'feugiat sed lectus vestibulum mattis', 'Mohaned S. Abboud', '2020-01-12', 'cms_image_2.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum leo vel orci porta non pulvinar. Enim eu turpis egestas pretium aenean. In ante metus dictum at tempor commodo ullamcorper a. Vel risus commodo viverra maecenas accumsan. Ut etiam sit amet nisl purus in mollis. Amet volutpat consequat mauris nunc congue nisi vitae suscipit tellus. Ac turpis egestas maecenas pharetra convallis. Aliquam malesuada bibendum arcu vitae. Sem nulla pharetra diam sit amet nisl. Blandit massa enim nec dui nunc mattis enim ut. Sit amet facilisis magna etiam tempor. Quis varius quam quisque id diam vel quam elementum. Donec ac odio tempor orci dapibus. Donec et odio pellentesque diam volutpat commodo sed egestas egestas. Mi sit amet mauris commodo quis imperdiet massa tincidunt. Euismod nisi porta lorem mollis aliquam ut. Eros in cursus turpis massa. Mauris commodo quis imperdiet massa tincidunt nunc pulvinar.</p>', 'javascript, php, java, programming, GoLang', 0, 'draft'),
(15, '35', 'empor incididunt ut labore et dolore', 'Mosaad S. Nour', '2020-01-12', 'cms_image_1.jpg', '<p>Amet justo donec enim diam. Auctor urna nunc id cursus metus. Semper auctor neque vitae tempus quam pellentesque nec. Malesuada nunc vel risus commodo viverra. Libero justo laoreet sit amet cursus. Nulla pellentesque dignissim enim sit amet venenatis urna. Arcu vitae elementum curabitur vitae nunc sed velit. Tellus orci ac auctor augue mauris. Laoreet sit amet cursus sit amet dictum. Mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus et. Viverra accumsan in nisl nisi scelerisque eu. Ullamcorper velit sed ullamcorper morbi. Dignissim diam quis enim lobortis scelerisque fermentum dui. Tincidunt id aliquet risus feugiat in. Malesuada nunc vel risus commodo viverra maecenas accumsan. Euismod nisi porta lorem mollis aliquam.</p>', 'javascript, java, programming, GoLang', 0, 'draft'),
(16, '37', 'leo vel orci porta non pulvinar. ', 'Maher S. Shamel', '2020-01-12', 'image_2.jpg', '<p>Viverra orci sagittis eu volutpat odio facilisis mauris. Facilisis mauris sit amet massa vitae. Justo laoreet sit amet cursus sit amet dictum. Fusce ut placerat orci nulla pellentesque dignissim enim. Nec feugiat in fermentum posuere urna nec tincidunt praesent. Ut sem nulla pharetra diam sit amet nisl suscipit. Viverra maecenas accumsan lacus vel facilisis volutpat est. Duis at tellus at urna condimentum mattis. Et ultrices neque ornare aenean. Morbi tristique senectus et netus et malesuada fames ac. Vulputate dignissim suspendisse in est ante in. Ut faucibus pulvinar elementum integer. Tempus urna et pharetra pharetra. Interdum consectetur libero id faucibus nisl. Donec ultrices tincidunt arcu non sodales neque sodales.</p>', 'HTML5, bootstrap, joomla, CSS3, Frontend, jQuery', 0, 'draft');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_secondname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'usr.jpg',
  `user_role` varchar(255) NOT NULL DEFAULT 'subscriber',
  `user_register_date` date NOT NULL,
  `user_randSalt` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_firstname`, `user_secondname`, `user_email`, `user_image`, `user_role`, `user_register_date`, `user_randSalt`) VALUES
(3, 'ali_phpman', '$argon2i$v=19$m=65536,t=4,p=2$Z1dlcUxJRjB1LlFzOTkyUQ$X3ptDMxBEHW6dKa8eKj8WdBz3PkntcflbKbsXyPv4Ko', 'Ali', 'Omar', 'ali_omar@gmail.com', 'customer-1.jpg', 'subscriber', '2020-01-10', ''),
(4, 'omar_phpman', '$argon2i$v=19$m=65536,t=4,p=2$VHk2Q2ZNMHZRbDFLTDFwMw$oLapAf324XWSyEeuGuQC45naYcLyn1UYld5Dgblcum8', 'Omar', 'Ali', 'omar_ali@gmail.com', 'customer-3.jpg', 'subscriber', '2020-01-10', ''),
(5, 'amany_stylist', '$argon2i$v=19$m=65536,t=4,p=2$MlJkVDNmLmIuMjgvVzNPOQ$BWOCWihSKG2Z2C3cWZEjo3EUC8dcg1P9xomuS2eDXu0', 'Amany', 'Hafez', 'amany_hafez@gmail.com', 'customer-2.jpg', 'admin', '2020-01-10', ''),
(7, 'imran_phpgeeks', '$argon2i$v=19$m=65536,t=4,p=2$NXVnbU5PS1p0YVluVnQ3cg$185VAzCvD0jiSXz62sP6TdbsSParAIdHtAWqHjAEkfs', 'Imran', 'Hazem', 'imran_hazem@gmail.com', 'me.jpg', 'subscriber', '2020-01-11', ''),
(8, 'imran_phpgeeks', '$argon2i$v=19$m=65536,t=4,p=2$a3JTWlFEOVNMM1JMeFpnbQ$PaFXD36nU/tzncE/E8I+wVgRuiTBIrcTFy1YRotkcb0', 'Imran', 'Hazem', 'imran_hazem@gmail.com', 'me.jpg', 'subscriber', '2020-01-11', ''),
(9, 'zaher_java', '$argon2i$v=19$m=65536,t=4,p=2$dmlIcmo0MGpNV1pSdHV2Yw$2NYWcF946CmxJxW0o2QMFywQXg/+pYwzqsjzyHGwpaA', 'Mohaned', 'Zaher', 'mohaned_zaher@gmail.com', 'usr.jpg', 'subscriber', '2020-01-12', ''),
(11, 'Mohanned_salem', '$argon2i$v=19$m=65536,t=4,p=2$RE9kdzRtekpjU1dHVC5LTQ$ursN8jpmrbLq1WbZQTsKi7OULFriifS0zKNuy23uoUk', 'Mohanned', 'Salem', 'mohanned_salem@gmail.com', 'usr.jpg', 'subscriber', '2020-01-13', ''),
(14, 'Maher_Zain', '$argon2i$v=19$m=65536,t=4,p=2$Mi5KVnZkV2VaRWVWTi8vSg$uVrZCGkJKGzn8e9aq+4eTkaf0fZrs0rhOWUQj5milkM', 'Maher', 'Zain', 'maher_zain@gmail.com', 'usr.jpg', 'subscriber', '2020-01-13', ''),
(15, 'Fadia Al-Shabrawi', '$argon2i$v=19$m=65536,t=4,p=2$MGlTUThOVkxRNDVIRGZTZA$jNvtW00Ir9pA6UTid7FsTKVF/WUzYo3Fv8ShrGWJVgQ', 'Fadia', 'Al-Shabrawi', 'paradises.scent1996@gmail.com', 'usr.jpg', 'admin', '2020-01-14', ''),
(16, 'admin', 'admin', 'first name', 'second name', 'admin@email.com', 'usr.jpg', 'admin', '2020-03-04', ''),
(17, 'user', 'user', 'first name', 'second name', 'user@email.com', 'usr.jpg', 'subscriber', '2020-03-04', '');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
