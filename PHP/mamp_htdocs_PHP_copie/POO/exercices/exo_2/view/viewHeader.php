<?php
class ViewHeader{
    //ATTRIBUT
    private ?string $nav;

    //CONSTRUCTEUR
    public function __construct(?string $nav){
        $this->nav = $nav;
    }

    //GETTER ET SETTER
    public function getNav(): ?string { 
        return $this->nav; 
    }
    public function setNav(?string $nav): ViewHeader { 
        $this->nav = $nav; return $this; 
    }

    public function render():string{
        return "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Projet Task</title>
            <link rel='stylesheet' href='./src/style/style.css'>
        </head>
        <body>
            <header>
                <h1>My TODO</h1>
                <nav>
                    <a href='index.php'>Accueil</a>
                    <!-- Menu de Navigation Dynamique -->
                    ".$this->getNav()."
                </nav>
            </header>";
    }
}
?>