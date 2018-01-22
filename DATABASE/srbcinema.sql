-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2018 at 04:25 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srbcinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE IF NOT EXISTS `movie` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(1024) NOT NULL,
  `background` varchar(1024) NOT NULL,
  `description` varchar(1920) NOT NULL,
  `year` int(4) NOT NULL,
  `raiting` varchar(4) NOT NULL,
  `video` varchar(1920) NOT NULL,
  `novo` int(1) NOT NULL,
  `popularno` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `image`, `background`, `description`, `year`, `raiting`, `video`, `novo`, `popularno`) VALUES
(1, 'Jackals', 'Jackals (2017).jpg', '', 'Set in the 1980s, an estranged family hires a cult deprogrammer to take back their teenage son from a murderous cult, but find themselves under siege when the cultists surround their cabin, demanding the boy back.', 2017, '4,5', 'https://www.youtube.com/watch?v=tI6xfJMDvjY', 0, 0),
(2, 'Radin!', 'Radin! (2016).jpg', '', 'A stingy man who saves all his money finds out he has daughter, which turns out to be a very expensive discovery.', 2016, '3,9', 'https://www.youtube.com/watch?v=8hmQFU2hpJM', 0, 0),
(3, 'Cage Dive', 'Cage Dive (2017).jpg', '', 'Three friends filming an audition tape for an extreme reality show, take part in shark cage diving, only to be left in great white infested waters, turning their recording into life and death.', 2017, '4,2', 'https://www.youtube.com/watch?v=etnN5Adg6qM', 1, 0),
(4, 'Middle School', 'The Worst Years of My Life (2016)', '', 'Imaginative quiet teenager Rafe Katchadorian is tired of his middle school\'s obsession with the rules at the expense of any and all creativity. Desperate to shake things up, Rafe and his best friends have come up with a plan: break every single rule in the school and let the students run wild.', 2016, '3,2', 'https://www.youtube.com/watch?v=XQtjPUyS6ZY', 0, 1),
(5, 'The Dark Tower', 'The Dark Tower (2017).jpg', '', 'The last Gunslinger, Roland Deschain, has been locked in an eternal battle with Walter O\'Dim, also known as the Man in Black, determined to prevent him from toppling the Dark Tower, which holds the universe together. With the fate of the worlds at stake, good and evil will collide in the ultimate battle as only Roland can defend the Tower from the Man in Black.', 2017, '4,6', 'https://www.youtube.com/watch?v=GjwfqXTebIY', 0, 0),
(6, 'Annabelle: Creation', 'Annabelle Creation (2017).jpg', '', '12 years after the tragic death of their little girl, a dollmaker and his wife welcome a nun and several girls from a shuttered orphanage into their home, where they soon become the target of the dollmaker\'s possessed creation, Annabelle.', 2017, '4,1', 'https://www.youtube.com/watch?v=zjaOgN2Uti8', 0, 0),
(7, 'Ghost House', 'Ghost House (2017).jpg', '', 'A young couple go on an adventurous vacation to Thailand only to find themselves haunted by a malevolent spirit after naively disrespecting a Ghost House.\r\n', 2017, '4,3', 'https://www.youtube.com/watch?v=U9WvN8WVtrw', 1, 0),
(8, 'Temple', 'Temple (2017).jpg', '', 'Three American tourists follow a mysterious map deep into the jungles of Japan searching for an ancient temple. When spirits entrap them, their adventure quickly becomes a horrific nightmare.', 2017, '4,2', 'https://www.youtube.com/watch?v=6XPU2XdLamg', 0, 1),
(9, 'Starship Troopers', 'Starship Troopers Traitor of Mars (2017).jpg', '', 'Federation trooper Johnny Rico is ordered to work with a group of new recruits on a satellite station on Mars, where giant bugs have decided to target their next attack.', 2017, '3,7', 'https://www.youtube.com/watch?v=8WP1hUxbNs8', 0, 0),
(10, 'Batman and Harley Quinn', 'Batman and Harley Quinn (2017).jpg', '', 'Batman and Nightwing are forced to team with the Joker\'s sometimes-girlfriend Harley Quinn to stop a global threat brought about by Poison Ivy and Jason Woodrue, the Floronic Man.', 2017, '3,2', 'https://www.youtube.com/watch?v=Qi3yJTc8Gjk', 0, 0),
(11, 'Gong fu yu jia', 'Gong fu yu jia (2017).jpg', '', 'Chinese archeology professor Jack (Jackie Chan) teams up with beautiful Indian professor Ashmita and assistant Kyra to locate lost Magadha treasure. In a Tibetan ice cave, they find the remains of the royal army that had vanished together with the treasure, only to be ambushed by Randall (Sonu Sood), the descendent of a rebel army leader. When they free themselves, their next stop is Dubai where a diamond from the ice cave is to be auctioned. After a series of double-crosses and revelations about their past, Jack and his team travel to a mountain temple in India, using the diamond as a key to unlock the real treasure.', 2017, '3,6', 'https://www.youtube.com/watch?v=fzvIQSgm3YY', 0, 1),
(12, 'Showdown in Little Tokyo', 'Showdown in Little Tokyo (1991).jpg', '', 'Detective Chris Kenner was orphaned as a child as his father was in the service and was killed and lived in Japan. Now he is on the trail of ruthless Yakuza leader named Yoshido, who helped establish a small Japanese area in Los Angeles and is now running a drug ring disguised as a brewery. However, Kenner must team up with a Japanese-American detective named Johnny Murata, and he also must protect a witness named Minako who would testify against Yoshido. But what Kenner will soon discover that he will be in a lot more than what he bargained for.', 1991, '4,2', 'https://www.youtube.com/watch?v=nCD4kbu-QlU', 1, 0),
(13, 'Spider-Man', 'Spider-Man Homecoming (2017).jpg', '', 'Thrilled by his experience with the Avengers, Peter returns home, where he lives with his Aunt May, under the watchful eye of his new mentor Tony Stark, Peter tries to fall back into his normal daily routine - distracted by thoughts of proving himself to be more than just your friendly neighborhood Spider-Man - but when the Vulture emerges as a new villain, everything that Peter holds most important will be threatened.', 2017, '4,7', 'https://www.youtube.com/watch?v=n9DwoQ7HWvI', 0, 0),
(14, 'Sleight', 'Sleight (2016).jpg', '', 'A young street magician (Jacob Latimore) is left to care for his little sister after their parents passing, and turns to illegal activities to keep a roof over their heads. When he gets in too deep, his sister is kidnapped, and he is forced to use his magic and brilliant mind to save her.', 2016, '4,2', 'https://www.youtube.com/watch?v=jOBAoSy4oJI', 0, 1),
(15, 'Security', 'Security (2017).jpg', '', 'An ex-special services veteran (Antonio Banderas), down on his luck and desperate for work, takes a job as a security guard at a run-down mall in a rough area of town. On his first night on the job, he opens the doors up to a distraught and desperate young girl who has escaped and fled from a hijacking of the Police motorcade that was transporting her to testify as a trial witness in a briefcase. Hot on her heels is psychopathic hijacker (Ben Kingsley), alongside his resourceful henchmen, who will stop at nothing to extract and eliminate their witness.', 2017, '4,2', 'https://www.youtube.com/watch?v=KbKAkL-tmSY', 1, 0),
(16, 'I\'m a Killer', 'I\'m a Killer (2016).jpg', '', 'Inspired by true events from the 1970s, the story revolves around a young detective who becomes the head of a police unit focused on catching a rampant serial killer of women, nicknamed \'The Silesian Vampire\'.', 2016, '3,8', 'https://www.youtube.com/watch?v=DNjQoD_o6X8', 0, 0),
(17, 'Spoor', 'Spoor (2017).jpg', '', 'Janina Duszejko, an elderly woman, lives alone in the Klodzko Valley where a series of mysterious crimes are committed. Duszejko is convinced that she knows who or what is the murderer, but nobody believes her.', 2017, '3,9', 'https://www.youtube.com/watch?v=bFBpDGChM6o', 0, 0),
(18, 'Perfume', 'Perfume The Story of a Murderer (2006).jpg', '', 'Jean-Baptiste Grenouille came into the world unwanted, expected to die, yet born with an unnerving sense of smell that created alienation as well as talent. Of all the smells around him, Grenouille is beckoned to the scent of a woman\'s soul, and spends the rest of his life attempting to smell her essence again by becoming a perfumer, and creating the essence of an innocence lost.', 2006, '3,6', 'https://www.youtube.com/watch?v=zutiIw_2e2g', 0, 0),
(19, 'Law of the Land', 'Law of the Land (2017).jpg', '', 'N/A', 2017, '4,6', 'https://www.youtube.com/watch?v=g48NcFHcnAc', 1, 0),
(20, 'Darkness Rising', 'Darkness Rising (2017).jpg', '', 'Nearly murdered as a child by her mother, a woman (Katrina Law) returns to the house where her mom went mad.', 2017, '3,2', 'https://www.youtube.com/watch?v=XXuLx-kYC1E', 0, 0),
(21, 'Hell', 'Hell (2011).jpg', '', 'Three friends -FranzÃ¶sin (Lilo Baur), Franzose (Marco Calamandrei) and Leonie (Lisa Vicari)- living on a hot world due to the rise of temperatures head to the mountains, on the way the will encounter more than one obstacle. The first one will arrive on an oil station where they will meet an hostile men who will try to steal something of their car while searching for supplies on the inside of the oil station. Once gone, in the middle of the way they will be get trapped on the road and while part of the team search for oil on a car one of them will be abducted by a group of others men. Then, the real problems will just have started.', 2011, '4,5', 'https://www.youtube.com/watch?v=vsLiuq5v5Ck', 0, 1),
(22, 'Wolves at the Door', 'Wolves at the Door (2016).jpg', '', 'Four friends gather at an elegant home during the Summer of Love, 1969. Unbeknownst to them, deadly visitors are waiting outside. What begins as a simple farewell party turns to a night of primal terror as the intruders stalk and torment the four, who struggle for their lives against what appears to be a senseless attack', 2016, '3,2', 'https://www.youtube.com/watch?v=OumVB2qBBMA', 1, 0),
(23, 'Magi', 'Magi (2016).jpg', '', 'Olivia, A New York-based journalist travels to Turkey when she receives news that her sister Marla is pregnant. Marla recently ended a relationship but decides to keep the baby and that\'s when sinister things begin to occur.', 2016, '4,2', 'https://www.youtube.com/watch?v=aeOwm5n_Xsk', 0, 0),
(24, 'A Dark Song', 'A Dark Song (2016).jpg', '', 'A determined young woman and a damaged occultist risk their lives and souls to perform a dangerous ritual that will grant them what they want.', 2016, '4,8', 'https://www.youtube.com/watch?v=OccAJCbZ-7I', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(1024) NOT NULL,
  `link` varchar(1024) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `link`, `name`) VALUES
(1, 'img1.jpg', 'http://127.0.0.1/SRBCinema/movie.php?id=4', 'The Worst Years of My Life (2016)'),
(2, 'img2.jpg', 'http://127.0.0.1/SRBCinema/movie.php?id=6', 'Annabelle Creation (2017)'),
(3, 'img3.jpg', 'http://127.0.0.1/SRBCinema/movie.php?id=9', 'Starship Troopers Traitor of Mars (2017)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(32) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `permission` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `image`, `permission`) VALUES
(6, 'radule97', '$2y$10$PcxBnCPKwEktrjhn.bgDLO5WZYu68mY4PygNzugYylSAJs4NAYiJ6', 'radulovic97@gmail.com', 'Stefan', 'Radulovic', '../uploads/saffdasfsda.png', 3),
(5, 'marko.ciric', '$2y$10$vbB0aFJGrbvCNhER8I9z7eX9qEq143CyzQhlUNodVECR6x33uQsfi', 'markociric@gmail.com', 'marko', 'ciric', '', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
