-- Création de la base
CREATE DATABASE IF NOT EXISTS absence CHARSET utf8mb4;
USE absence;

-- Création des tables
CREATE TABLE IF NOT EXISTS motif_absence(
id_motif_absence INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
motif_absence VARCHAR(50) NOT NULL UNIQUE
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS `role`(
id_role INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_role VARCHAR(50) NOT NULL UNIQUE
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS poste(
id_poste INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_poste VARCHAR(50) NOT NULL UNIQUE
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS utilisateur(
id_utilisateur INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_utilisateur VARCHAR(50) NOT NULL,
prenom_utilisateur VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL UNIQUE,
mdp VARCHAR(100) NOT NULL,
id_role INT
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS employe(
id_employe INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_employe VARCHAR(50) NOT NULL,
prenom_employe VARCHAR(50) NOT NULL,
age INT NOT NULL,
telephone INT NOT NULL,
nom_rue VARCHAR(50) NOT NULL,
num_rue INT NOT NULL,
code_postal INT NOT NULL,
ville VARCHAR(50) NOT NULL,
id_poste INT
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS absence(
id_absence INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
date_debut DATETIME NOT NULL,
date_fin DATETIME NOT NULL,
id_employe INT,
id_motif_absence INT
)Engine=InnoDB;

-- Ajout des contraintes
ALTER TABLE utilisateur
ADD CONSTRAINT fk_posseder_role
FOREIGN KEY(id_role)
REFERENCES `role`(id_role);

ALTER TABLE employe
ADD CONSTRAINT fk_travailler_poste
FOREIGN KEY(id_poste)
REFERENCES poste(id_poste);

ALTER TABLE absence
ADD CONSTRAINT fk_declarer_employe
FOREIGN KEY(id_employe)
REFERENCES employe(id_employe);

ALTER TABLE absence
ADD CONSTRAINT fk_rattacher_motif_absence
FOREIGN KEY(id_motif_absence)
REFERENCES motif_absence(id_motif_absence);

-- Bonus
-- Ajouter une colonne intitule dans la table absence de type varchar 240 NOT NULL,
ALTER TABLE absence
ADD COLUMN intitule VARCHAR(240) NOT NULL;

-- Ajouter une colonne accepte dans la table absence de type TINYINT(1) DEFAULT 1,
ALTER TABLE absence
ADD COLUMN accepte TINYINT(1) DEFAULT 1;

-- Changer le format de la colonne date_debut dans la table absence en DATE NOT NULL,
ALTER TABLE absence
MODIFY COLUMN date_debut DATE NOT NULL;

-- Supprimer la colonne intitule dans la table absence.
ALTER TABLE absence
DROP COLUMN intitule;

 