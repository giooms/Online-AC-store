<?php 
session_start();

if(isset($_POST['vider'])){         /* Si le client a bien cliqué sur vider, il atterri ici où son panier est vidé */
    session_destroy();
}
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
                <h2>Nous sommes désolés de vous voir partir les mains vides, n'hésitez pas à nous contacter !</h2>
                <button class="bouton"><a href="index.php" style= "text-decoration: none; color:#79b0a1">Page Principale</a></button>
            </div>
            
        </div>
    </div>

    <?php include 'footer/footer.php';?>
    <style> <?php include 'footer/footer_style.css';?> </style>

</body>