<?php

class ViewConnexion {
    private ?string $message;

    public function __construct() { 
        $this->message = ''; 
    }

    // Getter et Setter
    public function getMessage(): ?string {
        return $this->message;
    }

    public function setMessage(?string $message): ViewConnexion {
        $this->message = $message;
        return $this;
    }

    public function render(): string {
        return "<div>
                    <h2>Connexion</h2>
                    <p>{$this->message}</p>
                    <form method='post' action='controller_connexion.php'>
                        <label for='email'>Email:</label>
                        <input type='email' id='email' name='email' required>
                        <label for='password'>Mot de passe:</label>
                        <input type='password' id='password' name='password' required>
                        <button type='submit' name='submitConnexion'>Connexion</button>
                    </form>
                </div>";
    }
}

?>
