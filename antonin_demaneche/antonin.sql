-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 05 Juin 2019 à 19:14
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `antonin`
--

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `experiences`
--

INSERT INTO `experiences` (`id`, `name`) VALUES
(1, 'Stage d\'une semaine en entreprise'),
(2, 'Stage d\'une semaine en association');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `formations`
--

INSERT INTO `formations` (`id`, `name`) VALUES
(1, 'Bac scientifique'),
(2, 'Etudes d\'informatique');

-- --------------------------------------------------------

--
-- Structure de la table `me`
--

CREATE TABLE `me` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `job` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `whoami` text NOT NULL,
  `supinfo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `me`
--

INSERT INTO `me` (`id`, `first_name`, `last_name`, `age`, `job`, `experience`, `mail`, `phone`, `whoami`, `supinfo`) VALUES
(1, 'Antonin', 'Demaneche', 20, 'Développeur web', '2 ans d\'expérience', 'antonin.demaneche@ynov.com', '06 45 78 14 09', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sit amet sapien ex. Etiam condimentum est et aliquam volutpat. Nam elit sapien, tincidunt at justo eu, maximus interdum felis. Ut dignissim massa aliquet nunc egestas, vitae rutrum turpis finibus. Suspendisse ac dolor tristique, pharetra massa ac, sollicitudin dolor. Morbi eget rhoncus arcu. Quisque pharetra facilisis ultricies. Quisque blandit facilisis ante vitae sagittis. Pellentesque gravida orci augue, vel consectetur lacus molestie et. Praesent congue consequat tempor. Nunc sed justo ut eros gravida commodo. Duis vitae eros vitae eros ultricies tincidunt. Quisque et tortor posuere, lacinia lectus in, gravida magna. Morbi vel purus vitae magna aliquam ornare sed a lacus.', 'Nullam tempor magna a consequat lacinia. Cras eget blandit augue. Phasellus vel dolor est. Cras varius velit efficitur magna tristique, id sollicitudin enim vehicula. Ut suscipit vehicula libero quis hendrerit. Ut in consequat tellus, at egestas lacus. Aliquam dapibus, nisl nec elementum venenatis, orci nibh mattis odio, et tempor felis magna at neque. Mauris sagittis vel libero mattis volutpat. In non velit eu sapien posuere ultrices quis nec magna. Nunc in nunc sodales nibh tincidunt tempor.');

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `projects`
--

INSERT INTO `projects` (`id`, `name`) VALUES
(1, 'Divers sites web'),
(2, 'Plante connectée'),
(3, 'E-shop');

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `skills`
--

INSERT INTO `skills` (`id`, `name`) VALUES
(1, 'Développement web'),
(2, 'Spécialisé en php');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `me`
--
ALTER TABLE `me`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `me`
--
ALTER TABLE `me`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
