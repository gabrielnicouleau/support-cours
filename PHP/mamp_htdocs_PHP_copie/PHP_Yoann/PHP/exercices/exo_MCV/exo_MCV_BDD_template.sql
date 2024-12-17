CREATE DATABASE task CHARSET utf8mb4;
USE task;

CREATE TABLE categories(
id_categories INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
name_categorie VARCHAR(50) NOT NULL UNIQUE
)Engine=InnoDB;

CREATE TABLE tasks(
id_tasks INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
name_task VARCHAR(50) NOT NULL,
content_task TEXT NOT NULL,
date_task DATE NOT NULL,
id_categories INT,
id_users INT
)Engine=InnoDB;

CREATE TABLE users(
id_users INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
name_user VARCHAR(50) NOT NULL,
firstname_user VARCHAR(50) NOT NULL,
email_user VARCHAR(50) NOT NULL UNIQUE,
mdp_user VARCHAR(100) NOT NULL
)Engine=InnoDB;

ALTER TABLE tasks
ADD CONSTRAINT fk_effectuer_users
FOREIGn KEY (id_users)
REFERENCES users(id_users);

ALTER TABLE tasks
ADD CONSTRAINT fk_appartenir_categories
FOREIGn KEY (id_categories)
REFERENCES categories(id_categories);