<?php
//// connexion a la base de donnè 
try {
    $boo= new PDO('mysql:host=localhost;dbname=test_nada', 'root', '');  
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

/// preparation de la requette 

$req2=$boo->prepare('SELECT * FROM contact');

$executeisok=$req2->execute();

//// recupere les donnèes de la base de donnèes 
$contactss=$req2-> fetchAll();
//  var_dump($contactss);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
    <title>affichage des donnèes de la base </title>
    </head>
    <body>
        <h1>liste de contactes </h1>
    <p>
        <ul>

     <?php  foreach ($contactss as $cont) { ?>

     <li>
        <?=$cont['Nom'] ?>  <?php echo $cont['Prenom'] ?>-<?php echo $cont['Email'] ?>-<?php echo $cont['mdp'] ?>-<?php echo $cont['Tel']  ?>
     </li>
     <?php } ?>
        </ul>

        </ul>
    
</p>
    </body>
