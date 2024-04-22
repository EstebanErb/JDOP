<?php

$servername = "185.98.131.109";
$username = "lejar1343688";
$password = "PHPljdop2016!";
$dbname = "lejar1343688";


try {
    $pdo = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo $error;
}

include "Bandeau.html";

$query = "SELECT * FROM plante WHERE idPlante > 0 ";
$query2 = "SELECT DISTINCT TypePlante FROM plante";
$query4 = "SELECT DISTINCT TypeFeuillage FROM plante";

if (isset($_POST['TypePlante'])) {
    $destination = $_POST['TypePlante'];
    $query .= " AND TypePlante like '%$destination%'";
}

if (isset($_POST['Exposition'])) {
    $Expo = $_POST['Exposition'];
    $query .= " AND Exposition like '%$Expo%'";
}

if (isset($_POST['hauteur'])) {
    $Hauteur = $_POST['hauteur'];
    $query .= " AND Hauteur like '%$Hauteur%'";
}

if (isset($_POST['TypeFeuillage'])) {
    $Feuillage = $_POST['TypeFeuillage'];
    $query .= " AND TypeFeuillage like '$Feuillage%'";
}
$query .= " ORDER BY NomPlante";
$stmt = $pdo->prepare("$query");
if ($stmt-> execute()) {
    $plante = $stmt -> fetchAll();
    
}

$stmt2 = $pdo->prepare("$query2");
if ($stmt2-> execute()) {
    $filtre = $stmt2 -> fetchAll();
    
}

$stmt4 = $pdo->prepare("$query4");
if ($stmt4 -> execute()) {
    $Feuillage = $stmt4 -> fetchAll();
    
}



?>
    <form action="Test.php" method="POST">
            <div class="SearchTravel">

                <h1>Parcourez le catalogue</h1>

                <select name="TypePlante" type="text" style="height:36px;" value="">
                    <option value= > séléctionnez votre type de plante </option>
					<?php foreach ($filtre as $p) { ?>
							<option value=<?php echo $p["TypePlante"]?>> <?php echo utf8_encode($p["TypePlante"])?> </option>
					<?php } ?>                    
                </select>

                <select name="Exposition" type="text" style="height:36px;" value="">
                    <option value= > séléctionnez votre exposition </option>
					<option value="soleil"> soleil </option>
                    <option value="mi-ombre"> mi-ombre </option>
                    <option value=" ombre "> ombre </option>
                </select>

                <select name="TypeFeuillage" type="text" style="height:36px;" >
                    <option value= > séléctionnez votre type de feuillage </option>
					<option value="caduc" > caduc </option>
					<option value="semi-pers"> semi-persistant</option>
                    <option value="pers"> persistant </option>        
                </select>

                <div class="Search2">
                    <button type="submit" style="height:30px;">Recherche<i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </form>



    <?php foreach($plante as $p){ ?>
        <table> 
            <tbody>
                    <tr>
                        <th>
                            <!--Type : <?php echo $p["TypePlante"]  ?><br>-->
                            <strong><?php echo utf8_encode($p["NomPlante"]) ?></strong><br><br>
                            <?php if(isset($p["CouleurFleur"])){ ?>
                                <strong>Couleur de la fleur : </strong><?php echo utf8_encode($p["CouleurFleur"]) ?> <br> <?php ;
                                    }
                                    else{
                                        echo "";
                                    } ?>

                            <?php if(isset($p["CouleurFeuillage"])){ ?>
                                <strong>Couleur de la feuillage : </strong><?php echo utf8_encode($p["CouleurFeuillage"]) ?> <br> <?php ;
                                    }
                                    else{
                                        echo "";
                                    } ?>

                            <?php if(isset($p["Hauteur"])){ ?>
                                <strong>Hauteur : </strong><?php echo $p["Hauteur"] ?> m <br> <?php ;
                                    }
                                    else{
                                        echo "";
                                    } ?>

                            <?php if(isset($p["Largeur"])){ ?>
                                <strong>Largeur : </strong><?php echo $p["Largeur"] ?> m <br> <?php ;
                                    }
                                    else{
                                        echo "";
                                    } ?>
                            
                            <?php if(isset($p["Floraison"])){ ?>
                                <strong>Floraison : </strong><?php echo utf8_encode($p["Floraison"]) ?> <br> <?php ;
                                    }
                                    else{
                                        echo "";
                                    } ?>
                            
                            <?php if(isset($p["TypeFeuillage"])){ ?>
                                <strong>Type de feuillage: </strong><?php echo utf8_encode($p["TypeFeuillage"]) ?> <br> <?php ;
                                    }
                                    else{
                                        echo "";
                                    } ?>

                            <?php if(isset($p["Exposition"])){ ?>
                                <strong>Exposition: </strong><?php echo utf8_encode($p["Exposition"]) ?> <br> <?php ;
                                    }
                                    else{
                                        echo "";
                                    } ?>

                            <?php if(isset($p["TypeSol"])){ ?>
                                <strong>Type de sol : </strong><?php echo utf8_encode($p["TypeSol"]) ?> <br> <?php ;
                                    }
                                    else{
                                        echo "";
                                    } ?>
                            
                            <?php if(isset($p["Silhouette"])){ ?>
                                <strong>Silhouette : </strong><?php echo utf8_encode($p["Silhouette"]) ?> <br> <?php ;
                                    }
                                    else{
                                        echo "";
                                    } ?>
                            
                            <?php if(isset($p["Densite"])){ ?>
                                <strong>Densité : </strong><?php echo utf8_encode($p["Densite"]) ?> <br> <?php ;
                                    }
                                    else{
                                        echo "";
                                    } ?>
                            
                            <?php if(isset($p["Rusticite"])){ ?>
                                <strong>Rusticite : </strong><?php echo utf8_encode($p["Rusticite"]) ?> <br> <?php ;
                                    }
                                    else{
                                        echo "";
                                    } ?>
                            
                            <?php if(isset($p["Utilisation"])){ ?>
                                <strong>Utilisation : </strong><?php echo utf8_encode($p["Utilisation"]) ?> <br> <?php ;
                                    }
                                    else{
                                        echo "";
                                    } ?>
                            
                            <?php if(isset($p["Entretien"])){ ?>
                                <strong>Entretien : </strong><?php echo utf8_encode($p["Entretien"]) ?> <br> <?php ;
                                    }
                                    else{
                                        echo "";
                                    } ?>
                            
                            <?php if(isset($p["PetitMoins"])){ ?>
                                <strong>Petit - : </strong><?php echo utf8_encode($p["PetitMoins"]) ?> <br> <?php ;
                                    }
                                    else{
                                        echo "";
                                    } ?>
                            
                            <?php if(isset($p["PetitPlus"])){ ?>
                                <strong>Petit + : </strong><?php echo utf8_encode($p["PetitPlus"]) ?> <br> <?php ;
                                    }
                                    else{
                                        echo "";
                                    } ?>

                        </th>
                        <th>
                            <?php if(isset($p["imgPlante"])){ ?>
                                    <img src=" <?php echo $p["imgPlante"] ?>" width="350"> 
                                    <?php }
                                    else{
                                        echo "La valeur n'existe pas";
                                    } ?><br>
                            <strong><?php echo utf8_encode($p["NomPlante"]) ?></strong>
                        </th>
                    </tr>
            </tbody>
        </table>
    <?php } ?>

    </body>

</html>
