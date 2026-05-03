<?php

require_once "../classes/Livre.php";

$livre = new Livre();

$liste = $livre->afficher();

echo "<h2>Liste des livres</h2>";

foreach ($liste as $l) {
    echo $l["titre"] . " - " . $l["isbn"] . "<br>";
}