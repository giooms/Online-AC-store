<?php

    if(isset($_POST['login'])){
        $bd=mysqli_connect('localhost', $_SERVER['DB_USER'], $_SERVER['DB_PASS'], "mschyns_".$_SERVER['DB_USER']);
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        $verif = "SELECT * FROM Clients_proj WHERE mail='$mail' AND mdp='$mdp'";
        $result = mysqli_query($bd, $verif);
        
        if(mysqli_num_rows($result) == 1 ){
            /* cookie pour rester connecter dans lequel je stocke l'id */
            $verif = " SELECT * FROM Clients_proj WHERE mail='$mail' AND mdp='$mdp' ";
            $result = mysqli_query($bd, $verif);
            $row = mysqli_fetch_assoc($result);
            $key=$row['id'];
            setcookie('membre' , $key, time() + 3600, '/');
            
            header('Location: profil.php');
        }
        else{
            $error=TRUE;
        }
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>FreshR</title>
    <link rel="stylesheet" href='connexion_style.css'>
    <link rel="icon" href="images/favicon.png">
</head>

<body>
    <div class="header_form">

        <?php include 'header/header.php';?>
        <style> <?php include 'header/header_style.css';?> </style>

        <div class="intérieur">

            <div class="texte">

                <?php       /* Si mauvais identifiants pour se connecter */
                    if(isset($error)){
                        echo"<h4>Nous ne reconnaissons pas cette combinaison.</h4>";
                    }
                ?>

                <h3>Connectez-vous</h3>
                <form action="" id="connexion" method="POST" >
                    <input type="email" placeholder="Adresse mail" name="mail" required="required"> <br>
                    <input type="password" placeholder="Mot de passe" name="mdp" required="required">  <br>
                    
                    <input type="submit" name="login" value="Connexion" id="envoyer">
                </form> <br>
                <p>Pas encore inscrit(e) ? <a href="inscription.php">Faites-le ici</a><p>
            </div>
            
        </div>
    </div>

    <?php include 'footer/footer.php';?>
    <style> <?php include 'footer/footer_style.css';?> </style>

</body>