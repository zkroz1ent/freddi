<?php
//Création de la session
session_start();
include 'log/log.php';
include 'sql.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> - fredi</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" href="img/logo.png">
</head>

<body>
    <div class="navbar">
        <ul>
            <!--Quand on arrive sur le site, seulement accueil visible-->
            <li class="ligne left"><a class="<?php if ($active == 1) {
                                                    echo "active";
                                                } ?>" href="index.php">Accueil</a></li>
            <?php
            //Si user connecté alors FAQ et déconnexion visibles
            if (isset($_SESSION['user'])) { ?>
                <li class="ligne left">
                <li class="ligne right"><a class="<?php if ($active == 4) {
                                                        echo "active";
                                                    } ?>" href="liste/deconnexion.php">Déconnexion</a></li>

                <?php

                if ($_SESSION['user']['role'] == 1) {


                ?>

                    <li class="ligne left"><a class=active" href="utilisateur.php">utilisateur</a></li>
                    <li class="ligne left"><a class=active" href="clubs_charger.php">charger club</a></li>
                    <li class="ligne left"><a class=active" href="charger_ligues.php">charger ligue</a></li>


                <?php
                }

                ?>
                <li class="ligne left"><a class=active" href="notes_frais.php">Notes de frais</a></li>

                <?php
                if ($_SESSION['user']['role'] == 2) {
                ?>
                <li class="ligne left"><a class=active" href="cumul.php">Cumul de frais</a></li> 

            <?php } } else {
                //Si user non connecté alors seulement connexion et inscription visibles 
            ?>
                <li class="ligne right"><a class="<?php if ($active == 3) {
                                                        echo "active";
                                                    } ?>" href="inscription.php">Inscription</a></li>
                <li class="ligne right"><a class="<?php if ($active == 4) {
                                                        echo "active";
                                                    } ?>" href="connexion.php">Connexion</a></li>

            <?php }
            ?>
        </ul>
    </div>
    <div class="marge">
        <?php
        if (isset($_SESSION['messages'])) {
            // Permet d'afficher les messages sur toutes les autres pages
            foreach ($_SESSION['messages'] as $key => $value) {
                echo '<div class="popup ' . $value[0] . '">';
                echo "<p><strong>" . $key . "</strong> : " . $value[1] . "</p>";
            }
            //Détruit la variable message
            unset($_SESSION['messages']);
            echo "</div>";
        }

        echo '<br>';


        ?>