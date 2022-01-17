    <?php  

        /* Ecriture des informations suite à l'inscription dans la base de donnée */
        if(isset($_POST['envoyer'])){
            $conn = mysqli_connect('localhost', $_SERVER['DB_USER'], $_SERVER['DB_PASS'] ,"mschyns_".$_SERVER['DB_USER']);

            if($conn){
                $compte=$_POST["mail"];
                $verif = " SELECT * FROM Clients_proj WHERE mail='$compte' ";
                $result = mysqli_query($conn, $verif);

                if(mysqli_num_rows($result) == 1){      /* Si l'adresse mail existe déjà alors on renvoie un message disant que le compte existe déjà */
                    $error=TRUE;
                }
                
                else{

                    if(isset($_POST['email'])){
                        $email=1;
                    }
                    else{
                        $email=0;
                    }

                    if(isset($_POST['gsm'])){
                        $gsm=1;
                    }
                    else{
                        $gsm=0;
                    }

                    $query= " INSERT INTO Clients_proj ( prenom , nom , mdp , mail, tel, rue, num, ville, cp, pays, news, genre, email, gsm) VALUES ('".$_POST["prenom"]."' , '".$_POST["nom"]."', '".$_POST["mdp"]."', '$compte', '".$_POST["tel"]."', '".$_POST["rue"]."', '".$_POST["num"]."', '".$_POST["ville"]."', '".$_POST["cp"]."', '".$_POST["pays"]."', '".$_POST["news"]."', '".$_POST["genre"]."', '$email', '$gsm') ";
                    $result_q = mysqli_query($conn, $query);
                    
                    /* cookie pour rester connecter dans lequel je stocke l'id */
                    $verif = " SELECT * FROM Clients_proj WHERE mail='$compte' ";
                    $result = mysqli_query($conn, $verif);
                    $row = mysqli_fetch_assoc($result);
                    $key=$row['id'];
                    setcookie('membre' , $key, time() + 3600, '/');
                    
                    header('Location: profil.php');  
                }
            }          
        }
        


    ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>FreshR</title>
    <link rel="stylesheet" href='inscription.css'>
    <link rel="icon" href="images/favicon.png">
</head>

<body>

    <div class="header_form">

        <?php include 'header/header.php';?>
        <style> <?php include 'header/header_style.css';?> </style>

        <div class="interieur"> 
            
            <div class="texte">
                <?php 
                    if(isset($error)){
                        echo" Cette adresse mail est déjà utilisée.";
                    }
                ?>
                <h2>Inscription</h2>

                <div class="formulaire">
                    <form method="POST" action="">
                        
                        <!-- infos nom et prenom + mdp -->
                        <div class="prenom_nom">
                            <input type="text" name="prenom" class="prenom" placeholder="Prénom" required="required"> 
                            <input type="text" name="nom" class="nom" placeholder="Nom" required="required"> 
                            <input type="password" name="mdp" placeholder="Mot de Passe" required="required">
                        </div>

                        <!-- infos @ et tel -->
                        <div class="joindre">
                            <input type="email" name="mail" class="email" placeholder="Adresse mail" required="required"> 
                            <input type="tel" name="tel" class="tel" placeholder="Téléphone" required="required">
                        </div>

                        <!-- adresse client -->
                        <p> Remplissez l'adresse où vous désirez être livré </p>
                        <div class="adresse">
                            <input type="text" name="rue" class="rue" placeholder="Rue" required="required"> 
                            <input type="text" name="num" class="num" placeholder="Numéro" required="required">
                            <input type="text" name="ville" class="ville" placeholder="Ville" required="required">
                            <input type="text" name="cp" class="cp" placeholder="Code postal" required="required">
                            <input type="text" name="pays" class="pays" placeholder="Pays" required="required"> 
                        </div>

                        <!-- newsletter -->
                        <div class="rond">
                            <p> Désirez-vous vous inscrire à la newsletter ? </p>
                            <input type="radio" name="news" value="1" checked required="required">
                            <label for="news">Oui</label>
                            <input type="radio" name="news" value="0" required="required">
                            <label for="news">Non</label>
                        </div>

                        <!-- genre -->
                        <div class="select">
                            <p> Genre </p>
                            <select name="genre">
                                <option value="NC">Non Communiqué</option>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                                <option value="NB">Non Binaire</option>
                            </select>
                        </div>

                        <!-- choix contact -->
                        <div class="moyen">
                            <p>Par quel moyen vous contacter ? </p>
                            <input type="checkbox" name="email"  value="1" class="box">
                            <label for="email"> Mail</label><br>
                            <input type="checkbox" name="gsm" value="1" class="box">
                            <label for="gsm">Téléphone</label>
                        </div> 

                        <input type="submit" name="envoyer" value="envoyer" class="bouton"/>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer/footer.php';?>
    <style> <?php include 'footer/footer_style.css';?> </style>

</body>