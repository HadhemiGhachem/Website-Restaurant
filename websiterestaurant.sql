-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 10 fév. 2024 à 10:02
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `websiterestaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `message`) VALUES
(2, 'hadhemi Ghachem', '451288', 'heyyy'),
(3, 'hadhemi Ghachem', '12345678', 'heyyyyyyyyyyyyyyyyyyyyyyy');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `num_plat` int(30) NOT NULL,
  `nom_plat` varchar(30) NOT NULL,
  `prix` int(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `categorie`, `num_plat`, `nom_plat`, `prix`, `description`, `image`) VALUES
(7, 'Breakfast', 1, 'All American Breakfast', 30, 'A hearty breakfast assembled with beef bacon , chicken sausage , sautéed mushrooms & vegetables , brocooli, tomato, eggs and style and toast', ''),
(8, 'Breakfast', 1, 'Egg Bnedict', 20, 'An American classic breakfast. Beef bacon and poached eggs drizzled with hollandaise sauce on English muffin, served with sauted vegetables', ''),
(9, 'Breakfast', 2, 'Egg Florentine', 18, 'sauted spinach and poached eggs drizzled with hollandaise sauce on English muffin, served with sauted vegetables .', ''),
(10, 'Breakfast', 3, 'Egg Atlantic', 26, 'smoked salmon and poached eggs drizzled with hollandaise sauce on our English muffin, served with sauted vegetables.', ''),
(11, 'Breakfast', 4, 'Egg Florentine Atlantic', 30, 'Florentine meets Atlantic. Smoked salmon , sauted spinach , and poached eggs drizzled with hollandaise sauce on English muffin , served width sauted vegetables.', ''),
(12, 'Breakfast', 5, 'Bacon And Eggs', 15, 'Eggs any style and beef bacon on toast and fresh salsa', ''),
(13, 'Breakfast', 6, 'Eggs on Toast', 12, 'Eggs any style and beef bacon on toast, served with sauteed vegetables', ''),
(14, 'Breakfast', 7, 'Dean and Deluca Pancake', 20, 'stacks of Pancakes drizzled with red berries sauce , topped with fresh red dragonfruit, bananas, strawberries, whipped cream, served with honey .', ''),
(15, 'Breakfast', 8, 'Dean And Deluca French Toast', 26, 'Housemade French toast and drizzles of berries sauce , topped with frech red dragonfruit, bananas, strawberries, whipped cream, served with honey', ''),
(16, 'Sandwiches', 1, 'Tuna Club Melt', 30, 'Grilled sandwich with tuna filling, frech tomato slices and cheese', ''),
(17, 'Sandwiches', 2, 'Ham And Cheese Croissant', 20, 'Layers of chicken ham, cheese and frech tomato in a butter croissant', ''),
(18, 'Sandwiches', 3, 'Ham And Cheese Melt', 18, 'Toasted ciabatta with yellow mustard, chicken ham, cheese and frech tomato slices', ''),
(19, 'Pasta', 1, 'Dean And Deluca Signature Meat', 30, 'A simple and wholesome pasta dish that is big on flavors. Beef metballs, tomato sauce and grated parmesan', ''),
(20, 'Pasta', 2, 'Arrabbiata', 18, 'Spicy tomato sauce with grilled eggplant, zucchini, mushrooms and capsicum', ''),
(21, 'Pizza', 1, 'Margherita', 8, 'Tomato sauce, mozzarella, and oregano', ''),
(22, 'Pizza', 2, 'Quattro Stagioni', 10, 'Tomato sauce, mozzarella, mushrooms, ham, artichokes, olives, and oregano', ''),
(23, 'Pizza', 3, 'Diavola', 9, 'Tomato sauce, mozzarella, spicy salami, and chilli pepper', ''),
(24, 'Dinner', 12, 'pizza', 0, 'plat supplémentaire', ''),
(25, 'Pizza', 3, 'pizza', 10, 'plat supplémentaire', ''),
(26, 'Pizza', 3, 'pizza', 10, 'plat supplémentaire', ''),
(27, 'Pasta', 3, 'mypizza', 100, 'pizza', ''),
(28, 'Dinner', 1, 'couscous', 20, 'plat', ''),
(29, 'Pizza', 3, 'pizza', 10, 'plat principal', ''),
(30, 'Sandwiches', 5, 'pizza', 0, 'plat principal', ''),
(31, 'Sandwiches', 15, 'Egg Bnedict', 0, 'plat supplémentaire', ''),
(32, 'Pasta', 2, 'All American Breakfast', 10, 'plat principal', ''),
(33, 'Sandwiches', 1, 'pizza', 1555, 'plat principal', ''),
(34, 'Sandwiches', 2, 'All American Breakfast', 10, 'plat principal', '');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `phone` int(8) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `personnes` int(5) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `fullname`, `phone`, `email`, `date`, `personnes`, `message`) VALUES
(15, 'hadhemi', 12345688, 'ghachem.hadhemi@gmail.com', '2024-01-26 00:12:00', 8, '11'),
(21, 'hadhemi Ghachem', 50236987, 'ghachem.hadhemi@gmail.com', '2024-02-10 14:45:00', 5, 'bonjour'),
(22, 'nada', 99210296, 'bagane.nada@gmail.com', '2024-02-07 13:00:00', 8, ''),
(24, 'hadhemi', 50236987, 'ghachem.hadhemi@gmail.com', '2024-03-01 08:56:00', 2, 'bonjour'),
(25, 'hadhemi', 50236987, 'ghachem.hadhemi@gmail.com', '2024-02-23 09:03:00', 2, 'heyyy'),
(26, 'ones lahmer', 12345678, 'lahmarons8@gmail.com', '2024-02-16 11:05:00', 3, 'bonjour'),
(27, 'hadhemi Ghachem', 12345678, 'hadhemi.ghachem2002@gmail.com', '2024-02-28 12:08:00', 3, 'heyyy');

-- --------------------------------------------------------

--
-- Structure de la table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(35) NOT NULL,
  `confirm_password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `signup`
--

INSERT INTO `signup` (`id`, `firstname`, `lastname`, `email`, `phone`, `password`, `confirm_password`) VALUES
(14, 'hadhemi', 'Ghachem', 'ghachem.hadhemi@gmail.com', '12121217', '$2y$10$oYhD4Cp89R.c.2dkXQD9ue3I/bcn', '$2y$10$kAudmayo1UG9kwT1.FSsp.vlcEmm'),
(15, 'hadhemi', 'ghachem', 'ghachem.hadhemi@gmail.com', '20806850', '$2y$10$K7LQSCtQkhfXK', '$2y$10$FPhTnu0lJ5/J4'),
(16, 'hadhemi', 'ghachem', 'hadhemi.ghachem2002@gmail.com', '12345678', '$2y$10$QiKA9nJw2Uadf', '$2y$10$f7bb2kFtus7QL'),
(18, 'ranim', 'brahem', 'ranim.brahem@gmail.com', '20806145', '456c3816494a33a4b404583cc54ffcb7', 'azerty12'),
(19, 'hadhemi', 'lahmer', 'ghach.hadhemi@gmail.com', '20806857', 'aze78', 'aze78'),
(20, 'hadhemi', 'ghachem', 'hadhemigh@gmail.com', '12345699', '$2y$10$Hj5O35Cv3ppGzQ1prDzlf.o8NZwf', '$2y$10$Gv7MekI1NRIAyvZT2JLUGevkcmFN'),
(21, 'chaima', 'maalel', 'ranim.braem@gmail.com', '50236944', '$2y$10$1ZD4c2cuYazt0MQ5bfm3VuZHK0it', '$2y$10$w9aFDy3jK9HQiQLclqhNv.leTI.T'),
(22, 'chaima', 'ghachem', 'ranim.brahem@gmail.com', '12345678', '$2y$10$vGcuLt5oeVL9KH4TDm2HHey/Uc5e', '$2y$10$m1jysEr7ehvRVAqvT9WdcO18ZWmb'),
(23, 'john', 'doe', 'doe@gmail.com', '11111111', '$2y$10$CpSRUydDPMW/77wCwfz8KeidxaZR', '$2y$10$WNb5Rng4D6tbxu5Gi23Nq.3JTc5V'),
(24, 'chaima', 'maalel', 'chaima.maalel@gmail.com', '22223333', '$2y$10$yauljIvxsGtNZKp0/O4mfuedURcX', '$2y$10$CtYQRMVQ4dcN9CgxnxOSNuwdQHNW');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
