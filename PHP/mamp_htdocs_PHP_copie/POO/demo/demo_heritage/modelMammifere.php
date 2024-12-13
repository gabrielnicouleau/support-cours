<?php
//Héritage de Animal : on le fait grâce à la commande extends
//-> Ma Class Mammifere va avoir tout ce que possède la class Animal
//AVANTAGE DE L'HERITAGE :
//1- Rassembler le code commun à plusieurs class
//LIMITATION :
//1- Une classe ne peut hériter que d'une classe à la fois
//NOTA BENE : un objet construit à partir d'une classe possède plusieurs typage :
//- Object
//- Le nom de a Class qui l'a construit
//- Le noms des Class dont il hérite
class Mammifere extends Animal{
    //ATTRIBUT
    private ?int $nbrMammelle;
    private ?int $nbrNez;

    //CONSTRUCTEUR
    public function __construct(?int $nbrMammelle, ?int $nbrNez, ?string $couleur, ?int $nbrPatte){
        $this->nbrMammelle = $nbrMammelle;
        $this->nbrNez = $nbrNez;
        $this->setCouleur($couleur);
        $this->setNbrPatte($nbrPatte);
    }

    //GETTER ET SETTER
    public function getNbrMammelle(): ?int { return $this->nbrMammelle; }
    public function setNbrMammelle(?int $nbrMammelle): Mammifere { $this->nbrMammelle = $nbrMammelle; return $this; }

    public function getNbrNez(): ?int { return $this->nbrNez; }
    public function setNbrNez(?int $nbrNez): Mammifere { $this->nbrNez = $nbrNez; return $this; }

    //METHODS
    // public static function buildMammifere(?string $couleur, ?int $nbrPatte, ?int $nbrMammelle, ?int $nbrNez){
    //     $mammifere = new Mammifere($couleur,$nbrPatte);
    //     $mammifere->setNbrMammelle($nbrMammelle)->setNbrNez($nbrNez);
    //     return $mammifere;
    // }
    public function allaiter():string{
        return "Je donne du lait à mon bébé !";
    }

    //Exemple de polymorphisme
    // Je redéfinis la méthode seNourrir() hérité de la class parent Animal
    public function seNourrir():string{
        return "Je dévorre une PROIE !";
    }
}
?>