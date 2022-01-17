<?php 

    session_start();

    if(!isset($_SESSION['panier'])){
        $_SESSION['panier']=array();
    }

    $conn = mysqli_connect('localhost', $_SERVER['DB_USER'], $_SERVER['DB_PASS'] ,"mschyns_".$_SERVER['DB_USER']);

    if(isset($_POST['aj'])){
        if($conn){

            $query= " INSERT INTO Comm_proj ( modele , prenom , comm ) VALUES ('".$_POST["modele"]."' , '".$_POST["prenom"]."', '".$_POST["comm"]."') ";
            $result = mysqli_query($conn, $query);
        }
    }


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>FreshR</title>
    <link rel="stylesheet" href='produits_style.css'>
    <link rel="icon" href="images/favicon.png">
</head>

<body>
    
    <?php include 'header/header.php';?>
    <style> <?php include 'header/header_style.css';?> </style>

    <article>

        <!-- première section pour le premier produit-->
        
        <section class="produit1">
            <div class="cadre">
                <div class="image_produit">
                    <img src="images/climatiseurs1.jpg" height="420" width="327" class="image">
                </div>
                <div class="infos">

                    <div class="texte">
                        <h1>FreshR mini</h1>
                        <h2>by FreshR</h2>
                        <p>FreshR mini est le modèle parfait pour les petits besoins. Sur votre table de chevet ou dans le salon, il vous accompagne partout pour vous raffraîchir.</p>
                    </div> 

                    <!-- Détails-->
                    
                    <div class="specifications">

                        <h2>Spécifications</h2>
                        <ul>
                            <li>Dimensions (en cm):</li>
                            20x20x20 <br>
                            <li>Fonctionne via recharge.</li>
                            (Cable est compris dans la boite)
                            <li>Nécessite un remplissage d'eau hebdomadaire.</li>
                            <li>Climatisation réglable selon les besoins.</li>
                        </ul>

                    </div>


                    <!-- Commentaires -->
                    <div class="commentaire">

                        <input type="checkbox" id="apparition1">
                        <label for="apparition1"><b>Commentaires</b></label>

                        <dialog >

                            <h3>Commentaires</h3>

                            <?php

                                if($conn){      /* Récupération des commentires (on ne prend que les 3 derniers) */
                                    $query_mini = " SELECT prenom , comm FROM Comm_proj WHERE modele = 'mini' ORDER BY id DESC LIMIT 3 ";
                                    $result_mini = mysqli_query($conn, $query_mini);

                                    while($row_mini = mysqli_fetch_assoc($result_mini)){        /* Nécessaire pour stocker toutes les données */ 
                                        echo"
                                            <ul>
                                                <li><h4>".$row_mini['prenom']."</h4></li>
                                                    ".$row_mini['comm']."
                                            </ul>
                                        ";
                                    } 
                                }
                            ?>
                            
                            <div class="ajouter">
                                <h3 id="ajouter">Ajouter un commentaire</h3>
                                <form action="" id="commentaire" method="POST" >

                                    <input type="hidden" name='modele' value="mini">
                                    <input type="text" placeholder="Prénom" name="prenom" required> <br>
                                    <select name="comm" class="choix" required="required">
                                        <option value="Pas du tout satisfait">Pas du tout satisfait</option>
                                        <option value="Non satisfait">Non satisfait</option>
                                        <option value="Moyen">Moyen</option>
                                        <option value="Satisfait">Satisfait</option>
                                        <option value="Très Satisfait" selected="selected">Très Satisfait</option>
                                    </select>

                                    <input type="submit" value="Ajouter" id="aj" name="aj">
                                </form>
                            </div>
                            <label for="apparition1">X</label>
                        </dialog>

                    </div>


                    <!-- Boutons de paiement -->
                    <div class="achat">
                        <form action="" method="POST">
                            <input type="hidden" name="mini">
                            <input type="submit" class="bouton" value="Acheter" onclick="alert('Le produit a bien été ajouté.')">
                         
                        </form>
                        <b>59€</b>
                    </div>

                        <?php 
                        if(isset($_POST['mini'])){
                            $_SESSION['mini']='freshrmini';
                            $_SESSION['qtt1']=1;    /* De sorte que quand on arrive sur le panier la valeur initiale vaut 1 */
                            
                        }
                        ?>


                </div>
            </div>

                </div>
            </div>
        </section>

        <!-- deuxième section pour le second produit-->
        
        <section class="produit2">
            <div class="cadre">
                <div class="image_produit">
                    <img src="images/climatiseur2.jpg" height="420" width="327">
                </div>
                <div class="infos">

                    <div class="texte">
                        <h1>FreshR Max</h1>
                        <h2>by FreshR</h2>
                        <p>FreshR max est le modèle adéquat pour les habitués de l'air pur. Outre sa fonction de climatiseur, il propose une fonction de purificateur d'air. Son design moderne le rend discret dans vos pièces de séjour.</p>
                    </div> 

                    <!-- Détails-->
                    
                    <div class="specifications">

                        <h2>Spécifications</h2>
                        <ul>
                            <li>Dimensions (en cm):</li>
                            20x20x100 <br>
                            <li>Doit être branché sur secteur.</li>
                            (Cable et prise compris dans la boite)
                            <li>Annihile tout risque d'allergie printanière.</li>
                            <li>Climatisation réglable selon les besoins.</li>
                        </ul>

                    </div>

                    <!-- Commentaires -->
                    <div class="commentaire">

                        <input type="checkbox" id="apparition2">
                        <label for="apparition2"><b>Commentaires</b></label>

                        <dialog >

                            <h3>Commentaires</h3>
                            
                            <?php

                                if($conn){
                                    $query_max = " SELECT prenom , comm FROM Comm_proj WHERE modele = 'max' ORDER BY id DESC LIMIT 3 ";
                                    $result_max = mysqli_query($conn, $query_max);

                                    while($row_max = mysqli_fetch_assoc($result_max)){
                                        echo"
                                            <ul>
                                                <li><h4>".$row_max['prenom']."</h4></li>
                                                    ".$row_max['comm']."
                                            </ul>
                                        ";
                                    } 
                                }
                            ?>
                            
                            <div class="ajouter">
                                <h3 id="ajouter">Ajouter un commentaire</h3>
                                <form action="" id="commentaire" method="POST" >

                                    <input type="hidden" name='modele' value="max">
                                    <input type="text" placeholder="Prénom" name="prenom" required> <br>
                                    <select name="comm" class="choix" required="required">
                                        <option value="Pas du tout satisfait">Pas du tout satisfait</option>
                                        <option value="Non satisfait">Non satisfait</option>
                                        <option value="Moyen">Moyen</option>
                                        <option value="Satisfait">Satisfait</option>
                                        <option value="Très Satisfait" selected="selected">Très Satisfait</option>
                                    </select>

                                    <input type="submit" value="Ajouter" id="aj" name="aj">
                                </form>
                            </div>
                            <label for="apparition2">X</label>
                        </dialog>

                    </div>


                    <!-- Boutons de paiement -->
                    <div class="achat">
                        <form action="" method="POST">
                            <input type="hidden" name="max">
                            <input type="submit" class="bouton" value="Acheter" onclick="alert('Le produit a bien été ajouté.')">
                         
                        </form>
                        <b>269€</b>
                    </div>

                    <?php 
                        if(isset($_POST['max'])){
                            $_SESSION['max']='freshrmax';
                            $_SESSION['qtt2']=1;
                            
                        }
                    ?>

                </div>
            </div>
        </section>

        <!-- troisième section pour le troisième produit-->
        
        <section class="produit3">
            <div class="cadre">
                <div class="image_produit">
                    <img src="images/climatiseur3.jpg" height="420" width="327">
                </div>
                <div class="infos">

                    <div class="texte">
                        <h1>FreshR PRO</h1>
                        <h2>by FreshR</h2>
                        <p>FreshR PRO est le modèle approprié pour les grands besoins. Placez-le dans une grande salle et il accomplira parfaitement sa mission vous permettant de contrôler la température ainsi que la qualité de l'air ambiant.</p>
                    </div> 

                    <!-- Détails-->
                    
                    <div class="specifications">

                        <h2>Spécifications</h2>
                        <ul>
                            <li>Dimensions (en cm):</li>
                            60x60x200 <br>
                            <li>Relié à une unité extérieure.</li>
                            <li>Filtre et traite la pollution ambiante.</li>
                            <li>Climatisation réglable au demi degré près.</li>
                        </ul>

                    </div>


                    <!-- Commentaires -->
                    <div class="commentaire">

                        <input type="checkbox" id="apparition3">
                        <label for="apparition3"><b>Commentaires</b></label>

                        <dialog >

                            <h3>Commentaires</h3>
                            
                            <?php

                                if($conn){
                                    $query_pro = " SELECT prenom , comm FROM Comm_proj WHERE modele = 'pro' ORDER BY id DESC LIMIT 3 ";
                                    $result_pro = mysqli_query($conn, $query_pro);

                                    while($row_pro = mysqli_fetch_assoc($result_pro)){
                                        echo"
                                            <ul>
                                                <li><h4>".$row_pro['prenom']."</h4></li>
                                                    ".$row_pro['comm']."
                                            </ul>
                                        ";
                                    } 
                                }
                            ?>
                            
                            <div class="ajouter">
                                <h3 id="ajouter">Ajouter un commentaire</h3>
                                <form action="" id="commentaire" method="POST" >

                                    <input type="hidden" name='modele' value="pro">
                                    <input type="text" placeholder="Prénom" name="prenom" required> <br>
                                    <select name="comm" class="choix" required="required">
                                        <option value="Pas du tout satisfait">Pas du tout satisfait</option>
                                        <option value="Non satisfait">Non satisfait</option>
                                        <option value="Moyen">Moyen</option>
                                        <option value="Satisfait">Satisfait</option>
                                        <option value="Très Satisfait" selected="selected">Très Satisfait</option>
                                    </select>

                                    <input type="submit" value="Ajouter" id="aj" name="aj">
                                </form>
                            </div>
                            <label for="apparition3">X</label>
                        </dialog>

                    </div>


                    <!-- Boutons de paiement -->
                    <div class="achat">
                        <form action="" method="POST">
                            <input type="hidden" name="pro">
                            <input type="submit" class="bouton" value="Acheter" onclick="alert('Le produit a bien été ajouté.')">
                         
                        </form>
                        <b>879€</b>
                    </div>

                    <?php 
                        if(isset($_POST["pro"])){
                            $_SESSION["pro"]='freshrpro';
                            $_SESSION['qtt3']=1;
                            
                        }
                    ?>

                </div>
            </div>
        </section>
    </article>

    <?php include 'footer/footer.php';?>
    <style> <?php include 'footer/footer_style.css';?> </style>
    
</body>

</html>