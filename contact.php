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
            <img src="images/1.png" width="600" >

            <div class="texte">
                <h2>Afin de prendre un rendez-vous ou commander, merci de remplir le formulaire à la page suivante</h2>
                <form action="contact2.php">
                    <input type="submit" value="Commencer" class="bouton">
                </form>
            </div>
            
        </div>
    </div>

    <?php include 'footer/footer.php';?>
    <style> <?php include 'footer/footer_style.css';?> </style>

</body>