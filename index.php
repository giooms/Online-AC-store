<?php

    if(isset($_POST['login'])){     /* Si le client se connecte, on check que les identifiants sont bons */ 
        $bd=mysqli_connect('localhost', $_SERVER['DB_USER'], $_SERVER['DB_PASS'], "mschyns_".$_SERVER['DB_USER']);
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        $verif = "SELECT * FROM Clients_proj WHERE mail='$mail' AND mdp='$mdp'";
        $result = mysqli_query($bd, $verif);
        
        if(mysqli_num_rows($result) == 1 ){     /* S'ils le sont alors on crée le cookie pour rester connecter */
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
    <link rel="stylesheet" href='index_style.css'>
    <link rel="icon" href="images/favicon.png"> <!-- icone de l'onglet -->
</head>

<body>

    <?php include 'header/header.php';?>
    <style> <?php include 'header/header_style.css';?> </style>

    <main>

        <!-- section 1 -->
        <section class="arrivee">
            
                <img src="images/relax.png" class="image" width="650px">
            
            <h2>Respirez de l'air frais</h2>
            <p>Nos climatiseurs de haute qualité et modernes assurent un environnement composé d'air pur.</p>

            <?php       /* Si mauvais identifiants pour se connecter */
                if(isset($error)){
                    echo"<h4 style='margin-left:135px'>Nous ne reconnaissons pas cette combinaison.</h4>";
                }
            ?>

            <!-- inscrivez-vous -->

            <a href="inscription.php" class="inscription">Inscrivez-vous<a>

            <!-- connectez-vous -->
            <div class="connexion">

                <input type="checkbox" id="apparition2">
                <label for="apparition2">Connectez-vous</label>

                <dialog >
                    <h3>Connectez-vous</h3>
                    <form action="" id="connexion" method="POST" >
                        <input type="email" placeholder="Adresse mail" name="mail" required="required"> <br>
                        <input type="password" placeholder="Mot de passe" name="mdp" required="required">  <br>

                        <input type="submit" name="login" value="Connexion" id="envoyer">
                    </form>
    
                    <label for="apparition2">X</label>
                </dialog>

            </div>
            

        </section>

        <!-- section 2 -->
        <section class="infos">
            <h2> &#192; propos </h2>
            <p> Nous vous proposons une gamme complète d'unités de conditionnement d'air qui non seulement maintiennent votre maison au frais, mais assurent également le maintien d'un air doux et sain à l'intérieur. </p>
        </section>
    
        <!-- section 3-->
        <section class="services">
            <h2> Nos services </h2>

            <div class="box">

                <div class="installation"> 
                    <img src="images/build.png" width=50px>
                    <h3> Installation </h3>
                    <p> Vous avez trouvé le climatisateur de vos rêves ? Pas de soucis, nos spécialistes viennent l'installer à domicile quand cela vous arrange ! Organisez leur venue lors de l'achat de votre climatiseur et ils viendront avec plaisir ! <p>
                </div>

                <div class="vent"> 
                    <img src="images/vent.png" width=50px>
                    <h3> Climatiseurs </h3>
                    <p> Nous vendons un panel de climatiseurs haute gamme de tailles différentes afin de combler petits et grands besoins. Ceux-ci fournissent un air frais et propre à votre maison, en éliminant les polluants nuisibles. <br> Pour plus d'infos, n'hésitez pas à contacter nos experts. </p>
                </div>

                <div class="apresvente">
                    <img src="images/service.png" width=50px> 
                    <h3> Entretien </h3>
                    <p> Nos climatiseurs sont sous garanties pendant 2ans. Un soucis ? Nous vous enverrons nos spécialistes afin de résoudre votre problème. Votre bien-être est notre objectif et nos équipes sont là pour vous permettre de l'atteindre.  </p>
                </div>
            
            </div>

        </section>

        <!-- section 4-->
        <section class="corona">
            <h2> Covid-19 </h2>
            <p> Face à l'épidémie du coronavirus, nous tenons à vous rappeler les bénéfices d'avoir de la climatisation dans les pièces où vous vivez. Afin de participer à la lutte à notre manière, nos devis seront gratuits pour les établissements publics souhaitant disposer de climatiseurs. </p> 
        </section>

        <!-- section 5-->
        <section class="app">
            <h2> Domotique </h2>
            <img src="images/app.png" width="800px">
            <div class="domotique">
                <p> Nos équipes du département digital travaillent actuellement sur une application vous permettant de contrôler vos différents climatisateurs à l'aide de votre smartphone ! <br>
                <br> Nous nous réjouissons de vous présenter cette innovation unique dans le domaine lors d'une Keynote fin juin. <p>
            </div>
        </section>
    </main>

    <?php include 'footer/footer.php';?>
    <style> <?php include 'footer/footer_style.css';?> </style>

</body>

</html>