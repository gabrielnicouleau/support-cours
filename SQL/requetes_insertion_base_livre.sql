-- enregistrements de livres
INSERT INTO livre(titre,`resume`,date_sortie)
VALUES ('Le mystère de la forêt','Un groupe d\'amis découvre un secret ancien caché dans une forêt enchantée.','2023-01-01'),
('Les secrets de l\'océan','Une jeune biologiste marine explore les profondeurs de l\'océan et découvre une civilisation perdue.','2023-02-01'),
('L\'énigme du pharaon','Un archéologue tente de résoudre les mystères d\'une ancienne pyramide égyptienne.','2023-03-01'),
('La quête du chevalier','Un chevalier part en quête pour sauver son royaume d\'une menace iminente.','2023-04-01'),
('Le voyage interstellaire','Un équipage spatial part à la découverte de nouvelles planètes et formes de vie.','2023-05-01'),
('Les chroniques du temps','Un scientifique invente une machine à voyager dans le temps et explore différentes époques.','2023-06-01'),
('La cité perdue','Une équipe d\'explorateurs découvre une cité ancienne cachée dans la jungle.','2023-07-01'),
('Le trésor des pirates','Un jeune garçon trouve une carte au trésor et part à l\'aventure pour le trouver.','2023-08-01'),
('L\'île mystérieuse','Un groupe de naufragés découvre une île pleine de mystères et de dangers.','2023-09-01'),
('Les gardiens de la galaxie','Une équipe de super-héros protège la galaxie contre des menaces interstellaires.','2023-10-01');

-- enregistrements de genres
INSERT INTO genre(libele)
VALUES ('fantastique'),('science-fiction'),('polar'),('drame'),('roman');

-- associer chaque enregistrement de livre à 2 genres différents
INSERT INTO livre_genre(id_livre,id_genre)
VALUES (1,1),(1,5),(2,2),(2,5),(3,3),(3,5),(4,5),(4,4),(5,2),(5,5),(6,2),(6,5),(7,5),(7,2),(8,1),(8,5),(9,5),(9,1),(10,2),(10,5);

-- bonus
-- modifier la colonne titre (table livre), la passer en unique
ALTER TABLE livre
MODIFY COLUMN titre VARCHAR(50) NOT NULL UNIQUE;

-- tester d'ajouter des livres qui possèdent le même titre
INSERT INTO livre(titre,`resume`,date_sortie)
VALUES ('Le mystère de la forêt','Un','2023-01-01'),
('Les secrets de l\'océan','Une','2023-02-01'),
('L\'énigme du pharaon','Un','2023-03-01'),
('La quête du chevalier','Un','2023-04-01');

-- Modifier la colonne libele (table genre), la passer en unique
ALTER TABLE genre
MODIFY COLUMN libele VARCHAR(50) NOT NULL UNIQUE;

-- Ajouter une table auteur qui va contenir: id, nom, prénom
CREATE TABLE IF NOT EXISTS auteur(
id_auteur INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom VARCHAR(50) NOT NULL,
prenom VARCHAR(50) NOT NULL
)ENGINE=InnoDB;

-- Ajouter une colonne id_auteur (table livre) et sa contrainte foreign key
ALTER TABLE livre
ADD COLUMN id_auteur INT, -- ne pas placé en NOT NULL sinon on ne peux pas l'executer (modifier plus tard si besoin)
ADD CONSTRAINT fk_rediger_auteur
FOREIGN KEY (id_auteur)
REFERENCES auteur(id_auteur);

-- Créer 5 enregistrements dans la table auteur
INSERT INTO auteur(nom,prenom)
VALUES ('Père','Castor'),('Yannick','Noah'),('La mère','Michel'),('Mylène','Farmer'),('Bali','Balo');

-- Créer 5 enregistrements dans la table livre qui inclus une référence à l'auteur (valeur de la clé primaire id_auteur)

INSERT INTO livre(titre,`resume`,date_sortie,id_auteur)
VALUES ('De mon temps c\'etait pas si mal','Histoire d\'un castor aidant les allemands à se débarrasser des vilaines fouines.','2000-02-02',1),
('Du tennis à la chanson','Résumé de l\'oeuvre de ma vie, les doigts de pieds en éventail.','2020-10-11',2),
('Père lustrucru, je sais que c\'est toi!','Après des mois d\'enquète, j\'ai enfin réussi à trouvé qui était responsable de la tragique disparition de mon chat','2021-09-24',3),
('Désenchanté','Tout est chaos à coté et je vais vous l\'expliquer.','2024-11-21',4),
('Un jour, sur mon bateau','histoire tragique d\'un homme qui perd la partier la plus précieuse de son corps lors d\'une sortie en mer','2024-10-21',5);
