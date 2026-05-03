<?php
require_once "../classes/Livre.php";
$livre = new Livre();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $livre->ajouter(
        $_POST["titre"],
        $_POST["isbn"],
        $_POST["annee"],
        $_POST["quantite"],
        $_POST["auteur_id"],
        $_POST["categorie_id"]
    );
    header("Location: livres.php");
    exit;
}

if (isset($_GET["delete"])) {
    $livre->supprimer($_GET["delete"]);
    header("Location: livres.php");
    exit;
}

$liste = $livre->afficher();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Livres</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header><h1>📚 Livres</h1></header>

<nav>
    <a href="index.php">Accueil</a>
    <a href="auteurs.php">Auteurs</a>
    <a href="categories.php">Catégories</a>
    <a href="livres.php">Livres</a>
</nav>

<div class="container">

<h2>Ajouter livre</h2>

<form method="POST">
    <input type="text" name="titre" placeholder="Titre">
    <input type="text" name="isbn" placeholder="ISBN">
    <input type="number" name="annee" placeholder="Année">
    <input type="number" name="quantite" placeholder="Quantité">
    <input type="number" name="auteur_id" placeholder="ID auteur">
    <input type="number" name="categorie_id" placeholder="ID catégorie">
    <button>Ajouter</button>
</form>

<h2>Liste livres</h2>

<?php foreach ($liste as $l) { ?>
    <div class="card">
        <div>
            <b><?= $l["titre"] ?></b><br>
            <?= $l["auteur"] ?> - <?= $l["categorie"] ?>
        </div>
        <a href="?delete=<?= $l["id"] ?>">❌</a>
    </div>
<?php } ?>

</div>

</body>
</html>