 <?php
/**
 * var_dump pour voir ce qui'il ya dans notre POST une fois qu'on click sur Enregistrer
 */ 
     var_dump($_POST);  
/**
 * Il faut d'abord créer une connexion avec notre base de donnée
 */
try{
  $objetPDO= new PDO('mysql:host=localhost;dbname=MiniPOO;charset=utf8','root','12345678');
  $objetPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // preparation de la requete d'insertion utilisation des marqueurs
  $pdostat = $objetPDO->prepare('INSERT INTO Etudiant(Matricule,Nom,Prenom,Email,NumeroTelephone,Date_de_naissance) VALUES ( :Matricule, :Nom, :Prenom, :Email, :NumeroTelephone, :Date_de_naissance)');
  
  // Maintenant on lie chacune de nos marqueurs pour recevoir les entrée utilisateurs
  $pdostat->bindValue(':Matricule', $_POST['matricule'], PDO::PARAM_STR);
  $pdostat->bindValue(':Nom', $_POST['nom'], PDO::PARAM_STR);
  $pdostat->bindValue(':Prenom', $_POST['prenom'], PDO::PARAM_STR);
  $pdostat->bindValue(':Email', $_POST['email'], PDO::PARAM_STR);
  $pdostat->bindValue(':NumeroTelephone', $_POST['tel'], PDO::PARAM_INT);
  $pdostat->bindValue(':Date_de_naissance', $_POST['date'], PDO::PARAM_INT);

  // execution de la requete prepare 
  $insert = $pdostat->execute();
  if ($insert) {
    $message = "Le contact a été bien enregistrée";
  }
  else {
    $message = "Echec d'insertion";
  }
}
catch(PDOException $e){
  echo 'Echec : '.$e->getMessage();
}
  // fonction autoload avec link de tous les pages

function appel($classe){ 
      include($classe." .php"); 
   } 
   spl_autoload_register("appel"); 

?>
  
<!DOCTYPE html>
<html lang="en-fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Page d'insertion</title>
</head>
<body>
    <h1>Inserer un Étudiant dans la Base</h1>
    <p>
      <?php 
        echo $message;
      ?>
    </p>
</body>
</html>