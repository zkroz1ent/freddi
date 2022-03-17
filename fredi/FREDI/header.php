<?php
    //Création de la session
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> - fredi</title>
    <link rel="stylesheet" href="/fredi/css/main.css">
    <link rel="icon" href="/fredi/img/logo.png">
</head>
<body>
<div class="navbar">
    <ul>
        <!--Quand on arrive sur le site, seulement accueil visible-->
        <li class="ligne left"><a class="<?php if($active==1){echo"active";}?>"href="/fredi/index.php">Accueil</a></li>
        <?php
            //Si user connecté alors FAQ et déconnexion visibles
            if(isset($_SESSION['user'])){ ?>
                <li class="ligne left"><a class="<?php if($active==2){echo"active";}?>" href="/fredi/liste/liste.php">FAQ</a></li>
                <li class="ligne right"><a class="<?php if($active==4){echo"active";}?>" href="/fredi/liste/deconnexion.php">Déconnexion</a></li>
            <?php } else { 
            //Si user non connecté alors seulement connexion et inscription visibles ?>
                <li class="ligne right"><a class="<?php if($active==3){echo"active";}?>" href="/fredi/inscription.php">Inscription</a></li>
                <li class="ligne right"><a class="<?php if($active==4){echo"active";}?>" href="/fredi/connexion.php">Connexion</a></li>
            <?php }
        ?>
    </ul>
</div>
    <div class="marge">
        <?php
        if(isset($_SESSION['messages'])){
            // Permet d'afficher les messages sur toutes les autres pages
            foreach($_SESSION['messages'] as $key=>$value){
                echo '<div class="popup '. $value[0].'">';
                echo "<p><strong>".$key."</strong> : ".$value[1]."</p>";
            }
            //Détruit la variable message
            unset($_SESSION['messages']);
            echo "</div>";
        }
        ?>
       
