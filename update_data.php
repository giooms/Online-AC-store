<?php
    $conn = mysqli_connect('localhost', $_SERVER['DB_USER'], $_SERVER['DB_PASS'] ,"mschyns_".$_SERVER['DB_USER']);

    if($conn){
        $info = " SELECT * FROM Clients_proj WHERE id='".$_COOKIE['membre']."' ";
        $result = mysqli_query($conn, $info);
        $row = mysqli_fetch_assoc($result);
    }    

    if(isset($_POST['update'])){

        if(!empty($_POST['prenom'])){
            $prenom = $_POST['prenom'];
        }
        else{
            $prenom = $row['prenom'];
        }

        if(!empty($_POST['nom'])){
            $nom = $_POST['nom'];
        }
        else{
            $nom = $row['nom'];
        }

        if(!empty($_POST['mdp'])){
            $mdp = $_POST['mdp'];
        }
        else{
            $mdp = $row['mdp'];
        }

        if(!empty($_POST['tel'])){
            $tel = $_POST['tel'];
        }
        else{
            $tel = $row['tel'];
        }

        if(!empty($_POST['rue'])){
            $rue = $_POST['rue'];
        }
        else{
            $rue = $row['rue'];
        }

        if(!empty($_POST['num'])){
            $num= $_POST['num'];
        }
        else{
            $num = $row['num'];
        }

        if(!empty($_POST['ville'])){
            $ville = $_POST['ville'];
        }
        else{
            $ville = $row['ville'];
        }

        if(!empty($_POST['cp'])){
            $cp = $_POST['cp'];
        }
        else{
            $cp = $row['cp'];
        }

        if(!empty($_POST['pays'])){
            $pays = $_POST['pays'];
        }
        else{
            $pays = $row['pays'];
        }

        if(!empty($_POST['genre'])){
            $genre = $_POST['genre'];
        }
        else{
            $genre = $row['genre'];
        }

        $update = " UPDATE Clients_proj
                    SET prenom = '$prenom', nom = '$nom', mdp = '$mdp', tel = '$tel', rue ='$rue', num ='$num', ville='$ville', cp='$cp', pays='$pays', genre='$genre'
                    WHERE id='".$_COOKIE['membre']."' ";
        $send = mysqli_query($conn, $update);
        header('Location: profil.php');
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
                Vous pouvez ne changer que le nécessaire.
                <h2>Changez les données</h2>

                <div class="formulaire">
                    <form method="POST" action="">
                        
                        <!-- infos nom et prenom + mdp -->
                        <div class="prenom_nom">
                            <input type="text" name="prenom" class="prenom" placeholder="Prénom"> 
                            <input type="text" name="nom" class="nom" placeholder="Nom"> 
                            <input type="password" name="mdp" placeholder="Mot de Passe">
                        </div>

                        <!-- infos @ et tel -->
                        <div class="joindre">
                             
                            <input type="tel" name="tel" class="tel" placeholder="Téléphone">
                        </div>

                        <!-- adresse client -->
                        <p> Remplissez l'adresse où vous désirez être livré </p>
                        <div class="adresse">
                            <input type="text" name="rue" class="rue" placeholder="Rue"> 
                            <input type="text" name="num" class="num" placeholder="Numéro">
                            <input type="text" name="ville" class="ville" placeholder="Ville">
                            <input type="text" name="cp" class="cp" placeholder="Code postal">
                            <input type="text" name="pays" class="pays" placeholder="Pays"> 
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

                        <input type="submit" name='update' value="Actualiser" class="bouton"/>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer/footer.php';?>
    <style> <?php include 'footer/footer_style.css';?> </style>

</body>