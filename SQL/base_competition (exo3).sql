-- creation et utilisation de la BDD
CREATE DATABASE competition;
USE competition;

-- creation des tables
CREATE TABLE IF NOT EXISTS poste(
id_poste INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_poste VARCHAR(50) NOT NULL UNIQUE
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS joueur(
id_joueur INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_joueur VARCHAR(50) NOT NULL,
prenom_joueur VARCHAR(50) NOT NULL,
id_poste INT,
id_equipe INT
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS equipe(
id_equipe INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_equipe VARCHAR(50) NOT NULL UNIQUE,
id_club INT NOT NULL
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS club(
id_club INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_club VARCHAR(50) NOT NULL UNIQUE,
id_adresse INT NOT NULL
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS adresse(
id_adresse INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_rue VARCHAR(50) NOT NULL,
num_rue INT NOT NULL,
code_postal INT NOT NULL,
ville VARCHAR(50) NOT NULL
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS lieu(
id_lieu INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_lieu VARCHAR(50) NOT NULL,
id_adresse INT NOT NULL
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS partie(
id_partie INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
date_partie DATETIME NOT NULL,
score_equipe_1 INT NOT NULL,
score_equipe_2 INT NOT NULL,
id_equipe_1 INT NOT NULL,
id_equipe_2 INT NOT NULL,
id_competition INT NOT NULL,
id_phase INT NOT NULL
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS competition(
id_competition INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_competition VARCHAR(50) NOT NULL UNIQUE,
date_debut DATETIME NOT NULL,
date_fin DATETIME NOT NULL
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS phase_competition(
id_phase INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_phase VARCHAR(50) NOT NULL
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS localiser(
id_competition INT,
id_lieu INT,
PRIMARY KEY (id_competition, id_lieu)
)Engine=InnoDB;

-- creation des contraintes cle etrangere
ALTER TABLE joueur
ADD CONSTRAINT fk_jouer_poste
FOREIGN KEY(id_poste)
REFERENCES poste(id_poste);

ALTER TABLE joueur
ADD CONSTRAINT fk_appartenir_equipe
FOREIGN KEY(id_equipe)
REFERENCES equipe(id_equipe);

ALTER TABLE equipe
ADD CONSTRAINT fk_posseder_club
FOREIGN KEY(id_club)
REFERENCES club(id_club)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE club
ADD CONSTRAINT fk_situer_adresse
FOREIGN KEY(id_adresse)
REFERENCES adresse(id_adresse)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE lieu
ADD CONSTRAINT fk_completer_adresse
FOREIGN KEY(id_adresse)
REFERENCES adresse(id_adresse)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE partie
ADD CONSTRAINT fk_concourir_equipe
FOREIGN KEY(id_equipe_1)
REFERENCES equipe(id_equipe)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE partie
ADD CONSTRAINT fk_participer_equipe
FOREIGN KEY(id_equipe_2)
REFERENCES equipe(id_equipe)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE partie
ADD CONSTRAINT fk_derouler_competition
FOREIGN KEY(id_competition)
REFERENCES competition(id_competition)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE partie
ADD CONSTRAINT fk_detailler_phase_competition
FOREIGN KEY(id_phase)
REFERENCES phase_competition(id_phase)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE localiser
ADD CONSTRAINT fk_localiser_competition
FOREIGN KEY(id_competition)
REFERENCES competition(id_competition);

ALTER TABLE localiser
ADD CONSTRAINT fk_localiser_lieu
FOREIGN KEY(id_lieu)
REFERENCES lieu(id_lieu);

-- bonus

ALTER TABLE partie
ADD CONSTRAINT ck_score_minimum
CHECK (score_equipe_2>0);

ALTER TABLE partie
ADD CONSTRAINT ck_score_minimum_1
CHECK (score_equipe_1>0);

ALTER TABLE partie
ADD CONSTRAINT ck_minimum_lettre_nom
CHECK (size(nom_equipe) > 3); -- plutot CHECK (CHAR_LENGTH(nom_equipe) > 4)

ALTER TABLE adresse
ADD CONSTRAINT ck_format_code_postal
CHECK (size(code_postal) = 5); -- plutot CHECK (CHAR_LENGTH(code_postal) = 5)