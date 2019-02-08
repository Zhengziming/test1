--
-- Base de données: `vinodb`
--
DROP TABLE IF EXISTS `bouteille__cellier`;
DROP TABLE IF EXISTS `vino__type`;
DROP TABLE IF EXISTS `cellier`;
DROP TABLE IF EXISTS `usager`;
DROP TABLE IF EXISTS `vino__saq`;

-- Structure de la table `vino__bouteille`--


CREATE TABLE `vino__saq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `code_saq` varchar(50) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `prix_saq` float(7,2) DEFAULT NULL,
  `url_saq` varchar(200) DEFAULT NULL,
  `url_img` varchar(200) DEFAULT NULL,
  `format` varchar(20) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `vino__bouteille`
--

INSERT INTO `vino__saq` VALUES(1, 'Borsao Seleccion', '//s7d9.scene7.com/is/image/SAQ/10324623_is?$saq-rech-prod-gril$', '10324623', 'Espagne', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 10324623', 11, 'https://www.saq.com/page/fr/saqcom/vin-rouge/borsao-seleccion/10324623', '//s7d9.scene7.com/is/image/SAQ/10324623_is?$saq-rech-prod-gril$', ' 750 ml', 1);
INSERT INTO `vino__saq` VALUES(2, 'Monasterio de Las Vinas Gran Reserva', '//s7d9.scene7.com/is/image/SAQ/10359156_is?$saq-rech-prod-gril$', '10359156', 'Espagne', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 10359156', 19, 'https://www.saq.com/page/fr/saqcom/vin-rouge/monasterio-de-las-vinas-gran-reserva/10359156', '//s7d9.scene7.com/is/image/SAQ/10359156_is?$saq-rech-prod-gril$', ' 750 ml', 1);
INSERT INTO `vino__saq` VALUES(3, 'Castano Hecula', '//s7d9.scene7.com/is/image/SAQ/11676671_is?$saq-rech-prod-gril$', '11676671', 'Espagne', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 11676671', 12, 'https://www.saq.com/page/fr/saqcom/vin-rouge/castano-hecula/11676671', '//s7d9.scene7.com/is/image/SAQ/11676671_is?$saq-rech-prod-gril$', ' 750 ml', 1);
INSERT INTO `vino__saq` VALUES(4, 'Campo Viejo Tempranillo Rioja', '//s7d9.scene7.com/is/image/SAQ/11462446_is?$saq-rech-prod-gril$', '11462446', 'Espagne', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 11462446', 14, 'https://www.saq.com/page/fr/saqcom/vin-rouge/campo-viejo-tempranillo-rioja/11462446', '//s7d9.scene7.com/is/image/SAQ/11462446_is?$saq-rech-prod-gril$', ' 750 ml', 1);
INSERT INTO `vino__saq` VALUES(5, 'Bodegas Atalaya Laya 2017', '//s7d9.scene7.com/is/image/SAQ/12375942_is?$saq-rech-prod-gril$', '12375942', 'Espagne', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 12375942', 17, 'https://www.saq.com/page/fr/saqcom/vin-rouge/bodegas-atalaya-laya-2017/12375942', '//s7d9.scene7.com/is/image/SAQ/12375942_is?$saq-rech-prod-gril$', ' 750 ml', 1);
INSERT INTO `vino__saq` VALUES(6, 'Vin Vault Pinot Grigio', '//s7d9.scene7.com/is/image/SAQ/13467048_is?$saq-rech-prod-gril$', '13467048', 'États-Unis', 'Vin blanc\r\n         \r\n      \r\n      \r\n      États-Unis, 3 L\r\n      \r\n      \r\n      Code SAQ : 13467048', NULL, 'https://www.saq.com/page/fr/saqcom/vin-blanc/vin-vault-pinot-grigio/13467048', '//s7d9.scene7.com/is/image/SAQ/13467048_is?$saq-rech-prod-gril$', ' 3 L', 2);
INSERT INTO `vino__saq` VALUES(7, 'Huber Riesling Engelsberg 2017', '//s7d9.scene7.com/is/image/SAQ/13675841_is?$saq-rech-prod-gril$', '13675841', 'Autriche', 'Vin blanc\r\n         \r\n      \r\n      \r\n      Autriche, 750 ml\r\n      \r\n      \r\n      Code SAQ : 13675841', 22, 'https://www.saq.com/page/fr/saqcom/vin-blanc/huber-riesling-engelsberg-2017/13675841', '//s7d9.scene7.com/is/image/SAQ/13675841_is?$saq-rech-prod-gril$', ' 750 ml', 2);
INSERT INTO `vino__saq` VALUES(8, 'Dominio de Tares Estay Castilla y Léon 2015', '//s7d9.scene7.com/is/image/SAQ/13802571_is?$saq-rech-prod-gril$', '13802571', 'Espagne', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 13802571', 18, 'https://www.saq.com/page/fr/saqcom/vin-rouge/dominio-de-tares-estay-castilla-y-leon-2015/13802571', '//s7d9.scene7.com/is/image/SAQ/13802571_is?$saq-rech-prod-gril$', ' 750 ml', 1);
INSERT INTO `vino__saq` VALUES(9, 'Tessellae Old Vines Côtes du Roussillon 2016', '//s7d9.scene7.com/is/image/SAQ/12216562_is?$saq-rech-prod-gril$', '12216562', 'France', 'Vin rouge\r\n         \r\n      \r\n      \r\n      France, 750 ml\r\n      \r\n      \r\n      Code SAQ : 12216562', 21, 'https://www.saq.com/page/fr/saqcom/vin-rouge/tessellae-old-vines-cotes-du-roussillon-2016/12216562', '//s7d9.scene7.com/is/image/SAQ/12216562_is?$saq-rech-prod-gril$', ' 750 ml', 1);
INSERT INTO `vino__saq` VALUES(10, 'Tenuta Il Falchetto Bricco Paradiso -... 2015', '//s7d9.scene7.com/is/image/SAQ/13637422_is?$saq-rech-prod-gril$', '13637422', 'Italie', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Italie, 750 ml\r\n      \r\n      \r\n      Code SAQ : 13637422', 34, 'https://www.saq.com/page/fr/saqcom/vin-rouge/tenuta-il-falchetto-bricco-paradiso---barbera-dasti-superiore-docg-2015/13637422', '//s7d9.scene7.com/is/image/SAQ/13637422_is?$saq-rech-prod-gril$', ' 750 ml', 1);

-- --------------------------------------------------------
-- Structure de la table `usager`

 
CREATE TABLE `usager` (
  `username` varchar(200)  PRIMARY KEY,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;



INSERT INTO `usager` VALUES('customer', 'vinolover420');


-- --------------------------------------------------------
-- Structure de la table `cellier`


CREATE TABLE `cellier` (
  `id_user` varchar(200),
  `id_cellier` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  PRIMARY KEY (`id_cellier`),
FOREIGN KEY (`id_user`) REFERENCES `usager`(`username`) 
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;


INSERT INTO `cellier` VALUES('customer', 1 , "mycellar" );
--
-- Structure de la table `vino__type`
--

DROP TABLE IF EXISTS `vino__type`;
CREATE TABLE `vino__type` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vino__type`
--

INSERT INTO `vino__type` VALUES(1, 'Vin rouge');
INSERT INTO `vino__type` VALUES(2, 'Vin blanc');

--
-- Structure de la table `bouteille__cellier`
--


CREATE TABLE `bouteille__cellier` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `id_bouteille_saq` int(11) NOT NULL,
  `date_achat` date DEFAULT NULL,
  `garde_jusqua` varchar(200) DEFAULT NULL,
  `nom` varchar(200) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `prix` float(7,2) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `millesime` int(11) DEFAULT NULL,
  `id_cellier` int(11) NOT NULL,
  FOREIGN KEY (`id_bouteille_saq`) REFERENCES `vino__saq`(`id`),
  FOREIGN KEY (`id_cellier`) REFERENCES `cellier`(`id_cellier`),
  FOREIGN KEY (`type`) REFERENCES `vino__type`(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT = 10;

--
-- Contenu de la table `vino__cellier`
--

INSERT INTO `bouteille__cellier` VALUES(1, 10, '0000-00-00', '','nom1','pays1', '', 13.55,1, 3, 0,1);
INSERT INTO `bouteille__cellier` VALUES(10, 5, '0000-00-00', '','nom2','pays2', '', 10.16,1, 3, 0,1);
INSERT INTO `bouteille__cellier` VALUES(12, 5, '0000-00-00', '','nom3','pays3', '', 12.81,1, 3, 0,1);
INSERT INTO `bouteille__cellier` VALUES(13, 5, '0000-00-00', '','nom4','pays4', '', 17.99,1, 3, 0,1);

-- --------------------------------------------------------


