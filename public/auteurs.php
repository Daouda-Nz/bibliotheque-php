<?php

require_once "../classes/Auteur.php";

$auteur = new Auteur();

// Ajouter un auteur (test)
$auteur->ajouter("Victor", "Hugo", "Française");

// Afficher les auteurs
$liste = $auteur->afficher();

foreach ($liste as $a) {
    echo $a["id"] . " - " . $a["nom"] . " " . $a["prenom"] . "<br>";
}