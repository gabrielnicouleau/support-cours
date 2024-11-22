-- creation et utilisation de la BDD
CREATE DATABASE ticket_caisse;
USE ticket_caisse;

-- creation des tables
CREATE TABLE IF NOT EXISTS categorie(
id_categorie INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_categorie VARCHAR(50) NOT NULL UNIQUE
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS vendeur(
id_vendeur INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_vendeur VARCHAR(50) NOT NULL,
prenom_vendeur VARCHAR(50) NOT NULL
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS produit(
id_produit INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_produit VARCHAR(50) NOT NULL,
description VARCHAR(255) NOT NULL,
tarif DECIMAL(5,2) NOT NULL,
id_categorie INT NOT NULL
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS ticket(
id_ticket INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
date_creation DATETIME NOT NULL,
id_vendeur INT NOT NULL
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS produit_ticket(
id_ticket INT NOT NULL,
id_produit INT NOT NULL,
PRIMARY KEY (id_ticket,id_produit),
quantite INT NOT NULL
)Engine=InnoDB;

-- creation des contraintes cle etrangeres
ALTER TABLE produit
ADD CONSTRAINT fk_lier_categorie
FOREIGN KEY (id_categorie)
REFERENCES categorie(id_categorie)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ticket
ADD CONSTRAINT fk_vendre_vendeur
FOREIGN KEY (id_vendeur)
REFERENCES vendeur(id_vendeur)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE produit_ticket
ADD CONSTRAINT fk_ajouter_ticket
FOREIGN KEY (id_ticket)
REFERENCES ticket(id_ticket),
ADD CONSTRAINT fk_ajouter_produit
FOREIGN KEY (id_produit)
REFERENCES produit(id_produit)
ON DELETE CASCADE ON UPDATE CASCADE;



