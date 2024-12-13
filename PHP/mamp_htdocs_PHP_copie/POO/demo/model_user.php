<?php
//Je définie ma classe ModelUser
class ModelUser {
    //ATTRIBUT que l'on va typer
    //le ? devant le type signifie que cet attribut est nullable. C'est à dire qu'au moment de créer l'objet, je n'ai pas obligation à donner une valeur à cet attribut
    private ?int $id;
    private ?string $name;
    private ?string $firstname;
    private ?string $email;
    private ?string $password;
    private ?PDO $bdd;

    //CONSTRUCTEUR
    //Petit TIPS du Formateur : Je ne mets dans le constructeur que les attributs que je suis sûr de remplir à chaque fois que je crée un objet. Pour les autres attributs, je les remplirai grâce aux Setters
    //Typiquement pour ce ModelUser, je garderai un constrcuteur vide
    public function __construct(){
        $this->bdd = new PDO('mysql:host=localhost;dbname=tasks','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    //GETTER ET SETTER
    public function getEmail():?string{
        return $this->email;
    }

    public function getBdd():?PDO{
        return $this->bdd;
    }

    public function setName(string $newName):?ModelUser{
        $this->name = $newName;
        return $this;
    }

    public function setFirstname(string $newFirstname):?ModelUser{
        $this->firstname = $newFirstname;
        return $this;
    }

    public function setEmail(string $newEmail):?ModelUser{
        $this->email = $newEmail;
        return $this;
    }

    public function setPassword(string $newPassword):?ModelUser{
        $this->password = $newPassword;
        return $this;
    }

    //METHODS
    //YD : l'avantage des class, elles permettent de mettre directement en relation des méthodes avec des données. Cela permet de ne plus avoir besoin de passer en paramètre les données nécessaires pour l'utilisation des fonctions
    //(Comparez ces méthodes ci-dessous avec leur version en procédural faite avant ce cours)

    //YD : Méthode récupérant tous les utilisateurs en BDD
    public function readUsers():array | string {
        //1er Etape : se connecter à la bdd
        //-> c'est fait au moment de la création de mon objet ModelUser (voir le constructeur)

        //2eme Etape : préparer la requête au sein d'un try...catch()
        try{
            //On récupère l'objet de connexion à la BDD grâce au getter getBdd(), car l'objet de connexion est stocké dans l'attribut bdd de l'objet utilisé
            $req = $this->getBdd()->prepare("SELECT id_user, name_user, firstname_user, email_user, mdp_user FROM users");

            //3eme Etape : Exécution de la requête
            $req->execute();

            //4eme Etape : Récupération des données depuis la BDD
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            //5eme Etape : retourne mes $data
            return $data;

        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }

    //YD : Méthode récupérant un utilisateur en BDD via son mail
    public function readUserByMail():array | string {
        //1er Etape : se connecter à la bdd
        //-> c'est fait au moment de la création de mon objet ModelUser (voir le constructeur)

        //2eme Etape : préparer la requête au sein d'un try...catch()
        try{
            //YD : On récupère l'objet de connexion à la BDD grâce au getter getBdd(), car l'objet de connexion est stocké dans l'attribut bdd de l'objet utilisé
            $req = $this->getBdd()->prepare("SELECT id_user, name_user, firstname_user, email_user, mdp_user FROM users WHERE email_user = ?");

            //3eme Etape : Binding de Param
            //YD : on récupère l'email stocké dans l'objet grâce au Getter getEmail()
            $email = $this->getEmail();
            $req->bindParam(1,$email,PDO::PARAM_STR);

            //4eme Etape : Exécution de la requête
            $req->execute();

            //5eme Etape : Récupération des données depuis la BDD
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            //6eme Etape : retourne mes $data
            return $data;

        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }
}

?>