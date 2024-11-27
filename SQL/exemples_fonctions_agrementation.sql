use judoka;

-- selectionner l'age moyen des judoka avec AVG
SELECT AVG(age) age_moyen FROM judoka; -- pas obligé de préciser AS pour une fonction d'agrémentation (on cré la colonne dans laquelle elle va s'afficher)
-- selectionner le nombre de judoka existant avec COUNT
SELECT COUNT(id_judoka) nombre_judoka FROM judoka; -- on est pas obligé de préciser un nom à la colonne de la fonction
-- selectionner la date la plus récente de compétition avec MAX
SELECT MAX(date_debut) FROM competition;
-- selectionner la date la plus ancienne de compétition avec MIN
SELECT MIN(date_debut) FROM competition;
-- afficher l'age cumulé des judoka avec SUM
SELECT SUM(age) somme_age FROM judoka;
-- utilisation de GROUP BY pour grouper la fonction d'agrémentation si il y a plusieurs valeurs à afficher
-- ici valeur moyenne de l'age des judoka de ceinture marron et de ceinture bleu
SELECT couleur_ceinture, AVG(age) FROM niveau
INNER JOIN judoka ON niveau.id_niveau = judoka.id_niveau
WHERE couleur_ceinture = "marron" OR couleur_ceinture = "bleu"
GROUP BY couleur_ceinture;