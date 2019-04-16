-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 16 avr. 2019 à 10:16
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_jf`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `genre` varchar(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `title`, `summary`, `genre`, `image`) VALUES
(1, 'Un Billet Simple pour l\'Alaska', '<p><span style=\"color: #696969; font-family: \'Open Sans\', sans-serif; font-size: 14.4px; background-color: #ffffff;\">Peter Flectcher avait tout juste 2 ans quand sa m&egrave;re a quitt&eacute; l&rsquo;Alaska, fuyant la vie trop rude, et laissant derri&egrave;re elle le p&egrave;re de Peter. Peter a aujourd&rsquo;hui 26 ans et m&egrave;ne une vie bien remplie &agrave; Toronto. Lorsqu&rsquo;il apprend que les jours de son p&egrave;re, tr&egrave;s malade, sont peut-&ecirc;tre compt&eacute;s, il entreprend le voyage jusqu&rsquo;&agrave; son village natal. Il va alors d&eacute;couvrir le quotidien &laquo; &agrave; la dure &raquo; , les journ&eacute;es qui comptent peu d&rsquo;heures de clart&eacute;, les nuits &agrave; la belle &eacute;toile&hellip; Il va en profiter pour mieux conna&icirc;tre son p&egrave;re, &agrave; qui il tient beaucoup malgr&eacute; les erreurs qu&rsquo;il a commises</span></p>', 'suspense', 'book1.jpeg'),
(2, 'L\'Écho de ton souvenir', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed commodo dui a elit egestas condimentum. Suspendisse volutpat nibh nisl, nec fermentum elit auctor quis. Nulla in fermentum libero. Pellentesque molestie a quam eu varius. Aenean tincidunt libero at sapien tincidunt hendrerit.</p>', 'fiction', 'book2.jpeg'),
(3, 'L\'enfant qui venait des étoiles', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed commodo dui a elit egestas condimentum. Suspendisse volutpat nibh nisl, nec fermentum elit auctor quis. Nulla in fermentum libero. Pellentesque molestie a quam eu varius. Aenean tincidunt libero at sapien tincidunt hendrerit.</p>', 'suspense', 'book3.jpeg'),
(4, 'A la poursuite du sauvage', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed commodo dui a elit egestas condimentum. Suspendisse volutpat nibh nisl, nec fermentum elit auctor quis. Nulla in fermentum libero. Pellentesque molestie a quam eu varius. Aenean tincidunt libero at sapien tincidunt hendrerit.</p>', 'aventure', 'book4.jpeg'),
(5, 'L\'Ombre du vent', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed commodo dui a elit egestas condimentum. Suspendisse volutpat nibh nisl, nec fermentum elit auctor quis. Nulla in fermentum libero. Pellentesque molestie a quam eu varius. Aenean tincidunt libero at sapien tincidunt hendrerit.</p>', 'aventure', 'book5.jpeg'),
(6, 'Le Voyageur Imprudent', '<p><span style=\"color: #000000; font-family: \'Open Sans\', Arial, sans-serif; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget augue fringilla, posuere mi vitae, volutpat felis. Duis quis consectetur sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed luctus eros. Quisque posuere, mauris ac lacinia maximus, dui odio ultricies neque, in iaculis sem est sagittis justo. Vivamus in malesuada quam. Praesent at libero id dolor faucibus mollis. Suspendisse non facilisis erat.</span></p>', 'fiction', 'LEVOYAGEURIMPRUDENT.jpeg'),
(7, 'Au Delà Des Étoiles', '<p><span style=\"color: #000000; font-family: \'Open Sans\', Arial, sans-serif; text-align: justify; background-color: #ffffff;\">Phasellus imperdiet velit nec erat euismod vestibulum. Sed molestie porta eros, at cursus erat posuere sit amet. Etiam sit amet tortor pellentesque, blandit massa non, malesuada risus. Aliquam id mollis ipsum, eu scelerisque ante. In et eros semper, accumsan sem eget, cursus augue.</span></p>', 'fiction', 'audeladesetoiles.jpeg'),
(8, 'On Se Reverra', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><span style=\"color: #000000; font-family: \'Open Sans\', Arial, sans-serif; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dui erat, condimentum sit amet dapibus ac, efficitur in augue. Nullam maximus quis nisi sit amet pretium. Cras et orci at sapien fermentum vulputate eget at metus. In finibus malesuada ligula, sed interdum enim fringilla quis. Aliquam eget elementum nunc. Morbi vitae consectetur tellus, non pretium nisl.</span></p>\r\n</body>\r\n</html>', 'suspense', 'ON_SE_REVERRA.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id`, `title`, `body`, `image`, `created_at`) VALUES
(1, 'Prologue', '<p><strong>5 novembre 1993 Anchorage, Alaska</strong></p>\r\n<p>&nbsp; &nbsp;Wren d&eacute;pose les deux valises &agrave; roulettes pr&egrave;s de la poussette et tire une longue bouff&eacute;e de la cigarette n&eacute;gligemment fich&eacute;e au coin de ses l&egrave;vres. Il souffle la fum&eacute;e dans l&rsquo;air glac&eacute;.</p>\r\n<p>- C\'est tout ? demande-t-il.</p>\r\n<p>- Il manque le sac de couches.</p>\r\n<p>&nbsp; &nbsp;Je hume l&rsquo;odeur musqu&eacute;e de sa cigarette. J&rsquo;ai toujours eu l&rsquo;odeur du tabac en horreur. C&rsquo;est toujours le cas, sauf quand c&rsquo;est Wren qui fume.</p>\r\n<p>&ndash; D&rsquo;accord, je vais te le chercher, dit-il, l&acirc;chant sa cigarette dans la neige avant de l&rsquo;&eacute;craser avec sa botte.</p>\r\n<p>&nbsp; &nbsp;Il joint ses mains calleuses, souffle dedans et file, &eacute;paules rentr&eacute;es, vers le tarmac o&ugrave; le Cessna qui nous a d&eacute;pos&eacute;s attend son heure de retour vers Bangor.</p>\r\n<p>&nbsp; &nbsp;Je le regarde s&rsquo;&eacute;loigner, impassible, blottie dans la longue doudoune polaire qui me prot&egrave;ge du vent glacial, m&rsquo;accrochant farouchement &agrave; la ranc&oelig;ur qui me ronge depuis des mois. Si je l&acirc;che prise maintenant, je vais &ecirc;tre submerg&eacute;e par la douleur, la d&eacute;ception et l&rsquo;in&eacute;vitable sentiment de perte qui m\'habite et auquel je ne pourrais pas faire face.</p>', 'prologue.jpeg', '2019-02-20 12:40:27'),
(2, 'Chapitre 1', '<p><strong>16 juillet 2018</strong></p>\r\n<p>&nbsp; &nbsp;Cette calculatrice n&rsquo;est pas &agrave; moi.</p>\r\n<p>&nbsp; &nbsp;Je souris am&egrave;rement tandis que j&rsquo;examine le contenu du carton &ndash; brosse &agrave; dents, dentifrice, tenue de sport, une bo&icirc;te de mouchoirs, un maxi flacon d&rsquo;Advil, un sac de produits de beaut&eacute; avec quatre tubes de rouge &agrave; l&egrave;vres entam&eacute;s, de la laque, une brosse &agrave; cheveux et six paires de chaussures que je gardais autrefois sous mon bureau. C&rsquo;est l&agrave; que je remarque le co&ucirc;teux engin de calcul. Le mois dernier, j&rsquo;avais r&eacute;ussi &agrave; convaincre mon sup&eacute;rieur que j&rsquo;allais en avoir besoin. De toute &eacute;vidence, l&rsquo;agent de s&eacute;curit&eacute; charg&eacute; de nettoyer mon bureau de tous mes effets personnels pendant que je me faisais cr&ucirc;ment virer de mon job avait d&ucirc; penser qu&rsquo;elle m&rsquo;appartenait. Probablement &agrave; cause du nom &laquo; Calla Fletcher &raquo; marqu&eacute; au feutre ind&eacute;l&eacute;bile dessus, un avertissement &agrave; l&rsquo;attention de mes coll&egrave;gues qui auraient eu l&rsquo;id&eacute;e de me la piquer. Qu&rsquo;ils aillent se faire voir, c&rsquo;est la mienne, maintenant !</p>\r\n<p>&nbsp; &nbsp;Je m&rsquo;accroche bec et ongles &agrave; ce petit bout de satisfaction que m&rsquo;octroie cette d&eacute;cision tandis que le m&eacute;tro d&eacute;boule du tunnel de la station Yonge. Dans le wagon plong&eacute; dans le noir, je fixe mon reflet dans la vitre, ignorant de mon mieux le picotement dans ma gorge.</p>\r\n<p>&nbsp; &nbsp;Le m&eacute;tro de Toronto est tellement calme et d&eacute;sert &agrave; cette heure de la journ&eacute;e que j&rsquo;ai pu m&rsquo;asseoir o&ugrave; je voulais. Je peine &agrave; me rappeler de la derni&egrave;re fois que j&rsquo;ai eu ce luxe. Pendant presque quatre ans, pour aller et revenir du travail, j&rsquo;ai d&ucirc; m&rsquo;entasser dans des wagons bond&eacute;s, asphyxi&eacute;e par les odeurs corporelles et ballott&eacute;e dans les incessantes et infernales bousculades de l&rsquo;heure de pointe. Mais cette fois-ci, le trajet pour rentrer chez moi est bien diff&eacute;rent.</p>', 'chpt1.jpeg', '2019-02-20 12:40:27'),
(3, 'Chapitre 2', '<p>- Tu sors ?</p>\r\n<p>Simon consulte sa montre. L&rsquo;id&eacute;e que l&rsquo;on puisse sortir voir des amis &agrave; vingt-trois heures le laisse perplexe. &Agrave; moins que maman ne l&rsquo;y oblige, &agrave; quarante-six ans, mon beau-p&egrave;re ne quitte jamais la maison, ou tr&egrave;s peu. Pour lui, le summum du fun consiste &agrave; se servir un verre de cherry et de s&rsquo;installer devant le dernier documentaire diffus&eacute; sur la BBC.</p>\r\n<p>&ndash; &Ccedil;a ne peut pas me faire de mal.</p>\r\n<p>&nbsp; &nbsp;Par-dessus ses lunettes, il jette un rapide coup d&rsquo;&oelig;il paternel &agrave; la tenue que je porte et retourne &agrave; sa lecture. Ce soir, j&rsquo;ai jet&eacute; mon d&eacute;volu sur des talons hauts et sur la robe noire la plus courte et pr&egrave;s du corps possible. Tenue qui, en n&rsquo;importe quelle autre occasion, aurait pu me faire passer pour une escort girl, mais en juillet, un mardi soir sur Richmond Street ? C&rsquo;est presque le strict minimum.</p>\r\n<p>&nbsp; &nbsp;Simon ne fait presque jamais de commentaire sur ce que je porte et je lui en sais gr&eacute;. Dieu sait quelle conclusion psychologique il tire de cet accoutrement. Une soudaine pouss&eacute;e d&rsquo;&eacute;gocentrisme pour pallier ma fiert&eacute; bless&eacute;e ? Un appel &agrave; l&rsquo;attention g&eacute;n&eacute;rale, probablement ? Un sacr&eacute; complexe d&rsquo;&oelig;dipe ?</p>\r\n<p>&ndash; Tu retrouves tout ton petit gang ?</p>\r\n<p>&ndash; Non, ils ne sont pas en ville. Juste Diana.</p>', 'chpt2.jpeg', '2019-02-20 14:35:32'),
(4, 'Chapitre 3', '<p>&nbsp; &nbsp;&ndash; Il faut absolument que tu y ailles !</p>\r\n<p>&nbsp; &nbsp;Diana crie pour se faire entendre par-dessus les basses de la sono et s&rsquo;interrompt un bref instant pour adresser un sourire &eacute;clatant au barman qui nous sert nos verres sur le comptoir.</p>\r\n<p>&nbsp; &nbsp;&ndash; L&rsquo;Alaska, c&rsquo;est magnifique ! insiste-t-elle.</p>\r\n<p>&nbsp; &nbsp;&ndash; Arr&ecirc;te, tu n&rsquo;y as jamais mis les pieds !</p>\r\n<p>&nbsp; &nbsp;&ndash; C&rsquo;est vrai, mais j&rsquo;ai vu Into The Wild ! La nature sauvage, les montagnes&hellip; &Eacute;vite juste de manger des baies.</p>\r\n<p>&nbsp; &nbsp;Dans un geste appuy&eacute;, elle glisse un billet de cinq dollars sur le bar &agrave; l&rsquo;attention du barman, astuce qui nous vaudra d&rsquo;&ecirc;tre servies en priorit&eacute; pour le verre suivant. Toute l&rsquo;attention de ce dernier est accapar&eacute;e par le d&eacute;collet&eacute; plongeant de ma robe bleu cobalt, premi&egrave;re fringue qui me soit tomb&eacute;e sous la main avant de partir de chez moi en catastrophe. Le type est mignon mais trapu, il a le cr&acirc;ne ras&eacute; et un tatouage sur tout le bras. Il est loin d&rsquo;&ecirc;tre mon genre d&rsquo;homme : grand, mince, bien coiff&eacute; et sans encre sous la peau. De toute fa&ccedil;on, je ne suis pas d&rsquo;humeur &agrave; draguer pour des shots gratuits.</p>\r\n<p>&nbsp; &nbsp;Je lui fais tout de m&ecirc;me un sourire puis recentre mon attention sur ma conversation avec Diana.</p>\r\n<p>&nbsp; &nbsp;&ndash; Ce sera sur la c&ocirc;te ouest de l&rsquo;Alaska, ce n&rsquo;est pas pareil.</p>\r\n<p>&nbsp; &nbsp;&ndash; Sant&eacute; ! dit-elle avant que nous ne vidions nos shots cul sec. C&rsquo;est</p>', 'chpt3.jpeg', '2019-02-20 15:03:42'),
(5, 'Chapitre 4', '<p>&nbsp; &nbsp;&ndash; Elles sont jolies.</p>\r\n<p>&nbsp; &nbsp;Maman tient une paire de bottes de pluie rouges Hunter.</p>\r\n<p>&nbsp; &nbsp;&ndash; N&rsquo;est-ce pas ? Mais elles prennent beaucoup de place, j&rsquo;h&eacute;site &agrave; les emporter.</p>\r\n<p>&nbsp; &nbsp;&ndash; Fais-moi confiance, prends-les.</p>\r\n<p>&nbsp; &nbsp;Elle les d&eacute;pose dans la valise sp&eacute;ciale chaussures et cosm&eacute;tiques &ndash; d&eacute;j&agrave; pr&ecirc;te &agrave; d&eacute;border &ndash; et s&rsquo;assoit sur mon lit o&ugrave; elle passe en revue une pile d&rsquo;&eacute;tiquettes de prix, vestige de ma s&eacute;ance de shopping sp&eacute;ciale Alaska de la veille.</p>\r\n<p>&nbsp; &nbsp;&ndash; Tu es certaine de ne partir qu&rsquo;une semaine ?</p>\r\n<p>&nbsp; &nbsp;&ndash; &laquo; La cl&eacute;, c&rsquo;est de partir surcharg&eacute;e &raquo;, c&rsquo;est ce que tu m&rsquo;as appris.</p>\r\n<p>&nbsp; &nbsp;&ndash; Tu as raison. C&rsquo;est d&rsquo;autant plus vrai l&agrave; o&ugrave; tu te rends. Il faudra en permanence avoir sur toi de quoi affronter chaque situation. Si tu oublies quelque chose, il n&rsquo;y aura pas de boutiques &agrave; disposition. Ils n&rsquo;ont m&ecirc;me pas de centre commercial l&agrave;-bas. Cette seule id&eacute;e la fait grincer des dents.</p>\r\n<p>&nbsp; &nbsp;&ndash; Il n&rsquo;y a rien l&agrave;-bas, reprend-t-elle. Ce n&rsquo;est qu&rsquo;un&hellip;</p>\r\n<p>&nbsp; &nbsp;&ndash; Un grand terrain &agrave; l&rsquo;abandon, je sais, dis-je en fourrant dans une autre valise une grosse paire de chaussettes de laine, miraculeusement retrouv&eacute;e dans mes affaires d&rsquo;hiver. Mais peut-&ecirc;tre que &ccedil;a a chang&eacute;.</p>', 'chpt4.jpeg', '2019-02-20 15:05:31'),
(6, 'Chapitre 5', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&ndash; Il n&rsquo;y a que deux op&eacute;rateurs qui fonctionnent par ici.</p>\r\n<p>Le chauffeur de taxi, un homme d&rsquo;&acirc;ge m&ucirc;r m&rsquo;adresse un sourire moqueur par-dessus son &eacute;paule, amus&eacute; de m&rsquo;entendre pester contre le manque de r&eacute;seau.</p>\r\n<p>Je r&acirc;le et range mon portable.</p>\r\n<p>&ndash; Il faut croire que le mien n&rsquo;en fait pas partie.</p>\r\n<p>&Agrave; cinq heures ce matin, avant de prendre mon premier vol, j&rsquo;avais achet&eacute; une carte pr&eacute;pay&eacute;e pour l&rsquo;international. Pas de chance ! Pourvu qu&rsquo;il y ait le Wi-Fi chez mon p&egrave;re ou cette semaine risque de mettre ma patience &agrave; rude &eacute;preuve.</p>\r\n<p>Le chauffeur conduit doucement en direction du petit a&eacute;roport r&eacute;gional d&rsquo;o&ugrave; d&eacute;collera mon quatri&egrave;me et dernier vol. Un chauffeur m&rsquo;attend pr&egrave;s du tapis roulant &agrave; bagages avec une pancarte sur laquelle on peut lire &laquo; Calla Fletcher &raquo; en lettres capitales. Apr&egrave;s quinze heures de vol, dont l&rsquo;un a &eacute;t&eacute; retard&eacute; &agrave; Seattle, cela fait plaisir d&rsquo;&ecirc;tre accueillie ainsi.</p>\r\n<p>Mon attention se porte vers un petit avion &agrave; skis qui vient de d&eacute;coller dans les airs, sa carlingue rouge d&eacute;tonnant contre le bleu du ciel. Allais-je voyager dans un coucou de ce genre ?</p>\r\n<p>&ndash; Premi&egrave;re fois &agrave; Anchorage ?</p>\r\n<p>&ndash; Oui.</p>\r\n<p>&ndash; Qu&rsquo;est-ce qui vous am&egrave;ne ?</p>\r\n<p>&ndash; Je rends visite &agrave; quelqu&rsquo;un.</p>\r\n<p>L&rsquo;homme essaye simplement de faire la conversation mais j&rsquo;ai l&rsquo;estomac qui fait du yo-yo. Je me concentre sur ma respiration et t&acirc;che de me calmer en observant le paysage &ndash; l&rsquo;eau est bleue comme du cobalt, une v&eacute;g&eacute;tation luxuriante nous entoure de toute part et la blancheur immacul&eacute;e d&rsquo;une cha&icirc;ne de montagne point &agrave; l&rsquo;horizon. Tout &agrave; fait le type de paysage qu&rsquo;&agrave; d&eacute;crit Diana lorsque je lui ai parl&eacute; de l&rsquo;Alaska. Dans l&rsquo;avion pr&eacute;c&eacute;dent, j&rsquo;&eacute;tais rest&eacute;e le nez coll&eacute; contre le hublot, fascin&eacute;e par cette vaste mosa&iuml;que d&rsquo;arbres et de lacs.</p>\r\n</body>\r\n</html>', 'cab.jpeg', '2019-04-15 14:27:26');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `chapter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `firstname`, `lastname`, `comment`, `date_added`, `chapter_id`) VALUES
(1, 'Lyle', 'Hervieux', 'Agréable à lire et découvrir !!', '2019-04-16 09:56:41', 1),
(2, 'Nicole', 'Simard', 'Une lecture riche en découverte en plein coeur d\'une contrée sauvage.', '2019-04-16 09:57:27', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comments_flags`
--

CREATE TABLE `comments_flags` (
  `id` int(11) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `created_at`) VALUES
(1, 'Jean Forteroche ', 'JForteroche@gmail.com', '$2y$10$tNTB/e/nllro/YuCRmh7je8240SE.Xq61Q7aTrpNLRVvWkTu2ch/q', 'self.jpeg', '2019-02-24 09:40:20'),
(2, 'Julia', 'juliasajah85@gmail.com', '$2y$10$TvlsDC5XXQFaqMnaU75O3.iSV77VrdhTN7Vpuc1w97rXI5IVgMTea', 'julia.png', '2019-03-22 12:57:32'),
(3, 'Etienne', 'emousse@gmail.com', '$2y$10$BrDUbrDGJJGCmYpLoX/XEOpDAfBw25hwLX1BsPQyGfz6u5CDBDUFu', 'emousse.jpeg', '2019-03-22 14:48:25');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments_flags`
--
ALTER TABLE `comments_flags`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `comments_flags`
--
ALTER TABLE `comments_flags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
