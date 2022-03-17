<?php $active=4; $title = "Connexion"; require('header.php'); require('sql.php');
    //Le pseudo saisi par l'user va dans la variable $pseudo
    $pseudo=isset($_POST['pseudo']) ? $_POST['pseudo'] :  "";
    //Le mdp saisi par l'user va dans la variable $password
    $password=isset($_POST['password']) ? $_POST['password'] :  "";
    //Si pseudo sup à 8 carac.
    if(strlen($pseudo)>=8){
        //Si mdp sup à 8 carac.
        if(strlen($password)>=8){
            //On rentre la requête sql dans une variable
            $sql="SELECT * FROM user WHERE pseudo=:pseudo";
            //Lecture du pseudo dans la BDD 
            try {
                $sth = $dbh->prepare($sql);
                $sth->execute(array(
                    ':pseudo' => $pseudo
                ));
                $user = $sth->fetch(PDO::FETCH_ASSOC);
            } //Gestion des erreurs
            catch (PDOException $ex) {
                die("Erreur lors de la requête SQL : " . $ex->getMessage());
            }
            //Si pseudo et mdp correct alors connecté       password_verify compare le mdp saisi avec le mdp crypté dans la BDD
            if($pseudo === $user['pseudo'] && password_verify($password,$user['mdp'])){
                //détruit la variable mdp
                unset($user["mdp"]);
                
                $_SESSION['user']=$user;
                $_SESSION['messages']=array(
                    "connexion" => ["green", "Vous vous êtes bien connecté"]
                );
                //Redirige vers l'accueil si connexion réussie
                header("Location: index.php");
            //Conditions où la connexion échoue
            }else{
                $_SESSION['messages']=array("Account" => ["red", "Ces identifiants sont incorrects"]);
                header("Location: connexion.php");
            }
        }else{
            $_SESSION['messages']=array("Password" => ["red", "Vous avez rentré un mot de passe trop court"]);
            header("Location: connexion.php");
        }
    }else{
        $_SESSION['messages']=array("Pseudo" => ["red", "Vous avez rentré un pseudo trop court"]);
        header("Location: connexion.php");
    }
?>