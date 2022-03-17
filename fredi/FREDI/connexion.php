<?php $active = 4;
$title = "Connexion";
require('header.php'); ?>
<div class="center">
  <h1>Se connecter</h1>
  <form class="form" action="connexion_validation.php" method="post">
    <table>
      <tr>
        <td><label for="pseudo">Pseudo :</label></td>
        <td><input type="text" name="pseudo" id="pseudo"></td>
      </tr>
      <tr>
        <td><label for="password">Mot de passe :</label></td>
        <td><input type="password" name="password" id="password"></td>
      </tr>
      <tr>
        <td>
          <p><a href="inscription.php">Pas encore inscrit ?</a>
            <a href="motpasseoublie.php">mot de passe oublie</a>
          </p>
        </td>
        <td><input class="button green full" type="submit" name="submit" value="Se connecter" class="box-button"></td>
      </tr>
    </table>
  </form>
</div>
<?php require('footer.php'); ?>