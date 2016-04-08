<?php

// Connexion à la base de données
try
{
  $bdd = new PDO('mysql:host=synoria.com;dbname=epitech', 'epitech', 'epitech');
}
catch(Exception $e)

{
  die('Erreur : '.$e->getMessage());

}