<?php
class ViewAccueil{
    //YD:ATTRIBUT
    private ?string $message;
    private ?string $listUsers;

    //YD:CONSTRUCTEUR
    public function __construct(){
        $this->message = "";
        $this->listUsers = "";
    }

    //FORMATEUR:GETTER ET SETTER
    public function getMessage(): ?string { return $this->message; }
    public function setMessage(?string $message): ViewAccueil { $this->message = $message; return $this; }

    public function getListUsers(): ?string { return $this->listUsers; }
    public function setListUsers(?string $listUsers): ViewAccueil { $this->listUsers = $listUsers; return $this; }

    //YD:METHODS
    public function render():string{
        return "
                <main>
                    <section>
                        <h1>Nouvel Utilisateur</h1>
                        <form action='' method='post'>
                            <input type='text' name='name' placeholder='Votre Nom'>
                            <input type='text' name='firstname' placeholder='Votre Prénom'>
                            <input type='text' name='email' placeholder='Votre Email'>
                            <input type='text' name='password' placeholder='Votre Mot de Passe'>
                            <input type='text' name='passwordVerify' placeholder='Retappez votre Mot de Passe'>
                            <input type='submit' name='submitInscription' value=\"S'Inscrire\">
                        </form>
                        <p>{$this->getMessage()}</p>
                    </section>

                    <section>
                        <h1>Liste des Utilisateurs</h1>
                        <ul>
                            {$this->getListUsers()}
                        </ul>
                    </section>
                </main>
        ";
    }

    public function cardUser(?array $user):string{
        return "<li>{$user['firstname_user']} {$user['name_user']} : {$user['email_user']}</li>";
    }
}

?>