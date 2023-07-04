-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 10:29 AM
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
-- Database: `e_booker`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(0, 'free', 'free books for all users featuring mangas and light novel'),
(1, 'manga', 'comics and graphic novels originating from Japan'),
(2, 'light novel', 'a style of young adult fiction in the form of a novel'),
(3, 'doujinshi', 'doujinshi, also romanized as dōjinshi, is the Japanese term for self-published print works, such as magazines, manga, and novels');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `author` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `price` int(6) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `author`, `description`, `img_name`, `price`, `category_id`) VALUES
(10, 'Harem in the Labyrinth of Another World (1)', 'Shachi Sogano', 'Another world fantasy that won first place overall in \"Let\'s become a novelist\" opens grandly!\r\n\r\nMichio wakes up in a different world after making a game character on a dubious website. However, when Michio learned about the \"slavery\" system in that world, he used the skills he acquired when setting up the game to go on an adventure to live his dream harem life!', 'isekai_harem_1.jpg', 16, 1),
(11, 'Harem in the Labyrinth of Another World (2)', 'Shachi Sogano', 'Michio has finally become Roxanne\'s owner! \"Harem life is finally in full swing!\" ?\r\n\r\nAfter risking his life to find money to explore the labyrinth and exterminate bandits, Michio finally obtains the funds to purchase Roxanne. Michio visits the trading house again and safely becomes the owner of \"Roxanne\", and heads for his inn to celebrate his first night! ?', 'isekai_harem_2.jpg', 16, 1),
(12, 'Harem in the Labyrinth of Another World (5)', 'Shachi Sogano', 'Michio, who got his own house, starts a bath life with Roxanne!\r\n\r\nMichio who got his own home. When he goes shopping for daily necessities, he finds a laundry tub and buys a huge tub that can be used for a bathtub. Michio, who got a bathtub, started a bath life with Roxanne!', 'isekai_harem_5.jpg', 16, 1),
(13, 'Harem in the Labyrinth of Another World (9)', 'Shachi Sogano', 'Welcomed by Roxanne in a maid outfit, Michio enjoys a new kind of healing.\r\n\r\nMichio goes to disaster relief after receiving an emergency quest from the guild. Complete the quest there while freezing in the snow. When Michio returns to his home, he is greeted by Roxanne in a maid outfit who has been cleaning. When Roxanne noticed that her michio\'s body was getting cold, she started using her own body to warm her michio.', 'isekai_harem_9.jpg', 16, 1),
(14, 'Kuma Kuma Kuma Bear (COMIC) 1', 'Kumanano', 'A shut-in in reality (here), an adventurer in another world (over there)!?\r\n\r\nGame discontinued girl, Yuna (15 years old). Based on the money she earned from her stock, she is currently staying in Tawaman alone.\r\nOne day, when she accesses the game, she is presented with cheat equipment full of bears.\r\n\"...But she definitely doesn\'t want to wear it.\" Yuna thought, but she ended up entering another world (?) with her full bear outfit on...!?\r\nSuper popular novel, long-awaited comicalization!', 'kuma_kuma_kuma_bear.jpg', 14, 1),
(15, 'Goblin Slayer Volume 2', 'Kumo Kagyu', 'Goblin Slayer, who received a request to exterminate goblins and joined a group of adventurers such as fairy archers. However, his words and deeds, \"I\'m more of a goblin than a world crisis,\" are beyond the line\'s common sense...? What will his new allies bring to his fight!? The 2nd volume of the popular Ranobe Comicalization, depicting the activities of Goblin Slayer, a solitary man obsessed with exterminating goblins!! Includes an SS written by original author Kumo Kagyu!!', 'goblin_slayer_2.jpg', 18, 1),
(17, 'Goblin Slayer Volume 14', 'Kumo Kagyu', 'The stage of the next battle is the Elf Village.\r\n\r\nThe Goblin Slayer party fights back against goblins attacking the adventurer training ground. What is Goblin Slayer\'s secret plan in the depths of the cave!? \"It looks like we\'re getting married.\" to go. In the city of water we stopped by on the way, we met again with the Sword Maiden――!?', 'goblin_slayer_14.jpg', 18, 1),
(18, 'Redo of Healer (12)', 'Rui Tsukiyo', 'King Dioral\'s world conquest has finally begun... Can Keyalga stop his evil ambitions?\r\n\r\nKeyarga has been robbed of the Philosopher\'s Stone by his enemy Brett.\r\nAt this rate, King Dioral, who controls Bullet, will misuse the Philosopher\'s Stone, and the feared world conquest will come true...\r\nIn order to stop King Dioral\'s ambitions, Keyaruga and his friends borrowed the power of the demons and boarded the castle, but were given the power of immortality by King Dioral. ] stands in your way――!?', 'redo_of_healer_12.jpg', 18, 1),
(20, '1bit Heart', 'Mayu Takara', 'I will change the \"lonely\" future――\r\n\r\nOne day, a mysterious girl named Misane suddenly appeared on Nanashi\'s bed.\r\nMisane proposes to Nanashi, whose self-esteem is negative, to \"make friends\" and takes him out on the town.', '1bit_heart.jpg', 28, 2),
(21, 'The Villainess Who Has Been Killed 108 Times', 'Namakura', 'Are you going to die unhappy? A unique work that makes you laugh and cry. Volumes 1 and 2 will be released simultaneously!!\r\n\r\nStabbed to death 7 times. Slashing, 11 times. Beheaded five times. Hanged, three times. Incinerate, 7 times. Drowning 8 times. Run over, 3 times. Shot dead 12 times. Poisoned, 6 times. Strangulation, 7 times... and more...\r\nIn total, Scarlett has repeated her life as a villainess 108 times.', 'the_villainess.jpg', 33, 2),
(30, 'The Coffee Shop Where The Devil Goes', 'seven-winged sheep', 'Makami Sasa, a high school girl who goes to a coffee shop, makes a startling confession to the owner, Toru Hoshigo.\r\nShe doesn\'t like black coffee, but she still sticks to bitter coffee.\r\nThis is a one-shot doujin work with a total of 44 pages. It is a manga distributed for the first time at Kansai Committee 67.', 'the_coffee_shop_where_the_devil_goes.jpg', 14, 3),
(31, '【FULL COLOR】Writhe in Agony, Adam-kun (COMIC)', 'Toyo', '\"Why do you understand...? It\'s cunning.\" In a world where all human beings could not understand due to the aftereffects of the pandemic, high school boy Kazuki was the only human being who could understand. If I were to be find out, I will have to live as a guinea pig for the rest of my life... I hate that!', 'writhe_in_agony.jpg', 30, 3),
(32, 'GUNS＆UNIVERSE 07', 'Hiroshi Kawase', 'Self-publishing entertainment SF magazine \"GUNS & UNIVERSE\" is on a reboot!\r\nFlying around space and time,\r\nFight the enemy, help the weak, crush the strong,\r\nA great adventure of love and justice!\r\nLet\'s go to the wise vacuum universe!\r\nLet\'s go to a galaxy of abundance!', 'guns_and_universe.jpg', 6, 3),
(33, 'What is Ise udon?', 'Tamaki', 'A book that approaches the mystery of the mysterious udon noodles that are thick and soft and the soup is black. We interviewed a wide range of people who know a lot about Ise udon, including well-established and famous Ise udon shops, as well as noodle makers, tamari soy sauce breweries, sauce makers, local supermarkets, and historians.\r\nThis is an in-depth collection of interviews covering everything from shallow to deep, which can be heard only by the author who has no knowledge about Ise udon and is a noodle making enthusiast.\r\nCorner to make by oneself is fulfilling, too. How to make delicious noodles with commercially available noodles and sauce (Ise udon is usually sold at supermarkets in Ise), a report on making noodles from wheat flour suitable for Ise udon, and how to make sauce using thick dashi and tamari soy sauce. will also challenge', 'ise_udon.jpg', 50, 3),
(34, 'On the street vol.5', 'Dr. Watanabe', 'Since long ago, Tokyo has undergone repeated development and demolition, and is constantly changing.\r\nThere are places where modern buildings stand side by side, and there are places where the townscapes of the old days have remained, escaping from development.\r\nThis is the fifth work of a photo book that captures the city of Tokyo, which grows in disorder and disorderly, as an imaginary landscape.', 'on_the_street_5.jpg', 11, 3),
(50, 'Chained Soldier (1)', 'Yohei Takemura, Takahiro', 'A different dimension \"Magic City\" has appeared in various parts of Japan - \"Peach\" that exists in the Magic City is a woman A female soldier called \"Magic Defense Corps\" was organized by bringing unique abilities only. One day, high school boy Yuuki Wakura, who had been living a depressed life, wandered into the entrance of a magical city that suddenly appeared. There, she meets Kyoka Uzen, the beautiful boss of the 7th show of the \"Magic Defense Force\", who declares \"I will make you my slave\"...!?', 'chained_soldier_1.jpg', 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'Tan Zhi', 'volcanoyung.tzy@gmail.com', 'ed2b1f468c5f915f3f1cf75d7068baae'),
(2, 'Tan Zhi Hong', 'zhihong@gmail.com', 'ed2b1f468c5f915f3f1cf75d7068baae');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `user_id` int(10) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_title` varchar(64) NOT NULL,
  `book_description` text NOT NULL,
  `book_img_name` varchar(255) NOT NULL,
  `book_price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`user_id`, `book_id`, `book_title`, `book_description`, `book_img_name`, `book_price`) VALUES
(2, 31, '【FULL COLOR】Writhe in Agony, Adam-kun (COMIC)', '\"Why do you understand...? It', 'writhe_in_agony.jpg', 30),
(1, 50, 'Chained Soldier (1)', 'A different dimension \"Magic City\" has appeared in various parts of Japan - \"Peach\" that exists in the Magic City is a woman A female soldier called \"Magic Defense Corps\" was organized by bringing unique abilities only. One day, high school boy Yuuki Wakura, who had been living a depressed life, wandered into the entrance of a magical city that suddenly appeared. There, she meets Kyoka Uzen, the beautiful boss of the 7th show of the \"Magic Defense Force\", who declares \"I will make you my slave\"...!?', 'chained_soldier_1.jpg', 30);

-- --------------------------------------------------------

--
-- Table structure for table `user_library`
--

CREATE TABLE `user_library` (
  `user_id` int(10) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_title` varchar(64) NOT NULL,
  `book_description` text NOT NULL,
  `book_img_name` varchar(255) NOT NULL,
  `book_price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_library`
--

INSERT INTO `user_library` (`user_id`, `book_id`, `book_title`, `book_description`, `book_img_name`, `book_price`) VALUES
(1, 12, 'Harem in the Labyrinth of Another World (5)', 'Michio, who got his own house, starts a bath life with Roxanne!\r\n\r\nMichio who got his own home. When he goes shopping for daily necessities, he finds a laundry tub and buys a huge tub that can be used for a bathtub. Michio, who got a bathtub, started a bath life with Roxanne!', 'isekai_harem_5.jpg', 16),
(1, 11, 'Harem in the Labyrinth of Another World (2)', 'Michio has finally become Roxanne', 'isekai_harem_2.jpg', 16),
(1, 13, 'Harem in the Labyrinth of Another World (9)', 'Welcomed by Roxanne in a maid outfit, Michio enjoys a new kind of healing.\r\n\r\nMichio goes to disaster relief after receiving an emergency quest from the guild. Complete the quest there while freezing in the snow. When Michio returns to his home, he is greeted by Roxanne in a maid outfit who has been cleaning. When Roxanne noticed that her michio', 'isekai_harem_9.jpg', 16),
(1, 10, 'Harem in the Labyrinth of Another World (1)', 'Another world fantasy that won first place overall in \"Let', 'isekai_harem_1.jpg', 16),
(1, 17, 'Goblin Slayer Volume 14', 'The stage of the next battle is the Elf Village.\r\n\r\nThe Goblin Slayer party fights back against goblins attacking the adventurer training ground. What is Goblin Slayer', 'goblin_slayer_14.jpg', 18),
(1, 31, '【FULL COLOR】Writhe in Agony, Adam-kun (COMIC)', '\"Why do you understand...? It', 'writhe_in_agony.jpg', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
