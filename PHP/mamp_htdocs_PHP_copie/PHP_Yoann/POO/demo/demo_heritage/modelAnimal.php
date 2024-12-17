<?php
class Animal{
    //ATTRIBUTS
    private ?string $couleur;
    private ?int $nbrPatte;

    //CONSTRUCTEUR
    public function __construct(?string $couleur, ?int $nbrPatte){
        $this->couleur = $couleur;
        $this->nbrPatte = $nbrPatte;
    }

    //GETTER ET SETTER
    public function getCouleur(): ?string { return $this->couleur; }
    public function setCouleur(?string $couleur): Animal { $this->couleur = $couleur; return $this; }

    public function getNbrPatte(): ?int { return $this->nbrPatte; }
    public function setNbrPatte(?int $nbrPatte): Animal { $this->nbrPatte = $nbrPatte; return $this; }

    //METHODS
    public function seNourrir():string{
        return "Je me nourris !";
    }
    public function seDeplacer():string{
        return "Je me déplace !";
    }
    public function seReproduire():string{
        return "Je me multiplie !";
    }
}
?>