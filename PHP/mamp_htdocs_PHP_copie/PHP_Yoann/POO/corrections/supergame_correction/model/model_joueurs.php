<?php
//MODEL POUR LA TABLE JOUEURS
class ModelJoueurs{
    //ATTRIBUTS
    private ?int $id;
    private ?string $pseudo;
    private ?string $email;
    private ?int $score;
    private ?PDO $bdd;

    //CONSTRUCTEUR
    public function __construct(){
        $this->bdd = connect();
    }
    
    //GETTER ET SETTER
    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): ModelJoueurs { $this->id = $id; return $this; }

    public function getPseudo(): ?string { return $this->pseudo; }
    public function setPseudo(?string $pseudo): ModelJoueurs { $this->pseudo = $pseudo; return $this; }

    public function getEmail(): ?string { return $this->email; }
    public function setEmail(?string $email): ModelJoueurs { $this->email = $email; return $this; }

    public function getScore(): ?int { return $this->score; }
    public function setScore(?int $score): ModelJoueurs { $this->score = $score; return $this; }

    public function getBdd(): ?PDO { return $this->bdd; }
    public function setBdd(?PDO $bdd): ModelJoueurs { $this->bdd = $bdd; return $this; }

    //METHODS
    public function addJoueur():string{
        //try...catch
        try{
            //Preparer la requête
            $req=$this->getBdd()->prepare('INSERT INTO joueurs (pseudo, email, score) VALUES (?,?,?)');

            //Binding de param
            $pseudo = $this->getPseudo();
            $email = $this->getEmail();
            $score = $this->getScore();

            $req->bindParam(1,$pseudo,PDO::PARAM_STR);
            $req->bindParam(2,$email,PDO::PARAM_STR);
            $req->bindParam(3,$score,PDO::PARAM_INT);

            //Executer la requête
            $req->execute();

            //Renvoie un message de confirmation
            return "Joueurs bien enregistré !";

        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }

    public function getJoueurs():array | string{
        //try...catch
        try{
            //Preparer la requête
            $req=$this->getBdd()->prepare('SELECT id, pseudo, email, score FROM joueurs');

            //Executer la requête
            $req->execute();

            //Récupération de la réponse
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            //Renvoie des joueurs
            return $data;

        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }

    public function getJoueurByPseudo():array | string{
        //try...catch
        try{
            //Preparer la requête
            $req=$this->getBdd()->prepare('SELECT id, pseudo, email, score FROM joueurs WHERE pseudo = ?');

            //Binding de param
            $pseudo = $this->getPseudo();
            $req->bindParam(1,$pseudo,PDO::PARAM_STR);

            //Executer la requête
            $req->execute();

            //Récupération de la réponse
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            //Renvoie des joueurs
            return $data;

        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }
}
?>