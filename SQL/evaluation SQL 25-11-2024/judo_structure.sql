-- creation et utilisation de la BDD
CREATE DATABASE judoka CHARSET utf8mb4;
USE judoka;

-- creation des tables
CREATE TABLE  IF NOT EXISTS competition(
id_cpt INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_cpt VARCHAR(50) NOT NULL,
date_debut DATE NOT NULL,
date_fin DATE NOT NULL
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS niveau(
id_niveau INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
couleur_ceinture VARCHAR(50) NOT NULL UNIQUE
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS judoka(
id_judoka INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_judoka VARCHAR(50) NOT NULL,
prenom_judoka VARCHAR(50) NOT NULL,
age INT NOT NULL,
sexe VARCHAR(5) NOT NULL,
id_niveau INT NOT NULL
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS judoka_competition(
id_judoka INT,
id_cpt INT,
PRIMARY KEY (id_judoka, id_cpt)
)Engine=InnoDB;

-- creation des contraintes de clé étrangère
ALTER TABLE judoka
ADD CONSTRAINT fk_detenir_niveau
FOREIGN KEY (id_niveau)
REFERENCES niveau(id_niveau)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE judoka_competition
ADD CONSTRAINT fk_participer_judoka
FOREIGN KEY (id_judoka)
REFERENCES judoka(id_judoka);

ALTER TABLE judoka_competition
ADD CONSTRAINT fk_concourir_competition
FOREIGN KEY (id_cpt)
REFERENCES competition(id_cpt);