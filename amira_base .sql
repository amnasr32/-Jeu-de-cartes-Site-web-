
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



--
-- Base de données :  `amira_base` 
-- --------------------------------------------------------
Pour créer la base on tape la commande  : CREATE DATABASE amira_base;

--
-- Structure de la table `cartes_anglais`
--

DROP TABLE IF EXISTS `cartes_anglais`;
CREATE TABLE IF NOT EXISTS `cartes_anglais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) NOT NULL,
  `reponse` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cartes_anglais`
--

INSERT INTO `cartes_anglais` (`id`, `question`, `reponse`) VALUES
(1, 'Le verbe \"Trouver\" en anglais?', 'to find'),
(2, ' Traduction du verbe \"eat\"?', 'manger'),
(3, 'Traduction de \"young \"?', 'jeune'),
(4, 'Remettre dans l\'ordre les mots suivants : to/ rather/ London./ fly / \'d /She ', 'She’d rather fly to London.'),
(5, 'ComplÃ©ter : \" Laura wants to ___ piano. \"', 'play'),
(6, 'Phrase correcte , oui ou non? \" He bought this book for improve.\"', 'non'),
(7, 'ComplÃ©ter : \" ____ sun is shining today.\"', 'The'),
(8, 'ComplÃ©ter : \"He came to visit us a month ____ . \"', 'ago'),
(9, 'Remettre dans l\'ordre les mots suivants : music /stopped /ago. / minutes /The /five\r\n', 'The music stopped five minutes ago.'),
(10, 'Mettre la phrase a la voix passive: \" We sometimes type the texts.\"', 'The texts are often typed.');

-- --------------------------------------------------------

--
-- Structure de la table `cartes_cuisine`
--

DROP TABLE IF EXISTS `cartes_cuisine`;
CREATE TABLE IF NOT EXISTS `cartes_cuisine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) NOT NULL,
  `reponse` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cartes_cuisine`
--

INSERT INTO `cartes_cuisine` (`id`, `question`, `reponse`) VALUES
(1, 'Quel est le plat traditionnel de la Tunisie?', 'Le Couscous'),
(2, 'Quel est l\'ingredient base de la cuisine espagnole?', 'L\'huile d\'olive'),
(3, 'La traditionnelle b&#252;che de No&#235;l est le plus souvent composÃ©e de ?', 'CrÃ¨me au beurre'),
(4, 'Le riz du sushi est principalement prÃ©parÃ© avec', 'Du vinaigre');

-- --------------------------------------------------------

--
-- Structure de la table `cartes_histoire_geo`
--

DROP TABLE IF EXISTS `cartes_histoire_geo`;
CREATE TABLE IF NOT EXISTS `cartes_histoire_geo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) NOT NULL,
  `reponse` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cartes_histoire_geo`
--

INSERT INTO `cartes_histoire_geo` (`id`, `question`, `reponse`) VALUES
(1, 'Quelle est la date de la rÃ©volution franÃ§aise ?', '15 mai 1799'),
(2, 'Combien de pays y\'a t-il dans l\'union europÃ©enne en 2019?', '28'),
(3, 'quel est le mois et l\'annÃ©e de la chute du mur Berlin?', 'novembre 1991'),
(4, 'Dans quelle annÃ©e et quel pays a commencÃ© la rÃ©volution industrielle ?', '1760 Angleterre'),
(5, 'Quel est le continent et la capitale du BahreÃ¯n', 'Asie Manama'),
(6, 'Quel est le diamÃ¨tre de la terre?\r\n', '12742 km'),
(7, 'Quel est l\'an de la Fin de l\'empire Romain en Occident?', 'l\'an 476 aprÃ¨s J-C'),
(8, 'Date de creation du WWF?\r\n', '1961'),
(9, 'Qui dont les inventeurs d\'internet ?\r\n', 'Robert Kahn et Vint Cerf'),
(10, 'Quel est l\'an de naissance de 1ere ministÃ¨re de l\'environnement ?\r\n', '1971');

-- --------------------------------------------------------

--
-- Structure de la table `cartes_math`
--

DROP TABLE IF EXISTS `cartes_math`;
CREATE TABLE IF NOT EXISTS `cartes_math` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `reponse` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cartes_math`
--

INSERT INTO `cartes_math` (`id`, `question`, `reponse`) VALUES
(1, 'Calculer: 112 + 15 x 333 / 4 - 70', '1290,75'),
(2, 'Sachant que a est une constante quelle est la derivee de a ?', '0'),
(3, '(a+b)*(a+b)=?', 'a^2+2*a*b+b^2'),
(4, 'exp(ln(x))=?', 'x'),
(5, 'formule du volume d\'un cube de cote c ', 'c*c*c'),
(6, 'calculer les km/h pour 5 metres parcourue en 622 secondes?', '1,5  km/h'),
(7, 'formule d\'aire d\'un parallÃ©logramme de longueur b et de largeur h ', 'b*h'),
(8, 'Deux droites paralÃ©les a et b et c la droite perpendiculaire a \'a\' alors c est perpendiculaire a  ?', 'b'),
(9, 'f(x)=x^2+3*x+1 alors f\'(x)=? ', '2*x+3'),
(10, 'g(x)=x^2+9*x+5. Quelle est la limite de g(x) quand x tend vers l\'infini?(la reponse en lettres)', 'plus l\'infini');

-- --------------------------------------------------------

--
-- Structure de la table `cartes_sport`
--

DROP TABLE IF EXISTS `cartes_sport`;
CREATE TABLE IF NOT EXISTS `cartes_sport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) NOT NULL,
  `reponse` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cartes_sport`
--

INSERT INTO `cartes_sport` (`id`, `question`, `reponse`) VALUES
(1, 'Qui a remportÃ© le coupe du monde en 2018?', 'La France'),
(2, 'Qui a le plus grand nombre de ballon d\'or?', 'Lionel Messi'),
(3, 'Quel est le sport de prÃ¨dilection de Raphael Nadal ?', 'Tennis');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--
 Pour les utilisateurs  on insere les pseudo et passwords suivants : 
 
 amnasr32,am26840
may13al,admin25840
kosovi55,Zied1hela
dori61,jomasa00
nouba2,bouchnak
test1,123
DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `role`, `username`, `password`) VALUES
(1, 'admin', 'amnasr32', '1e513a0350c07aa2838449fe65a7399c'),
(2, 'user', 'may13al', '99df9cee87584ff7dff629e95d1ab05c'),
(3, 'user', 'kosovi55', '499af3895c73019db745df2ab3363863'),
(4, 'user', 'dori61', '3f00e4246c9a271b5d2a495d68e3e1f1'),
(5, 'user', 'nouba2', 'e285ffc811b60a55769d45938876509f');
COMMIT;


