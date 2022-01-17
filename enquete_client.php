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
                <h2 style="margin-bottom: 15px;">Enquête client à propos de l'application de domotique adaptée à nos produits</h2>
                <p style="color: white;">Etes-vous intéressé(e) ?</p>

                <form action="profil.php" method="POST">

                    <select>
                        <option value="oui">Oui</option> <br>
                        <option value="non">Non</option>
                    </select> <br> <br>

                    <input type="submit" name="send" value="Envoyer" class="bouton">
                </form>
            </div>
            
        </div>
    </div>

    <?php include 'footer/footer.php';?>
    <style> <?php include 'footer/footer_style.css';?> </style>

</body>