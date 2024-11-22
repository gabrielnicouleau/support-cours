-- creation de la base de donnes
create database exemple charset utf8mb4;
-- utilisation de la base
use exemple;
-- creation des tables
create table ceinture(
id_ceinture int primary key auto_increment not null,
couleur varchar(50) not null unique
)Engine=InnoDB;

create table lieu(
id_lieu int primary key auto_increment not null,
nom_lieu varchar(50) not null,
num_rue int not null,
code_postal int not null,
ville varchar(50) not null
)Engine=InnoDB;

create table adherent(
id_adherent int primary key auto_increment not null,
nom_adherent varchar(50) not null,
prenom varchar(50) not null,
age int not null,
sexe tinyint(1) default 0,
id_ceinture int
)Engine=InnoDB;

create table competition(
id_competition int primary key auto_increment not null,
nom_competition varchar(50) not null,
date_debut date not null,
date_fin date not null,
id_lieu int
)Engine=InnoDB;

-- table d'association
create table adherent_competition(
id_adherent int,
id_competition int,
primary key(id_adherent, id_competition)
)Engine=InnoDB;

-- ajouter une contrainte pour la clé étrangère
-- modifier une table
alter table adherent
-- ajouter la contrainte
add constraint fk_gagner_ceinture
-- ajouter une clé étrangère
foreign key (id_ceinture)
-- où est la référence
references ceinture(id_ceinture);

alter table competition
add constraint fk_localiser_lieu
foreign key (id_lieu)
references lieu(id_lieu);

alter table adherent_competition
add constraint fk_participer_adherent
foreign key (id_adherent)
references adherent(id_adherent);

alter table adherent_competition
add constraint fk_participer_competition
foreign key (id_competition)
references competition(id_competition);

-- modifier uen structure déjà existante

-- ajouter une colonne
alter table lieu
add column pays varchar(50) not null unique;

-- supprimer une colonne
alter table lieu
drop column pays;

-- modifier une colonne
alter table lieu
modify column pays varchar(100) unique;

-- changer le nom d'une colonne
alter table lieu
change pays contre varchar(50) not null unique;

-- ajouter une contrainte check (ici age minimum)
alter table adherent
-- ajoute la contrainte
add constraint ck_age_minimum
-- verifie que c'est au dessus de 4
check(age>4);
