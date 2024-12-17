# tpapi
Pour utiliser ce projet vous devez créer un fichier **env.local.php** à la racine
Il va contenir :
```php
<?php

//Paramètrage de la BDD
const DB_HOST = "url du serveur de BDD";
const DB_NAME = "nom de la BDD";
const DB_USER = "login de la BDD";
const DB_PASSWORD = "password de la BDD";
//base URL
const BASE_URL = '/tpapi/';
```
1 installer le projet :
Saisir la commande ci-dessous dans la console :

```bash
composer install
```
