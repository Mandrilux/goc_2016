<?php
include_once("modele/connexion_sql.php");
if(!isset($_GET['section']))
  {
    include_once("controleur/index/index.php");
  }