USE judoka;

-- utilisation de DISTINCT pour afficher tous les judokas qui participent à une compétition, sans afficher les récurrences dans la BDD
SELECT DISTINCT nom_judoka, prenom_judoka FROM judoka As j
INNER JOIN judoka_competition AS jc ON j.id_judoka = jc_id_judoka;

-- utilisation de ORDER BY (classer la liste des réponses)pour trier les judoka par ordre alphabetique (sur le nom)
SELECT id_judoka, nom_judoka, prenom_judoka FROM judoka ORDER BY nom_judoka ASC;
-- ON peux l'appliquer sur plusieur (en descroissant poue le nom, croissant pour l'age)
SELECT id_judoka, nom_judoka, prenom_judoka, age FROM judoka ORDER BY age, nom_judoka DESC;
-- ON peux meme en mettre un troisième (ici decroissant également)
SELECT id_judoka, nom_judoka, prenom_judoka, age FROM judoka ORDER BY age, nom_judoka DESC, prenom_judoka DESC;

-- LIMIT sert à limiter le nombre de réponse obtenu
SELECT id_judoka, nom_judoka, prenom_judoka, age FROM judoka ORDER BY age LIMIT 5;
-- Avantage = gain de performances car une fois le nombre de réponse trouvé, le SGBDR s'arrête là et ne continue pas à chercher dans le reste des tables

