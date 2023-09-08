-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 08 sep. 2023 à 16:17
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hotel_house`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description_courte` varchar(255) NOT NULL,
  `description_longue` longtext NOT NULL,
  `photo` varchar(255) NOT NULL,
  `prix_journalier` int(11) NOT NULL,
  `date_enregistrement` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id`, `titre`, `description_courte`, `description_longue`, `photo`, `prix_journalier`, `date_enregistrement`) VALUES
(1, 'chambre classique', '<div>Situé dans le 1er arrondissement de Paris à 500m</div>', '<div>Profiter de nos chambres classiques le temps d\'une nuit pour faire une pause</div>', '1694086641-pexels-max-rahubovskiy-6782567-9089c16e1d39d68cb229f1e297b31afdfdec537a.jpg', 10000, '2023-09-07 13:37:21'),
(2, 'chambre confort', '<div>&nbsp;Situé dans le 1ᵉʳ arrondissement de Paris à 500m&nbsp;</div>', '<div>Nos chambres conforts sont conçues pour donner pleinement satisfaction</div>', '1694087718-pexels-pixabay-164595-b5b13af9ee90bb5bcebeafa072f69d67ab70bcec.jpg', 20000, '2023-09-07 13:55:17'),
(3, 'Suite', '<div>Situé dans le&nbsp; 1er arrondissement de Paris à 500m</div>', '<div>Nos suites sont à la fois spacieuses et lumineuses. N\'hésitez pas</div>', '1694087936-pexels-max-rahubovskiy-6394550-f207982b0cb79996c079a618577084462cd542e2.jpg', 30000, '2023-09-07 13:58:56');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `chambre_id` int(11) NOT NULL,
  `date_arrivee` date NOT NULL,
  `date_depart` date NOT NULL,
  `prix_total` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  `relation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230906023257', '2023-09-06 04:33:45', 838),
('DoctrineMigrations\\Version20230906102853', '2023-09-06 12:29:44', 250),
('DoctrineMigrations\\Version20230906134620', '2023-09-07 21:37:14', 155);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `ordre` int(11) NOT NULL,
  `date_enregistrement` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `slider`
--

INSERT INTO `slider` (`id`, `photo`, `ordre`, `date_enregistrement`) VALUES
(7, '1694035067-im1-01cafb5a2ea2cdb7132631d4962101cb3fa3e62d.jpg', 1, '2023-09-06 23:17:47'),
(8, '1694035098-im3-89b45866b8653796c3848a074b9af5e3307dc847.jpg', 2, '2023-09-06 23:18:18'),
(9, '1694035123-im4-5490c8853c84b67ed25507fe4dc669c4804bd0ac.jpg', 3, '2023-09-06 23:18:43');

-- --------------------------------------------------------

--
-- Structure de la table `spa`
--

CREATE TABLE `spa` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `date_enregistrement` datetime DEFAULT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `spa`
--

INSERT INTO `spa` (`id`, `titre`, `photo`, `description`, `date_enregistrement`, `prix`) VALUES
(1, 'Spa avec soin Détente', '1694120866-pexels-anna-shvets-5069432-1993a7baaf9d1bcee54731f18b50a715e8fc723c.jpg', '<div>&nbsp;Plongez dans un océan de relaxation totale avec notre soin de spa exclusif \"Soin Détente\" à l\'Hôtel Oasis. Conçu pour éliminer le stress, apaiser les tensions musculaires et restaurer votre bien-être général, ce soin est une escapade ultime vers la tranquillité et la sérénité.&nbsp;</div>', '2023-09-07 23:07:46', 100),
(2, 'Spa avec soin Relaxant', '1694121143-pexels-elina-fairytale-3865792-9533f380f349fe981aac7ceeb9de370c2b2f81b0.jpg', '<div>&nbsp;</div><ol><li><em>Bain Aromatique</em> - Commencez votre voyage de détente avec un bain chaud aromatique qui apaise vos muscles et détend votre esprit.</li><li><em>Massage Relaxant</em> - Profitez d\'un massage profondément apaisant qui cible les zones de tension musculaire. Nos thérapeutes expérimentés utilisent des mouvements fluides pour éliminer le stress et restaurer l\'équilibre.</li></ol><div>&nbsp;</div>', '2023-09-07 23:12:23', 200),
(4, 'Spa avec soin Plaisir', '1694121478-pexels-jonathan-borba-3101547-893b9a29e3dd3ed3bb316bb3cbd952f7046b3ec8.jpg', '<div>&nbsp;</div><ol><li><em>Accueil Chaleureux</em> - À votre arrivée au spa, notre équipe dévouée vous accueille avec un sourire amical et vous guide à travers votre expérience de spa.</li><li><em>Consultation Personnalisée</em> - Avant le début du traitement, notre thérapeute qualifié discutera de vos besoins et préférences pour adapter le soin à votre état de santé et à vos attentes.</li><li><em>Bain Aromatique</em> - Commencez votre voyage de détente avec un bain chaud aromatique qui apaise vos muscles et détend votre esprit.</li><li><em>Massage Relaxant</em> - Profitez d\'un massage profondément apaisant qui cible les zones de tension musculaire. Nos thérapeutes expérimentés utilisent des mouvements fluides pour éliminer le stress et restaurer l\'équilibre.</li><li><em>Gommage Exfoliant</em> - Votre peau sera choyée avec un gommage exfoliant doux, éliminant les cellules mortes pour une peau radieuse et soyeuse.</li><li><em>Masque Revitalisant</em> - Un masque naturel riche en nutriments est appliqué pour nourrir et revitaliser votre peau, la laissant douce et lumineuse.</li><li><em>Hydratation</em> - Terminez votre expérience avec une hydratation en profondeur pour renforcer l\'éclat naturel de votre peau.</li></ol><div><strong><br>Avantages du Soin Détente :</strong>&nbsp;<br><br></div>', '2023-09-07 23:17:58', 900);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `civilite` varchar(255) NOT NULL,
  `date_enregistrement` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6EEAA67D9B177F54` (`chambre_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `spa`
--
ALTER TABLE `spa`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `spa`
--
ALTER TABLE `spa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67D9B177F54` FOREIGN KEY (`chambre_id`) REFERENCES `chambre` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
