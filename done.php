<?php 
session_start();

session_destroy();      /* Le client est envoyé ici seulement si il a payé --> On vide son panier */
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>FreshR</title>
    <link rel="stylesheet" href='contact_style.css'>
    <link rel="icon" href="images/favicon.png">
</head>

<body>
    <div class="header_form">

        <?php include 'header/header.php';?>
        <style> <?php include 'header/header_style.css';?> </style>

        <div class="intérieur">
            
            <div class="texte">
                <h2>Votre commande sera envoyée incessamment sous peu. Merci !</h2>
                <button class="bouton"><a href="index.php" style= "text-decoration: none; color:#79b0a1">Page Principale</a></button>
            </div>
            
        </div>
    </div>

    <?php include 'footer/footer.php';?>
    <style> <?php include 'footer/footer_style.css';?> </style>

</body>