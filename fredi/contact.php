<?php $active=5; $title = "Contact"; require('header.php'); require('sql.php');?>

<div class="marge">

    <div class="center">

      <main id="main" role="main" class="main">
        <h1>Contact</h1>

        <form action="#" method="post">
          <!-- Formulaire de contact -->
          <p>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" placeholder="Nom" required>
          </p>
          <p>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
          </p>
          <p>
            <label for="mail">Mail</label>
            <input type="email" name="mail" id="mail" placeholder="Adresse mail" required>
          </p>
          <p>
            <label for="message">Message</label><br><br>
            <textarea name="message" id="message" cols="50" rows="10" placeholder="Votre message" required></textarea>
          </p>
          <p><input type="submit" value="Envoyer" name="submit">&nbsp; <input type="reset" value="Réinitialiser"></p>
        </form>
      </main>
    </div>
  </div>

  <?php require('footer.php'); ?>
  