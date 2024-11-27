-- HAVING : sert de condition (comme WHERE) pour les fonctions d'agrégation
-- Ici, on récupère les ceintures dont l'âge moyen est supérieur à 16 ans
SELECT couleur_ceinture, AVG(age) FROM niveau
	INNER JOIN judoka ON niveau.id_niveau = judoka.id_niveau
    GROUP BY couleur_ceinture
    HAVING AVG(age) > 16;

-- Ici je récupère les compétitions dont le nombre de participant est inférieur ou égal à 3
SELECT nom_cpt, COUNT(id_judoka) nombre_judoka FROM competition
	INNER JOIN judoka_competition jc ON competition.id_cpt = jc.id_cpt
    GROUP BY nom_cpt
    HAVING nombre_judoka <= 3;