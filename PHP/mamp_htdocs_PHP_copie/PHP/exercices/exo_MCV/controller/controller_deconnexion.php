<?php
session_start(); 
session_destroy(); 
echo "deconnexion réussie";
header('Location:controller_acceuil.php'); 
exit;
?>