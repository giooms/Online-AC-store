<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>FreshR</title>
    <link rel="stylesheet" href='contact_style2.css'>
    <link rel="icon" href="images/favicon.png">
</head>

<body>
    <div class="header_form">

        <?php include 'header/header.php';?>
        <style> <?php include 'header/header_style.css';?> </style>

        <div class="interieur"> 
            <img src="images/2.png" width="600" >

            <div class="texte">
                <h2>Avant de confirmer le formulaire, nous avons besoin de quelques informations</h2>

                <div class="formulaire">
                    <form method="GET" action="contact3.php">
                        
                        <!-- infos nom et prenom -->
                        <div class="prenom_nom">
                            <label for="prenom"></label>    
                            <input type="text" name="prenom" id="prenom" class="prenom" placeholder="Prénom"/> <br>
                            <label for="nom"></label>
                            <input type="text" name="nom" id="nom" class="nom" placeholder="Nom"/> <br>
                        </div>

                        <!-- infos adresse et tel -->
                        <div class="adresse">
                            <label for="email"></label>
                            <input type="email" name="email" id="email" class="email" placeholder="Adresse mail"/> <br>
                            <label for="tel">
                            <input type="tel" name="tel" id="tel" class="tel" placeholder="Téléphone"/> <br>
                        </div>

                        <!-- raison 1 choix -->
                        <div class="rond">
                            <p> Pour quelle raison nous contactez-vous ? </p>
                            <input type="radio" id="devis" name="raison" value="devis" class="raison" checked>
                            <label for="devis">Devis</label>
                            <input type="radio" id="plainte" name="raison" value="plainte" class="raison">
                            <label for="plainte">Plainte</label><br>
                        </div>

                        <!-- choix de la date -->
                        <div class="date">
                            <label for="rdv">Choisissez une date pour le rdv:</label> <br>
                            <input type="date" name="rdv" id="rdv" min="2021-04-01" max="2021-05-15" class="rdv"> <br>
                        </div>

                        <!-- choix multiple -->
                        <div class="modele">
                            <p>De quel(s) modèle(s) discuterons-nous ? </p>
                            <input type="checkbox" name="mod" id="mod" value="FreshR mini" class="boite">
                            <label for="mod"> FreshR mini</label><br>
                            <input type="checkbox" name="mod" id="mod" value="FreshR Max" class="boite">
                            <label for="mod"> FreshR Max</label><br>
                            <input type="checkbox" name="mod" id="mod"  value="FreshR PRO" class="boite">
                            <label for="mod"> FreshR PRO</label> <br>
                        </div> 

                        <input type="submit" value="envoyer" class="bouton"/>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer/footer.php';?>
    <style> <?php include 'footer/footer_style.css';?> </style>

</body>