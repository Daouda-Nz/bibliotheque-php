<?php
require_once "../classes/Auteur.php";

$auteur = new Auteur();

// Ajouter si formulaire envoyé
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $nationalite = $_POST["nationalite"];

    $auteur->ajouter($nom, $prenom, $nationalite);
}

// Récupérer liste
$liste = $auteur->afficher();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des auteurs</title>
</head>
<body>

<h2>Ajouter un auteur</h2>

<form method="POST">
    Nom : <input type="text" name="nom"><br><br>
    Prénom : <input type="text" name="prenom"><br><br>
    Nationalité : <input type="text" name="nationalite"><br><br>
    <button type="submit">Ajouter</button>
</form>

<h2>Liste des auteurs</h2>

<?php
foreach ($liste as $a) {
    echo $a["id"] . " - " . $a["nom"] . " " . $a["prenom"] . "<br>";
}
?>

</body>
</html>