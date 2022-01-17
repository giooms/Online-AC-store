<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>FreshR</title>
    <link rel="stylesheet" href='contact_style3.css'>
    <link rel="icon" href="images/favicon.png">
</head>

<body>
    
    <div class="header_form">
        <?php include 'header/header.php';?>
        <style> <?php include 'header/header_style.css';?> </style>

        <div class="intérieur">
            <img src="images/3.png" width="600" >

            <div class="texte">

                <div class=texte1> <!-- utilisation des infos dans barre de recherche -->
                    <p><strong><?php echo $_GET['prenom']; ?></strong>, nous nous réjouissons de vous voir le <strong><?php echo $_GET['rdv']; ?></strong> lors de notre rendez-vous pour discuter de votre <strong><?php echo $_GET['raison']; ?></strong> ! <br>  &#192; très vite !<p>
                </div>

                <div class=texte2>   
                    <p>No stress, nous vous enverrons un mail de rappel.<p>
                </div> 
                
                <form action="index.php">
                    <input type="submit" value="Retour" class="bouton">
                </form>

            </div>
        </div>
    </div>

    <?php include 'footer/footer.php';?>
    <style> <?php include 'footer/footer_style.css';?> </style>

</body>

</html>