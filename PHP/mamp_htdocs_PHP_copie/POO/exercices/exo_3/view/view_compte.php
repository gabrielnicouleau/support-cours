<?php

class ViewCompte {
    private ?string $prenom;
    private ?string $nom;
    private ?string $email;

    // Constructeur pour initialiser les propriétés
    public function __construct() {
        $this->prenom = null;
        $this->nom = null;
        $this->email = null;
    }

    // Getter et Setter
    public function getPrenom(): ?string {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): ViewCompte {
        $this->prenom = $prenom;
        return $this;
    }

    public function getNom(): ?string {
        return $this->nom;
    }

    public function setNom(?string $nom): ViewCompte {
        $this->nom = $nom;
        return $this;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function setEmail(?string $email): ViewCompte {
        $this->email = $email;
        return $this;
    }

    public function render(): string {
        return "<div>
                    <h2>Compte Utilisateur</h2>
                    <p>Prénom: {$this->prenom}</p>
                    <p>Nom: {$this->nom}</p>
                    <p>Email: {$this->email}</p>
                </div>";
    }
}
?>
