<?php

include './view/header.php';
include './view/footer.php';

class Controller {
    
    private ViewHeader $header;
    private ViewFooter $footer;

    public function __construct() { 
        $this->header = new ViewHeader("<a href='controller_connexion.php'>Connexion</a>");
            if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { 
                $this->header->setNav("<a href='controller_compte.php'>Mon Compte</a><a href='deconnexion.php'>Déconnexion</a>"); 
            } 
        $this->footer = new ViewFooter();  
        }

    public function renderHeader(): string { 
        return $this->header->render(); 
    } 

    public function renderViews(): void {
        echo $this->renderHeader();
        echo $this->footer->render();
    }
}
?>