<?php include "menu.php"; ?>
<?php
require_once "../classes/Auteur.php";

$auteur = new Auteur();

// récupérer id
$id = $_GET["id"];

// si formulaire envoyé
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $nationalite = $_POST["nationalite"];

    $auteur->modifier($id, $nom, $prenom, $nationalite);

    header("Location: auteurs.php");
    exit;
}

// récupérer les infos actuelles
$liste = $auteur->afficher();

$current = null;
foreach ($liste as $a) {
    if ($a["id"] == $id) {
        $current = $a;
    }
}
?>

<h2>Modifier Auteur</h2>

<form method="POST">
    <input type="text" name="nom" value="<?= $current["nom"] ?>"><br><br>
    <input type="text" name="prenom" value="<?= $current["prenom"] ?>"><br><br>
    <input type="text" name="nationalite" value="<?= $current["nationalite"] ?>"><br><br>

    <button type="submit">Modifier</button>
</form>