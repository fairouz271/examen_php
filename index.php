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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
            crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>


<?php

$sql = "SELECT * FROM maison";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$maisons = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($maisons);
$nb_total = 0 ;


foreach ($maisons as $maison) : ?>

<?php $nb_total += 1; ?>

<div>
    <p><strong><?php echo $maison['nom'] . '<br>' ?></strong></p>
    <p><strong>l'adresse:</strong><?php echo ' ' . $maison['adresse'] . '<br>' ?></p>

    <p><strong>Nombre de pieces:</strong><?php echo ' ' . $maison['nb_pieces'] . '<br>' ?></p>
    <p><strong>Le prix est :</strong><?php echo ' ' . $maison['prix'] ?></p>

    <p><strong>le nombre total des maison est :</strong><?php $nb_total ?></p>

    <?php endforeach; ?>
</div>
<div>

    <?php if (isset($_GET['ajout'])): ?>
        <div class="alert alert-success">
            <?php
            if ($_GET['ajout'] === 'ok') echo "maison ajoutée.";

            ?>
        </div>
    <?php endif; ?>

</div>

</body>
</html>





