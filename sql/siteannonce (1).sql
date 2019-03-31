-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 04 nov. 2018 à 20:28
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `siteannonce`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--


CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `postal` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `avatar` varchar(50) NOT NULL DEFAULT 'default_user.jpg',
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`client_id`, `firstname`, `lastname`, `email`, `password`, `postal`, `adresse`, `phone`, `avatar`) VALUES
(1, 'kouame', 'melissa', 'angemomo@gmail.com', 'e7af287f7c896a07485ff47fed078512', 'abidjan', 'a', 2, 'default_user.jpeg'),
(2, 'kouame', 'melissa', 'angemomo@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'abidjan', 'a', 2, 'default_user.jpeg'),
(3, 'kouame', 'melissa', 'angemelisk@gmail.com', 'ff5390bde5a4cf0aa2006cf2198efd29', 'abidjan', 'abidjan', 23356789, 'default_user.jpeg'),
(4, 'koudous', 'malika', 'momo@gmail.com', '06c56a89949d617def52f371c357b6db', 'abidjan', 'abidjan', 23356789, '6.jpg'),
(5, 'koffi', 'akissi', 'koffi@gmail.com', 'b70a8366588a64bd29fcc424c113a65f', 'paris', 'bouake', 3356789, 'bv.jpg'),
(6, 'paker', 'idriss', 'idriss@gmail.com', 'd0204ad84e19075f95a176b65152ffde', 'paris', 'paris', 3356789, 'default_user.jpeg'),
(7, 'lol', 'lol', 'loli@gmail.com', '0fd06c7ae501e59de591a8d45c47cd38', 'lol', 'lol', 23356789, 'default_user.jpg'),
(8, 'lechoux', 'yasmine', 'lechoux@hotmail.com', '46697650373b9c0f9cbc434e3475c21e', 'france', 'france', 23356789, 'pi.jpg'),
(9, 'parker', 'melanie', 'momo@gmail.com', 'bd1d7b0809e4b4ee9ca307aa5308ea6f', 'lyon rue muguet 34567', 'lyon', 567900432, 'default_user.jpg'),
(10, 'lapeche', 'laure', 'laure@gmail.com', '87f6f9d078c3bc5db5578f3b4add9470', 'paris rue elysee 34567', 'paris', 45678899, 'ki.jpg'),
(11, 'lauren', 'gabriell', 'gabi@gmail.com', 'a0d499c751053663c611a32779a57104', 'lyon rue muguet 34567', 'lyon', 45678899, 'default_user.jpg'),
(12, 'koudous', 'melanie', 'melanie@gmail.com', '73aaec6dc33b96597d8019f7553e96a2', 'lyon rue muguet 34567', 'lyon', 234456666, 'default_user.jpg'),
(13, 'kadio', 'flore', 'flore@gmail.com', 'a408eae65ca21f137745c692241d357c', 'lyon rue muguet 34567', 'lyon', 234578990, 'default_user.jpg'),
(14, 'parker', 'laetitia', 'parker@hotmail.com', '7f3ba34d5ceecf00cbf3e0860dfb768c', 'lyon rue muguet 34567', 'lyon', 234456666, 'pi.jpg'),
(16, 'fakri', 'regina', 'regina@gmail.com', '221182760f5b980c97c7a74a94d57364', 'appartement 123 rue bousquet 9912 paris', 'appartement 123', 123456789, 'default_user.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE IF NOT EXISTS `messagerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expediteur` varchar(50) NOT NULL,
  `destinateur` varchar(50) NOT NULL,
  `sujet` text NOT NULL,
  `corps` text NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--


CREATE TABLE IF NOT EXISTS `prestataire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text,
  `pays` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `postal` varchar(50) DEFAULT NULL,
  `phone` text,
  `profession` varchar(80) DEFAULT NULL,
  `specialite_un` varchar(50) DEFAULT NULL,
  `specialite_deux` varchar(50) DEFAULT NULL,
  `specialite_trois` varchar(50) DEFAULT NULL,
  `specialite_quatre` varchar(50) DEFAULT NULL,
  `about` text,
  `avatar` varchar(50) NOT NULL DEFAULT 'default_user.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prestataire`
--

INSERT INTO `prestataire` (`id`, `firstname`, `lastname`, `email`, `password`, `pays`, `ville`, `adresse`, `code_postal`, `postal`, `phone`, `profession`, `specialite_un`, `specialite_deux`, `specialite_trois`, `specialite_quatre`, `about`, `avatar`) VALUES
(15, 'dupont', 'gabriella', 'gabi@gmail.com', 'a0d499c751053663c611a32779a57104', NULL, NULL, 'gabi', NULL, 'paris', '56789990', 'estheticienne', 'pose manicure', 'massage japonais', 'maquillage', '', NULL, 'default_user.jpg'),
(16, 'lechoux', 'melissa', 'momo@gmail.com', '1cb82d98afd903228981bd676079923f', NULL, NULL, 'paris', NULL, 'paris', '23356789', 'peintre', '', '', '', '', NULL, 'default_user.jpg'),
(17, 'pechoux', 'laetitia', 'laeti@gmail.com', '7f3ba34d5ceecf00cbf3e0860dfb768c', NULL, NULL, 'paris', NULL, 'paris rue elysee 34567', '3456789899', 'web master', 'developpement mobile', 'unity jeux', '', '', NULL, 'default_user.jpg'),
(18, 'lechoux', 'laurent', 'laurent@gmail.com', '34a321664be49e31c2368f6f42798a98', NULL, NULL, 'lyon', NULL, 'lyon rue muguet 34567', '3456789899', 'styliste', 'couture homme', 'couture femme', 'couture enfant', 'robe de mariage', NULL, 'default_user.jpg'),
(19, 'parker', 'maurice', 'maurice@hotmail.com', '06c56a89949d617def52f371c357b6db', NULL, NULL, 'paris', NULL, 'paris rue elysee 34567', '234456666', 'peintre', 'peintre interieur', 'decoration', '', '', NULL, 'default_user.jpg'),
(20, 'dupont', 'gabriel', 'dupont@gmail.com', '4a4ee9175dce2cdd43431df13f5d9471', NULL, NULL, 'lyon', NULL, 'lyon rue muguet 34567', '234456666', 'coiffeur Ã  domicil', 'coiffure homme', 'coiffure enfant', 'coupe de cheveux', 'entretien capilaire', NULL, 'default_user.jpg'),
(21, 'lapeche', 'laurent', 'momo@gmail.com', '06c56a89949d617def52f371c357b6db', NULL, NULL, 'paris', NULL, 'paris rue elysee 34567', '3456789899', 'ebeniste', 'meuble literie', 'meuble cuisine', '', '', NULL, 'default_user.jpg'),
(22, 'fakri', 'laurene', 'laurene@hotmail.com', 'd4139a5e62ceb63f1146792156b62b14', NULL, NULL, 'paris', NULL, 'paris rue elysee 34567', '2356789000', 'estheticienne', 'pose manicure', 'massage', 'maquillage', '', NULL, 'default_user.jpg'),
(23, 'touze', 'eugene', 'eugene@hotmail.com', 'd5d630d4355544115ee3ade77a6141ee', NULL, NULL, 'paris', NULL, 'paris rue elysee 34567', '3456789899', 'graphiste', 'cover magasine', 'logo personnalisÃ©', 'affiche publicitaire', '', NULL, 'default_user.jpg'),
(24, 'toupert', 'gabriel', 'gabriel@gmail.com', 'a0d499c751053663c611a32779a57104', NULL, NULL, 'paris', NULL, 'paris rue elysee 34567', '234456666', 'graphiste', 'cover magasine', 'logo personnalisÃ©', 'affiche publicitaire', 'cartoon', NULL, 'default_user.jpg'),
(25, 'durass', 'dupont', 'loli@gmail.com', '0fd06c7ae501e59de591a8d45c47cd38', 'france', 'paris', 'appartement 123', 2, 'appartement 123 cite des bouquets 99912  paris', '123456789', 'ebeniste', 'meuble literie', 'meuble cuisine', 'meuble deco', 'vermissage', 'je suis dans ce metier depuis 20 ans', 'default_user.jpg'),
(30, 'durass', 'dupont', 'loli@gmail.com', 'd6581d542c7eaf801284f084478b5fcc', NULL, NULL, 'appartement 123', NULL, 'appartement 123 rue bousquet 9912 paris', '123456789', 'ebeniste', 'meuble cuisine', 'meuble literie', '', '', NULL, 'default_user.jpg'),
(33, 'dupont', 'laroche', 'dupont@gmail.com', '4a4ee9175dce2cdd43431df13f5d9471', NULL, NULL, 'appartement 23', NULL, 'appartement 23 cite des bosquets 99 paris', '12335678899', 'graphiste', 'cover magasine', 'logo personnalisee', 'cartoon', '', NULL, 'default_user.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
