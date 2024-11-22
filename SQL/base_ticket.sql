-- creation et utilisation de la BDD
create database ticket charset utf8mb4;
use ticket;

-- creation des tables
create table produit(
id_produit int primary key auto_increment not null,
nom_produit varchar(50) not null,
description varchar(255) not null,
tarif decimal(3.2) not null,
id_categorie int not null
)Engine=InnoDB;

create table categorie(
id_categorie int primary key auto_increment not null,
nom_categorie varchar(50) not null unique
)Engine=InnoDB;

create table ticket(
id_ticket int primary key auto_increment not null,
date_creation datetime not null,
id_vendeur int not null
)Engine=InnoDB;

create table vendeur(
id_vendeur int primary key auto_increment not null,
nom_vendeur varchar(50) not null,
prenom varchar(50) not null
)Engine=InnoDB;

create table produit_ticket(
id_produit int,
id_ticket int,
primary key (id_produit, id_ticket)
)Engine=InnoDB;

-- creation des contraintes de cle étrangere
alter table produit
add constraint fk_lier_categorie
foreign key (id_categorie)
references categorie(id_categorie);

alter table ticket
add constraint fk_vendre_vendeur
foreign key (id_vendeur)
references vendeur(id_vendeur);

alter table produit_ticket
add constraint fk_ajouter_produit
foreign key (id_produit)
references produit(id_produit);

alter table produit_ticket
add constraint fk_ajouter_ticket
foreign key (id_ticket)
references ticket(id_ticket);

-- Exemple suppression en cascade colonne qui recoit la foreign key en NOT NULL (si 1 mini)
CREATE TABLE IF NOT EXISTS exemple(
id_exemple INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_exemple VARCHAR(50) NOT NULL UNIQUE,
id_categorie INT NULL
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS categorie(
id_categorie INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nom_categorie VARCHAR(50) NOT NULL UNIQUE
)Engine=InnoDB;

-- Contrainte avec suppression et mise à jour en cascade
ALTER TABLE exemple
ADD CONSTRAINT fk_ajouter_categorie
FOREIGN KEY(id_categorie)
REFERENCES categorie(id_categorie)
ON DELETE CASCADE ON UPDATE CASCADE;