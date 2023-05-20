<?php
//connection a la base donnèe 
//$bdd objet poiur recuperer les resultats du site
try {
    $boo= new PDO('mysql:host=localhost;dbname=test_nada', 'root', '');  
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

// preparation de la requette  sql  insertton a la base de donne 
$req1 = $boo->prepare('INSERT INTO contact VALUES(Null, :Nom,:Prenom,:Email,:mdp,:Tel)');

$req1->bindValue(':Nom',$_POST['nomm'],PDO:: PARAM_STR);
$req1->bindValue(':Prenom',$_POST['prenomm'],PDO:: PARAM_STR);
$req1->bindValue(':Email',$_POST['emaill'],PDO:: PARAM_STR);
$req1->bindValue(':mdp',$_POST['passwordd'],PDO:: PARAM_STR);
$req1->bindValue(':Tel',$_POST['phonee'],PDO:: PARAM_INT);


//// execution de la requete preparè
$req1-> execute();

 if ($req1){ 
   $message= 'le conatct a ètè ajoutè';
 } 
 else {
    $message= 'echec d\insertion';
 }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
    <title>page pour les contactes</title>
    </head>
    <body>
        <h1>les contactes </h1>
    <p>
    <?php
    echo $message
    ?>
</p>
    </body>
    

