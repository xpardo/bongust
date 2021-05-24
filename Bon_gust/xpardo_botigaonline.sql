-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Temps de generació: 21-05-2021 a les 18:30:30
-- Versió del servidor: 5.7.33-0ubuntu0.16.04.1
-- Versió de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `xpardo_botigaonline`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `client_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `cart_product`
--

CREATE TABLE `cart_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bolcament de dades per a la taula `categoria`
--

INSERT INTO `categoria` (`id`, `nom`) VALUES
(1, 'Caf&eacute;'),
(2, 'Xocolata'),
(3, 'Te'),
(4, 'Accessoris');

-- --------------------------------------------------------

--
-- Estructura de la taula `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_bin NOT NULL,
  `cognom` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `telefon` varchar(15) COLLATE utf8_bin NOT NULL,
  `direccio` varchar(100) COLLATE utf8_bin NOT NULL,
  `provincia` varchar(100) COLLATE utf8_bin NOT NULL,
  `usuari_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de la taula `comandes`
--

CREATE TABLE `comandes` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de la taula `detall_comandes`
--

CREATE TABLE `detall_comandes` (
  `id` int(11) NOT NULL,
  `comades_id` int(11) NOT NULL,
  `productes_id` int(11) NOT NULL,
  `preu` int(11) NOT NULL,
  `quantitat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de la taula `Imatges`
--

CREATE TABLE `Imatges` (
  `id` int(11) NOT NULL,
  `nom` text COLLATE utf8_bin NOT NULL,
  `ruta` text COLLATE utf8_bin NOT NULL,
  `productes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Bolcament de dades per a la taula `Imatges`
--

INSERT INTO `Imatges` (`id`, `nom`, `ruta`, `productes_id`) VALUES
(1, 'Café molido natural cultivo sostenible Nestlé Bonka 500 g', 'upload/10_05_2021_cafe_molido_natural.png', 1),
(2, 'Cafè mòlt natural crema e agrado Lavazza 250 g.', 'upload/11_05_2021_crema_Lavazza.png', 2),
(3, 'C&agrave;psula reutilitzable Evergreen™per Nespresso ', 'upload/11_05_2021_evergreen-reusable-capsule-for-nespresso.png', 3),
(4, 'C&agrave;psula reutilitzable Capsule per Dolce Gusto&reg; ', 'upload/11_05_2021_evergreen-reusable-capsule-for-dolce-gusto.png', 4),
(5, 'Càpsula reutilitzable Evergreen &#153; per a Tassimo&reg;', 'upload/11_05_2021_evergreen-reusable-capsule-for-tassimo.png', 5),
(6, 'Xocolata Negre 73% Amb Ametlles Ecol&ograve;gic Sol&eacute; 150g', 'upload/11_05_2021_chocolate_almendres.png', 6),
(7, 'Xocolata Negre amb Canela Ecol&ograve;gic el 56% Cacau 100g Sole', 'upload/11_05_2021_chocolate-negro-con-canela-ecologico.png ', 7),
(8, 'Yogi Tea BIO Xocolata 17 bossetes', 'upload/11_05_2021_choco-te.png', 8),
(9, 'Xocolata Blanca Sol&eacute, 100 gr', 'upload/11_05_2021_choco-blanco.png', 9),
(10, 'Xocolata a la tassa 70% cacau amb Xile i pebre Simon Coll', 'upload/11_05_2021_cacao-con-chile-y-pimienta-simon-coll.png', 10),
(11, 'TE Matcha 100% ECOL&ograve;GIC', 'upload/11_05_2021_te-verde-matcha.png', 11),
(12, 'Caixa tes freds gust menta amb 15 sobres', 'upload/11_05_2021_Oq_TesFrios_Menta-620x0.png ', 12),
(13, 'Te Fred de Llimona', 'upload/11_05_2021_Oq_TesFrios_Limonsmall.png', 13),
(14, 'Te Negre Canela i Taronja', 'upload/12_05_2021_oquendo-30-infusiones-te-negro-canela-naranja.png', 14),
(15, 'Llauna d\'infusions 15 pir&agrave;mides', 'upload/12_05_2021_oquendo-30-infuciones-te-vermell-maduixa-i-kiwi.png', 15),
(16, 'Set de te matcha Cerim&ograve;nia del te.', 'upload/12_05_2021_set-de-te-matcha-ceremonia-del-te.png', 16),
(17, 'upload/12_05_2021_lata-de-cafe-500-g-le-chat-noir.png', 'upload/12_05_2021_lata-de-cafe-500-g-le-chat-noir.png', 17),
(18, 'Tassa d\'infusi&oacute; \"Li xat noir', 'upload/12_05_2021_taza-de-infusion-le-chat-noir.png', 18),
(19, 'Lletera Barista Grey 0.5 L ', 'upload/12_05_2021_lechera-barista-de-lacor-58150.png', 19),
(20, 'Filtres de caf&egrave; 1X4&reg; / 40', 'upload/12_05_2021_Melitta.png', 20);

-- --------------------------------------------------------

--
-- Estructura de la taula `producategory`
--

CREATE TABLE `producategory` (
  `id_producte` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Bolcament de dades per a la taula `producategory`
--

INSERT INTO `producategory` (`id_producte`, `id_categoria`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(20, 4);

-- --------------------------------------------------------

--
-- Estructura de la taula `productes`
--

CREATE TABLE `productes` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcio` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `preu` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `imatge` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bolcament de dades per a la taula `productes`
--

INSERT INTO `productes` (`id`, `nom`, `descripcio`, `preu`, `imatge`, `id_categoria`) VALUES
(1, 'Caf&eacute; molido natural cultivo sostenible Nestl&eacute; Bonka 500 g.', 'Caf&eacute; molido natural cultivo sostenible Nestl&eacute; Bonka 500 g.', '3.95', 'upload/10_05_2021_cafe_molido_natural.png', 1),
(2, 'Caf&eacute; m&ograve;lt natural crema e agrado Lavazza 250 g. ', 'Crem&ograve;s i amb cos. Aroma intensa i equilibrada, amb cos, sabor fragant de gran regust i notes d\'esp&eacute;cies.\r\nApte per a tota mena de cafeteres. 100% natural. ', '2.89', 'upload/11_05_2021_crema_Lavazza.png', 1),
(3, 'C&agrave;psula reutilitzable Evergreen&trade; per Nespresso ', 'Les C&agrave;psules Evergreen&trade; s&oacute;n c&agrave;psules reutilitzables i ecol&ograve;giques compatibles amb Nespresso&reg;. No dubti mes! Estalvi&iuml; diners i al mateix temps faci un gest per a salvar el planeta i les generacions futures. ', '27.49', 'upload/11_05_2021_evergreen-reusable-capsule-for-nespresso.png', 1),
(4, 'C&agrave;psula reutilitzable Capsula per Dolce Gusto&reg; ', 'C&agrave;psula reutilitzable Capsule per Dolce Gusto&reg; ', '59.99', 'upload/11_05_2021_evergreen-reusable-capsule-for-dolce-gusto.png', 1),
(5, 'C&agrave;psula reutilitzable Evergreen&trade; per a Tassimo&reg;', 'Les c&agrave;psules Evergreen&reg; s&oacute;n c&agrave;psules reutilitzables i ecol&ograve;giques compatibles amb Nespresso&reg;, Tassimo&reg; i molts altres sistemes. Estalvieu diners i al mateix temps ajudeu a salvar el planeta i les generacions futures.', '29.99', 'upload/11_05_2021_evergreen-reusable-capsule-for-tassimo.png', 1),
(6, 'Xocolata Negre 73% Amb Ametlles Ecol&ograve;gic Sol&eacute; 150g', 'Per als amants de la fruita seca i les ametlles tenim aquest xocolata negra 73% amb ametlles. La combinaci&oacute; de la xocolata m&eacute;s natural amb cruixents i delicioses ametlles far&agrave; que aquesta tableta es converteixi en la teva favorita. A m&eacute;s , els seus ingredients s&oacute;n de producci&oacute; ecol&ograve;gica , de manera que conserven tot el sabor i propietats.', '3.67', 'upload/11_05_2021_chocolate_almendres.png', 2),
(7, 'Xocolata Negre amb Canela Ecol&ograve;gic el 56% Cacau 100g Sole', 'Ara pots gaudir d&acute;el gust de la canyella en aquesta varietat de xocolata negra 56% cacau amb canyella de Sol&eacute; . Aliment natural i molt saludable, ofereix nombrosos beneficis per a la salut, redueix el risc de problemes cardiovasculars, millora el flux sanguini i aporta antioxidants. Elaborat sense subst&agrave;ncies qu&iacute;miques de cap tipus, el 100% dels ingredients utilitzats en la seva elaboraci&oacute; s&oacute;n de producci&oacute; ecol&ograve;gica certificada. Aquest producte no cont&eacute; gluten pel que &egrave;s ideal per a persones cel&iacute;aques.', '2.28', 'upload/11_05_2021_chocolate-negro-con-canela-ecologico.png ', 2),
(8, 'Yogi Tea BIO Xocolata 17 bossetes', 'El cacau s&acute;uneix amb la regal&egrave;ssia dol&ccedil;a , la canyella, el gingebre picant i el cardamom en una barreja celestial. Seu, pren un glop i gaudeix del meravell&oacute;s aroma de la xocolata. La millor manera de prendre-ho &eacute;s endolcit i amb una mica de llet, animal o vegetal.', '3.61', 'upload/11_05_2021_choco-te.png', 2),
(9, 'Xocolata Blanca Sol&eacute; , 100 gr', 'xocolata blanca, se\'t fon a la boca', '1.98', 'upload/11_05_2021_choco-blanco.png', 2),
(10, 'Xocolata a la tassa 70% cacau amb Xile i pebre Simon Coll', 'Rajola de xocolata desfeta 70% cacau amb Xile i pebre de Sim&oacute;n Coll.\r\nSim&oacute;n Coll &eacute;s una xocolatera nascuda el 1840 a Sant Sadurn&iacute; d\'Anoia i en la que porten participant fa sis generacions familiars.', '1.95', 'upload/11_05_2021_cacao-con-chile-y-pimienta-simon-coll.png', 2),
(11, 'TE Matcha 100% ECOL&Ograve;GIC', 'Te Matcha ecol&ograve;gic d&acute;alta qualitat de Jap&oacute;. Un poder&oacute;s antioxidant que proporciona energia, accelera el metabolisme i controla els nivells de sucre en sang. Sense colorants, conservants ni sucre.', '9.95', 'upload/11_05_2021_te-verde-matcha.png', 3),
(12, 'Te Fred de Menta', 'Caixa tes freds gust menta amb 15 sobres', '9.66', 'upload/11_05_2021_Oq_TesFrios_Menta-620x0.png ', 3),
(13, 'Te Fred de Llimona', 'Caixa tes freds gust llimona amb 15 sobres', '9.66', 'upload/11_05_2021_Oq_TesFrios_Limonsmall.png', 3),
(14, 'Te Negre Canela i Taronja', 'Llauna d\'infusions 15 pir&agrave;mides', '3.75', 'upload/12_05_2021_oquendo-30-infusiones-te-negro-canela-naranja.png', 3),
(15, 'Te Vermell Maduixa i Kiwi', 'Llauna d&acute;infusions 15 pir&agrave;mides', '3.75', 'upload/12_05_2021_oquendo-30-infuciones-te-vermell-maduixa-i-kiwi.png', 3),
(16, 'Set de te matcha, Cerim&ograve;nia del te.', 'Aquest joc est&agrave; compost del necessari per celebrar la tradicional cerim&ograve;nia del preparat de el te matcha tan conegut de la cultura japonesa:\r\n-Bol cer&agrave;mic.\r\n\r\n-Chazaku (cullereta mesuradora).\r\n\r\n-Chasen (batedor).', '39.95', 'upload/12_05_2021_set-de-te-matcha-ceremonia-del-te.png', 4),
(17, 'Llauna de caf&egrave; 500 g \"Li xat noir\"', 'Llauna de caf&egrave; de 500 g \"Li xat noir\". Amb tancament clip herm&egrave;tic ,21.3 cm x 11.5 cm x 7.4 cm.\r\n', '8.95', 'upload/12_05_2021_lata-de-cafe-500-g-le-chat-noir.png', 4),
(18, 'Tassa d\'infusi&oacute; \"Li xat noir\"', 'Tassa d\'infusi&oacute; de porcellana de 250 ml de capacitat, per preparar els teus infusions favorites, ja que posseeix un filtre d\'acer inoxidable de gran durada i de f&agrave;cil neteja, a m&eacute;s de tapa tamb&eacute; de porcellana.\r\n\r\nAquesta gravada tant a l\'interior com a l\'exterior amb imatges modernistes franceses de \"Li xat noir\".\r\n\r\nA m&eacute;s &eacute;s apta per a microones i rentavaixelles', '11.95', 'upload/12_05_2021_taza-de-infusion-le-chat-noir.png', 4),
(19, 'Lletera Barista Grey 0.5 L', 'Destaca pel disseny de la seva boca i la seva forma, perfecta per fer Latte Art.', '19.20 ', 'upload/12_05_2021_lechera-barista-de-lacor-58150.png', 4),
(20, 'Filtres de caf&egrave; 1X4&reg; / 40', 'El caf&egrave; necessita sabor. Les 3 zones arom&agrave;tiques desenvolupen, refinen i arrodoneixen el gust de la teva caf&egrave; de filtre a la perfecci&oacute; . Els filtres de caf&egrave; Original 1x4&reg; encaixen perfectament en multitud de cafeteres est&agrave;ndard.', '19.20', 'upload/12_05_2021_Melitta.png', 4);

-- --------------------------------------------------------

--
-- Estructura de la taula `shop_order`
--

CREATE TABLE `shop_order` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_at` datetime NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `shop_order_item`
--

CREATE TABLE `shop_order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_price` double NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `shop_payment`
--

CREATE TABLE `shop_payment` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_response` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `usuaris`
--

CREATE TABLE `usuaris` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(150) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Bolcament de dades per a la taula `usuaris`
--

INSERT INTO `usuaris` (`id`, `nom`, `password`, `email`) VALUES
(5, 'x', '4cb1ceabdefb770be1b8b231f328ad8a', 'x@gmail.com'),
(6, 'xenia', 'a0818cb3bc4b3614c84a30df46b40bfe', 'xpullodsmx@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de la taula `usuaris_socials`
--

CREATE TABLE `usuaris_socials` (
  `id` int(11) NOT NULL,
  `usuaris_id` int(11) NOT NULL,
  `social_id` int(11) NOT NULL,
  `service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Índexs per a la taula `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuari_id` (`usuari_id`);

--
-- Índexs per a la taula `comandes`
--
ALTER TABLE `comandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Índexs per a la taula `detall_comandes`
--
ALTER TABLE `detall_comandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comades_id` (`comades_id`),
  ADD KEY `productes_id` (`productes_id`);

--
-- Índexs per a la taula `Imatges`
--
ALTER TABLE `Imatges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producte` (`productes_id`);

--
-- Índexs per a la taula `producategory`
--
ALTER TABLE `producategory`
  ADD PRIMARY KEY (`id_producte`,`id_categoria`),
  ADD KEY `fk_categoria_id` (`id_categoria`);

--
-- Índexs per a la taula `productes`
--
ALTER TABLE `productes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria` (`id_categoria`);

--
-- Índexs per a la taula `shop_order`
--
ALTER TABLE `shop_order`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `shop_order_item`
--
ALTER TABLE `shop_order_item`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `shop_payment`
--
ALTER TABLE `shop_payment`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `usuaris_socials`
--
ALTER TABLE `usuaris_socials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuaris_id` (`usuaris_id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la taula `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `comandes`
--
ALTER TABLE `comandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `detall_comandes`
--
ALTER TABLE `detall_comandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `productes`
--
ALTER TABLE `productes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la taula `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la taula `usuaris_socials`
--
ALTER TABLE `usuaris_socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `productes` (`id`);

--
-- Restriccions per a la taula `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`usuari_id`) REFERENCES `usuaris` (`id`);

--
-- Restriccions per a la taula `comandes`
--
ALTER TABLE `comandes`
  ADD CONSTRAINT `comandes_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Restriccions per a la taula `detall_comandes`
--
ALTER TABLE `detall_comandes`
  ADD CONSTRAINT `detall_comandes_ibfk_1` FOREIGN KEY (`comades_id`) REFERENCES `comandes` (`id`),
  ADD CONSTRAINT `detall_comandes_ibfk_2` FOREIGN KEY (`productes_id`) REFERENCES `productes` (`id`);

--
-- Restriccions per a la taula `Imatges`
--
ALTER TABLE `Imatges`
  ADD CONSTRAINT `fk_producte` FOREIGN KEY (`productes_id`) REFERENCES `productes` (`id`);

--
-- Restriccions per a la taula `producategory`
--
ALTER TABLE `producategory`
  ADD CONSTRAINT `fk_categoria_id` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produ_id` FOREIGN KEY (`id_producte`) REFERENCES `productes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriccions per a la taula `productes`
--
ALTER TABLE `productes`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);

--
-- Restriccions per a la taula `usuaris_socials`
--
ALTER TABLE `usuaris_socials`
  ADD CONSTRAINT `usuaris_socials_ibfk_1` FOREIGN KEY (`usuaris_id`) REFERENCES `usuaris` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
