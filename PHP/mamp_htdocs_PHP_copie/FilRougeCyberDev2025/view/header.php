<?php
class ViewHeader{
    private ?string $nav;

    public function __construct(?string $nav){
        $this->nav = $nav;
    }

    public function getNav(): ?string { 
        return $this->nav; 
    }
    public function setNav(?string $nav): ViewHeader { 
        $this->nav = $nav; return $this; 
    }

    public function render():string{
        return "<!doctype html>
        <html lang='fr'>
        
          <head>
            <meta charset='UTF-8' />
            <meta name='viewport' content='width=device-width, initial-scale=1.0' />
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
            <link rel='stylesheet' href='./style.css'>
            <title>Fallout</title>
          </head>
        
          <body>
        
            <header>
              <div>
                <img src='./design/dark.png' alt='image'>
                <img src='./design/logo.png' alt='image'>
                <a href='./connexion.html'>Connexion</a>
              </div>
              <nav>
                <a href='./index.html'>Accueil ></a>
              </nav>
            </header>
        
            <main>";
        
        
        
        
        
        "<!DOCTYPE html>
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
                    <a href='controller_accueil.php'>Accueil</a>
                    <!-- Menu de Navigation Dynamique -->
                    ".$this->getNav()."
                </nav>
            </header>";
    }
}
?>




"<!doctype html>
<html lang="fr">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <title>Fallout</title>
  </head>

  <body>

    <header>
      <div>
        <img src="./design/dark.png" alt="image">
        <img src="./design/logo.png" alt="image">
        <a href="./connexion.html">Connexion</a>
      </div>
      <nav>
        <a href="./index.html">Accueil ></a>
      </nav>
    </header>

    <main>";