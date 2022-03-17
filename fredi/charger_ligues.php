
<body>
<div class='load' id="load">chargement de la base fini</div>

<button id="contents"><a href="index.php">retourner sur la page d'accueil</a></button>

</body>
<?php

// Initialisations
include 'sql.php';
include 'init.php';

// Import du fichier CSV sous la forme d'un tablau PHP
$rows = load_from_csv(ROOT . DS . "files" . DS . "ligues.csv", 2);

// Génération des ordres SQL de réinitialisation de la base (drop/create)
$sql = file_get_contents(ROOT . DS . "BDD" . DS . "ligue.sql") . PHP_EOL;

// Génération de l'ordre SQL "INSERT"
$sql .= "USE fredi21;" . PHP_EOL;
$sql .="SET FOREIGN_KEY_CHECKS = 0; ";
$sql .= "INSERT INTO ligue (id_ligue, lib_ligue)  VALUES " . PHP_EOL;
  foreach ($rows as $row) {
    $sql .= "(";
    $sql .= $dbh->quote( $row[0], PDO::PARAM_STR). ", ";
    $sql .="'". $row[1]."'"; 
    $sql .= ")," . PHP_EOL;
  }

// Enlève la dernière virgule qui est en trop
$sql = rtrim($sql, PHP_EOL);
$sql = rtrim($sql, ',');
$sql .=" ;SET FOREIGN_KEY_CHECKS = 1;";

// Exécution des ordres SQL
try {
  $sth = $dbh->prepare($sql);
  $sth->execute();
  } catch (PDOException $ex) {
    die("Erreur lors de la requête SQL : " . $ex->getMessage());
  }
?>

<link rel="stylesheet" href="css/main.css">

<!-- Function js permettant d'afficher chargement en cours sur la page -->
<script>document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'interactive') {
       document.getElementById('contents').style.visibility="hidden";
  } else if (state == 'complete') {
      setTimeout(function(){
         document.getElementById('interactive');
         document.getElementById('load').style.visibility="hidden";
         document.getElementById('contents').style.visibility="visible";
      },2000);
  }
}


</script>
