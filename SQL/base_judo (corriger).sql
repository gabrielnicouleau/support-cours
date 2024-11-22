-- creation de la base de donnes
CREATE DATABASE IF NOT EXISTS exemple CHARSET utf8mb4;

-- utilisation de la base
USE exemple;

-- creation des tables
CREATE TABLE IF NOT EXISTS ceinture(
id_ceinture INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
couleur VARCHAR(50) NOT NULL UNIQUE
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS lieu(
id_lieu INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_lieu VARCHAR(50) NOT NULL,
nom_rue VARCHAR(50) NOT NULL,
num_rue INT NOT NULL,
code_postal INT NOT NULL,
ville VARCHAR(50) NOT NULL
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS adherent(
id_adherent INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_adherent VARCHAR(50) NOT NULL,
prenom VARCHAR(50) NOT NULL,
age INT NOT NULL,
sexe TINYINT(1) DEFAULT 0,
id_ceinture INT
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS competition(
id_competition INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_competition VARCHAR(50) NOT NULL,
date_debut DATE NOT NULL,
date_fin DATE NOT NULL,
id_lieu INT
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS adherent_competition(
id_adherent INT,
id_competition INT,
PRIMARY KEY(id_adherent, id_competition)
)Engine=InnoDB;

-- ajout des contraintes Foreign KEY
ALTER TABLE adherent
-- ajout de la containte
ADD CONSTRAINT fk_gagner_ceinture
-- ajout d'une foreign key (clé étrangére)
FOREIGN KEY(id_ceinture)
-- ou est la référence
REFERENCES ceinture(id_ceinture);

ALTER TABLE competition
ADD CONSTRAINT fk_localiser_lieu
FOREIGN KEY(id_lieu)
REFERENCES lieu(id_lieu); 

ALTER TABLE adherent_competition
ADD CONSTRAINT fk_participer_adherent
FOREIGN KEY(id_adherent)
REFERENCES adherent(id_adherent);

ALTER TABLE adherent_competition
ADD CONSTRAINT fk_participer_competition
FOREIGN KEY(id_competition)
REFERENCES competition(id_competition);
