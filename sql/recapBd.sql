--
-- Base de données: `DBmallart`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

CREATE TABLE IF NOT EXISTS `acteurs` (
`ref_code_film` int(11) DEFAULT NULL,
`ref_code_acteur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `classification`
--

CREATE TABLE IF NOT EXISTS `classification` (
`ref_code_film` int(11) DEFAULT NULL,
`ref_code_genre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `classification`
--

--
-- Structure de la table `films`
--

CREATE TABLE IF NOT EXISTS `films` (
`code_film` int(11) NOT NULL AUTO_INCREMENT,
`titre_original` varchar(50) DEFAULT NULL,
`titre_francais` varchar(50) DEFAULT NULL,
`pays` varchar(20) DEFAULT NULL,
`date` int(11) DEFAULT NULL,
`duree` int(11) DEFAULT NULL,
`couleur` varchar(10) DEFAULT NULL,
`realisateur` int(11) DEFAULT NULL,
`image` varchar(20) DEFAULT NULL,
PRIMARY KEY (`code_film`)
) ENGINE=InnoDBDEFAULT CHARSET=utf8 AUTO_INCREMENT=569 ;

--
-- Structure de la table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
`code_genre` int(11) NOT NULL AUTO_INCREMENT,
`nom_genre` varchar(50) DEFAULT NULL,
PRIMARY KEY (`code_genre`)
) ENGINE=InnoDBDEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Structure de la table `individus`
--

CREATE TABLE IF NOT EXISTS `individus` (
`code_indiv` int(11) NOT NULL AUTO_INCREMENT,
`nom` varchar(20) DEFAULT NULL,
`prenom` varchar(20) DEFAULT NULL,
`nationalite` varchar(20) DEFAULT NULL,
`date_naiss` int(11) DEFAULT NULL,
`date_mort` int(11) DEFAULT NULL,
PRIMARY KEY (`code_indiv`)
) ENGINE=InnoDBDEFAULT CHARSET=utf8 AUTO_INCREMENT=892 ;
