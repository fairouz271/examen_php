<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=examen_php_maison;charset=utf8',
    'root',
    ''
);
var_dump($pdo);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <label>Nom</label>
    <input type="text" name="name_input">

    <label>adresse</label>
    <input type="textarea" name="adress_input">

    <label>Nombre de pièces</label>
    <input type="number" name="number_input">

    <label>Prix</label>
    <input type="number" name="prix_input">

    <button type="submit">ajouter</button>
</form>
<?php if (isset($_POST['name_input'], $_POST['adress_input'], $_POST['number_input'], $_POST['prix_input'])) {
    $sql = "INSERT INTO maison (nom, adresse, nb_pieces, prix) VALUES (:nom, :adresse, :nb_pieces, :prix)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'nom' => $_POST['name_input'],
        'adresse' => $_POST['adress_input'],
        'nb_pieces' => $_POST['number_input'],
        'prix' => $_POST['prix_input']
    ]);

    header('Location: index.php?ajout=ok&message=added');
    exit();
}
?>
<div class="mt-4">
    <button class="btn btn-dark">
        <a href="index.php" class="btn btn-dark">Retour à l'accueil</a>
    </button>
</div>
</body>
</html>

