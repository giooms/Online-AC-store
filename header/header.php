<?php
    if(isset($_COOKIE['membre'])){
        $panier='panier.php';
        $profil='profil.php';
    }
    else{
        $panier='connexion_panier.php';
        $profil='connexion_profil.php';
    }
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="header_style.css">
    <title>FreshR</title>
</head>

<body>
    
    <header>
            <div class="header">
                <a href="index.php" class="logo"><img src="header/images/logo.png" width="180"></a>

                <div class="menu">

                    <div class="base">
                        <a href="index.php" class="home">Home</a>
                        <a href="produits.php" class="produits">Produits</a>
                        <a href="contact.php" class="contact">Contact</a>
                    </div>

                    <div class="images">
                        <a href="<?php echo($panier); ?>" id="shopping"><img src="header/images/shopping_cart.png"></a>
                        <a href="<?php echo($profil); ?>" id="privé"><img src="header/images/account.png"></a>
                    </div>

                </div>
            </div>
    </header>

</body>
</html>