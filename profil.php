<?php

    if(isset($_POST["send"])){      /* Si le client a participé à l'enquête, alors on update ses données pour la promotion */ 
        $conn = mysqli_connect('localhost', $_SERVER['DB_USER'], $_SERVER['DB_PASS'] ,"mschyns_".$_SERVER['DB_USER']);

        $query= " UPDATE Clients_proj SET participation = 1  WHERE id = '".$_COOKIE['membre']."' ";
        $result = mysqli_query($conn, $query);
    }
    if(!isset($_COOKIE['membre'])){
        header('location: connexion_panier.php');
    }

    if(isset($_POST['deco'])){      /* Instruction de déconnexion <-> efface le cookie lorsque le bouton déconnexion a été utilisé */
        setcookie('membre' , $key, time() - 3600, '/');

        header('Location: index.php');
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>FreshR</title>
    <link rel="stylesheet" href='profil_style.css'>
    <link rel="icon" href="images/favicon.png"> <!-- icone de l'onglet -->
</head>

<body>
    
    <?php include 'header/header.php';?>
    <style> <?php include 'header/header_style.css';?> </style>

    <main>

        <div class="hello">
            
            <p>
                <img src="images/account.png">
                <h2>Bonjour !</h2>
                Nous sommes heureux de vous revoir !
            </p>
            <p>
                <h2>Offres</h2>
                Participer à notre enquête client sur le développement de notre application et recevez 10% sur toutes vos commandes. <br>

                <?php

                    if(isset($_POST['send'])){
                        echo"<br> Merci d'avoir participé ! <br>";
                    }

                ?>
                <button class="bouton1"><a href="enquete_client.php" style= "text-decoration: none; color:#91CEC2">Participer</a></button>

            </p>
            <p>
                <h2>News</h2>
                Notre Keynote du 16 juin se fera entièrement en ligne.
            </p>
        </div>
        
        <div class="info">

            <h2>Vos informations</h2>

            <?php       /* Récupération des données pour remplir l'aperçu */

                $conn = mysqli_connect('localhost', $_SERVER['DB_USER'], $_SERVER['DB_PASS'] ,"mschyns_".$_SERVER['DB_USER']);

                if($conn){
                    $info = " SELECT * FROM Clients_proj WHERE id='".$_COOKIE['membre']."' ";
                    $result = mysqli_query($conn, $info);
                    $row = mysqli_fetch_assoc($result);
                }    

                echo"
                    <div class='data'>
                        <h3>Coordonnées et Contact</h3>
                        <ul>
                            <li>Nom: '".$row['nom']."' </li> <br>
                            <li>Prénom: '".$row['prenom']."' </li> <br>
                            <li>Mail: '".$row['mail']."' </li> <br>
                            <li>Téléphone: '".$row['tel']."' </li> <br>
                            <li>Genre: '".$row['genre']."' </li> <br>
                        </ul> 
                    </div>

                    <div class='adresse'>    
                        <h3>Adresse de livraison</h3>
                        <ul>
                            <li>Rue: '".$row['rue']."'</li><br>
                            <li>Numéro: '".$row['num']."' </li><br>
                            <li>Ville: '".$row['ville']."' </li><br>
                            <li>Code postal: '".$row['cp']."' </li><br>
                            <li>Pays: '".$row['pays']."' </li><br>
                        </ul>
                    </div>
                ";
            ?>    

            <button class="bouton2"><a href="update_data.php" style= "text-decoration: none; color:white">Changer les données</a></button>

            <form method="POST" action="">
                <input type="submit" name="deco" value="Déconnexion" id="deco">
            </form>

        </div>

    </main>

    <?php include 'footer/footer.php';?>
    <style> <?php include 'footer/footer_style.css';?> </style>

</body>

</html>