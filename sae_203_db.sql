-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 11 juin 2023 à 16:03
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae_203_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int NOT NULL AUTO_INCREMENT,
  `auteur_id` int DEFAULT NULL,
  `titre` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `chapo` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `contenu` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)',
  `lien_yt` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_23A0E6660BB6FE6` (`auteur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `auteur_id`, `titre`, `chapo`, `contenu`, `image`, `date_creation`, `lien_yt`) VALUES
(1, 1, 'CYU Université Cergy : Formation Bachelor Universitaire de Technologie en Métiers du Multimédia et de l\'Internet', ' L\'université CYU Cergy offre une formation de premier cycle d\'enseignement supérieur de haute qualité dans le domaine des Métiers du Multimédia et de l\'Internet.', 'Son programme de Bachelor Universitaire de Technologie est conçu pour préparer les étudiants à une carrière dynamique et prometteuse dans le secteur en constante évolution du multimédia et de l\'internet. Dans cet article, nous explorerons les caractéristiques clés de cette formation et les opportunités qu\'elle offre aux étudiants. Une formation axée sur les Métiers du Multimédia et de l\'Internet: Le Bachelor Universitaire de Technologie en Métiers du Multimédia et de l\'Internet de CYU Université Cergy est conçu pour offrir aux étudiants une base solide dans les compétences techniques, créatives et conceptuelles nécessaires pour réussir dans ce domaine en plein essor. Les étudiants sont exposés à des matières telles que le design graphique, le développement web, l\'animation, la communication digitale, la gestion de projets multimédias, la création de contenu numérique et bien d\'autres encore. Des enseignants experts et des infrastructures modernes: La formation est dispensée par une équipe d\'enseignants hautement qualifiés et expérimentés, qui sont des professionnels du secteur. Les étudiants bénéficient ainsi d\'un enseignement basé sur des connaissances pratiques et actualisées. De plus, l\'université CYU Cergy dispose d\'infrastructures modernes et d\'équipements de pointe, tels que des laboratoires informatiques et des studios multimédias, permettant aux étudiants de mettre en pratique leurs compétences et de réaliser des projets concrets.', 'https://iutmmi.fr/wp-content/uploads/2020/11/but4.jpg', '0000-00-00 00:00:00', ''),
(2, 2, 'Les Dernières Avancées Technologiques qui Transforment le Monde', 'L\'évolution rapide de la technologie a un impact profond sur nos vies, transformant la manière dont nous interagissons, travaillons et vivons.', 'Dans cet article, nous allons explorer les dernières avancées technologiques qui façonnent notre société et ouvrent de nouvelles perspectives passionnantes pour l\'avenir. L\'intelligence artificielle (IA) et l\'apprentissage automatique continuent de repousser les limites de ce qui est possible. Les algorithmes d\'IA sont devenus plus sophistiqués, permettant des avancées dans des domaines tels que la reconnaissance d\'images, la traduction automatique, les véhicules autonomes et les assistants virtuels. Grâce à ces technologies, nos téléphones intelligents peuvent reconnaître nos visages et déverrouiller nos écrans, les assistants virtuels tels que Siri et Alexa sont de plus en plus compétents pour comprendre et répondre à nos demandes, et les voitures autonomes progressent vers une réalité proche. L\'Internet des Objets (IdO) est en train de révolutionner notre environnement en connectant des objets physiques à Internet. Des appareils domestiques aux villes intelligentes, en passant par les usines automatisées, les systèmes IdO permettent la collecte de données en temps réel et l\'automatisation des processus. Cela ouvre la voie à une gestion plus efficace des ressources, à une meilleure prise de décision et à une amélioration globale de la qualité de vie. Imaginez un réfrigérateur capable de commander automatiquement vos produits d\'épicerie en fonction de leur disponibilité, ou des capteurs dans les rues de votre ville qui détectent les niveaux de pollution et ajustent la circulation pour réduire les émissions. permettent la collecte de données en temps réel et l\'automatisation des processus. Cela ouvre la voie à une gestion plus efficace des ressources, à une meilleure prise de décision et à une amélioration globale de la qualité de vie.  Conclusion: Les dernières avancées technologiques continuent de révolutionner notre monde, offrant des opportunités passionnantes dans de nombreux domaines. L\'intelligence artificielle, l\'Internet', 'https://www.isatech.fr/wp-content/uploads/2020/08/conduite-changement-nouvelles-technologies.jpg', '0000-00-00 00:00:00', ''),
(3, 5, 'Les Nouveaux Métiers Liés à la Technologie : Les Professionnels de l\'Ère Numérique', 'Avec l\'évolution rapide de la technologie, de nouveaux métiers émergent pour répondre aux besoins d\'une société de plus en plus numérisée.', 'Dans cet article, nous allons explorer certains des nouveaux métiers passionnants qui se sont développés grâce aux avancées technologiques.Développeur d\'Intelligence Artificielle (IA) : Alors que l\'IA continue de se développer, les entreprises recherchent des développeurs spécialisés dans la création d\'algorithmes d\'IA avancés. Ces professionnels sont responsables de la conception, du développement et de l\'optimisation de modèles d\'apprentissage automatique pour des tâches telles que la reconnaissance d\'images, le traitement du langage naturel et la prédiction des comportements des utilisateurs.Analyste de données : L\'essor des mégadonnées a créé une demande croissante pour les analystes de données. Ces professionnels sont chargés de collecter, d\'analyser et d\'interpréter de grandes quantités de données pour aider les entreprises à prendre des décisions stratégiques éclairées. Leur expertise en statistiques, en programmation et en visualisation des données leur permet de découvrir des tendances, des modèles et des insights précieux.Spécialiste en cybersécurité : Avec l\'augmentation des cyberattaques, la cybersécurité est devenue une préoccupation majeure pour les entreprises et les organisations. Les spécialistes en cybersécurité jouent un rôle essentiel dans la protection des données et des systèmes informatiques contre les menaces. Leur travail consiste à identifier les vulnérabilités, à mettre en place des mesures de sécurité, à surveiller les activités suspectes et à réagir aux incidents de sécurité.', 'https://www.lexpress.fr/resizer/2X1-fzK_5wJ1I6efPj45DOA08CM=/970x548/cloudfront-eu-central-1.images.arcpublishing.com/lexpress/J3HPM5EWEBEAXDFONY4WRLUOLQ.jpg', '2022-05-01 00:00:00', ''),
(4, 4, 'Le Motion Design : L\'Art de Raconter des Histoires à travers le Mouvement', 'Le motion design est une discipline artistique qui associe les principes du design graphique et de l\'animation pour créer des compositions visuelles dynamiques et narratives.', 'Cette forme d\'expression visuelle est de plus en plus utilisée dans différents domaines, tels que le cinéma, la publicité, les médias numériques et même l\'interface utilisateur des applications et des sites web. Dans cet article, nous plongerons dans le monde captivant du motion design et explorerons son impact dans notre société moderne.Qu\'est-ce que le motion design ?Le motion design se concentre sur la création d\'animations graphiques, où le mouvement est utilisé pour communiquer des idées, raconter des histoires et susciter des émotions chez les spectateurs. Il peut impliquer l\'utilisation de typographie animée, d\'illustrations, de formes géométriques, de couleurs et de textures pour construire des compositions visuellement riches et engageantes. Les outils logiciels modernes offrent aux motion designers un large éventail de techniques pour donner vie à leurs créations, comme l\'animation 2D, l\'animation 3D, les effets spéciaux et la synchronisation avec la musique.Les applications du motion design :Le motion design est utilisé dans de nombreux domaines pour captiver et informer le public. Voici quelques exemples de ses applications :Publicité : Les marques utilisent le motion design pour créer des publicités télévisées ou en ligne percutantes. Les animations dynamiques peuvent aider à attirer l\'attention des téléspectateurs et à transmettre efficacement le message de la marque.Cinéma et télévision : Le motion design est utilisé dans les génériques de films, les séquences d\'ouverture, les effets spéciaux et les transitions visuelles pour créer une expérience immersive et mémorable.Médias numériques : Les sites web, les applications mobiles et les médias sociaux intègrent souvent des éléments de motion design pour améliorer l\'expérience utilisateur et rendre les interfaces plus attrayantes et interactives.Éducation et formation : Le motion design est un outil puissant pour expliquer des concepts complexes de manière visuelle et facilement compréhensible. Les animations peuvent rendre l\'apprentissage plus ludique et engageant.Vidéoclips et concerts : Les artistes utilisent le motion design pour créer des vidéoclips créatifs et immersifs, où les éléments visuels sont synchronisés avec la musique pour renforcer l\'expérience sensorielle des spectateurs lors de concerts.', 'https://www.eficiens.com/assets/uploads/2020/10/Motion_design-header.jpg', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `lien_twitter` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `lien_avatar` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`, `prenom`, `lien_twitter`, `lien_avatar`) VALUES
(1, 'CAI', 'Frédéric', 'https://twitter.com/', 'https://media.licdn.com/dms/image/C4E03AQHXqX6wDUumjg/profile-displayphoto-shrink_200_200/0/1668073572154?e=1691625600&v=beta&t=_lcWxrRc_SEJQyepNBPZ_59h8og9mV7jDYu6IxmelqQ'),
(2, 'BOULAULT', 'Noemy', 'https://twitter.com/', 'https://media.licdn.com/dms/image/C4E03AQEXsNftAwfawg/profile-displayphoto-shrink_200_200/0/1668073561168?e=1691625600&v=beta&t=ijZ33mRPkqBZ1emDa35mROfYpBClECx0-9AhC88ZqQA'),
(3, 'CHALUMEAU ', 'Sophie', 'https://twitter.com/', 'https://media.licdn.com/dms/image/D4E03AQH_y0Z_d8x7EA/profile-displayphoto-shrink_200_200/0/1674193973011?e=1692230400&v=beta&t=fUrPxnV08FcXon1p3WQGhRI3iWgsDQh-9la-aNgw5cY'),
(4, 'BAAKILI ', 'Iliesse', 'https://twitter.com/', 'https://media.licdn.com/dms/image/D4E03AQG8daC2Y2c6JA/profile-displayphoto-shrink_200_200/0/1685700197868?e=1691625600&v=beta&t=3KNHe6nmTjh70c65DWhZFVekojrzD3grydZ-susZJBQ'),
(5, 'BENDJEBARA', 'Souleyman', 'https://twitter.com/', 'https://media.licdn.com/dms/image/D4E03AQFkJTACISLyaw/profile-displayphoto-shrink_200_200/0/1686310504251?e=1691625600&v=beta&t=lMfrU2uNU0GhY8XwEQYLtjL9021ER87J-hWjku07XZM'),
(6, 'AZEROT ', 'Johan ', 'https://twitter.com/', 'https://media.licdn.com/dms/image/D4E03AQHB3Wr1NwHEGg/profile-displayphoto-shrink_200_200/0/1685804735581?e=1691625600&v=beta&t=jzZbTNYLK7Z0lkbM08T2RC8SrfPt1kNe-ZZZPWKMAUQ');

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

DROP TABLE IF EXISTS `auteurs`;
CREATE TABLE IF NOT EXISTS `auteurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien_avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien_twitter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `contenu` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `nom`, `prenom`, `email`, `contenu`, `type`, `date_creation`) VALUES
(1, 'Martin', 'Thomas', 'm.thomas43@yopmail.com', 'Je suis intéressé par la formation.', 'etudiant', '2022-04-13 08:28:01'),
(2, 'Despoux', 'Helena', 'h.despoux@foo.fr', 'Je suis intéressé par la formation.', 'etudiant', '2022-04-13 08:28:01');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E6660BB6FE6` FOREIGN KEY (`auteur_id`) REFERENCES `auteur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
