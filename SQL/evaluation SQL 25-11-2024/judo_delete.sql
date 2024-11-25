use judoka;

INSERT INTO judoka (nom_judoka,prenom_judoka,age,sexe,id_niveau)
VALUES ('Lelouche','Gilles',53,'H',1),('Damien','François',42,'H',1);

DELETE FROM judoka WHERE id_judoka BETWEEN 11 AND 12;