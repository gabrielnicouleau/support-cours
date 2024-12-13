<?php 
class ViewAccueil { 
    private ?string $message; 
    private ?string $listUsers; 

    public function __construct(){ 
        $this->message = ""; 
        $this->listUsers = ""; 
    } 
    // Getter et Setter 
    public function getMessage(): ?string{ 
        return $this->message; 
    } 
    public function setMessage(?string $message): ViewAccueil{ 
        $this->message = $message; 
    } 
    public function getListUsers(): ?string{ 
        return $this->listUsers; 
    } 
    public function setListUsers(?string $listUsers): ViewAccueil{
        $this->listUsers = $listUsers; 
    } 
    
    // Méthode render 
    public function render(): ?string{ 
        return "<main>
            <section> 
                <form action='' method='post'> 
                <!-- formulaire d'inscription en BDD--> 
                    <input type='text' name='name' placeholder='name' required><br> 
                    <input type='text' name='firstName' placeholder='firstName' required><br> 
                    <input type='text' name='email' placeholder='email' required><br> 
                    <input type='password' name='password' placeholder='password' required><br> 
                    <input type='password' name='passwordValid' placeholder='repeat your password' required><br> 
                    <input type='submit' name='submitInscription' value=\"S'Inscrire\"><br> 
                </form> 
                <p>{$this->getmessage()}</p><br>  
            </section> 
            <section> 
                <h2>Liste d'utilisateurs:</h2> 
                <ul> 
                    {$this->getListUsers()}
                </ul>
            <section>
        </main>";
    }

    // Méthode cardUser 
    public function cardUser(?array $element): string{ 
        return "<li>{$element['name_user']} {$element['firstname_user']} {$element['email_user']}</li>"; 
    } 
};
