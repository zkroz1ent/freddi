<?php
// Initialisations
include 'init.php';

// Connexion à la base
require('sql.php');

// Récupère la liste des pays
$sql = 'select * from club';
try {
  $sth = $dbh->prepare($sql);
  $sth->execute();
  $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
}
// Affichage
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Freddi club</title>
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <h1>Clubs/h1>
  <h2>Liste des clubs</h2>

  <?php
  // Affichage du tableau la liste des clubs
  if (count($rows) > 0) {
  ?>
    <table>
      <tr>
        <th>ID Club</th>
        <th>Libellé </th>
        <th>adr1</th>
        <th>adr2</th>
        <th>adr3l</th>
        <th>ID Ligues</th>
        <th>&nbsp;</th>
      </tr>
      <?php
      foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>' . $row['id_club'] . '</td>';
        echo '<td>' . $row['lib_club'] . '</td>';
        echo '<td>' . $row['adr1'] . '</td>';
        echo '<td>' . $row['adr2'] . '</td>';
        echo '<td>' . $row['adr3'] . '</td>';
        echo '<td>' . $row['id_ligues'] . '</td>';
        echo "</tr>";
      } ?>
    </table>

  <?php
  } else {
    echo "<p>Rien à afficher</p>";
  }
  ?>
  <!-- Compte le nombre d'utilisateur -->
  <p><?php echo count($rows);  ?> utilisateur(s)</p>
</body>

</html>
