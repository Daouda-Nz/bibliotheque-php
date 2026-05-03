<?php include "menu.php"; ?>
<?php
require_once "../classes/Auteur.php";

$auteur = new Auteur();

// 🔥 SUPPRESSION
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $auteur->supprimer($id);
    header("Location: auteurs.php");
    exit;
}

// 🔥 AJOUT
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $nationalite = $_POST["nationalite"];

    $auteur->ajouter($nom, $prenom, $nationalite);

    header("Location: auteurs.php");
    exit;
}

// 🔥 LISTE DES AUTEURS
$liste = $auteur->afficher();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des Auteurs</title>
</head>
<body>

<h2>➕ Ajouter un auteur</h2>

<form method="POST">
    <input type="text" name="nom" placeholder="Nom" required><br><br>
    <input type="text" name="prenom" placeholder="Prénom" required><br><br>
    <input type="text" name="nationalite" placeholder="Nationalité" required><br><br>
    <button type="submit">Ajouter</button>
</form>

<hr>

<h2>📚 Liste des auteurs</h2>

<?php foreach ($liste as $a) { ?>

    <p>
        <strong><?= $a["id"] ?></strong> -
        <?= $a["nom"] ?> <?= $a["prenom"] ?> -
        <?= $a["nationalite"] ?>

        <!-- 🔥 MODIFIER -->
        <a href="edit_auteur.php?id=<?= $a["id"] ?>">
            ✏️ Modifier
        </a>

        <!-- 🔥 SUPPRIMER -->
        <a href="auteurs.php?delete=<?= $a["id"] ?>"
           onclick="return confirm('Supprimer cet auteur ?')">
            ❌ Supprimer
        </a>
    </p>

<?php } ?>

</body>
</html>