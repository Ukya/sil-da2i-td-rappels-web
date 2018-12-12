-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2018 at 09:43 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `film_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE IF NOT EXISTS `movie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `releaseDate` date NOT NULL,
  `synopsis` text NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `title`, `releaseDate`, `synopsis`, `rating`) VALUES
(1, 'Dolphin Tale', '2011-09-21', '<p>Alors qu’un jeune dauphin s’ébroue, il est pris au piège dans un casier à crabe et se blesse grièvement la queue. Repêché, il est transporté à l’hôpital Clearwater pour espèces marines, où il est rebaptisé Winter.</p>\r\n\r\n<p>Mais ce n’est que la première étape d’un long combat pour sa survie… Car s’il perd sa queue, Winter risque de mourir.</p>\r\n\r\n<p>Il faudra toute l’expertise d’un biologiste marin passionné, le savoir-faire d’un brillant prothésiste et le dévouement indéfectible d’un petit garçon pour que l’impossible se produise : sauver Winter. Un miracle révolutionnaire qui redonnera espoir à des milliers de personnes handicapées à travers le monde.</p>', 4),
(2, 'Jurassic Park', '1993-10-20', '<p>Ne pas réveiller le chat qui dort... C\'est ce que le milliardaire John Hammond aurait dû se rappeler avant de se lancer dans le \"clonage\" de dinosaures. </p>\r\n<p>C\'est à partir d\'une goutte de sang absorbée par un moustique fossilisé que John Hammond et son équipe ont réussi à faire renaître une dizaine d\'espèces de dinosaures. </p>\r\n<p>Il s\'apprête maintenant avec la complicité du docteur Alan Grant, paléontologue de renom, et de son amie Ellie, à ouvrir le plus grand parc à thème du monde. </p>\r\n<p>Mais c\'était sans compter la cupidité et la malveillance de l\'informaticien Dennis Nedry, et éventuellement des dinosaures, seuls maîtres sur l\'île...</p>', 5),
(3, 'Jurassic Park 2', '1997-10-22', '<p>Quatre ans après le terrible fiasco de son Jurassic Park, le milliardaire John Hammond rappelle le Dr Ian Malcolm pour l\'informer de son nouveau projet. Sur une île déserte, voisine du parc, vivent en liberté des centaines de dinosaures de toutes tailles et de toutes espèces. Ce sont des descendants des animaux clônes en laboratoire. D\'abord réticent, Ian se décide à rejoindre le docteur quand il apprend que sa fiancée fait partie de l\'expédition scientifique. Il ignore qu\'une autre expédition qui n\'a pas les mêmes buts est également en route.</p>', 4);

-- --------------------------------------------------------

--
-- Table structure for table `moviehasperson`
--

DROP TABLE IF EXISTS `moviehasperson`;
CREATE TABLE IF NOT EXISTS `moviehasperson` (
  `idMovie` int(11) NOT NULL,
  `idPerson` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moviehasperson`
--

INSERT INTO `moviehasperson` (`idMovie`, `idPerson`, `role`) VALUES
(1, 1, 'director'),
(1, 2, 'actor'),
(1, 3, 'actor'),
(1, 4, 'actor'),
(1, 5, 'actor'),
(1, 6, 'actor'),
(2, 7, 'director'),
(2, 8, 'actor'),
(2, 9, 'actor'),
(2, 10, 'actor'),
(2, 11, 'actor'),
(3, 7, 'director'),
(3, 10, 'actor'),
(3, 11, 'actor'),
(3, 12, 'actor'),
(3, 13, 'actor');

-- --------------------------------------------------------

--
-- Table structure for table `moviehaspicture`
--

DROP TABLE IF EXISTS `moviehaspicture`;
CREATE TABLE IF NOT EXISTS `moviehaspicture` (
  `idMovie` int(11) NOT NULL,
  `idPicture` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`idMovie`,`idPicture`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moviehaspicture`
--

INSERT INTO `moviehaspicture` (`idMovie`, `idPicture`, `type`) VALUES
(1, 1, 'gallery'),
(1, 2, 'gallery'),
(1, 3, 'gallery'),
(1, 4, 'gallery'),
(1, 5, 'gallery'),
(1, 12, 'poster'),
(2, 13, 'poster'),
(2, 19, 'gallery'),
(2, 20, 'gallery'),
(2, 21, 'gallery'),
(2, 22, 'gallery'),
(2, 23, 'gallery'),
(3, 26, 'gallery'),
(3, 27, 'gallery'),
(3, 28, 'gallery'),
(3, 29, 'gallery'),
(3, 30, 'gallery'),
(3, 31, 'poster');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `birthDate` date NOT NULL,
  `biography` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `lastname`, `firstname`, `birthDate`, `biography`) VALUES
(1, 'Martin Smith', 'Charles', '1953-10-30', '<p>Along with his acting career, since the mid-1990s Smith has increasingly focused on his work behind the camera both as a writer and director. His first film as director was the camp horror story Trick or Treat (1986) for Dino De Laurentiis, in which Smith also appeared. In 1992, he directed and acted in Fifty/Fifty, a movie filmed in Malaysia which also starred Robert Hays and Peter Weller. He was one of the directors of the TV series Space: Above and Beyond (1995) as well as the director of the initial episode (\"Welcome to the Hellmouth\") that launched the hit TV series Buffy the Vampire Slayer (1997). He next directed the hugely successful feature film Air Bud (Disney, 1997), and two TV miniseries for Hallmark Entertainment, Roughing It, starring James Garner as Mark Twain, (2001) and Icon (2005), starring Patrick Swayze, Michael York and Patrick Bergin. He directed numerous episodes of the Canadian television series DaVinci\'s Inquest, and wrote and executive produced The Clinic, a film about a veterinary clinic for Animal Planet in 2003.</p>\r\n<p>In 2003 he wrote and directed the acclaimed Canadian feature film The Snow Walker for Lions Gate Films, based on a story by Farley Mowat (of Never Cry Wolf fame) which marked a return to the Arctic for Smith and garnered nine Genie Award nominations including Best Picture, Best Adapted Screenplay, and Best Director for Smith.</p>\r\n<p>He has lived in Vancouver, British Columbia and also in Los Angeles, California since the 1980s and continues to add to production, directing, acting and writing credits in a career that has spanned more than 40 years.</p>\r\n<p>In 2007, Smith wrote and directed the British/Canadian co-production Stone of Destiny for Mob Films, and Infinity Features, starring Charlie Cox, Robert Carlyle and Kate Mara. Stone of Destiny was the closing Gala Presentation for the 2008 Toronto International Film Festival.[7] His next film was Dolphin Tale for Alcon Entertainment. The hit film, based on a true story, stars Harry Connick Jr., Ashley Judd, Morgan Freeman, Kris Kristofferson, Nathan Gamble and Cozi Zuehlsdorff, and was released on September 23, 2011 by Warner Bros. To date, the film has grossed over $70 million at the domestic box office and over $100 million worldwide.</p>\r\n<p>He returned to write and direct the sequel, Dolphin Tale 2. He based his original script on various true-life events that have occurred at the Clearwater Marine Hospital, including the dramatic rescue of a baby dolphin named \"Hope\" that coincidentally happened during the wrap party of the first film, with many of the film\'s cast and crew watching. The entire cast returned to take part, and the movie was released by Warner Bros on September 12, 2014.</p>'),
(2, 'Connick, Jr.', 'Harry', '1967-09-11', '<p>Harry Connick Junior est né le 11 septembre 1967 à La Nouvelle-Orléans en Louisiane. Son père, Harry Connick Sr., était district attorney (procureur) à La Nouvelle-Orléans, et sa mère, Anita Connick, était juge. Ils possédaient aussi un magasin de disques, ce qui explique l\'intérêt de Harry pour la musique dès son plus jeune âge. À trois ans, il commence à jouer du piano et il se produit publiquement pour la première fois à l\'âge de six ans. À dix ans, il enregistre un disque avec un groupe de jazz professionnel. Il continue son éducation musicale au New Orleans Center For The Creative Arts, tout en se produisant dans des clubs et bars.</p>\r\n\r\n<p>Alors qu\'il n\'a que treize ans, sa mère décède d\'un cancer, après plusieurs années de lutte contre la maladie.</p>\r\n\r\n<p>À dix-huit ans, il s\'installe à New York pour étudier, tout d\'abord au Hunter College, puis à la Manhattan School of Music. Il rencontre alors George Butler, cadre chez Columbia, avec qui il signe un contrat. L\'année suivante, en 1987 et à l\'âge de dix-neuf ans, Harry Connick Jr. sort un album de standards musicaux, qui reçoit les critiques très enthousiastes des plus grands noms du jazz.</p>\r\n\r\n<p>En 1988, il sort un nouvel album, 20, sur lequel il accompagne les morceaux musicaux de sa voix, contrairement au précédent.</p>\r\n\r\n<p>Son premier véritable grand succès, il le trouve avec le réalisateur Rob Reiner, qui choisit plusieurs de ses chansons pour la bande originale de son nouveau film, Quand Harry rencontre Sally, avec Billy Crystal et Meg Ryan. L\'album devient rapidement double disque de platine. Il réalise alors une tournée mondiale.</p>'),
(3, 'Judd', 'Ashley', '1968-04-19', '<p>Elle débute les années 2010, en acceptant de jouer dans la comédie fantastique familiale des studios Disney Fée malgré lui, portée par Dwayne Johnson Puis elle joue dans la comédie Flypaper, face à la star de télévision Patrick Dempsey. Puis elle fait partie de la distribution de la production jeunesse L\'Incroyable Histoire de Winter le dauphin, avec Harry Connick Jr. et Morgan Freeman, et qui sort en 2011. Le film connait un succès critique et commercial surprise, et elle accepte donc de reprendre son rôle de Lorraine Nelson pour une suite, L\'Incroyable Histoire de Winter le dauphin 2, sortie en 2014.</p>\r\n\r\n<p>En mars 2012, elle tient le premier rôle d\'une série télévisée, Missing. Ce projet, qu\'elle produit également, lui permet de revenir à son genre de prédilection, le thriller psychologique. Mais la chaîne ABC décide de s\'arrêter aux dix premiers épisodes de la première saison.</p>\r\n\r\n<p>L\'actrice accepte donc des seconds rôles dans des grosses productions ouvertement commerciales : en 2013, elle évolue dans le film d\'action La Chute de la Maison Blanche, d\'Antoine Fuqua, où elle incarne une première dame. Puis en 2014, elle fait partie du casting de Divergente, blockbuster signé Neil Burger. Elle y joue Natalie Prior, la mère de l\'héroine jouée par la jeune star Shailene Woodley. Le succès du film l\'amènera à reprendre son rôle pour les suites Divergente 2 : L\'Insurrection et Divergente 3 : Au-delà du mur, réalisées par Robert Schwentke, et sorties en 2015 et 2016.</p>\r\n\r\n<p>Parallèlement, elle tente de revenir vers des rôles plus consistants, mais dans des projets qui passent inaperçus : la comédie musicale The Identical, de Dustin Marcellino (2014), ou encore la comédie romantique Big Stone Gap, d\'Adriana Trigiani (2015), pour laquelle elle est entourée de Patrick Wilson, Whoopy Goldberg et d\'acteurs de séries télévisées. En 2016, elle accepte un second rôle de mère de famille pour le drame indépendant Good Kids, écrit et réalisé par Chris McCoy. La même année, elle renoue enfin avec un projet acclamé par la critique avec Barry, biopic de Vikram Gandhi consacré au passage du président Barack Obama à l\'université de Columbia en 1981.</p>\r\n\r\n<p>David Lynch la choisit pour intégrer la distribution de son attendue nouvelle saison de sa série culte Twin Peaks, attendue pour début 2017 sur la chaîne Showtime. Elle accepte ensuite de rejoindre la saison 2 d\'une autre série, plus confidentielle, Berlin Station3.</p>'),
(4, 'Stowell', 'Austin', '1984-12-24', '<p>Il naît à Kensington dans le Connecticut d\'un père sidérurgiste et d\'une mère enseignante1. Il est le plus jeune garçons d\'une famille de trois enfants1. En 2003, il est diplômé de la Berlin High School. Par la suite, il suit une formation en art dramatique à l\'Université du Connecticut à Storrs2. Stowell a obtenu un baccalauréat en beaux-arts en 20073.</p>\r\n\r\n<p>Il est principalement connu pour avoir joué dans le film L\'Incroyable Histoire de Winter le dauphin.</p>'),
(5, 'Kristofferson', 'Kris', '1936-06-22', '<p>Il est le fils d\'un général de l\'US Air Force, qui, devenu pilote de ligne, fera voyager sa famille à travers les États-Unis, avant de se fixer en Californie.</p>\r\n\r\n<p>Les études de Kris se font au Pomona College où il pratique tout particulièrement le sport et l\'écriture. Il poursuit ses études au Merton College à Oxford (Angleterre) où il commence à composer des chansons et à les interpréter. Il est alors engagé sous le nom de Kris Carson.</p>\r\n\r\n<p>Kris Kristofferson va servir ensuite comme pilote dans l\'US Army, notamment en Allemagne. Dans le même temps, il continue son activité musicale avec un groupe dans divers clubs.</p>\r\n\r\n<p>En 1965, il refuse un poste d\'enseignant à West Point et part vivre à Nashville (Tennessee), la capitale de la musique country. Il y pratique de multiples emplois avant de sympathiser avec Johnny Cash et Janis Joplin.</p>\r\n\r\n<p>En 1970, il enregistre un premier album : Me and Bobby McGee, tout aussitôt récompensé.</p>\r\n\r\n<p>En 1971, Dennis Hopper engage Kris pour son film : The Last Movie. C\'est le début de sa carrière au cinéma, où il joue dans des films tels que : Pat Garrett et Billy le Kid (1973), Apportez-moi la tête d\'Alfredo Garcia (1974)… En 1976 il joue aux côtés de Barbra Streisand dans Une étoile est née (A Star is Born) ; en 1980, c’est aux côtés d’Isabelle Huppert qu’il joue dans La Porte du paradis (Heaven\'s Gate) de Michael Cimino.</p>\r\n\r\n<p>À partir de 1979, Kris Kristofferson apparaît dans des téléfilms : La Route de la liberté, La Fleur ensanglantée, Les Derniers Jours de Frank et Jesse James, La Diligence de Tombstone.</p>\r\n\r\n<p>On retrouve Kris Kristofferson en haut de l\'affiche en 1996 dans Lone Star de John Sayles. Militaire dans La fille d\'un soldat ne pleure jamais, l\'acteur participe à l\'action de Blade en 1998, à celle de Payback un an plus tard, puis part rejoindre La Planète des singes dans la version de Tim Burton en 2001. En 2002, Kris Kristofferson retrouve les vampires dans Blade 2 de Guillermo del Toro, avant de donner la réplique pour la troisième fois à Wesley Snipes pour les besoins de Blade: Trinity.</p>\r\n\r\n<p>En 2004, il entre au Country Music Hall of Fame.</p>'),
(6, 'Freeman', 'Morgan', '1937-06-01', '<p>Morgan Freeman est né dans une fratrie de quatre enfants à Memphis (Tennessee) de Mayme Edna Revere (1912-2000) et Morgan Porterfield Freeman (1915-1961), ancien combattant de la Seconde Guerre mondiale1 mort en 1961 d\'une cirrhose du foie.</p>\r\n\r\n<p>Enfant, il est confié par ses parents à sa grand-mère paternelle vivant à Charleston (Mississippi), où il passe son enfance dans le quartier noir1. C\'est à l\'âge de 10 ans qu\'il découvre le théâtre, dans le cadre d\'une pièce montée par son école. À 18 ans, il sort diplômé du lycée de Greenwood (Mississippi). Il cherche alors un emploi stable et s\'engage dans l\'US Air Force comme mécanicien, puis secrétaire sténo assermenté. En 1964, après une révélation, il prend la décision de devenir acteur et se met en recherche de rôles. Une fois ses obligations militaires accomplies, il s\'installe en Californie pour étudier la danse et l\'art dramatique au Los Angeles City College.</p>\r\n\r\n<p>Il fréquente à ses débuts de nombreuses troupes de théâtres et des festivals champêtres. Il obtient des petits rôles à la télévision dans des soap opera et se fait particulièrement remarquer dans le rôle d\'un vampire végétarien.</p>'),
(7, 'Spielberg', 'Steven', '1946-12-18', '<p>Steven Spielberg est un réalisateur, scénariste et producteur de cinéma américain, né le 18 décembre 1946 à Cincinnati (Ohio).</p>\r\n\r\n<p>Issu de la deuxième génération du Nouvel Hollywood dans les années 1970, il réalise le premier blockbuster de l\'histoire du cinéma : Les Dents de la mer. Il enchaîne les succès (E.T. l\'extra-terrestre, série Indiana Jones, Jurassic Park, Ready Player One) tout en développant ses activités de gestionnaire. Fondateur de la société de production Amblin Entertainment et cofondateur du studio DreamWorks SKG, il produit de nombreux films à succès (Poltergeist, Gremlins, Retour vers le futur, Qui veut la peau de Roger Rabbit ou encore la trilogie Men in Black et Transformers). Il a également financé et distribué des œuvres plus exigeantes ou moins grand public telles que Lettres d\'Iwo Jima de Clint Eastwood, American Beauty de Sam Mendes et Hollywood Ending de Woody Allen.</p>\r\n\r\n<p>Surnommé « The Entertainment King » (« le roi du divertissement »), Steven Spielberg est souvent cité comme le meilleur représentant de l\'industrie cinématographique hollywoodienne dont il a promu, sur le plan mondial, l\'efficacité technique, la science du grand spectacle et le pouvoir illusionniste. L\'ensemble de son œuvre présente un style à la fois personnel et accessible, et des thèmes récurrents. Il a parfois critiqué la systématisation des suites et des sagas cinématographiques dans le cinéma américain, en compagnie de son ami George Lucas. Pourtant, ils sont considérés par bon nombre de critiques comme les initiateurs de ce système, à cause de leurs nombreux succès.</p>\r\n\r\n<p>Il a créé la fondation Shoah Foundation Institute for Visual History and Education2, dont l\'objectif est de recueillir les témoignages de tous les survivants de la Shoah et de les diffuser aux plus jeunes, dans le but de participer au devoir de mémoire afin d\'éviter un nouveau génocide.</p>\r\n\r\n<p>Il est chevalier dans l\'ordre de l\'Empire britannique (KBE) depuis le 1er janvier 2001, la cérémonie ayant eu lieu le 29 janvier 2001 à l\'ambassade du Royaume-Uni à Washington3,4.</p>\r\n\r\n<p>Steven Spielberg a personnellement reçu trois Oscars : un pour le meilleur film (en 1994) et deux du meilleur réalisateur (en 1994 et 1999). Il préside par ailleurs le jury du 5e Festival international du film fantastique d\'Avoriaz en 1977, et celui du 66e Festival de Cannes, en 20135.</p>'),
(8, 'Neill', 'Sam', '1947-09-14', '<p>Sam Neill, né Nigel John Dermot Neill, le 14 septembre 1947 à Omagh dans le Comté de Tyrone, est un acteur néo-zélandais notamment connu pour avoir joué le rôle d\'Alan Grant dans le 1er et dans le 3e opus de Jurassic Park.</p>\r\n\r\n<p>Il se fait remarquer dans Ma brillante carrière en 1979, et en 1981 dans Possession, puis se voit récompensé de l\'AFI Award du meilleur acteur pour Un cri dans la nuit en 1988.</p>\r\n\r\n<p>Il obtient une reconnaissance critique et publique en 1993 pour ses rôles dans La Leçon de piano de Jane Campion et Jurassic Park de Steven Spielberg.</p>\r\n\r\n<p>Il apparait dans À la poursuite d\'Octobre rouge en 1990, L\'Homme qui murmurait à l\'oreille des chevaux en 1998 et The Hunter en 2011.</p>\r\n\r\n<p>À la télévision, il joue dans les séries Merlin en 1998, Les Tudors en 2007 et Peaky Blinders en 2013.</p>'),
(9, 'Dern', 'Laura', '1967-02-10', '<p>Laura Dern, née le 10 février 1967 à Los Angeles, est une actrice et productrice américaine.</p>\r\n\r\n<p>Elle est l\'une des actrices fétiches du cinéaste David Lynch qui la dirige dans Blue Velvet (1986), Sailor et Lula (1990), Inland Empire (2007) et la saison 3 de Twin Peaks (2017).</p>\r\n\r\n<p>Elle est aussi mondialement connue pour son rôle du Dr Ellie Sattler dans le blockbuster Jurassic Park, de Steven Spielberg, sorti en 1993.</p>\r\n\r\n<p>Depuis 2017, elle opère un retour remarqué avec des seconds rôles dans Star Wars, épisode VIII : Les Derniers Jedi, de Rian Johnson et la série dramatique Big Little Lies, avec Nicole Kidman et Reese Witherspoon.</p>'),
(10, 'Goldblum', 'Jeff', '1952-10-22', '<p>Jeffrey Goldblum, dit Jeff Goldblum, est un acteur américain, né le 22 octobre 1952 à Pittsburgh.</p>\r\n\r\n<p>Après quelques apparitions cinématographiques et télévisuelles, Jeff Goldblum est révélé par le film L\'Étoffe des héros en 1983. Plus tard, il confirme son talent dans des rôles de scientifiques excentriques vus dans La Mouche, Jurassic Park (et sa suite Le monde perdu: Jurassic Park) et enfin Independance Day, tous des grands succès commerciaux dans la deuxième partie des années 1980 et années 1990.</p>\r\n\r\n<p>De même, pendant deux saisons vers la fin des années 2000, il compte parmi les protagonistes de la série New York, section criminelle.</p>'),
(11, 'Attenborough', 'Richard', '1923-08-29', '<p>Richard Attenborough a joué dans une cinquantaine de films. Il fait ses débuts en 1942 en tenant un petit rôle dans Ceux qui servent en mer (In Which We Serve) de Noël Coward et David Lean1. Il interprète un jeune voyou, Pinkie Brown, dans Le Gang des tueurs (Brighton Rock), adaptation sortie en 1947 d\'un roman noir de Graham Greene. Pour les besoins du film, il s\'entraîne avec les joueurs du Chelsea Football Club3. En 1948, sa prestation dans The Guinea Pig (en) de Roy Boulting est louée par la critique. Son fan club compte alors 15 000 adhérents2. Au cours des années 1950, il apparaît dans des comédies, comme Ce sacré z\'héros (Private\'s Progress) de John Boulting en 1956 et Après moi le déluge (I\'m All Right Jack), du même réalisateur, en 19594.</p>\r\n\r\n<p>Dans les années 1960, Attenborough tourne à Hollywood et accroît sa notoriété en dehors du Royaume-Uni, notamment grâce à La Grande Évasion (The Great Escape), sorti en 1963. Il y tient l\'un des rôles principaux, celui du commandant Roger Bartlett. Il joue également aux côtés de James Stewart dans Le Vol du Phénix (The Flight of the Phoenix) de Robert Aldrich. En 1964, il incarne Billy Savage dans Le Rideau de brume (Seance on a Wet Afternoon) de Bryan Forbes et obtient un BAFTA award dans la catégorie meilleur acteur2. Le prix lui est également décerné pour son interprétation du sergent-major Lauderdale dans Les Canons de Batasi (Guns at Batasi) de John Guillermin5. Le Golden Globe du meilleur acteur dans un second rôle lui est attribué en 1967 et 1968 pour ses prestations dans La Canonnière du Yang-Tse (The Sand Pebbles), de Robert Wise, et L\'Extravagant Docteur Dolittle (Doctor Dolittle) de Richard Fleischer2. En 1971, il interprète le tueur en série britannique John Christie dans L\'Étrangleur de la place Rillington (10 Rillington Place) de Richard Fleischer5. En 1977, il incarne le général Outram dans Les Joueurs d\'échecs (Shatranj Ke Khilari) de Satyajit Ray6. Après avoir tourné dans The Human Factor d\'Otto Preminger en 1979, Attenborough interrompt sa carrière d\'acteur afin de se consacrer à son projet de film biographique sur Gandhi4.</p>\r\n\r\n<p>Il fait son retour à l\'écran en 1993 dans Jurassic Park, de Steven Spielberg. Il interprète John Hammond, le propriétaire du parc d’attraction. L\'année suivante, il tient le rôle de Kris Kringle dans Miracle sur la 34e rue, réalisé par Les Mayfield2,7.</p>'),
(12, 'Moore', 'Julianne', '1960-12-03', '<p>Julianne Moore est une actrice américaine d\'origine écossaise née le 3 décembre 1960 à Fayetteville (Caroline du Nord).</p>\r\n\r\n<p>Lauréate de l\'Oscar de la meilleure actrice en 2015, elle est, avec Juliette Binoche, Catherine Deneuve et Isabelle Huppert l\'une des seules actrices à avoir remporté un prix d\'interprétation dans les trois plus grands festivals de cinéma — Cannes, Venise et Berlin.</p>\r\n\r\n<p>Julianne Moore a tourné entre autres sous la direction de Louis Malle, Robert Altman, Steven Spielberg, Ridley Scott, les frères Coen, Gus Van Sant, Neil Jordan, Alfonso Cuarón, Todd Haynes et Paul Thomas Anderson.</p>\r\n\r\n<p>Avec Juliette Binoche mais également Jack Lemmon et Sean Penn chez les acteurs, elle est l\'une des quatre artistes à avoir réussi le « grand chelem », à savoir obtenir le prix d\'interprétation féminine ou masculine des trois plus grands festivals internationaux : Cannes, Venise et Berlin1.</p>\r\n\r\n<p>Julianne Moore manifeste une inclination particulière pour les grands auteurs européens. Elle a joué dans des adaptations d\'Anton Tchekov, Oscar Wilde, Samuel Beckett et Graham Greene.</p>'),
(13, 'Lee Chester', 'Vanessa', '1984-08-02', '<p>Chester made her film debut in the comedy CB4 (1993) starring Chris Rock. The following year, she appeared in a supporting role in Alfonso Cuarón\'s A Little Princess (1995).[2] In 1996, she appeared opposite Michelle Trachtenberg as Janie in the Nickelodeon film Harriet the Spy, which was a moderate box office success.</p>\r\n\r\n<p>The following year, she was cast in a lead role as Kelly in Steven Spielberg\'s The Lost World: Jurassic Park (1997),[4] playing the daughter of Ian Malcolm (Jeff Goldblum). The film was a box office hit, grossing over $600 million worldwide.</p>\r\n\r\n<p>Chester later worked mostly in television, most notably appearing in Malcolm in the Middle and The West Wing. She was nominated for a Saturn Award (The Lost World: Jurassic Park), Image Award (The Lost World: Jurassic Park), Young Artist Award (A Little Princess) and took home the Young Artist Award for Best Performance in a Feature Film – Supporting Young Actress (Harriet The Spy).[6] In early 2012 Chester began work on an unnamed film by Ty Hodges.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `personhaspicture`
--

DROP TABLE IF EXISTS `personhaspicture`;
CREATE TABLE IF NOT EXISTS `personhaspicture` (
  `idPerson` int(11) NOT NULL,
  `idPicture` int(11) NOT NULL,
  PRIMARY KEY (`idPerson`,`idPicture`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personhaspicture`
--

INSERT INTO `personhaspicture` (`idPerson`, `idPicture`) VALUES
(1, 6),
(2, 7),
(3, 8),
(4, 9),
(5, 10),
(6, 11),
(7, 14),
(8, 15),
(9, 16),
(10, 17),
(11, 18),
(12, 24),
(13, 25);

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `legend` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `path`, `legend`) VALUES
(1, 'images/Dolphin Tale/film_docteur.jpg', 'Le patient'),
(2, 'images/Dolphin Tale/film_winter.jpg', 'Winter'),
(3, 'images/Dolphin Tale/film_prothese.jpg', 'Une innovation'),
(4, 'images/Dolphin Tale/film_winter_nage.jpg', 'Une nouvelle queue'),
(5, 'images/Dolphin Tale/film_rencontre.jpg', 'Rencontre'),
(6, 'images/Dolphin Tale/CharlesMartinSmith.jpg', 'Charles Martin Smith'),
(7, 'images/Dolphin Tale/Harry_Connick_Jr.jpg', 'Harry Connick, Jr.'),
(8, 'images/Dolphin Tale/Ashley_Judd.jpg', 'Ashley Judd'),
(9, 'images/Dolphin Tale/Austin_Stowell.jpg', 'Austin Stowell'),
(10, 'images/Dolphin Tale/Kris_Kristofferson.jpg', 'Kris Kristofferson'),
(11, 'images/Dolphin Tale/Morgan_Freeman.jpg', 'Morgan Freema'),
(12, 'images/Dolphin Tale/dolphin_tale.jpg', 'Dolphin Tale'),
(13, 'images/Jurassic Park/jurassic_park.png', 'Jurassic Park'),
(14, 'images/Jurassic Park/Steven_Spielberg.jpg', 'Steven Spielberg'),
(15, 'images/Jurassic Park/Sam_Neill.jpg', 'Sam Neill'),
(16, 'images/Jurassic Park/Laura_Dern.jpg', 'Laura Dern'),
(17, 'images/Jurassic Park/Jeff_Goldblum.jpg', 'Jeff Goldblum'),
(18, 'images/Jurassic Park/Richard_Attenborough.jpg', 'Richard Attenborough'),
(19, 'images/Jurassic Park/film_arrive.jpg', 'Arrivé dans le parc'),
(20, 'images/Jurassic Park/film_eclos.jpg', 'Eclosion d\'un oeuf'),
(21, 'images/Jurassic Park/film_tice.jpg', 'Le Tricératops malade'),
(22, 'images/Jurassic Park/film_voiture.jpg', 'L\'incident'),
(23, 'images/Jurassic Park/film_enfants.jpg', 'Survie'),
(24, 'images/Jurassic Park 2/Julianne_Moore.jpg', 'Photo de Julianne Moore'),
(25, 'images/Jurassic Park 2/Vanessa_Lee_Chester.jpg', 'Photo de Vanessa Lee Chester'),
(26, 'images/Jurassic Park 2/film_victime.jpg', 'Victime de l\'ile'),
(27, 'images/Jurassic Park 2/film_rencontre.jpg', 'Premiers dangers'),
(28, 'images/Jurassic Park 2/film_chasse.jpg', 'Chasse'),
(29, 'images/Jurassic Park 2/film_survie.jpg', 'Survie difficile'),
(30, 'images/Jurassic Park 2/film_ville.jpg', 'Oops'),
(31, 'images/Jurassic Park 2/jurassic_park_2.jpg', 'Jurassic Park 2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
