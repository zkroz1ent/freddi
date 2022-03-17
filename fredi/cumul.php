<?php
$page = "cumul.php";
include 'init.php';
include 'sql.php';
include 'header.php';


$id = $_SESSION['user']['id_utilisateur'];
$id_utilisateur = $_SESSION['user']['id_utilisateur'];
echo '<br>';
echo '<br>';
echo '<br>';

// Récupère la liste des lignes
$sql = 'select * from note  , utilisateur where note.id_utilisateur=utilisateur.id_utilisateur and utilisateur.id_utilisateur=:id;';

try {
  $sth = $dbh->prepare($sql);

  $sth->execute(array(":id" => $id));
  $rows = $sth->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
}
$sql = 'select * from adherent ,utilisateur where adherent.id_utilisateur=utilisateur.id_utilisateur and utilisateur.id_utilisateur=:id;';

try {
  $sth = $dbh->prepare($sql);

  $sth->execute(array(":id" => $id));
  $tableau = $sth->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
}

$sql = 'select * from note where id_utilisateur =:id_utilisateur ';

try {
  $sth = $dbh->prepare($sql);

  $sth->execute(array(":id_utilisateur" => $id_utilisateur,));
  $roows = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
}

foreach ($roows as $row) {

  $id_note = $row['id_note'];
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <title>Cumul des frais</title>
</head>

<body>
  <h1>Affichage de la note des cumul des frais</h1>
  <img src="img/logo.png">
</br>
  <table class="container">
    <tr>

      <th>Ligue</th>
      <th>Cumul</th>
      <th>Motif</th>
      <th>Période</th>
      <th>Montant de la période</th>
    </tr>

    <?php
    foreach ($rows as $row) {
      echo '<tr>';
      echo '<td>' . $row['id_ligue'] . '</td>';
      echo '<td>' . $row['id_club'] . '</td>';
      echo '<td>' . $row['id_motif'] . '</td>';
      echo '<td>' . $row['id_periode'] . '</td>';
      echo '<td>' . $row['mtperiode'] . '</td>';

      $sql = "SELECT ligue.lib_ligue AS NomLigue, club.lib_club AS NomClub, motif.lib_motif AS NomMotif, periode.lib_periode AS Periode, SUM(ligne.mt_total) AS MtPeriode FROM note,periode,club,adherent,motif,ligue,ligne WHERE periode.est_active=1 AND ligne.id_note=note.id_note AND ligne.id_motif=motif.id_motif AND periode.id_periode=note.id_periode AND note.id_utilisateur=adherent.id_utilisateur AND adherent.id_club=club.id_club AND club.id_ligue=ligue.id_ligue GROUP BY NomLigue,NomClub,NomMotif ;";
      try {
        $sth = $dbh->prepare($sql);

        $sth->execute(array(":note" => $row['id_note']));
        $rooows = $sth->fetch(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
      }
      echo '<td>';
      if ($row['est_valide'] == '1') {
        echo '<a href="lignes_frais_modifier.php?id_ligne=' . $rooows['id_ligne'] . '">Modifier</a>&nbsp;';
      }
      echo '&nbsp;<a href="supprimer_notes.php?id_ligne=' . $rooows['id_ligne'] . '">Supprimer</a></td>';
      echo "</tr>";
    } ?>
  </table>

  <p>Il y a <?php echo count($rows); ?> ligne(s) de frais</p>
  <p><a href="cumul.pdf.php">Télécharger</a> le PDF</p>

  <?php
  require('footer.php');
  ?>