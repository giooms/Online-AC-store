<?php 
    session_start();

    $conn = mysqli_connect('localhost', $_SERVER['DB_USER'], $_SERVER['DB_PASS'] ,"mschyns_".$_SERVER['DB_USER']);

    if($conn){
        $info = " SELECT * FROM Clients_proj WHERE id='".$_COOKIE['membre']."' ";   /* Pour obtenir les infos nécessaires à la commande */ 
        $result = mysqli_query($conn, $info);
        $row = mysqli_fetch_assoc($result);
    }    
    if(!isset($_COOKIE['membre'])){
        header('location: connexion_panier.php');
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>FreshR</title>
    <link rel="stylesheet" href='panier_style.css'>
    <link rel="icon" href="images/favicon.png">
</head>

<body>

    <?php include 'header/header.php';?>
    <style> <?php include 'header/header_style.css';?> </style>

    <div class=payer>

        <div class="contenu">     

            <?php              

                if(isset($_SESSION['panier'])){     /* Il faut que le client ait été voir / ajouter les produits pour que son panier s'affiche */ 
                    echo "
                    <table class='tableau'>
                    <tr>
                        <th width='40%'>Produit</th> <th width='20%'>Prix</th> <th width='20%'>Quantité</th> <th width='20%'>Sous-total</th>
                    </tr>
                    ";         
                    /* MINI */

                        /* Création des variables */
                        $prix1=59;
                        $qtt1=1;
                                                                    
                        if(isset($_POST['qtt1'])){
                            $_SESSION['qtt1']=$_POST['qtt1'];
                            $qtt1=$_SESSION['qtt1'];

                            if($qtt1 == 0){         /* Permet de supprimer l'article */
                                unset($_SESSION['mini']);
                                                            
                            }
                        }
                        elseif(isset($_SESSION['qtt1'])){
                            $qtt1=$_SESSION['qtt1'];
                        }

                        $st1=$prix1*$qtt1;          /* Calcul du sous-total */
                        

                        if(isset($_SESSION['mini'])){   /* Si la variable de session existe et que qtt1>0 on echo la suite du tableau */ 
                                                        
                            echo"                       
                            <tr>
                                <td> <img src='images/freshrmini.jpg' width='120'></td>
                                <td>$prix1 €</td>
                                <td>
                                    <form action='' method='POST' name='mini'>
                                        <input type='number' name='qtt1' value=$qtt1 min='0' max='10'>
                                        <input type='submit' value='actualiser'>
                                    </form>
                                </td>
                                <td> $st1 €</td>
                            </tr>
                            ";
                        }
                        else{
                            $st1=0;
                        }
                    
                    /* MAX */

                        /* Création des variables */
                        $prix2=269;
                        $qtt2=1;
                        
                        if(isset($_POST['qtt2'])){
                            $_SESSION['qtt2']=$_POST['qtt2'];
                            $qtt2=$_SESSION['qtt2'];

                            if($qtt2 == 0){         /* Permet de supprimer l'article */
                                unset($_SESSION['max']);
                                                                
                            }
                        }
                        elseif(isset($_SESSION['qtt2'])){
                            $qtt2=$_SESSION['qtt2'];
                        }

                        $st2=$prix2*$qtt2;          /* Calcul du sous-total */
                        

                        if(isset($_SESSION['max'])){   /* Si la variable de session existe et que qtt2>0 on echo la suite du tableau */ 
                                                        
                            echo"                       
                            <tr>
                                <td> <img src='images/freshrmax.jpg' width='120'></td>
                                <td>$prix2 €</td>
                                <td>
                                    <form action='' method='POST' name='max'>
                                        <input type='number' name='qtt2' value=$qtt2 min='0' max='10'>
                                        <input type='submit' value='actualiser'>
                                    </form>
                                </td>
                                <td> $st2 €</td>
                            </tr>
                            ";
                        }
                        else{
                            $st2=0;
                        }

                    /* PRO */

                        /* Création des variables */
                        $prix3=879;
                        $qtt3=1;
                                                
                        if(isset($_POST['qtt3'])){
                            $_SESSION['qtt3']=$_POST['qtt3'];
                            $qtt3=$_SESSION['qtt3'];

                            if($qtt3 == 0){         /* Permet de supprimer l'article */
                                unset($_SESSION['pro']);
                                                                
                            }   
                        }
                        elseif(isset($_SESSION['qtt3'])){
                            $qtt3=$_SESSION['qtt3'];
                        }

                        $st3=$prix3*$qtt3;          /* Calcul du sous-total */
                        

                        if(isset($_SESSION['pro'])){   /* Si la variable de session existe et que qtt3>0 on echo la suite du tableau */
                                                        
                            echo"                       
                            <tr>
                                <td> <img src='images/freshrpro.jpg' width='120'></td>
                                <td>$prix3 €</td>
                                <td>
                                    <form action='' method='POST' name='pro'>
                                        <input type='number' name='qtt3' value=$qtt3 min='0' max='10'>
                                        <input type='submit' value='actualiser'>
                                    </form>
                                </td>
                                <td> $st3 €</td>
                            </tr>
                            ";
                        }
                        else{
                            $st3=0;
                        }
                    
                    $total=$st1+$st2+$st3;    

                    if($st1 != 0 || $st2 != 0 || $st3 != 0){ /* Pour afficher le total */
                        
                        echo "</table>"; /* On rajoute dans cette table le bouton pour vider le contenu */
                        echo "
                            <table border='1px' width='600px'>
                            <tr>
                                <th width='20%'>
                                    <form action='panier_fin.php' method='POST'> 
                                        <input type='hidden' name='vider'>
                                        <input type='submit' value='Vider' onclick='alert(Votre panier est vidé.)'> 
                                    </form>    
                                </th>
                                <th width='60%'>Total</th> <th width='20%'>$total €</th>
                            </tr>
                            </table>
                        ";
                    }
                    if($total == 0){    /* Si le total vaut 0 c'est qu'il n'y a rien dans le panier */
                    echo "
                        <table border='1px' width='600px'>
                        <tr>
                            <th width='100%'>Vous n'avez plus rien dans votre panier</th>
                        </tr>
                        </table>
                    ";
                    }
                    
                }
                else{
                    echo "<h2 text-align:'center'> Votre panier est vide. </h2> ";
                }
               
            
            ?>
        </div>
        
        <?php 
            
            if(isset($_SESSION['panier']) && $total != 0){      /* On ne propose que la partie paiement que si le panier existe et donc que le total est différent de 0 */
                
                if($row['pays'] == 'Belgique'){         /* Personnalisation des frais */
                    $tran = 0;
                }
                else{
                    $tran = 30;
                }

                if($row['participation'] == 1){
                    $prom = '-10%';
                    $redu = 0.1;
                }
                else{
                    $prom = ' / ';
                    $redu = 0;
                }

                $tt1 = $total + $tran - ($total + $tran)*$redu;     /* Formule finale pour le calcul avec les frais */

                /* Envoie des données aini qu'apparition du bouton de paiement PAYPAL */
                echo"                     
                    <div class='paypal'>
                        <h2> Check-Out </h2>
                        <div class='data'>
                            <h3> Données </h3>
                            <ul>
                                <li> <b>Nom: </b> ".$row['nom']."</li> </br>
                                <li> <b>Prénom: </b> ".$row['prenom']." </li> </br>
                                <li> <b>Contact:</b> ".$row['mail']." </li> </br>
                                <li> <b>Adresse:</b> ".$row['rue']." , ".$row['num'].", ".$row['ville'].", ".$row['cp'].", ".$row['pays']."</li> </br>
                            </ul>
                        </div>
                        
                        <div class='frais'>
                            <h3> Frais </h3>
                            <ul>
                                <li> <b>Transport:</b> $tran €</li> </br>
                                <li> <b>Promotion:</b> $prom </li> </br>
                                <li> <h4>Total à payer: $tt1 €</h4> </li> </br>
                            </ul>
                        </div>

                        <div class='sandbox' style='position:absolute; bottom:70px; right:70px;'>

                            <form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post' target='_top'>
                                <input type='hidden' name='cmd' value='_xclick'>
                                <input type='hidden' name='business' value='DV6WT85LY8JF8'>
                                <input type='hidden' name='lc' value='BE'>
                                <input type='hidden' name='item_name' value='paypal'>
                                <input type='hidden' name='amount' value=$tt1>
                                <input type='hidden' name='currency_code' value='EUR'>
                                <input type='hidden' name='button_subtype' value='services'>
                                <input type='hidden' name='no_note' value='1'>
                                <input type='hidden' name='no_shipping' value='1'>
                                <input type='hidden' name='rm' value='1'>
                                <input type='hidden' name='return' value='http://s192136.php2.hec.ulg.ac.be/Projet/done.php'>
                                <input type='hidden' name='bn' value='PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted'>
                                <input type='image' src='https://www.sandbox.paypal.com/fr_FR/BE/i/btn/btn_buynowCC_LG.gif' border='0' name='submit' alt='PayPal, le réflexe sécurité pour payer en ligne'>
                                <img alt='' border='0' src='https://www.sandbox.paypal.com/fr_FR/i/scr/pixel.gif' width='1' height='1'>
                            </form>
                        </div>

                    </div>
                
                    
                ";   
                
            }
        ?>
    </div>

    <?php include 'footer/footer.php';?>
    <style> <?php include 'footer/footer_style.css';?> </style>
    
</body>

</html>